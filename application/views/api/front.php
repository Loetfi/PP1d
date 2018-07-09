 <!DOCTYPE html>
 <!--[if IE 8]>          <html class="ie ie8"> <![endif]-->
 <!--[if IE 9]>          <html class="ie ie9"> <![endif]-->
 <!--[if gt IE 9]><!-->  <html> <!--<![endif]-->
 <head>
    <meta charset="utf-8" />
    <title>M88 - Development </title>
    <meta name="keywords" content="HTML5,CSS3,Template" />
    <meta name="description" content="" />
    <meta name="Author" content="Dorin Grigoras [www.stepofweb.com]" />

    <!-- mobile settings -->
    <meta name="viewport" content="width=device-width, maximum-scale=1, initial-scale=1, user-scalable=0" />
    <!--[if IE]><meta http-equiv='X-UA-Compatible' content='IE=edge,chrome=1'><![endif]-->

    <!-- WEB FONTS : use %7C instead of | (pipe) -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400%7CRaleway:300,400,500,600,700%7CLato:300,400,400italic,600,700" rel="stylesheet" type="text/css" />

    <!-- CORE CSS -->
    <link href="<?php echo base_url('assets/front/plugins/bootstrap/css/bootstrap.min.css');?>" rel="stylesheet" type="text/css" />

    <!-- THEME CSS -->
    <link href="<?php echo base_url('assets/front/css/essentials.css');?>" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url('assets/front/css/layout.css');?>" rel="stylesheet" type="text/css" />

    <!-- PAGE LEVEL SCRIPTS -->
    <link href="<?php echo base_url('assets/front/css/header-1.css');?>" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url('assets/front/css/layout-shop.css');?>" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url('assets/front/css/color_scheme/orange.css');?>" rel="stylesheet" type="text/css" id="color_scheme" />
</head>

<style type="text/css">

    #footer {
        background: rgba(0, 0, 0, 0) linear-gradient(to bottom, #fff 0%, #f15c2b 0%) repeat scroll 0 0;
        color: rgba(255, 255, 255, 0.6);
    }



    #topMain.nav-pills>li>a {
        color:#0095da;
        font-weight:400;
        font-style: bold;
        background-color:transparent;
    } 
    #topMain.nav-pills>li:hover>a, 
    #topMain.nav-pills>li:focus>a {
        color:#f15c2b;
        background-color:rgba(0,0,0,0.03);
    }
    #topMain.nav-pills>li.active>a {
        color:#687482;
    }


    section {
        background-attachment: fixed;
        background-position: center center;
        background-repeat: no-repeat;
        background-size: cover;
        border-bottom: 1px solid rgba(0, 0, 0, 0.1);
        box-sizing: border-box;
        display: block;
        padding: 20px 0;
        position: relative;
        transition: all 0.4s ease 0s;
    }
    div.shop-item {
        margin-bottom: 10px;
    }

    body.boxed {
        background-color: #fff;
    }

    body.boxed #wrapper {
        border-radius: 3px;
        margin: 1px auto;
        max-width: 1170px;
    }

    h4 {
        font-size: 18px;
        letter-spacing: normal;
        margin: 0 0 14px; 
        color:#f15c2b;
    }


    .label-danger {
        background-color: #0095da;
    }

    .label-warning {
        background-color: #f15c2b;
    }
