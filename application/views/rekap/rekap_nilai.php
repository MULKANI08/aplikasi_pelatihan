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
<h4><p style="text-transform: uppercase;" align="center">LAPORAN DATA NILAI PESERTA PELATIHAN <br> <?php echo $_POST['filter']; ?></p></h4>
<h4><p>Di Cetak pada
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

<body>
<table border="1" align="center" class="table1">
    <thead>
    <tr>
		<th>No</th>        
        <th>Nama Peserta</th>
        <th>Nama Pelatihan</th>
        <th>Bidang Pelatihan</th>
        <th>Pusat Penyelenggara</th>
        <th>Predikat</th>
        </tr>
        </thead>
      
        <?php $no = 1; foreach ($data as $key):?>
            <tr>
         
            <td><?php echo $no++?></td>            
            <td><?php echo $key['nama'] ?></td>
            <td><?php echo $key['nama_pelatihan'] ?></td>
            <td><?php echo $key['bidang_pelatihan'] ?></td>
            <td><?php echo $key['pusat_penyelenggara'] ?></td>
            <td><?php echo $key['predikat'] ?></td>
  
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
		        

				<br>NIP <?php echo $key->nip ?>
                <?php endforeach ?>
                </td>
		    </tr>
		</table>
</body>
</html>
