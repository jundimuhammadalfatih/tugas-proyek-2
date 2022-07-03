<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Landing extends CI_Controller {

    function __construct()
    {
        parent::__construct();
        if ($this->session->has_userdata('email')) {
			if ($this->session->userdata('role') == 'administrator') {
				redirect();
			} else {
				redirect('user');
			}
			return false;
		}
    }

	public function index()
	{
        // $data['title'] = 'Dashboard';
        // $data['menu'] = 'dashboard';
        $data = [
            'title' => 'AR.EO',
            'menu' => 'dashboard'
        ];

		$this->load->view('landing/index', $data);
	}
}
