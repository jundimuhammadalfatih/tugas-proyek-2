<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Users extends CI_Controller {
	public function index()
	{
        $data['title'] = 'Users';
        $data['menu'] = 'users';
		$data['users'] = $this->db->get('users')->result();
		$this->load->view('templates/admin/header.php', $data);
		$this->load->view('users/index.php', $data);
		$this->load->view('templates/admin/footer.php');
	}
		public function profile()
		{
			$data['title'] = 'profile';
			$data['menu'] = 'profile';
		$this->load->view('templates/admin/header.php',$data);
		$this->load->view('profile/index.php');
		$this->load->view('templates/admin/footer.php');
		}
}