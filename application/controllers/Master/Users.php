<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Users extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('M_auth');
		$this->M_auth->cek_login();
		$this->load->model('M_user', 'record');
	}

	public function index()
	{
		$data['name'] 			= 'Users';
		$data['data'] 			= $this->record->DataTableUser();
		$data['role'] 			= $this->record->DataTableRole();
		$data['total'] 		= $this->record->DataTableUserTotal();
		$data['aktif'] 		= $this->record->DataTableUserAktif();
		$data['tidakaktif'] 	= $this->record->DataTableUserTidakAktif();
		$this->load->view('Template/v_header',$data);
		$this->load->view('Master/User/v_user',$data);
	}

	public function Tambah()
	{
		echo $this->record->Tambah();
	}

	public function Hapus()
	{
		echo $this->record->Hapus();
	}

	public function View()
	{
		echo $this->record->View();
	}

	public function Edit()
	{
		echo $this->record->Edit();
	}

}