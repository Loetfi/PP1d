 <div class="row">

 	<div class="col-md-12">
 		<h5 class="over-title margin-bottom-15"><span class="text-bold"><?php echo @$jenis; ?></span></h5> 

 		<?php echo $this->session->flashdata('message'); ?>
 		<div class="alert alert-info"> 
 			<strong>Selamat Datang </strong>
 		</div>

 		<!-- Maindisini -->  

 		<div style="float:right">  
 			<form class="form-inline" action="<?php echo site_url('back/auth/search/'); ?>" method="GET">
 				<div class="form-group"> 
 					<div class="input-group"> 
 						<input type="text" class="form-control" name="q" placeholder="Pencarian.."> 
 					</div>
 				</div>
 				<button type="submit" class="btn btn-primary">Cari</button>
 			</form> 
 		</div>


 		<div class="alert alert-warning">
 			<p>Hasil Pencarian dari <b><?php echo isset($_GET['q']); ?></b></p>
 		</div>


 		<a href="<?php echo site_url('back/auth/create_user/'); ?>" class="btn btn-primary"><i class="fa fa-plus"></i> Tambah</a>
 		<br><br>	 

 		<table class="table table-bordered"> 
 			<tr>
 				<th>Username</th>
 				<th>Nama Lengkap</th>
 				<th><?php echo lang('index_email_th');?></th> 
 				<th><?php echo lang('index_status_th');?></th>
 				<th><?php echo lang('index_action_th');?></th>
 			</tr>
 			<?php foreach ($users as $user):?>
 				<tr>
 					<td><?php echo $user->username; ?></td>
 					<td><?php echo anchor('user/'.$user->username,htmlspecialchars($user->first_name,ENT_QUOTES,'UTF-8').' '.htmlspecialchars($user->last_name,ENT_QUOTES,'UTF-8'));?></td>
 					<td><?php echo htmlspecialchars($user->email,ENT_QUOTES,'UTF-8');?></td>
 					<td><?php echo ($user->active) ? anchor("back/auth/deactivate/".$user->id, lang('index_active_link'),'btn btn-primary','icon-ok-sign') : anchor("auth/activate/". $user->id, lang('index_inactive_link'),'class="btn btn-warning"');?></td>
 					<td> 
 					<div class="btn-group">

 							<?php echo anchor("back/auth/edit_user/".$user->id, '<i class="fa fa-pencil"></i> Edit','class="btn btn-primary"') ;?> 
 							<a href="<?php echo site_url('back/auth/delete_user/'.$user->id); ?>" onclick="return confirm('Are you sure you want to delete this item?');" class="btn btn-danger"> <i class="fa fa-trash"></i> Hapus </a> 
 					</div>
 					</td>
 				</tr>
 			<?php endforeach;?>
 		</table> 

 	</div>
 </div>
