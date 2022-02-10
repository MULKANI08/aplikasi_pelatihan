<?php $this->load->view('content_css')?>
<?php $this->load->view('content_header_dashboard')?>
        
    <div class="container-fluid">
    	<div class="page-titles">
			<center>
				<h2 style="color: red;" class="text-themecolor">
				APLIKASI LAYANAN E-BANDIKLAT PADA BALAI PENGEMBANGAN KOMPETENSI PUPR WILAYAH VII BANJARMASIN
				</h2>
			</center>
		</div>
		<div class="row page-titles">
            <div style="margin-left: 24px;">
      			<div style="font-size: 20px; font-weight: bold; margin-left: 20px;" class="row">
      				 SILAHKAN REGISTRASI DENGAN MENGIKUTI LANGKAH BERIKUT INI:
 				</div>
				 <div>
					 <ol>
						 <li>Klik Menu Buat akun</li>
						 <li>ID Pendaftar akan otomatis diisi oleh sistem dan akan digunakan sebagai username</li>
						 <li>Masukkan No KTP Anda</li>
						 <li>Masukkan Nama Lengkap Anda</li>
						 <li>Masukkan tempat dan Tanggal Lahir Anda</li>
						 <li>Pilih Jenis Kelamin Anda</li>
						 <li>Masukkan No Telepon Anda dan akan digunakan sebagai Password Anda login</li>
						 <li>Masukkan email Anda dan pesan verifikasi akun otomatis akan terkirim keemail anda</li>
						 <li>Masukkan Alamat lengkap Anda</li>
						 <li>Upload File KTP Anda</li>
						 <li>Upload foto diri anda (pas foto)</li>
						 <li>Klik Simpan maka sistem otomatis akan menyimpan dan akan mengirim email sesuai dengan alamat email anda</li>

					 </ol>
				 </div>
			</div>
 		</div>
		 <!-- <?php 
			foreach($css_files as $file): ?>
    		<link type="text/css" rel="stylesheet" href="<?php echo $file; ?>" />
		<?php endforeach; ?>

            <div class="container-fluid mt-7">
			<div>
				<div style="font-size: 20px; font-weight: bold; margin-left: 5px;" class="row">
      				 Informasi Pelatihan
 				</div>
				<?php 
				$header = base_url('assets/kopSurat.png'); echo "<center><img src='".$header."' width=0 ></center>";
				?>
        	<div style="margin-top: 10px;">
              <?php echo $output?>
              </div> -->
          </div>
		
    </div>

	<!-- <?php foreach($js_files as $file): ?>
        <script src="<?php echo $file; ?>"></script>
    <?php endforeach; ?> -->
	
<?php $this->load->view('content_footer4')?>
