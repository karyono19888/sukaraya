<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class M_auth extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
	}

	public function cek_login()
	{
		if(empty($this->session->userdata('is_login')))
		{
			 $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert"><b>Perhatian!</b> Anda harus login dahulu!</div>');
		 redirect('Auth');
	 }
	}

	public function Proseslogin($username, $password)
	{
		$user = $this->db->get_where('users', ['user_username' => $username])->row_array();

		if ($user) {
			if ($user['user_status'] == 'Aktif') {
				if (password_verify($password, $user['user_password'])) {
					$data = [
						'user_id'    		=> $user['user_id'],
						'user_username'   => $user['user_username'],
						'user_nama'   		=> $user['user_nama'],
						'user_role'  		=> $user['user_role'],
						'is_login' 	 		=> TRUE,
					];
					$this->session->set_userdata($data);

					$this->session->set_flashdata('success', 'Login Berhasil');
					helper_log("login", "Login");
					redirect('Profile');

				} else {
					$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert"><b>Gagal!</b> Username atau Password salah!</div>');
					redirect('Auth');
				}
			} else {
				$this->session->set_flashdata('message', '
				<div class="alert alert-danger" role="alert"><b>Gagal!</b> Akun sudah tidak aktif!</div>
				');
				redirect('Auth');
			}
		} else {
			$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert"><b>Gagal!</b> Akun tidak terdaftar!</div>');
			redirect('Auth');
		}
	}
}