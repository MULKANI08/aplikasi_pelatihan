<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->model('m_grafik');

		$this->load->database();
		$this->load->helper('url');

		$this->load->library('grocery_CRUD','email');
	}

	public function index()
	{
		// $crud = new grocery_CRUD();
		// $crud->set_table('jenis_pelatihan');
		// $crud->set_subject('Data Pelatihan');
		// $crud->required_fields('jenis_pelatihan','lokasi_pelatihan','mulai_pelatihan','akhir_pelatihan','kouta','sisa_kouta');
		
		// $crud->unset_columns(array('status_pelatihan'));
		// $crud->field_type('status','hidden');
		// $crud->unset_operations();
		// $output = $crud->render();

		$this->load->view('content_dashboard');
	}

	public function _example_output($output = null) {
		
		$this->load->view('content_crud_dashboard',(array)$output);
	}

	//pengumuman
	public function pengumuman(){
		$crud = new grocery_CRUD();
		$crud->set_model('Custom_grocery_crud_model');
		
		$crud->basic_model->set_custom_query("SELECT * FROM pendaftar where status_daftar= 'Diterima'");

		$crud->set_table('pendaftar');
		$crud->set_subject('Data Peserta');	
		$crud->display_as('status_daftar','Status');
		
		// $crud->required_fields('nama_pelatih','jadwal_pelatihan','status_daftar','jenis_pelatihan','lokasi_pelatihan');
		$crud->unset_columns(array('tempat_lahir','tanggal_lahir','jenis_kelamin','status_daftar','jadwal_pelatihan','kouta_terpakai'));
				
		// $crud->field_type('jenis_kelamin','enum',array('Laki-Laki','Perempuan'));
		// $crud->field_type('status_daftar','enum',array('Diterima','Alumni'));
		$crud->set_field_upload('foto_ktp','assets/uploads/images');
		$crud->set_field_upload('pas_foto','assets/uploads/images');

		
		$crud->unset_edit();
		$crud->unset_add();
		$crud->unset_print();
		$crud->unset_delete();
		$crud->unset_clone();
		$crud->unset_export();
		$output = $crud->render();
		$this->load->view('content_pengumuman',(array)$output);
		 
	}

}
