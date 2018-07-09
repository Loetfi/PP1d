<!-- Main Content Section -->
<main class="main">
    <!-- Page Title -->
    <div class="page-title text-center"> 
        <h2 class="title"> Berita</h2>
        <p class="description light"> Melalui situs ini kami sediakan informasi tentang Organisasi, Program Kerja dan Informasi Publik pada Kementerian ESDM.</p>
    </div>
    <!-- Page Title --> 

    <div class="container">
        <div class="row">

            <div class="col-md-9 blog-grid">
                <section class="blog-services">
                    <div class="row news">

                        <div class="col-md-12">
                            <div class="alert alert-info">
                                Hasil Pencarian  <strong><?php echo @$_GET['q']; ?></strong> 
                            </div>
                        </div>

                        <?php 
                        if (isset($news) or $news > 0) {

                        foreach ($news as $berita) { ?>

                        <div class="col-md-6">
                            <div class="blog-img-box">
                                <div class="blog-date"> 
                                    <?php 
                                    $tanggal = date('d',strtotime($berita->datepost));
                                    $bulan = date('F',strtotime($berita->datepost));
                                    ?>
                                    <span class="month"><?php echo $bulan; ?></span> <span class="date"> <?php echo $tanggal; ?></span> 
                                </div>
                                <a class="hover-effect" href="<?php echo site_url('news/'.date('Y/m/',strtotime($berita->datepost)).$berita->slug); ?>">
                                    <img src="<?php echo base_url('uploads/news/'.@$berita->gambar); ?>" alt="Fuel" />
                                </a>
                            </div>
                            <div class="blog-content">
                                <h3><a href="<?php echo site_url('news/'.date('Y/m/',strtotime($berita->datepost)).$berita->slug); ?>"><?php echo (strlen($berita->title) >= 50)  ?  substr(@$berita->title, 0 , 50).'...' : $berita->title; ?></a> </h3>  
                                <p>By <a href="#">Admin</a></p>
                            </div>
                        </div>

                        <?php } } else { ?>

                        <p>Maaf berita tidak ditemukan</p>

                        <?php } ?> 

                    </div>
                </section>
            </div>

            <!-- <dir> -->
                <div class="col-md-3 sidebar">

                    <div class="sidebar-search-form">
                        <form action="<?php echo site_url('search/') ?>" method="GET">
                            <input type="text" class="  search-query form-control" placeholder="Search" name="q" />
                            <button class="btn search-btn" type="button">
                                <span class="fa fa-search"></span>
                            </button>
                        </form>
                    </div>

                    <div class="sidebar-blog-categories">
                        <h3 class="sidebar-title">Categories</h3>

                        <ul>
                            <?php foreach ($category as $cat) { ?>
                            <li> <a href="<?php echo site_url('kategori/'.$cat->slugkategori);?>"><?php echo $cat->category_name; ?></a> </li>
                            <?php } ?>
                        </ul>

                    </div> 
                    <div class="sidebar-tags">
                        <h3 class="sidebar-title"> Tags </h3>

                        <?php foreach ($news as $tags) { ?>
                        <a href="<?php echo site_url('tags/') ?>"><?php echo $tags->tagberita;?></a>
                        <?php } ?> 

                    </div>

                </div>

            </div>
        </div>
    </main>
    <!-- Main Content Section -->
