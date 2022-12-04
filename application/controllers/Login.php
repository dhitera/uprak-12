<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {
    function __construct()
	{
		parent::__construct();
		$this->load->model('auth_model');
        $this->load->library('form_validation');
        $this->load->helper('form');
        $this->load->database();
        $this->load->library('session');
	}

	public function index()
	{
		$this->load->view('login');
	}

	public function proses()
	{
		$username = $this->input->post('username');
		$password = $this->input->post('password');
		if($this->auth_model->login_user($username,$password))
		{
			header('Location: /buat-uprak-2/home');
		}
		else
		{
			$this->session->set_flashdata('error','Username & Password salah');
			header('Location: /buat-uprak-2/login');
		}
	}

	public function logout()
	{
		$this->session->unset_userdata('username');
		$this->session->unset_userdata('is_login');
		header('Location: /buat-uprak-2/login');
	}
}
?>