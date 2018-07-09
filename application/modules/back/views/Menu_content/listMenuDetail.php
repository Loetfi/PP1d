<?php if ($this->session->flashdata('itemFlashData') == 'insertSukses'){ ?>
<div class="alert alert-block alert-success fade in">
	<button data-dismiss="alert" class="close" type="button">x</button>
	<h4 class="alert-heading margin-bottom-10"><i class="ti-check"></i> Success!</h4>
</div>
<?php } ?>

<h5 class="over-title margin-bottom-15"><span class="text-bold">Menu Content</span></h5> 

<div class="row">
	<div class="col-md-12">
		<div class="table-responsive">
		<table id="table" class="display" cellspacing="0" width="100%">
			<thead>
				<tr>
					<th>No</th>
					<th>Menu</th>
					<th>Submenu</th>
					<th>Title</th>
					<th>Position</th>
					<th>status</th>
					<th>countContent</th>
					<!-- th>create_date</th>
					<th>create_user</th>
					<th>update_date</th>
					<th>update_user</th -->
						<th>action</th>
					</tr>
				</thead>
				<tbody>
				<?php /* $no = 0; foreach($listData as $row){ ?>
				<tr>
					<td><?php echo ++$no; ?></td>
					<td><?php echo $row['menuName']; ?></td>
					<td><?php echo $row['menuDetailName']; ?></td>
					<td><?php echo $row['title']; ?></td>
					<td><?php echo $row['position']; ?></td>
					<td><?php echo $row['status']; ?></td>
					<td>
						<div class="btn-group">
 							<?php echo anchor('back/menu_detail/edit/'.$row['menu_detail_id'], '<i class="fa fa-pencil"></i> Edit','class="btn btn-primary"') ;?>
 							<?php echo anchor('back/menu_detail/delete/'.$row['menu_detail_id'], '<i class="fa fa-trash"></i> Hapus', 'data-confirm="Apakah kamu ingin menghapusnya ?" class="btn btn-danger"'); ?>
 						</div>
					</td>
				</tr>
				<?php } */ ?>
			</tbody>
		</table>
		</div>
	</div>
</div>
<script type="text/javascript">
	var table;
	$(document).ready(function() {
		table = $('#table').DataTable({
		"processing": true, //Feature control the processing indicator.
		"language": {
        "processing": "<img src='<?=base_url('assets/assets_backend/images/loading/default.gif')?>'/>" //add a loading image,simply putting <img src="loader.gif" /> tag.
    },
        "serverSide": true, //Feature control DataTables' server-side processing mode.
        "order": [], //Initial no order.
		// Load data for the table's content from an Ajax source
		"ajax": {
			"url": "<?php echo site_url('back/menu_content/ambildataMenuDetail')?>",
			"type": "POST"
		},
		//Set column definition initialisation properties.
		"columnDefs": [{ 
            "targets": [ 0 ], //first column / numbering column
            "orderable": false, //set not orderable
        }],
    });
	});
</script>
