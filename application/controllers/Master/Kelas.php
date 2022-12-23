<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kelas extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('M_auth');
		$this->M_auth->cek_login();
		$this->load->model('M_kelas', 'record');
	}

	public function index()
	{
		$data['name'] 			= 'Kelas';
		$data['data'] 			= $this->record->DataTableKelas();
		$data['total'] 		= $this->record->DataTableKelasTotal();
		$data['aktif'] 		= $this->record->DataTableKelasAktif();
		$data['tidakaktif'] 	= $this->record->DataTableKelasTidakAktif();
		$this->load->view('Template/v_header',$data);
		$this->load->view('Master/Kelas/v_kelas',$data);
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