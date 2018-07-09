<?php include 'kepala.php'; ?>

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
                <form id="contact_form" class="form well-form" action="php/contact.php" method="post">
                    <h2>Registrasi </h2>   
                    <!-- nama -->
                    <div id="namaDiv" class="">
                        <label>Nama Lengkap</label>
                        <input type="text" name="nama" class="form-control" id="nama" placeholder="Nama Lengkap" value="" >
                        <label class="ui-state-error"></label>
                    </div> 
                    
                    <!-- identitas -->
                    <div id="identitasDiv" class="">
                        <label>Tipe Identitas</label>
                        <select name="type_identitas" class="form-control" id="type_identitas">
                            <option value="KTP">KTP</option>
                            <option value="SIM">SIM</option>
                            <option value="NPWP">NPWP</option>
                        </select> 
                        <label class="ui-state-error"></label>
                    </div>

                    <div class="">
                        <label>Nomor Identitas</label>
                        <input type="text" name="no_identitas" class="form-control" id="no_identitas" placeholder="No Identitas"  value="">
                    </div>
                    <br>
                    <!-- gambar identitas -->
                    <div class="form-group has-feedback">
                        <label>Gambar Identitas</label>
                        <input type="file" name="userfile" class="" placeholder="Foto Identitas" style="padding: 0; " >
                        <label class="ui-state-error"></label>
                    </div>
                    
                    <!-- alamat -->
                    <div id="alamatDiv" class="">
                        <label>Alamat</label>
                        <textarea name="alamat" class="form-control" id="alamat" placeholder="Alamat" ></textarea>
                        <label class="ui-state-error"></label>
                    </div>

                    <!-- tlp -->
                    <div id="tlpDiv" class="">
                        <label>No HP / Telp</label>
                        <input type="text" name="tlp" class="form-control" id="tlp" placeholder="TLP/HP hanya angka" value="" pattern="[0-9]+" > 
                        <label class="ui-state-error"></label>
                    </div>
                    
                    <!-- email -->
                    <div id="emailDiv" class="">
                        <label>Email</label>
                        <input type="email" name="email" class="form-control" id="email" placeholder="Email" value="" > 
                        <label class="ui-state-error"></label>
                    </div>
                    
                    <!-- pekerjaan -->
                    <div id="pekerjaanDiv" class="">
                        <label>Pekerjaan</label>
                        <input type="text" name="pekerjaan" class="form-control" id="pekerjaan" placeholder="Pekerjaan" value="" > 
                        <label class="ui-state-error"></label>
                    </div> 
                    
                    <!-- username -->
                    <div id="usernameDiv" class="">
                        <label>Username</label>
                        <input type="text" name="username" class="form-control" id="username" placeholder="Username" value="" > 
                        <label class="ui-state-error"></label>
                    </div>
                    
                    <!-- password -->
                    <div class="">
                        <label>Password</label>
                        <input type="password" name="password" class="form-control" id="password" placeholder="Password" value="" minlength="6" > 
                        <label class="ui-state-error"></label>
                    </div>
                    <div class="">
                        <label>Input Ulang Password</label>
                        <input type="password" name="repassword" class="form-control" id="repassword" placeholder="Retype password" value="" minlength="6" > 
                        <label class="ui-state-error"></label>
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

<?php include 'footer.php'; ?>