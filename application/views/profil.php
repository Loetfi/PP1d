
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
            <!--<div class="panel panel-warning">
                <div class="panel-heading">
                    <h3 class="panel-title">Ubah Foto</h3>
                </div>
                <div class="panel-body">
                    Panel content
                </div>
            </div> -->

            <div class="panel panel-warning">
                <div class="panel-heading">
                    <h3 class="panel-title">KTP/SIM/NPWP</h3>
                </div>
                <div class="panel-body">
                    <?php  if ($detail['ktp_img'] != '') { ?>
                    <img src="<?php echo base_url('uploads/profil/'.$detail['ktp_img']); ?>" style="max-height: 200px; max-width: 200px;" alt="myImg" ><br>
                    <?php } else { ?>
                    <img src="<?php echo base_url('resources/myResources/img/no_img.jpg'); ?>" style="max-height: 200px; max-width: 200px;" alt="no img"><br>
                    <?php } ?>
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
                    <form id="contact_form" class="form" action="<?php echo site_url('profil/update_profil'); ?>" method="post" enctype="multipart/form-data">
                        <!-- nama -->
                        <div id="namaDiv" class="formFieldSs <?php echo form_error('nama') !='' ? 'error':''; ?>">
                            <label>Nama Lengkap*</label>
                            <input type="text" name="nama" class="form-control" id="nama" placeholder="Nama Lengkap" value="<?php echo set_value('nama', $detail['nama']); ?>" >
                            <label class="ui-state-error"><?php echo form_error('nama'); ?></label>
                        </div> 
                        
                        <!-- identitas -->
                        <div id="identitasDiv" class="formFieldSs <?php echo form_error('type_identitas') !='' ? 'error':''; ?>">
                            <label>Tipe Identitas*</label>
                            <select name="type_identitas" class="form-control" id="type_identitas">
                                <option value="KTP" <?php echo $detail['type_identitas']=='KTP'?'selected':''; ?>>KTP</option>
                                <option value="SIM" <?php echo $detail['type_identitas']=='SIM'?'selected':''; ?>>SIM</option>
                                <option value="NPWP"<?php echo $detail['type_identitas']=='NPWP'?'selected':''; ?>>NPWP</option>
                            </select> 
                            <label class="ui-state-error"><?php echo form_error('type_identitas'); ?></label>
                        </div>

                        <div class="formFieldSs <?php echo form_error('no_identitas') !='' ? 'error':''; ?>">
                            <label>Nomor Identitas*</label>
                            <input type="text" name="no_identitas" class="form-control" id="no_identitas" placeholder="No Identitas"  value="<?php echo set_value('no_identitas', $detail['no_identitas']); ?>">
                            <label class="ui-state-error"><?php echo form_error('no_identitas'); ?></label>
                        </div>
                        <br>
                        <!-- gambar identitas -->
                        <div class="form-group has-feedback">
                            <label>Gambar Identitas</label>
                            <input type="file" name="userfile" class="formFieldSs <?php echo form_error('userfile') !='' ? 'error':''; ?>" placeholder="Foto Identitas" style="padding: 0; " >
                            <label class="ui-state-error"><?php echo form_error('userfile'); ?></label>
                        </div>
                        
                        <!-- alamat -->
                        <div id="alamatDiv" class="formFieldSs <?php echo form_error('alamat') !='' ? 'error':''; ?>">
                            <label>Alamat*</label>
                            <textarea name="alamat" class="form-control" id="alamat" placeholder="Alamat" ><?php echo set_value('alamat', $detail['alamat']); ?></textarea>
                            <label class="ui-state-error"><?php echo form_error('alamat'); ?></label>
                        </div>

                        <!-- tlp -->
                        <div id="tlpDiv" class="formFieldSs <?php echo form_error('tlp') !='' ? 'error':''; ?>">
                            <label>No HP / Telp*</label>
                            <input type="text" name="tlp" class="form-control" id="tlp" placeholder="TLP/HP hanya angka" value="<?php echo set_value('tlp', $detail['tlp']); ?>" > 
                            <label class="ui-state-error"><?php echo form_error('tlp'); ?></label>
                        </div>
                        
                        <!-- email -->
                        <div id="emailDiv" class="formFieldSs <?php echo form_error('email') !='' ? 'error':''; ?>">
                            <label>Email*</label>
                            <input type="email" name="email" class="form-control" id="email" placeholder="Email" value="<?php echo set_value('email', $detail['email']); ?>" > 
                            <label class="ui-state-error"><?php echo form_error('email'); ?></label>
                        </div>
                        
                        <!-- pekerjaan -->
                        <div id="pekerjaanDiv" class="formFieldSs <?php echo form_error('pekerjaan') !='' ? 'error':''; ?>">
                            <label>Pekerjaan*</label>
                            <input type="text" name="pekerjaan" class="form-control" id="pekerjaan" placeholder="Pekerjaan" value="<?php echo set_value('pekerjaan', $detail['pekerjaan']); ?>" > 
                            <label class="ui-state-error"><?php echo form_error('pekerjaan'); ?></label>
                        </div>
                        
                        <!-- Button -->
                        <button type="submit" class="btn btn-default" id="js-contact-btn">Simpan </button>

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
