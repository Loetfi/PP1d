<h1>Detail Menu Content</h1>
<div class="row">
	<div class="col-md-12">
		<table class="table table-bordered table-striped">
			<tr>
				<td>title</td>
				<td>:</td>
				<td><?php echo $detailMenu['title']; ?></td>
			</tr>
			<tr>
				<td>menu</td>
				<td>:</td>
				<td><?php foreach($listLanguage as $row){ 
					echo $detailMenu['menu_detail_name_'.$row['language_id']].' ('.$row['language_name'].')<br>';
				} ?></td>
			</tr>
		</table>
		
		<table class="table table-bordered table-striped">
			<tr>
				<td>Position</td>
				<td>:</td>
				<td><?php echo $detail['position']; ?></td>
			</tr>
			<tr>
				<td>Status</td>
				<td>:</td>
				<td><?php echo $detail['status'] == '1' ? 'Active' : 'Non-Active'; ?></td>
			</tr>
		</table>
	</div>
</div>
<?php foreach($listContentDetail as $row){ ?>
<div class="col-md-6">
		
		<div class="panel panel-white">
			<div class="panel-heading border-light">
				<h4 class="panel-title"><?php echo $row['title']; ?> |<?php echo $row['subtitle']; ?>| <span class="text-bold"><?php echo $row['language_name']; ?></span></h4>
			</div>
			<div class="panel-body">
				<div class="form-group">
					<?php echo $row['content']; ?>
				</div>
				<div class="form-group">
					<?php if ($row['photo'] != ''){ ?>
					<img src="<?php echo base_url(); ?>uploads/contents/<?php echo $row['photo']; ?>" width="40%">
					<?php } ?>
					<?php if ($row['photo_litle'] != ''){ ?>
					<img src="<?php echo base_url(); ?>uploads/contents/<?php echo $row['photo_litle']; ?>" width="40%">
					<?php } ?>
				</div>
				
			</div>
		</div>
		
	</div>
<?php } ?>