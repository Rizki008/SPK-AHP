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
		$data = array(
			'id_user' => $this->session->userdata('id_user'),
			'tgl_penjualan' => date('Y-m-d H:i:s'),
			'nama_pelanggan' => $this->input->post('nama_pelanggan'),
			'no_hp' => $this->input->post('no_hp'),
			'alamat' => $this->input->post('alamat'),
		);
		$this->m_sales->add_jual($data);
		$this->session->set_flashdata('pesan', 'Penjualan Berhasil Ditambahkan');
		redirect('penjualan');
	}

	//Update one item
	public function update($id_penjualan)
	{
		$data = array(
			'id_penjualan' => $id_penjualan,
			'tgl_penjualan' => date('Y-m-d H:i:s'),
			'nama_pelanggan' => $this->input->post('nama_pelanggan'),
			'no_hp' => $this->input->post('no_hp'),
			'alamat' => $this->input->post('alamat'),
		);
		$this->m_sales->update_jual($data);
		$this->session->set_flashdata('pesan', 'Penjualan Berhasil Diupdate');
		redirect('penjualan');
	}

	//Delete one item
	public function delete($id_penjualan)
	{
		$data = array(
			'id_penjualan' => $id_penjualan
		);
		$this->m_sales->delete_jual($data);
		$this->session->set_flashdata('pesan', 'Penjualan Berhasil Dihapus');
		redirect('penjualan');
	}
}

/* End of file Pelanggan.php */
