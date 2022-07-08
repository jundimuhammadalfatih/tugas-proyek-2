<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Peserta extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		if (!$this->session->has_userdata('email') && $this->session->userdata('role') != 'public') {
			redirect('auth');
		}
	}

	public function index()
	{
        $data['title'] = 'Peserta';
        $data['menu'] = 'peserta';
		$data['jenis_peserta'] = $this->db->get('kategori_peserta')->result();
		$data['kegiatan_terdaftar'] = $this->db->select('kegiatan_id')->where('users_id', $this->session->userdata('user_id'))->from('daftar')->get()->result_array();
		$data['kegiatan'] = $this->db->select('kegiatan.*, jenis_kegiatan.nama')->from('kegiatan')->join('jenis_kegiatan', 'jenis_kegiatan.id = kegiatan.jenis_id')->get()->result();
		$this->load->view('templates/user/header.php', $data);
		$this->load->view('peserta/index.php', $data);
		$this->load->view('templates/user/footer.php');
	}

	public function daftar()
	{
		$this->form_validation->set_rules('jenis_peserta', 'Jenis Peserta', 'required|integer');
		$this->form_validation->set_rules('alasan', 'Alasan', 'required|max_length[200]');
		if ($this->form_validation->run() == FALSE)
		{
			$this->session->set_flashdata('pesan',
				'<div class="alert alert-danger alert-dismissible fade show" role="alert">
					'.validation_errors().'
					<button class="close" type="button" data-dismiss="alert" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>'
			);
			redirect('peserta');
		}
		else
		{
			$kegiatan_id = $this->input->post('kegiatan_id', true);
			$jenis_peserta = $this->input->post('jenis_peserta', true);
			$alasan = $this->input->post('alasan', true);

			$count_pendaftar = $this->db->where('kegiatan_id', $kegiatan_id)->get('daftar')->result();
			if (count($count_pendaftar) > 2) {
				$no = count($count_pendaftar);
			} elseif (count($count_pendaftar) > 1) {
				$no = '0'.count($count_pendaftar);
			} else {
				$no = '00'.(count($count_pendaftar)+1);
			}

			$kegiatan = $this->db->where('id', $kegiatan_id)->get('kegiatan')->result();
			$nosertifikat = 'S-'.date('Y').'-'.$this->numberToRoman($kegiatan[0]->id).'-'.$no;

			$this->db->insert('daftar', [
				'tanggal_daftar' => date('Y-m-d'),
				'alasan' => $alasan,
				'users_id' => $this->session->userdata('user_id'),
				'kegiatan_id' => $kegiatan_id,
				'kategori_peserta_id' => $jenis_peserta,
				'nosertifikat' => $nosertifikat
			]);

			$this->session->set_flashdata('pesan',
				'<div class="alert alert-success alert-dismissible fade show" role="alert">
					Pendaftaran Kegiatan Berhasil
					<button class="close" type="button" data-dismiss="alert" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>'
			);
			redirect('peserta');
		}
	}

	public function kegiatanTerdaftar()
	{
        $data['title'] = 'Kegiatan Terdaftar';
        $data['menu'] = 'kegiatan_terdaftar';
		$data['kegiatan'] = $this->db->select('daftar.*, kegiatan.judul, kategori_peserta.nama')->where('users_id', $this->session->userdata('user_id'))->from('daftar')
							->join('kegiatan', 'kegiatan.id = daftar.kegiatan_id')
							->join('kategori_peserta', 'kategori_peserta.id = daftar.kategori_peserta_id')
							->get()->result();
		$this->load->view('templates/user/header.php', $data);
		$this->load->view('peserta/kegiatan_terdaftar.php', $data);
		$this->load->view('templates/user/footer.php');
	}

	/**
	 * @param int $number
	 * @return string
	 */
	public function numberToRoman($number) {
		$map = array('M' => 1000, 'CM' => 900, 'D' => 500, 'CD' => 400, 'C' => 100, 'XC' => 90, 'L' => 50, 'XL' => 40, 'X' => 10, 'IX' => 9, 'V' => 5, 'IV' => 4, 'I' => 1);
		$returnValue = '';
		while ($number > 0) {
			foreach ($map as $roman => $int) {
				if($number >= $int) {
					$number -= $int;
					$returnValue .= $roman;
					break;
				}
			}
		}
		return $returnValue;
	}
}