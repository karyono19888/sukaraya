<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Murid extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('M_auth');
		$this->M_auth->cek_login();
		$this->load->model('Kartu/M_murid_kartu', 'record');
	}

	public function index()
	{
		$data['name'] 			= 'Kartu Murid';
		$data['data'] 			= $this->record->DataTableKartu();
		$data['total'] 		= $this->record->DataTableKartuTotal();
		$data['aktif'] 		= $this->record->DataTableKartuAktif();
		$data['tidakaktif'] 	= $this->record->DataTableKartuTidakAktif();
		$this->load->view('Template/v_header', $data);
		$this->load->view('Master/Kartu/v_kartu_murid', $data);
	}

	public function Generate()
	{
		echo $this->record->Generate();
	}

	public function ViewUpload()
	{
		echo $this->record->ViewUpload();
	}

	public function UploadFoto()
	{
		echo $this->record->UploadFoto();
	}
}