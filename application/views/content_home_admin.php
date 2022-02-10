<?php $this->load->view('content_css')?>
<?php $this->load->view('content_header')?>
<?php $this->load->view('content_menu_admin')?>
<style>
hr{
	color: #ffffff;
	
	}
</style>


	<div class="page-wrapper">
    	<div class="container-fluid">
        	<div class="row page-titles">
			</div>

			<!-- okok -->

			<div class="row page-titles">
				<div class="col-md-12">
                  
				<div class="row">
					<div class="col-lg-3">
                        <div class="main-box-orange">
                                <h3 style="color: #ffffff;">Jumlah Pelatihan</h3>
								<hr size= "10px" color= "white" />
								<span style="font-size: 30px; color: white; font-weight: bold;">
									<?php echo $pelatihan; ?>
								</span>
                    	</div>
            		</div>

					<div class="col-lg-3">
                        <div class="main-box-pink">
                                <h3 style="color: #ffffff;">Akun Baru</h3>
								<hr size= "10px" color= "white" />
								<span style="font-size: 30px; color: white; font-weight: bold;">
									<?php echo $pendaftar_baru; ?>
								</span>
                    	</div>
            		</div>
                  
					<div class="col-lg-3">
                        <div class="main-box-dull">
                                <h3 style="color: #ffffff;">Peserta Pelatihan</h3>
								<hr size= "10px" color= "white" />
									<span style="font-size: 30px; color: white; font-weight: bold;">
									  	<?php echo $peserta; ?>
									 </span>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="main-box-red">
                                <h3 style="color: #ffffff;">Alumni Pelatihan</h3>
								<hr size= "10px" color= "white" />
									<span style="font-size: 30px; color: white; font-weight: bold;">
									  	<?php echo $alumni; ?>
									</span>
                        </div>
                    </div>
                  
				</div>
				
		</div>
	</div>
	<!-- okok -->

		<!-- tes -->
		<div class="row page-titles">
                <div class="container-fluid mt-7">
      				<div class="row">
      				  <img width="100%" src="<?= base_url()?>assets/luar.jpg">
      				  </div>
 				</div>
        </div>
		<!-- tes -->
			
	</div>
	</div>
	</div>
	</div>
           
<?php $this->load->view('content_footer')?>
