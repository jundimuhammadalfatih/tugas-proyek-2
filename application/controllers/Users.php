<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Users extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		if (!$this->session->has_userdata('email')) {
			redirect('auth');
		}
	}

	public function index()
	{
        $data['title'] = 'Users';
        $data['menu'] = 'users';
		$data['users'] = $this->db->get('users')->result();
		$this->load->view('templates/admin/header.php', $data);
		$this->load->view('users/index.php', $data);
		$this->load->view('templates/admin/footer.php');
	}

	public function delete($id)
	{
		if (!isset($id) || empty($id))
		{
			redirect('users');
		}
		else
		{
			$this->db->delete('users', ['id' => $id]);

			$this->session->set_flashdata('pesan',
				'<div class="alert alert-success alert-dismissible fade show" role="alert">
					User berhasil Dihapus
					<button class="close" type="button" data-dismiss="alert" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>'
			);
			redirect('users');
		}
	}
}