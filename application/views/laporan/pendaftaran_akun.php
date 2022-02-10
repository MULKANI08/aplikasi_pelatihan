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
					Laporan Data Pendaftar Akun Berdasarkan Tanggal Daftar
					</h4>
				<br>
				<div class="col-md-12 col-8 align-self-center">
					<form action="<?= site_url('laporan/rekap_pendaftaran_akun') ?>" method="post" target="_blank">
						<div class="input-group ">
                    		<button type="button" style=" font-weight: bold; background-color: #000000; color: #fff;" class="btn">Dari</button>
          					<input type="date" class="col-md-2" name="tanggal1" required>&nbsp;&nbsp;
						
            				<button style="margin-left: 5px; font-weight: bold; background-color: #000000; color: #fff;" type="button"  class="btn">Sampai</button>
  							<input type="date" class="col-md-2" name="tanggal2" required>

							<span>
							&nbsp;<button type="submit" style=" font-weight: bold; background-color: #000000; color: #fff;" class="btn">Cetak</button>
							</span>
						</div>        
					</form>

					<span>
			<a target="_blank" style="padding: 8px 225px; font-weight: bold; background-color: #000000; color: #fff; border-radius: 10px;" href="<?php echo base_url();?>laporan/rekap_semua_pendaftaran_akun">Cetak Semua</a>
			</span>
        </div>
			</div>
        
            <div class="row">
	            <?php 
								$header = base_url('assets/kopSurat.png'); echo "<center><img src='".$header."' width=0 ></center>";
							?>
              <?php echo $output?>
            </div>
            </div>
            </div>

		<?php foreach($js_files as $file): ?>
        <script src="<?php echo $file; ?>"></script>
    <?php endforeach; ?>
    
    <?php $this->load->view('content_footer2')?>
