 <!DOCTYPE html>
 <html lang="en">

 <head>

    <!-- Basic Page Needs -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="PPID - Kementerian Energi dan Sumber Daya Mineral">
    <meta name="author" content="Lutfi Fars Hidayat">

    <!-- Page Title -->
    <title> PPID - Kementerian Energi dan Sumber Daya Mineral | <?php echo @$title; ?> | <?php echo @$subtitle; ?></title>

    <!-- Favicon --> 
    <link rel="shortcut icon" href="http://ppid.esdm.go.id/assets/client/img/logo.gif"> 

    <!-- Mobile Specific Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap core CSS -->
    <link href="<?php echo base_url('assets/front/new/css/bootstrap.min.css'); ?>" rel="stylesheet">

    <!-- Font Awesome CSS -->
    <link rel="stylesheet" href="<?php echo base_url('assets/front/new/fonts/font-awesome/css/font-awesome.min.css');?>">

    <!-- Flex Slider -->
    <link rel="stylesheet" href="<?php echo base_url('assets/front/new/css/flexslider.css');?>">

    <!-- Owl Carousel -->
    <link rel="stylesheet" href="<?php echo base_url('assets/front/new/css/owl.carousel.min.css');?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/front/new/css/owl.theme.min.css');?>">

    <!-- Custom styles for this template -->
    <link href="<?php echo base_url('assets/front/new/css/style.css');?>" rel="stylesheet">



    <!-- Javascripts
    –––––––––––––––––––––––––––––––––––––––––––––––––– -->

    <!-- Jquery Library -->
    <script src="<?php echo base_url('assets/front/new/js/jquery.min.js');?>"></script>

    <!-- Bootstrap core JavaScript -->
    <script src="<?php echo base_url('assets/front/new/js/bootstrap.min.js');?>"></script>


    
</head>

<style type="text/css">
    .news .blog-date {
        position: absolute;
        display: block;
        padding: 10px;
        background: #ffda44;
        top: 12px;
        right: 12px;
        z-index: 100;
    }


    .btn-primary {
        background: #ffda44;
        color: #fff;
    } 

    footer .footer {
        padding: 0;
        background: #000;
    }
    footer .copyright {
        padding: 35px 0;
        background: #000;
    } 


</style>

