
<!-- Main Content Section -->
<main class="main">
    <!-- <?php print_r($slider); ?> -->

	<div class="row" style="background: #f4f5f8;">
		<div class="col-md-9" style="padding-right: 0">
    <section class="home-slider">
        <div class="flexslider">
            <ul class="slides">
                <?php foreach ($slider as $slide) { ?>
                <li class="has-overlay">
                    <img src="<?php echo base_url('uploads/contents/'.$slide->photo);?>" alt="Slider 1" />
                    <div class="slider-content">
                        <div class="container">
                            <h2> <?php echo @$slide->title;  ?></h2>
                            <?php echo @$slide->content; ?>
                        </div>
                    </div>
                </li> 
                <?php } ?>  
			</ul>
		</div>
	</section>
		</div>
		<div class="col-md-3">
		<?php $this->load->view('front/home_login_profil'); ?>
		</div>
	</div>
 
 <section class="home-news">
    <div class="container">
        <div class="section-title text-center"> 
            <h2 class="subtitle-blog title-2"> Berita Terbaru </h2>
            <div class="spacer-50"> </div>
        </div>
        <div class="row news">

            <?php foreach ($news as $berita) {?>
            <div class="col-md-4">
                <div class="blog-img-box">
                    <div class="blog-date"> 
                        <?php 
                        $tanggal = date('d',strtotime($berita->datepost));
                        $bulan = date('F',strtotime($berita->datepost));
                        ?>
                        <span class="month"><?php echo $bulan; ?></span> <span class="date"> <?php echo $tanggal; ?></span> 
                    </div>
                    <a class="hover-effect" href="<?php echo site_url('blog/detail/'.date('Y/m/',strtotime($berita->datepost)).$berita->slug); ?>">
						<?php if ($berita->gambar != ''){ ?>
                        <img src="<?php echo base_url('uploads/news/'.$berita->gambar); ?>" alt="<?php echo $berita->titlel; ?>" />
						<?php } else { ?> 
						<img src="<?php echo base_url('assets/front/new/images/news1.jpg'); ?>" alt="<?php echo $berita->titlel; ?>" />
						<?php } ?>
                    </a>
                </div>
                <div class="blog-content">
                    <h3><a href="<?php echo site_url('blog/detail/'.date('Y/m/',strtotime($berita->datepost)).$berita->slug); ?>"><?php echo (strlen($berita->title) >= 50)  ?  substr(@$berita->title, 0 , 50).'...' : $berita->title; ?></a> </h3>  
                    <p>By <a href="#">Admin</a></p>
                </div>
            </div>
            <?php } ?> 
    </div>
    <!-- div class="blog-btn text-center">
        <a href="<?php echo site_url('blog'); ?>" class="btn btn-primary" role="button">READ THE BLOG</a>
    </div -->
</div>
</section>

<section class="home-partners">
    <div class="container">
        <div class="section-title text-center">
            <h2 class="subtitle-testimonials title-2"> TAUTAN TERKAIT </h2>
            <div class="spacer-20"> </div>
        </div>

        <div class="row partners">
            <div class="logo-slides slides owl-carousel">

                <?php foreach ($link as $partner) { ?>
                <div class="item">
                    <div class="partner-images">
                        <img src="<?php echo base_url('uploads/contents/'.$partner->photo) ?>" alt="<?php echo @$partner->title;?>">
                    </div>
                </div> 
                <?php } ?> 

            </div>
        </div>
    </div>
</section>

</main>
<!-- Main Content Section --> 
