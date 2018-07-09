 <!DOCTYPE html>
 <!--[if IE 8]>          <html class="ie ie8"> <![endif]-->
 <!--[if IE 9]>          <html class="ie ie9"> <![endif]-->
 <!--[if gt IE 9]><!-->  
 <html> 
 <!--<![endif]-->
 <head> 
    <meta charset="utf-8" />
    <title>Kementerian Energi dan Sumber Daya Mineral Republik Indonesia | Beranda</title>
    <meta name="keywords" content="HTML5,CSS3,Template" />
    <meta name="description" content="" />

    <!-- mobile settings -->
    <meta name="viewport" content="width=device-width, maximum-scale=1, initial-scale=1, user-scalable=0" />
    <!--[if IE]><meta http-equiv='X-UA-Compatible' content='IE=edge,chrome=1'><![endif]-->

    <!-- WEB FONTS : use %7C instead of | (pipe) -->
    <link href="https://fonts.googleapis.com/css?family=Oxygen:300,400%7CRaleway:300,400,500,600,700%7CLato:300,400,400italic,600,700" rel="stylesheet" type="text/css" />

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
        color: yellow;
    }

    a, #header.dark #topMain.nav-pills > li > a {
        color: yellow;
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

                <!-- right -->
                <ul class="top-links list-inline pull-right"> 
                    <li class="text-welcome"><?php echo date('d F Y H:i:s'); ?></li> 
                    <li class=""><a href="#" class="">LOGIN</a></li>
                    <li class=""><a href="#">REGISTER</a></li>
                </ul> 
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

            <!-- 
                AVAILABLE HEADER CLASSES

                Default nav height: 96px
                .header-md      = 70px nav height
                .header-sm      = 60px nav height

                .noborder       = remove bottom border (only with transparent use)
                .transparent    = transparent header
                .translucent    = translucent header
                .sticky         = sticky header
                .static         = static header
                .dark           = dark header
                .bottom         = header on bottom
                
                shadow-before-1 = shadow 1 header top
                shadow-after-1  = shadow 1 header bottom
                shadow-before-2 = shadow 2 header top
                shadow-after-2  = shadow 2 header bottom
                shadow-before-3 = shadow 3 header top
                shadow-after-3  = shadow 3 header bottom

                .clearfix       = required for mobile menu, do not remove!

                Example Usage:  class="clearfix sticky header-sm transparent noborder"
            -->
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
                        <ul class="pull-right nav nav-pills nav-second-main">   

                        </ul>
                        <!-- /BUTTONS --> 
                        <div class="submenu-dark 
                        navbar-collapse pull-left nav-main-collapse collapse nopadding-left nopadding-right">
                        <nav class="nav-main"> 

                            <ul id="topMain" class="nav nav-pills nav-main">

                                <li class="dropdown">
                                    <a href="#" class="dropdown-toggle">Profil </a>
                                    <ul class="dropdown-menu">
                                        <li><a href="http://ppid.esdm.go.id/index.php/main/Sejarah-KESDM" >Sejarah KESDM</a></li>
                                        <li><a href="http://ppid.esdm.go.id/index.php/main/Visi-Misi" >Visi dan Misi</a></li>
                                        <li><a href="http://ppid.esdm.go.id/index.php/main/Struktur-Organisasi" >Struktur Organisasi</a></li>
                                        <li><a href="http://ppid.esdm.go.id/index.php/main/Tugas-Fungsi" >Tugas dan Fungsi</a></li>
                                        <li><a href="http://ppid.esdm.go.id/index.php/main/Program-Kerja" >Program Kerja</a></li>
                                        <li><a href="http://ppid.esdm.go.id/index.php/main/Laporan-Kinerja" >Laporan Kinerja</a></li>
                                        <li><a href="http://ppid.esdm.go.id/index.php/main/Laporan-Keuangan" >Laporan Keuangan</a></li>
                                    </ul>
                                </li>

                                <li class="dropdown"><!-- BLOG -->
                                    <a class="dropdown-toggle" href="#">
                                        Standar Layanan
                                    </a>
                                    <ul class="dropdown-menu">
                                        <li class="dropdown">
                                            <a class="" href="#">
                                                Maklumat Pelayanan
                                            </a> 
                                        </li> 
                                        <li class="dropdown">
                                            <a class="" href="#">
                                                Biaya Pelayanan
                                            </a> 
                                        </li> 
                                    </ul>
                                </li>  
                                <li class="dropdown"><!-- BLOG -->
                                    <a class="dropdown-toggle" href="#">
                                        Regulasi
                                    </a>
                                    <ul class="dropdown-menu">
                                        <li class="dropdown">
                                            <a class="" href="#">
                                                Undang-undang KIP
                                            </a> 
                                        </li> 
                                        <li class="dropdown">
                                            <a class="" href="#">
                                                Peraturan Pemerintah
                                            </a> 
                                        </li> 
                                        <li class="dropdown">
                                            <a class="" href="#">
                                                Peraturan Komisi Informasi
                                            </a> 
                                        </li> 
                                    </ul>
                                </li>   
                                <li>
                                    <a href="#">Tata Cara Permohonan</a>
                                </li> 
                                <li>
                                    <a href="#">Hubungi Kami</a>
                                </li>  

                            </ul> 
                        </nav>
                    </div> 
                </div>

            </header>
            <!-- /Top Nav -->

        </div>


        <!-- News -->
        <section>
            <div class="container">
