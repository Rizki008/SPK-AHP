<?php



defined('BASEPATH') or exit('No direct script access allowed');

class Sales extends CI_Controller
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
			'title' => 'Dashboard',
			'pelanggan' => $this->m_sales->jml_pelanggan(),
			'penjualan' => $this->m_sales->jml_penjualan(),
			'absen' => $this->m_sales->jml_absen(),
			'sakit' => $this->m_sales->jml_sakit(),
			'ijin' => $this->m_sales->jml_ijin(),
			'cuti' => $this->m_sales->jml_cuti(),
			'total_jual' => $this->m_sales->pelanggan(),
			'isi' => 'frontend/sales/v_sales'
		);
		$this->load->view('frontend/v_wrapper', $data, FALSE);
	}

	// Add a new item
	public function absen()
	{
		$data = array(
			'title' => 'Absensi Sales',
			'absen' => $this->m_sales->sales(),
			'izin' => $this->m_sales->izin(),
			'cuti' => $this->m_sales->cuti(),
			'sakit' => $this->m_sales->sakit(),
			'isi' => 'frontend/absen/v_absen'
		);
		$this->load->view('frontend/v_wrapper', $data, FALSE);
	}

	//Update one item
	public function add_absen()
	{
		$nama_lengkap = $this->input->post('nama_lengkap');
		$tanggal_absen = $this->input->post('tanggal_absen');
		// $cekabsen = "SELECT * FROM absen WHERE id_user = '" . $id_user . "' AND DATE_FORMAT(tanggal_absen, '%Y-%m-%d') = CURDATE()";
		$cekabsen = $this->m_sales->notif_sekaliabsen_sehari($nama_lengkap, $tanggal_absen);;
		if ($cekabsen >= 1) {
			$this->session->set_flashdata('error', 'Mohon Maaf Anda Sudah Absen');
			redirect('sales/absen');
		} else {
			$data = array(
				'nama_lengkap' => $this->input->post('nama_lengkap'),
				'tanggal_absen' => $this->input->post('tanggal_absen'),
				'jam_absen' => $this->input->post('jam_absen'),
				'keterangan_absen' => $this->input->post('keterangan_absen'),
			);
			$this->m_sales->add_absen($data);
			$this->session->set_flashdata('pesan', 'Berhasil Absen');
			redirect('sales/absen');
		}
	}

	//Delete one item
	public function add_izin()
	{
		$data = array(
			'nama_lengkap' => $this->input->post('nama_lengkap'),
			'tanggal_ijin' => $this->input->post('tanggal_ijin'),
			'awal_ijin' => $this->input->post('awal_ijin'),
			'akhir_ijin' => $this->input->post('akhir_ijin'),
			'keterangan_ijin' => $this->input->post('keterangan_ijin'),
		);
		$this->m_sales->add_izin($data);
		$this->session->set_flashdata('pesan', 'Berhasil Melakukan Izin');
		redirect('sales/absen');
	}
	public function add_cuti()
	{
		$data = array(
			'nama_lengkap' => $this->input->post('nama_lengkap'),
			'tanggal_cuti' => $this->input->post('tanggal_cuti'),
			'awal_cuti' => $this->input->post('awal_cuti'),
			'akhir_cuti' => $this->input->post('akhir_cuti'),
			'keterangan_cuti' => $this->input->post('keterangan_cuti'),
		);
		$this->m_sales->add_cuti($data);
		$this->session->set_flashdata('pesan', 'Berhasil Melakukan Cuti');
		redirect('sales/absen');
	}

	public function add_sakit()
	{
		$this->form_validation->set_rules('keterangan_sakit', 'Keterangan Sakit', 'required', array('required' => '%s Mohon Untuk Diisi!!!'));

		if ($this->form_validation->run() == TRUE) {
			$config['upload_path'] = './assets/sakit';
			$config['allowed_types'] = 'gif|jpg|png|jpeg|ico';
			$config['max_size']     = '5000';
			$this->upload->initialize($config);
			$field_name = "surat_sakit";
			if (!$this->upload->do_upload($field_name)) {
			} else {
				$upload_data = array('uploads' => $this->upload->data());
				$config['image_library'] = 'gd2';
				$config['source_image'] = './assets/sakit' . $upload_data['uploads']['file_name'];
				$this->load->library('image_lib', $config);
				$data = array(
					'nama_lengkap' => $this->input->post('nama_lengkap'),
					'tanggal_sakit' => $this->input->post('tanggal_sakit'),
					'awal_sakit' => $this->input->post('awal_sakit'),
					'akhir_sakit' => $this->input->post('akhir_sakit'),
					'keterangan_sakit' => $this->input->post('keterangan_sakit'),
					'surat_sakit' => $upload_data['uploads']['file_name'],
				);
				$this->m_sales->add_sakit($data);
				$this->session->set_flashdata('pesan', 'Berhasil Melakukan Upload Sakit');
				redirect('sales/absen');
			}
		}
	}
}

/* End of file Sales.php */
