<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_login extends CI_model {

	function ambilPengguna()
    {
        return $this->session->userdata('user_id');
    }

    //fungsi cek level
    function is_role()
    {
        return $this->session->userdata('role');
    }

    //fungsi check login
    function check_login($table, $field1, $field2)
    {
        $this->db->select('*');
        $this->db->from($table);
        $this->db->where($field1);
        $this->db->where($field2);
        $this->db->limit(1);
        $query = $this->db->get();
        if ($query->num_rows() == 0) {
            return FALSE;
        } else {
            return $query->result();
        }
	}

	public function guru()
	{
		return $this->db->query("SELECT * from guru")->result();
	}
	public function mata_pelajaran()
	{
		return $this->db->query("SELECT * from mata_pelajaran")->result();
	}
	public function jam()
	{
		return $this->db->query("SELECT * from jam")->result();
	}
	public function master_beasiswa()
	{
		return $this->db->query("SELECT * from master_beasiswa")->result();
	}
	public function kelas()
	{
		return $this->db->query("SELECT * from kelas")->result();
	}
	public function siswa_aktif()
	{
		return $this->db->query("SELECT * from siswa where status='aktif' AND status_daftar_ulang='diterima'")->result();
	}

	public function cetak_bukti_pembayaran($id_daftar_ulang){
		return $this->db->query("SELECT * FROM daftar_ulang, registrasi WHERE  daftar_ulang.id_registrasi = registrasi.id_registrasi AND daftar_ulang.id_daftar_ulang='$id_daftar_ulang'")->row_array();
	}

	public function kategori_atribut(){
		return $this->db->query("SELECT *, SUM(harga) as total FROM kategori_atribut GROUP by jenis_kelamin")->result();
	}

	public function lihat_atribut(){
		return $this->db->query("SELECT * from kategori_atribut order by jenis_kelamin ASC")->result();
	}

	public function sertifikat($id){
		$query = $this->db->query("SELECT *, nilai.nama AS nama_p FROM nilai, peserta WHERE nilai.id_pendaftar = peserta.id_pendaftar AND nilai.id='$id'");
		return $result = $query->row_array();
    }
	// public function lihat_atribut(){
	// 	$id=$this->session->userdata("user_id");
	// 	$tes=$this->db->query("SELECT * FROM users,registrasi where users.id_registrasi = registrasi.id_registrasi AND registrasi.id_registrasi = '$id'")->row_array();
	// 	$tes1=$tes['jenis_kelamin'];
	// 	return $this->db->query("SELECT * from kategori_atribut where jenis_kelamin = '$tes1'")->result();
	// }

	public function pendaftar_baru()
	{   
    	$query = $this->db->query("SELECT * FROM pendaftar where status_daftar = 'baru'");
    		if($query->num_rows() > 0){
				return $query->num_rows();
			}else{
				return 0;
			}
	}
	public function peserta()
	{   
    	$query = $this->db->query("SELECT * FROM peserta where status_pelatihan = 'Diterima'");
    		if($query->num_rows() > 0){
				return $query->num_rows();
			}else{
				return 0;
			}
	}
	public function alumni()
	{   
    	$query = $this->db->query("SELECT * FROM alumni");
    		if($query->num_rows() > 0){
				return $query->num_rows();
			}else{
				return 0;
			}
	}
	public function pelatihan()
	{   
    	$query = $this->db->query("SELECT * FROM jenis_pelatihan");
    		if($query->num_rows() > 0){
				return $query->num_rows();
			}else{
				return 0;
			}
	}


	public function jumlah($id)
	{   
    	return $this->db->query("SELECT COUNT(jenis_pelatihan) AS jumlah FROM pendaftar WHERE status_daftar = 'Diterima'")->result();
	}

	public function status_peserta(){
		$username=$this->session->userdata("user_name");
		return $this->db->query("SELECT * FROM pendaftar WHERE id_pendaftar='$username'")->row_array();
	}

}
