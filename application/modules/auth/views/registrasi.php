 
<!-- Main Content Section -->
<main class="main"> 
    <!-- Page Title -->
    <div class="page-title text-center">
        <h2 class="title"> Daftar Member PPID </h2> 
    </div>
    <!-- Page Title -->
    <div class="container">
        <section class="contact"> 
            <div class="col-md-12">
                <form id="contact_form" class="form well-form" action="<?php echo site_url('auth/register'); ?>" method="post" enctype="multipart/form-data">
                    <h2>Registrasi </h2>   
                    <!-- nama -->
                    <div id="namaDiv" class="formFieldSs <?php echo form_error('nama') !='' ? 'error':''; ?>">
                        <label>Nama Lengkap</label>
                        <input type="text" name="nama" class="form-control" id="nama" placeholder="Nama Lengkap" value="<?php echo set_value('nama'); ?>" >
                        <label class="ui-state-error"><?php echo form_error('nama'); ?></label>
                    </div> 
                    
                    <!-- identitas -->
                    <!--<div id="identitasDiv" class="formFieldSs <?php echo form_error('type_identitas') !='' ? 'error':''; ?>">
                        <label>Tipe Identitas</label>
                        <select name="type_identitas" class="form-control" id="type_identitas">
                            <option value="KTP">KTP</option>
                            <option value="SIM">SIM</option>
                            <option value="NPWP">NPWP</option>
                        </select> 
                        <label class="ui-state-error"><?php echo form_error('type_identitas'); ?></label>
                    </div>-->

                    <!--<div class="formFieldSs <?php echo form_error('no_identitas') !='' ? 'error':''; ?>">
                        <label>Nomor Identitas</label>
                        <input type="text" name="no_identitas" class="form-control" id="no_identitas" placeholder="No Identitas"  value="<?php echo set_value('no_identitas'); ?>">
                        <label class="ui-state-error"><?php echo form_error('no_identitas'); ?></label>
                    </div>
                    <br>-->
                    <!-- gambar identitas -->
                    <!--<div class="form-group has-feedback">
                        <label>Gambar Identitas</label>
                        <input type="file" name="userfile" class="formFieldSs <?php echo form_error('userfile') !='' ? 'error':''; ?>" placeholder="Foto Identitas" style="padding: 0; " >
                        <label class="ui-state-error"><?php echo form_error('userfile'); ?></label>
                    </div>-->
                    
                    <!-- alamat -->
                    <!--<div id="alamatDiv" class="formFieldSs <?php echo form_error('alamat') !='' ? 'error':''; ?>">
                        <label>Alamat</label>
                        <textarea name="alamat" class="form-control" id="alamat" placeholder="Alamat" ><?php echo set_value('alamat'); ?></textarea>
                        <label class="ui-state-error"><?php echo form_error('alamat'); ?></label>
                    </div>-->

                    <!-- tlp -->
                    <!--<div id="tlpDiv" class="formFieldSs <?php echo form_error('tlp') !='' ? 'error':''; ?>">
                        <label>No HP / Telp</label>
                        <input type="text" name="tlp" class="form-control" id="tlp" placeholder="TLP/HP hanya angka" value="<?php echo set_value('tlp'); ?>" > 
                        <label class="ui-state-error"><?php echo form_error('tlp'); ?></label>
                    </div>-->
                    
                    <!-- email -->
                    <div id="emailDiv" class="formFieldSs <?php echo form_error('email') !='' ? 'error':''; ?>">
                        <label>Email</label>
                        <input type="email" name="email" class="form-control" id="email" placeholder="Email" value="<?php echo set_value('email'); ?>" > 
                        <label class="ui-state-error"><?php echo form_error('email'); ?></label>
                    </div>
                    
                    <!-- pekerjaan -->
                    <!--<div id="pekerjaanDiv" class="formFieldSs <?php echo form_error('pekerjaan') !='' ? 'error':''; ?>">
                        <label>Pekerjaan</label>
                        <input type="text" name="pekerjaan" class="form-control" id="pekerjaan" placeholder="Pekerjaan" value="<?php echo set_value('pekerjaan'); ?>" > 
                        <label class="ui-state-error"><?php echo form_error('pekerjaan'); ?></label>
                    </div>-->
                    
                    <!-- username -->
                    <div id="usernameDiv" class="formFieldSs <?php echo form_error('username') !='' ? 'error':''; ?>">
                        <label>Username</label>
                        <input type="text" name="username" class="form-control" id="username" placeholder="Username" value="<?php echo set_value('username'); ?>" > 
                        <label class="ui-state-error"><?php echo form_error('username'); ?></label>
                    </div>
                    
                    <!-- password -->
                    <div class="formFieldSs <?php echo form_error('password') !='' ? 'error':''; ?>">
                        <label>Password</label>
                        <input type="password" name="password" class="form-control" id="password" placeholder="Password" value="" minlength="6" > 
                        <label class="ui-state-error"><?php echo form_error('password'); ?></label>
                    </div>
                    <div class="formFieldSs <?php echo form_error('repassword') !='' ? 'error':''; ?>">
                        <label>Input Ulang Password</label>
                        <input type="password" name="repassword" class="form-control" id="repassword" placeholder="Retype password" value="" minlength="6" > 
                        <label class="ui-state-error"><?php echo form_error('repassword'); ?></label>
                    </div>
                    
                    <div class="row"> 
                        <div class="col-xs-4">
                            <button type="submit" class="btn btn-default btn-block btn-flat">Register</button>
                        </div><!-- /.col -->
                    </div>
                </form>



            </div> 
        </section>
    </div>
</main>
<br><br><br>
<!-- Main Content Section -->