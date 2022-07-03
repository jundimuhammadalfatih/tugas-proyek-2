<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {
	public function index()
	{
        $data['title'] = 'Dashboard';
        $data['menu'] = 'dashboard';
		$this->load->view('templates/admin/header.php', $data);
		$this->load->view('dashboard/index.php', $data);
		$this->load->view('templates/admin/footer.php');
	}
}
