 <!DOCTYPE html>
 <!--[if IE 8]>          <html class="ie ie8"> <![endif]-->
 <!--[if IE 9]>          <html class="ie ie9"> <![endif]-->
 <!--[if gt IE 9]><!-->  
<html> 
 <!--<![endif]-->
 <head>
    <meta charset="utf-8" />
    <title>Kementerian Energi dan Sumber Daya Mineral Republik Indonesia | <?php echo @$title; ?></title>
    <meta name="keywords" content="HTML5,CSS3,Template" />
    <meta name="description" content="" />

    <!-- mobile settings -->
    <meta name="viewport" content="width=device-width, maximum-scale=1, initial-scale=1, user-scalable=0" />
    <!--[if IE]><meta http-equiv='X-UA-Compatible' content='IE=edge,chrome=1'><![endif]-->

    <!-- WEB FONTS : use %7C instead of | (pipe) -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans+Regular:300,400%7CRaleway:300,400,500,600,700%7CLato:300,400,400italic,600,700" rel="stylesheet" type="text/css" />

    <!-- CORE CSS -->
    <link href="<?php echo base_url('assets/front/plugins/bootstrap/css/bootstrap.min.css');?>" rel="stylesheet" type="text/css" />

    <!-- REVOLUTION SLIDER -->
    <link href="<?php echo base_url('assets/front/plugins/slider.revolution/css/extralayers.css');?>" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url('assets/front/plugins/slider.revolution/css/settings.css');?>" rel="stylesheet" type="text/css" />

    <link rel="shortcut icon" href="http://ppid.esdm.go.id/assets/client/img/logo.gif"> 
    <!-- THEME CSS -->
    <link href="<?php echo base_url('assets/front/css/essentials.css');?>" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url('assets/front/css/layout.css');?>" rel="stylesheet" type="text/css" />

    <!-- PAGE LEVEL SCRIPTS -->
    <link href="<?php echo base_url('assets/front/css/header-1.css');?>" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url('assets/front/css/color_scheme/yellow.css');?>" rel="stylesheet" type="text/css" id="color_scheme" />
    
    <script type="text/javascript">var plugin_path = '<?php echo base_url("assets/front/plugins/");?>';</script>   
    <script type="text/javascript" src="<?php echo base_url('assets/front/plugins/jquery/jquery-2.1.4.min.js');?>"></script>

</head> 

<style type="text/css">
    #footer > .container {
        padding-top: 20px;
        margin-bottom: 20px;
    }

    #footer {
        background: rgba(0, 0, 0, 0) linear-gradient(to bottom, #fff 0%, #333 0%) repeat scroll 0 0;
        color: rgba(255, 255, 255, 0.6);
    }

    a, #header.dark #topMain.nav-pills > li > a:hover {
        color: white;
    }

    a, #header.dark #topMain.nav-pills > li > a {
        color: white;
    }
    p  {
        margin-bottom: 10px;
    }

    body.boxed #wrapper {
        border-radius: 3px;
        margin: 1px auto;
        max-width: 1170px;
    }

    section {
        display: block;
        position: relative;
        padding: 20px 0;
    }

    .owl-theme .owl-controls .owl-buttons div {
        color: #fff;
        background: #121212;
    }

