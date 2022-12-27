<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class M_user extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
	}

	public function DataTableUserTotal()
	{
		return $this->db->get('users')->num_rows();
	}

	public function DataTableUserAktif()
	{
		 return $this->db->get_where('users',['user_status'=>'Aktif'])->num_rows();
		}

		public function DataTableUserTidakAktif()
		{
		return $this->db->get_where('users',['user_status'=>'Tidak Aktif'])->num_rows();
	}

	public function DataTableUser()
	{
		$this->db->join('users_role','role_id=user_role','left');
		$this->db->order_by('user_id','desc');
		return $this->db->get('users');
	}

	public function DataTableRole()
	{
		$this->db->where('role_id !=','1');
		$this->db->order_by('role_id','desc');
		return $this->db->get('users_role');
	}

	public function Tambah()
	{
		$user_role 		= $this->input->post('user_role');
		$user_nama 		= $this->input->post('user_nama');
		$user_username = $this->input->post('user_username');
		$user_password = $this->input->post('user_password');
		$user_status 	=  $this->input->post('user_status');

		$row = $this->db->get_where('users',['user_username'=> $user_username])->num_rows();
		if($row > 0){
			 return json_encode(array('success'=>false, 'msg'=>'Input data gagal, Username sudah ada!'));
		}else{
			 $this->db->trans_start();
			 $this->db->insert('users',array(
				  'user_role'       => $user_role,
				  'user_username'   => $user_username,
				'user_nama'       => ucwords($user_nama),
				  'user_password'   => password_hash($user_password,PASSWORD_DEFAULT),
				  'user_image'      => 'https://ui-avatars.com/api/?name=' . $user_nama . '',
				  'user_status'     => $user_status,
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
		$this->db->join('users_role', 'role_id=user_role', 'left');
		$this->db->where('user_id', $id);
		$query  = $this->db->get('users');
		if ($query) {
			$row = $query->row();
			return json_encode(array(
				'success'         => true,
				'user_id'         => $row->user_id,
				'user_nama'       => $row->user_nama,
				'user_username'   => $row->user_username,
				'user_status'     => $row->user_status,
				'role_id'       	=> $row->role_id,
				'role_nama'       => $row->role_nama,
			));
		} else {
			return json_encode(array('success' => false, 'msg' => 'Data tidak ditemukan!'));
		}
	}

	public function Hapus()
	{
		$id 		= $this->input->post('id');

		if($id == 2){
			return json_encode(array('success'=>false, 'msg'=>'Administrator tidak bisa dihapus!'));
	  }else{
			$this->db->trans_start();
			$this->db->delete('users', array('user_id' => $id));
			$this->db->trans_complete();
			if($this->db->trans_status() === FALSE){
				 return json_encode(array('success'=>false, 'msg'=>'Hapus data gagal!'));
			}else {
				 return json_encode(array('success'=>true, 'msg'=>'Hapus data berhasil!'));
			}
	  }
	}

	public function Edit()
	{
		$user_id 		= $this->input->post('user_id');
		$user_role 		= $this->input->post('user_role');
		$user_nama 		= $this->input->post('user_nama');
		$user_username = $this->input->post('user_username');
		$user_password = $this->input->post('user_password');
		$user_status 	=  $this->input->post('user_status');

		if ($user_role == 1) {
			return json_encode(array('success' => false, 'msg' => 'Gagal!, Administrator tidak bisa di edit!'));
		} else {
			if ($user_password == "") {
				$this->db->trans_start();
				$this->db->where('user_id', $user_id);
				$this->db->update('users', array(
					'user_role'       => $user_role,
					'user_username'   => $user_username,
					'user_nama'       => ucwords($user_nama),
					'user_password'   => password_hash($user_password,PASSWORD_DEFAULT),
					'user_image'      => 'https://ui-avatars.com/api/?name=' . $user_nama . '',
					'user_status'     => $user_status,
				));

				$this->db->trans_complete();
				if ($this->db->trans_status() === FALSE) {
					return json_encode(array('success' => false, 'msg' => 'Update User gagal!'));
				} else {
					return json_encode(array('success' => true, 'msg' => 'Update User berhasil!'));
				}
			} else {
				if (strlen($user_password) <= 6) {
					return json_encode(array('success' => false, 'msg' => 'Gagal!, Password terlalu pendek, min 6 karakter!'));
				} else {
					$this->db->trans_start();
					$this->db->where('user_id', $user_id);
					$this->db->update('users', array(
						'user_role'       => $user_role,
						'user_username'   => $user_username,
						'user_nama'       => $user_nama,
						'user_password'   => password_hash($user_password,PASSWORD_DEFAULT),
						'user_image'      => 'https://ui-avatars.com/api/?name=' . $user_nama . '',
						'user_status'     => $user_status,
					));

					$this->db->trans_complete();
					if ($this->db->trans_status() === FALSE) {
						return json_encode(array('success' => false, 'msg' => 'Update User gagal!'));
					} else {
						return json_encode(array('success' => true, 'msg' => 'Update User berhasil!'));
					}
				}
			}
		}

	}
}