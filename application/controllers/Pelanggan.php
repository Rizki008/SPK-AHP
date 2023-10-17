<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Pelanggan extends CI_Controller
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
			'title' => 'Data pelanggan',
			'pelanggan' => $this->m_sales->pelanggan(),
			'isi' => 'frontend/pelanggan/v_pelanggan'
		);
		$this->load->view('frontend/v_wrapper', $data, FALSE);
	}

	// Add a new item
	public function add()
	{
		$data = array(
			'id_user' => $this->session->userdata('id_user'),
			'id_penjualan' => $this->input->post('id_penjualan'),
			// 'nama_paket' => $this->input->post('nama_paket'),
			'durasi_langganan' => $this->input->post('durasi_langganan'),
		);
		$this->m_sales->add_pel($data);
		$this->session->set_flashdata('pesan', 'Data Pelangan Berhasil Ditambahkan');
		redirect('pelanggan');
	}

	//Update one item
	public function update($id_pelanggan)
	{
		$data = array(
			'id_pelanggan' => $id_pelanggan,
			'id_user' => $this->session->userdata('id_user'),
			'id_penjualan' => $this->input->post('id_penjualan'),
			// 'nama_paket' => $this->input->post('nama_paket'),
			'durasi_langganan' => $this->input->post('durasi_langganan'),
		);
		$this->m_sales->update_pel($data);
		$this->session->set_flashdata('pesan', 'Data Pelanggan Berhasil Diupdate');
		redirect('pelanggan');
	}

	//Delete one item
	public function delete($id_pelanggan)
	{
		$data = array(
			'id_pelanggan' => $id_pelanggan
		);
		$this->m_sales->delete_pel($data);
		$this->session->set_flashdata('pesan', 'Data Pelanggan Berhasil Dihapus');
		redirect('pelanggan');
	}
}

/* End of file Pelanggan.php */
