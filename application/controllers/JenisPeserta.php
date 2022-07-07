<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class JenisPeserta extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		if (!$this->session->has_userdata('email') && $this->session->userdata('role') != 'administrator') {
			redirect('auth');
		}
	}

	public function index()
	{
        $data['title'] = 'Jenis Peserta';
        $data['menu'] = 'jenis_peserta';
		$data['jenis_peserta'] = $this->db->order_by('id', 'DESC')->get('kategori_peserta')->result();
		$this->load->view('templates/admin/header.php', $data);
		$this->load->view('jenis_peserta/index.php', $data);
		$this->load->view('templates/admin/footer.php');
	}

	public function insert()
	{
		$this->form_validation->set_rules('nama', 'Kategori Peserta', 'required');
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
			redirect('jenisPeserta');
		}
		else
		{
			$jenis_peserta = $this->input->post('nama', true);
			$this->db->insert('kategori_peserta', ['nama' => $jenis_peserta]);

			$this->session->set_flashdata('pesan',
				'<div class="alert alert-success alert-dismissible fade show" role="alert">
					Data berhasil Ditambahkan
					<button class="close" type="button" data-dismiss="alert" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>'
			);
			redirect('jenisPeserta');
		}
	}

	public function update()
	{
		$id_jenis_peserta = $this->input->post('id', true);
		$this->form_validation->set_rules('nama', 'Kategori Peserta', 'required');
		if ((!isset($id_jenis_peserta) || empty($id_jenis_peserta)) || $this->form_validation->run() == FALSE)
		{
			$this->session->set_flashdata('pesan',
				'<div class="alert alert-danger alert-dismissible fade show" role="alert">
					'.validation_errors().'
					<button class="close" type="button" data-dismiss="alert" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>'
			);
			redirect('jenisPeserta');
		}
		else
		{
			$jenis_peserta = $this->input->post('nama', true);
			$this->db->update('kategori_peserta', ['nama' => $jenis_peserta], ['id' => $id_jenis_peserta]);

			$this->session->set_flashdata('pesan',
				'<div class="alert alert-success alert-dismissible fade show" role="alert">
					Data berhasil Diedit
					<button class="close" type="button" data-dismiss="alert" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>'
			);
			redirect('jenisPeserta');
		}
	}

	public function delete($id_jenis_peserta)
	{
		if (!isset($id_jenis_peserta) || empty($id_jenis_peserta))
		{
			redirect('jenisPeserta');
		}
		else
		{
			$this->db->delete('kategori_peserta', ['id' => $id_jenis_peserta]);

			$this->session->set_flashdata('pesan',
				'<div class="alert alert-success alert-dismissible fade show" role="alert">
					Data berhasil Dihapus
					<button class="close" type="button" data-dismiss="alert" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>'
			);
			redirect('jenisPeserta');
		}
	}
}