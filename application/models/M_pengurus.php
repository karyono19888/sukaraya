<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class M_pengurus extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
	}

	public function totalPengurus()
	{
		return $this->db->get('m_pengurus')->num_rows();
	}
	public function totalPengurusAktif()
	{
		$this->db->where('pengurus_status','Aktif');
		return $this->db->get('m_pengurus')->num_rows();
	}
	public function totalPengurusTidakAktif()
	{
		$this->db->where('pengurus_status','Tidak Aktif');
		return $this->db->get('m_pengurus')->num_rows();
	}

	public function tablePengurus()
	{
		$this->db->order_by('pengurus_id_card','desc');
		$this->db->join('m_dapuan','dapuan_id=pengurus_dapuan','left');
		$this->db->join('m_kelompok','kel_id=pengurus_kelompok','left');
		return $this->db->get('m_pengurus');
	}

	public function DataPengurusEdit($id)
	{
	
		$this->db->join('m_dapuan','dapuan_id=pengurus_dapuan','left');
		$this->db->join('m_kelompok','kel_id=pengurus_kelompok','left');
		return $this->db->get_where('m_pengurus',['pengurus_id'=>$id])->row_array();
	}

	public function Dapuan($searchTerm="")
	{
		$this->db->select('*');
		$this->db->where("dapuan_nama like '%" . $searchTerm . "%' ");
		$this->db->where('dapuan_status','Aktif');
		$this->db->order_by('dapuan_id', 'asc');
		$fetched_records = $this->db->get('m_dapuan');
		$datawil = $fetched_records->result_array();
		$data = array();
		foreach ($datawil as $wil) {
			$data[] = array(
				"id"   => $wil['dapuan_id'],	
				"text" => $wil['dapuan_nama']
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

	public function DataKodePengurusBaru()
	{
		$this->db->select('RIGHT(m_pengurus.pengurus_id_card,4) as kodereq', FALSE);
		$this->db->order_by('pengurus_id_card', 'DESC');
		$this->db->limit(1);
		$query = $this->db->get('m_pengurus');  //cek dulu apakah ada sudah ada kode di tabel.
		if ($query->num_rows() <> 0) {
			//cek kode jika telah tersedia
			$data = $query->row();
			$kode = intval($data->kodereq) + 1;
		} else {
			$kode = 1;  //cek jika kode belum terdapat pada table
		}
		$batas = str_pad($kode, 4, "0", STR_PAD_LEFT);
		$kodetampil = "5435" . $batas;  //format kode
		return $kodetampil;
	}

	public function Tambah()
	{
		$pengurus_nama 		= $this->input->post('pengurus_nama');
		$pengurus_jk 		= $this->input->post('pengurus_jk');
		$pengurus_id_card 	= $this->input->post('pengurus_id_card');
		$pengurus_kelompok 	= $this->input->post('pengurus_kelompok');
		$pengurus_dapuan 	= $this->input->post('pengurus_dapuan');
		$pengurus_no_tlpn 	= $this->input->post('pengurus_no_tlpn');
		$pengurus_status 	= $this->input->post('pengurus_status');

		$this->db->trans_start();
		$this->db->insert('m_pengurus',array(
		'pengurus_nama'      => ucwords($pengurus_nama),
		'pengurus_jk'    	 => $pengurus_jk,
		'pengurus_id_card'   => $pengurus_id_card,
		'pengurus_kelompok'  => $pengurus_kelompok,
		'pengurus_dapuan'  	 => $pengurus_dapuan,
		'pengurus_no_tlpn'   => $pengurus_no_tlpn,
		'pengurus_status'    => $pengurus_status,
		'created_at'      	 => time(),
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
		$pengurus_nama 		= $this->input->post('pengurus_nama');
		$pengurus_jk 		= $this->input->post('pengurus_jk');
		$pengurus_id_card 	= $this->input->post('pengurus_id_card');
		$pengurus_kelompok 	= $this->input->post('pengurus_kelompok');
		$pengurus_dapuan 	= $this->input->post('pengurus_dapuan');
		$pengurus_no_tlpn 	= $this->input->post('pengurus_no_tlpn');
		$pengurus_status 	= $this->input->post('pengurus_status');

		$this->db->trans_start();
		$this->db->where('pengurus_id_card',$pengurus_id_card);
		$this->db->update('m_pengurus',array(
		'pengurus_nama'     => ucwords($pengurus_nama),
		'pengurus_jk'    	=> $pengurus_jk,
		'pengurus_id_card'  => $pengurus_id_card,
		'pengurus_kelompok' => $pengurus_kelompok,
		'pengurus_dapuan' 	=> $pengurus_dapuan,
		'pengurus_no_tlpn'  => $pengurus_no_tlpn,
		'pengurus_status'   => $pengurus_status,
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
		$this->db->delete('m_pengurus', array('pengurus_id' => $id));
		$this->db->trans_complete();
		if($this->db->trans_status() === FALSE){
				return json_encode(array('success'=>false, 'msg'=>'Hapus data gagal!'));
		}else {
				return json_encode(array('success'=>true, 'msg'=>'Hapus data berhasil!'));
		}

	}
}