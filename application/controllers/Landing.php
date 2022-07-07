<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Landing extends CI_Controller {

    function __construct()
    {
        parent::__construct();
        if ($this->session->has_userdata('email')) {
			if ($this->session->userdata('role') == 'administrator') {
				redirect('dashboard');
			} else {
				redirect('peserta');
			}
			return false;
		}
    }

	public function index()
	{
        $data['title'] = 'AR.EO';

		$data['kegiatan'] = $this->db->select('kegiatan.*, jenis_kegiatan.nama')->from('kegiatan')->join('jenis_kegiatan', 'jenis_kegiatan.id = kegiatan.jenis_id')->order_by('kegiatan.id', 'DESC')->get()->result();
		$this->load->view('landing/index', $data);
	}
}
