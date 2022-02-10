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
					Data Informasi Pelatihan
					</h3>
				<!-- </marquee> -->
			</div>
            <div class="row">
				<?php 
				$header = base_url('assets/kopSurat.png'); echo "<center><img src='".$header."' width=0 ></center>";
				?>
        <div style="margin-top: 10px;">
              <?php echo $output?>
              </div>
          </div>
          </div>

		<?php foreach($js_files as $file): ?>
        <script src="<?php echo $file; ?>"></script>
    <?php endforeach; ?>
    
    <?php $this->load->view('content_footer2')?>

