<?php include 'kepala.php'; ?>

<!-- Main Content Section -->
<main class="main"> 

    <!-- Page Title -->
    <div class="page-title text-center">
        <h2 class="title"> Login PPID </h2> 
    </div>
    <!-- Page Title -->
    <div class="container">
        <section class="contact"> 
            <div class="col-md-12">
                <form id="contact_form" class="form well-form" action="php/contact.php" method="post">
                    <h2>Login </h2>
                    <p>Belum memiliki akun ? <a href="<?php echo site_url('auth/register/'); ?>" class="btn btn-default btn-sm"> Daftar </a></p>
                    <!-- Text input-->
                    <div class="form-group">
                        <input name="name" placeholder="Username" class="form-control" type="text" required title="Please enter your full name">
                    </div>
                    <!-- Email input-->
                    <div class="form-group">
                        <input name="email" placeholder="Password" class="form-control" type="password" required title="Masukan Password" data-msg-email="Ouch, that doesn't look like an email">
                    </div> 
                    <!-- Button -->
                    <button type="submit" class="btn btn-block btn-default" id="js-contact-btn"> Login </button>

                    <div id="js-contact-result" data-success-msg="Form submitted successfully." data-error-msg="Oops. Something went wrong."></div>

                </form>
            </div> 
        </section>
    </div>
</main>
<br><br><br>
<!-- Main Content Section -->

<?php include 'footer.php'; ?>