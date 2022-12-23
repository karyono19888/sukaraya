<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kartu extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('M_auth');
		$this->M_auth->cek_login();
		$this->load->model('M_user', 'record');
	}

	public function index()
	{
		$data['name'] 			= 'Kartu';
		$this->load->view('Template/v_header',$data);
		$this->load->view('Master/Kartu/v_kartu',$data);
	}
}