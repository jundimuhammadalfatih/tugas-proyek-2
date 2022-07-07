<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		if (!$this->session->has_userdata('email') && $this->session->userdata('role') != 'administrator') {
			redirect('auth');
		}
	}

	public function index()
	{
        $data['title'] = 'Dashboard';
        $data['menu'] = 'dashboard';
		$this->load->view('templates/admin/header.php', $data);
		$this->load->view('dashboard/index.php', $data);
		$this->load->view('templates/admin/footer.php');
	}
}