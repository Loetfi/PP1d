<!-- Main Content Section -->
<main class="main">
    <!-- Page Title -->
    <div class="page-title text-center"> 
        <h2 class="title">Berita</h2>
        <p class="description light"> <?php echo date('d F Y', strtotime($news->datepost)); ?></p>
    </div>
    <!-- Page Title --> 
 
    <div class="container">
        <div class="row">

            <div class="col-md-9 blog-grid">
                <section class="blog-services"> 
                    <h3> <?php echo $news->title; ?></h3>
                        <img src="<?php echo base_url('uploads/news/'.$news->gambar); ?>">
                    <?php echo $news->content; ?>
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

                </div>

            </div>
        </div>
    </main>
    <!-- Main Content Section -->
