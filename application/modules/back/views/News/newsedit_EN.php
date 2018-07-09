 <legend><?php echo $title; ?></legend>

 <?php echo validation_errors(); ?>

  
 <form action="<?php echo site_url('back/news/proses/'); ?>" method="POST" role="form" enctype="multipart/form-data">

 	<div class="row">
 		<div class="col-sm-12">

 			<div role="tabpanel">
 				<!-- Nav tabs -->
 				<ul class="nav nav-tabs" role="tablist">
 					<li role="presentation"> 
 						<a href="<?php echo site_url('back/news/edit/'.$id); ?>"><h1>ID</h1></a>
 					</li>
 					<li role="presentation">
 						<a href="<?php echo site_url('back/news/edit/'.$id.'/EN'); ?>"><h1>EN</h1></a>
 					</li>
 				</ul>

 			</div>

 			<br><br>
 			<div class="alert alert-warning">
 				Anda sedang berada di menu <strong>Edit <?php echo @$bhs; ?></strong>
 			</div>

 			<!-- Konten Indonesia --> 
 			<div class="form-group">
 				<label for="">Judul Berita</label>
 				<input type="text" class="form-control" id="" placeholder="Judul Berita" name="judulberita" value="<?php echo $edit->title; ?>">
 			</div>

 			<div class="form-group">
 				<label for="">Konten</label>
 				<textarea class="ckeditor" cols="80" id="editor1" name="isiberita" rows="10" > <?php echo $edit->content; ?> </textarea> 
 			</div>

 			<div class="form-group">

 				<!-- Urusan Gambar Menggambar -->
 				<?php if (isset($edit->gambar)) {  ?>
 				<div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
 					<a href="#" class="thumbnail">
 						<img src="<?php echo base_url('uploads/news/'.$edit->gambar); ?>" alt="">
 					</a>
 				</div>
 				<?php 
 			} else { echo "<div class='alert alert-warning'> Gambar Belum Ada </div>"; } ?>
 			<!-- End Gambar -->

 			<label for="">Images</label><br>
 			<input type="file" name="filefoto">
 		</div> 

 		<br><br><br><br>

 		<div class="form-group">
 			<label for="">Status</label><br>
 			<input type="radio" name="status" checked="" value="1"> Publish
 			<input type="radio" name="status" value="0"> Draft 
 		</div> 

 		<div class="form-group">
 			<label for="">Kategori</label><br>

 			<!--  --> 

 			<select name="kategori">
 				<?php foreach ($cat as $c) { ?>
 				<option value="<?php echo $c->category_id; ?>"><?php echo $c->category_name; ?></option>
 				<?php } ?>
 			</select>
 			<!--  -->

 		</div>


 		<div class="alert alert-info">
 			<strong>Perhatian</strong>, pastikan gambar sudah dipilih.
 		</div>

 		<!-- end -->
 	</div>
 	<!-- End konten bahasa indonesia --> 

 </div>

 <button type="submit" class="btn btn-primary">Submit</button>
 <!--  -->
</form>  <!-- End Form -->


</div>
</div> 