<?php

defined('BASEPATH') or exit('No direct script access allowed');

class M_sales extends CI_Model
{

	public function sales()
	{
		$this->db->select('*');
		$this->db->from('absen');
		$this->db->join('user', 'user.nama_lengkap = absen.nama_lengkap', 'left');
		$this->db->where('user.id_user', $this->session->userdata('id_user'));
		return $this->db->get()->result();
	}
	public function izin()
	{
		$this->db->select('*');
		$this->db->from('izin');
		$this->db->join('user', 'user.nama_lengkap = izin.nama_lengkap', 'left');
		$this->db->where('user.id_user', $this->session->userdata('id_user'));
		return $this->db->get()->result();
	}
	public function cuti()
	{
		$this->db->select('*');
		$this->db->from('cuti');
		$this->db->join('user', 'user.nama_lengkap = cuti.nama_lengkap', 'left');
		$this->db->where('user.id_user', $this->session->userdata('id_user'));
		return $this->db->get()->result();
	}
	public function sakit()
	{
		$this->db->select('*');
		$this->db->from('sakit');
		$this->db->join('user', 'user.nama_lengkap = sakit.nama_lengkap', 'left');
		$this->db->where('user.id_user', $this->session->userdata('id_user'));
		return $this->db->get()->result();
	}

	public function notif_sekaliabsen_sehari($nama_lengkap, $tanggal_absen)
	{
		return $this->db->query("SELECT * FROM absen WHERE nama_lengkap = '" . $nama_lengkap . "' AND tanggal_absen= '" . $tanggal_absen . "'")->row();
	}
	public function add_absen($data)
	{
		$this->db->insert('absen', $data);
	}
	public function add_izin($data)
	{
		$this->db->insert('izin', $data);
	}
	public function add_cuti($data)
	{
		$this->db->insert('cuti', $data);
	}
	public function add_sakit($data)
	{
		$this->db->insert('sakit', $data);
	}

	// PENJUALAN
	public function penjualan()
	{
		$this->db->select('*');
		$this->db->from('penjualan');
		$this->db->order_by('id_penjualan', 'desc');
		return $this->db->get()->result();
	}
	public function add_jual($data)
	{
		$this->db->insert('penjualan', $data);
	}
	public function update_jual($data)
	{
		$this->db->where('id_penjualan', $data['id_penjualan']);
		$this->db->update('penjualan', $data);
	}
	public function delete_jual($data)
	{
		$this->db->where('id_penjualan', $data['id_penjualan']);
		$this->db->delete('penjualan', $data);
	}

	// PELANGGAN
	public function pelanggan()
	{
		$this->db->select('*');
		$this->db->from('pelanggan');
		$this->db->join('penjualan', 'penjualan.id_penjualan = pelanggan.id_penjualan', 'left');
		$this->db->order_by('id_pelanggan', 'desc');
		return $this->db->get()->result();
	}
	public function add_pel($data)
	{
		$this->db->insert('pelanggan', $data);
	}
	public function update_pel($data)
	{
		$this->db->where('id_pelanggan', $data['id_pelanggan']);
		$this->db->update('pelanggan', $data);
	}
	public function delete_pel($data)
	{
		$this->db->where('id_pelanggan', $data['id_pelanggan']);
		$this->db->delete('pelanggan', $data);
	}

	//DASHBOARD
	public function jml_penjualan()
	{
		return $this->db->query("SELECT COUNT(id_penjualan) as jml_jual,DAY(tgl_penjualan) AS hari FROM penjualan WHERE (tgl_penjualan > CURDATE());")->result();
	}
	public function jml_pelanggan()
	{
		return $this->db->get('pelanggan')->num_rows();
	}
	public function jml_absen()
	{
		$bln = date('m');
		return $this->db->query("SELECT COUNT(id_absen) as jml_absen FROM absen WHERE MONTH(tanggal_absen)='" . $bln . "'")->result();
	}
	public function jml_sakit()
	{
		$bln = date('m');
		return $this->db->query("SELECT COUNT(id_sakit) as jml_sakit FROM sakit WHERE MONTH(tanggal_sakit)='" . $bln . "'")->result();
	}
	public function jml_ijin()
	{
		$bln = date('m');
		return $this->db->query("SELECT COUNT(id_izin) as jml_ijin FROM izin WHERE MONTH(tanggal_ijin)='" . $bln . "'")->result();
	}
	public function jml_cuti()
	{
		$bln = date('m');
		return $this->db->query("SELECT COUNT(id_cuti) as jml_cuti FROM cuti WHERE MONTH(tanggal_cuti)='" . $bln . "'")->result();
	}
}
