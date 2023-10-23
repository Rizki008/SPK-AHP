<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_analisis extends CI_Model
{
	public function cek_analisis($bulan, $tahun)
	{
		return $this->db->query("SELECT bulan, tahun FROM `analisis` WHERE bulan='" . $bulan . "' AND tahun='" . $tahun . "' GROUP BY bulan, tahun")->row();
	}
	public function periode_analisis()
	{
		return $this->db->query("SELECT MONTH(tanggal_absen) as bulan, YEAR(tanggal_absen) as tahun, id_user FROM `absen` GROUP BY MONTH(tanggal_absen), YEAR(tanggal_absen)")->result();
	}
	public function kehadiran($bulan, $tahun)
	{
		return $this->db->query("SELECT COUNT(id_absen) as jml, id_user FROM `absen` WHERE status= '1' AND MONTH(tanggal_absen)='" . $bulan . "' AND YEAR(tanggal_absen)='" . $tahun . "' GROUP BY id_user")->result();
	}
	public function durasi_langgaran($bulan, $tahun)
	{
		return $this->db->query("SELECT SUM(durasi_langganan) as durasi, id_user FROM `pelanggan`  WHERE MONTH(tgl_berlangganan)='" . $bulan . "' AND YEAR(tgl_berlangganan)='" . $tahun . "' GROUP BY id_user")->result();
	}
	public function penjualan($bulan, $tahun)
	{
		return $this->db->query("SELECT COUNT(id_penjualan) as penjualan FROM `penjualan` WHERE MONTH(tgl_kontrak_langganan)='" . $bulan . "' AND YEAR(tgl_kontrak_langganan)='" . $tahun . "' GROUP BY id_user")->result();
	}
	public function hasil($bulan, $tahun)
	{
		return $this->db->query("SELECT *,bulan, tahun FROM `analisis` LEFT JOIN user ON analisis.id_user=user.id_user WHERE bulan='" . $bulan . "' AND tahun='" . $tahun . "' ORDER BY hasil_analisis DESC")->result();
	}

	public function bulantahun()
	{
		return $this->db->query("SELECT * from analisis GROUP BY bulan,tahun")->result();
		// return $this->db->query("SELECT *, DATE_FORMAT(bulan,'%M') AS bulan, YEAR(tahun) AS tahun from analisis GROUP BY bulan,tahun")->result();
	}
}

/* End of file M_analisis.php */
