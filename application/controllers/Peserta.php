<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Peserta extends CI_Controller {

	public function __construct() {
		parent::__construct();

		$this->load->database();
		$this->load->helper('url');

		$this->load->library('grocery_CRUD','email');
		// $tes=$this->db->query("SELECT * FROM jenis_pelatihan")->result_array();

		// foreach ($tes as $key) {
		// 	$kode_jenis_pelatihan = $key['kode_jenis_pelatihan'];
		// 	if ($key['sisa_kouta'] <= 0) {
		// 		$this->db->query("UPDATE jenis_pelatihan SET status_pelatihan = 'Tunggu' WHERE kode_jenis_pelatihan = '$kode_jenis_pelatihan'");
		// 	} else {
		// 		$this->db->query("UPDATE jenis_pelatihan SET status_pelatihan = 'Tersedia' WHERE kode_jenis_pelatihan = '$kode_jenis_pelatihan'");
		// 	}
			
		// }
	}

	public function _example_output($output = null) {
		$this->load->view('content_crud_peserta',(array)$output);
	}

	public function index() {
		$this->_example_output((object)array('output' => '' , 'js_files' => array() , 'css_files' => array()));
	}

		///pelatihan
		public function pelatihan(){
			$crud = new grocery_CRUD();
			$crud->set_table('pelatihan');
			$crud->set_subject('Data Jenis Pelatihan');
			$crud->required_fields('jenis_pelatihan','lokasi_pelatihan','jadwal_pelatihan','kouta');
			
			$crud->unset_add();
			$crud->unset_edit();
			$crud->unset_clone();
			$crud->unset_export();
			$crud->unset_print();
			$output = $crud->render();
			$this->load->view('content_crud_peserta',(array)$output);
		
		}

	public function riwayat_pelatihan(){
		
		$username=$this->session->userdata("user_name");
		$crud = new grocery_CRUD();
		$crud->set_model('Custom_grocery_crud_model');
		$crud->basic_model->set_custom_query("SELECT * FROM peserta where id_pendaftar = '$username'");

		$crud->set_table('peserta');
		$crud->set_subject('Data Pelatihan Saya');	

		$timezone="Asia/Makassar";
			date_default_timezone_set($timezone);
			$crud->change_field_type('tanggal_daftar', 'hidden', date('Y-m-d'));

		$crud->required_fields('nama_pelatihan');
		$crud->display_as('id_pendaftar','Id Peserta');
		
		$crud->unset_columns(array('email','jadwal_pelatihan','status','jumlah'));

		$crud->callback_add_field('id_pendaftar',function(){
			$id=$this->session->userdata("user_name");
			 return '  <input type="text" readonly value="'.$id.'" readonly style="height: 40px; width: 500px;" name="id_pendaftar">';});

		$crud->callback_edit_field('id_pendaftar',function(){
			$id=$this->session->userdata("user_name");
			 return '  <input type="text" readonly value="'.$id.'" readonly style="height: 40px; width: 500px;" name="id_pendaftar">';});

		$crud->callback_add_field('nik',function(){
			$nik=$this->session->userdata("user_pass");
			 return '  <input type="text" readonly value="'.$nik.'" readonly style="height: 40px; width: 500px;" name="nik">';});
	
			$crud->callback_edit_field('nik',function(){
			$nik=$this->session->userdata("user_pass");
			 return '  <input type="text" readonly value="'.$nik.'" readonly style="height: 40px; width: 500px;" name="nik">';});

		$crud->callback_add_field('nama',function(){
			$nama=$this->session->userdata("user_nama");
			 return '  <input type="text" readonly value="'.$nama.'" readonly style="height: 40px; width: 500px;" name="nama">';});
	
		$crud->callback_edit_field('nama',function(){
				$nama=$this->session->userdata("user_nama");
			 return '  <input type="text" readonly value="'.$nama.'" readonly style="height: 40px; width: 500px;" name="nama">';});

		$crud->callback_add_field('status_pelatihan',function(){
				 return '  <input type="hidden"  id="status_pelatihan" readonly value="Belum Diverifikasi" readonly style="height: 40px; width: 500px;" name="status_pelatihan">';});
		
		$crud->callback_edit_field('status_pelatihan',function($value, $primary_key){
				return '  <input type="hidden" id="status_pelatihan" value="Belum Diverifikasi" name="status_pelatihan"  style="height: 40px" >';});

		$crud->field_type('status_pelatihan','hidden');
				
		$crud->callback_add_field('nama_pelatihan',function(){
			return '  <input type="text" id="nama_pelatihan" readonly name="nama_pelatihan"  style="height: 40px; width: 400px;">&nbsp;&nbsp;&nbsp;<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#jenisPelatihanModal"><b>Cari Data</b></button>';});
		
		$crud->callback_edit_field('nama_pelatihan',function($value, $primary_key){
			return '  <input type="text" id="nama_pelatihan" readonly  value="'.$value.'" name="nama_pelatihan"  style="height: 40px; width: 400px;" >&nbsp;&nbsp;&nbsp;<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#jenisPelatihanModal"><b>Cari Data</b></button>';});
				
		$crud->callback_add_field('bidang_pelatihan',function(){
			return '  <input type="text" id="bidang_pelatihan" readonly name="bidang_pelatihan"  style="height: 40px; width: 500px;">';});
		
		$crud->callback_edit_field('bidang_pelatihan',function($value, $primary_key){
			return '  <input type="text" id="bidang_pelatihan" readonly  value="'.$value.'" name="bidang_pelatihan"  style="height: 40px; width: 500px;" >';});
				
		$crud->callback_add_field('pusat_penyelenggara',function(){
			return '  <input type="text" id="pusat_penyelenggara" readonly name="pusat_penyelenggara"  style="height: 40px; width: 500px;">';});
		
		$crud->callback_edit_field('pusat_penyelenggara',function($value, $primary_key){
			return '  <input type="text" id="pusat_penyelenggara" readonly  value="'.$value.'" name="pusat_penyelenggara"  style="height: 40px; width: 500px;" >';});
				
		$crud->callback_add_field('lokasi_pelatihan',function(){
			return '  <input type="text" id="lokasi_pelatihan" readonly name="lokasi_pelatihan"  style="height: 40px; width: 500px;">';});
		
		$crud->callback_edit_field('lokasi_pelatihan',function($value, $primary_key){
			return '  <input type="text" id="lokasi_pelatihan" readonly  value="'.$value.'" name="lokasi_pelatihan"  style="height: 40px; width: 500px;" >';});
				
		$crud->callback_add_field('mulai_pelatihan',function(){
			return '  <input type="text" id="mulai_pelatihan" readonly name="mulai_pelatihan"  style="height: 40px; width: 500px;">';});
		
		$crud->callback_edit_field('mulai_pelatihan',function($value, $primary_key){
			return '  <input type="text" id="mulai_pelatihan" readonly  value="'.$value.'" name="mulai_pelatihan"  style="height: 40px; width: 500px;" >';});
				
		$crud->callback_add_field('akhir_pelatihan',function(){
			return '  <input type="text" id="akhir_pelatihan" readonly name="akhir_pelatihan"  style="height: 40px; width: 500px;">';});
		
		$crud->callback_edit_field('akhir_pelatihan',function($value, $primary_key){
			return '  <input type="text" id="akhir_pelatihan" readonly  value="'.$value.'" name="akhir_pelatihan"  style="height: 40px; width: 500px;" >';});

		$crud->display_as('nik','No Telepon');
		$crud->display_as('nama','Nama Peserta');

		$crud->unset_simpan();
		$crud->unset_print();
		$crud->unset_clone();
		$crud->unset_export();

		$output = $crud->render();
		$this->load->view('content_crud_peserta',(array)$output);
		 
	}

	public function lihat_nilai(){
		
		$username=$this->session->userdata("user_name");
		$crud = new grocery_CRUD();
		$crud->set_model('Custom_grocery_crud_model');
		$crud->basic_model->set_custom_query("SELECT * FROM nilai where id_pendaftar = '$username'");

		$crud->set_table('nilai');
		$crud->set_subject('Data Nilai Pelatihan Saya');	

		$crud->required_fields('kode_jenis_pelatihan');
		$crud->display_as('id_pendaftar','Id Peserta');
		

		$crud->add_action('Cetak Sertifikat',base_url('/assets/serti.png'),'peserta/sertifikat');
		$crud->unset_operations();

		$output = $crud->render();

		$output->output = str_replace('title="Cetak Sertifikat"', 'title ="Cetak Sertifikat" target="_blank"', $output->output);
		$this->load->view('content_crud_peserta',(array)$output);
		 
	}
	
	public function sertifikat(){
        $data['data']=$this->m_login->sertifikat($this->uri->segment(3));
        $this->load->view('rekap/sertifikat',$data);
	}
	
	public function status_peserta(){
		$data = array();
		$username=$this->session->userdata("user_name");
		$data['data']=$this->db->query("SELECT * FROM peserta, pelatihan WHERE peserta.id_pelatihan = jenis_pelatihan.id_pelatihan AND peserta.id_peserta = '$username'")->result();
		$this->load->view('status_peserta',$data);
	}
	

}
