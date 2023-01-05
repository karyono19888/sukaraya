<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Murid extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('M_auth');
		$this->M_auth->cek_login();
		$this->load->model('M_murid', 'record');
	}

	public function index()
	{
		$data['name'] 			= 'Murid';
		$data['murid'] 		= $this->record->tableMurid();
		$data['total'] 		= $this->record->totalMurid();
		$data['aktif'] 		= $this->record->totalMuridAktif();
		$data['tidakaktif'] 	= $this->record->totalMuridTidakAktif();
		$this->load->view('Template/v_header',$data);
		$this->load->view('Pages/Data/v_murid',$data);
	}

	public function Pendidikan()
	{
		$searchTerm = $this->input->post('searchTerm');
		$response   = $this->record->Pendidikan($searchTerm);
		echo json_encode($response);
	}
	
	public function Kelas()
	{
		$searchTerm = $this->input->post('searchTerm');
		$response   = $this->record->Kelas($searchTerm);
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
		$data['name'] 			= 'Tambah Murid';
		$data['kode'] 		= $this->record->DataKodeMuridBaru();
		$data['total'] 		= $this->record->totalMurid();
		$data['aktif'] 		= $this->record->totalMuridAktif();
		$data['tidakaktif'] = $this->record->totalMuridTidakAktif();
		$this->load->view('Template/v_header',$data);
		$this->load->view('Pages/Data/v_showTambahmurid',$data);
	}

	public function ShowEditMurid($id)
	{
		$data['name'] 			= 'Edit Murid';
		$data['data'] 		= $this->record->DataMuridEdit($id);
		$data['total'] 		= $this->record->totalMurid();
		$data['aktif'] 		= $this->record->totalMuridAktif();
		$data['tidakaktif'] = $this->record->totalMuridTidakAktif();
		$this->load->view('Template/v_header',$data);
		$this->load->view('Pages/Data/v_showEditmurid',$data);
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