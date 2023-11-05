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
	public function hasil_bobot($bulan, $tahun)
	{
		$data = array(
			'title' => 'Hasil Perhitungan AHP',
			'hasil' => $this->M_analisis->hasil($bulan, $tahun),
			'isi' => 'frontend/analisis/v_hasil_bobot'
		);
		$this->load->view('frontend/v_wrapper', $data, FALSE);
	}


	// ABSEN 
	public function absen()
	{
		$data = array(
			'title' => 'Analisis AHP sales',
			'bulantahun' => $this->M_analisis->bulantahun_absensi(),
			'periode' => $this->M_analisis->periode_analisis_absensi(),
			'isi' => 'frontend/analisis/absensi/v_analisis_absensi'
		);
		$this->load->view('frontend/v_wrapper', $data, FALSE);

		// $this->load->view('vAnalisis', $data);
	}
	public function hitung_absen()
	{
		//periode
		$bulan = $this->input->post('bulan');
		$tahun = $this->input->post('tahun');

		//variabel
		$absensi = $this->M_analisis->kehadiran($bulan, $tahun);

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

		$kehadiran = 0.681466667;

		$t_kehadiran = 0;

		for ($i = 0; $i < sizeof($ev_kehadiran); $i++) {

			$t_kehadiran = $ev_kehadiran[$i] * $kehadiran;

			$hasil = round($t_kehadiran, 4);

			echo $hasil;
			echo '<br>';
			$data = array(
				'id_user' => $id_user[$i],
				'bulan' => $bulan,
				'tahun' => $tahun,
				'hasil_analisis' => $hasil
			);
			$this->db->insert('analisis_absensi', $data);
		}
		redirect('AnalisisDummy/absen');
	}

	public function hasil_absen($bulan, $tahun)
	{
		$data = array(
			'title' => 'Hasil Perhitungan AHP Absensi',
			'hasil' => $this->M_analisis->hasil_absensi($bulan, $tahun),
			'isi' => 'frontend/analisis/absensi/v_hasil_absensi'
		);
		$this->load->view('frontend/v_wrapper', $data, FALSE);
	}


	// PENJUALAN 
	public function penjualan()
	{
		$data = array(
			'title' => 'Analisis AHP Penjualan',
			'bulantahun' => $this->M_analisis->bulantahun_penjualan(),
			'periode' => $this->M_analisis->periode_analisis_penjualan(),
			'isi' => 'frontend/analisis/penjualan/v_analisis_penjualan'
		);
		$this->load->view('frontend/v_wrapper', $data, FALSE);
	}
	public function hitung_penjualan()
	{
		//periode
		$bulan = $this->input->post('bulan');
		$tahun = $this->input->post('tahun');

		//variabel
		$penjualan = $this->M_analisis->penjualan($bulan, $tahun);

		foreach ($penjualan as $key => $jual) {
			$id_user[] = $jual->id_user;
			if ($jual->penjualan > 5 && $jual->penjualan <= 8) {
				$ev_penjualan[] = 0.68148;
			} else if ($jual->penjualan > 2 && $jual->penjualan <= 5) {
				$ev_penjualan[] = 0.23566;
			} else if ($jual->penjualan <= 2) {
				$ev_penjualan[] = 0.08286;
			}
		}

		$penjualan = 0.082833333;

		$t_penjualan = 0;

		for ($i = 0; $i < sizeof($ev_penjualan); $i++) {

			$t_penjualan = $ev_penjualan[$i] * $penjualan;

			$hasil = round($t_penjualan, 4);

			echo $hasil;
			echo '<br>';
			$data = array(
				'id_user' => $id_user[$i],
				'bulan' => $bulan,
				'tahun' => $tahun,
				'hasil_analisis' => $hasil
			);
			$this->db->insert('analisis_penjualan', $data);
		}
		redirect('AnalisisDummy/penjualan');
	}

	public function hasil_penjualan($bulan, $tahun)
	{
		$data = array(
			'title' => 'Hasil Perhitungan AHP Penjualan',
			'hasil' => $this->M_analisis->hasil_penjualan($bulan, $tahun),
			'isi' => 'frontend/analisis/penjualan/v_hasil_penjualan'
		);
		$this->load->view('frontend/v_wrapper', $data, FALSE);
	}



	// LANGGANAN 
	public function langganan()
	{
		$data = array(
			'title' => 'Analisis AHP Duarasi Langganan',
			'bulantahun' => $this->M_analisis->bulantahun_langganan(),
			'periode' => $this->M_analisis->periode_analisis_langganan(),
			'isi' => 'frontend/analisis/langganan/v_analisis_langganan'
		);
		$this->load->view('frontend/v_wrapper', $data, FALSE);

		// $this->load->view('vAnalisis', $data);
	}
	public function hitung_langganan()
	{
		//periode
		$bulan = $this->input->post('bulan');
		$tahun = $this->input->post('tahun');

		//variabel
		$kualitas = $this->M_analisis->durasi_langgaran($bulan, $tahun);

		foreach ($kualitas as $key => $kuali) {
			$id_user[] = $kuali->id_user;
			if ($kuali->durasi > '36' && $kuali->durasi <= '72') {
				$ev_kualitas[] = 0.68148;
			} else if ($kuali->durasi > '12' && $kuali->durasi <= '36') {
				$ev_kualitas[] = 0.23566;
			} else if ($kuali->durasi <= '12') {
				$ev_kualitas[] = 0.08286;
			}
		}

		$kualitas = 0.235633333;

		$t_kualitas = 0;


		for ($i = 0; $i < sizeof($ev_kualitas); $i++) {

			$t_kualitas = $ev_kualitas[$i] * $kualitas;

			$hasil = round($t_kualitas, 4);

			echo $hasil;
			echo '<br>';
			$data = array(
				'id_user' => $id_user[$i],
				'bulan' => $bulan,
				'tahun' => $tahun,
				'hasil_analisis' => $hasil
			);
			$this->db->insert('analisis_langganan', $data);
		}
		redirect('AnalisisDummy/langganan');
	}

	public function hasil_langganan($bulan, $tahun)
	{
		$data = array(
			'title' => 'Hasil Perhitungan AHP Durasi Langganan',
			'hasil' => $this->M_analisis->hasil_langganan($bulan, $tahun),
			'isi' => 'frontend/analisis/langganan/v_hasil_langganan'
		);
		$this->load->view('frontend/v_wrapper', $data, FALSE);
	}
}

/* End of file cAnalisisDummy.php */
