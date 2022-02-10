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
<div id="instrukturModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <div class="modal-content" style="width:1200px; margin-left: -300px;">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Ambil Data Bidang Pelatihan</h4>
      </div>
      <div class="modal-body">
                        <table id="pempol1" class="table table-bordered table-hover table-striped">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>ID Pelatihan</th>
                                    <th>Bidang Pelatihan</th>
                                    <th>Pusat Pelatihan</th>

                                    <th>Pilih</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php
                            $no=1;
                            $data = $this->db->query("SELECT * FROM bidang_pelatihan")->result();
                            foreach ($data as $key): ?>
                            <tr>
                            <td><?php echo $no++ ?></td>
                            <td><?php echo $key->id_pelatihan ?></td>
                            <td><?php echo $key->bidang_pelatihan ?></td>
                            <td><?php echo $key->pusat_penyelenggara ?></td>
                             
                              <td><button class="instrukturCari"
                              
                               data-nim1="<?php echo $key->bidang_pelatihan ?>"
                               data-nim2="<?php echo $key->pusat_penyelenggara ?>"

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
   $(document).on('click', '.instrukturCari', function (e) {
        document.getElementById("bidang_pelatihan").value = $(this).attr('data-nim1');
        document.getElementById("pusat_penyelenggara").value = $(this).attr('data-nim2');

        $('#instrukturModal').modal('hide');
       });
</script>

<!-- modal -->
<div id="sertifikatModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <div class="modal-content" style="width:1200px; margin-left: -300px; ">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Ambil Data Alumni</h4>
      </div>
      <div class="modal-body">
                        <table id="pempol3" class="table table-bordered table-hover table-striped">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>ID Peserta</th>
                                    <th>Nama</th>
                                    <th>Nama Pelatihan</th>
                                    <th>Bidang Pelatihan</th>
                                    <th>Pusat Penyelenggara</th>

                                    <th>Pilih</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php
                            $no=1;
                            $data = $this->db->query("SELECT * FROM alumni where penilaian = 'Belum Dinilai'")->result();
                            foreach ($data as $key): ?>
                            <tr>
                            <td><?php echo $no++?></td>
                            <td><?php echo $key->id_pendaftar?></td>
                            <td><?php echo $key->nama?></td>
                            <td><?php echo $key->nama_pelatihan?></td>
                            <td><?php echo $key->bidang_pelatihan?></td>
                            <td><?php echo $key->pusat_penyelenggara?></td>
                             
                              <td><button class="nilai"
                              
                               data-nim1="<?php echo $key->id_pendaftar?>"
                               data-nim2="<?php echo $key->nama?>"
                               data-nim5="<?php echo $key->nama_pelatihan?>"
                               data-nim3="<?php echo $key->bidang_pelatihan?>"
                               data-nim4="<?php echo $key->pusat_penyelenggara?>"

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
   $(document).on('click', '.nilai', function (e) {
        document.getElementById("id_pendaftar").value = $(this).attr('data-nim1');
        document.getElementById("nama").value = $(this).attr('data-nim2');
        document.getElementById("nama_pelatihan").value = $(this).attr('data-nim5');
        document.getElementById("bidang_pelatihan").value = $(this).attr('data-nim3');
        document.getElementById("pusat_penyelenggara").value = $(this).attr('data-nim4');

        $('#sertifikatModal').modal('hide');
       });
</script>

<!-- modal -->
<div id="alumniModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <div class="modal-content" style="width:1200px; margin-left: -300px; ">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Ambil Data Peserta Pelatihan</h4>
      </div>
      <div class="modal-body">
                        <table id="pempol4" class="table table-bordered table-hover table-striped">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>ID Peserta</th>
                                    <th>Nama Peserta</th>
                                    <th>Nama Pelatihan</th>
                                    <th>Bidang Pelatihan</th>
                                    <th>Pusat Penyelenggara</th>

                                    <th>Pilih</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php
                            $no=1;
                            $data = $this->db->query("SELECT * FROM peserta where status_pelatihan = 'Diterima'")->result();
                            foreach ($data as $key): ?>
                            <tr>
                            <td><?php echo $no++?></td>
                            <td><?php echo $key->id_pendaftar?></td>
                            <td><?php echo $key->nama?></td>
                            <td><?php echo $key->nama_pelatihan?></td>
                            <td><?php echo $key->bidang_pelatihan?></td>
                            <td><?php echo $key->pusat_penyelenggara?></td>
                             
                              <td><button class="alumni"
                              
                               data-nim1="<?php echo $key->id_pendaftar?>"
                               data-nim2="<?php echo $key->nik?>"
                               data-nim3="<?php echo $key->nama?>"
                               data-nim9="<?php echo $key->nama_pelatihan?>"
                               data-nim4="<?php echo $key->bidang_pelatihan?>"
                               data-nim5="<?php echo $key->pusat_penyelenggara?>"
                               data-nim6="<?php echo $key->lokasi_pelatihan?>"
                               data-nim7="<?php echo $key->mulai_pelatihan?>"
                               data-nim8="<?php echo $key->akhir_pelatihan?>"

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
   $(document).on('click', '.alumni', function (e) {
        document.getElementById("id_pendaftar").value = $(this).attr('data-nim1');
        document.getElementById("field-nik").value = $(this).attr('data-nim2');
        document.getElementById("field-nama").value = $(this).attr('data-nim3');
        document.getElementById("field-nama_pelatihan").value = $(this).attr('data-nim9');
        document.getElementById("field-bidang_pelatihan").value = $(this).attr('data-nim4');
        document.getElementById("field-pusat_penyelenggara").value = $(this).attr('data-nim5');
        document.getElementById("field-lokasi_pelatihan").value = $(this).attr('data-nim6');
        document.getElementById("field-mulai_pelatihan").value = $(this).attr('data-nim7');
        document.getElementById("field-akhir_pelatihan").value = $(this).attr('data-nim8');

        $('#alumniModal').modal('hide');
       });
</script>
