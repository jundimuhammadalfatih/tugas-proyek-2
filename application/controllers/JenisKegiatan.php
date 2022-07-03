<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class JenisKegiatan extends CI_Controller {
	public function index()
	{
        $data['title'] = 'Jenis Kegiatan';
        $data['menu'] = 'jenis_kegiatan';
		$this->load->view('templates/admin/header.php', $data);
		$this->load->view('jenis_kegiatan/index.php', $data);
		$this->load->view('templates/admin/footer.php');
	}
}