</style>
<body class="smoothscroll enable-animation boxed" style="background: url('https://www.esdm.go.id/assets/imagecache/thumbnailPublikasi/content-logo-esdm-15dq3cw.png') width:100px repeat;">  

    <!-- wrapper -->
    <div id="wrapper">

        <!-- Top Bar -->
        <div id="topBar">

            <div class="container sticky">
                <?php $this->load->view('menuAkun', @$data, FALSE); ?>
            </div> 

            <div class="border-top block clearfix sticky">
                <div class="container">

                    <!-- Logo -->
                    <a class="logo has-banner pull-left text-center-md" href="index.html">
                        <img src="<?php echo base_url('assets/logo/logo-esdm-web-spiddol.png'); ?>" alt="" class="img-responsive" />
                    </a> 
                </div>
            </div>

        </div>
        <!-- /Top Bar --> 
		<div id="header" class="sticky clearfix dark header-sm"> 
			<!-- SEARCH HEADER -->
			<div class="search-box over-header">
				<a id="closeSearch" href="#" class="glyphicon glyphicon-remove"></a>

				<form action="#" method="get">
					<input type="text" class="form-control" placeholder="SEARCH" />
				</form>
			</div> 
			<!-- /SEARCH HEADER --> 
			<!-- TOP NAV -->
			<header id="topNav"> 
				<div class="container">

					<!-- Mobile Menu Button -->
					<button class="btn btn-mobile" data-toggle="collapse" data-target=".nav-main-collapse">
						<i class="fa fa-bars"></i>
					</button>

					<!-- BUTTONS -->
					<ul class="pull-right nav nav-pills nav-second-main"></ul>
					<!-- /BUTTONS -->
					
					<div class="submenu-dark 
					navbar-collapse pull-left nav-main-collapse collapse nopadding-left nopadding-right">
						<nav class="nav-main">  
							<?php $this->load->view('menu', @$data, FALSE); ?> 
						</nav>
					</div> 
				</div>

            </header>
            <!-- /Top Nav -->

        </div>

<!-- START HERE -->
<?php
if (@$page != "") {
	// $page = 'profilAdmin';
	echo '<section class="page-header" style="background: none; padding: 10px;">
	<div class="container">
		<h1>'.@$title.'</h1>
		'.$this->breadcrumbs->show().'
	</div>
</section>
<section><div class="container">';
	$this->load->view(@$page);
	echo '</div></section>';
} else {
	echo '
<section>
	<div class="container">
	Content Here...
	</div>
</section>
	';
}
?>


<!-- /START HERE -->


	</div>

	<!-- FOOTER -->
	<footer id="footer">
		<div class="container">


			<div class="row">

				<!-- col #1 -->
				<div class="col-md-2"> 
					<img src="http://ppid.esdm.go.id/assets/client/img/logo-esdm.png" class="img-responsive"> 
					<!-- -->

				</div> 

				<div class="col-md-10">

					<h3 class="letter-spacing-1">Sekretariat Jenderal Kementerian Energi dan Sumber Daya Mineral </h3> 
					<p>

						Jl.Medan Merdeka Selatan No.18 Jakarta Pusat 10110  
					</p>
					<p>Telp.021 3804242 Fax. 021 3507210</p>
				</div>
				<!-- /col #1 -->

				<!-- col #2 -->

				<!-- /col #2 -->

			</div>  
		</div>

		<div class="copyright">
			<div class="container">
				<ul class="pull-right nomargin list-inline mobile-block">
					<li><a href="#">Terms &amp; Conditions</a></li>
					<li>&bull;</li>
					<li><a href="#">Privacy</a></li>
				</ul>
				&copy; All Rights Reserved, Company LTD
			</div>
		</div>

	</footer>
	<!-- /FOOTER -->


<!-- /wrapper -->


<!-- SCROLL TO TOP -->
<a href="#" id="toTop"></a>


<!-- PRELOADER -->
<div id="preloader">
    <div class="inner">
        <span class="loader"></span>
    </div>
</div><!-- /PRELOADER -->


<!-- SCROLL TO TOP -->
<a href="#" id="toTop"></a>  

<!-- JAVASCRIPT FILES -->
<script type="text/javascript" src="<?php echo base_url('assets/front/js/scripts.js');?>"></script>  
<script type="text/javascript" src="<?php echo base_url('assets/front/plugins/slider.revolution/js/jquery.themepunch.tools.min.js');?>"></script>
<script type="text/javascript" src="<?php echo base_url('assets/front/plugins/slider.revolution/js/jquery.themepunch.revolution.min.js');?>"></script>
<script type="text/javascript" src="<?php echo base_url('assets/front/js/view/demo.revolution_slider.js');?>"></script> 

<?php if ($this->session->flashdata('itemFlashData') != ''){ ?>
<script>_toastr("<?php echo $this->session->flashdata('itemFlashData'); ?>","top-center","success",false);</script>
<?php } ?>
<?php if ($this->session->flashdata('itemFlashGagal') != ''){ ?>
<script>_toastr("<?php echo $this->session->flashdata('itemFlashGagal'); ?>","top-center","error",false);</script>
<?php } ?>

</body>
</html> 