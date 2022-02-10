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
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <link rel="icon" type="image/png" sizes="16x16" href="<?php echo base_url()?>assets/logo2.png">
    <title>Sertifikat</title>
    <style type="text/css">
	td{
		height: 30px;
	}

  body {
    /* background-image: url('../../assets/sertifikat.png'); */
    background-repeat: no-repeat;
    background-size: cover;
	  position: static;
  }
  hr {
  border: 1px solid black;
}
</style>
</head>

<body onLoad="window.print()">
    <table border="0" align="center" width="100%">
        <tr align="center">
            <td  style="padding-top: 30px;">
                <img width="10%" src="<?= base_url() ?>assets/pu.png">
            </td>

        </tr>
    </table>
     <div style="text-align: center;">
     <h1>
        <u>SERTIFIKAT PELATIHAN</u>
     </h1>
    </div>
    <div style="text-align: center; margin-top: -20px;">
     <p>
     Di Berikan Kepada:
     </p>
     <h1 style="text-transform: uppercase;">
        <?php echo $data['nama_p'];?>
     </h1>
     <hr style="margin-top: -20px; margin-bottom: -10px; width: 30%; color: black:">
     <h2>Peserta</h2>
    </div>

    <div style="text-align: center;">
    
     <h2 style="text-transform: capitalize;">
        " Pelatihan <?php echo $data['nama_pelatihan'];?> "
     </h2>
     <p style="font-size: 20px; text-transform: capitalize;">
        Yang dilaksanakan oleh Balai Pengembangan Kompetensi PUPR Wilayah VII Banjarmasin pada <br> <?php echo tgl_indo($data['mulai_pelatihan']);?> sampai dengan <?php echo tgl_indo($data['akhir_pelatihan']);?>
     
        di <?php echo $data['lokasi_pelatihan'];?>
        
     </p>
     <p style="font-size: 20px;">
        Dengan Predikat: <?php echo $data['predikat'];?>
     </p>
     <!-- <h3><?php echo $data['predikat'];?> </h3> -->
     
    </div>

<br>
<br>
<table style="margin-right:80px;" align="right" border="0">
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

