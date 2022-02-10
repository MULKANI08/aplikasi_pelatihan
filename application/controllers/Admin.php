<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin extends CI_Controller {

	public function __construct() {
		parent::__construct();

		$this->load->database();
		$this->load->helper('url');

		$this->load->library('grocery_CRUD','email');
		// $tes=$this->db->query("SELECT * FROM peserta")->result_array();

		// foreach ($tes as $key) {

		// 	$akhir_pelatihan = new DateTime($key['akhir_pelatihan']);
	  	// 	$today = new DateTime('today');
	  	// 	$y = $today->diff($akhir_pelatihan)->y;

		// 	$id = $key['id'];
		// 	if ($y >= 1) {
		// 		$this->db->query("UPDATE peserta SET status_pelatihan = 'Alumni' WHERE id = '$id'");
		// 	} else {
		// 		$this->db->query("UPDATE peserta SET status_pelatihan = 'Diterima' WHERE id = '$id'");
		// 	}
			
		// }
	}

	public function _example_output($output = null) {
		
		$this->load->view('content_crud_admin',(array)$output);
	}

	public function index() {
		$this->_example_output((object)array('output' => '' , 'js_files' => array() , 'css_files' => array()));
	}

	
	//akun_peserta
	public function ttd(){
		$crud = new grocery_CRUD();
		$crud->set_table('ttd');
		$crud->set_subject('Setting Tanda Tangan');

		$crud->required_fields('nip','nama_kepala_balai');
		$crud->set_field_upload('foto_ktp','assets/uploads/images');

		$crud->unset_add();
		$crud->unset_delete();
		$crud->unset_simpan();
		$crud->unset_print();
		$crud->unset_clone();
		$crud->unset_export();
		$output = $crud->render();
		
		$this->load->view('content_crud_admin',(array)$output);
		 
	}
	public function tes(){
		$this->load->view('tes');
	}

	public function kirim_pesan($post_array,$primary_key){
		{
			$id_registrasi=$this->input->post('id_registrasi');
			$nama=$this->input->post('nama');
			$status_daftar_ulang=$this->input->post('status_daftar_ulang');
			$no_telepon=$this->input->post('no_telepon');
						
			$userkey = 'aaa';
			$passkey = 'yslxmkgsv3';
			$telepon = $no_telepon;
			$message = "Informasi PPDB bahwa anak anda sebagai berikut: 
			ID Registrasi : $id_registrasi.
			Nama :$nama.
			Dinyatakan : $status_daftar_ulang.";
			$url = 'https://gsm.zenziva.net/api/sendsms/';
			$curlHandle = curl_init();
			curl_setopt($curlHandle, CURLOPT_URL, $url);
			curl_setopt($curlHandle, CURLOPT_HEADER, 0);
			curl_setopt($curlHandle, CURLOPT_RETURNTRANSFER, 1);
			curl_setopt($curlHandle, CURLOPT_SSL_VERIFYHOST, 2);
			curl_setopt($curlHandle, CURLOPT_SSL_VERIFYPEER, 0);
			curl_setopt($curlHandle, CURLOPT_TIMEOUT,30);
			curl_setopt($curlHandle, CURLOPT_POST, 1);
			curl_setopt($curlHandle, CURLOPT_POSTFIELDS, array(
			    'userkey' => $userkey,
			    'passkey' => $passkey,
			    'nohp' => $telepon,
			    'pesan' => $message
			));
			$results = json_decode(curl_exec($curlHandle), true);
			curl_close($curlHandle);
			}
		}

	//akun_baru
	public function akun_baru(){
		$crud = new grocery_CRUD();
		$crud->set_model('Custom_grocery_crud_model');
		
		$crud->basic_model->set_custom_query("SELECT * FROM pendaftar where status_daftar= 'Baru'");

		$crud->set_table('pendaftar');
		$crud->set_subject('Data Akun Baru');

		$crud->required_fields('status_daftar');
		$crud->columns(array('id_pendaftar','tanggal_daftar','nik','nama','tempat_lahir','tanggal_lahir','jenis_kelamin','no_telepon','email','alamat','foto_ktp','pas_foto'));
				
		$crud->field_type('jenis_kelamin','enum',array('Laki-Laki','Perempuan'));
		$crud->field_type('status_daftar','enum',array('Baru','Diterima','Ditolak'));
		$crud->set_field_upload('foto_ktp','assets/uploads/images');
		$crud->set_field_upload('pas_foto','assets/uploads/images');

		$crud->field_type('id_pelatihan','hidden');
		$crud->field_type('nama_pelatih','hidden');
		$crud->field_type('jadwal_pelatihan','hidden');
		$crud->field_type('mulai_pelatihan','hidden');
		$crud->field_type('akhir_pelatihan','hidden');

		// $crud->field_type('status_daftar','hidden');
		$crud->field_type('kouta_terpakai','hidden');
		$crud->field_type('status_pelatihan','hidden');
		
		$crud->callback_after_update(array($this, 'daftar'));
		$crud->callback_before_update(array($this, 'send_mail'));

		$crud->display_as('nik','NIP/NIK');

		$crud->unset_add();
		$crud->unset_simpan();
		$crud->unset_print();
		$crud->unset_clone();
		$crud->unset_export();
		$output = $crud->render();
		
		$this->load->view('content_data_pendaftar',(array)$output);
		 
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
		$keterangan_ditolak=$this->input->post('keterangan_ditolak');
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
						<tr>
						<td>Username</td>
						<td>:</td>
						<td>'.$id_pendaftar.'</td>
						</tr>
						<tr>
						<td>Password</td>
						<td>:</td>
						<td>'.$no_telepon.'</td>
						</tr>
						</h3>
						
						<h2>Status Akun Anda : '.$status_daftar.'</h2>
						<h2>'.$keterangan_ditolak.'</h2>
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

	public function daftar($post_array,$primary_key){
			$id_pendaftar=$this->input->post('id_pendaftar');
			$nik=$this->input->post('nik');
			$nama=$this->input->post('nama');
			$tempat_lahir=$this->input->post('tempat_lahir');
			$tanggal_lahir=$this->input->post('tanggal_lahir');
			$jenis_kelamin=$this->input->post('jenis_kelamin');
			$no_telepon=$this->input->post('no_telepon');
			$email=$this->input->post('email');
			$alamat=$this->input->post('alamat');
			$foto_ktp=$this->input->post('foto_ktp');
			$pas_foto=$this->input->post('pas_foto');
			$status_daftar=$this->input->post('status_daftar');
			$role='peserta';
			$tes=str_replace("/","-",$tanggal_lahir);
			{
				$tambah = array(
					"id" => $primary_key,
					"username" => $id_pendaftar,
					"password" => $no_telepon,
					"nama" => $nama,
					"role" => $role,
					"status" => $status_daftar,
					"foto" => $pas_foto,
				);
				// $user = array(
				
				// 	"status" => $status_daftar,
				// );
				$this->db->insert('users',$tambah);
				$this->db->update('users',$tambah,array('username' => $id_pendaftar));
				return true;
			}
		}

		public function hapus_pendaftar($primary_key){
			{
				return $this->db->delete('pendaftar',array('id' => $primary_key));
			}
		}

	//akun_peserta
	public function akun_peserta(){
		$crud = new grocery_CRUD();
		$crud->set_model('Custom_grocery_crud_model');
		
		$crud->basic_model->set_custom_query("SELECT * FROM pendaftar where status_daftar != 'Baru'");

		$crud->set_table('pendaftar');
		$crud->set_subject('Data Akun Baru');

		$crud->required_fields('status_daftar');
		$crud->columns(array('id_pendaftar','tanggal_daftar','nik','nama','tempat_lahir','tanggal_lahir','jenis_kelamin','no_telepon','email','alamat','foto_ktp','pas_foto'));
				
		$crud->field_type('jenis_kelamin','enum',array('Laki-Laki','Perempuan'));
		$crud->field_type('status_daftar','enum',array('Baru','Diterima','Ditolak'));
		$crud->set_field_upload('foto_ktp','assets/uploads/images');
		$crud->set_field_upload('pas_foto','assets/uploads/images');

		$crud->field_type('id_pelatihan','hidden');
		$crud->field_type('nama_pelatih','hidden');
		$crud->field_type('jadwal_pelatihan','hidden');
		$crud->field_type('mulai_pelatihan','hidden');
		$crud->field_type('akhir_pelatihan','hidden');

		// $crud->field_type('status_daftar','hidden');
		$crud->field_type('kouta_terpakai','hidden');
		$crud->field_type('status_pelatihan','hidden');
		
		$crud->callback_after_update(array($this, 'daftar'));

		$crud->display_as('nik','NIP/NIK');

		$crud->unset_add();
		$crud->unset_simpan();
		$crud->unset_print();
		$crud->unset_clone();
		$crud->unset_export();
		$output = $crud->render();
		
		$this->load->view('content_crud_admin',(array)$output);
		 
	}
	///pelatih
	public function bidang_pelatihan(){
		$crud = new grocery_CRUD();
		$crud->set_table('bidang_pelatihan');
		$crud->set_subject('Data Bidang Pelatihan');
		$crud->required_fields('nama_pelatihan','bidang_pelatihan','pusat_penyelenggara','email','jenis_kelamin','alamat','deskripsi_instruktur','id_instruktur','nik');

		$crud->set_field_upload('foto','assets/uploads/images');

		$crud->callback_add_field('id_pelatihan',function(){
			$data=$this->db->query("SELECT MAX(id) as id1 FROM bidang_pelatihan")->row_array();
			$data2=$data['id1']+1;
			$fzeropadded = sprintf("%03d", $data2);
			$data3 = "BDG-".$fzeropadded;
			return '<input type="text" style="height: 40px" readonly value="'.$data3.'" name="id_pelatihan">';});
		
		$crud->callback_edit_field('id_pelatihan',function($value, $primary_key){
			return ' <input type="text" name="id_pelatihan" style="height: 40px" readonly value="'.$value.'">';});


		$crud->field_type('jenis_kelamin','enum',array('Laki-Laki','Perempuan'));

		$crud->display_as('nik','No KTP');
		
		$crud->unset_simpan();
		$crud->unset_clone();
		$crud->unset_export();
		$crud->unset_print();
		$output = $crud->render();
		$this->load->view('content_crud_admin',(array)$output);
	
	}
	
	///pelatihan
	public function jenis_pelatihan(){
		$crud = new grocery_CRUD();
		$crud->set_table('jenis_pelatihan');
		$crud->set_subject('Data Pelatihan');
		$crud->required_fields('nama_pelatihan','kode_jenis_pelatihan','bidang_pelatihan','pusat_penyelenggara','mulai_pelatihan','akhir_pelatihan','target_peserta');

		$crud->callback_add_field('kode_jenis_pelatihan',function(){
			$data=$this->db->query("SELECT MAX(id_pelatihan) as id1 FROM jenis_pelatihan")->row_array();
			$data2=$data['id1']+1;
			$fzeropadded = sprintf("%03d", $data2);
			$data3 = "LTH-".$fzeropadded;
			return '<input type="text" style="height: 40px" readonly value="'.$data3.'" name="kode_jenis_pelatihan">';});
		
		$crud->callback_edit_field('kode_jenis_pelatihan',function($value, $primary_key){
			return ' <input type="text" name="kode_jenis_pelatihan" style="height: 40px" readonly value="'.$value.'">';});
		
		$crud->callback_add_field('bidang_pelatihan',function(){
			return '  <input type="text" id="bidang_pelatihan" readonly name="bidang_pelatihan"  style="height: 40px; width: 400px;">&nbsp;&nbsp;&nbsp;<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#instrukturModal"><b>Cari Data</b></button>';});
		
		$crud->callback_edit_field('bidang_pelatihan',function($value, $primary_key){
			return '  <input type="text" id="bidang_pelatihan" readonly  value="'.$value.'" name="bidang_pelatihan"  style="height: 40px; width: 400px;" >&nbsp;&nbsp;&nbsp;<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#instrukturModal"><b>Cari Data</b></button>';});
		
		$crud->callback_add_field('pusat_penyelenggara',function(){
			return '  <input type="text" id="pusat_penyelenggara" readonly name="pusat_penyelenggara"  style="height: 40px; width: 500px;">';});
		
		$crud->callback_edit_field('pusat_penyelenggara',function($value, $primary_key){
			return '  <input type="text" id="pusat_penyelenggara" readonly  value="'.$value.'" name="pusat_penyelenggara"  style="height: 40px; width: 500px;" >';});

		$crud->unset_simpan();
		$crud->unset_clone();
		$crud->unset_export();
		$crud->unset_print();
		$output = $crud->render();
		$this->load->view('content_crud_admin',(array)$output);
	
	}

	public function pelatihan_peserta(){
		
		$crud = new grocery_CRUD();
		$crud->set_model('Custom_grocery_crud_model');
		$crud->basic_model->set_custom_query("SELECT * FROM peserta where status_pelatihan != 'Alumni'");

		$crud->set_table('peserta');
		$crud->set_subject('Data Pelatihan Peserta');	

		$crud->required_fields('status_pelatihan');
		$crud->display_as('id_pendaftar','Id Peserta');
		$crud->display_as('nik','No Telepon');
		$crud->display_as('nama','Nama Peserta');

		$crud->unset_columns(array('jadwal_pelatihan','status','jumlah'));
		$crud->field_type('status_pelatihan','enum',array('Belum Diverifikasi','Diterima','Ditolak (Persyaratan Peserta Tidak Sesuai)','Ditolak (Kuota Sudah Terpenuhi)'));
		
		$crud->unset_add();
		$crud->unset_simpan();
		$crud->unset_print();
		$crud->unset_clone();
		$crud->unset_export();

		$output = $crud->render();
		$this->load->view('content_crud_admin',(array)$output);
		 
	}
	public function alumni(){
		$crud = new grocery_CRUD();
		$crud->set_table('alumni');
		$crud->set_subject('Data Pelatihan Alumni');	

		$crud->required_fields('id_pendaftar','tanggal_lulus');
		$crud->display_as('id_pendaftar','Id Peserta');
		$crud->display_as('nik','No Telepon');
		$crud->display_as('nama','Nama Peserta');
		
		$crud->unset_columns(array('penilaian'));
		$crud->field_type('penilaian','hidden');
		
		$crud->callback_add_field('penilaian',function(){
			return '  <input type="hidden" id="penilaian" Value="Belum Dinilai" name="penilaian" readonly style="height: 40px; width: 500px;">';});
		
		$crud->callback_edit_field('penilaian',function($value, $primary_key){
			return '  <input type="hidden" id="penilaian" value="'.$value.'" name="penilaian" readonly style="height: 40px; width: 500px;" >';});
		
		$crud->callback_after_insert(array($this,'status_alumni'));
		$crud->callback_after_delete(array($this,'hapus_alumni'));

		$crud->callback_add_field('id_pendaftar',function(){
			return '  <input type="text" id="id_pendaftar" readonly name="id_pendaftar"  style="height: 40px; width: 400px;">&nbsp;&nbsp;&nbsp;<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#alumniModal"><b>Cari Data</b></button>';});
		
		$crud->callback_edit_field('id_pendaftar',function($value, $primary_key){
			return '  <input type="text" id="id_pendaftar" readonly  value="'.$value.'" name="id_pendaftar"  style="height: 40px; width: 400px;" >&nbsp;&nbsp;&nbsp;<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#alumniModal"><b>Cari Data</b></button>';});
	
		$crud->unset_delete();
		$crud->unset_simpan();
		$crud->unset_print();
		$crud->unset_clone();
		$crud->unset_export();

		$output = $crud->render();
		$this->load->view('content_crud_admin',(array)$output);
		 
	}

	function status_alumni($post_array){
		$id_pendaftar=$this->input->post('id_pendaftar');
		$nama_pelatihan=$this->input->post('nama_pelatihan');
		{
			$update_status_lama = array(
				"id_pendaftar" => $id_pendaftar,
				"status_pelatihan" => 'Alumni'
			);
		$this->db->update('peserta',$update_status_lama,array('id_pendaftar' => $id_pendaftar, 'nama_pelatihan' => $nama_pelatihan));
		return true;
		}
	}

	// function hapus_alumni($primary_key){
	// 	{
	// 	return $this->db->update('peserta',array('id_pendaftar' => $primary_key,'status_pelatihan'=>'Diterima'));
	// 	}
	// }

	function status_nilai($post_array){
		$id_pendaftar=$this->input->post('id_pendaftar');
				$nama_pelatihan=$this->input->post('nama_pelatihan');

		{
			$update_status_lama = array(
				"id_pendaftar" => $id_pendaftar,
				"penilaian" => 'Selesai'
			);
		$this->db->update('alumni',$update_status_lama,array('id_pendaftar' => $id_pendaftar, 'nama_pelatihan' => $nama_pelatihan));
		return true;
		}
	}

	function hapus_nilai($primary_key){
		{
		return $this->db->update('alumni',array('id_pendaftar' => $primary_key,'penilaian'=>'Belum Dinilai'));
		}
	}

	
	public function sertifikat(){
        $data['data']=$this->m_login->sertifikat($this->uri->segment(3));
        $this->load->view('rekap/sertifikat',$data);
	}
	
	//nilai
	public function nilai(){
		$crud = new grocery_CRUD();
		
		$crud->required_fields('nilai');
		$crud->set_table('nilai');
		$crud->set_subject('Data Nilai Peserta');	
		$crud->display_as('id_pendaftar','Id Peserta');
		$crud->display_as('nama','Nama Peserta');
		// $crud->add_action('Cetak Sertifikat',base_url('/assets/serti.png'),'admin/sertifikat');
		
		$crud->field_type('predikat','enum',array('Sangat Memuaskan','Memuaskan','Baik Sekali','Baik','Tidak Lulus'));
		$crud->callback_after_insert(array($this,'status_nilai'));
		$crud->callback_after_delete(array($this,'hapus_nilai'));

		$crud->callback_add_field('id_pendaftar',function(){
			return '  <input type="text" id="id_pendaftar" readonly name="id_pendaftar"  style="height: 40px; width: 400px;">&nbsp;&nbsp;&nbsp;<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#sertifikatModal"><b>Cari Data</b></button>';});
		
		$crud->callback_edit_field('id_pendaftar',function($value, $primary_key){
			return '  <input type="text" id="id_pendaftar" readonly  value="'.$value.'" name="nama_pelatih"  style="height: 40px; width: 400px;" >&nbsp;&nbsp;&nbsp;<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#sertifikatModal"><b>Cari Data</b></button>';});

		$crud->callback_add_field('nama',function(){
			return '  <input type="text" id="nama" readonly name="nama"  style="height: 40px; width: 500px;">';});
		
		$crud->callback_edit_field('nama',function($value, $primary_key){
			return '  <input type="text" id="nama" readonly  value="'.$value.'" name="nama"  style="height: 40px; width: 500px;">';});

		$crud->callback_add_field('nama_pelatihan',function(){
			return '  <input type="text" id="nama_pelatihan" readonly name="nama_pelatihan"  style="height: 40px; width: 500px;">';});
		
		$crud->callback_edit_field('nama_pelatihan',function($value, $primary_key){
			return '  <input type="text" id="nama_pelatihan" readonly  value="'.$value.'" name="nama_pelatihan"  style="height: 40px; width: 500px;">';});

		$crud->callback_add_field('bidang_pelatihan',function(){
			return '  <input type="text" id="bidang_pelatihan" readonly name="bidang_pelatihan"  style="height: 40px; width: 500px;">';});
		
		$crud->callback_edit_field('bidang_pelatihan',function($value, $primary_key){
			return '  <input type="text" id="bidang_pelatihan" readonly  value="'.$value.'" name="bidang_pelatihan"  style="height: 40px; width: 500px;">';});

		$crud->callback_add_field('pusat_penyelenggara',function(){
			return '  <input type="text" id="pusat_penyelenggara" readonly name="pusat_penyelenggara"  style="height: 40px; width: 500px;">';});
		
		$crud->callback_edit_field('pusat_penyelenggara',function($value, $primary_key){
			return '  <input type="text" id="pusat_penyelenggara" readonly  value="'.$value.'" name="pusat_penyelenggara"  style="height: 40px; width: 500px;">';});

		
		// $crud->unset_columns(array('id_pelatihan','foto_ktp','jadwal_pelatihan','tempat_lahir','tanggal_lahir','jenis_kelamin','status_daftar'));
				
		$crud->set_field_upload('pas_foto','assets/uploads/images');

		$crud->unset_delete();
		$crud->unset_simpan();
		$crud->unset_print();
		$crud->unset_clone();
		$crud->unset_export();
		$output = $crud->render();

		// $output->output = str_replace('title="Cetak Sertifikat"', 'title ="Cetak Sertifikat" target="_blank"', $output->output);
		$this->_example_output($output);
	}

	// pengguna
	public function users(){
		$crud = new grocery_CRUD();
		$crud->set_model('Custom_grocery_crud_model');
		
		$crud->basic_model->set_custom_query("SELECT * FROM users where status= 'Diterima'");

		$crud->set_table('users');
		$crud->set_subject('Data Pengguna');	
		// $crud->unset_columns(array('status'));
		$crud->required_fields('id','username','password','nama','role');
		$crud->change_field_type('password', 'password');
		
		$crud->unset_simpan();
		$crud->unset_clone();
		$crud->unset_export();
		$crud->unset_print();
		
		$crud->field_type('status','enum',array('Diterima','Ditolak'));

		// $crud->field_type('id_registrasi','hidden');
		// $crud->unset_columns(array('id_registrasi','status'));
			
		$crud->set_field_upload('foto','assets/uploads/images');
			
		$output = $crud->render();
		$this->_example_output($output);
	}

	// batas


}
