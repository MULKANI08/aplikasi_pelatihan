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
                       <img src="<?php echo base_url()?>assets/logo2.png" alt="homepage" class="light-logo" width="25%"/>
					</a>
                </div>
               
                <div class="navbar-collapse">
                    <ul class="navbar-nav mr-auto mt-md-0">
                        <li class="nav-item">
							<a class="nav-link nav-toggler hidden-md-up text-muted waves-effect waves-dark" href="javascript:void(0)"><i class="mdi mdi-menu"></i></a>
						</li>
                    </ul>
                </div>
				<?php if($this->session->userdata("foto")==""): ?>
                      <img src="<?php echo base_url();?>assets/images/profil.png" alt=""  style="width: 60px; padding-right: 10px;">
                    <?php else: ?>
                      <img src="<?php echo base_url().'assets/uploads/images/'.$this->session->userdata("foto");?>" alt="" style="width: 60px; padding-right: 10px;">
                    <?php endif;?>

				<h4 style="color: white; padding-right: 40px; padding-top: 10px;"><?php echo $this->session->userdata("user_nama") ?></h4>
				
				<div class="header-right">
               		<a href="<?php echo site_url('login/logout')?>" class="btn btn-danger" title="Logout"><i class="fa fa-power-off fa-2x"></i></a>
            	</div>
            </nav>
        </header>