<div class="owl-carousel buttons-autohide controlls-over owl-theme owl-carousel-init" data-plugin-options="{&quot;singleItem&quot;: true, &quot;autoPlay&quot;: true, &quot;navigation&quot;: true, &quot;pagination&quot;: true, &quot;transitionStyle&quot;:&quot;fadeUp&quot;}" style="opacity: 1; display: block;">
                    <div class="owl-wrapper-outer"><div class="owl-wrapper" style="width: 3392px; left: 0px; display: block; transform: translate3d(0px, 0px, 0px); transform-origin: 424px 50% 0px; perspective-origin: 424px 50%; transition: all 200ms ease 0s;"><div class="owl-item" style="width: 848px;"><div>
                       <div class="caption-slider-default">
                        <div class="display-table">
                            <div class="display-table-cell vertical-align-middle">
                                <div class="caption-container text-left">
                                    <h2>LOREM IPSUM <strong>DOLOR</strong></h2>
                                    <p>
                                        Unlimited designs, unlimited combinations <br>
                                        imagination is the limit!
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>  
                    <img class="img-responsive" src="assets/images/demo/shop/banners/top_1.png" alt="" width="100%">
                </div></div><div class="owl-item" style="width: 848px;"><div>
                   <div class="caption-slider-default">
                    <div class="display-table">
                        <div class="display-table-cell vertical-align-middle">
                            <div class="caption-container text-left">
                                <h2>LOREM IPSUM <strong>DOLOR 2</strong></h2>
                                <p>
                                    Unlimited designs, unlimited combinations <br>
                                    imagination is the limit!
                                </p>
                            </div>
                        </div>
                    </div>
                </div>  
                <img class="img-responsive" src="assets/images/demo/shop/banners/top_1.png" alt="" width="100%">
            </div></div></div></div>
                

        <div class="owl-controls clickable"><div class="owl-pagination"><div class="owl-page active"><span class=""></span></div><div class="owl-page"><span class=""></span></div></div><div class="owl-buttons"><div class="owl-prev"><i class="fa fa-angle-left"></i></div><div class="owl-next"><i class="fa fa-angle-right"></i></div></div></div></div>

        

 <h2 class="owl-featured"><strong>Basic</strong> Carousel</h2>
