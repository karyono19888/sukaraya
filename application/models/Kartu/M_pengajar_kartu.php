<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class M_pengajar_kartu extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
	}

	public function DataTableKartuTotal()
	{
		return $this->db->get('m_pengajar')->num_rows();
	}

	public function DataTableKartuAktif()
	{
		return $this->db->get_where('m_pengajar', ['pengajar_status' => 'Aktif'])->num_rows();
	}

	public function DataTableKartuTidakAktif()
	{
		return $this->db->get_where('m_pengajar', ['pengajar_status' => 'Tidak Aktif'])->num_rows();
	}

	public function DataTableKartu()
	{
		$this->db->order_by('pengajar_id_card', 'asc');
		return $this->db->get('m_pengajar');
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
		$this->db->where('pengajar_id_card', $id);
		$this->db->update('m_pengajar', array(
			'pengajar_barcode'    => $name_Qrcode,
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
		$this->db->where('pengajar_id', $id);
		$query  = $this->db->get('m_pengajar');
		if ($query) {
			$row = $query->row();
			return json_encode(array(
				'success'        => true,
				'pengajar_id'       => $row->pengajar_id,
				'pengajar_id_card' => $row->pengajar_id_card,
			));
		} else {
			return json_encode(array('success' => false, 'msg' => 'Data tidak ditemukan!'));
		}
	}

	public function UploadFoto()
	{
		$murid_image       = $_FILES['murid_image']['name'];
		$pengajar_id_card   = $this->input->post('pengajar_id_card');
		$old_file = $this->db->get_where('m_pengajar', ['pengajar_id_card' => $pengajar_id_card])->row_array();
		$nama_depan = implode(" ", array_slice(explode(" ", $old_file['pengajar_nama']), 0, 1));

		$config['upload_path']    	= FCPATH . '/upload/pengajar/';
		$config['allowed_types']  	= 'gif|jpg|jpeg|png';
		$config['file_name']      	= $pengajar_id_card . '_' . $nama_depan;
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
			redirect(site_url('Master/Kartu/Pengajar'));
		} else {
			$this->db->trans_start();
			$this->db->where('pengajar_id_card', $pengajar_id_card);
			$this->db->update('m_pengajar', array(
				'pengajar_image'      => $this->upload->data('file_name'),
			));
			$this->db->trans_complete();
			if ($this->db->trans_status()) {
				unlink(FCPATH . '/upload/pengajar/' . $old_file['murid_image']);
				$this->upload->data();
				$this->session->set_flashdata(
					'message',
					'<div class="alert alert-success" role="alert">
					Tambah foto berhasil!
				</div>'
				);
				redirect(site_url('Master/Kartu/Pengajar'));
			} else {
				$this->session->set_flashdata('message', '
				<div class="alert alert-danger" role="alert">
				Opps..gagal!
			 </div>
			');
				redirect(site_url('Master/Kartu/Pengajar'));
			}
		}
	}

	public function DataTablePengajar($a)
	{
		return $this->db->get_where('m_pengajar', ['pengajar_id_card' => $a])->row_array();
	}
}