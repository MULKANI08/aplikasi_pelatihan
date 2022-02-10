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

<?php 
foreach($css_files as $file): ?>
    <link type="text/css" rel="stylesheet" href="<?php echo $file; ?>" />
<?php endforeach; ?>

<?php $this->load->view('content_css')?>
<?php $this->load->view('content_header_dashboard')?>
        
          <div class="container-fluid">
			<div class="page-titles">
            	<!-- <marquee> -->
					<h3 style="color: red" class="text-themecolor">
					INFORMASI PELATIHAN TAHUN ANGGARAN 2022
					</h3>
				<!-- </marquee> -->
			</div>
            <div class="row">
				<?php 
				$header = base_url('assets/kopSurat.png'); echo "<center><img src='".$header."' width=0 ></center>";
				?>
              </div>
        <div  class="row" style="margin-top: 10px;">
              <?php echo $output?>
          </div>
          </div>

		<?php foreach($js_files as $file): ?>
        <script src="<?php echo $file; ?>"></script>
    <?php endforeach; ?>
    
    <?php $this->load->view('content_footer2')?>


<!-- modal -->
<div id="pelatihanModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <div class="modal-content" style="width:1000px; margin-left: -150px;">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Ambil Data Pelatihan</h4>
      </div>
      <div class="modal-body">
                        <table id="pempol1" class="table table-bordered table-hover table-striped">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Jenis Pelatihan</th>
                                    <th>Lokasi pelatihan</th>
                                    <th>Mulai Pelatihan</th>
                                    <th>Akhir Pelatihan</th>
                                    <!-- <th>Kouta</th> -->

                                    <th>Pilih</th>
                                </tr>
                            </thead>
                            <tbody>
                           
                            <?php
							$no = 1;
							$tes = $this->db->query("SELECT COUNT(jenis_pelatihan) AS jumlah FROM pendaftar WHERE status_daftar = 'Diterima'")->result();
							$pelatihan = $this->db->query("SELECT * FROM pelatihan")->result();
							
							foreach ($pelatihan as $key): ?>
               <?php if($key->sisa_kouta != 0) { ?>
                            <tr>
                            <td><?php echo $no++ ?></td>
                            <td><?php echo $key->jenis_pelatihan ?></td>
                            <td><?php echo $key->lokasi_pelatihan ?></td>
                            <td><?php echo tgl_indo($key->mulai_pelatihan) ?></td>
                            <td><?php echo tgl_indo($key->akhir_pelatihan) ?></td>
                             
                              <td><button class="pelatihan"
                              
                               data-nim1="<?php echo $key->jenis_pelatihan ?>"
                               data-nim2="<?php echo $key->lokasi_pelatihan ?>"

                               >PILIH</button type="button" class="btn btn-primary"></td>

                            </tr>
                            <?php } ?>
                            <?php endforeach ?>
                            </tbody>
                        </table> 
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>
<script>
   $(document).on('click', '.pelatihan', function (e) {
        document.getElementById("jenis_pelatihan").value = $(this).attr('data-nim1');
        document.getElementById("lokasi_pelatihan").value = $(this).attr('data-nim2');

        $('#pelatihanModal').modal('hide');
       });
</script>
