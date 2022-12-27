<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class M_kelas extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
	}

	public function DataTableKelasTotal()
	{
		return $this->db->get('m_kelas')->num_rows();
	}

	public function DataTableKelasAktif()
	{
		 return $this->db->get_where('m_kelas',['kelas_status'=>'Aktif'])->num_rows();
		}

		public function DataTableKelasTidakAktif()
		{
		return $this->db->get_where('m_kelas',['kelas_status'=>'Tidak Aktif'])->num_rows();
	}

	public function DataTableKelas()
	{
		$this->db->order_by('kelas_id','desc');
		return $this->db->get('m_kelas');
	}

	public function Tambah()
	{
		$kelas_nama 		= $this->input->post('kelas_nama');
		$kelas_status 		= $this->input->post('kelas_status');

		$row = $this->db->get_where('m_kelas',['kelas_nama'=> $kelas_nama])->num_rows();
		if($row > 0){
			 return json_encode(array('success'=>false, 'msg'=>'Input data gagal, Kelas sudah ada!'));
		}else{
			 $this->db->trans_start();
			 $this->db->insert('m_kelas',array(
				'kelas_nama'      => ucwords($kelas_nama),
				  'kelas_status'    => $kelas_status,
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
		$this->db->where('kelas_id', $id);
		$query  = $this->db->get('m_kelas');
		if ($query) {
			$row = $query->row();
			return json_encode(array(
				'success'        => true,
				'kelas_id'       => $row->kelas_id,
				'kelas_nama'     => $row->kelas_nama,
				'kelas_status'   => $row->kelas_status,
			));
		} else {
			return json_encode(array('success' => false, 'msg' => 'Data tidak ditemukan!'));
		}
	}

	public function Hapus()
	{
		$id 		= $this->input->post('id');

		$this->db->trans_start();
		$this->db->delete('m_kelas', array('kelas_id' => $id));
		$this->db->trans_complete();
		if($this->db->trans_status() === FALSE){
				return json_encode(array('success'=>false, 'msg'=>'Hapus kelas gagal!'));
		}else {
				return json_encode(array('success'=>true, 'msg'=>'Hapus kelas berhasil!'));
		}

	}

	public function Edit()
	{
		$kelas_id 		= $this->input->post('kelas_id');
		$kelas_nama 	= $this->input->post('kelas_nama');
		$kelas_status 	= $this->input->post('kelas_status');
			$this->db->trans_start();
			$this->db->where('kelas_id',$kelas_id);
			$this->db->update('m_kelas',array(
			'kelas_nama'      => ucwords($kelas_nama),
				'kelas_status'    => $kelas_status,
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