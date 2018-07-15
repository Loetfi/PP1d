<?php if (!$this->session->userdata('ses_ppid_user_status')) { ?>
<form id="contact_form" class="form well-form" id="loginAdmin" class="sky-form" method="post" action="#" autocomplete="off">
	<center>
	<h2>Login<br>Pemohon Informasi </h2>
	</center>
	<!-- Text input-->
	<div class="form-group">
		<input name="name" id="Username" placeholder="Username" class="form-control" type="text" required title="Please enter your full name">
	</div>
	<!-- Email input-->
	<div class="form-group">
		<input name="email" id="Password" placeholder="Password" class="form-control" type="password" required title="Masukan Password" data-msg-email="Ouch, that doesn't look like an email">
	</div> 
	<!-- Button -->
	<button type="submit" class="btn btn-block btn-default" id="js-contact-btn"> Login </button>
	<div id="js-contact-result" data-success-msg="Form submitted successfully." data-error-msg="Oops. Something went wrong."></div>
	<div><br><a href="#">Tata Cara Permohonan</a></div>
	

	<div><br><p>Belum memiliki akun ? <a href="<?php echo site_url('auth/register/'); ?>" class="btn btn-default btn-sm"> Daftar </a></p></div>

</form>
<script type="text/javascript">
function sukses(url) {
    window.location = url;
}
$(function () {
    $("#contact_form").submit(function(){
        username = $('#Username').val();
        password = $('#Password').val();
        
        $.ajax({
            type: 'POST',
            dataType: 'json',
            url: '<?php echo site_url('auth/loginAct'); ?>',
            data: {
                username: username,
                password: password,
            },
            beforeSend: function() {
                $('.overlay .fa').addClass('fa-spin');
                $('.overlay').css('display', 'block');
            },
            success: function(data) {
                // console.log(data);
                // return false;
                
                if (data.loginStatus == "sukses") {
                    // console.log(data);
                    $('.overlay .fa').removeClass('fa-refresh');
                    $('.overlay .fa').removeClass('fa-spin');
                    $('.overlay .fa').removeClass('fa-close');
                    $('.overlay .fa').addClass('fa-check');
                    setTimeout('sukses("'+data.redirect+'")', 500);
                }
                else if (data.loginStatus == "nonAktif"){
                    $('#notif').html(data.pesan);
                    $('#notif').css('display', 'block');
                    alert('Username atau Password masih belum aktif. Silahkan cek email Anda');
                    $('.overlay .fa').removeClass('fa-refresh');
                    $('.overlay .fa').removeClass('fa-spin');
                    $('.overlay .fa').removeClass('fa-check');
                    $('.overlay .fa').addClass('fa-close');
                    setTimeout(function(){
                        $('.overlay .fa').removeClass('fa-check');
                        $('.overlay .fa').removeClass('fa-close');
                        $('.overlay .fa').addClass('fa-spin');
                        $('.overlay .fa').addClass('fa-refresh');
                        $('.overlay').css('display', 'none');
                    }, 1500);
                }
                else {
                    $('#notif').html(data.pesan);
                    $('#notif').css('display', 'block');
                    alert('Username atau Password salah');
                    $('.overlay .fa').removeClass('fa-refresh');
                    $('.overlay .fa').removeClass('fa-spin');
                    $('.overlay .fa').removeClass('fa-check');
                    $('.overlay .fa').addClass('fa-close');
                    setTimeout(function(){
                        $('.overlay .fa').removeClass('fa-check');
                        $('.overlay .fa').removeClass('fa-close');
                        $('.overlay .fa').addClass('fa-spin');
                        $('.overlay .fa').addClass('fa-refresh');
                        $('.overlay').css('display', 'none');
                    }, 1500);
                    // alert('gagal');
                }
            },
            error: function() {
                alert('Some Error. Please Try Again');
                $('.overlay .fa').removeClass('fa-check');
                        $('.overlay .fa').removeClass('fa-close');
                        $('.overlay .fa').addClass('fa-spin');
                        $('.overlay .fa').addClass('fa-refresh');
                        $('.overlay').css('display', 'none');
            }
        });
        return false;
        
    });
});
</script>
<?php } else { 
	$userId = $this->session->userdata('ses_ppid_user_id');
	// print_r($this->session->userdata());
	// $detail = @$this->User_account_model->detailPengguna($userId); ses_ppid_user_foto
	?>
	<center>
		<h2>Selamat Datang, <?php echo strtoupper(@$this->session->userdata('ses_ppid_user_level')); ?></h2>
		<?php if ($this->session->userdata('ses_ppid_user_foto') != '') { ?>
			<img src="<?php echo base_url('uploads/profil/'.$this->session->userdata('ses_ppid_user_foto')); ?>" style="max-height: 200px; max-width: 200px;" alt="myImg" ><br>
		<?php } else { ?>
			<img src="<?php echo base_url('resources/myResources/img/no_img.jpg'); ?>" style="max-height: 200px; max-width: 200px;" alt="no img"><br>
		<?php } ?>
		<h3><?php echo ucwords(strtolower(@$this->session->userdata('ses_ppid_user_nama'))); ?></h3>
		
		<a href="<?php echo site_url('profil'); ?>" class="btn btn-info btn-sm">Profil</a>
		<a href="<?php echo site_url('auth/clearSession'); ?>" class="btn btn-danger btn-sm">Logout</a>
	</center>

<?php } ?>