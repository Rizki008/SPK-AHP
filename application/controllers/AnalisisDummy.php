<?php
defined('BASEPATH') or exit('No direct script access allowed');

class AnalisisDummy extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('M_analisis');
	}
	public function index()
	{
		$data = array(
			'title' => 'Analisis AHP sales',
			'bulantahun' => $this->M_analisis->bulantahun(),
			'periode' => $this->M_analisis->periode_analisis(),
			'isi' => 'frontend/analisis/v_analisis'
		);
		$this->load->view('frontend/v_wrapper', $data, FALSE);

		// $this->load->view('vAnalisis', $data);
	}
	public function hitung()
	{
		//periode
		$bulan = $this->input->post('bulan');
		$tahun = $this->input->post('tahun');




		//variabel
		$absensi = $this->M_analisis->kehadiran($bulan, $tahun);
		$kualitas = $this->M_analisis->durasi_langgaran($bulan, $tahun);
		$penjualan = $this->M_analisis->penjualan($bulan, $tahun);

		foreach ($absensi as $key => $absen) {
			$id_user[] = $absen->id_user;
			$absensi_persen = ($absen->jml / 30) * 100;
			if ($absensi_persen > 90 && $absensi_persen <= 100) {
				$ev_kehadiran[] = 0.68148;
			} else if ($absensi_persen > 70 && $absensi_persen <= 90) {
				$ev_kehadiran[] = 0.23566;
			} else if ($absensi_persen <= 70) {
				$ev_kehadiran[] = 0.08286;
			}
		}
		foreach ($kualitas as $key => $kuali) {
			if ($kuali->durasi > '36' && $kuali->durasi <= '72') {
				$ev_kualitas[] = 0.68148;
			} else if ($kuali->durasi > '12' && $kuali->durasi <= '36') {
				$ev_kualitas[] = 0.23566;
			} else if ($kuali->durasi <= '12') {
				$ev_kualitas[] = 0.08286;
			}
		}
		foreach ($penjualan as $key => $jual) {
			if ($jual->penjualan > 5 && $jual->penjualan <= 8) {
				$ev_penjualan[] = 0.68148;
			} else if ($jual->penjualan > 2 && $jual->penjualan <= 5) {
				$ev_penjualan[] = 0.23566;
			} else if ($jual->penjualan <= 2) {
				$ev_penjualan[] = 0.08286;
			}
		}

		$kehadiran = 0.681466667;
		$kualitas = 0.235633333;
		$penjualan = 0.082833333;

		$t_kehadiran = 0;
		$t_kualitas = 0;
		$t_penjualan = 0;


		for ($i = 0; $i < sizeof($ev_kehadiran); $i++) {

			$t_kehadiran = $ev_kehadiran[$i] * $kehadiran;
			$t_kualitas = $ev_kualitas[$i] * $kualitas;
			$t_penjualan = $ev_penjualan[$i] * $penjualan;


			$hasil = round($t_kehadiran + $t_kualitas + $t_penjualan, 4);

			echo $hasil;
			echo '<br>';
			$data = array(
				'id_user' => $id_user[$i],
				'bulan' => $bulan,
				'tahun' => $tahun,
				'hasil_analisis' => $hasil
			);
			$this->db->insert('analisis', $data);
		}
		redirect('AnalisisDummy');
	}

	public function hasil($bulan, $tahun)
	{
		$data = array(
			'title' => 'Hasil Perhitungan AHP',
			'hasil' => $this->M_analisis->hasil($bulan, $tahun),
			'isi' => 'frontend/analisis/v_hasil'
		);
		$this->load->view('frontend/v_wrapper', $data, FALSE);
	}
}

/* End of file cAnalisisDummy.php */
