<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('M_auth', 'record');
	}

	public function index()
	{
		if ($this->session->userdata('is_login')) {
			redirect('Profile');
		};

		$this->form_validation->set_rules('username', 'Username', 'required|trim');
		$this->form_validation->set_rules('password', 'Password', 'required|trim');

		if ($this->form_validation->run() == false) {
			$data['name'] = 'Login Page | Sukaraya';
			$this->load->view('Auth/Layout/v_header',$data);
			$this->load->view('Auth/Login/v_login');
		} else {
			$username = $this->input->post('username');
			$password = $this->input->post('password');
			$this->record->Proseslogin($username, $password);
		}
	}

	public function forgotpassword()
	{
		$this->load->view('Auth/ForgotPassword/v_forgotpassword');
	}

	public function logout()
	{
		helper_log("logout", "Logout");
		$this->session->unset_userdata('user_id');
		$this->session->unset_userdata('user_username');
		$this->session->unset_userdata('is_login');
		$this->session->set_flashdata(
			'message',
			'<div class="alert alert-success" role="alert"><b>Success</b> Anda berhasil logout!</div>'
		);
		redirect('Auth');
	}



}