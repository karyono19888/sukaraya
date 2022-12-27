<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class M_dapuan extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
	}

	public function DataTableDapuanTotal()
	{
		return $this->db->get('m_dapuan')->num_rows();
	}

	public function DataTableDapuanAktif()
	{
		return $this->db->get_where('m_dapuan', ['dapuan_status' => 'Aktif'])->num_rows();
	}

	public function DataTableDapuanTidakAktif()
	{
		return $this->db->get_where('m_dapuan', ['dapuan_status' => 'Tidak Aktif'])->num_rows();
	}

	public function DataTableDapuan()
	{
		$this->db->order_by('dapuan_id', 'desc');
		return $this->db->get('m_dapuan');
	}

	public function Tambah()
	{
		$dapuan_nama 		= $this->input->post('dapuan_nama');
		$dapuan_status 	= $this->input->post('dapuan_status');

		$row = $this->db->get_where('m_dapuan', ['dapuan_nama' => $dapuan_nama])->num_rows();
		if ($row > 0) {
			return json_encode(array('success' => false, 'msg' => 'Input data gagal, Dapuan sudah ada!'));
		} else {
			$this->db->trans_start();
			$this->db->insert('m_dapuan', array(
				'dapuan_nama'      => ucwords($dapuan_nama),
				'dapuan_status'    => $dapuan_status,
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
		$this->db->where('dapuan_id', $id);
		$query  = $this->db->get('m_dapuan');
		if ($query) {
			$row = $query->row();
			return json_encode(array(
				'success'        => true,
				'dapuan_id'       => $row->dapuan_id,
				'dapuan_nama'     => $row->dapuan_nama,
				'dapuan_status'   => $row->dapuan_status,
			));
		} else {
			return json_encode(array('success' => false, 'msg' => 'Data tidak ditemukan!'));
		}
	}

	public function Hapus()
	{
		$id 		= $this->input->post('id');

		$this->db->trans_start();
		$this->db->delete('m_dapuan', array('dapuan_id' => $id));
		$this->db->trans_complete();
		if ($this->db->trans_status() === FALSE) {
			return json_encode(array('success' => false, 'msg' => 'Hapus Dapuan gagal!'));
		} else {
			return json_encode(array('success' => true, 'msg' => 'Hapus Dapuan berhasil!'));
		}
	}

	public function Edit()
	{
		$dapuan_id 		= $this->input->post('dapuan_id');
		$dapuan_nama 	= $this->input->post('dapuan_nama');
		$dapuan_status 	= $this->input->post('dapuan_status');

		$this->db->trans_start();
		$this->db->where('dapuan_id', $dapuan_id);
		$this->db->update('m_dapuan', array(
			'dapuan_nama'      => ucwords($dapuan_nama),
			'dapuan_status'    => $dapuan_status,
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