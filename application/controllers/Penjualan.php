<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Penjualan extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		//Load Dependencies
		$this->load->model('m_sales');
	}

	// List all your items
	public function index()
	{
		$data = array(
			'title' => 'Data Penjualan',
			'penjualan' => $this->m_sales->penjualan(),
			'isi' => 'frontend/penjualan/v_penjualan'
		);
		$this->load->view('frontend/v_wrapper', $data, FALSE);
	}

	// Add a new item
	public function add()
	{
		$this->form_validation->set_rules('jenis_permohonan', 'Jenis Permohonan', 'required', array('required' => '%s Wajib Untuk Diisi!!!'));
		$this->form_validation->set_rules('no_permintaan', 'No Permintaan', 'required', array('required' => '%s Wajib Untuk Diisi!!!'));
		$this->form_validation->set_rules('no_tlp_internet', 'No Telepon / Internet', 'required', array('required' => '%s Wajib Untuk Diisi!!!'));
		$this->form_validation->set_rules('produk_layanan', 'Produk Layanan', 'required', array('required' => '%s Wajib Untuk Diisi!!!'));
		$this->form_validation->set_rules('paket', 'Paket', 'required', array('required' => '%s Wajib Untuk Diisi!!!'));

		if ($this->form_validation->run() == FALSE) {
			$data = array(
				'title' => 'Input Penjualan Baru',
				'isi' => 'frontend/penjualan/v_add'
			);
			$this->load->view('frontend/v_wrapper', $data, FALSE);
		} else {
			$data = array(
				'id_user' => $this->session->userdata('id_user'),
				'id_penjualan' => $this->input->post('id_penjualan'),
				'tgl_kontrak_langganan' => date('Y-m-d H:i:s'),
				'no_permintaan' => $this->input->post('no_permintaan'),
				'jenis_permohonan' => $this->input->post('jenis_permohonan'),
				'produk_layanan' => $this->input->post('produk_layanan'),
				'no_tlp_internet' => $this->input->post('no_tlp_internet'),
				'paket' => $this->input->post('paket'),
				'kecepatan' => $this->input->post('kecepatan'),
				'perangkat' => $this->input->post('perangkat'),
				'fitur_tambahan' => $this->input->post('fitur_tambahan'),
				'nama_pelanggan' => $this->input->post('nama_pelanggan'),
				'tipe_pelanggan' => $this->input->post('tipe_pelanggan'),
				'no_ktp' => $this->input->post('no_ktp'),
				'alamat_instalasi' => $this->input->post('alamat_instalasi'),
				'alamat_pelanggan' => $this->input->post('alamat_pelanggan'),
				'kode_pos' => $this->input->post('kode_pos'),
				'kota' => $this->input->post('kota'),
				'no_tlpn' => $this->input->post('no_tlpn'),
				'no_hp' => $this->input->post('no_hp'),
				'email' => $this->input->post('email'),
			);
			$this->m_sales->add_jual($data);

			$biaya = array(
				'no_permintaan' => $this->input->post('no_permintaan'),
				'biaya_paket' => $this->input->post('biaya_paket'),
				'biaya_paket_tambahan' => $this->input->post('biaya_paket_tambahan'),
				'biaya_sewa_perangkat' => $this->input->post('biaya_sewa_perangkat'),
				'biaya_pembelian_cpe' => $this->input->post('biaya_pembelian_cpe'),
				'biaya_instalasi' => $this->input->post('biaya_instalasi'),
				'uang_jaminan' => $this->input->post('uang_jaminan'),
				'biaya_pasang_baru' => $this->input->post('biaya_pasang_baru'),
				'catatan' => $this->input->post('catatan'),

			);
			$this->m_sales->add_bayar($biaya);

			$langganan = array(
				'id_user' => $this->session->userdata('id_user'),
				'no_permintaan' => $this->input->post('no_permintaan'),
				'tgl_berlangganan' => date('Y-m-d H:i:s'),
				'durasi_langganan' => $this->input->post('durasi_langganan'),
			);
			$this->m_sales->add_pel($langganan);
			$this->session->set_flashdata('pesan', 'Penjualan Berhasil Ditambahkan');
			redirect('penjualan');
		}
		$data = array(
			'title' => 'Input Penjualan Baru',
			'isi' => 'frontend/penjualan/v_add'
		);
		$this->load->view('frontend/v_wrapper', $data, FALSE);
	}

	public function detail($id_penjualan)
	{
		$data = array(
			'title' => 'Detail Pelanggan',
			'detail' => $this->m_sales->detail_penjualan($id_penjualan),
			'isi' => 'frontend/penjualan/v_detail'
		);
		$this->load->view('frontend/v_wrapper', $data, FALSE);
	}
}

/* End of file Pelanggan.php */
