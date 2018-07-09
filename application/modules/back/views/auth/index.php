 
<?php echo $this->session->flashdata('message'); ?> 
<?php echo $this->session->flashdata('pesan'); ?> 

<a href="<?php echo site_url('back/auth/create_user/'); ?>" class="btn btn-primary"><i class="fa fa-plus"></i> Tambah</a>
<br><br>	  
 


<table id="table" class="display" cellspacing="0" width="100%">
	<thead>
		<tr> 
			<th>email</th> 
			<th>username</th> 
			<th>status</th>
			<th>name</th>
			<th>description</th> 
			<th>Action </th>
		</tr>
	</thead>
	<tbody>
	</tbody>

	<tfoot>
		<tr> 
			<th>email</th> 
			<th>username</th> 
			<th>status</th>
			<th>name</th>
			<th>description</th> 
			<th>Action </th>
		</tr>
	</tfoot>
</table>
</div>




<script type="text/javascript">

	var table;

	$(document).ready(function() {

    //datatables
    table = $('#table').DataTable({ 

        "processing": true, //Feature control the processing indicator.
        "serverSide": true, //Feature control DataTables' server-side processing mode.
        "language": {
        "processing": "<img src='<?=base_url('assets/assets_backend/images/loading/default.gif')?>'/>" //add a loading image,simply putting <img src="loader.gif" /> tag.
        },
        
        "order": [], //Initial no order.

        // Load data for the table's content from an Ajax source
        "ajax": {
        	"url": "<?php echo site_url('back/auth/ambildata')?>",
        	"type": "POST"
        },

        //Set column definition initialisation properties.
        "columnDefs": [
        { 
            "targets": [ 0 ], //first column / numbering column
            "orderable": false, //set not orderable
        },
        ],

    });

});
</script>

</body>
</html>

 

 		<!-- <table class="table table-bordered"> 
 			<tr>
 				<th>Username</th>
 				<th>Nama Lengkap</th>
 				<th><?php echo lang('index_email_th');?></th>
 				<th><?php echo lang('index_groups_th');?></th>
 				<th><?php echo lang('index_status_th');?></th>
 				<th><?php echo lang('index_action_th');?></th>
 			</tr>
 			<?php foreach ($users as $user):?>
 				<tr>
 					<td><?php echo $user->username; ?></td>
 					<td><?php echo anchor('user/'.$user->username,htmlspecialchars($user->first_name,ENT_QUOTES,'UTF-8').' '.htmlspecialchars($user->last_name,ENT_QUOTES,'UTF-8'));?></td>
 					<td><?php echo htmlspecialchars($user->email,ENT_QUOTES,'UTF-8');?></td>
 					<td>
 						<?php foreach ($user->groups as $group):?>
 							<?php echo anchor("back/auth/edit_group/".$group->id, htmlspecialchars($group->name,ENT_QUOTES,'UTF-8'),'btn','icon-group',$group->description) ;?><br />
 						<?php endforeach?>
 					</td>
 					<td><?php echo ($user->active) ? anchor("back/auth/deactivate/".$user->id, lang('index_active_link'),'btn btn-primary','icon-ok-sign') : anchor("auth/activate/". $user->id, lang('index_inactive_link'),'class="btn btn-warning"');?></td>
 					<td>


 						<div class="btn-group">

 							<?php echo anchor("back/auth/edit_user/".$user->id, '<i class="fa fa-pencil"></i> Edit','class="btn btn-primary"') ;?> 
 							<a href="<?php echo site_url('back/auth/delete_user/'.$user->id); ?>" onclick="return confirm('Are you sure you want to delete this item?');" class="btn btn-danger"> <i class="fa fa-trash"></i> Hapus </a> 
 						</div>
 					</td>
 				</tr>
 			<?php endforeach;?>
 		</table> --> 