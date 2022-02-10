<?php 
foreach($css_files as $file): ?>
    <link type="text/css" rel="stylesheet" href="<?php echo $file; ?>" />
<?php endforeach; ?>

<?php $this->load->view('content_css')?>
<?php $this->load->view('content_header')?>
<?php $this->load->view('content_menu_admin')?>
        
<div class="page-wrapper">
    	<div class="container-fluid">
        	<div class="row page-titles">
					<h4 style="color: red" class="text-themecolor">
					Laporan Data Status Pendaftar Pelatihan Berdasarkan Status Pelatihan
					</h4>
				<br>
				<br>
            <div class="col-md-12 col-8 align-self-center">
					<form action="<?= site_url('laporan/rekap_status_pendaftar') ?>" method="post" target="_blank">
					<div class="input-group ">
            	  <button type="button" style=" font-weight: bold; background-color: #000000; color: #fff;" class="btn">Status Pelatihan</button>
						 
							<select name="filter" required class="form-control col-md-4">
								<option value="">Pilih Status Pelatihan</option>
								<option value="semua">Semua</option>
								<option value="Diterima">Diterima</option>
								<option value="Ditolak (Persyaratan Peserta Tidak Sesuai)">Ditolak (Persyaratan Peserta Tidak Sesuai)</option>
								<option value="Ditolak (Kuota Sudah Terpenuhi)">Ditolak (Kuota Sudah Terpenuhi)</option>
								
							</select>

						<span>
           				&nbsp;<button type="submit" style=" font-weight: bold; background-color: #000000; color: #fff;" class="btn">Cetak</button>
						</span>
					</div>        
					</form>
				<div>
			</div>
        </div>
	</div>
            <div class="row">
	            <?php 
								$header = base_url('assets/kopSurat.png'); echo "<center><img src='".$header."' width=0 ></center>";
							?>
              <?php echo $output?>
            </div>
          </div>

		<?php foreach($js_files as $file): ?>
        <script src="<?php echo $file; ?>"></script>
    <?php endforeach; ?>
    
    <?php $this->load->view('content_footer2')?>
