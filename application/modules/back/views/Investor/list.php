<?php if ($this->session->flashdata('itemFlashData') == 'insertSukses'){ ?>
<div class="alert alert-block alert-success fade in">
	<button data-dismiss="alert" class="close" type="button">x</button>
	<h4 class="alert-heading margin-bottom-10"><i class="ti-check"></i> Success!</h4>
</div>
<?php } ?>

<h5 class="over-title margin-bottom-15"><span class="text-bold">Master Menu</span></h5> 

<div class="row">
	<div class="col-md-12">
		
		<?php echo anchor('back/investor/input', '<i class="fa fa-plus"></i> Add Investor Report','class="btn btn-primary"') ;?>
		<?php echo anchor('back/investor/dashboard', '<i class="fa fa-eye"></i> View Investor Report','class="btn btn-default "') ;?>
		<br><br>
		<div class="table-responsive">
		<table id="table" class="display" cellspacing="0" width="100%">
			<thead>
				<tr>
					<th>No</th>
					<th>Tahun</th>
					<th>Action</th>
				</tr>
			</thead>
			<tbody>
				<?php $no = 0; foreach($listData as $row){ ?>
				<tr>
					<td><?php echo ++$no; ?></td>
					<td><?php echo $row['tahun']; ?></td>
					<td>
						<div class="btn-group">
 							<?php echo anchor('back/investor/edit/'.$row['tahun'], '<i class="fa fa-pencil"></i> Edit','class="btn btn-primary"') ;?>
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
$(document).ready(function() {
	$('#table').DataTable();
});
</script>