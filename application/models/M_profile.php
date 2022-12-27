<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class M_profile extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
	}

	public function totalMurid()
	{
		$this->db->where('murid_status','Aktif');
		return $this->db->get('m_murid')->num_rows();
	}

	public function totalPengurus()
	{
		$this->db->where('pengurus_status','Aktif');
		return $this->db->get('m_pengurus')->num_rows();
	}

	public function totalPengajar()
	{
		$this->db->where('pengajar_status','Aktif');
		return $this->db->get('m_pengajar')->num_rows();
	}

	public function tablelog()
	{
		$this->db->where('MONTH(log_time)',date('m'));
		$this->db->join('users','user_id=log_user','left');
		$this->db->where('log_user',$this->session->userdata('user_id'));
		$this->db->order_by('log_id','desc');
		return $this->db->get('t_log');
	}

	public function EditProfile($id)
	{
		return $this->db->get_where('users',['user_id'=>$id])->row_array();
	}

	public function SubmitEditProfile()
	{

		$user_id 		= $this->input->post('user_id');
		$user_nama 		= $this->input->post('user_nama');
		$user_email 		= $this->input->post('user_email');
		$this->db->trans_start();
		$this->db->where('user_id', $user_id);
		$this->db->update('users', array(
			'user_nama'       => ucwords($user_nama),
			'user_email'      => $user_email,
			'user_image'      => 'https://ui-avatars.com/api/?name=' . $user_nama . '',
		));

		$this->db->trans_complete();
		if ($this->db->trans_status() === FALSE) {
			$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert"><b>Gagal</b> Update profile gagal!</div>');
			redirect('Profile/edit/'.$user_id.'');
		} else {
			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"><b>Berhasil</b> Update profile berhasil!</div>');
			redirect('Profile/edit/'.$user_id.'');
		}
	}

	public function SubmitUbahPassword()
	{

		$this->db->trans_start();
		$user_id 				= $this->input->post('user_id');
		$passwordlama 			= $this->input->post('passwordlama');
		$passwordbaru 			= $this->input->post('passwordbaru');
		$passwordkonfirmasi 	= $this->input->post('passwordkonfirmasi');

		$user = $this->db->get_where('users', ['user_id' => $user_id])->row_array();

		if (password_verify($passwordlama, $user['user_password'])) {
			if (strlen($passwordbaru) <= 6) {
				$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert"><b>Gagal</b> Password terlalu pendek, min 6 karakter!</div>');
			redirect('Profile/edit/'.$user_id.'');
			} else {
				if($passwordlama === $passwordbaru){
					$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert"><b>Gagal</b> Password baru tidak boleh sama dengan password lama!</div>');
					redirect('Profile/edit/'.$user_id.'');
				}else{
					if ($passwordbaru === $passwordkonfirmasi) {
						$this->db->where('user_id', $user_id);
						$this->db->update('users', array(
							'user_password'       => password_hash($passwordbaru,PASSWORD_DEFAULT),
						));
					} else {
						$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert"><b>Gagal</b> Password baru tidak sama dengan konfirmasi password!</div>');
				redirect('Profile/edit/'.$user_id.'');
					}
				}

			}

		} else {
			$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert"><b>Gagal</b> Password lama salah!</div>');
			redirect('Profile/edit/'.$user_id.'');
		}

		$this->db->trans_complete();
		if ($this->db->trans_status() === FALSE) {
			$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert"><b>Gagal</b> Update password gagal!</div>');
			redirect('Profile/edit/'.$user_id.'');
		} else {
			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"><b>Berhasil</b> Update password berhasil!</div>');
			redirect('Profile/edit/'.$user_id.'');
		}
	}
}