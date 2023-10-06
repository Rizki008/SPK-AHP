<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{
	public function __contsruct()
	{
		$this->load->model('m_auth');
	}
	public function index()
	{
		$data = array(
			'title' => 'Login',
			'isi' => 'frontend/v_home'
		);
		$this->load->view('frontend/v_home', $data, FALSE);
	}

	public function login()
	{
		$this->form_validation->set_rules('username', 'Username', 'required', array('required' => '%s Mohon Untuk Diisi!!!'));
		$this->form_validation->set_rules('password', 'Password', 'required', array('required' => '%s Mohon Untuk Diisi!!!'));

		if ($this->form_validation->run() == TRUE) {
			$username = $this->input->post('username');
			$password = $this->input->post('password');
			$this->login_user->login($username, $password);
		}
	}

	public function logout()
	{
		$this->login_user->logout();
	}
}
