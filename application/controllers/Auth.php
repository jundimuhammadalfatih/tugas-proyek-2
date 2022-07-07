<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {


	public function index()
	{
		if ($this->session->has_userdata('email')) {
			if ($this->session->userdata('role') == 'administrator') {
				redirect('dashboard');
			} else {
				redirect('peserta');
			}
			return false;
		}

		$this->form_validation->set_rules('email', 'Email', 'required');
		$this->form_validation->set_rules('password', 'Password', 'required');
		if ($this->form_validation->run() == FALSE)
		{
			$data = [
				'title' => 'AR.EO | Login'
			];
			$this->load->view('auth/index', $data);
		}
		else
		{
			$email = $this->input->post('email');
			$checkUser = $this->db->where('email', $email)->get('users')->result();
			if (count($checkUser) == 0) {
				$this->session->set_flashdata('pesan',
					'<div class="alert alert-danger alert-dismissible fade show" role="alert">
						Email yang anda masukkan salah
					</div>'
				);
				redirect('auth');
			} else {
				$password = $this->input->post('password');
				// cek password
				if (password_verify($password, $checkUser[0]->password)) {
					$this->db->update('users', ['last_login' => date('Y-m-d H:i:s')], ['id' => $checkUser[0]->id]);

					$this->session->set_userdata([
						'user_id' => $checkUser[0]->id,
						'username' => $checkUser[0]->username,
						'email' => $checkUser[0]->email,
						'role' => $checkUser[0]->role
					]);
					if ($checkUser[0]->role == 'administrator') {
						redirect('dashboard');
					} else {
						redirect('peserta');
					}
				} else{
					$this->session->set_flashdata('pesan', 
						'<div class="alert alert-danger alert-dismissible fade show" role="alert">
							Email atau Password yang anda masukkan salah
						</div>'
					);
					redirect('auth');
				}
			}
		}
	}

	public function registrasi()
	{
		if ($this->session->has_userdata('email')) {
			if ($this->session->userdata('role') == 'administrator') {
				redirect('dashboard');
			} else {
				redirect('peserta');
			}
			return false;
		}

		$this->form_validation->set_rules('username', 'Username', 'required');
		$this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[users.email]', [
			'is_unique' => 'Email already registered!'
		]);
		$this->form_validation->set_rules('password', 'Password', 'required|trim|min_length[8]|matches[cpassword]');
		$this->form_validation->set_rules('cpassword', 'Confirm Password', 'required|trim|matches[password]');
		if ($this->form_validation->run() == FALSE)
		{
			$data = [
				'title' => 'AR.EO |  Registrasi',
			];
			$this->load->view('auth/register', $data);
		}
		else
		{
			$username = $this->input->post('username', true);
			$email = $this->input->post('email', true);
			$password = $this->input->post('password', true);
			$data = [
				'username' => htmlspecialchars($username),
				'email' => htmlspecialchars($email),
				'password' => password_hash($password, PASSWORD_DEFAULT),
				'role' => 'public',
				'status' => 0,
				'created_at' => date('Y-m-d H:i:s')
			];
            $this->db->insert('users', $data);
			$this->session->set_flashdata('pesan', 
				'<div class="alert alert-success alert-dismissible fade show" role="alert">
					Akun anda berhasil diregistrasi
				</div>'
			);
			redirect('auth');
		}
	}

	public function logout()
	{
		$this->session->sess_destroy();
		redirect('auth');
	}
}