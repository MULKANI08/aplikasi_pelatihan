<!DOCTYPE html>
<html lang="en">
<?php
function tgl_indo($tanggal)
{
    $bulan = array(
        1 =>   'Januari',
        'Februari',
        'Maret',
        'April',
        'Mei',
        'Juni',
        'Juli',
        'Agustus',
        'September',
        'Oktober',
        'November',
        'Desember'
    );
    $pecahkan = explode('-', $tanggal);

    // variabel pecahkan 0 = tanggal
    // variabel pecahkan 1 = bulan
    // variabel pecahkan 2 = tahun

    return $pecahkan[2] . ' ' . $bulan[(int) $pecahkan[1]] . ' ' . $pecahkan[0];
}?>

<head>
<script>window.print()</script>
    <meta charset="UTF-8">
    <script>window.print()</script>
    <link rel="stylesheet" type="text/css" href="style.css">
    
    <link rel="icon" type="image/png" sizes="16x16" href="<?php echo base_url()?>assets/logo2.png">
    <title>Pelatihan PUPR</title>
    <style>
    .table1 {
    font-family: sans-serif;
    color: #444;
    border-collapse: collapse;
    width: 100%;
    border: 1px solid #000;
}
 
.table1 tr th{
    background: #90EE90;
    color: 	#000000;
    font-weight: normal;
}
 
.table1, th, td {
    padding: 8px;
    text-align: center;
}
 
.table1 tr:hover {
    background-color: #E0FFFF;
}
 
.table1 tr:nth-child(even) {
    background-color: #f2f2f2;
}
    </style>
</head>
<img src="<?php echo base_url('assets/kopSurat.png')?>" alt=""style="width :100%" />
<h4><p align="center">LAPORAN DATA JENIS PELATIHAN</p></h4>
<h4><p>Di Cetak Hari
<?php
 $hari   = date('l');
 $hari_indonesia = array('Monday'  => 'Senin',
    'Tuesday'  => 'Selasa',
    'Wednesday' => 'Rabu',
    'Thursday' => 'Kamis',
    'Friday' => 'Jumat',
    'Saturday' => 'Sabtu',
    'Sunday' => 'Minggu');
 echo $hari_indonesia[$hari];
?>
, <?php echo tgl_indo(date('Y-m-d'));?></p></h4>
<h4>Jumlah Laki-Laki: <?php
$filter=$this->input->post('filter');
if ($filter == 'semua') {
$query = $this->db->query("SELECT * FROM instruktur, jenis_pelatihan where instruktur.jenis_kelamin = 'Laki-Laki' AND instruktur.id_instruktur = jenis_pelatihan.id_instruktur");
    		if($query->num_rows() > 0){
				echo $query->num_rows();
			}else{
				echo 0;
			}
        }else {
            $query = $this->db->query("SELECT * FROM instruktur, jenis_pelatihan where jenis_pelatihan.nama = '$filter' AND instruktur.jenis_kelamin = 'Laki-Laki' AND instruktur.id_instruktur = jenis_pelatihan.id_instruktur");
    		if($query->num_rows() > 0){
				echo $query->num_rows();
			}else{
				echo 0;
			}
        }
?> <br>
Jumlah Perempuan:  <?php
$filter=$this->input->post('filter');
if ($filter == 'semua') {
$query = $this->db->query("SELECT * FROM instruktur, jenis_pelatihan where instruktur.jenis_kelamin = 'Perempuan' AND instruktur.id_instruktur = jenis_pelatihan.id_instruktur");
    		if($query->num_rows() > 0){
				echo $query->num_rows();
			}else{
				echo 0;
			}
        }else {
            $query = $this->db->query("SELECT * FROM instruktur, jenis_pelatihan where jenis_pelatihan.nama = '$filter' AND instruktur.jenis_kelamin = 'Perempuan' AND instruktur.id_instruktur = jenis_pelatihan.id_instruktur");
    		if($query->num_rows() > 0){
				echo $query->num_rows();
			}else{
				echo 0;
			}
        }
?></h4>
<body>
<table border="1" align="center" class="table1">
    <tr>
		<th>No</th>
        <th>Kode</th>
        <th>Jenis Pelatihan</th>
        <th>Lokasi</th>
        <th>Nama Instruktur</th>
        <th>Jadwal Pelatihan</th>
        <!-- <th>Foto</th> -->
      
        <?php $no = 1; foreach ($data as $key):?>
            <tr>
         
            <td><?php echo $no++?></td>
            <td><?php echo $key['kode_jenis_pelatihan'] ?></td>
            <td><?php echo $key['jenis_pelatihan'] ?></td>
            <td><?php echo $key['lokasi_pelatihan'] ?></td>
            <td><?php echo $key['nama'] ?></td>
            <td><?php echo tgl_indo($key['mulai_pelatihan']) ?> - <?php echo tgl_indo($key['akhir_pelatihan']) ?></td>
  
            </tr>
            <?php endforeach ?>
    </table>
     <br>
	 <table align="right" border="0">
		    <tr>
		        <td></td>
		        <td style="font-size: 20px" align="center"> Banjarmasin, <?php echo tgl_indo(date('Y-m-d'));?><br>
				Kepala Balai,
		        <?php
                 $data = $this->db->query("SELECT * From ttd LIMIT 1")->result();
                 foreach ($data as $key):?>
                <br><br><br><u> <?php echo $key->nama_kepala_balai ?></u>
		        

				<br>NIP. <?php echo $key->nip ?>
                <?php endforeach ?>
                </td>
		    </tr>
		</table>
</body>
</html>
