<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class M_pendidikan extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
	}

	public function DataTablePendidikanTotal()
	{
		return $this->db->get('m_pendidikan2')->num_rows();
	}

	public function DataTablePendidikanAktif()
	{
		return $this->db->get_where('m_pendidikan2', ['pend_status' => 'Aktif'])->num_rows();
	}

	public function DataTablePendidikanTidakAktif()
	{
		return $this->db->get_where('m_pendidikan2', ['pend_status' => 'Tidak Aktif'])->num_rows();
	}

	public function DataTablePendidikan()
	{
		$this->db->order_by('pend_id', 'desc');
		return $this->db->get('m_pendidikan2');
	}

	public function Tambah()
	{
		$pend_nama 		= $this->input->post('pend_nama');
		$pend_status 	= $this->input->post('pend_status');

		$row = $this->db->get_where('m_pendidikan2', ['pend_nama' => $pend_nama])->num_rows();
		if ($row > 0) {
			return json_encode(array('success' => false, 'msg' => 'Input data gagal, Pendidikan sudah ada!'));
		} else {
			$this->db->trans_start();
			$this->db->insert('m_pendidikan2', array(
				'pend_nama'      => ucwords($pend_nama),
				'pend_status'    => $pend_status,
				'created_at'      => time(),
			));
			$this->db->trans_complete();
			if ($this->db->trans_status() === FALSE) {
				return json_encode(array('success' => false, 'msg' => 'Input data gagal!'));
			} else {
				return json_encode(array('success' => true, 'msg' => 'Input data berhasil!'));
			}
		}
	}

	public function View()
	{
		$id = $this->input->post('id');
		$this->db->where('pend_id', $id);
		$query  = $this->db->get('m_pendidikan2');
		if ($query) {
			$row = $query->row();
			return json_encode(array(
				'success'        => true,
				'pend_id'       => $row->pend_id,
				'pend_nama'     => $row->pend_nama,
				'pend_status'   => $row->pend_status,
			));
		} else {
			return json_encode(array('success' => false, 'msg' => 'Data tidak ditemukan!'));
		}
	}

	public function Hapus()
	{
		$id 		= $this->input->post('id');

		$this->db->trans_start();
		$this->db->delete('m_pendidikan2', array('pend_id' => $id));
		$this->db->trans_complete();
		if ($this->db->trans_status() === FALSE) {
			return json_encode(array('success' => false, 'msg' => 'Hapus Pendidikan gagal!'));
		} else {
			return json_encode(array('success' => true, 'msg' => 'Hapus Pendidikan berhasil!'));
		}
	}

	public function Edit()
	{
		$pend_id 		= $this->input->post('pend_id');
		$pend_nama 	= $this->input->post('pend_nama');
		$pend_status 	= $this->input->post('pend_status');

		$this->db->trans_start();
		$this->db->where('pend_id', $pend_id);
		$this->db->update('m_pendidikan2', array(
			'pend_nama'      => ucwords($pend_nama),
			'pend_status'    => $pend_status,
			'created_at'      => time(),
		));
		$this->db->trans_complete();
		if ($this->db->trans_status() === FALSE) {
			return json_encode(array('success' => false, 'msg' => 'Edit data gagal!'));
		} else {
			return json_encode(array('success' => true, 'msg' => 'Edit data berhasil!'));
		}
	}
}