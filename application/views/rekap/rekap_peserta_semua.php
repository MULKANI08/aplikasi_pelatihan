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
    <style type="text/css">
    table { page-break-inside:auto }
    div   { page-break-inside:avoid; } 
    thead { display:table-header-group }
    tfoot { display:table-footer-group }
    
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
<h4><p align="center">LAPORAN DATA PESERTA</p></h4>
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
$query = $this->db->query("SELECT * FROM peserta, pendaftar where peserta.status_pelatihan = 'Diterima' AND peserta.id_pendaftar = pendaftar.id_pendaftar AND pendaftar.jenis_kelamin = 'Laki-Laki'");
    		if($query->num_rows() > 0){
				echo $query->num_rows();
			}else{
				echo 0;
			}
?> <br>
Jumlah Perempuan:  <?php
$query = $this->db->query("SELECT * FROM peserta, pendaftar where peserta.status_pelatihan = 'Diterima' AND peserta.id_pendaftar = pendaftar.id_pendaftar AND pendaftar.jenis_kelamin = 'Perempuan'");
    		if($query->num_rows() > 0){
				echo $query->num_rows();
			}else{
				echo 0;
			}
?></h4>
<body>
<table border="1" align="center" class="table1">
    <thead>
    <tr>
		<th>No</th>
        <th>Tanggal Daftar</th>
        <th>ID Peserta</th>
        <th>No Telepon</th>
        <th>Nama</th>
        <th>Jenis Pelatihan</th>
        <th>Nama Instruktur</th>
        <th>Lokasi Pelatihan</th>
        <th>Jadwal Pelatihan</th>
        <th>Status</th>
        <th>Keterangan</th>
        </tr>
        </thead>
      
        <?php $no = 1; foreach ($data as $key):?>
            <tr>
         
            <td><?php echo $no++?></td>
            <td><?php echo tgl_indo($key['tanggal_daftar']) ?></td>
            <td><?php echo $key['id_pendaftar'] ?></td>
            <td><?php echo $key['nik'] ?></td>
            <td><?php echo $key['nama'] ?></td>
            <td><?php echo $key['jenis_pelatihan'] ?></td>
            <td><?php echo $key['nama_instruktur'] ?></td>
            <td><?php echo $key['lokasi_pelatihan'] ?></td>
            <td><?php echo tgl_indo($key['mulai_pelatihan']) ?> <br> s/d <br> <?php echo tgl_indo($key['akhir_pelatihan']) ?></td>
            <td><?php echo $key['status_pelatihan'] ?></td>
            <td><?php echo $key['keterangan'] ?></td>
  
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
