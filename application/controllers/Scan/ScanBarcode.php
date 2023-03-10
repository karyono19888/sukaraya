<?php
defined('BASEPATH') or exit('No direct script access allowed');

class ScanBarcode extends CI_Controller
{

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
		$this->load->view('Template/v_header', $data);
		$this->load->view('Pages/Data/v_murid', $data);
	}
}