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
		$this->db->order_by('murid_kartu_id','desc');
		$this->db->join('m_kelompok','kel_id=murid_kelompok','left');
		$this->db->join('m_kelas','kelas_id=murid_kelas','left');
		$this->db->join('m_pendidikan2','pend_id=murid_pendidikan','left');
		return $this->db->get('m_murid');
	}

	public function DataMuridEdit($id)
	{
	
		$this->db->join('m_kelompok','kel_id=murid_kelompok','left');
		$this->db->join('m_kelas','kelas_id=murid_kelas','left');
		$this->db->join('m_pendidikan2','pend_id=murid_pendidikan','left');
		return $this->db->get_where('m_murid',['murid_id'=>$id])->row_array();
	}

	public function Pendidikan($searchTerm="")
	{
		$this->db->select('*');
		$this->db->where("pend_nama like '%" . $searchTerm . "%' ");
		$this->db->where('pend_status','Aktif');
		$this->db->order_by('pend_id', 'asc');
		$fetched_records = $this->db->get('m_pendidikan2');
		$datawil = $fetched_records->result_array();
		$data = array();
		foreach ($datawil as $wil) {
			$data[] = array(
				"id"   => $wil['pend_id'],
				"text" => $wil['pend_nama']
			);
		}
		return $data;
	}
	public function Kelas($searchTerm="")
	{
		$this->db->select('*');
		$this->db->where("kelas_nama like '%" . $searchTerm . "%' ");
		$this->db->where('kelas_status','Aktif');
		$this->db->order_by('kelas_id', 'asc');
		$fetched_records = $this->db->get('m_kelas');
		$datawil = $fetched_records->result_array();
		$data = array();
		foreach ($datawil as $wil) {
			$data[] = array(
				"id"   => $wil['kelas_id'],
				"text" => $wil['kelas_nama']
			);
		}
		return $data;
	}
	public function Kelompok($searchTerm="")
	{
		$this->db->select('*');
		$this->db->where("kel_nama like '%" . $searchTerm . "%' ");
		$this->db->where('kel_status','Aktif');
		$this->db->order_by('kel_id', 'asc');
		$fetched_records = $this->db->get('m_kelompok');
		$datawil = $fetched_records->result_array();
		$data = array();
		foreach ($datawil as $wil) {
			$data[] = array(
				"id"   => $wil['kel_id'],	
				"text" => $wil['kel_nama']
			);
		}
		return $data;
	}

	public function DataKodeMuridBaru()
	{
		$this->db->select('RIGHT(m_murid.murid_kartu_id,4) as kodereq', FALSE);
		$this->db->order_by('murid_kartu_id', 'DESC');
		$this->db->limit(1);
		$query = $this->db->get('m_murid');  //cek dulu apakah ada sudah ada kode di tabel.
		if ($query->num_rows() <> 0) {
			//cek kode jika telah tersedia
			$data = $query->row();
			$kode = intval($data->kodereq) + 1;
		} else {
			$kode = 1;  //cek jika kode belum terdapat pada table
		}
		$batas = str_pad($kode, 4, "0", STR_PAD_LEFT);
		$kodetampil = "5433" . $batas;  //format kode
		return $kodetampil;
	}

	public function Tambah()
	{
		$murid_nama 		= $this->input->post('murid_nama');
		$murid_jk 			= $this->input->post('murid_jk');
		$murid_tgl_lahir 	= $this->input->post('murid_tgl_lahir');
		$murid_pendidikan 	= $this->input->post('murid_pendidikan');
		$murid_kelompok 	= $this->input->post('murid_kelompok');
		$murid_kelas 		= $this->input->post('murid_kelas');
		$murid_wali 		= $this->input->post('murid_wali');
		$murid_no_wali 		= $this->input->post('murid_no_wali');
		$murid_status 		= $this->input->post('murid_status');
		$murid_kartu_id 	= $this->input->post('murid_kartu_id');

		$this->db->trans_start();
		$this->db->insert('m_murid',array(
		'murid_nama'      	=> ucwords($murid_nama),
		'murid_jk'    		=> $murid_jk,
		'murid_tgl_lahir'   => $murid_tgl_lahir,
		'murid_pendidikan'  => $murid_pendidikan,
		'murid_kelompok'    => $murid_kelompok,
		'murid_kelas'    	=> $murid_kelas,
		'murid_no_wali'   	=> $murid_no_wali,
		'murid_wali'      	=> ucwords($murid_wali),
		'murid_status'    	=> $murid_status,
		'murid_kartu_id'    => $murid_kartu_id,
		'created_at'      	=> time(),
		));
		$this->db->trans_complete();
		if($this->db->trans_status() === FALSE){
			return json_encode(array('success'=>false, 'msg'=>'Input data gagal!'));
		}else {
			return json_encode(array('success'=>true, 'msg'=>'Input data berhasil!'));
		}
	}

	public function Edit()
	{
		$murid_nama 		= $this->input->post('murid_nama');
		$murid_jk 			= $this->input->post('murid_jk');
		$murid_tgl_lahir 	= $this->input->post('murid_tgl_lahir');
		$murid_pendidikan 	= $this->input->post('murid_pendidikan');
		$murid_kelompok 	= $this->input->post('murid_kelompok');
		$murid_kelas 		= $this->input->post('murid_kelas');
		$murid_wali 		= $this->input->post('murid_wali');
		$murid_no_wali 		= $this->input->post('murid_no_wali');
		$murid_status 		= $this->input->post('murid_status');
		$murid_kartu_id 	= $this->input->post('murid_kartu_id');

		$this->db->trans_start();
		$this->db->where('murid_kartu_id',$murid_kartu_id);
		$this->db->update('m_murid',array(
		'murid_nama'      	=> ucwords($murid_nama),
		'murid_jk'    		=> $murid_jk,
		'murid_tgl_lahir'   => $murid_tgl_lahir,
		'murid_pendidikan'  => $murid_pendidikan,
		'murid_kelompok'    => $murid_kelompok,
		'murid_kelas'    	=> $murid_kelas,
		'murid_no_wali'   	=> $murid_no_wali,
		'murid_wali'      	=> ucwords($murid_wali),
		'murid_status'    	=> $murid_status,
		'murid_kartu_id'    => $murid_kartu_id,
		'created_at'      	=> time(),
		));
		$this->db->trans_complete();
		if($this->db->trans_status() === FALSE){
			return json_encode(array('success'=>false, 'msg'=>'Input data gagal!'));
		}else {
			return json_encode(array('success'=>true, 'msg'=>'Input data berhasil!'));
		}
	}

	public function Hapus()
	{
		$id 		= $this->input->post('id');

		$this->db->trans_start();
		$this->db->delete('m_murid', array('murid_id' => $id));
		$this->db->trans_complete();
		if($this->db->trans_status() === FALSE){
				return json_encode(array('success'=>false, 'msg'=>'Hapus murid gagal!'));
		}else {
				return json_encode(array('success'=>true, 'msg'=>'Hapus murid berhasil!'));
		}

	}
}