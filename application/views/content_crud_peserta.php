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
<?php $this->load->view('content_header')?>
<?php $this->load->view('content_menu_peserta')?>
        
        <div class="page-wrapper">
          <div class="container-fluid">
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
<div id="jenisPelatihanModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <div class="modal-content" style="width:1200px; margin-left: -300px;">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Ambil Data Pelatihan</h4>
      </div>
      <div class="modal-body">
                        <table id="pempol1" class="table table-bordered table-hover table-striped">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama Pelatihan</th>
                                    <th>Bidang Pelatihan</th>
                                    <th>Pusat Penyelenggara</th>
                                    <th>Lokasi</th>
                                    <th>Jadwal Pelatihan</th>

                                    <th>Pilih</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php
                            $no=1;
                            $data = $this->db->query("SELECT * FROM jenis_pelatihan")->result();
                            foreach ($data as $key): ?>
                            <tr>
                            <td><?php echo $no++ ?></td>
                            <td><?php echo $key->nama_pelatihan ?></td>
                            <td><?php echo $key->bidang_pelatihan ?></td>
                            <td><?php echo $key->pusat_penyelenggara ?></td>
                            <td><?php echo $key->lokasi_pelatihan ?></td>
                            <td><?php echo tgl_indo($key->mulai_pelatihan) ?><br> s/d <br><?php echo tgl_indo($key->akhir_pelatihan) ?></td>
                             
                              <td><button class="jenisPelatihan"
                              
                               data-nim1="<?php echo $key->nama_pelatihan ?>"
                               data-nim2="<?php echo $key->bidang_pelatihan ?>"
                               data-nim3="<?php echo $key->pusat_penyelenggara ?>"
                               data-nim4="<?php echo $key->lokasi_pelatihan ?>"
                               data-nim5="<?php echo $key->mulai_pelatihan ?>"
                               data-nim6="<?php echo $key->akhir_pelatihan ?>"

                               >PILIH</button type="button" class="btn btn-primary"></td>

                            </tr>
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
   $(document).on('click', '.jenisPelatihan', function (e) {
        document.getElementById("nama_pelatihan").value = $(this).attr('data-nim1');
        document.getElementById("bidang_pelatihan").value = $(this).attr('data-nim2');
        document.getElementById("pusat_penyelenggara").value = $(this).attr('data-nim3');
        document.getElementById("lokasi_pelatihan").value = $(this).attr('data-nim4');
        document.getElementById("mulai_pelatihan").value = $(this).attr('data-nim5');
        document.getElementById("akhir_pelatihan").value = $(this).attr('data-nim6');

        $('#jenisPelatihanModal').modal('hide');
       });
</script>
