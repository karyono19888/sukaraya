<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profile extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('M_auth');
		$this->M_auth->cek_login();
		$this->load->model('M_profile', 'record');
	}

	public function index()
	{
		$data['name'] 		= 'Profile';
		$data['murid'] 	= $this->record->totalMurid();
		$data['pengurus'] = $this->record->totalPengurus();
		$data['pengajar'] = $this->record->totalPengajar();
		$data['log'] 		= $this->record->tablelog();

		$this->load->view('Template/v_header',$data);
		$this->load->view('Profile/v_profile',$data);
		$this->load->view('Template/v_footer');
		$this->load->view('Template/v_bottom-footer');
		$this->load->view('Template/v_bottom');
	}

	public function edit($id)
	{
		$data['name'] = 'Edit Profile';
		$data['edit'] = $this->record->EditProfile($id);

		$this->load->view('Template/v_header',$data);
		$this->load->view('Profile/v_edit-profile',$data);
	}

	public function SubmitEditProfile()
	{
		echo $this->record->SubmitEditProfile();
	}

	public function SubmitUbahPassword()
	{
		echo $this->record->SubmitUbahPassword();
	}
}