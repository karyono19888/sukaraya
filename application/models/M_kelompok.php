<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class M_kelompok extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
	}

	public function DataTablekelompokTotal()
	{
		return $this->db->get('m_kelompok')->num_rows();
	}

	public function DataTablekelompokAktif()
	{
		 return $this->db->get_where('m_kelompok',['kel_status'=>'Aktif'])->num_rows();
		}

		public function DataTablekelompokTidakAktif()
		{
		return $this->db->get_where('m_kelompok',['kel_status'=>'Tidak Aktif'])->num_rows();
	}

	public function DataTablekelompok()
	{
		$this->db->order_by('kel_id','desc');
		return $this->db->get('m_kelompok');
	}

	public function Tambah()
	{
		$kel_nama 		= $this->input->post('kel_nama');
		$kel_status 		= $this->input->post('kel_status');

		$row = $this->db->get_where('m_kelompok',['kel_nama'=> $kel_nama])->num_rows();
		if($row > 0){
			 return json_encode(array('success'=>false, 'msg'=>'Input data gagal, Kelompok sudah ada!'));
		}else{
			 $this->db->trans_start();
			 $this->db->insert('m_kelompok',array(
				 'kel_nama'      	=> $kel_nama,
				  'kel_status'    	=> $kel_status,
				  'created_at'      => time(),
			 ));
			 $this->db->trans_complete();
			 if($this->db->trans_status() === FALSE){
				  return json_encode(array('success'=>false, 'msg'=>'Input data gagal!'));
			 }else {
				  return json_encode(array('success'=>true, 'msg'=>'Input data berhasil!'));
			 }
			}
	}

	public function View()
	{
		$id = $this->input->post('id');
		$this->db->where('kel_id', $id);
		$query  = $this->db->get('m_kelompok');
		if ($query) {
			$row = $query->row();
			return json_encode(array(
				'success'        => true,
				'kel_id'       => $row->kel_id,
				'kel_nama'     => $row->kel_nama,
				'kel_status'   => $row->kel_status,
			));
		} else {
			return json_encode(array('success' => false, 'msg' => 'Data tidak ditemukan!'));
		}
	}

	public function Hapus()
	{
		$id 		= $this->input->post('id');

		$this->db->trans_start();
		$this->db->delete('m_kelompok', array('kel_id' => $id));
		$this->db->trans_complete();
		if($this->db->trans_status() === FALSE){
				return json_encode(array('success'=>false, 'msg'=>'Hapus kelompok gagal!'));
		}else {
				return json_encode(array('success'=>true, 'msg'=>'Hapus kelompok berhasil!'));
		}

	}

	public function Edit()
	{
		$kel_id 		= $this->input->post('kel_id');
		$kel_nama 	= $this->input->post('kel_nama');
		$kel_status 	= $this->input->post('kel_status');
			$this->db->trans_start();
			$this->db->where('kel_id',$kel_id);
			$this->db->update('m_kelompok',array(
			'kel_nama'      => ucwords($kel_nama),
				'kel_status'    => $kel_status,
				'created_at'      => time(),
			));
			$this->db->trans_complete();
			if($this->db->trans_status() === FALSE){
				return json_encode(array('success'=>false, 'msg'=>'Edit data gagal!'));
			}else {
			return json_encode(array('success' => true, 'msg' => 'Edit data berhasil!'));
		}

	}
}