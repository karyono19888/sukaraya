<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class M_murid_kartu extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
	}

	public function DataTableKartuTotal()
	{
		return $this->db->get('m_murid')->num_rows();
	}

	public function DataTableKartuAktif()
	{
		return $this->db->get_where('m_murid', ['murid_status' => 'Aktif'])->num_rows();
	}

	public function DataTableKartuTidakAktif()
	{
		return $this->db->get_where('m_murid', ['murid_status' => 'Tidak Aktif'])->num_rows();
	}

	public function DataTableKartu()
	{
		$this->db->order_by('murid_barcode', 'asc');
		return $this->db->get('m_murid');
	}

	public function Generate()
	{
		$id = $this->input->post('id');
		$this->load->library('ciqrcode');
		$config['cacheable']    = true;
		$config['cachedir']     = './upload/';
		$config['errorlog']     = './upload/';
		$config['imagedir']     = './upload/barcode/'; //direktori penyimpanan qr code
		$config['quality']      = true;
		$config['size']         = '1024'; //interger, the default is 1024
		$config['black']        = array(224, 255, 255);
		$config['white']        = array(70, 130, 180);
		$this->ciqrcode->initialize($config);

		$name_Qrcode = $id . '.png';
		$params['data'] = $id;
		$params['level'] = 'H';
		$params['size'] = 10;
		$params['savename'] = FCPATH . $config['imagedir'] . $name_Qrcode;
		$this->ciqrcode->generate($params);
		$this->db->trans_start();
		$this->db->where('murid_kartu_id', $id);
		$this->db->update('m_murid', array(
			'murid_barcode'    => $name_Qrcode,
		));
		$this->db->trans_complete();
		if ($this->db->trans_status() === FALSE) {
			return json_encode(array('success' => false, 'msg' => 'Barcode gagal!'));
		} else {
			return json_encode(array('success' => true, 'msg' => 'Barcode berhasil di Buat!'));
		}
	}

	public function ViewUpload()
	{
		$id = $this->input->post('id');
		$this->db->where('murid_id', $id);
		$query  = $this->db->get('m_murid');
		if ($query) {
			$row = $query->row();
			return json_encode(array(
				'success'        => true,
				'murid_id'       => $row->murid_id,
				'murid_kartu_id' => $row->murid_kartu_id,
			));
		} else {
			return json_encode(array('success' => false, 'msg' => 'Data tidak ditemukan!'));
		}
	}

	public function UploadFoto()
	{
		$murid_image = $_FILES['murid_image']['name'];
		$murid_nik   = $this->input->post('murid_nik');

		$config['upload_path']    	= FCPATH . '/upload/murid/';
		$config['allowed_types']  	= 'gif|jpg|jpeg|png';
		$config['file_name']      	= $murid_nik . '_' . date('dmY');
		$config['max_size']       	= 2048; // 2MB
		$config['overwrite']			= true;
		$this->upload->initialize($config);

		$this->load->library('upload', $config);

		if (!$this->upload->do_upload('murid_image')) {
			$error = array('error' => $this->upload->display_errors());
			$this->session->set_flashdata('message', '
				<div class="alert alert-danger" role="alert">
					Error 	' . $error['error'] . '!
				</div>
				');
			redirect(site_url('Master/Kartu/Murid'));
		} else {
			$this->db->trans_start();
			$old_file = $this->db->get_where('m_murid', ['murid_kartu_id' => $murid_nik])->row_array();
			$this->db->where('murid_kartu_id', $murid_nik);
			$this->db->update('m_murid', array(
				'murid_image'      => $this->upload->data('file_name'),
			));
			$this->db->trans_complete();
			if ($this->db->trans_status()) {
				unlink(FCPATH . '/upload/murid/' . $old_file['murid_image']);
				$this->upload->data();
				$this->session->set_flashdata(
					'message',
					'<div class="alert alert-success" role="alert">
					Tambah foto berhasil!
				</div>'
				);
				redirect(site_url('Master/Kartu/Murid'));
			} else {
				$this->session->set_flashdata('message', '
				<div class="alert alert-danger" role="alert">
				Opps..gagal!
			 </div>
			');
				redirect(site_url('Master/Kartu/Murid'));
			}
		}
	}
}