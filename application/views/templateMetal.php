<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <title>Kementerian Energi dan Sumber Daya Mineral Republik Indonesia | <?php echo @$title.' '.@$subtitle; ?></title>
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="keywords" content="HTML5 Template" />
        <meta name="description" content="Metal — A Construction Company Template" />
        
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <!-- Favicon -->
        <link rel="shortcut icon" href="<?php echo base_url('metal'); ?>/img/favicon.ico" />
        <!-- Font -->
        <link rel='stylesheet' href='http://fonts.googleapis.com/css?family=Arimo:300,400,500,700,400italic,700italic' />
        <link href='http://fonts.googleapis.com/css?family=Oswald:400,300,700' rel='stylesheet' type='text/css' />
        <!-- Font Awesome Icons -->
        <link href="<?php echo base_url('metal'); ?>/css/font-awesome.min.css" rel='stylesheet' type='text/css' />
        <!-- Bootstrap core CSS -->
        <link href="<?php echo base_url('metal'); ?>/css/bootstrap.min.css" rel="stylesheet" />
        <link href="<?php echo base_url('metal'); ?>/css/hover-dropdown-menu.css" rel="stylesheet" />
        <!-- Icomoon Icons -->
        <link href="<?php echo base_url('metal'); ?>/css/icons.css" rel="stylesheet" />
        <!-- Revolution Slider -->
        <link href="<?php echo base_url('metal'); ?>/css/revolution-slider.css" rel="stylesheet" />
        <link href="<?php echo base_url('metal'); ?>/rs-plugin/css/settings.css" rel="stylesheet" />
        <!-- Animations -->
        <link href="<?php echo base_url('metal'); ?>/css/animate.min.css" rel="stylesheet" />
        <!-- Owl Carousel Slider -->
        <link href="<?php echo base_url('metal'); ?>/css/owl/owl.carousel.css" rel="stylesheet" />
        <link href="<?php echo base_url('metal'); ?>/css/owl/owl.theme.css" rel="stylesheet" />
        <link href="<?php echo base_url('metal'); ?>/css/owl/owl.transitions.css" rel="stylesheet" />
        <!-- PrettyPhoto Popup -->
        <link href="<?php echo base_url('metal'); ?>/css/prettyPhoto.css" rel="stylesheet" />
        <!-- toastr -->
        <link href="<?php echo base_url('metal'); ?>/css/toastr.css" rel="stylesheet" />
        <!-- Custom Style -->
        <link href="<?php echo base_url('metal'); ?>/css/style.css" rel="stylesheet" />
        <link href="<?php echo base_url('metal'); ?>/css/responsive.css" rel="stylesheet" />
        <!-- Color Scheme -->
        <link href="<?php echo base_url('metal'); ?>/css/color.css" rel="stylesheet" />
        
        <script type="text/javascript" src="<?php echo base_url('metal'); ?>/js/jquery.min.js"></script> 
        <script type="text/javascript" src="<?php echo base_url('metal'); ?>/js/bootstrap.min.js"></script> 
        
    </head>
    <body>
    <div id="page">
        <!-- Page Loader -->
        <div id="pageloader">
            <div class="loader-item fa fa-spin text-color"></div>
        </div>
        
        <!-- Sticky Navbar -->
        <header id="sticker" class="sticky-navigation dark-header">
            <!-- Top Bar -->
            <div id="top-bar" class="new-version">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-12">
                            <!-- Top Contact -->
                            <div class="top-contact link-hover-black">
                            <a href="#"><i class="fa fa-calendar"></i><?php echo date('d F Y'); ?></a>
                            <a href="#">
                            <i class="fa fa-phone"></i>+ 123 132 1234</a> 
                            <a href="#">
                            <i class="fa fa-envelope"></i>info@zozothemes.com</a></div>
                            <!-- Top Social Icon -->
                            <div class="top-social-icon icons-hover-black">
                            <a href="#">
                                <i class="fa fa-facebook"></i>
                            </a> 
                            <a href="#">
                                <i class="fa fa-twitter"></i>
                            </a> 
                            <a href="#">
                                <i class="fa fa-youtube"></i>
                            </a> 
                            <a href="#">
                                <i class="fa fa-dribbble"></i>
                            </a> 
                            <a href="#">
                                <i class="fa fa-linkedin"></i>
                            </a> 
                            <a href="#">
                                <i class="fa fa-github"></i>
                            </a> 
                            <a href="#">
                                <i class="fa fa-rss"></i>
                            </a> 
                            <a href="#">
                                <i class="fa fa-google-plus"></i>
                            </a></div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Top Bar -->
            <!-- Sticky Menu -->
            <div class="sticky-menu relative">
                <!-- navbar -->
                <div class="navbar navbar-default navbar-bg-light" role="navigation">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="navbar-header">
                                <!-- Button For Responsive toggle -->
                                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                                <span class="sr-only">Toggle navigation</span> 
                                <span class="icon-bar"></span> 
                                <span class="icon-bar"></span> 
                                <span class="icon-bar"></span></button> 
                                <!-- Logo -->
                                 
                                <a class="navbar-brand" href="index.html">
                                    <img class="site_logo" alt="Site Logo" src="<?php echo base_url('metal'); ?>/img/logo.png" />
                                </a></div>
                                <!-- Navbar Collapse -->
                                <div class="navbar-collapse collapse">
                                    <!-- nav -->
                                    <?php $this->load->view('menu'); ?>
                                    <!-- Right nav -->
                                    <!-- Header Search Content -->
                                    <div class="bg-white hide-show-content no-display header-search-content">
                                        <form role="search" class="navbar-form vertically-absolute-middle">
                                            <div class="form-group">
                                                <input type="text" placeholder="Enter your text &amp; Search Here"
                                                class="form-control" id="s" name="s" value="" />
                                            </div>
                                        </form>
                                        <button class="close">
                                            <i class="fa fa-times"></i>
                                        </button>
                                    </div>
                                    <!-- Header Search Content -->
                                </div>
                                <!-- /.navbar-collapse -->
                            </div>
                            <!-- /.col-md-12 -->
                        </div>
                        <!-- /.row -->
                    </div>
                    <!-- /.container -->
                </div>
                <!-- navbar -->
            </div>
            <!-- Sticky Menu -->
        </header>
        
        <?php if (@$page != "") { ?>
        <!-- page-header -->
        <div class="page-header page-title-left page-title-pattern">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <h1 class="title"><?php echo @$title; ?></h1>
                        <h5><?php echo @$subtitle; ?></h5>
                        <?php echo $this->breadcrumbs->show(); ?>
                    </div>
                </div>
            </div>
        </div>
        <section class="page-section">
            <div class="container">
<?php $this->load->view(@$page); ?>
            </div>
        </section>
        <?php } else { ?>
        <section class="page-section">
            <div class="container">
            Isi disini...
            </div>
        </section>
        <?php } ?>
        <!-- /Content -->

        <section id="latest-news" class="page-section">
            <div class="container">
                <div class="section-title">
                    <h2 class="title">Our Latest News</h2>
                </div>
                <div class="row">
                    <div class="owl-carousel navigation-1 opacity text-left" data-pagination="false" data-items="3"
                    data-autoplay="true" data-navigation="true">
                        <div class="col-sm-4 col-md-4 col-xs-12">
                            <p class="text-center">
                                <a href="<?php echo base_url('metal'); ?>/img/sections/services/1.jpg" class="opacity" data-rel="prettyPhoto[portfolio]">
                                    <img src="<?php echo base_url('metal'); ?>/img/sections/services/1.jpg" width="420" height="280" alt="" />
                                </a>
                            </p>
                            <h3>
                                <a href="#">General Contracting</a>
                            </h3>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Id pariatur molestiae illum cum facere
                            deserunt a enim harum eaque fugit.</p>
                            <a href="#" class="read-more">Read More</a>
                            <div class="right-post-meta">
                            <span class="meta-like">
                            <i class="icon-heart"></i> 5</span> 
                            <span class="meta-comment">
                            <i class="icon-comment"></i> 12</span></div>
                        </div>
                        <div class="col-sm-4 col-md-4 col-xs-12">
                            <p class="text-center">
                                <a href="<?php echo base_url('metal'); ?>/img/sections/services/2.jpg" class="opacity" data-rel="prettyPhoto[portfolio]">
                                    <img src="<?php echo base_url('metal'); ?>/img/sections/services/2.jpg" width="420" height="280" alt="" />
                                </a>
                            </p>
                            <h3>
                                <a href="#">Construction Consultant</a>
                            </h3>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Id pariatur molestiae illum cum facere
                            deserunt a enim harum eaque fugit.</p>
                            <a href="#" class="read-more">Read More</a>
                            <div class="pull-right">
                            <i class="icon-heart"></i> 5 
                            <i class="icon-comment"></i> 12</div>
                        </div>
                        <div class="col-sm-4 col-md-4 col-xs-12">
                            <p class="text-center">
                                <a href="<?php echo base_url('metal'); ?>/img/sections/services/3.jpg" class="opacity" data-rel="prettyPhoto[portfolio]">
                                    <img src="<?php echo base_url('metal'); ?>/img/sections/services/3.jpg" width="420" height="280" alt="" />
                                </a>
                            </p>
                            <h3>
                                <a href="#">House Renovation</a>
                            </h3>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Id pariatur molestiae illum cum facere
                            deserunt a enim harum eaque fugit.</p>
                            <a href="#" class="read-more">Read More</a>
                            <div class="right-post-meta">
                            <span class="meta-like">
                            <i class="icon-heart"></i> 5</span> 
                            <span class="meta-comment">
                            <i class="icon-comment"></i> 12</span></div>
                        </div>
                        <div class="col-sm-4 col-md-4 col-xs-12">
                            <p class="text-center">
                                <a href="<?php echo base_url('metal'); ?>/img/sections/services/4.jpg" class="opacity" data-rel="prettyPhoto[portfolio]">
                                    <img src="<?php echo base_url('metal'); ?>/img/sections/services/4.jpg" width="420" height="280" alt="" />
                                </a>
                            </p>
                            <h3>
                                <a href="#">Metal Roofing</a>
                            </h3>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Id pariatur molestiae illum cum facere
                            deserunt a enim harum eaque fugit.</p>
                            <a href="#" class="read-more">Read More</a>
                        </div>
                        <div class="col-sm-4 col-md-4 col-xs-12">
                            <p class="text-center">
                                <a href="<?php echo base_url('metal'); ?>/img/sections/services/5.jpg" class="opacity" data-rel="prettyPhoto[portfolio]">
                                    <img src="<?php echo base_url('metal'); ?>/img/sections/services/5.jpg" width="420" height="280" alt="" />
                                </a>
                            </p>
                            <h3>
                                <a href="#">Green House</a>
                            </h3>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Id pariatur molestiae illum cum facere
                            deserunt a enim harum eaque fugit.</p>
                            <a href="#" class="read-more">Read More</a>
                            <div class="right-post-meta">
                            <span class="meta-like">
                            <i class="icon-heart"></i> 5</span> 
                            <span class="meta-comment">
                            <i class="icon-comment"></i> 12</span></div>
                        </div>
                        <div class="col-sm-4 col-md-4 col-xs-12">
                            <p class="text-center">
                                <a href="<?php echo base_url('metal'); ?>/img/sections/services/6.jpg" class="opacity" data-rel="prettyPhoto[portfolio]">
                                    <img src="<?php echo base_url('metal'); ?>/img/sections/services/6.jpg" width="420" height="280" alt="" />
                                </a>
                            </p>
                            <h3>
                                <a href="#">Tiling and Painting</a>
                            </h3>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Id pariatur molestiae illum cum facere
                            deserunt a enim harum eaque fugit.</p>
                            <a href="#" class="read-more">Read More</a>
                            <div class="right-post-meta">
                            <span class="meta-like">
                            <i class="icon-heart"></i> 5</span> 
                            <span class="meta-comment">
                            <i class="icon-comment"></i> 12</span></div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- news -->
        <section id="testimonials" class="page-section transparent">
            <div class="container">
                <div class="row">
                    <div class="col-sm-12 col-md-12 white testimonials">
                        <div class="owl-carousel pagination-1 light-switch text-center" data-pagination="true" data-autoplay="true"
                        data-navigation="false" data-items="3">
                            <div class="item col-md-4 col-sm-6">
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Enim ducimus eveniet distinctio amet
                                quaerat maxime fugit nesciunt sunt ut quasi nulla.</p>
                                <div class="star-rating text-center">
                                <i class="fa fa-star text-color"></i> 
                                <i class="fa fa-star text-color"></i> 
                                <i class="fa fa-star text-color"></i> 
                                <i class="fa fa-star text-color"></i> 
                                <i class="fa fa-star-half-o text-color"></i></div>
                                <div class="client-image">
                                    <!-- Image -->
                                    <img class="img-circle" src="<?php echo base_url('metal'); ?>/img/sections/testimonials/1.jpg" width="80" height="80" alt="" />
                                </div>
                                <div class="client-details text-center">
                                    <div class="client-details">
                                    <!-- Name -->
                                    <strong class="text-color">John Doe</strong> 
                                    <!-- Company -->
                                     
                                    <span>CEO</span></div>
                                </div>
                            </div>
                            <div class="item col-md-4 col-sm-6">
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Enim ducimus eveniet distinctio amet
                                quaerat maxime fugit nesciunt sunt ut quasi nulla.</p>
                                <div class="star-rating text-center">
                                <i class="fa fa-star text-color"></i> 
                                <i class="fa fa-star text-color"></i> 
                                <i class="fa fa-star text-color"></i> 
                                <i class="fa fa-star text-color"></i> 
                                <i class="fa fa-star-half-o text-color"></i></div>
                                <div class="client-image">
                                    <!-- Image -->
                                    <img class="img-circle" src="<?php echo base_url('metal'); ?>/img/sections/testimonials/2.jpg" width="80" height="80" alt="" />
                                </div>
                                <div class="client-details text-center">
                                    <div class="client-details">
                                    <!-- Name -->
                                    <strong class="text-color">John Doe</strong> 
                                    <!-- Company -->
                                     
                                    <span>CEO</span></div>
                                </div>
                            </div>
                            <div class="item col-md-4 col-sm-6">
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Enim ducimus eveniet distinctio amet
                                quaerat maxime fugit nesciunt sunt ut quasi nulla.</p>
                                <div class="star-rating text-center">
                                <i class="fa fa-star text-color"></i> 
                                <i class="fa fa-star text-color"></i> 
                                <i class="fa fa-star text-color"></i> 
                                <i class="fa fa-star text-color"></i> 
                                <i class="fa fa-star-half-o text-color"></i></div>
                                <div class="client-image">
                                    <!-- Image -->
                                    <img class="img-circle" src="<?php echo base_url('metal'); ?>/img/sections/testimonials/3.jpg" width="80" height="80" alt="" />
                                </div>
                                <div class="client-details text-center">
                                    <div class="client-details">
                                    <!-- Name -->
                                    <strong class="text-color">John Doe</strong> 
                                    <!-- Company -->
                                     
                                    <span>CEO</span></div>
                                </div>
                            </div>
                            <div class="item col-md-4 col-sm-6">
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Enim ducimus eveniet distinctio amet
                                quaerat maxime fugit nesciunt sunt ut quasi nulla.</p>
                                <div class="star-rating text-center">
                                <i class="fa fa-star text-color"></i> 
                                <i class="fa fa-star text-color"></i> 
                                <i class="fa fa-star text-color"></i> 
                                <i class="fa fa-star text-color"></i> 
                                <i class="fa fa-star-half-o text-color"></i></div>
                                <div class="client-image">
                                    <!-- Image -->
                                    <img class="img-circle" src="<?php echo base_url('metal'); ?>/img/sections/testimonials/1.jpg" width="80" height="80" alt="" />
                                </div>
                                <div class="client-details text-center">
                                    <div class="client-details">
                                    <!-- Name -->
                                    <strong class="text-color">John Doe</strong> 
                                    <!-- Company -->
                                     
                                    <span>CEO</span></div>
                                </div>
                            </div>
                            <div class="item col-md-4 col-sm-6">
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Enim ducimus eveniet distinctio amet
                                quaerat maxime fugit nesciunt sunt ut quasi nulla.</p>
                                <div class="star-rating text-center">
                                <i class="fa fa-star text-color"></i> 
                                <i class="fa fa-star text-color"></i> 
                                <i class="fa fa-star text-color"></i> 
                                <i class="fa fa-star text-color"></i> 
                                <i class="fa fa-star-half-o text-color"></i></div>
                                <div class="client-image">
                                    <!-- Image -->
                                    <img class="img-circle" src="<?php echo base_url('metal'); ?>/img/sections/testimonials/3.jpg" width="80" height="80" alt="" />
                                </div>
                                <div class="client-details text-center">
                                    <div class="client-details">
                                    <!-- Name -->
                                    <strong class="text-color">John Doe</strong> 
                                    <!-- Company -->
                                     
                                    <span>CEO</span></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- testimonials -->
        <section id="clients" class="page-section tb-pad-20">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 text-center">
                        <div class="owl-carousel" data-pagination="false" data-items="6" data-autoplay="true"
                        data-navigation="false">
                        <a href="#">
                        <img src="<?php echo base_url('metal'); ?>/img/sections/clients/1.png" width="170" height="90" alt="" /> 
                        <img src="<?php echo base_url('metal'); ?>/img/sections/clients/11.png" width="170" height="90" alt="" /></a> 
                        <a href="#">
                        <img src="<?php echo base_url('metal'); ?>/img/sections/clients/2.png" width="170" height="90" alt="" /> 
                        <img src="<?php echo base_url('metal'); ?>/img/sections/clients/22.png" width="170" height="90" alt="" /></a> 
                        <a href="#">
                        <img src="<?php echo base_url('metal'); ?>/img/sections/clients/1.png" width="170" height="90" alt="" /> 
                        <img src="<?php echo base_url('metal'); ?>/img/sections/clients/11.png" width="170" height="90" alt="" /></a> 
                        <a href="#">
                        <img src="<?php echo base_url('metal'); ?>/img/sections/clients/2.png" width="170" height="90" alt="" /> 
                        <img src="<?php echo base_url('metal'); ?>/img/sections/clients/22.png" width="170" height="90" alt="" /></a> 
                        <a href="#">
                        <img src="<?php echo base_url('metal'); ?>/img/sections/clients/1.png" width="170" height="90" alt="" /> 
                        <img src="<?php echo base_url('metal'); ?>/img/sections/clients/11.png" width="170" height="90" alt="" /></a> 
                        <a href="#">
                        <img src="<?php echo base_url('metal'); ?>/img/sections/clients/2.png" width="170" height="90" alt="" /> 
                        <img src="<?php echo base_url('metal'); ?>/img/sections/clients/22.png" width="170" height="90" alt="" /></a> 
                        <a href="#">
                        <img src="<?php echo base_url('metal'); ?>/img/sections/clients/1.png" width="170" height="90" alt="" /> 
                        <img src="<?php echo base_url('metal'); ?>/img/sections/clients/11.png" width="170" height="90" alt="" /></a> 
                        <a href="#">
                        <img src="<?php echo base_url('metal'); ?>/img/sections/clients/2.png" width="170" height="90" alt="" /> 
                        <img src="<?php echo base_url('metal'); ?>/img/sections/clients/22.png" width="170" height="90" alt="" /></a></div>
                    </div>
                </div>
            </div>
        </section>
        <!-- clients -->
        <div id="get-quote" class="bg-color black text-center">
            <div class="container">
                <div class="row get-a-quote">
                    <div class="col-md-12">Get A Free Quote / Need a Help ? 
                    <a class="black" href="#">Contact Us</a></div>
                </div>
                <div class="move-top bg-color page-scroll">
                    <a href="#page">
                        <i class="glyphicon glyphicon-arrow-up"></i>
                    </a>
                </div>
            </div>
        </div>
        <!-- request -->
        <footer id="footer">
            <div class="footer-widget">
                <div class="container">
                    <div class="row">
                        <div class="col-xs-12 col-sm-6 col-md-3 widget bottom-xs-pad-20">
                        <div class="widget-title">
                            <!-- Title -->
                            <h3 class="title">Address</h3>
                        </div>
                        <!-- Address -->
                        <p>
                        <strong>Office:</strong> Zozotheme.com
                        <br />No. 12, Ribon Building,
                        <br />Walse street, Australia.</p>
                        <!-- Email -->
                        <a class="text-color" href="mailto:info@zozothemes.com">info@zozothemes.com</a> 
                        <!-- Phone -->
                        <p>
                        <strong>Call Us:</strong> +0 (123) 456-78-90 or
                        <br />+0 (123) 456-78-90</p></div>
                        <div class="col-xs-12 col-sm-6 col-md-3 widget bottom-xs-pad-20">
                            <div class="widget-title">
                                <!-- Title -->
                                <h3 class="title">Services</h3>
                            </div>
                            <nav>
                                <ul>
                                    <!-- List Items -->
                                    <li>
                                        <a href="#">General Contracting</a>
                                    </li>
                                    <li>
                                        <a href="#">Construction Consultant</a>
                                    </li>
                                    <li>
                                        <a href="#">House Renovation</a>
                                    </li>
                                    <li>
                                        <a href="#">Metal Roofing</a>
                                    </li>
                                    <li>
                                        <a href="#">Green House</a>
                                    </li>
                                    <li>
                                        <a href="#">Tiling and Painting</a>
                                    </li>
                                </ul>
                            </nav>
                        </div>
                        <div class="col-xs-12 col-sm-6 col-md-3 widget">
                            <div class="widget-title">
                                <!-- Title -->
                                <h3 class="title">Business Hours</h3>
                            </div>
                            <nav>
                                <ul>
                                    <!-- List Items -->
                                    <li>
                                        <a href="#">Monday-Friday: 9am to 5pm</a>
                                    </li>
                                    <li>
                                        <a href="#">Saturday / Sunday: Closed</a>
                                    </li>
                                </ul>
                                <!-- Count -->
                                <div class="footer-count">
                                    <p class="count-number" data-count="3550">total projects : 
                                    <span class="counter"></span></p>
                                </div>
                                <div class="footer-count">
                                    <p class="count-number" data-count="2550">happy clients : 
                                    <span class="counter"></span></p>
                                </div>
                            </nav>
                        </div>
                        <div class="col-xs-12 col-sm-6 col-md-3 widget newsletter bottom-xs-pad-20">
                            <div class="widget-title">
                                <!-- Title -->
                                <h3 class="title">Newsletter Signup</h3>
                            </div>
                            <div>
                                <!-- Text -->
                                <p>Subscribe to Our Newsletter to get Important News, Amazing Offers &amp; Inside Scoops:</p>
                                <p class="form-message1"></p>
                                <div class="clearfix"></div>
                                <!-- Form -->
                                <form id="subscribe_form" action="subscription.php" method="post" name="subscribe_form"
                                role="form">
                                    <div class="input-text form-group has-feedback">
                                    <input class="form-control" type="email" value="" name="subscribe_email" /> 
                                    <button class="submit bg-color" type="submit">
                                        <span class="glyphicon glyphicon-arrow-right"></span>
                                    </button></div>
                                </form>
                            </div>
                            <!-- Social Links -->
                            <div class="social-icon gray-bg icons-circle i-3x">
                            <a href="#">
                                <i class="fa fa-facebook"></i>
                            </a> 
                            <a href="#">
                                <i class="fa fa-twitter"></i>
                            </a> 
                            <a href="#">
                                <i class="fa fa-pinterest"></i>
                            </a> 
                            <a href="#">
                                <i class="fa fa-google"></i>
                            </a> 
                            <a href="#">
                                <i class="fa fa-linkedin"></i>
                            </a></div>
                        </div>
                        <!-- .newsletter -->
                    </div>
                </div>
            </div>
            <!-- footer-top -->
            <div class="copyright">
                <div class="container">
                    <div class="row">
                        <!-- Copyrights -->
                        <div class="col-xs-12 col-sm-6 col-md-6">Copyright &copy; zozothemes.com., 2015
                        <br />
                        <!-- Terms Link -->
                         
                        <a href="#">Terms of Use</a> / 
                        <a href="#">Privacy Policy</a></div>
                        <div class="col-xs-12 text-center visible-xs-block page-scroll gray-bg icons-circle i-3x">
                            <!-- Goto Top -->
                            <a href="#page">
                                <i class="glyphicon glyphicon-arrow-up"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <!-- footer-bottom -->
        </footer>
        <!-- footer -->
    </div>
    <!-- page -->
    <!-- Scripts -->
    <!-- Menu jQuery plugin -->
     
    <script type="text/javascript" src="<?php echo base_url('metal'); ?>/js/hover-dropdown-menu.js"></script> 
    <!-- Menu jQuery Bootstrap Addon --> 
    <script type="text/javascript" src="<?php echo base_url('metal'); ?>/js/jquery.hover-dropdown-menu-addon.js"></script> 
    <!-- Scroll Top Menu -->
     
    <script type="text/javascript" src="<?php echo base_url('metal'); ?>/js/jquery.easing.1.3.js"></script> 
    <!-- Sticky Menu --> 
    <script type="text/javascript" src="<?php echo base_url('metal'); ?>/js/jquery.sticky.js"></script> 
    <!-- Bootstrap Validation -->
     
    <script type="text/javascript" src="<?php echo base_url('metal'); ?>/js/bootstrapValidator.min.js"></script> 
    <!-- Revolution Slider -->
     
    <script type="text/javascript" src="<?php echo base_url('metal'); ?>/rs-plugin/js/jquery.themepunch.tools.min.js"></script> 
    <script type="text/javascript" src="<?php echo base_url('metal'); ?>/rs-plugin/js/jquery.themepunch.revolution.min.js"></script> 
    <script type="text/javascript" src="<?php echo base_url('metal'); ?>/js/revolution-custom.js"></script> 
    <!-- Portfolio Filter -->
     
    <script type="text/javascript" src="<?php echo base_url('metal'); ?>/js/jquery.mixitup.min.js"></script> 
    <!-- Animations -->
     
    <script type="text/javascript" src="<?php echo base_url('metal'); ?>/js/jquery.appear.js"></script> 
    <script type="text/javascript" src="<?php echo base_url('metal'); ?>/js/effect.js"></script> 
    <!-- Owl Carousel Slider -->
     
    <script type="text/javascript" src="<?php echo base_url('metal'); ?>/js/owl.carousel.min.js"></script> 
    <!-- Pretty Photo Popup -->
     
    <script type="text/javascript" src="<?php echo base_url('metal'); ?>/js/jquery.prettyPhoto.js"></script> 
    <!-- Parallax BG -->
     
    <script type="text/javascript" src="<?php echo base_url('metal'); ?>/js/jquery.parallax-1.1.3.js"></script> 
    <!-- Fun Factor / Counter -->
     
    <script type="text/javascript" src="<?php echo base_url('metal'); ?>/js/jquery.countTo.js"></script> 
    <!-- Twitter Feed -->
     
    <!-- script type="text/javascript" src="<?php echo base_url('metal'); ?>/js/tweet/carousel.js"></script> 
    <script type="text/javascript" src="<?php echo base_url('metal'); ?>/js/tweet/scripts.js"></script> 
    <script type="text/javascript" src="<?php echo base_url('metal'); ?>/js/tweet/tweetie.min.js"></script --> 
    <!-- Background Video -->
     
    <script type="text/javascript" src="<?php echo base_url('metal'); ?>/js/jquery.mb.YTPlayer.js"></script> 
    <!-- Custom Js Code -->
    <script type="text/javascript" src="<?php echo base_url('metal'); ?>/js/toastr.js"></script> 
    <!-- toastr -->
    
    <script type="text/javascript" src="<?php echo base_url('metal'); ?>/js/custom.js"></script> 
    <!-- Scripts -->
    
<?php if ($this->session->flashdata('itemFlashData') != ''){ ?>
<script>_toastr("<?php echo $this->session->flashdata('itemFlashData'); ?>","top-center","success",false);</script>
<?php } ?>
<?php if ($this->session->flashdata('itemFlashGagal') != ''){ ?>
<script>_toastr("<?php echo $this->session->flashdata('itemFlashGagal'); ?>","top-center","warning",false);</script>
<?php } ?>
    </body>
</html>

