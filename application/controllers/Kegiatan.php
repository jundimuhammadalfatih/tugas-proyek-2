<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kegiatan extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		if (!$this->session->has_userdata('email') && $this->session->userdata('role') != 'administrator') {
			redirect('auth');
		}
	}

	public function index()
	{
        $data['title'] = 'Kegiatan';
        $data['menu'] = 'kegiatan';
		$data['jenis_kegiatan'] = $this->db->get('jenis_kegiatan')->result();
		$data['kegiatan'] = $this->db->select('kegiatan.*, jenis_kegiatan.nama')->from('kegiatan')->join('jenis_kegiatan', 'jenis_kegiatan.id = kegiatan.jenis_id')->order_by('kegiatan.id', 'DESC')->get()->result();
		$this->load->view('templates/admin/header.php', $data);
		$this->load->view('kegiatan/index.php', $data);
		$this->load->view('templates/admin/footer.php');
	}

	public function kegiatanTerdaftar()
	{
		$data['title'] = 'Kegiatan Terdaftar';
        $data['menu'] = 'kegiatan_terdaftar';
		$data['kegiatan'] = $this->db->select('daftar.*, users.username, users.email, kegiatan.judul, kategori_peserta.nama')->from('daftar')
							->join('users', 'users.id = daftar.users_id')
							->join('kegiatan', 'kegiatan.id = daftar.kegiatan_id')
							->join('kategori_peserta', 'kategori_peserta.id = daftar.kategori_peserta_id')
							->order_by('daftar.id', 'DESC')
							->get()->result();
		$this->load->view('templates/admin/header.php', $data);
		$this->load->view('kegiatan/kelola_kegiatan.php', $data);
		$this->load->view('templates/admin/footer.php');
	}

	public function insert()
	{
		$this->form_validation->set_rules('judul', 'Judul', 'required|trim|is_unique[kegiatan.judul]');
		$this->form_validation->set_rules('kapasitas', 'Kapasitas', 'required|integer');
		$this->form_validation->set_rules('harga_tiket', 'Harga Tiket', 'required|integer');
		$this->form_validation->set_rules('tanggal', 'Tanggal', 'required');
		$this->form_validation->set_rules('narasumber', 'Narasumber', 'required');
		$this->form_validation->set_rules('tempat', 'Tempat', 'required');
		$this->form_validation->set_rules('pic', 'PIC', 'required');
		$this->form_validation->set_rules('jenis_kegiatan', 'Jenis Kegiatan', 'required');
		if ($this->form_validation->run() == FALSE) {
			$this->session->set_flashdata('pesan',
				'<div class="alert alert-danger alert-dismissible fade show" role="alert">
					'.validation_errors().'
					<button class="close" type="button" data-dismiss="alert" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>'
			);
			redirect('kegiatan');
		} else {
			// cek jika ada gambar yang akan diupload
            $upload_image = $_FILES['foto_flyer']['name'];
            if (!$upload_image) {
				redirect('kegiatan');
			} else {
				$config['allowed_types'] = 'jpeg|jpg|png';
				$config['max_size']      = '2048';
				$config['upload_path']   = './assets/img_kegiatan/';
				$this->load->library('upload', $config);
				if (!$this->upload->do_upload('foto_flyer')) {
					$this->session->set_flashdata('pesan',
						'<div class="alert alert-danger alert-dismissible fade show" role="alert">
							'.$this->upload->display_errors().'
							<button class="close" type="button" data-dismiss="alert" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>'
					);
					redirect('kegiatan');
				} else {
					$new_image = $this->upload->data('file_name');
					$this->db->insert('kegiatan', [
						'judul' => $this->input->post('judul', true),
						'kapasitas' => $this->input->post('kapasitas', true),
						'harga_tiket' => $this->input->post('harga_tiket', true),
						'tanggal' => $this->input->post('tanggal', true),
						'narasumber' => $this->input->post('narasumber', true),
						'tempat' => $this->input->post('tempat', true),
						'pic' => $this->input->post('pic', true),
						'foto_flyer' => $new_image,
						'jenis_id' => $this->input->post('jenis_kegiatan', true),
					]);

					$this->session->set_flashdata('pesan',
						'<div class="alert alert-success alert-dismissible fade show" role="alert">
							Data berhasil Ditambahkan
							<button class="close" type="button" data-dismiss="alert" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>'
					);
					redirect('kegiatan');
				}
            }
		}
	}

	public function update()
	{
		$id = $this->input->post('id');
		$this->form_validation->set_rules('judul', 'Judul', 'required|trim|edit_unique[kegiatan.judul.id.'.$id.']');
		$this->form_validation->set_rules('kapasitas', 'Kapasitas', 'required|integer');
		$this->form_validation->set_rules('harga_tiket', 'Harga Tiket', 'required|integer');
		$this->form_validation->set_rules('tanggal', 'Tanggal', 'required');
		$this->form_validation->set_rules('narasumber', 'Narasumber', 'required');
		$this->form_validation->set_rules('tempat', 'Tempat', 'required');
		$this->form_validation->set_rules('pic', 'PIC', 'required');
		$this->form_validation->set_rules('jenis_kegiatan', 'Jenis Kegiatan', 'required');
		if ((!isset($id) || empty($id)) || $this->form_validation->run() == FALSE) {
			$this->session->set_flashdata('pesan',
				'<div class="alert alert-danger alert-dismissible fade show" role="alert">
					'.validation_errors().'
					<button class="close" type="button" data-dismiss="alert" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>'
			);
			redirect('kegiatan');
		} else {
			$kegiatan = $this->db->where('id', $id)->get('kegiatan')->result();
			if (count($kegiatan) == 0) {
				redirect('kegiatan');
			} else {
				// cek jika ada gambar yang akan diupload
				$upload_image = $_FILES['foto_flyer']['name'];
				if (!$upload_image) {
					redirect('kegiatan');
				} else {
					$config['allowed_types'] = 'jpeg|jpg|png';
					$config['max_size']      = '2048';
					$config['upload_path']   = './assets/img_kegiatan/';
					$this->load->library('upload', $config);
					if (!$this->upload->do_upload('foto_flyer')) {
						$this->session->set_flashdata('pesan',
							'<div class="alert alert-danger alert-dismissible fade show" role="alert">
								'.$this->upload->display_errors().'
								<button class="close" type="button" data-dismiss="alert" aria-label="Close">
									<span aria-hidden="true">&times;</span>
								</button>
							</div>'
						);
						redirect('kegiatan');
					} else {
						$old_image = $kegiatan[0]->foto_flyer;
						unlink(FCPATH . 'assets/img_kegiatan/' . $old_image);

						$new_image = $this->upload->data('file_name');
						$this->db->update('kegiatan', [
							'judul' => $this->input->post('judul', true),
							'kapasitas' => $this->input->post('kapasitas', true),
							'harga_tiket' => $this->input->post('harga_tiket', true),
							'tanggal' => $this->input->post('tanggal', true),
							'narasumber' => $this->input->post('narasumber', true),
							'tempat' => $this->input->post('tempat', true),
							'pic' => $this->input->post('pic', true),
							'foto_flyer' => $new_image,
							'jenis_id' => $this->input->post('jenis_kegiatan', true),
						], ['id' => $id]);

						$this->session->set_flashdata('pesan',
							'<div class="alert alert-success alert-dismissible fade show" role="alert">
								Data berhasil Diedit
								<button class="close" type="button" data-dismiss="alert" aria-label="Close">
									<span aria-hidden="true">&times;</span>
								</button>
							</div>'
						);
						redirect('kegiatan');
					}
				}
			}
		}
	}

	public function delete($id)
	{
		if (!isset($id) || empty($id))
		{
			redirect('kegiatan');
		}
		else
		{
			$this->db->delete('kegiatan', ['id' => $id]);

			$this->session->set_flashdata('pesan',
				'<div class="alert alert-success alert-dismissible fade show" role="alert">
					Data berhasil Dihapus
					<button class="close" type="button" data-dismiss="alert" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>'
			);
			redirect('kegiatan');
		}
	}
}