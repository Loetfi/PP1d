<main class="main"> 

    <!-- Page Title -->
    <div class="page-title text-center">
        <h2 class="title"> Reset Password PPID </h2> 
    </div>
    <!-- Page Title -->
    <div class="container">
        <section class="contact"> 
            <div class="col-md-3"></div>
            <div class="col-md-6">
<?php if ($this->session->flashdata('itemFlashData') != '') { ?>
<div class="alert alert-success alert-dismissable alert_content"><a href="#" class="close" data-dismiss="alert" aria-label="close" title="close"><i class="fa fa-times"></i></a><center><?php echo $this->session->flashdata('itemFlashData'); ?></center>
</div>
<?php } ?>
                <form id="contact_form" class="form well-form" id="loginAdmin" class="sky-form" method="post" action="#" autocomplete="off">
                    <h2>Email Anda </h2>
                    <!-- Email -->
                    <div class="form-group">
                        <input name="email" id="email" placeholder="email" class="form-control" type="text" required title="Please enter your full name">
                    </div>
                    <!-- Button -->
                    <button type="submit" class="btn btn-block btn-default" id="js-contact-btn"> Reset </button>


                </form>
            </div>
            <div class="col-md-3"></div>
        </section>
    </div>
</main>
<br><br><br>
<!-- Main Content Section -->