<div class="owl-carousel featured nomargin" data-plugin-options='{"singleItem": false, "stopOnHover":false, "autoPlay":true, "autoHeight": false, "navigation": true, "pagination": false}'>
    <div>
        <div class="owl-featured-item">
            <a href="#" class="figure">
                <span><i class="fa fa-plus"></i></span>
                <img class="img-responsive" src="http://localhost:8080/Dev/ibid-development/smarty/HTML/assets/images/demo/people/460x700/2-min.jpg" alt="">
                2009
            </a>
            <div class="owl-featured-detail">
                <a class="featured-title" href="#">Lorem Ipsim Dolor</a>
            </div>
        </div>
    </div>
    <div>
        <div class="owl-featured-item">
            <a href="#" class="figure">
                <span><i class="fa fa-plus"></i></span>
                <img class="img-responsive" src="assets/images/demo/people/460x700/2-min.jpg" alt="">
            </a>
            <div class="owl-featured-detail">
                <a class="featured-title" href="#">Lorem Ipsim Dolor</a>
            </div>
        </div>
    </div>
    <div>
        <div class="owl-featured-item">
            <a href="#" class="figure">
                <span><i class="fa fa-plus"></i></span>
                <img class="img-responsive" src="assets/images/demo/people/460x700/3-min.jpg" alt="">
            </a>
            <div class="owl-featured-detail">
                <a class="featured-title" href="#">Lorem Ipsim Dolor</a>
            </div>
        </div>
    </div>
    <div>
        <div class="owl-featured-item">
            <a href="#" class="figure">
                <span><i class="fa fa-plus"></i></span>
                <img class="img-responsive" src="assets/images/demo/people/460x700/4-min.jpg" alt="">
            </a>
            <div class="owl-featured-detail">
                <a class="featured-title" href="#">Lorem Ipsim Dolor</a>
            </div>
        </div>
    </div>
    <div>
        <div class="owl-featured-item">
            <a href="#" class="figure">
                <span><i class="fa fa-plus"></i></span>
                <img class="img-responsive" src="assets/images/demo/people/460x700/5-min.jpg" alt="">
            </a>
            <div class="owl-featured-detail">
                <a class="featured-title" href="#">Lorem Ipsim Dolor</a>
            </div>
        </div>
    </div>
    <div>
        <div class="owl-featured-item">
            <a href="#" class="figure">
                <span><i class="fa fa-plus"></i></span>
                <img class="img-responsive" src="assets/images/demo/people/460x700/6-min.jpg" alt="">
            </a>
            <div class="owl-featured-detail">
                <a class="featured-title" href="#">Lorem Ipsim Dolor</a>
            </div>
        </div>
    </div>
    <div>
        <div class="owl-featured-item">
            <a href="#" class="figure">
                <span><i class="fa fa-plus"></i></span>
                <img class="img-responsive" src="assets/images/demo/people/460x700/7-min.jpg" alt="">
            </a>
            <div class="owl-featured-detail">
                <a class="featured-title" href="#">Lorem Ipsim Dolor</a>
            </div>
        </div>
    </div>
</div>

<br><br><br>


                <div class="col-sm-8">

                    <div class="panel panel-warning">
                        <div class="panel-heading">
                            <h3 class="panel-title">Latest News</h3>
                        </div>
                        <div class="panel-body">
                           <div class="owl-carousel owl-padding-10 buttons-autohide controlls-over" data-plugin-options='{"singleItem": false, "items":"4", "autoPlay": 4000, "navigation": true, "pagination": false}'>

                            <?php for ($i=0; $i <  12; $i++) { ?>  

                            <div class="item-box">
                                <figure>
                                    <a class="item-hover" href="">
                                        <span class="overlay color2"></span>
                                        <span class="inner">
                                            <span class="block fa fa-plus fsize20"></span>
                                            <strong>READ</strong> ARTICLE
                                        </span>
                                    </a>
                                    <img alt="" class="img-responsive" src="<?php echo base_url('assets/logo/banner2.jpg'); ?>" width="263" height="147">
                                </figure>
                                <div class="item-box-desc">
                                    <h4>Lorem ipsum dolor</h4>
                                    <small>29 June 2014, 9:55</small> 
                                </div>
                            </div> 
                            <?php } ?> 
                        </div>
                    </div>
                </div>


            </div>
            <div class="col-sm-4">
             <div class="panel panel-warning">
                 <div class="panel-heading">
                     <h3 class="panel-title">Gallery</h3>
                 </div>
                 <div class="panel-body">
                    <!-- <div class="row margin-top-30"> -->
                        <div class="col-xs-6 col-md-6">
                            <a href="#">
                                <img alt="" class="img-responsive" src="<?php echo base_url('assets/logo/banner2.jpg'); ?>">
                                <h6 class="fsize12 font300 padding6">Horses hypnotized by the sea</h6>
                            </a>                            
                        </div>
                        <div class="col-xs-6 col-md-6">
                            <a href="#">
                                <img alt="" class="img-responsive" src="<?php echo base_url('assets/logo/banner2.jpg'); ?>">
                                <h6 class="fsize12 font300 padding6">Sochi protesters fight to be heard</h6>
                            </a>                            
                        </div>
                          <div class="col-xs-6 col-md-6">
                            <a href="#">
                                <img alt="" class="img-responsive" src="<?php echo base_url('assets/logo/banner2.jpg'); ?>">
                                <h6 class="fsize12 font300 padding6">Sochi protesters fight to be heard</h6>
                            </a>                            
                        </div>
                          <div class="col-xs-6 col-md-6">
                            <a href="#">
                                <img alt="" class="img-responsive" src="<?php echo base_url('assets/logo/banner2.jpg'); ?>">
                                <h6 class="fsize12 font300 padding6">Sochi protesters fight to be heard</h6>
                            </a>                            
                        </div>
                    <!-- </div> -->
                </div>
            </div>
        </div>

    </div>
