<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pendidikan extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('M_auth');
		$this->M_auth->cek_login();
		$this->load->model('M_pendidikan', 'record');
	}

	public function index()
	{
		$data['name'] 			= 'Pendidikan';
		$data['data'] 			= $this->record->DataTablePendidikan();
		$data['total'] 		= $this->record->DataTablePendidikanTotal();
		$data['aktif'] 		= $this->record->DataTablePendidikanAktif();
		$data['tidakaktif'] 	= $this->record->DataTablePendidikanTidakAktif();
		$this->load->view('Template/v_header',$data);
		$this->load->view('Master/Pendidikan/v_pendidikan',$data);
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