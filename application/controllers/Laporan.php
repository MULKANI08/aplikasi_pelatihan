<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Laporan extends CI_Controller {

	public function __construct() {
		parent::__construct();

		$this->load->database();
		$this->load->helper('url');

		$this->load->library('grocery_CRUD','email');
	}

	public function index() {
		$this->_example_output((object)array('output' => '' , 'js_files' => array() , 'css_files' => array()));
	}

	public function instruktur(){
		$crud = new grocery_CRUD();
		$crud->set_table('instruktur');
	

		$crud->unset_operations();
		$output = $crud->render();
		$this->load->view('laporan/instruktur',(array)$output);
	}

	public function rekap_instruktur(){
		$data = array();
		$filter=$this->input->post('filter');
		if ($filter == 'semua') {
			$data['data']=$this->db->query("SELECT * from instruktur ORDER BY id ASC")->result_array();
		}else {
		$data['data']=$this->db->query("SELECT * from  instruktur where jenis_kelamin = '$filter' ORDER BY id ASC")->result_array();
		}
		$this->load->view('rekap/rekap_instruktur',$data);
	}

	public function jenis_pelatihan(){
		$crud = new grocery_CRUD();
		$crud->set_table('jenis_pelatihan');

		$crud->unset_columns(array('status_pelatihan'));
		$crud->unset_operations();
		$output = $crud->render();
		$this->load->view('laporan/jenis_pelatihan',(array)$output);
	}

	public function rekap_jenis_pelatihan(){
			$data = array();
		$filter=$this->input->post('filter');
		if ($filter == 'semua') {
			$data['data']=$this->db->query("SELECT * from jenis_pelatihan ORDER BY kode_jenis_pelatihan ASC")->result_array();
		}else {
		$data['data']=$this->db->query("SELECT * from  jenis_pelatihan where nama = '$filter' ORDER BY kode_jenis_pelatihan ASC")->result_array();
		}
		$this->load->view('rekap/rekap_jenis_pelatihan',$data);
	}
	
	public function pendaftaran_akun(){
		$crud = new grocery_CRUD();
		$crud->set_table('pendaftar');
		$crud->columns(array('id_pendaftar','tanggal_daftar','nik','nama','tempat_lahir','tanggal_lahir','jenis_kelamin','no_telepon','email','alamat','foto_ktp','pas_foto'));
		
		$crud->display_as('nik','No KTP');
		
		$crud->set_field_upload('foto_ktp','assets/uploads/images');
		$crud->set_field_upload('pas_foto','assets/uploads/images');
		$crud->unset_operations();
		$output = $crud->render();
		$this->load->view('laporan/pendaftaran_akun',(array)$output);
	}

	
	public function rekap_pendaftaran_akun(){
		$data = array();
		$tanggal1=$this->input->post('tanggal1');
		$tanggal2=$this->input->post('tanggal2');
		$data['data']=$this->db->query("SELECT * from pendaftar where tanggal_daftar BETWEEN '$tanggal1' AND '$tanggal2' ORDER BY id_pendaftar ASC")->result_array();
		$this->load->view('rekap/rekap_pendaftaran_akun',$data);
	}

	public function rekap_semua_pendaftaran_akun(){
		$data = array();
		$data['data']=$this->db->query("SELECT * from pendaftar ORDER BY id_pendaftar ASC")->result_array();
		 
		$this->load->view('rekap/rekap_pendaftaran_akun_semua',$data);
	}

	public function pendaftar_pelatihan(){
			$crud = new grocery_CRUD();
		$crud->set_model('Custom_grocery_crud_model');
		$crud->basic_model->set_custom_query("SELECT * FROM peserta where status_pelatihan = 'Belum Diverifikasi'");

		$crud->set_table('peserta');
		$crud->set_subject('Data Pendaftar Pelatihan');	
		$crud->display_as('nik','No Telepon');
				
		$crud->unset_columns('jadwal_pelatihan','jumlah');
		$crud->unset_operations();
		$output = $crud->render();
		$this->load->view('laporan/pendaftar_pelatihan',(array)$output);
	}

	public function rekap_pendaftar_pelatihan(){
		$data = array();
		$tanggal1=$this->input->post('tanggal1');
		$tanggal2=$this->input->post('tanggal2');
		$data['data']=$this->db->query("SELECT * from peserta where tanggal_daftar BETWEEN '$tanggal1' AND '$tanggal2' AND status_pelatihan = 'Belum Diverifikasi' ORDER BY id_pendaftar ASC")->result_array();
		$this->load->view('rekap/rekap_pendaftar_pelatihan',$data);
	}

	public function rekap_semua_pendaftar_pelatihan(){
		$data = array();
		$data['data']=$this->db->query("SELECT * from peserta where status_pelatihan = 'Belum Diverifikasi' ORDER BY id_pendaftar ASC")->result_array();
		 
		$this->load->view('rekap/rekap_pendaftar_pelatihan_semua',$data);
	}

	public function pendaftar_ditolak(){
			$crud = new grocery_CRUD();
		$crud->set_model('Custom_grocery_crud_model');
		$crud->basic_model->set_custom_query("SELECT * FROM peserta where status_pelatihan = 'Ditolak (Persyaratan Peserta Tidak Sesuai)' OR 'Ditolak (Kuota Sudah Terpenuhi)'");

		$crud->set_table('peserta');
		$crud->set_subject('Data Pendaftar Pelatihan Ditolak');	
		$crud->display_as('nik','No Telepon');
				
		$crud->unset_columns('jadwal_pelatihan','jumlah');
		$crud->unset_operations();
		$output = $crud->render();
		$this->load->view('laporan/pendaftar_ditolak',(array)$output);
	}

	public function status_pendaftar(){
		$crud = new grocery_CRUD();
		$crud->set_model('Custom_grocery_crud_model');
		$crud->basic_model->set_custom_query("SELECT * FROM peserta where status_pelatihan = 'Ditolak (Persyaratan Peserta Tidak Sesuai)' OR status_pelatihan = 'Ditolak (Kuota Sudah Terpenuhi)' OR status_pelatihan = 'Diterima'");

		$crud->set_table('peserta');
		$crud->set_subject('Data Status Pendaftar Pelatihan');	
		$crud->display_as('nik','No Telepon');
				
		$crud->unset_columns('jadwal_pelatihan','jumlah');
		$crud->unset_operations();
		$output = $crud->render();
		$this->load->view('laporan/status_pendaftar',(array)$output);
	}

	public function rekap_status_pendaftar(){
		$data = array();
		$filter=$this->input->post('filter');
		if ($filter == 'semua') {
			$data['data']=$this->db->query("SELECT * FROM peserta where status_pelatihan = 'Ditolak (Persyaratan Peserta Tidak Sesuai)' OR status_pelatihan = 'Ditolak (Kuota Sudah Terpenuhi)' OR status_pelatihan = 'Diterima' ORDER BY id_pendaftar ASC")->result_array();
		} else {
			$data['data']=$this->db->query("SELECT * FROM peserta where status_pelatihan = '$filter' ORDER BY id_pendaftar ASC")->result_array();
		}
		$this->load->view('rekap/rekap_status_pendaftar',$data);
	}

	public function peserta(){
			$crud = new grocery_CRUD();
		$crud->set_model('Custom_grocery_crud_model');
		$crud->basic_model->set_custom_query("SELECT * FROM peserta where status_pelatihan = 'Diterima'");

		$crud->set_table('peserta');
		$crud->set_subject('Data Peserta Pelatihan');	
		$crud->display_as('nik','No Telepon');
		$crud->display_as('id_pendaftar','Id Peserta');
				
		$crud->unset_columns(array('jadwal_pelatihan','status','jumlah'));

		$crud->unset_operations();
		$output = $crud->render();
		$this->load->view('laporan/peserta',(array)$output);
	}

	
	public function rekap_peserta(){
		$data = array();
		$filter=$this->input->post('filter');
		if ($filter == 'semua') {
			$data['data']=$this->db->query("SELECT * from peserta where status_pelatihan = 'Diterima' ORDER BY id ASC")->result_array();
		}else {
			$data['data']=$this->db->query("SELECT * from peserta where nama_pelatihan = '$filter' AND status_pelatihan = 'Diterima' ORDER BY id ASC")->result_array();
		}
		$this->load->view('rekap/rekap_peserta',$data);
	}

	public function rekap_semua_peserta(){
		$data = array();
		$data['data']=$this->db->query("SELECT * from peserta where status_pelatihan = 'Diterima' ORDER BY id_pendaftar ASC")->result_array();
		 
		$this->load->view('rekap/rekap_peserta_semua',$data);
	}

	public function alumni(){
			$crud = new grocery_CRUD();

		$crud->set_table('alumni');
		$crud->set_subject('Data Alumni Pelatihan');	
		$crud->display_as('nik','No Telepon');
				
		$crud->unset_columns('jadwal_pelatihan');
		$crud->unset_operations();
		$output = $crud->render();
		$this->load->view('laporan/alumni',(array)$output);
	}

	
	public function rekap_alumni(){
		$data = array();
		$filter=$this->input->post('filter');
		if ($filter == 'semua') {
			$data['data']=$this->db->query("SELECT * from alumni")->result_array();
		}else {
			$data['data']=$this->db->query("SELECT * from alumni where nama_pelatihan = '$filter'")->result_array();
		}
		$this->load->view('rekap/rekap_alumni',$data);
	}

	public function rekap_semua_alumni(){
		$data = array();
		$data['data']=$this->db->query("SELECT * from alumni ORDER BY id_pendaftar ASC")->result_array();
		 
		$this->load->view('rekap/rekap_alumni_semua',$data);
	}

	// nilai
	public function nilai(){
		$crud = new grocery_CRUD();
		$crud->set_table('nilai');
		$crud->set_subject('Data Nilai Peserta');	
		$crud->add_action('Cetak Sertifikat',base_url('/assets/serti.png'),'admin/sertifikat');
		
		$crud->display_as('id_pendaftar','Id Peserta');

		$crud->unset_operations();
		$output = $crud->render();
		$output->output = str_replace('title="Cetak Sertifikat"', 'title ="Cetak Sertifikat" target="_blank"', $output->output);
		$this->load->view('laporan/nilai',(array)$output);
	}

	public function rekap_nilai(){
		$data = array();
		$filter=$this->input->post('filter');
		if ($filter == 'semua') {
			$data['data']=$this->db->query("SELECT * from nilai")->result_array();
		}else {
			$data['data']=$this->db->query("SELECT * from nilai where nama_pelatihan = '$filter'")->result_array();
		}
		$this->load->view('rekap/rekap_nilai',$data);
	}
	//batas

	

}
