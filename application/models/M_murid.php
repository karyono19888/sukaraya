<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class M_murid extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
	}

	public function totalMurid()
	{
		return $this->db->get('m_murid')->num_rows();
	}
	public function totalMuridAktif()
	{
		$this->db->where('murid_status','Aktif');
		return $this->db->get('m_murid')->num_rows();
	}
	public function totalMuridTidakAktif()
	{
		$this->db->where('murid_status','Tidak Aktif');
		return $this->db->get('m_murid')->num_rows();
	}

	public function tablemurid()
	{
		$this->db->order_by('murid_id','desc');
		return $this->db->get('m_murid');
	}
}