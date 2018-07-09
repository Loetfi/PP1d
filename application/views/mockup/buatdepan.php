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
        color: whites;
    }

    a, #header.dark #topMain.nav-pills > li > a {
        color: whites;
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




        <!-- REVOLUTION SLIDER -->

        <?php //print_r($slider); ?>

        <div class="slider roundedcorners"> 

            <div class="owl-carousel buttons-autohide controlls-over nomargin" data-plugin-options='{"items": 1, "singleItem": true, "autoPlay": 8000, "navigation": true, "pagination": true, "transitionStyle":"fade", "progressBar":"false"}'>
                <?php foreach ($slider as $s) { ?>
                <div>
                    <img src="<?php echo base_url('uploads/contents/'.$s->photo); ?>" class="img-responsive" alt="">
                </div>
                <?php } ?> 
            </div>

        </div> 
        <!-- /OWL SLIDER -->  
        <!-- /wrapper -->   

        <!-- Overview --> 
          <!--   <section>
                <div class="container text-center">

                    <div class="row text-left">
                       <div class="heading-title text-center">
                        <h2>SALAM KETERBUKAAN INFORMASI PUBLIK</h2>
                    </div>
                    <div class="container">

                        <h3 class="weight-300"></h3> 
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="leading-0">

                                    <p>Selamat datang di situs pelayanan informasi publik Kementerian Energi dan Sumber Daya Mineral (Kementerian ESDM).</p>

                                    <p>Melalui situs ini kami sediakan informasi tentang Organisasi, Program Kerja dan Informasi Publik pada Kementerian ESDM.</p>

                                    <p>Informasi Publik dikelompokkan kedalam a) Informasi Publik Berkala; b) Informasi Publik Serta Merta; c) Informasi Publik Setiap Saat dan d) Daftar informasi Publik yang dikecualikan. Kriteria pengelompokan informasi publik dapat dilihat pada bagian FAQ</p>

                                   <p> Disamping situs ini, pemohon Informasi Publik dapat mengunjungi Meja Pelayanan Informasi Publik Kementerian ESDM, di Jalan Merdeka Selatan Nomor 18, Jakarta Pusat dan Meja Pelayanan Informasi Publik pada Unit-unit Kerja Utama di lingkungan Kementerian ESDM, termasuk Sekretariat Jenderal Dewan Energi Nasional dan Badan Pengatur Hilir Minyak Dan Gas Bumi (BPH Migas) <Klik disini untuk menampilkan alamat tersebut></p>

                                   <p> Kami senantiasa meningkatkan dan menyempurnakan Pelayanan Informasi Publik Kementerian ESDM. Anda kami undang untuk turut serta membantu peningkatan pelayanan ini. Silahkan kirimkan komentar dan saran anda kealamat dan email yang sudah kami sediakan. Sebelumnya kami ucapkan terima kasih.</p>

                                    <p>Harapan kami, agar situs ini dan Meja Pelayanan Informasi Publik Kementerian ESDM dapat berkonstribusi positif dalam mewujudkan hakikat keberadaaan Kementerian ESDM yaitu tercapainya "Energi Dan Sumber Daya Mineral Untuk Kesejahteraan Rakyat".</p>

                                   <p><b> Salam,
                                    Pejabat Pengelola Informasi dan Dokumentasi (PPID) Kementerian ESDM</b></p> 
                                </div>
                            </div>
                        </div> 
                    </div>
                </div>

            </div>
        </section> -->
        <!-- /Overview -->




        <!-- News -->
        <section>
            <div class="container">



                <div class="col-sm-8">

                    <div class="panel panel-warning">
                        <div class="panel-heading">
                            <h3 class="panel-title">Latest News</h3>
                        </div>
                        <div class="panel-body">
                           <div class="owl-carousel owl-padding-10 buttons-autohide controlls-over" data-plugin-options='{"singleItem": false, "items":"4", "autoPlay": 4000, "navigation": true, "pagination": false}'>

                            <?php //for ($i=0; $i <  12; $i++) { 
                                foreach ($news as $n) { ?>  

                                <div class="item-box">
                                    <figure>
                                        <a class="item-hover" href="<?php echo site_url('news/'.$n->datepost.'/'.$n->slug); ?>">
                                            <span class="overlay color2"></span>
                                            <span class="inner">
                                                <span class="block fa fa-plus fsize20"></span>
                                                Lihat Detail
                                            </span>
                                        </a>
                                        <img alt="" class="img-responsive" src="<?php echo base_url('uploads/news/'.$n->gambar); ?>" width="263" height="147">
                                    </figure>
                                    <div class="item-box-desc">
                                        <h4><?php echo substr($n->title, 0,20); ?>...</h4>
                                        <small><?php echo date('d F Y',strtotime($n->datepost)); ?></small> 
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
                        <?php foreach ($gallery as $g) { ?>
                        <div class="col-xs-6 col-md-6">
                            <a href="#">
                                <img alt="" class="img-responsive" src="<?php echo base_url('uploads/contents/'.$g->photo); ?>"> 
                            </a>                            
                        </div> 
                        <?php } ?>
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

            <?php foreach ($link as $l) { ?>
                <li class="col-md-3 col-sm-3 col-xs-6">
                    <a href="#">
                        <img class="img-responsive" src="<?php echo base_url('uploads/contents/'.$l->photo); ?>" alt="client" />
                    </a>
                </li>
            <?php } ?> 
            </ul>

        </div>
    </section>
    <!-- /Clients -->


</div>

<!-- FOOTER -->
<footer id="footer">
    <div class="container">


        <div class="row">
            
            <?php foreach ($footer as $f) { ?>
            <div class="col-md-2"> 
                <img src="<?php echo base_url('uploads/contents/'.$f->photo); ?>" class="img-responsive" width="100px">  
            </div> 

            <div class="col-md-10">

                <h3 class="letter-spacing-1"><?php echo $f->title; ?></h3> 
                <?php echo $f->content; ?>
            </div> 
            <?php } ?>

        </div>  
    </div>

    <div class="copyright">
        <div class="container">
            <ul class="pull-right nomargin list-inline mobile-block">
                <li><a href="#">Terms &amp; Conditions</a></li>
                <li>&bull;</li>
                <li><a href="#">Privacy</a></li>
            </ul>
            &copy; Sekretariat Jenderal Kementerian Energi dan Sumber Daya Manusia 
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