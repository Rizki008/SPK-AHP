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
		return $this->db->query("SELECT COUNT(id_penjualan) as penjualan,id_user FROM `penjualan` WHERE MONTH(tgl_kontrak_langganan)='" . $bulan . "' AND YEAR(tgl_kontrak_langganan)='" . $tahun . "' GROUP BY id_user")->result();
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

	// LANGGANAN
	public function periode_analisis_langganan()
	{
		return $this->db->query("SELECT MONTH(tgl_berlangganan) as bulan, YEAR(tgl_berlangganan) as tahun, id_user FROM `pelanggan` GROUP BY MONTH(tgl_berlangganan), YEAR(tgl_berlangganan)")->result();
	}
	public function cek_analisis_langganan($bulan, $tahun)
	{
		return $this->db->query("SELECT bulan, tahun FROM `analisis_langganan` WHERE bulan='" . $bulan . "' AND tahun='" . $tahun . "' GROUP BY bulan, tahun")->row();
	}
	public function bulantahun_langganan()
	{
		return $this->db->query("SELECT * from analisis_langganan GROUP BY bulan,tahun")->result();
	}
	public function hasil_langganan($bulan, $tahun)
	{
		return $this->db->query("SELECT *,bulan, tahun FROM `analisis_langganan` LEFT JOIN user ON analisis_langganan.id_user=user.id_user WHERE bulan='" . $bulan . "' AND tahun='" . $tahun . "' ORDER BY hasil_analisis DESC")->result();
	}


	// PENJUALAN
	public function periode_analisis_penjualan()
	{
		return $this->db->query("SELECT MONTH(tgl_kontrak_langganan) as bulan, YEAR(tgl_kontrak_langganan) as tahun, id_user FROM `penjualan` GROUP BY MONTH(tgl_kontrak_langganan), YEAR(tgl_kontrak_langganan)")->result();
	}
	public function cek_analisis_penjualan($bulan, $tahun)
	{
		return $this->db->query("SELECT bulan, tahun FROM `analisis_penjualan` WHERE bulan='" . $bulan . "' AND tahun='" . $tahun . "' GROUP BY bulan, tahun")->row();
	}
	public function bulantahun_penjualan()
	{
		return $this->db->query("SELECT * from analisis_penjualan GROUP BY bulan,tahun")->result();
	}
	public function hasil_penjualan($bulan, $tahun)
	{
		return $this->db->query("SELECT *,bulan, tahun FROM `analisis_penjualan` LEFT JOIN user ON analisis_penjualan.id_user=user.id_user WHERE bulan='" . $bulan . "' AND tahun='" . $tahun . "' ORDER BY hasil_analisis DESC")->result();
	}
	// ABSENSI
	public function periode_analisis_absensi()
	{
		return $this->db->query("SELECT MONTH(tanggal_absen) as bulan, YEAR(tanggal_absen) as tahun, id_user FROM `absen` GROUP BY MONTH(tanggal_absen), YEAR(tanggal_absen)")->result();
	}
	public function cek_analisis_absensi($bulan, $tahun)
	{
		return $this->db->query("SELECT bulan, tahun FROM `analisis_absensi` WHERE bulan='" . $bulan . "' AND tahun='" . $tahun . "' GROUP BY bulan, tahun")->row();
	}
	public function bulantahun_absensi()
	{
		return $this->db->query("SELECT * from analisis_absensi GROUP BY bulan,tahun")->result();
	}
	public function hasil_absensi($bulan, $tahun)
	{
		return $this->db->query("SELECT *,bulan, tahun FROM `analisis_absensi` LEFT JOIN user ON analisis_absensi.id_user=user.id_user WHERE bulan='" . $bulan . "' AND tahun='" . $tahun . "' ORDER BY hasil_analisis DESC")->result();
	}
}

/* End of file M_analisis.php */