<body class="homepage">

    <!-- Preloader -->
    <div class="loader-wrapper">
        <div class="sk-cube-grid">
            <div class="sk-cube sk-cube1"></div>
            <div class="sk-cube sk-cube2"></div>
            <div class="sk-cube sk-cube3"></div>
            <div class="sk-cube sk-cube4"></div>
            <div class="sk-cube sk-cube5"></div>
            <div class="sk-cube sk-cube6"></div>
            <div class="sk-cube sk-cube7"></div>
            <div class="sk-cube sk-cube8"></div>
            <div class="sk-cube sk-cube9"></div>
        </div>
    </div>
    <!-- Page Wrapper -->
    <div class="wrapper">

        <!-- Header Section -->
        <header>
            <div class="header-area">

                <!-- Top Contact Info -->    
                <div class="row logo-top-info">
                    <div class="container"> 
                        <div class="col-xs-11 col-sm-11 col-md-5 logo">
                            <!-- Main Logo -->
                            <a href="<?php echo site_url(); ?>">
								<img src="<?php echo base_url('assets/front/new/images/logo-footer.png'); ?>" alt="PPID Logo" style="max-width: 90%" />
								<!-- img src="https://www.esdm.go.id/themes/v1/img/xlogo-esdm-web.png.pagespeed.ic.39xo2sd53Y.webp" alt="PPID Logo" / -->
							</a>
                            <!-- Responsive Toggle Menu -->
                            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar">
                                <span class="sr-only"> Main Menu </span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                            </button>
                        </div>
                        <div class="col-md-7 top-info-social">
                            <div class="pull-right">
                                <div class="top-info">
                                    <div class="call">
                                        <h3> Hubungi Kami </h3>
                                        <p> 021 3804242  </p>
                                    </div>
                                    <div class="email">
                                        <h3> Email Kami</h3>
                                        <p> info@ppid.esdm.go.id </p>
                                    </div>
                                </div>
                                <div class="social">
                                    <ul class="social-icons">
                                        <li><a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                                        <li><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                                        <li><a href="#"><i class="fa fa-linkedin" aria-hidden="true"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> 

                <!-- Main Navigation Section -->
                <nav id="navbar" class="collapse navbar-collapse main-menu">
                    <div class="container">
                        <ul class="main-menu">

                            <?php if ($this->session->userdata('ses_ppid_user_status')) { ?>
                                
                                <?php if ($this->session->userdata('ses_ppid_user_level') == 'admin') { ?>
                                <li class="dropdown">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">Menu Admin <i class="fa fa-chevron-down dropdown-toggle"> </i> </a>
                                    <ul>
                                        <li> <a href="<?php echo site_url('permohonan'); ?>"> Permohonan </a></li>
                                        <li> <a href="<?php echo site_url('admin/chart'); ?>"> Rekapitulasi </a></li>
                                        <li> <a href="<?php echo site_url('admin/unit'); ?>"> Manage Unit </a></li>
                                        <li> <a href="<?php echo site_url('admin/pengguna'); ?>"> Manage Pengguna </a></li>
                                    </ul>
                                </li>
                                <?php } else if ($this->session->userdata('ses_ppid_user_level') == 'unit'){ ?>
								<li class="dropdown">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">Menu Unit <i class="fa fa-chevron-down dropdown-toggle"> </i> </a>
                                    <ul>
                                        <li> <a href="<?php echo site_url('permohonan'); ?>"> Permohonan </a></li>
                                        <li> <a href="<?php echo site_url('unit/chart'); ?>"> Rekapitulasi </a></li>
                                    </ul>
                                </li>
                                <?php } else { ?>
                                <li class="active"> <a href="<?php echo site_url('permohonan'); ?>"> Permohonan </a></li>
                                <?php } ?>
                            <?php } else { ?>
                                <li class="active"> <a href="<?php echo site_url(); ?>"> Beranda </a></li>
                            <?php } ?>
                            
                            <?php 
							foreach (mainmenu() as $main) { 
								if ($main->menu_id == 9){
									if (@$thisMenu[$main->menu_id] != 'sudah'){
										$thisMenu[$main->menu_id] = 'sudah';
									?>
								<li class="dropdown">
									<a href="#" class="dropdown-toggle" data-toggle="dropdown"><?php echo $main->menu_name; ?> <i class="fa fa-chevron-down dropdown-toggle"> </i>  </a>
									<ul>
										<?php foreach (submenu($main->menu_id) as $det) { ?>
										<li><a href="<?php echo site_url($det->slug); ?>" ><?php echo $det->title; ?></a></li>
										<?php } ?> 
									</ul> 
								</li>
									<?php 
									}
								}
								else { ?>
								<li class="dropdown">
									<a href="#" class="dropdown-toggle" data-toggle="dropdown"><?php echo $main->menu_name; ?> <i class="fa fa-chevron-down dropdown-toggle"> </i>  </a>
									<ul>
										<?php foreach (menudetail($main->menu_detail_id) as $det) { ?>
										<li><a href="<?php echo site_url('main/'.$det->slug); ?>" ><?php echo $det->title; ?></a></li>
										<?php } ?> 
									</ul> 
								</li>
								<?php } ?>
                            <?php } ?>
                            <li><a href="careers.html"> Tata Cara Permohonan </a> </li>
                            <li><a href="contact.html"> Hubungi Kami </a> </li>


                                <li class="dropdown">
                                <a href="#" class="" data-toggle="dropdown">Akun <?php // echo $this->session->userdata('ses_ppid_user_nama'); ?> &nbsp;&nbsp; &nbsp; &nbsp;  <i class="fa fa-chevron-down dropdown-toggle"> </i>  </a>
                                    <ul>
                            <?php if ($this->session->userdata('ses_ppid_user_status')) { ?>
                                        <li><a href="<?php echo site_url('profil'); ?>">Profil</a></li>
                                        <li><a href="<?php echo site_url('auth/clearSession'); ?>">Logout</a></li>
                            <?php } else { ?>
                                        <li><a href="<?php echo site_url('auth'); ?>"> Masuk</a> </li>
                                        <li><a href="<?php echo site_url('auth/register'); ?>"> Daftar</a> </li> 
                            <?php } ?>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                    </nav>
                </div>  
            </header>
            <!-- Header Section -->


            <?php echo $this->load->view(@$page); ?>



            <!-- Footer Section -->
            <footer>
                <div class="footer">
                    <div class="container">
                        <!-- Prefooter Section -->
                        <div class="row pre-footer">
                            <div class="col-md-4">
                                <div class="contact-box">
                                    <i class="fa fa-map-marker" aria-hidden="true"></i>
                                    <div class="contact-details">
                                        <h4 class="pre-footer-title">Kantor Pusat</h4>
                                        <p>Jl.Medan Merdeka Selatan No.18 Jakarta Pusat 10110 </p>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="contact-box">
                                    <i class="fa fa-phone" aria-hidden="true"></i>
                                    <div class="contact-details">
                                        <h4 class="pre-footer-title">Hubungi Kami</h4>
                                        <p> Telp.021 3804242 <br>Fax. 021 3507210</p>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="contact-box">
                                    <i class="fa fa-envelope" aria-hidden="true"></i>
                                    <div class="contact-details">
                                        <h4 class="pre-footer-title">Email Kami</h4>
                                        <p>info@ppid.esdm.go.id
                                            <br> info@ppid.esdm.go.id </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Prefooter Section -->

                            <!-- Footer widgets -->
                            <div class="row widgets">
                                <div class="col-md-4 col-sm-6">
                                    <div class="about-txt widget">
                                        <img src="<?php echo base_url('assets/front/new/images/logo-footer.png');?>" alt="logo" />

                                        <p>Melalui situs ini kami sediakan informasi tentang Organisasi, Program Kerja dan Informasi Publik pada Kementerian ESDM. </p>

                                        <div class="widgets-social">
                                            <a href="#"> <i class="fa fa-facebook" aria-hidden="true"></i> </a>
                                            <a href="#"> <i class="fa fa-twitter" aria-hidden="true"></i></a>
                                            <a href="#"> <i class="fa fa-linkedin" aria-hidden="true"></i></a>
                                            <a href="#"> <i class="fa fa-instagram" aria-hidden="true"></i></a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-2 col-sm-6">
                                    <div class="quick-links widget">
                                        <h2 class="widget-title">Link Cepat</h2>
                                        <ul>
                                            <li> <a href="#"> Daftar </a> </li>
                                            <li> <a href="#"> Login </a> </li>
                                            <li> <a href="#"> Tata Cara Permohonan </a> </li>
                                            <li> <a href="#"> Hubungi Kami </a> </li>
                                            <li> <a href="#"> Berita </a> </li>
                                        </ul>
                                    </div>
                                </div>

                                <div class="spacer-50 visible-sm"></div>

                                <div class="col-md-3 col-sm-6">
                                    <div class="our-services widget">
                                        <h2 class="widget-title">Layanan Kami</h2>
                                        <ul>
                                            <li> <a href="#"> Daftar </a> </li>
                                            <li> <a href="#"> Login </a> </li>
                                            <li> <a href="#"> Tata Cara Permohonan </a> </li>
                                            <li> <a href="#"> Hubungi Kami </a> </li>
                                            <li> <a href="#"> Berita </a> </li>
                                        </ul> 
                                    </div>
                                </div>
                                <div class="col-md-3 col-sm-6">
                                    <div class="newsletter widget">
                                        <h2 class="widget-title">Berlangganan</h2>
                                        <p>Berlangganan berita terbaru.</p>
                                        <!-- ============= Mailchimp Subscribe Form ============= -->

                                        <form action="php/subscribe.php" id="subscribeform" method="post">
                                            <div class="form-group">
                                                <input type="email" id="email" name="email" placeholder="Enter your email" class="form-control" title="Please enter your email" data-msg-email="Please enter a valid email">
                                            </div>
                                            <button type="submit" class="btn btn-block" id="js-subscribe-btn"> Berlangganan Sekarang! </button>

                                            <div id="js-subscribe-result" data-success-msg="Done. Subscribed" data-error-msg="Oops. Error!"></div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <!-- Footer widgets -->
                        </div>
                    </div>
                    <!-- Copyright -->
                    <div class="copyright">
                        <div class="container">
                            <div class="row copyright-bar">
                                <div class="col-md-6">
                                    <p>Copyright © 2017 PPID Kementerian Energi dan Sumber Daya Alam.</p>
                                </div>
                                <div class="col-md-6 text-right">
                                    <p> <a href="#"> Terms of use</a> <a href="#">Privacy Policy</a> <span>  </p>

                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Copyright -->
                </footer>
                <!-- Footer Section -->

                <!-- back-to-top link -->
                <a href="#0" class="cd-top"> Top </a>

            </div>

    <!-- Page Wrapper
    –––––––––––––––––––––––––––––––––––––––––––––––––– -->

    <!-- jQuery Flex Slider -->
    <script src="<?php echo base_url('assets/front/new/js/jquery.flexslider-min.js');?>"></script>

    <!-- Owl Carousel -->
    <script src="<?php echo base_url('assets/front/new/js/owl.carousel.min.js');?>"></script>

    <!-- Counter JS -->
    <script src="<?php echo base_url('assets/front/new/js/waypoints.min.js');?>"></script>
    <script src="<?php echo base_url('assets/front/new/js/jquery.counterup.min.js');?>"></script>

    <!-- Back to top -->
    <script src="<?php echo base_url('assets/front/new/js/back-to-top.js');?>"></script>

    <!-- Form Validation -->
    <script src="<?php echo base_url('assets/front/new/js/validate.js');?>"></script>

    <!-- Subscribe Form JS -->
    <script src="<?php echo base_url('assets/front/new/js/subscribe.js');?>"></script>

    <!-- Main JS -->
    <script src="<?php echo base_url('assets/front/new/js/main.js');?>"></script>
    <script>_editors()</script>
</body>

</html>

