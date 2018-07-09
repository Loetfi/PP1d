<div class="app-contents">
	<header class="navbar navbar-default navbar-static-top">
		<div class="navbar-header">
			<a href="#" class="sidebar-mobile-toggler pull-left hidden-md hidden-lg" class="btn btn-navbar sidebar-toggle" data-toggle-class="app-slide-off" data-toggle-target="#app" data-toggle-click-outside="#sidebar">
				<i class="ti-align-justify"></i>
			</a> 
			<a class="navbar-brand" href="<?php echo site_url('back/dashboard'); ?>"> 
				<img src="<?php echo base_url('assets/logo/logo-esdm.png'); ?>" height="60px" alt="myLogo">  
			</a> 
			<a href="#" class="sidebar-toggler pull-right visible-md visible-lg" data-toggle-class="app-sidebar-closed" data-toggle-target="#app">
				<i class="ti-align-justify"></i>
			</a>
			<a class="pull-right menu-toggler visible-xs-block" id="menu-toggler" data-toggle="collapse" href=".navbar-collapse">
				<span class="sr-only">Toggle navigation</span>
				<i class="ti-view-grid"></i>
			</a>
		</div>
		<div class="navbar-collapse collapse">
			<ul class="nav navbar-right">
				<li>								
					<a target="_blank" href="<?php echo site_url(); ?>" class="btn btn-link">
						<i class="ti-eye"></i> 
						<span>View Website</span>
					</a>
				</li>
				<li class="dropdown current-user">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown">
						<!-- <img src=" ">   -->
						<span class="username">
							<i class="ti-angle-down"></i>
							<?php $user = $this->ion_auth->user()->row(); echo @$user->first_name; ?> 
						</span>
					</a>
					<ul role="menu" class="dropdown-menu dropdown-light fadeInUpShort">
						<li>
							<a href="<?php echo site_url('back/auth/logout'); ?>">Logout</a>
						</li>
					</ul>
				</li>							
			</ul>
		</div> 
	</header>


	<div class="main-content" >
		<div class="wrap-content container" id="container">

