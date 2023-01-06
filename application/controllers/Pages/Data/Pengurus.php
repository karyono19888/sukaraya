<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pengurus extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('M_auth');
		$this->M_auth->cek_login();
		$this->load->model('M_pengurus', 'record');
	}

	public function index()
	{
		$data['name'] 		= 'Pengurus';
		$data['pengurus'] 	= $this->record->tablePengurus();
		$data['total'] 		= $this->record->totalPengurus();
		$data['aktif'] 		= $this->record->totalPengurusAktif();
		$data['tidakaktif'] = $this->record->totalPengurusTidakAktif();
		$this->load->view('Template/v_header',$data);
		$this->load->view('Pages/Data/Pengurus/v_pengurus',$data);
	}

	
	public function Dapuan()
	{
		$searchTerm = $this->input->post('searchTerm');
		$response   = $this->record->Dapuan($searchTerm);
		echo json_encode($response);
	}

	
	public function Kelompok()
	{
		$searchTerm = $this->input->post('searchTerm');
		$response   = $this->record->Kelompok($searchTerm);
		echo json_encode($response);
	}

	public function ShowTambah()
	{
		$data['name'] 			= 'Tambah Pengurus';
		$data['kode'] 		= $this->record->DataKodePengurusBaru();
		$data['total'] 		= $this->record->totalPengurus();
		$data['aktif'] 		= $this->record->totalPengurusAktif();
		$data['tidakaktif'] = $this->record->totalPengurusTidakAktif();
		$this->load->view('Template/v_header',$data);
		$this->load->view('Pages/Data/Pengurus/v_showTambahPengurus',$data);
	}

	public function ShowEditPengurus($id)
	{
		$data['name'] 			= 'Edit Pengurus';
		$data['data'] 		= $this->record->DataPengurusEdit($id);
		$data['total'] 		= $this->record->totalPengurus();
		$data['aktif'] 		= $this->record->totalPengurusAktif();
		$data['tidakaktif'] = $this->record->totalPengurusTidakAktif();
		$this->load->view('Template/v_header',$data);
		$this->load->view('Pages/Data/Pengurus/v_showEditPengurus',$data);
	}

	public function Tambah()
	{
		echo $this->record->Tambah();
	}

	public function Edit()
	{
		echo $this->record->Edit();
	}

	public function Hapus()
	{
		echo $this->record->Hapus();
	}
}