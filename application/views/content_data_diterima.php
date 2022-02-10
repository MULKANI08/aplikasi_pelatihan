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
<?php $this->load->view('content_menu_admin')?>
        
        <div class="page-wrapper">
          <div class="container-fluid">
            <div class="row">
	            <?php 
								$header = base_url('assets/kopSurat.png'); echo "<center><img src='".$header."' width=0 ></center>";
							?>
              <div>
             <br>
			<a target="_blank" class="float-right" style="padding: 5px 10px; background-color: #fc4b6c; color: #fff; border-radius: 10px; margin-bottom: 5px;" href="<?php echo base_url();?>laporan/rekap_peserta">Cetak Data</a>
              </div>
              <?php echo $output?>
            </div>
          </div>

		<?php foreach($js_files as $file): ?>
        <script src="<?php echo $file; ?>"></script>
    <?php endforeach; ?>
    
    <?php $this->load->view('content_footer2')?>

<!-- modal -->
<div id="pelatihModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <div class="modal-content" style="width:1000px; margin-left: -150px;">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Ambil Data Pelatih</h4>
      </div>
      <div class="modal-body">
                        <table id="pempol1" class="table table-bordered table-hover table-striped">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama</th>
                                    <th>Jenis kelamin</th>
                                    <th>No telepon</th>
                                    <th>Deskripsi Pelatih</th>

                                    <th>Pilih</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php
                            $no=1;
                            $pelatih = $this->db->query("SELECT * FROM pelatih")->result();
                            foreach ($pelatih as $key): ?>
                            <tr>
                            <td><?php echo $no++ ?></td>
                            <td><?php echo $key->nama ?></td>
                            <td><?php echo $key->jenis_kelamin ?></td>
                            <td><?php echo $key->no_telepon ?></td>
                            <td><?php echo $key->deskripsi_pelatih ?></td>
                             
                              <td><button class="pelatih"
                              
                               data-nim1="<?php echo $key->nama ?>"

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
   $(document).on('click', '.pelatih', function (e) {
        document.getElementById("nama_pelatih").value = $(this).attr('data-nim1');

        $('#pelatihModal').modal('hide');
       });
</script>

<!-- modal -->
<div id="jadwalModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <div class="modal-content" style="width:1000px; margin-left: -150px;">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Ambil Data Pelatihan</h4>
      </div>
      <div class="modal-body">
                        <table id="pempol2" class="table table-bordered table-hover table-striped">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Jenis Pelatihan</th>
                                    <th>Lokasi</th>
                                    <th>Mulai pelatihan</th>
                                    <th>Akhir Pelatihan</th>

                                    <th>Pilih</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php
                            $no=1;
                            $pelatihan = $this->db->query("SELECT * FROM pelatihan")->result();
                            foreach ($pelatihan as $key): ?>
                            <tr>
                            <td><?php echo $no++ ?></td>
                            <td><?php echo $key->jenis_pelatihan ?></td>
                            <td><?php echo $key->lokasi_pelatihan ?></td>
                            <td><?php echo tgl_indo($key->mulai_pelatihan) ?></td>
                            <td><?php echo tgl_indo($key->akhir_pelatihan) ?></td>
                             
                              <td><button class="pelatihan"
                              
                               data-nim1="<?php echo $key->mulai_pelatihan?>"
                               data-nim2="<?php echo $key->akhir_pelatihan?>"

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
   $(document).on('click', '.pelatihan', function (e) {
        document.getElementById("mulai_pelatihan").value = $(this).attr('data-nim1');
        document.getElementById("akhir_pelatihan").value = $(this).attr('data-nim2');

        $('#jadwalModal').modal('hide');
       });
</script>