</style>

    <!--
        AVAILABLE BODY CLASSES:
        
        smoothscroll            = create a browser smooth scroll
        enable-animation        = enable WOW animations

        bg-grey                 = grey background
        grain-grey              = grey grain background
        grain-blue              = blue grain background
        grain-green             = green grain background
        grain-blue              = blue grain background
        grain-orange            = orange grain background
        grain-yellow            = yellow grain background
        
        boxed                   = boxed layout
        pattern1 ... patern11   = pattern background
        menu-vertical-hide      = hidden, open on click
        
        BACKGROUND IMAGE [together with .boxed class]
        data-background=""
    -->
    <body class="smoothscroll enable-animation boxed">




        <!-- wrapper -->
        <div id="wrapper">

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
            <div id="header" class="sticky clearfix">

                <!-- TOP NAV -->
                <header id="topNav">
                    <div class="container">

                        <!-- Mobile Menu Button -->
                        <button class="btn btn-mobile" data-toggle="collapse" data-target=".nav-main-collapse">
                            <i class="fa fa-bars"></i>
                        </button>

                        <!-- BUTTONS -->
                        <ul class="pull-right nav nav-pills nav-second-main">

                            <!-- SEARCH -->
                            <!-- <li class="search">
                                <a class="logo pull-right"> 
                                <img src="../satu-indonesia.png');?>"">
                                </a>
                                <div class="search-box">
                                    <form action="page-search-result-1.html" method="get">
                                        <div class="input-group">
                                            <input type="text" name="src" placeholder="Search" class="form-control" />
                                            <span class="input-group-btn">
                                                <button class="btn btn-primary" type="submit">Search</button>
                                            </span>
                                        </div>
                                    </form>
                                </div> 
                            </li> -->
                            <!-- /SEARCH -->


                        </ul>
                        <!-- /BUTTONS -->

                        <!-- Logo -->
                        <a class="logo pull-left" href="index.html">
                            <img src="" alt="" />
                        </a>
                        <a class="logo pull-right" href="index.html">
                            <img src="<?php echo base_url('assets/front/m88/1indonesia.png');?>"" alt="" width="130px"/>
                        </a>
                    <!-- <a href="" class="logo pull-right">
                        <img src="../satu-indonesia.png');?>"" alt="" width="100px" height="50px">
                    </a> -->

                        <!-- 
                            Top Nav 
                            
                            AVAILABLE CLASSES:
                            submenu-dark = dark sub menu
                        -->
                        <div class="navbar-collapse pull-right nav-main-collapse collapse submenu-dark">
                            <nav class="nav-main"> 
                                <ul id="topMain" class="nav nav-pills nav-main">
                                    <li>
                                        <a href="#">Beli Mobil</a>
                                    </li> 
                                    <li>
                                        <a href="#">Jual Mobil</a>
                                    </li> 
                                    <li>
                                        <a href="#">Berita</a>
                                    </li> 
                                    <li>
                                        <a href="#">Hubungi Kami</a>
                                    </li> 
                                    <li>
                                        <a href="#">FAQ</a>
                                    </li>  
                                </ul> 
                            </nav>
                        </div> 
                    </div>
                </header>
                <!-- /Top Nav -->

            </div>


            <!-- 
                PAGE HEADER 
                
                CLASSES:
                    .page-header-xs = 20px margins
                    .page-header-md = 50px margins
                    .page-header-lg = 80px margins
                    .page-header-xlg= 130px margins
                    .dark           = dark page header

                    .shadow-before-1    = shadow 1 header top
                    .shadow-after-1     = shadow 1 header bottom
                    .shadow-before-2    = shadow 2 header top
                    .shadow-after-2     = shadow 2 header bottom
                    .shadow-before-3    = shadow 3 header top
                    .shadow-after-3     = shadow 3 header bottom
                --> 
                <!-- /PAGE HEADER -->



                <!-- -->
                <section>
                    <div class="container">

                        <div class="owl-carousel buttons-autohide controlls-over" data-plugin-options='{"singleItem": true, "autoPlay": true, "navigation": true, "pagination": true, "transitionStyle":"fadeUp"}'>
                            <div>
                                <img class="img-responsive" src="<?php echo base_url('assets/front/m88/banner1.jpg');?>" alt="" width="100%">
                            </div>
                            <div>
                                <img class="img-responsive" src="<?php echo base_url('assets/front/m88/banner2.jpg');?>" alt=""  width="100%">
                            </div>

                        </div>



                    </div>
                </section>
                <section>
                    <div class="container"> 
                        <!-- SEARCH -->
                        <form method="get" action="#" class="clearfix well well-sm search-big nomargin">
                            <div class="input-group">  
                                <input name="k" class="form-control input-lg" placeholder="Search..." type="text">
                                <div class="input-group-btn">
                                    <button type="submit" class="btn btn-default input-lg noborder-left">
                                        <i class="fa fa-search fa-lg nopadding"></i>
                                    </button>
                                </div>
                            </div>

                        </form>
                        <!-- /SEARCH --> 

                    </div>
                </section>
                <!-- / -->



                <section>

                    <div class="container">

                        <h4>Most Wanted</h4>
                        <div class="owl-carousel owl-padding-10 buttons-autohide controlls-over" data-plugin-options='{"singleItem": false, "items":"4", "autoPlay": 4000, "navigation": true, "pagination": false}'>

                            <div class="shop-item">

                                <div class="thumbnail">
                                    <!-- product image(s) -->
                                    <a class="shop-item-image" href="shop-single-left.html">
                                        <img class="img-responsive" src="<?php echo base_url('assets/front/images/demo/451x300/24-min.jpg');?>" alt="shop first image">
                                        <img class="img-responsive" src="<?php echo base_url('assets/front/images/demo/451x300/24-min.jpg');?>" alt="shop hover image"> </a>
                                    <!-- /product image(s) -->

                                    <!-- hover buttons -->
                                    <div class="shop-option-over"><!-- replace data-item-id width the real item ID - used by js/view/demo.shop.js -->
                                        <a class="btn btn-default add-wishlist" href="#" data-item-id="1" data-toggle="tooltip" title="" data-original-title="Add To Wishlist"><i class="fa fa-heart nopadding"></i></a>
                                        <a class="btn btn-default add-compare" href="#" data-item-id="1" data-toggle="tooltip" title="" data-original-title="Add To Compare"><i class="fa fa-bar-chart-o nopadding" data-toggle="tooltip"></i></a>
                                    </div>
                                    <!-- /hover buttons -->

                                    <!-- product more info -->
                                    <div class="shop-item-info">
                                        <span class="label label-warning">Rp. 182.000.000</span>
                                        <span class="label label-danger">SALE</span> 
                                    </div>
                                    <!-- /product more info -->
                                </div>

                                <div class="shop-item-summary text-center">
                                    <h2>Toyota Avanza G 1.3 - 2016</h2> 
                                </div> 
                            </div> 
                            <div class="shop-item">

                                <div class="thumbnail">
                                    <!-- product image(s) -->
                                    <a class="shop-item-image" href="shop-single-left.html">
                                        <img class="img-responsive" src="<?php echo base_url('assets/front/images/demo/451x300/24-min.jpg');?>" alt="shop first image">
                                        <img class="img-responsive" src="<?php echo base_url('assets/front/images/demo/451x300/24-min.jpg');?>" alt="shop hover image">
                                    </a>
                                    <!-- /product image(s) -->

                                    <!-- hover buttons -->
                                    <div class="shop-option-over"><!-- replace data-item-id width the real item ID - used by js/view/demo.shop.js -->
                                        <a class="btn btn-default add-wishlist" href="#" data-item-id="1" data-toggle="tooltip" title="" data-original-title="Add To Wishlist"><i class="fa fa-heart nopadding"></i></a>
                                        <a class="btn btn-default add-compare" href="#" data-item-id="1" data-toggle="tooltip" title="" data-original-title="Add To Compare"><i class="fa fa-bar-chart-o nopadding" data-toggle="tooltip"></i></a>
                                    </div>
                                    <!-- /hover buttons -->

                                    <!-- product more info -->
                                    <div class="shop-item-info">
                                        <span class="label label-warning">Rp. 182.000.000</span>
                                        <span class="label label-danger">SALE</span> 
                                    </div>
                                    <!-- /product more info -->
                                </div>

                                <div class="shop-item-summary text-center">
                                    <h2>Toyota Avanza G 1.3 - 2016</h2> 
                                </div> 
                            </div> 
                            <div class="shop-item">

                                <div class="thumbnail">
                                    <!-- product image(s) -->
                                    <a class="shop-item-image" href="shop-single-left.html">
                                        <img class="img-responsive" src="<?php echo base_url('assets/front/images/demo/451x300/24-min.jpg');?>" alt="shop first image">
                                        <img class="img-responsive" src="<?php echo base_url('assets/front/images/demo/451x300/24-min.jpg');?>" alt="shop hover image">
                                    </a>
                                    <!-- /product image(s) -->

                                    <!-- hover buttons -->
                                    <div class="shop-option-over"><!-- replace data-item-id width the real item ID - used by js/view/demo.shop.js -->
                                        <a class="btn btn-default add-wishlist" href="#" data-item-id="1" data-toggle="tooltip" title="" data-original-title="Add To Wishlist"><i class="fa fa-heart nopadding"></i></a>
                                        <a class="btn btn-default add-compare" href="#" data-item-id="1" data-toggle="tooltip" title="" data-original-title="Add To Compare"><i class="fa fa-bar-chart-o nopadding" data-toggle="tooltip"></i></a>
                                    </div>
                                    <!-- /hover buttons -->

                                    <!-- product more info -->
                                    <div class="shop-item-info">
                                        <span class="label label-warning">Rp. 182.000.000</span>
                                        <span class="label label-danger">SALE</span> 
                                    </div>
                                    <!-- /product more info -->
                                </div>

                                <div class="shop-item-summary text-center">
                                    <h2>Toyota Avanza G 1.3 - 2016</h2> 
                                </div> 
                            </div> 
                            <div class="shop-item">

                                <div class="thumbnail">
                                    <!-- product image(s) -->
                                    <a class="shop-item-image" href="shop-single-left.html">
                                        <img class="img-responsive" src="<?php echo base_url('assets/front/images/demo/451x300/24-min.jpg');?>" alt="shop first image">
                                        <img class="img-responsive" src="<?php echo base_url('assets/front/images/demo/451x300/24-min.jpg');?>" alt="shop hover image">
                                    </a>
                                    <!-- /product image(s) -->

                                    <!-- hover buttons -->
                                    <div class="shop-option-over"><!-- replace data-item-id width the real item ID - used by js/view/demo.shop.js -->
                                        <a class="btn btn-default add-wishlist" href="#" data-item-id="1" data-toggle="tooltip" title="" data-original-title="Add To Wishlist"><i class="fa fa-heart nopadding"></i></a>
                                        <a class="btn btn-default add-compare" href="#" data-item-id="1" data-toggle="tooltip" title="" data-original-title="Add To Compare"><i class="fa fa-bar-chart-o nopadding" data-toggle="tooltip"></i></a>
                                    </div>
                                    <!-- /hover buttons -->

                                    <!-- product more info -->
                                    <div class="shop-item-info">
                                        <span class="label label-warning">Rp. 182.000.000</span>
                                        <span class="label label-danger">SALE</span> 
                                    </div>
                                    <!-- /product more info -->
                                </div>

                                <div class="shop-item-summary text-center">
                                    <h2>Toyota Avanza G 1.3 - 2016</h2> 
                                </div> 
                            </div> 
                            <div class="shop-item">

                                <div class="thumbnail">
                                    <!-- product image(s) -->
                                    <a class="shop-item-image" href="shop-single-left.html">
                                        <img class="img-responsive" src="<?php echo base_url('assets/front/images/demo/451x300/24-min.jpg');?>" alt="shop first image">
                                        <img class="img-responsive" src="<?php echo base_url('assets/front/images/demo/451x300/24-min.jpg');?>" alt="shop hover image">
                                    </a>
                                    <!-- /product image(s) -->

                                    <!-- hover buttons -->
                                    <div class="shop-option-over"><!-- replace data-item-id width the real item ID - used by js/view/demo.shop.js -->
                                        <a class="btn btn-default add-wishlist" href="#" data-item-id="1" data-toggle="tooltip" title="" data-original-title="Add To Wishlist"><i class="fa fa-heart nopadding"></i></a>
                                        <a class="btn btn-default add-compare" href="#" data-item-id="1" data-toggle="tooltip" title="" data-original-title="Add To Compare"><i class="fa fa-bar-chart-o nopadding" data-toggle="tooltip"></i></a>
                                    </div>
                                    <!-- /hover buttons -->

                                    <!-- product more info -->
                                    <div class="shop-item-info">
                                        <span class="label label-warning">Rp. 182.000.000</span>
                                        <span class="label label-danger">SALE</span> 
                                    </div>
                                    <!-- /product more info -->
                                </div>

                                <div class="shop-item-summary text-center">
                                    <h2>Toyota Avanza G 1.3 - 2016</h2> 
                                </div> 
                            </div> 
                            <div class="shop-item">

                                <div class="thumbnail">
                                    <!-- product image(s) -->
                                    <a class="shop-item-image" href="shop-single-left.html">
                                        <img class="img-responsive" src="<?php echo base_url('assets/front/images/demo/451x300/24-min.jpg');?>" alt="shop first image">
                                        <img class="img-responsive" src="<?php echo base_url('assets/front/images/demo/451x300/24-min.jpg');?>" alt="shop hover image">
                                    </a>
                                    <!-- /product image(s) -->

                                    <!-- hover buttons -->
                                    <div class="shop-option-over"><!-- replace data-item-id width the real item ID - used by js/view/demo.shop.js -->
                                        <a class="btn btn-default add-wishlist" href="#" data-item-id="1" data-toggle="tooltip" title="" data-original-title="Add To Wishlist"><i class="fa fa-heart nopadding"></i></a>
                                        <a class="btn btn-default add-compare" href="#" data-item-id="1" data-toggle="tooltip" title="" data-original-title="Add To Compare"><i class="fa fa-bar-chart-o nopadding" data-toggle="tooltip"></i></a>
                                    </div>
                                    <!-- /hover buttons -->

                                    <!-- product more info -->
                                    <div class="shop-item-info">
                                        <span class="label label-warning">Rp. 182.000.000</span>
                                        <span class="label label-danger">SALE</span> 
                                    </div>
                                    <!-- /product more info -->
                                </div>

                                <div class="shop-item-summary text-center">
                                    <h2>Toyota Avanza G 1.3 - 2016</h2> 
                                </div> 
                            </div> 
                            <div class="shop-item">

                                <div class="thumbnail">
                                    <!-- product image(s) -->
                                    <a class="shop-item-image" href="shop-single-left.html">
                                        <img class="img-responsive" src="<?php echo base_url('assets/front/images/demo/451x300/24-min.jpg');?>" alt="shop first image">
                                        <img class="img-responsive" src="<?php echo base_url('assets/front/images/demo/451x300/24-min.jpg');?>" alt="shop hover image">
                                    </a>
                                    <!-- /product image(s) -->

                                    <!-- hover buttons -->
                                    <div class="shop-option-over"><!-- replace data-item-id width the real item ID - used by js/view/demo.shop.js -->
                                        <a class="btn btn-default add-wishlist" href="#" data-item-id="1" data-toggle="tooltip" title="" data-original-title="Add To Wishlist"><i class="fa fa-heart nopadding"></i></a>
                                        <a class="btn btn-default add-compare" href="#" data-item-id="1" data-toggle="tooltip" title="" data-original-title="Add To Compare"><i class="fa fa-bar-chart-o nopadding" data-toggle="tooltip"></i></a>
                                    </div>
                                    <!-- /hover buttons -->

                                    <!-- product more info -->
                                    <div class="shop-item-info">
                                        <span class="label label-warning">Rp. 182.000.000</span>
                                        <span class="label label-danger">SALE</span> 
                                    </div>
                                    <!-- /product more info -->
                                </div>

                                <div class="shop-item-summary text-center">
                                    <h2>Toyota Avanza G 1.3 - 2016</h2> 
                                </div> 
                            </div> 
                            <div class="shop-item">

                                <div class="thumbnail">
                                    <!-- product image(s) -->
                                    <a class="shop-item-image" href="shop-single-left.html">
                                        <img class="img-responsive" src="<?php echo base_url('assets/front/images/demo/451x300/24-min.jpg');?>" alt="shop first image">
                                        <img class="img-responsive" src="<?php echo base_url('assets/front/images/demo/451x300/24-min.jpg');?>" alt="shop hover image">
                                    </a>
                                    <!-- /product image(s) -->

                                    <!-- hover buttons -->
                                    <div class="shop-option-over"><!-- replace data-item-id width the real item ID - used by js/view/demo.shop.js -->
                                        <a class="btn btn-default add-wishlist" href="#" data-item-id="1" data-toggle="tooltip" title="" data-original-title="Add To Wishlist"><i class="fa fa-heart nopadding"></i></a>
                                        <a class="btn btn-default add-compare" href="#" data-item-id="1" data-toggle="tooltip" title="" data-original-title="Add To Compare"><i class="fa fa-bar-chart-o nopadding" data-toggle="tooltip"></i></a>
                                    </div>
                                    <!-- /hover buttons -->

                                    <!-- product more info -->
                                    <div class="shop-item-info">
                                        <span class="label label-warning">Rp. 182.000.000</span>
                                        <span class="label label-danger">SALE</span> 
                                    </div>
                                    <!-- /product more info -->
                                </div>

                                <div class="shop-item-summary text-center">
                                    <h2>Toyota Avanza G 1.3 - 2016</h2> 
                                </div> 
                            </div> 
                            <div class="shop-item">

                                <div class="thumbnail">
                                    <!-- product image(s) -->
                                    <a class="shop-item-image" href="shop-single-left.html">
                                        <img class="img-responsive" src="<?php echo base_url('assets/front/images/demo/451x300/24-min.jpg');?>" alt="shop first image">
                                        <img class="img-responsive" src="<?php echo base_url('assets/front/images/demo/451x300/24-min.jpg');?>" alt="shop hover image">
                                    </a>
                                    <!-- /product image(s) -->

                                    <!-- hover buttons -->
                                    <div class="shop-option-over"><!-- replace data-item-id width the real item ID - used by js/view/demo.shop.js -->
                                        <a class="btn btn-default add-wishlist" href="#" data-item-id="1" data-toggle="tooltip" title="" data-original-title="Add To Wishlist"><i class="fa fa-heart nopadding"></i></a>
                                        <a class="btn btn-default add-compare" href="#" data-item-id="1" data-toggle="tooltip" title="" data-original-title="Add To Compare"><i class="fa fa-bar-chart-o nopadding" data-toggle="tooltip"></i></a>
                                    </div>
                                    <!-- /hover buttons -->

                                    <!-- product more info -->
                                    <div class="shop-item-info">
                                        <span class="label label-warning">Rp. 182.000.000</span>
                                        <span class="label label-danger">SALE</span> 
                                    </div>
                                    <!-- /product more info -->
                                </div>

                                <div class="shop-item-summary text-center">
                                    <h2>Toyota Avanza G 1.3 - 2016</h2> 
                                </div> 
                            </div> 
                            <div class="shop-item">

                                <div class="thumbnail">
                                    <!-- product image(s) -->
                                    <a class="shop-item-image" href="shop-single-left.html">
                                        <img class="img-responsive" src="<?php echo base_url('assets/front/images/demo/451x300/24-min.jpg');?>" alt="shop first image">
                                        <img class="img-responsive" src="<?php echo base_url('assets/front/images/demo/451x300/24-min.jpg');?>" alt="shop hover image">
                                    </a>
                                    <!-- /product image(s) -->

                                    <!-- hover buttons -->
                                    <div class="shop-option-over"><!-- replace data-item-id width the real item ID - used by js/view/demo.shop.js -->
                                        <a class="btn btn-default add-wishlist" href="#" data-item-id="1" data-toggle="tooltip" title="" data-original-title="Add To Wishlist"><i class="fa fa-heart nopadding"></i></a>
                                        <a class="btn btn-default add-compare" href="#" data-item-id="1" data-toggle="tooltip" title="" data-original-title="Add To Compare"><i class="fa fa-bar-chart-o nopadding" data-toggle="tooltip"></i></a>
                                    </div>
                                    <!-- /hover buttons -->

                                    <!-- product more info -->
                                    <div class="shop-item-info">
                                        <span class="label label-warning">Rp. 182.000.000</span>
                                        <span class="label label-danger">SALE</span> 
                                    </div>
                                    <!-- /product more info -->
                                </div>

                                <div class="shop-item-summary text-center">
                                    <h2>Toyota Avanza G 1.3 - 2016</h2> 
                                </div> 
                            </div> 
                            
                        </div> 


                        <h4>Popular</h4>
                        <div class="owl-carousel owl-padding-10 buttons-autohide controlls-over" data-plugin-options='{"singleItem": false, "items":"4", "autoPlay": 4000, "navigation": true, "pagination": false}'>

                            <div class="shop-item">

                                <div class="thumbnail">
                                    <!-- product image(s) -->
                                    <a class="shop-item-image" href="shop-single-left.html">
                                        <img class="img-responsive" src="<?php echo base_url('assets/front/images/demo/451x300/24-min.jpg');?>" alt="shop first image">
                                        <img class="img-responsive" src="<?php echo base_url('assets/front/images/demo/451x300/24-min.jpg');?>" alt="shop hover image">
                                    </a>
                                    <!-- /product image(s) -->

                                    <!-- hover buttons -->
                                    <div class="shop-option-over"><!-- replace data-item-id width the real item ID - used by js/view/demo.shop.js -->
                                        <a class="btn btn-default add-wishlist" href="#" data-item-id="1" data-toggle="tooltip" title="" data-original-title="Add To Wishlist"><i class="fa fa-heart nopadding"></i></a>
                                        <a class="btn btn-default add-compare" href="#" data-item-id="1" data-toggle="tooltip" title="" data-original-title="Add To Compare"><i class="fa fa-bar-chart-o nopadding" data-toggle="tooltip"></i></a>
                                    </div>
                                    <!-- /hover buttons -->

                                    <!-- product more info -->
                                    <div class="shop-item-info">
                                        <span class="label label-warning">Rp. 182.000.000</span>
                                        <span class="label label-danger">SALE</span> 
                                    </div>
                                    <!-- /product more info -->
                                </div>

                                <div class="shop-item-summary text-center">
                                    <h2>Toyota Avanza G 1.3 - 2016</h2> 
                                </div> 
                            </div> 
                            <div class="shop-item">

                                <div class="thumbnail">
                                    <!-- product image(s) -->
                                    <a class="shop-item-image" href="shop-single-left.html">
                                        <img class="img-responsive" src="<?php echo base_url('assets/front/images/demo/451x300/24-min.jpg');?>" alt="shop first image">
                                        <img class="img-responsive" src="<?php echo base_url('assets/front/images/demo/451x300/24-min.jpg');?>" alt="shop hover image">
                                    </a>
                                    <!-- /product image(s) -->

                                    <!-- hover buttons -->
                                    <div class="shop-option-over"><!-- replace data-item-id width the real item ID - used by js/view/demo.shop.js -->
                                        <a class="btn btn-default add-wishlist" href="#" data-item-id="1" data-toggle="tooltip" title="" data-original-title="Add To Wishlist"><i class="fa fa-heart nopadding"></i></a>
                                        <a class="btn btn-default add-compare" href="#" data-item-id="1" data-toggle="tooltip" title="" data-original-title="Add To Compare"><i class="fa fa-bar-chart-o nopadding" data-toggle="tooltip"></i></a>
                                    </div>
                                    <!-- /hover buttons -->

                                    <!-- product more info -->
                                    <div class="shop-item-info">
                                        <span class="label label-warning">Rp. 182.000.000</span>
                                        <span class="label label-danger">SALE</span> 
                                    </div>
                                    <!-- /product more info -->
                                </div>

                                <div class="shop-item-summary text-center">
                                    <h2>Toyota Avanza G 1.3 - 2016</h2> 
                                </div> 
                            </div> 
                            <div class="shop-item">

                                <div class="thumbnail">
                                    <!-- product image(s) -->
                                    <a class="shop-item-image" href="shop-single-left.html">
                                        <img class="img-responsive" src="<?php echo base_url('assets/front/images/demo/451x300/24-min.jpg');?>" alt="shop first image">
                                        <img class="img-responsive" src="<?php echo base_url('assets/front/images/demo/451x300/24-min.jpg');?>" alt="shop hover image">
                                    </a>
                                    <!-- /product image(s) -->

                                    <!-- hover buttons -->
                                    <div class="shop-option-over"><!-- replace data-item-id width the real item ID - used by js/view/demo.shop.js -->
                                        <a class="btn btn-default add-wishlist" href="#" data-item-id="1" data-toggle="tooltip" title="" data-original-title="Add To Wishlist"><i class="fa fa-heart nopadding"></i></a>
                                        <a class="btn btn-default add-compare" href="#" data-item-id="1" data-toggle="tooltip" title="" data-original-title="Add To Compare"><i class="fa fa-bar-chart-o nopadding" data-toggle="tooltip"></i></a>
                                    </div>
                                    <!-- /hover buttons -->

                                    <!-- product more info -->
                                    <div class="shop-item-info">
                                        <span class="label label-warning">Rp. 182.000.000</span>
                                        <span class="label label-danger">SALE</span> 
                                    </div>
                                    <!-- /product more info -->
                                </div>

                                <div class="shop-item-summary text-center">
                                    <h2>Toyota Avanza G 1.3 - 2016</h2> 
                                </div> 
                            </div> 
                            <div class="shop-item">

                                <div class="thumbnail">
                                    <!-- product image(s) -->
                                    <a class="shop-item-image" href="shop-single-left.html">
                                        <img class="img-responsive" src="<?php echo base_url('assets/front/images/demo/451x300/24-min.jpg');?>" alt="shop first image">
                                        <img class="img-responsive" src="<?php echo base_url('assets/front/images/demo/451x300/24-min.jpg');?>" alt="shop hover image">
                                    </a>
                                    <!-- /product image(s) -->

                                    <!-- hover buttons -->
                                    <div class="shop-option-over"><!-- replace data-item-id width the real item ID - used by js/view/demo.shop.js -->
                                        <a class="btn btn-default add-wishlist" href="#" data-item-id="1" data-toggle="tooltip" title="" data-original-title="Add To Wishlist"><i class="fa fa-heart nopadding"></i></a>
                                        <a class="btn btn-default add-compare" href="#" data-item-id="1" data-toggle="tooltip" title="" data-original-title="Add To Compare"><i class="fa fa-bar-chart-o nopadding" data-toggle="tooltip"></i></a>
                                    </div>
                                    <!-- /hover buttons -->

                                    <!-- product more info -->
                                    <div class="shop-item-info">
                                        <span class="label label-warning">Rp. 182.000.000</span>
                                        <span class="label label-danger">SALE</span> 
                                    </div>
                                    <!-- /product more info -->
                                </div>

                                <div class="shop-item-summary text-center">
                                    <h2>Toyota Avanza G 1.3 - 2016</h2> 
                                </div> 
                            </div> 
                            <div class="shop-item">

                                <div class="thumbnail">
                                    <!-- product image(s) -->
                                    <a class="shop-item-image" href="shop-single-left.html">
                                        <img class="img-responsive" src="<?php echo base_url('assets/front/images/demo/451x300/24-min.jpg');?>" alt="shop first image">
                                        <img class="img-responsive" src="<?php echo base_url('assets/front/images/demo/451x300/24-min.jpg');?>" alt="shop hover image">
                                    </a>
                                    <!-- /product image(s) -->

                                    <!-- hover buttons -->
                                    <div class="shop-option-over"><!-- replace data-item-id width the real item ID - used by js/view/demo.shop.js -->
                                        <a class="btn btn-default add-wishlist" href="#" data-item-id="1" data-toggle="tooltip" title="" data-original-title="Add To Wishlist"><i class="fa fa-heart nopadding"></i></a>
                                        <a class="btn btn-default add-compare" href="#" data-item-id="1" data-toggle="tooltip" title="" data-original-title="Add To Compare"><i class="fa fa-bar-chart-o nopadding" data-toggle="tooltip"></i></a>
                                    </div>
                                    <!-- /hover buttons -->

                                    <!-- product more info -->
                                    <div class="shop-item-info">
                                        <span class="label label-warning">Rp. 182.000.000</span>
                                        <span class="label label-danger">SALE</span> 
                                    </div>
                                    <!-- /product more info -->
                                </div>

                                <div class="shop-item-summary text-center">
                                    <h2>Toyota Avanza G 1.3 - 2016</h2> 
                                </div> 
                            </div> 
                            <div class="shop-item">

                                <div class="thumbnail">
                                    <!-- product image(s) -->
                                    <a class="shop-item-image" href="shop-single-left.html">
                                        <img class="img-responsive" src="<?php echo base_url('assets/front/images/demo/451x300/24-min.jpg');?>" alt="shop first image">
                                        <img class="img-responsive" src="<?php echo base_url('assets/front/images/demo/451x300/24-min.jpg');?>" alt="shop hover image">
                                    </a>
                                    <!-- /product image(s) -->

                                    <!-- hover buttons -->
                                    <div class="shop-option-over"><!-- replace data-item-id width the real item ID - used by js/view/demo.shop.js -->
                                        <a class="btn btn-default add-wishlist" href="#" data-item-id="1" data-toggle="tooltip" title="" data-original-title="Add To Wishlist"><i class="fa fa-heart nopadding"></i></a>
                                        <a class="btn btn-default add-compare" href="#" data-item-id="1" data-toggle="tooltip" title="" data-original-title="Add To Compare"><i class="fa fa-bar-chart-o nopadding" data-toggle="tooltip"></i></a>
                                    </div>
                                    <!-- /hover buttons -->

                                    <!-- product more info -->
                                    <div class="shop-item-info">
                                        <span class="label label-warning">Rp. 182.000.000</span>
                                        <span class="label label-danger">SALE</span> 
                                    </div>
                                    <!-- /product more info -->
                                </div>

                                <div class="shop-item-summary text-center">
                                    <h2>Toyota Avanza G 1.3 - 2016</h2> 
                                </div> 
                            </div> 
                            <div class="shop-item">

                                <div class="thumbnail">
                                    <!-- product image(s) -->
                                    <a class="shop-item-image" href="shop-single-left.html">
                                        <img class="img-responsive" src="<?php echo base_url('assets/front/images/demo/451x300/24-min.jpg');?>" alt="shop first image">
                                        <img class="img-responsive" src="<?php echo base_url('assets/front/images/demo/451x300/24-min.jpg');?>" alt="shop hover image">
                                    </a>
                                    <!-- /product image(s) -->

                                    <!-- hover buttons -->
                                    <div class="shop-option-over"><!-- replace data-item-id width the real item ID - used by js/view/demo.shop.js -->
                                        <a class="btn btn-default add-wishlist" href="#" data-item-id="1" data-toggle="tooltip" title="" data-original-title="Add To Wishlist"><i class="fa fa-heart nopadding"></i></a>
                                        <a class="btn btn-default add-compare" href="#" data-item-id="1" data-toggle="tooltip" title="" data-original-title="Add To Compare"><i class="fa fa-bar-chart-o nopadding" data-toggle="tooltip"></i></a>
                                    </div>
                                    <!-- /hover buttons -->

                                    <!-- product more info -->
                                    <div class="shop-item-info">
                                        <span class="label label-warning">Rp. 182.000.000</span>
                                        <span class="label label-danger">SALE</span> 
                                    </div>
                                    <!-- /product more info -->
                                </div>

                                <div class="shop-item-summary text-center">
                                    <h2>Toyota Avanza G 1.3 - 2016</h2> 
                                </div> 
                            </div> 
                            <div class="shop-item">

                                <div class="thumbnail">
                                    <!-- product image(s) -->
                                    <a class="shop-item-image" href="shop-single-left.html">
                                        <img class="img-responsive" src="<?php echo base_url('assets/front/images/demo/451x300/24-min.jpg');?>" alt="shop first image">
                                        <img class="img-responsive" src="<?php echo base_url('assets/front/images/demo/451x300/24-min.jpg');?>" alt="shop hover image">
                                    </a>
                                    <!-- /product image(s) -->

                                    <!-- hover buttons -->
                                    <div class="shop-option-over"><!-- replace data-item-id width the real item ID - used by js/view/demo.shop.js -->
                                        <a class="btn btn-default add-wishlist" href="#" data-item-id="1" data-toggle="tooltip" title="" data-original-title="Add To Wishlist"><i class="fa fa-heart nopadding"></i></a>
                                        <a class="btn btn-default add-compare" href="#" data-item-id="1" data-toggle="tooltip" title="" data-original-title="Add To Compare"><i class="fa fa-bar-chart-o nopadding" data-toggle="tooltip"></i></a>
                                    </div>
                                    <!-- /hover buttons -->

                                    <!-- product more info -->
                                    <div class="shop-item-info">
                                        <span class="label label-warning">Rp. 182.000.000</span>
                                        <span class="label label-danger">SALE</span> 
                                    </div>
                                    <!-- /product more info -->
                                </div>

                                <div class="shop-item-summary text-center">
                                    <h2>Toyota Avanza G 1.3 - 2016</h2> 
                                </div> 
                            </div> 
                            <div class="shop-item">

                                <div class="thumbnail">
                                    <!-- product image(s) -->
                                    <a class="shop-item-image" href="shop-single-left.html">
                                        <img class="img-responsive" src="<?php echo base_url('assets/front/images/demo/451x300/24-min.jpg');?>" alt="shop first image">
                                        <img class="img-responsive" src="<?php echo base_url('assets/front/images/demo/451x300/24-min.jpg');?>" alt="shop hover image">
                                    </a>
                                    <!-- /product image(s) -->

                                    <!-- hover buttons -->
                                    <div class="shop-option-over"><!-- replace data-item-id width the real item ID - used by js/view/demo.shop.js -->
                                        <a class="btn btn-default add-wishlist" href="#" data-item-id="1" data-toggle="tooltip" title="" data-original-title="Add To Wishlist"><i class="fa fa-heart nopadding"></i></a>
                                        <a class="btn btn-default add-compare" href="#" data-item-id="1" data-toggle="tooltip" title="" data-original-title="Add To Compare"><i class="fa fa-bar-chart-o nopadding" data-toggle="tooltip"></i></a>
                                    </div>
                                    <!-- /hover buttons -->

                                    <!-- product more info -->
                                    <div class="shop-item-info">
                                        <span class="label label-warning">Rp. 182.000.000</span>
                                        <span class="label label-danger">SALE</span> 
                                    </div>
                                    <!-- /product more info -->
                                </div>

                                <div class="shop-item-summary text-center">
                                    <h2>Toyota Avanza G 1.3 - 2016</h2> 
                                </div> 
                            </div> 
                            <div class="shop-item">

                                <div class="thumbnail">
                                    <!-- product image(s) -->
                                    <a class="shop-item-image" href="shop-single-left.html">
                                        <img class="img-responsive" src="<?php echo base_url('assets/front/images/demo/451x300/24-min.jpg');?>" alt="shop first image">
                                        <img class="img-responsive" src="<?php echo base_url('assets/front/images/demo/451x300/24-min.jpg');?>" alt="shop hover image">
                                    </a>
                                    <!-- /product image(s) -->

                                    <!-- hover buttons -->
                                    <div class="shop-option-over"><!-- replace data-item-id width the real item ID - used by js/view/demo.shop.js -->
                                        <a class="btn btn-default add-wishlist" href="#" data-item-id="1" data-toggle="tooltip" title="" data-original-title="Add To Wishlist"><i class="fa fa-heart nopadding"></i></a>
                                        <a class="btn btn-default add-compare" href="#" data-item-id="1" data-toggle="tooltip" title="" data-original-title="Add To Compare"><i class="fa fa-bar-chart-o nopadding" data-toggle="tooltip"></i></a>
                                    </div>
                                    <!-- /hover buttons -->

                                    <!-- product more info -->
                                    <div class="shop-item-info">
                                        <span class="label label-warning">Rp. 182.000.000</span>
                                        <span class="label label-danger">SALE</span> 
                                    </div>
                                    <!-- /product more info -->
                                </div>

                                <div class="shop-item-summary text-center">
                                    <h2>Toyota Avanza G 1.3 - 2016</h2> 
                                </div> 
                            </div> 
                            
                        </div> 

                    </div>
                </section>





                <section>
                    <center><h4>Merk Mobil</h4></center>
                    <div class="container">
                      <div class="text-center margin-top-30 margin-bottom-30">
                        <div class="owl-carousel nomargin" data-plugin-options='{"singleItem": false, "autoPlay": true}'>
                            <div>
                                <img class="img-responsive" src="<?php echo base_url('assets/front/m88/honda.png');?>"" alt="" width="100px">
                            </div> 
                            <div>
                                <img class="img-responsive" src="<?php echo base_url('assets/front/m88/honda.png');?>"" alt="" width="100px">
                            </div> 
                            <div>
                                <img class="img-responsive" src="<?php echo base_url('assets/front/m88/honda.png');?>"" alt="" width="100px">
                            </div> 
                            <div>
                                <img class="img-responsive" src="<?php echo base_url('assets/front/m88/honda.png');?>"" alt="" width="100px">
                            </div> 
                            <div>
                                <img class="img-responsive" src="<?php echo base_url('assets/front/m88/honda.png');?>"" alt="" width="100px">
                            </div> 
                            <div>
                                <img class="img-responsive" src="<?php echo base_url('assets/front/m88/honda.png');?>"" alt="" width="100px">
                            </div> 
                            <div>
                                <img class="img-responsive" src="<?php echo base_url('assets/front/m88/honda.png');?>"" alt="" width="100px">
                            </div> 
                            <div>
                                <img class="img-responsive" src="<?php echo base_url('assets/front/m88/honda.png');?>"" alt="" width="100px">
                            </div> 
                            <div>
                                <img class="img-responsive" src="<?php echo base_url('assets/front/m88/honda.png');?>"" alt="" width="100px">
                            </div> 
                            <div>
                                <img class="img-responsive" src="<?php echo base_url('assets/front/m88/honda.png');?>"" alt="" width="100px">
                            </div> 
                        </div>
                    </div>
                </div>
            </section>


            <section>
                <div class="container"> 
                    <center><h4>Berita Terkini</h4></center> 
                    <div class="owl-carousel owl-padding-10 buttons-autohide controlls-over" data-plugin-options='{"singleItem": false, "items":"4", "autoPlay": 4000, "navigation": true, "pagination": false}'> 

                        <div class="img-hover">
                            <a href="blog-single-default.html">
                                <img class="img-responsive" src="<?php echo base_url('assets/front/images/demo/451x300/24-min.jpg');?>" alt="">
                            </a>

                            <h4 class="text-left margin-top-20"><a href="blog-single-default.html">Lorem Ipsum Dolor</a></h4>
                            <ul class="text-left size-12 list-inline list-separator">
                                <li>
                                    <i class="fa fa-calendar"></i> 
                                    29th Jan 2015
                                </li>
                                <li>
                                    <a href="blog-single-default.html#comments">
                                        <i class="fa fa-comments"></i> 
                                        3
                                    </a>
                                </li>
                            </ul>
                        </div> 
                        <div class="img-hover">
                            <a href="blog-single-default.html">
                                <img class="img-responsive" src="<?php echo base_url('assets/front/images/demo/451x300/24-min.jpg');?>" alt="">
                            </a>

                            <h4 class="text-left margin-top-20"><a href="blog-single-default.html">Lorem Ipsum Dolor</a></h4>
                            <ul class="text-left size-12 list-inline list-separator">
                                <li>
                                    <i class="fa fa-calendar"></i> 
                                    29th Jan 2015
                                </li>
                                <li>
                                    <a href="blog-single-default.html#comments">
                                        <i class="fa fa-comments"></i> 
                                        3
                                    </a>
                                </li>
                            </ul>
                        </div> 
                        <div class="img-hover">
                            <a href="blog-single-default.html">
                                <img class="img-responsive" src="<?php echo base_url('assets/front/images/demo/451x300/24-min.jpg');?>" alt="">
                            </a>

                            <h4 class="text-left margin-top-20"><a href="blog-single-default.html">Lorem Ipsum Dolor</a></h4>
                            <ul class="text-left size-12 list-inline list-separator">
                                <li>
                                    <i class="fa fa-calendar"></i> 
                                    29th Jan 2015
                                </li>
                                <li>
                                    <a href="blog-single-default.html#comments">
                                        <i class="fa fa-comments"></i> 
                                        3
                                    </a>
                                </li>
                            </ul>
                        </div> 
                        <div class="img-hover">
                            <a href="blog-single-default.html">
                                <img class="img-responsive" src="<?php echo base_url('assets/front/images/demo/451x300/24-min.jpg');?>" alt="">
                            </a>

                            <h4 class="text-left margin-top-20"><a href="blog-single-default.html">Lorem Ipsum Dolor</a></h4>
                            <ul class="text-left size-12 list-inline list-separator">
                                <li>
                                    <i class="fa fa-calendar"></i> 
                                    29th Jan 2015
                                </li>
                                <li>
                                    <a href="blog-single-default.html#comments">
                                        <i class="fa fa-comments"></i> 
                                        3
                                    </a>
                                </li>
                            </ul>
                        </div> 
                        <div class="img-hover">
                            <a href="blog-single-default.html">
                                <img class="img-responsive" src="<?php echo base_url('assets/front/images/demo/451x300/24-min.jpg');?>" alt="">
                            </a>

                            <h4 class="text-left margin-top-20"><a href="blog-single-default.html">Lorem Ipsum Dolor</a></h4>
                            <ul class="text-left size-12 list-inline list-separator">
                                <li>
                                    <i class="fa fa-calendar"></i> 
                                    29th Jan 2015
                                </li>
                                <li>
                                    <a href="blog-single-default.html#comments">
                                        <i class="fa fa-comments"></i> 
                                        3
                                    </a>
                                </li>
                            </ul>
                        </div> 
                        <div class="img-hover">
                            <a href="blog-single-default.html">
                                <img class="img-responsive" src="<?php echo base_url('assets/front/images/demo/451x300/24-min.jpg');?>" alt="">
                            </a>

                            <h4 class="text-left margin-top-20"><a href="blog-single-default.html">Lorem Ipsum Dolor</a></h4>
                            <ul class="text-left size-12 list-inline list-separator">
                                <li>
                                    <i class="fa fa-calendar"></i> 
                                    29th Jan 2015
                                </li>
                                <li>
                                    <a href="blog-single-default.html#comments">
                                        <i class="fa fa-comments"></i> 
                                        3
                                    </a>
                                </li>
                            </ul>
                        </div> 
                        <div class="img-hover">
                            <a href="blog-single-default.html">
                                <img class="img-responsive" src="<?php echo base_url('assets/front/images/demo/451x300/24-min.jpg');?>" alt="">
                            </a>

                            <h4 class="text-left margin-top-20"><a href="blog-single-default.html">Lorem Ipsum Dolor</a></h4>
                            <ul class="text-left size-12 list-inline list-separator">
                                <li>
                                    <i class="fa fa-calendar"></i> 
                                    29th Jan 2015
                                </li>
                                <li>
                                    <a href="blog-single-default.html#comments">
                                        <i class="fa fa-comments"></i> 
                                        3
                                    </a>
                                </li>
                            </ul>
                        </div> 
                        <div class="img-hover">
                            <a href="blog-single-default.html">
                                <img class="img-responsive" src="<?php echo base_url('assets/front/images/demo/451x300/24-min.jpg');?>" alt="">
                            </a>

                            <h4 class="text-left margin-top-20"><a href="blog-single-default.html">Lorem Ipsum Dolor</a></h4>
                            <ul class="text-left size-12 list-inline list-separator">
                                <li>
                                    <i class="fa fa-calendar"></i> 
                                    29th Jan 2015
                                </li>
                                <li>
                                    <a href="blog-single-default.html#comments">
                                        <i class="fa fa-comments"></i> 
                                        3
                                    </a>
                                </li>
                            </ul>
                        </div> 
                        <div class="img-hover">
                            <a href="blog-single-default.html">
                                <img class="img-responsive" src="<?php echo base_url('assets/front/images/demo/451x300/24-min.jpg');?>" alt="">
                            </a>

                            <h4 class="text-left margin-top-20"><a href="blog-single-default.html">Lorem Ipsum Dolor</a></h4>
                            <ul class="text-left size-12 list-inline list-separator">
                                <li>
                                    <i class="fa fa-calendar"></i> 
                                    29th Jan 2015
                                </li>
                                <li>
                                    <a href="blog-single-default.html#comments">
                                        <i class="fa fa-comments"></i> 
                                        3
                                    </a>
                                </li>
                            </ul>
                        </div> 
                        <div class="img-hover">
                            <a href="blog-single-default.html">
                                <img class="img-responsive" src="<?php echo base_url('assets/front/images/demo/451x300/24-min.jpg');?>" alt="">
                            </a>

                            <h4 class="text-left margin-top-20"><a href="blog-single-default.html">Lorem Ipsum Dolor</a></h4>
                            <ul class="text-left size-12 list-inline list-separator">
                                <li>
                                    <i class="fa fa-calendar"></i> 
                                    29th Jan 2015
                                </li>
                                <li>
                                    <a href="blog-single-default.html#comments">
                                        <i class="fa fa-comments"></i> 
                                        3
                                    </a>
                                </li>
                            </ul>
                        </div> 
                        <div class="img-hover">
                            <a href="blog-single-default.html">
                                <img class="img-responsive" src="<?php echo base_url('assets/front/images/demo/451x300/24-min.jpg');?>" alt="">
                            </a>

                            <h4 class="text-left margin-top-20"><a href="blog-single-default.html">Lorem Ipsum Dolor</a></h4>
                            <ul class="text-left size-12 list-inline list-separator">
                                <li>
                                    <i class="fa fa-calendar"></i> 
                                    29th Jan 2015
                                </li>
                                <li>
                                    <a href="blog-single-default.html#comments">
                                        <i class="fa fa-comments"></i> 
                                        3
                                    </a>
                                </li>
                            </ul>
                        </div> 
                        <div class="img-hover">
                            <a href="blog-single-default.html">
                                <img class="img-responsive" src="<?php echo base_url('assets/front/images/demo/451x300/24-min.jpg');?>" alt="">
                            </a>

                            <h4 class="text-left margin-top-20"><a href="blog-single-default.html">Lorem Ipsum Dolor</a></h4>
                            <ul class="text-left size-12 list-inline list-separator">
                                <li>
                                    <i class="fa fa-calendar"></i> 
                                    29th Jan 2015
                                </li>
                                <li>
                                    <a href="blog-single-default.html#comments">
                                        <i class="fa fa-comments"></i> 
                                        3
                                    </a>
                                </li>
                            </ul>
                        </div> 
                        <div class="img-hover">
                            <a href="blog-single-default.html">
                                <img class="img-responsive" src="<?php echo base_url('assets/front/images/demo/451x300/24-min.jpg');?>" alt="">
                            </a>

                            <h4 class="text-left margin-top-20"><a href="blog-single-default.html">Lorem Ipsum Dolor</a></h4>
                            <ul class="text-left size-12 list-inline list-separator">
                                <li>
                                    <i class="fa fa-calendar"></i> 
                                    29th Jan 2015
                                </li>
                                <li>
                                    <a href="blog-single-default.html#comments">
                                        <i class="fa fa-comments"></i> 
                                        3
                                    </a>
                                </li>
                            </ul>
                        </div> 
                        <div class="img-hover">
                            <a href="blog-single-default.html">
                                <img class="img-responsive" src="<?php echo base_url('assets/front/images/demo/451x300/24-min.jpg');?>" alt="">
                            </a>

                            <h4 class="text-left margin-top-20"><a href="blog-single-default.html">Lorem Ipsum Dolor</a></h4>
                            <ul class="text-left size-12 list-inline list-separator">
                                <li>
                                    <i class="fa fa-calendar"></i> 
                                    29th Jan 2015
                                </li>
                                <li>
                                    <a href="blog-single-default.html#comments">
                                        <i class="fa fa-comments"></i> 
                                        3
                                    </a>
                                </li>
                            </ul>
                        </div> 
                        <div class="img-hover">
                            <a href="blog-single-default.html">
                                <img class="img-responsive" src="<?php echo base_url('assets/front/images/demo/451x300/24-min.jpg');?>" alt="">
                            </a>

                            <h4 class="text-left margin-top-20"><a href="blog-single-default.html">Lorem Ipsum Dolor</a></h4>
                            <ul class="text-left size-12 list-inline list-separator">
                                <li>
                                    <i class="fa fa-calendar"></i> 
                                    29th Jan 2015
                                </li>
                                <li>
                                    <a href="blog-single-default.html#comments">
                                        <i class="fa fa-comments"></i> 
                                        3
                                    </a>
                                </li>
                            </ul>
                        </div> 
                        
                    </div>
                </div>
            </section>



            <!-- FOOTER -->
            

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


        <!-- JAVASCRIPT FILES -->
        <script type="text/javascript">var plugin_path = 'assets/plugins/';</script>
        <script type="text/javascript" src="<?php echo base_url('assets/front/plugins/jquery/jquery-2.1.4.min.js');?>"></script>

        <script type="text/javascript" src="<?php echo base_url('assets/front/js/scripts.js');?>"></script>

    </body>


    <footer id="footer">
        <div class="container">

            <div class="row">

                <div class="col-md-3">
                    <!-- Footer Logo -->
                    <img class="footer-logo" src="../logo-mobil88-putih.png');?>"" alt="" width="200px" />

                    <!-- Small Description -->
                    <p>Jual beli mobil astra.</p>

                    <!-- Contact Address -->
                    <address>
                        <ul class="list-unstyled">
                            <li class="footer-sprite address">
                                PO Box 21132<br> 
                                Grha Sera<br>
                                Jakarta<br>
                            </li>
                            <li class="footer-sprite phone">
                                Phone: 021 
                            </li>
                            <li class="footer-sprite email">
                                <a href="mailto:support@yourname.com">support@yourname.com</a>s
                            </li>
                        </ul>
                    </address>
                    <!-- /Contact Address -->

                </div>

                <div class="col-md-3">

                    <!-- Latest Blog Post -->
                    <h4 class="letter-spacing-1">LATEST NEWS</h4>
                    <ul class="footer-posts list-unstyled">
                        <li>
                            <a href="#">Donec sed odio dui. Nulla vitae elit libero, a pharetra augue</a>
                            <small>29 June 2015</small>
                        </li>
                        <li>
                            <a href="#">Nullam id dolor id nibh ultricies</a>
                            <small>29 June 2015</small>
                        </li>
                        <li>
                            <a href="#">Duis mollis, est non commodo luctus</a>
                            <small>29 June 2015</small>
                        </li>
                    </ul>
                    <!-- /Latest Blog Post -->

                </div>

                <div class="col-md-2">

                    <!-- Links -->
                    <h4 class="letter-spacing-1">EXPLORE</h4>
                    <ul class="footer-links list-unstyled">
                        <li><a href="#">Home</a></li> 
                        <li><a href="#">Beli Mobil</a></li> 
                        <li><a href="#">Jual Mobil</a></li> 
                        <li><a href="#">Berita</a></li>
                        <li><a href="#">Hubungi Kami</a></li>
                        <li><a href="#">FAQ</a></li>   

                    </ul>
                    <!-- /Links -->

                </div>

                <div class="col-md-4">

                    <!-- Newsletter Form -->
                    <h4 class="letter-spacing-1">KEEP IN TOUCH</h4>
                    <p>Subscribe to Our Newsletter to get Important News &amp; Offers</p>

                    <form class="validate" action="php/newsletter.php" method="post" data-success="Subscribed! Thank you!" data-toastr-position="bottom-right">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-envelope"></i></span>
                            <input type="email" id="email" name="email" class="form-control required" placeholder="Enter your Email">
                            <span class="input-group-btn">
                                <button class="btn btn-success" type="submit">Subscribe</button>
                            </span>
                        </div>
                    </form>
                    <!-- /Newsletter Form -->

                    <!-- Social Icons -->
                    <div class="margin-top-20">
                        <a href="#" class="social-icon  social-facebook pull-left" data-toggle="tooltip" data-placement="top" title="Facebook">

                            <i class="icon-facebook"></i>
                            <i class="icon-facebook"></i>
                        </a>

                        <a href="#" class="social-icon  social-twitter pull-left" data-toggle="tooltip" data-placement="top" title="Twitter">
                            <i class="icon-twitter"></i>
                            <i class="icon-twitter"></i>
                        </a>

                        <a href="#" class="social-icon  social-gplus pull-left" data-toggle="tooltip" data-placement="top" title="Google plus">
                            <i class="icon-gplus"></i>
                            <i class="icon-gplus"></i>
                        </a>

                        <a href="#" class="social-icon  social-linkedin pull-left" data-toggle="tooltip" data-placement="top" title="Linkedin">
                            <i class="icon-linkedin"></i>
                            <i class="icon-linkedin"></i>
                        </a>

                        <a href="#" class="social-icon  social-rss pull-left" data-toggle="tooltip" data-placement="top" title="Rss">
                            <i class="icon-rss"></i>
                            <i class="icon-rss"></i>
                        </a>

                    </div>
                    <!-- /Social Icons -->

                </div>

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
    </html>