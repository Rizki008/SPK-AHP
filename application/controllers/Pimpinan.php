<?php



defined('BASEPATH') or exit('No direct script access allowed');

class Pimpinan extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		//Load Dependencies
		$this->load->model('m_sales');
		$this->load->model('m_auth');
	}

	// List all your items
	public function index()
	{
		$data = array(
			'title' => 'Dashboard',
			'pelanggan' => $this->m_sales->jml_pelanggan(),
			'penjualan' => $this->m_sales->jml_penjualan(),
			'absen' => $this->m_sales->jml_absen(),
			'sakit' => $this->m_sales->jml_sakit(),
			'ijin' => $this->m_sales->jml_ijin(),
			'cuti' => $this->m_sales->jml_cuti(),
			'total_jual' => $this->m_sales->pelanggan(),
			'isi' => 'frontend/pimpinan/v_pimpinan'
		);
		$this->load->view('frontend/v_wrapper', $data, FALSE);
	}

	public function akun()
	{
		$data = array(
			'title' => 'Data Akun',
			'akun' => $this->m_auth->akun(),
			'isi' => 'frontend/akun/v_akun'
		);
		$this->load->view('frontend/v_wrapper', $data, FALSE);
	}
	public function add()
	{
		$data = array(
			'nama_lengkap' => $this->input->post('nama_lengkap'),
			'username' => $this->input->post('username'),
			'password' => $this->input->post('password'),
			'no_hp' => $this->input->post('no_hp'),
			'alamat' => $this->input->post('alamat'),
			'status' => $this->input->post('status'),
			'level_user' => 'sales',
		);
		$this->m_auth->add($data);
		$this->session->set_flashdata('pesan', 'Akun Sales Berhasil Ditambahkan');
		redirect('pimpinan/akun');
	}
	public function update($id_user)
	{
		$data = array(
			'id_user' => $id_user,
			'username' => $this->input->post('username'),
			'nama_lengkap' => $this->input->post('nama_lengkap'),
			'password' => $this->input->post('password'),
			'no_hp' => $this->input->post('no_hp'),
			'alamat' => $this->input->post('alamat'),
			'status' => $this->input->post('status'),
			'level_user' => 'sales',
		);
		$this->m_auth->update($data);
		$this->session->set_flashdata('pesan', 'Akun Sales Berhasil Diupdate');
		redirect('pimpinan/akun');
	}
	public function status($id_user)
	{
		$data = array(
			'id_user' => $id_user,
			'status' => $this->input->post('status'),
		);
		$this->m_auth->update($data);
		$this->session->set_flashdata('pesan', 'Akun Sales Berhasil Diupdate');
		redirect('pimpinan/akun');
	}
	public function delete($id_user)
	{
		$data = array(
			'id_user' => $id_user,
		);
		$this->m_auth->delete($data);
		$this->session->set_flashdata('pesan', 'Akun Sales Berhasil Didelete');
		redirect('pimpinan/akun');
	}
}

/* End of file Sales.php */
