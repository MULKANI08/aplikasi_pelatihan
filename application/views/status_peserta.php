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
<?php $this->load->view('lihat_css')?>
<?php $this->load->view('content_css')?>
<?php $this->load->view('content_header')?>
<?php $this->load->view('content_menu_peserta')?>

<?php foreach ($data as $key): ?>
<div class="page-wrapper">
    <div class="container-fluid">
    <div class="row page-titles">
        <h4 style="color: red" class="text-themecolor">
			Status Anda Saat ini: 
            <?php if($key->status_daftar =="Diterima"): ?>
                            
                            Aktif
                    
                            <?php else: ?>
                        
                                <?php echo $key->status_daftar ?>
                            <?php endif;?>
		</h4>
    </div>
    <div class="row">
        <h5>
			Detail Status
		</h5>
    </div>
    <!-- <div class="container-fluid"> -->
        <div class="row">
            
            <div class="flexigrid crud-form" style='width: 100%;' >

            <div id='main-table-box'>
                <div>
	                <div class='form-div'>
					    <div class='form-field-box odd' id="id_pendaftar_field_box">
				            <div class='form-display-as-box' id="id_pendaftar_display_as_box">
					        Id Peserta :
				            </div>
				            <div class='form-input-box' id="id_pendaftar_input_box">
					        <div id="field-id_pendaftar" class="readonly_label">
                                <?php echo $key->id_pendaftar ?>
                            </div>				
                            </div>
				            <div class='clear'></div>
			            </div>

					    <div class='form-field-box even' id="tanggal_daftar_field_box">
				            <div class='form-display-as-box' id="tanggal_daftar_display_as_box">
					        Tanggal daftar :
				            </div>
				            <div class='form-input-box' id="tanggal_daftar_input_box">
					        <div id="field-tanggal_daftar" class="readonly_label">
                                <?php echo tgl_indo($key->tanggal_daftar) ?>
                            </div>
                            </div>
				            <div class='clear'></div>
			            </div>

					    <div class='form-field-box odd' id="nik_field_box">
				            <div class='form-display-as-box' id="nik_display_as_box">
					        No KTP :
				            </div>
				            <div class='form-input-box' id="nik_input_box">
					        <div id="field-nik" class="readonly_label">
                                <?php echo $key->nik ?>
                            </div>				
                            </div>
				            <div class='clear'></div>
			            </div>

					    <div class='form-field-box even' id="nama_field_box">
				            <div class='form-display-as-box' id="nama_display_as_box">
					        Nama :
				            </div>
				            <div class='form-input-box' id="nama_input_box">
					        <div id="field-nama" class="readonly_label">
                            <?php echo $key->nama ?>
                            </div>				
                            </div>
				            <div class='clear'></div>
			            </div>

					    <div class='form-field-box odd' id="email_field_box">
				            <div class='form-display-as-box' id="email_display_as_box">
					        Email :
				            </div>
				            <div class='form-input-box' id="email_input_box">
					        <div id="field-email" class="readonly_label">
                            <?php echo $key->email ?>
                            </div>			
                        	</div>
				            <div class='clear'></div>
			            </div>

					    <div class='form-field-box even' id="jenis_pelatihan_field_box">
				            <div class='form-display-as-box' id="jenis_pelatihan_display_as_box">
					        Jenis pelatihan :
				            </div>
				            <div class='form-input-box' id="jenis_pelatihan_input_box">
					        <div id="field-jenis_pelatihan" class="readonly_label">
                            <?php echo $key->jenis_pelatihan ?>
                            </div>			
                        	</div>
				            <div class='clear'></div>
			            </div>
					
                        <div class='form-field-box odd' id="lokasi_pelatihan_field_box">
                            <div class='form-display-as-box' id="lokasi_pelatihan_display_as_box">
					        Lokasi pelatihan :
				            </div>
				            <div class='form-input-box' id="lokasi_pelatihan_input_box">
					        <div id="field-lokasi_pelatihan" class="readonly_label">
                            <?php echo $key->lokasi_pelatihan ?>
                            </div>		
                        	</div>
				            <div class='clear'></div>
			            </div>
					
                        <div class='form-field-box even' id="nama_pelatih_field_box">
				            <div class='form-display-as-box' id="nama_pelatih_display_as_box">
					        Nama pelatih :
				            </div>
				            <div class='form-input-box' id="nama_pelatih_input_box">
					        <div id="field-nama_pelatih" class="readonly_label">
                            <?php echo $key->nama_pelatih ?>
                            </div>		
                        	</div>
				            <div class='clear'></div>
			            </div>
				
                        <div class='form-field-box odd' id="jadwal_pelatihan_field_box">
				            <div class='form-display-as-box' id="jadwal_pelatihan_display_as_box">
				            Jadwal pelatihan :
				            </div>
				            <div class='form-input-box' id="jadwal_pelatihan_input_box">
				            <div id="field-jadwal_pelatihan" class="readonly_label">
                            &nbsp;
                            </div>			
                            </div>
				            <div class='clear'></div>
			            </div>
					    
                        <div class='form-field-box even' id="mulai_pelatihan_field_box">
				            <div class='form-display-as-box' id="mulai_pelatihan_display_as_box">
					        Mulai pelatihan :
				            </div>
				            <div class='form-input-box' id="mulai_pelatihan_input_box">
					        <div id="field-mulai_pelatihan" class="readonly_label">
                                <?php echo tgl_indo($key->mulai_pelatihan) ?>
                            </div>		
                        	</div>
				            <div class='clear'></div>
			            </div>
					
                        <div class='form-field-box odd' id="akhir_pelatihan_field_box">
				            <div class='form-display-as-box' id="akhir_pelatihan_display_as_box">
					        Akhir pelatihan :
				            </div>
				            <div class='form-input-box' id="akhir_pelatihan_input_box">
				        	<div id="field-akhir_pelatihan" class="readonly_label">
                            <?php echo tgl_indo($key->akhir_pelatihan) ?>
                            </div>			
                        	</div>
				            <div class='clear'></div>
			            </div>

                        <div class='form-field-box even' id="foto_ktp_field_box">
				            <div class='form-display-as-box' id="foto_ktp_display_as_box">
					        Foto ktp :
				            </div>
                            <div class='form-input-box' id="foto_ktp_input_box">
					        <div id="field-foto_ktp" class="readonly_label"><a class="image-thumbnail">
				                <?php if($key->foto_ktp ==""): ?>
                            
                                <img src="<?php echo base_url();?>assets/images/profil.png"  height="150px" >
                           
                                <?php else: ?>
                            
                                <img src="<?php echo base_url().'assets/uploads/images/'.$key->foto_ktp;?>" height="150px">
                        
                                <?php endif;?>	
                            </div>			
                    	    </div>
				            <div class='clear'></div>
			            </div>
					
                        <div class='form-field-box odd' id="pas_foto_field_box">
				            <div class='form-display-as-box' id="pas_foto_display_as_box">
					        Pas foto :
				            </div>
                            <div class='form-input-box' id="pas_foto_input_box">
					        <div id="field-pas_foto" class="readonly_label"><a class="image-thumbnail">

                        	    <?php if($key->pas_foto ==""): ?>
                            
                                <img src="<?php echo base_url();?>assets/images/profil.png"  height="150px" >
                        
                                <?php else: ?>
                            
                                <img src="<?php echo base_url().'assets/uploads/images/'.$key->pas_foto;?>" height="150px">
                                <?php endif;?>
                            </div>			
                    	    </div>

				            <div class='clear'></div>
			            </div>

						
	                </div>

	           
        </div>
    </div>
</div>
<?php endforeach ?>
<?php $this->load->view('content_footer')?>