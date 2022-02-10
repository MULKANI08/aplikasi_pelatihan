<?php if(!defined('BASEPATH')) exit('Hacking Attempt : Keluar dari sistem..!!');

class Login extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
    $this->load->model('m_login');
    $this->load->library(array('form_validation','session'));
    $this->load->database();
    $this->load->helper('url');
  }
  
  public function index(){
		if($this->m_login->ambilPengguna())
      {
        redirect('login/');
			}else{
      //jika session belum terdaftar
      //set form validation
      $this->form_validation->set_rules('username', 'Username', 'required');
      $this->form_validation->set_rules('password', 'Password', 'required');
	 
			//set message form validation
      $this->form_validation->set_message('required', '<div class="alert alert-danger" style="margin-top: 3px">
              <div class="header"><b><i class="fa fa-exclamation-circle"></i> {field}</b> harus diisi</div></div>');

			//cek validasi
      if ($this->form_validation->run() == TRUE) {
			
				//get data dari FORM
      $username = $this->input->post("username", TRUE);
      $password = $this->input->post('password', TRUE);
			
			//cek data via model
      $cek = $this->m_login->check_login('users', array('username' => $username), array('password' => $password));

			//jika ditemukan, maka create session
      if ($cek != FALSE) {
          foreach ($cek as $apps) {

              $session_data = array(
                  'user_id'   => $apps->id,
                  'user_name' => $apps->username,
                  'user_pass' => $apps->password,
                  'user_nama' => $apps->nama,
                  'role'      => $apps->role,
                  'status'    => $apps->status,
                  'foto'      => $apps->foto
			);

			//set session userdata
			$this->session->set_userdata($session_data);
			
			//redirect berdasarkan level user
      if(($this->session->userdata("role") == "admin") AND ($this->session->userdata("status") == "Diterima")){
				echo "<script>
                alert('Login Berhasil');
              </script>"; 
        redirect('homeadmin','refresh');
      }elseif(($this->session->userdata("role") == "peserta") AND ($this->session->userdata("status") == "Diterima")){
				echo "<script>
                alert('Login Berhasil');
              </script>";
        redirect('homepeserta','refresh');
				} else {
					echo " <script>
		            alert('Gagal Login: Kombinasi Username/ Password Salah Atau Akun Belum Di Verifikasi!');
							</script>";
							$this->session->sess_destroy();
							redirect('login','refresh');
				}
			
			}
     }else{
			echo " <script>
		            alert('Gagal Login: Kombinasi Username/ Password Salah Atau Akun Belum Di Verifikasi!');
		            history.go(-1);
		          </script>";
     }

}else{

    $this->load->view('content_login');
		}

  }

}

  public function logout()
  {
   $this->session->sess_destroy();
   
   redirect('dashboard');
  }

}

?>
