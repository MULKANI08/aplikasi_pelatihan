<body class="fix-header fix-sidebar card-no-border">
    <div class="preloader">
        <svg class="circular" viewBox="25 25 50 50">
            <circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="2" stroke-miterlimit="10" />
		</svg>
    </div>

    <div id="main-wrapper">

        <header class="topbar">
            <nav class="navbar top-navbar navbar-toggleable-sm navbar-light">
            	<div class="navbar-header" style="padding:5px;">
                    <a class="navbar-brand" href="#">
                       <img src="<?php echo base_url()?>assets/logo2.png" alt="homepage" class="light-logo" width="28%"/>
					</a>
                </div>
               
                <div class="navbar-collapse">
                    <ul class="navbar-nav mr-auto mt-md-0">
                        <li class="nav-item">
							<a class="nav-link nav-toggler hidden-md-up text-muted waves-effect waves-dark" href="javascript:void(0)"><i class="mdi mdi-menu"></i></a>
						</li>
                    </ul>
                </div>
				<div class="header-right" style="margin-right: 20px;">
               		<a href="<?php echo site_url('dashboard')?>" class="btn btn-warning">
					   Dashboard</a>
            	</div>
				<div class="header-right" style="margin-right: 20px;">
               		<a href="<?php echo site_url('registrasi/daftar/add')?>" class="btn btn-secondary">
					   Buat Akun</a>
            	</div>

				<!-- <div class="header-right" style="margin-right: 20px;">
               		<a href="<?php echo site_url('grafik')?>" class="btn btn-success">
					   Pelatihan Yang diminati</a>
            	</div> -->
				<div class="header-right" style="margin-right: 20px;">
               		<a href="<?php echo site_url('registrasi/pelatihan_peserta')?>" class="btn btn-warning">
					   Info Pelatihan Tahun 2022</a>
            	</div>

				<div class="header-right">
               		<a href="<?php echo site_url('login')?>" class="btn btn-danger">
					   LOGIN</a>
            	</div>
            </nav>
        </header>
