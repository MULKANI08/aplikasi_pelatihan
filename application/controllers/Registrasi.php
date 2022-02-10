<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Registrasi extends CI_Controller {

	public function __construct() {
		parent::__construct();

		$this->load->database();
		$this->load->helper('url');

		$this->load->library('grocery_CRUD','email');
	}

	public function _example_output($output = null) {
		$this->load->view('content_crud_dashboard',(array)$output);
	}

	public function index() {
		$this->_example_output((object)array('output' => '' , 'js_files' => array() , 'css_files' => array()));
	}

	
	public function pelatihan_peserta(){
		
		$crud = new grocery_CRUD();
		// $crud->set_model('Custom_grocery_crud_model');
		// $crud->basic_model->set_custom_query("SELECT * FROM peserta where status_pelatihan = 'Diterima'");

		// $crud->set_table('peserta');
		// $crud->set_subject('Jadwal Pelatihan Peserta');	
		
		// $crud->unset_columns('status_latihan','jadwal_pelatihan','jumlah');
		// $crud->unset_operations();

		// $output = $crud->render();

		$crud->set_table('jenis_pelatihan');
		$crud->set_subject('Informasi Pelatihan');
		$crud->required_fields('jenis_pelatihan','lokasi_pelatihan','mulai_pelatihan','akhir_pelatihan','kouta','sisa_kouta');
		
		$crud->unset_columns(array('status_pelatihan'));
		$crud->field_type('status','hidden');

		$crud->unset_add();
		$crud->unset_edit();
		$crud->unset_delete();
		$crud->unset_print();
		$crud->unset_clone();
		$crud->unset_export();

		$output = $crud->render();
		$this->load->view('content_crud_dashboard',(array)$output);

		 
	}

	// pendaftar
	public function daftar(){
			$crud = new grocery_CRUD();
			$crud->set_table('pendaftar');
			$crud->set_subject('Buat Akun');	
			$crud->required_fields('id_pendaftar','nik','nama','tempat_lahir','tanggal_lahir','jenis_kelamin','no_telepon','email','alamat','foto_ktp','pas_foto','lokasi_pelatihan');

			// $crud->display_as('id_pelatihan','Jenis pelatihan');
			// $crud->set_relation('id_pelatihan','pelatihan','{jenis_pelatihan} - {lokasi_pelatihan}',array('status' => 'ada'));
			
			$crud->display_as('nik','NIP/NIK');

			$timezone="Asia/Makassar";
			date_default_timezone_set($timezone);
			$crud->change_field_type('tanggal_daftar', 'hidden', date('Y-m-d'));
			
			// $crud->callback_before_insert(array($this, 'tambah_user'));
			$crud->callback_after_insert(array($this, 'send_mail'));

			$crud->field_type('jenis_kelamin','enum',array('Laki-Laki','Perempuan'));
			$crud->set_field_upload('foto_ktp','assets/uploads/images');
			$crud->set_field_upload('pas_foto','assets/uploads/images');

			$crud->callback_add_field('no_telepon',function(){
			 return '  <input type="text" id="no_telepon" name="no_telepon" required minlength="10" maxlength="14"  style="height: 40px">';});

			$crud->callback_add_field('id_pendaftar',function(){
				$data=$this->db->query("SELECT MAX(id_pendaftar) as kd1 FROM pendaftar")->row_array();
				$data2=$data["kd1"]+1;
				$fzeropadded = sprintf("%05d", $data2);
				return '  <input type="text" id="id_pendaftar" style="height: 40px" readonly value="'.$fzeropadded.'" name="id_pendaftar">';});

			$crud->field_type('keterangan_ditolak','hidden');
			$crud->field_type('status_daftar','hidden');
			$crud->field_type('status_pelatihan','hidden');
			$crud->field_type('nama_pelatih','hidden');
			$crud->field_type('jadwal_pelatihan','hidden');
			$crud->field_type('mulai_pelatihan','hidden');
			$crud->field_type('akhir_pelatihan','hidden');
			$crud->field_type('jenis_pelatihan','hidden');
			$crud->field_type('id_pelatihan','hidden');
			$crud->field_type('kouta_terpakai','hidden');
			$crud->callback_add_field('status_daftar',function(){
			 return '  <input type="hidden" readonly name="status_daftar" value="Baru" style="height: 40px; width: 500px;">';});

			$crud->unset_print();
			$crud->unset_clone();
			$crud->unset_edit();
			$crud->unset_delete();
			$crud->unset_export();
			$crud->unset_back_to_list();

			$output = $crud->render();
			$this->load->view('content_crud_dashboard',(array)$output);
		}

		
		function cek_nik($post_array){
			$i = $this->db->where('nik', $post_array['nik'])->get('pendaftar')->num_rows();
			if($i == 0){
			 return true;
			}else{
			 return false;
			}
		}

		function send_mail($post_array,$primary_key){
		$id_pendaftar=$this->input->post('id_pendaftar');
		$nik=$this->input->post('nik');
		$nama=$this->input->post('nama');
		$tempat_lahir=$this->input->post('tempat_lahir');
		$tanggal_lahir=$this->input->post('tanggal_lahir');
		$jenis_kelamin=$this->input->post('jenis_kelamin');
		$no_telepon=$this->input->post('no_telepon');
		$email=$this->input->post('email');
		$alamat=$this->input->post('alamat');
		$status_daftar=$this->input->post('status_daftar');
		$message = '<center>
		 				<a href="#" style="pointer-events:none;"><img src="https://firebasestorage.googleapis.com/v0/b/test-32e3d.appspot.com/o/logo-bpsdm-removebg-preview.png?alt=media&token=b63623d0-845d-4c13-91d2-01043283db7b" alt="Logo" width="10%" style="display: block;"/></a>
					    <h3>Layanan Pelatihan Bapekom PUPR Wilayah VII Banjarmasin</h3>
					    <h3>Pemberitahuan pembuatan akun anda dengan data berikut :<br><br><br>
						<table border="0">
						<tr> 
						<td>ID Pendaftar</td>
						<td>:</td>
						<td>'.$id_pendaftar.'</td>
						</tr>
						<tr> 
						<td>NIP/NIK</td>
						<td>:</td>
						<td>'.$nik.'</td>
						</tr>
						<tr> 
						<td>Nama</td>
						<td>:</td>
						<td>'.$nama.'</td>
						</tr>
						<tr> 
						<td>Jenis Kelamin</td>
						<td>:</td>
						<td>'.$jenis_kelamin.'</td>
						</tr>
						<tr>
						<td>Alamat</td>
						<td>:</td>
						<td>'.$alamat.'</td>
						</tr>
						</h3>
						<h2>Status Akun Anda : '.$status_daftar.' - Non Aktif</h2>
					</center>';

		$config['mailtype'] = 'html';
		$config['protocol'] = 'smtp';
		$config['smtp_host'] = 'ssl://smtp.gmail.com';
		$config['smtp_user'] = 'layananmail3@gmail.com';
		$config['smtp_pass'] = 'Layanan@3';
		$config['smtp_port'] = 465;
		$config['charset'] = 'iso-8859-1';
		$config['wordwrap'] = TRUE;
		$config['newline'] = "\r\n";
		$this->email->initialize($config);
		$this->email->from('layanan', 'Informasi Akun Registrasi');
		$this->email->to($email);
		$this->email->subject('Informasi Akun Registrasi');
		$this->email->message($message);
		$this->email->send();
	}

		public function jenis_pelatihan(){
		$crud = new grocery_CRUD();
		$crud->set_table('jenis_pelatihan');
		$crud->set_subject('Data Jenis Pelatihan');
		$crud->required_fields('jenis_pelatihan','lokasi_pelatihan','mulai_pelatihan','akhir_pelatihan','kouta','sisa_kouta');
		
		$crud->unset_columns(array('status_pelatihan'));
		$crud->field_type('status','hidden');
		$crud->unset_operations();
		$output = $crud->render();
		$this->load->view('dashboard/informasi_pelatihan',(array)$output);
	
	}


		public function tambah_user($post_array,$primary_key){
			$id_pendaftar=$this->input->post('id_pendaftar');
			$nik=$this->input->post('nik');
			$no_telepon=$this->input->post('no_telepon');
			$nama=$this->input->post('nama_siswa');
			$status_daftar=$this->input->post('status_daftar');
			$pas_foto=$this->input->post('pas_foto');
			$tes=str_replace("/","-",$tanggal_lahir);
			{
				$registrasi = array(
					"id" => $primary_key,
					"username" => $id_pendaftar,
					"password" => $no_telepon,
					"nama" => $nama,
					"role" => 'peserta',
					"status" => $status_daftar,
					"foto" => $pas_foto,
				);
				
				$this->db->insert('users',$registrasi);
				return true;
			}
		}

	// batas

}
