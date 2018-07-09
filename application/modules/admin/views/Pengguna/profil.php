
<div class="container"> 
    <!-- nacigasi member -->
   <?php // echo $this->load->view('template/navigasi'); ?>
<!-- end -->
    <div class="row about-sidebar"> 
      <!-- Breadcrumbs --> 
      <div class="col-md-12 about-content">    

        <h3>Profil Pengguna</h3>
        <hr>
        
        <div class="col-md-4">
            <div class="panel panel-warning">
                <div class="panel-heading">
                    <h3 class="panel-title">Ubah Foto</h3>
                </div>
                <div class="panel-body">
                    Panel content
                </div>
            </div>

            <div class="panel panel-warning">
                <div class="panel-heading">
                    <h3 class="panel-title">Ubah Scan KTP/SIM/NPWP</h3>
                </div>
                <div class="panel-body">
                    Panel content
                </div>
            </div>

            <div class="panel panel-warning">
                <div class="panel-heading">
                    <h3 class="panel-title">Ubah Password</h3>
                </div>
                <div class="panel-body">
                    Panel content
                </div>
            </div>
            
        </div>


        <div class="col-md-8" style="padding-bottom: 50px">
            <div class="panel panel-warning">
                <div class="panel-heading">
                <h3 class="panel-title">Ubah Profil</h3> 
                </div>
                <div class="panel-body">
                    <form id="contact_form" class="form" action="php/contact.php" method="post"> 
                        <!-- Text input-->
                        <div class="form-group">
                            <input name="name" placeholder="Username" class="form-control" type="text" required title="Please enter your full name">
                        </div>
                        <!-- Email input-->
                        <div class="form-group">
                            <input name="email" placeholder="Password" class="form-control" type="password" required title="Masukan Password" data-msg-email="Ouch, that doesn't look like an email">
                        </div> 
                        <!-- Button -->
                        <button type="submit" class="btn btn-default" id="js-contact-btn">Ubah </button>

                        <div id="js-contact-result" data-success-msg="Form submitted successfully." data-error-msg="Oops. Something went wrong."></div>

                    </form> 

                    <br><br><br><br><br><br><br><br>
                </div>
            </div>
            
        </div> 

    </section>

    <br><br><br><br><br><br><br><br><br><br>
</div>
</section> 

</div> 

</div>

</div>
</main> 
