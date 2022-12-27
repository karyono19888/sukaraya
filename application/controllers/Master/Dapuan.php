<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dapuan extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('M_auth');
		$this->M_auth->cek_login();
		$this->load->model('M_dapuan', 'record');
	}

	public function index()
	{
		$data['name'] 			= "Dapu'an";
		$data['data'] 			= $this->record->DataTableDapuan();
		$data['total'] 		= $this->record->DataTableDapuanTotal();
		$data['aktif'] 		= $this->record->DataTableDapuanAktif();
		$data['tidakaktif'] 	= $this->record->DataTableDapuanTidakAktif();
		$this->load->view('Template/v_header',$data);
		$this->load->view('Master/Dapuan/v_dapuan',$data);
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