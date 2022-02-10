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
					Laporan Data Jenis pelatihan Berdasarkan Nama Instruktur
					</h4>
				<br>
				<br>
            <div class="col-md-12 col-8 align-self-center">
					<form action="<?= site_url('laporan/rekap_jenis_pelatihan') ?>" method="post" target="_blank">
					<div class="input-group ">
            	  <button type="button" style=" font-weight: bold; background-color: #000000; color: #fff;" class="btn">Nama Instruktur</button>
						 
								<select name="filter" required class="form-control col-md-4">
								<option value="">Pilih Nama Instruktur</option>
								<option value="semua">Semua</option>
								<?php
									$data = $this->db->query("SELECT * from instruktur order by id_instruktur")->result();
								?>
								<?php foreach ( $data as $i) : ?>
								<option value="<?php echo $i->nama;?>"> <?php echo $i->nama;?></option>
								<?php endforeach; ?>
								
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
