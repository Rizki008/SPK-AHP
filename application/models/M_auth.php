<?php

defined('BASEPATH') or exit('No direct script access allowed');

class M_auth extends CI_Model
{

	public function login_user($username, $password)
	{
		$this->db->select('*');
		$this->db->from('user');
		$this->db->where(array(
			'username' => $username,
			'password' => $password
		));
		return $this->db->get()->row();
	}

	public function akun()
	{
		$this->db->select('*');
		$this->db->from('user');
		$this->db->order_by('id_user', 'desc');
		return $this->db->get()->result();
	}
	public function add($data)
	{
		$this->db->insert('user', $data);
	}
	public function update($data)
	{
		$this->db->where('id_user', $data['id_user']);
		$this->db->update('user', $data);
	}
	public function delete($data)
	{
		$this->db->where('id_user', $data['id_user']);
		$this->db->delete('user', $data);
	}
}
