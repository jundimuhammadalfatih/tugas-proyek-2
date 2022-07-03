<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kegiatan extends CI_Controller {
	public function index()
	{
        $data['title'] = 'Kegiatan';
        $data['menu'] = 'kegiatan';
		$data['kegiatan'] = $this->db->get('kegiatan')->result();
		$this->load->view('templates/admin/header.php', $data);
		$this->load->view('kegiatan/index.php', $data);
		$this->load->view('templates/admin/footer.php');
	}
}