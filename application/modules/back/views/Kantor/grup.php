<?php if ($this->session->flashdata('itemFlashData') == 'insertSukses'){ ?>
<div class="alert alert-block alert-success fade in">
	<button data-dismiss="alert" class="close" type="button">x</button>
	<h4 class="alert-heading margin-bottom-10"><i class="ti-check"></i> Success!</h4>
</div>
<?php } ?>

<h5 class="over-title margin-bottom-15"><span class="text-bold">Master Group Office</span></h5> 

<div class="row">
	<div class="col-md-12">
		
		<?php echo anchor('back/kantor/grup_input', '<i class="fa fa-plus"></i> Add Group Kantor','class="btn btn-primary"') ;?>
		<br><br>
		<div class="table-responsive">
		<table id="table" class="display" cellspacing="0" width="100%">
			<thead>
				<tr>
					<th>No</th>
					<th>Nama Grup Kantor</th>
					<th>Created Date</th>
					<th>Created User</th>
					<th>Updated Date</th>
					<th>Updated User</th>
					<th>Status</th>
					<th>Action</th>
				</tr>
			</thead>
			<tbody>
				<?php $no = 0; foreach($listData as $row){ ?>
				<tr>
					<td><?php echo ++$no; ?></td>
					<td><?php echo $row['nama_grup']; ?></td>
					<td>create_date</td>
					<td>create_user</td>
					<td>update_date</td>
					<td>update_user</td>
					<td><?php 
						echo $row['status'] == 1 ? "<a class='btn btn-primary btn-xs disabled'> Aktif </a>" : "<a class='btn btn-default btn-xs disabled'> Tidak Aktif </a>"; 
					?></td>
					<td>  
						<div class="btn-group">
 							<?php echo anchor('back/kantor/grup_edit/'.$row['id'], '<i class="fa fa-pencil"></i> Edit','class="btn btn-primary btn-xs"') ;?>
 							<?php echo anchor('back/kantor/grup_delete/'.$row['id'], '<i class="fa fa-trash"></i> Hapus', 'data-confirm="Apakah kamu ingin menghapusnya ?" class="btn btn-danger btn-xs"'); ?>
 						</div>
					</td>
				</tr>
				<?php } ?>
			</tbody>
		</table>
		</div>
	</div>
</div>

<script type="text/javascript">
var table;
$(document).ready(function() {
	$('#table').DataTable();
	/*
	table = $('#table').DataTable({
		"processing": true, //Feature control the processing indicator.
        "serverSide": true, //Feature control DataTables' server-side processing mode.
        "order": [], //Initial no order.
		// Load data for the table's content from an Ajax source
        "ajax": {
            "url": "<?php echo site_url('back/menu/ambildata')?>",
            "type": "POST"
        },
		//Set column definition initialisation properties.
        "columnDefs": [{ 
            "targets": [ 0 ], //first column / numbering column
            "orderable": false, //set not orderable
        }],
	});
	*/
});
</script>
