<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class M_pengajar extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
	}

	public function totalPengajar()
	{
		return $this->db->get('m_pengajar')->num_rows();
	}
	public function totalPengajarAktif()
	{
		$this->db->where('pengajar_status','Aktif');
		return $this->db->get('m_pengajar')->num_rows();
	}
	public function totalPengajarTidakAktif()
	{
		$this->db->where('pengajar_status','Tidak Aktif');
		return $this->db->get('m_pengajar')->num_rows();
	}

	public function tablePengajar()
	{
		$this->db->order_by('pengajar_id_card','desc');
		$this->db->join('m_kelompok','kel_id=pengajar_kelompok','left');
		return $this->db->get('m_pengajar');
	}

	public function DataPengajarEdit($id)
	{
	
		$this->db->join('m_kelompok','kel_id=pengajar_kelompok','left');
		return $this->db->get_where('m_pengajar',['pengajar_id'=>$id])->row_array();
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

	public function DataKodePengajarBaru()
	{
		$this->db->select('RIGHT(m_pengajar.pengajar_id_card,4) as kodereq', FALSE);
		$this->db->order_by('pengajar_id_card', 'DESC');
		$this->db->limit(1);
		$query = $this->db->get('m_pengajar');  //cek dulu apakah ada sudah ada kode di tabel.
		if ($query->num_rows() <> 0) {
			//cek kode jika telah tersedia
			$data = $query->row();
			$kode = intval($data->kodereq) + 1;
		} else {
			$kode = 1;  //cek jika kode belum terdapat pada table
		}
		$batas = str_pad($kode, 4, "0", STR_PAD_LEFT);
		$kodetampil = "5434" . $batas;  //format kode
		return $kodetampil;
	}

	public function Tambah()
	{
		$pengajar_nama 		= $this->input->post('pengajar_nama');
		$pengajar_jk 		= $this->input->post('pengajar_jk');
		$pengajar_id_card 	= $this->input->post('pengajar_id_card');
		$pengajar_kelompok 	= $this->input->post('pengajar_kelompok');
		$pengajar_no_tlpn 	= $this->input->post('pengajar_no_tlpn');
		$pengajar_status 	= $this->input->post('pengajar_status');

		$this->db->trans_start();
		$this->db->insert('m_pengajar',array(
		'pengajar_nama'      => ucwords($pengajar_nama),
		'pengajar_jk'    	 => $pengajar_jk,
		'pengajar_id_card'   => $pengajar_id_card,
		'pengajar_kelompok'  => $pengajar_kelompok,
		'pengajar_no_tlpn'   => $pengajar_no_tlpn,
		'pengajar_status'    => $pengajar_status,
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
		$pengajar_nama 		= $this->input->post('pengajar_nama');
		$pengajar_jk 		= $this->input->post('pengajar_jk');
		$pengajar_id_card 	= $this->input->post('pengajar_id_card');
		$pengajar_kelompok 	= $this->input->post('pengajar_kelompok');
		$pengajar_no_tlpn 	= $this->input->post('pengajar_no_tlpn');
		$pengajar_status 	= $this->input->post('pengajar_status');

		$this->db->trans_start();
		$this->db->where('pengajar_id_card',$pengajar_id_card);
		$this->db->update('m_pengajar',array(
		'pengajar_nama'     => ucwords($pengajar_nama),
		'pengajar_jk'    	=> $pengajar_jk,
		'pengajar_id_card'  => $pengajar_id_card,
		'pengajar_kelompok' => $pengajar_kelompok,
		'pengajar_no_tlpn'  => $pengajar_no_tlpn,
		'pengajar_status'   => $pengajar_status,
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
		$this->db->delete('m_pengajar', array('pengajar_id' => $id));
		$this->db->trans_complete();
		if($this->db->trans_status() === FALSE){
				return json_encode(array('success'=>false, 'msg'=>'Hapus data gagal!'));
		}else {
				return json_encode(array('success'=>true, 'msg'=>'Hapus data berhasil!'));
		}

	}
}