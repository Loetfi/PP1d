<?php if ($this->session->flashdata('itemFlashData') == 'insertSukses'){ ?>
<div class="alert alert-block alert-success fade in">
	<button data-dismiss="alert" class="close" type="button">x</button>
	<h4 class="alert-heading margin-bottom-10"><i class="ti-check"></i> Success!</h4>
</div>
<?php } ?>

<h5 class="over-title margin-bottom-15"><span class="text-bold">Master Content Menu </span></h5> 


<div class="row">
	<div class="col-md-12">
		<table class="table table-bordered">
			<tr>
				<th>title</th>
				<td>:</td>
				<td><?php echo $detailMenu['title']; ?></td>
			</tr>
			<tr>
				<th>menu</th>
				<td>:</td>
				<td><?php foreach($listLanguage as $row){ 
					echo $detailMenu['menu_detail_name_'.$row['language_id']].' ('.$row['language_name'].')<br>';
				} ?></td>
			</tr>
		</table>
	</div>
<div style="float:right">
	<a href="<?php echo site_url('back/menu_content'); ?>" class="btn btn-primary"><i class="fa fa-chevron-left"></i> Back</a>
</div>
	<div class="col-md-12">
		<?php echo anchor('back/menu_content/input/'.$detailMenu['menu_detail_id'], '<i class="fa fa-plus"></i> Add Menu Content','class="btn btn-primary"') ;?>
		<br><br>
		<div class="table-responsive">
			<table id="table" class="display" cellspacing="0" width="100%">
				<thead>
					<tr>
						<th>No</th>
						<th>title</th>
						<th>position</th>
						<th>photo</th>
						<th>status</th>
						<th>action</th>
					</tr>
				</thead>
				<tbody>
					<?php /* $no = 0; foreach($listData as $row){ ?>
					<tr>
						<td><?php echo ++$no; ?></td>
						<td><?php echo $row['title']; ?></td>
						<td><?php echo $row['position']; ?></td>
						<td><?php echo $row['status']; ?></td>
						<td>
							<div class="btn-group">
								<?php echo anchor('back/menu_content/detail/'.$row['content_id'], '<i class="fa fa-pencil"></i> Detail','class="btn btn-success"') ;?>
								<?php echo anchor('back/menu_content/edit/'.$row['content_id'], '<i class="fa fa-pencil"></i> Edit','class="btn btn-primary"') ;?>
								<?php echo anchor('back/menu_content/delete/'.$row['content_id'], '<i class="fa fa-trash"></i> Hapus', 'data-confirm="Apakah kamu ingin menghapusnya ?" class="btn btn-danger"'); ?>
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
        "serverSide": true, //Feature control DataTables' server-side processing mode.
        "order": [], //Initial no order.
		// Load data for the table's content from an Ajax source
        "ajax": {
            "url": "<?php echo site_url('back/menu_content/ambildata/'.$detailMenu['menu_detail_id'])?>",
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
