<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kelompok extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('M_auth');
		$this->M_auth->cek_login();
		$this->load->model('M_kelompok', 'record');
	}

	public function index()
	{
		$data['name'] 		= 'Kelompok';
		$data['data'] 		= $this->record->DataTablekelompok();
		$data['total'] 		= $this->record->DataTablekelompokTotal();
		$data['aktif'] 		= $this->record->DataTablekelompokAktif();
		$data['tidakaktif'] = $this->record->DataTablekelompokTidakAktif();
		$this->load->view('Template/v_header',$data);
		$this->load->view('Master/Kelompok/v_kelompok',$data);
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