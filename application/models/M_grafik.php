<?php
class M_grafik extends CI_Model{
 
	function get_data_stok(){
        $query = $this->db->query("SELECT kode_jenis_pelatihan, jenis_pelatihan, SUM(jumlah) AS jumlah FROM peserta GROUP BY kode_jenis_pelatihan");
          
        if($query->num_rows() > 0){
            foreach($query->result() as $data){
                $hasil[] = $data;
            }
            return $hasil;
        }
    }
 
}