</section>
<!-- /News --> 
<!-- Clients -->
<section class="alternate">
    <div class="container">

        <div class="heading-title text-center">
            <h2>Links</h2>
        </div>

        <ul class="row clients-dotted list-inline">
            <li class="col-md-3 col-sm-3 col-xs-6">
                <a href="#">
                    <img class="img-responsive" src="<?php echo base_url('assets/logo/bpsdm.png'); ?>" alt="client" />
                </a>
            </li>
            <li class="col-md-3 col-sm-3 col-xs-6">
                <a href="#">
                    <img class="img-responsive" src="<?php echo base_url('assets/logo/EBTKE-105.png'); ?>" alt="client" />
                </a>
            </li>
            <li class="col-md-3 col-sm-3 col-xs-6">
                <a href="#">
                    <img class="img-responsive" src="<?php echo base_url('assets/logo/Gatrik-105px.png'); ?>" alt="client" />
                </a>
            </li>
            <li class="col-md-3 col-sm-3 col-xs-6">
                <a href="#">
                    <img class="img-responsive" src="<?php echo base_url('assets/logo/Geologi.png'); ?>" alt="client" />
                </a>
            </li>
            <li class="col-md-3 col-sm-3 col-xs-6">
                <a href="#">
                    <img class="img-responsive" src="<?php echo base_url('assets/logo/Itjen.png'); ?>" alt="client" />
                </a>
            </li>
            <li class="col-md-3 col-sm-3 col-xs-6">
                <a href="#">
                    <img class="img-responsive" src="<?php echo base_url('assets/logo/Migas-105.png'); ?>" alt="client" />
                </a>
            </li>
            <li class="col-md-3 col-sm-3 col-xs-6">
                <a href="#">
                    <img class="img-responsive" src="<?php echo base_url('assets/logo/Minerba-105px.png'); ?>" alt="client" />
                </a>
            </li>
            <li class="col-md-3 col-sm-3 col-xs-6">
                <a href="#">
                    <img class="img-responsive" src="<?php echo base_url('assets/logo/Litbang.png'); ?>" alt="client" />
                </a>
            </li>
        </ul>

    </div>
</section>
<!-- /Clients -->


</div>

<!-- FOOTER -->
<footer id="footer">
    <div class="container">


        <div class="row">

            <!-- col #1 -->
            <div class="col-md-2"> 
                <img src="http://ppid.esdm.go.id/assets/client/img/logo-esdm.png" class="img-responsive" width="100px"> 
                <!-- -->

            </div> 

            <div class="col-md-10">

                <h3 class="letter-spacing-1">Sekretariat Jenderal Kementerian Energi dan Sumber Daya Manusia </h3> 
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

</div>
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
<script type="text/javascript">var plugin_path = '<?php echo base_url("assets/front/plugins/");?>';</script>   
<script type="text/javascript" src="<?php echo base_url('assets/front/plugins/jquery/jquery-2.1.4.min.js');?>"></script> 
<script type="text/javascript" src="<?php echo base_url('assets/front/js/scripts.js');?>"></script>  
<script type="text/javascript" src="<?php echo base_url('assets/front/plugins/slider.revolution/js/jquery.themepunch.tools.min.js');?>"></script>
<script type="text/javascript" src="<?php echo base_url('assets/front/plugins/slider.revolution/js/jquery.themepunch.revolution.min.js');?>"></script>
<script type="text/javascript" src="<?php echo base_url('assets/front/js/view/demo.revolution_slider.js');?>"></script> 

</body>
</html> 