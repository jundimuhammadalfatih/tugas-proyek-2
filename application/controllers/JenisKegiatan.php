<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class JenisKegiatan extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		if (!$this->session->has_userdata('email') && $this->session->userdata('role') != 'administrator') {
			redirect('auth');
		}
	}

	public function index()
	{
        $data['title'] = 'Jenis Kegiatan';
        $data['menu'] = 'jenis_kegiatan';
		$data['jenis_kegiatan'] = $this->db->order_by('id', 'DESC')->get('jenis_kegiatan')->result();
		$this->load->view('templates/admin/header.php', $data);
		$this->load->view('jenis_kegiatan/index.php', $data);
		$this->load->view('templates/admin/footer.php');
	}

	public function insert()
	{
		$this->form_validation->set_rules('nama', 'Jenis Kegiatan', 'required');
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
			redirect('jenisKegiatan');
		}
		else
		{
			$jenis_peserta = $this->input->post('nama', true);
			$this->db->insert('jenis_kegiatan', ['nama' => $jenis_peserta]);

			$this->session->set_flashdata('pesan',
				'<div class="alert alert-success alert-dismissible fade show" role="alert">
					Data berhasil Ditambahkan
					<button class="close" type="button" data-dismiss="alert" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>'
			);
			redirect('jenisKegiatan');
		}
	}

	public function update()
	{
		$id_jenis_kegiatan = $this->input->post('id', true);
		$this->form_validation->set_rules('nama', 'Jenis Kegiatan', 'required');
		if ((!isset($id_jenis_kegiatan) || empty($id_jenis_kegiatan)) || $this->form_validation->run() == FALSE)
		{
			$this->session->set_flashdata('pesan',
				'<div class="alert alert-danger alert-dismissible fade show" role="alert">
					'.validation_errors().'
					<button class="close" type="button" data-dismiss="alert" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>'
			);
			redirect('jenisKegiatan');
		}
		else
		{
			$jenis_peserta = $this->input->post('nama', true);
			$this->db->update('jenis_kegiatan', ['nama' => $jenis_peserta], ['id' => $id_jenis_kegiatan]);

			$this->session->set_flashdata('pesan',
				'<div class="alert alert-success alert-dismissible fade show" role="alert">
					Data berhasil Diedit
					<button class="close" type="button" data-dismiss="alert" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>'
			);
			redirect('jenisKegiatan');
		}
	}

	public function delete($id_jenis_kegiatan)
	{
		if (!isset($id_jenis_kegiatan) || empty($id_jenis_kegiatan))
		{
			redirect('jenisKegiatan');
		}
		else
		{
			$this->db->delete('jenis_kegiatan', ['id' => $id_jenis_kegiatan]);

			$this->session->set_flashdata('pesan',
				'<div class="alert alert-success alert-dismissible fade show" role="alert">
					Data berhasil Dihapus
					<button class="close" type="button" data-dismiss="alert" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>'
			);
			redirect('jenisKegiatan');
		}
	}
}