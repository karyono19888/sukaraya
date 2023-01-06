<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pengajar extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('M_auth');
		$this->M_auth->cek_login();
		$this->load->model('M_pengajar', 'record');
	}

	public function index()
	{
		$data['name'] 			= 'Pengajar';
		$data['pengajar'] 		= $this->record->tablePengajar();
		$data['total'] 		= $this->record->totalPengajar();
		$data['aktif'] 		= $this->record->totalPengajarAktif();
		$data['tidakaktif'] 	= $this->record->totalPengajarTidakAktif();
		$this->load->view('Template/v_header',$data);
		$this->load->view('Pages/Data/Pengajar/v_pengajar',$data);
	}

	public function Kelompok()
	{
		$searchTerm = $this->input->post('searchTerm');
		$response   = $this->record->Kelompok($searchTerm);
		echo json_encode($response);
	}

	public function ShowTambah()
	{
		$data['name'] 			= 'Tambah Pengajar';
		$data['kode'] 		= $this->record->DataKodePengajarBaru();
		$data['total'] 		= $this->record->totalPengajar();
		$data['aktif'] 		= $this->record->totalPengajarAktif();
		$data['tidakaktif'] = $this->record->totalPengajarTidakAktif();
		$this->load->view('Template/v_header',$data);
		$this->load->view('Pages/Data/Pengajar/v_showTambahPengajar',$data);
	}

	public function ShowEditPengajar($id)
	{
		$data['name'] 			= 'Edit Pengajar';
		$data['data'] 		= $this->record->DataPengajarEdit($id);
		$data['total'] 		= $this->record->totalPengajar();
		$data['aktif'] 		= $this->record->totalPengajarAktif();
		$data['tidakaktif'] = $this->record->totalPengajarTidakAktif();
		$this->load->view('Template/v_header',$data);
		$this->load->view('Pages/Data/Pengajar/v_showEditPengajar',$data);
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