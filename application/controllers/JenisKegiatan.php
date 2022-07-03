<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class JenisKegiatan extends CI_Controller {
	public function index()
	{
        $data['title'] = 'Jenis Kegiatan';
        $data['menu'] = 'jenis_kegiatan';
		$data['jenis_kegiatan'] = $this->db->get('jenis_kegiatan')->result();
		$this->load->view('templates/admin/header.php', $data);
		$this->load->view('jenis_kegiatan/index.php', $data);
		$this->load->view('templates/admin/footer.php');
	}
}