<?php $this->load->view('content_css')?>
<?php $this->load->view('content_header_dashboard')?>

  <?php
        foreach($data as $data){
            $kode_jenis_pelatihan[] = $data->kode_jenis_pelatihan;
            $jenis_pelatihan[] = $data->jenis_pelatihan;
            $jumlah[] = (float) $data->jumlah;
        }
    ?>
    
    	<div class="container-fluid">
        <div class="row page-titles">
          <center>
            <h3 style="color: red; text-align: center;" class="text-themecolor">
              Pelatihan Yang Diminati
            </h3>
          </center>
			</div>
        	
			<div class="row page-titles">
    <canvas id="myChart"></canvas>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.2.2/Chart.min.js"></script>
<script type="text/javascript">var ctx = document.getElementById("myChart").getContext('2d');
var myChart = new Chart(ctx, {
  type: 'bar',
  data: {
    labels : <?php echo json_encode($jenis_pelatihan);?>,
    datasets: [{
      label: 'Pelatihan yang dimintai',
     data : <?php echo json_encode($jumlah);?>,
      backgroundColor: "rgba(153,255,51,1)"
    }]
  }
});</script>
  
           </div>
           </div>
<?php $this->load->view('content_footer')?>
