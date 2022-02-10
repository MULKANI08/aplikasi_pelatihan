<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Homeadmin extends CI_Controller {

	public function __construct()
    {
        parent::__construct();
        //load model m_login
        $this->load->model('m_login');
        //cek session dan level user
        if($this->m_login->is_role() != "admin"){
            redirect("login/");
        }
	}
	
	public function index()
	{
		$data['pendaftar_baru'] = $this->m_login->pendaftar_baru();
		$data['peserta'] = $this->m_login->peserta();
		$data['alumni'] = $this->m_login->alumni();
		$data['pelatihan'] = $this->m_login->pelatihan();
	
		$this->load->view('content_home_admin',$data);
		// $this->load->view('content_home_admin');
	}

	public function logout()
    {
        $this->session->sess_destroy();
        redirect('login');
    }
}
