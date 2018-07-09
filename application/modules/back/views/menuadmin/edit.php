 <legend><?php echo $title; ?></legend>

 <?php echo validation_errors(); ?>
 <!-- <form>   -->
 <form action="<?php echo site_url('back/menu_admin/edit/'.$id); ?>" method="POST" role="form" enctype="multipart/form-data">
  
 	<div class="row">
 		<div class="col-sm-6">
 			<h1><?php echo @$title; ?></h1>
 			<!-- Konten Indonesia --> 
 			<div class="form-group">
 				<label for="">Nama Menu Admin</label>
 				<input type="text" class="form-control" id="" placeholder="Nama menu admin" name="nama_menu" value="<?php   echo set_value('nama_menu',isset($data->nama_menu) ? $data->nama_menu : ''); ?>">
 			</div> 


 			<div class="form-group">
 				<select name="id_website">
 					<option value="">All Website</option>
 					<?php foreach ($setting as $set) { ?>
 					<option value="<?php echo $set->id_website; ?>" <?php echo $data->id_website == $set->id_website ? 'selected=""' : ''; ?> ><?php echo $set->namaweb; ?></option>
 					<?php } ?>
 				</select>
 			</div>

 			<div class="form-group">
 				<button class="btn btn-primary btn-sm"><i class="fa fa-pencil"></i> Ubah</button>
 			</div>

 		</div>




 	</div>

 </form>