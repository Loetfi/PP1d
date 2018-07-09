<!-- CSS DATATABLES -->
<link href="<?php echo base_url('assets/front'); ?>/css/layout-datatables.css" rel="stylesheet" type="text/css" />
<!-- JS DATATABLES -->
<script type="text/javascript" src="<?php echo base_url('assets/front'); ?>/plugins/datatables/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="<?php echo base_url('assets/front'); ?>/plugins/datatables/dataTables.bootstrap.js"></script>
<script type="text/javascript" src="<?php echo base_url('assets/front'); ?>/plugins/select2/js/select2.full.min.js"></script>

<script type="text/javascript"> $(function(){ $('#thisDataTable').dataTable(); }) </script>

<div class="page-title text-center">
    <h2 class="title"><?php echo @$title; ?></h2> 
</div>
<div class="breadcrumbs">
<?php echo $this->breadcrumbs->show(); ?>
</div>

<div class="container" style="padding-top: 10px; padding-bottom: 80px; min-height: 500px;">

<?php echo anchor('admin/unit/add', '<i class="fa fa-plus"></i> Add Unit','class="btn btn-default btn-sm"') ;?>
<br><br>

<div class="table-responsive">
<table class="table table-bordered table-striped table-hover"id="thisDataTable">
	<thead>
		<tr>
			<th>No</th>
			<th>Nama Unit</th>
			<th>Status</th>
			<th>Aksi</th>
		</tr>
	</thead>
	<tbody>
	<?php $no=0; foreach($list_unit as $row){ ?>
		<tr>
			<td><?php echo ++$no; ?></td>
			<td><?php echo $row['nama_unit']; ?></td>
			<td><?php echo $row['status']='1'?"<a class='btn btn-default btn-sm disabled'> Aktif </a>":"<a class='btn btn-default btn-sm disabled'> Tidak Aktif </a>"; ?></td>
			<td><a href="<?php echo site_url('admin/unit/edit/'.$row['id_unit']); ?>" class="btn btn-default btn-sm thisForRead"><i class="fa fa-pencil"></i> Edit </a></td>
		</tr>
	<?php } ?>
	</tbody>
</table>
</div>
</div> 
