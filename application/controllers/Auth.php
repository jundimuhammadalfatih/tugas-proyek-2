<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {
	public function index()
	{
        // $data['title'] = 'Login';

		$data = [
			'title' => 'AR.EO | Login'
		];

		$this->load->view('login/index', $data);
	}

	public function halaman_regist()
	{

		$data = [
			'title' => 'AR.EO |  Registrasi',
		];

		$this->load->view('login/register', $data);
	}
}