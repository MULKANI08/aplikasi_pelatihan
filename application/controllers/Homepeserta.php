<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Homepeserta extends CI_Controller {

	public function __construct()
    {
        parent::__construct();
        //load model m_login
        $this->load->model('m_login');
        //cek session dan level user
        if($this->m_login->is_role() != "peserta"){
            redirect("login/");
        }
	}
	
	public function index()
	{
		// $data['total_penduduk'] = $this->m_login->hitungJumlahPenduduk();
	
		// $this->load->view('content_home_siswa',$data);
		$this->load->view('content_home_peserta');
	}

	public function logout()
    {
        $this->session->sess_destroy();
        redirect('login');
    }
}
