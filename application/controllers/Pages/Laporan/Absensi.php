<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Absensi extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('M_auth');
		$this->M_auth->cek_login();
		$this->load->model('M_auth', 'record');
	}

	public function index()
	{
		$data['name'] = 'Absensi';
		$this->load->view('Template/v_header',$data);
		$this->load->view('Pages/Laporan/v_absensi');
	}
}