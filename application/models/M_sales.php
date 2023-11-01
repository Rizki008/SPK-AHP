<?php

defined('BASEPATH') or exit('No direct script access allowed');

class M_sales extends CI_Model
{

	public function sales()
	{
		$this->db->select('*');
		$this->db->from('absen');
		$this->db->join('user', 'user.id_user = absen.id_user', 'left');
		$this->db->where('user.id_user', $this->session->userdata('id_user'));
		$this->db->where('status', '1');
		return $this->db->get()->result();
	}
	public function izin()
	{
		$this->db->select('*');
		$this->db->from('absen');
		$this->db->join('user', 'user.id_user = absen.id_user', 'left');
		$this->db->where('user.id_user', $this->session->userdata('id_user'));
		$this->db->where('status', '2');
		return $this->db->get()->result();
	}
	public function cuti()
	{
		$this->db->select('*');
		$this->db->from('absen');
		$this->db->join('user', 'user.id_user = absen.id_user', 'left');
		$this->db->where('user.id_user', $this->session->userdata('id_user'));
		$this->db->where('status', '3');
		return $this->db->get()->result();
	}
	public function sakit()
	{
		$this->db->select('*');
		$this->db->from('absen');
		$this->db->join('user', 'user.id_user = absen.id_user', 'left');
		$this->db->where('user.id_user', $this->session->userdata('id_user'));
		$this->db->where('status', '4');
		return $this->db->get()->result();
	}

	public function notif_sekaliabsen_sehari($id_user, $tanggal_absen)
	{
		return $this->db->query("SELECT * FROM absen WHERE id_user = '" . $id_user . "' AND tanggal_absen= '" . $tanggal_absen . "'")->row();
	}
	public function add_absen($data)
	{
		$this->db->insert('absen', $data);
	}
	// public function add_izin($data)
	// {
	// 	$this->db->insert('izin', $data);
	// }
	// public function add_cuti($data)
	// {
	// 	$this->db->insert('cuti', $data);
	// }
	// public function add_sakit($data)
	// {
	// 	$this->db->insert('sakit', $data);
	// }

	// PENJUALAN
	public function penjualan()
	{
		$this->db->select('*');
		$this->db->from('penjualan');
		$this->db->order_by('id_penjualan', 'desc');
		return $this->db->get()->result();
	}
	public function detail_penjualan($id_penjualan)
	{
		$this->db->select('*');
		$this->db->from('penjualan');
		$this->db->join('biaya', 'penjualan.no_permintaan = biaya.no_permintaan', 'left');
		$this->db->where('id_penjualan', $id_penjualan);
		return $this->db->get()->result();
	}
	public function urutan()
	{
		return $this->db->query("SELECT MAX(no_permintaan) AS otomatis FROM penjualan ")->result();
	}
	public function add_jual($data)
	{
		$this->db->insert('penjualan', $data);
	}
	public function add_bayar($data)
	{
		$this->db->insert('biaya', $data);
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
		$this->db->join('penjualan', 'penjualan.no_permintaan = pelanggan.no_permintaan', 'left');
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
		return $this->db->query("SELECT COUNT(id_penjualan) as jml_jual,DAY(tgl_kontrak_langganan) AS hari FROM penjualan WHERE (tgl_kontrak_langganan > CURDATE());")->result();
	}
	public function jml_pelanggan()
	{
		return $this->db->get('pelanggan')->num_rows();
	}
	public function jml_absen()
	{
		$bln = date('m');
		return $this->db->query("SELECT COUNT(id_absen) as jml_absen FROM absen WHERE MONTH(tanggal_absen)='" . $bln . "' AND status='1'")->result();
	}
	public function jml_sakit()
	{
		$bln = date('m');
		return $this->db->query("SELECT COUNT(id_absen) as jml_sakit FROM absen WHERE MONTH(tanggal_absen)='" . $bln . "' AND status='2'")->result();
	}
	public function jml_ijin()
	{
		$bln = date('m');
		return $this->db->query("SELECT COUNT(id_absen) as jml_ijin FROM absen WHERE MONTH(tanggal_absen)='" . $bln . "'AND status='3'")->result();
	}
	public function jml_cuti()
	{
		$bln = date('m');
		return $this->db->query("SELECT COUNT(id_absen) as jml_cuti FROM absen WHERE MONTH(tanggal_absen)='" . $bln . "'AND status='4'")->result();
	}
}
