
            <!-- <footer class="footer"> ©2020 MI - AL AZHAR </footer> -->
            <!-- End footer -->
			
        </div>
        <!-- End Page wrapper  -->

    </div>
    <!-- End Wrapper -->

    <!-- All Jquery -->
    <!-- ============================================================== -->
    
    <!-- Bootstrap tether Core JavaScript -->
	<script src="<?php echo base_url('assets/vendors/datatables.net/js/jquery.dataTables.min.js')?>"></script>
    <script src="<?php echo base_url('assets/vendors/datatables.net-bs/js/dataTables.bootstrap.min.js')?>"></script>
    
    <script src="<?php echo base_url()?>assets/plugins/bootstrap/js/tether.min.js"></script>
    <script src="<?php echo base_url()?>assets/plugins/bootstrap/js/bootstrap.min.js"></script>
    <!-- slimscrollbar scrollbar JavaScript -->
    <script src="<?php echo base_url()?>assets/js/jquery.slimscroll.js"></script>
    <!--Wave Effects -->
    <script src="<?php echo base_url()?>assets/js/waves.js"></script>
    <!--Menu sidebar -->
    <script src="<?php echo base_url()?>assets/js/sidebarmenu.js"></script>
    <!--stickey kit -->
    <script src="<?php echo base_url()?>assets/plugins/sticky-kit-master/dist/sticky-kit.min.js"></script>
    <!--Custom JavaScript -->
    <script src="<?php echo base_url()?>assets/js/custom.min.js"></script>
    <!-- ============================================================== -->
    <!-- This page plugins -->
    <!-- ============================================================== -->
    <!-- chartist chart -->
    <script src="<?php echo base_url()?>assets/plugins/chartist-js/dist/chartist.min.js"></script>
    <script src="<?php echo base_url()?>assets/plugins/chartist-plugin-tooltip-master/dist/chartist-plugin-tooltip.min.js"></script>
    <!--c3 JavaScript -->
    <script src="<?php echo base_url()?>assets/plugins/d3/d3.min.js"></script>
    <script src="<?php echo base_url()?>assets/plugins/c3-master/c3.min.js"></script>
    <!-- Chart JS -->
	<script src="<?php echo base_url()?>assets/js/dashboard1.js"></script>
	<script src="https://cdn.rawgit.com/t4t5/sweetalert/v0.2.0/lib/sweet-alert.css"></script>
    
	<script>
        $(document).ready(function(){
    		$('#pempol').DataTable({});
		});
	</script>
	
	<script>
        $(document).ready(function(){
    		$('#pempol1').DataTable({});
		});
	</script>
	
	<script>
        $(document).ready(function(){
    		$('#pempol2').DataTable({});
		});
	</script>
	
	<script>
        $(document).ready(function() {
    		$('#pempol3').DataTable({});
		});
	</script>
	
	<script>
        $(document).ready(function(){
    		$('#pempol4').DataTable({});
		});
	</script>
	
	<script>
        $(document).ready(function() {
    		$('#pempol5').DataTable({});
		});
	</script>
	
	<script>
        $(document).ready(function() {
    		$('#pempol6').DataTable({});
		});
	</script>
	
	<script>
        $(document).ready(function() {
    		$('#pempol7').DataTable({});
		});
	</script>
	
	<script>
        $(document).ready(function() {
    		$('#pempol8').DataTable({});
		});
	</script>

	
<?php if($this->session->flashdata('gagal') == TRUE): ?>
	<script>
	alert("Data Sedang Digunakan");
</script>
<?php endif; ?>

<?php if($this->session->flashdata('berhasil') == TRUE): ?>
	<script>
	alert("Berhasil Hapus Data");
</script>
<?php endif; ?>
<?php if($this->session->flashdata('konfirmasi') == TRUE): ?>
	<script>
	confirm("Apakah Anda Yakin ?");
</script>
<?php endif; ?>
</body>

</html>
