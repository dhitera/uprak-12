<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Register extends CI_Controller {
    function __construct()
    {
        parent::__construct();
        $this->load->model('auth_model');
        $this->load->library('form_validation');
        $this->load->helper('form');
        $this->load->database();
        $this->load->library('session');
    }

    public function index(){
        $this->load->view('register');
    }

    public function proses(){
        $this->form_validation->set_rules('username', 'username','trim|required|min_length[1]|max_length[255]');
		$this->form_validation->set_rules('password', 'password','trim|required|min_length[1]|max_length[255]');
		if ($this->form_validation->run()==true)
	   	{
			$username = $this->input->post('username');
			$password = $this->input->post('password');
			$this->auth_model->register($username,$password);
			$this->session->set_flashdata('success_register','Proses Pendaftaran User Berhasil');
			header("Location: /buat-uprak-2/login");
		}
		else
		{
			$this->session->set_flashdata('error', validation_errors());
			header("Location: /buat-uprak-2/register");
		}
    }
}
?>