 <legend><?php echo $title; ?></legend>

 <?php echo validation_errors(); ?>
 <!-- <form>   -->
 <form action="<?php echo site_url('back/menu_admin/add/'); ?>" method="POST" role="form" enctype="multipart/form-data">

 	<div class="row">
 		<div class="col-sm-6">
 			<h1><?php echo @$title; ?></h1>
 			<!-- Konten Indonesia --> 
 			<div class="form-group">
 				<label for="">Nama Menu Admin</label>
 				<input type="text" class="form-control" id="" placeholder="Nama menu admin" name="nama_menu" value="<?php echo set_value('nama_menu'); ?>">
 			</div> 

 			<div class="form-group">
 				<button class="btn btn-primary btn-sm"><i class="fa fa-plus"></i> Simpan</button>
 			</div>

 		</div>




 	</div>

 </form>