<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboards extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('M_auth');
		$this->M_auth->cek_login();
		$this->load->model('M_auth', 'record');
	}

	public function index()
	{
		$data['name'] = 'Dashboards';
		$this->load->view('Template/v_header',$data);
		$this->load->view('Dashboards/v_index');
	}
}