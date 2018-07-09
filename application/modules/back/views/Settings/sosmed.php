 <div>
 	
 	<?php echo $this->session->flashdata('pesan'); ?>

 	<form action="<?php echo site_url('back/setting/proses_sosmed/'); ?>" method="POST" role="form">

 		<legend>Sosial Media Link Icon</legend>

 		<div class="form-group">
 			<label for="">Linked In</label>

 			<div class="input-group">
 				<div class="input-group-addon">https://www.linkedin.com/company/</div>
 				<input type="text" class="form-control" id="exampleInputAmount" placeholder="Nomor Akun" value="<?php echo $in->sosmed_in; ?>" name="sosmed_in"> 
 			</div> 


 		</div>
 

 		<div class="form-group">
 			<label for="">Facebook</label>
 			<div class="input-group">
 				<div class="input-group-addon">https://facebook.com/</div>
 				<input type="text" class="form-control" id="exampleInputAmount" placeholder="Username Akun" value="<?php echo $fb->sosmed_fb; ?>" name="sosmed_fb"> 
 			</div> 
 		</div>

 		<div class="form-group">
 			<label for="">Twitter</label> 
 			
 			<div class="input-group">
 				<div class="input-group-addon">https://twitter.com/</div>
 				<input type="text" class="form-control" id="exampleInputAmount" placeholder="Username Akun" value="<?php echo $twitter->sosmed_twitter; ?>" name="sosmed_twitter"> 
 			</div> 

 		</div>

 		<div class="form-group">
 			<label for="">Google</label>
 			
 			<div class="input-group">
 				<div class="input-group-addon">https://plus.google.com/</div>
 				<input type="text" class="form-control" id="exampleInputAmount" placeholder="Nomor Akun" value="<?php echo $google->sosmed_google; ?>" name="sosmed_google"> 
 			</div> 
 

  		</div>


  		<div class="alert alert-warning ">
  			<strong>Keterangan</strong>
  			<p>Isi 0 jika sosmed belum ada.</p>
  		</div>

  		<br><br><br>
 		<button type="submit" class="btn btn-primary">Submit</button>
 	</form>


 </div>