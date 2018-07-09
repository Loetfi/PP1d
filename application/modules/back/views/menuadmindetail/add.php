 <legend><?php echo $title; ?></legend>

 <?php echo validation_errors(); ?>
 <!-- <form>   -->
 <form action="<?php echo site_url('back/menu_detail_admin/add/'); ?>" method="POST" role="form" enctype="multipart/form-data">

 	<div class="row">
 		<div class="col-sm-6">
 			<h1><?php echo @$title; ?></h1>


 			<div class="form-group">
 				<select name="id_menu">
 					<?php foreach ($data as $d) { ?>
 					<option value="<?php echo $d->id_menu; ?>"><?php echo $d->nama_menu; ?></option>
 					<?php } ?>
 				</select>
 			</div>
 
 			<div class="form-group">
 				<label for="">Nama Sub Menu Admin</label>
 				<input type="text" class="form-control" id="" placeholder="Nama menu admin" name="nama_menu_detail" value="<?php echo set_value('nama_menu_detail'); ?>">
 			</div> 


 			<div class="form-group">
 				<label for="">Link Menu</label>
 				<input type="text" class="form-control" id="" placeholder="Link Menu Detail" name="link_menu_detail" value="<?php echo set_value('link_menu_detail'); ?>">
 			</div> 

 			<div class="form-group">
 				<button class="btn btn-primary btn-sm"><i class="fa fa-plus"></i> Simpan</button>
 			</div>

 		</div>



 	</div>

 </form>