<style>.ui-state-error{padding: 0 10px;}</style>

<div class="page-title text-center">
    <h2 class="title"><?php echo @$title; ?></h2> 
    <h3 style="color: #fff;"><?php echo @$subtitle; ?></h3> 
</div>
<div class="breadcrumbs">
<?php echo $this->breadcrumbs->show(); ?>
</div>

<div class="container" style="padding-top: 10px; padding-bottom: 80px;">

<form action="<?php echo site_url('admin/unit/add'); ?>" method="POST" class="form-horizontal">
    <div class="form-group">
        <label class="col-sm-2 control-label" for="id_parent">Nama Parent Unit:</label>
        <div class="col-sm-10">
			<select name="id_parent" id="id_parent" class="form-control">
				<option value="">Tidak ada</option>
				<?php foreach($list_unit as $row){ ?>
				<option value="<?php echo $row['id_unit']; ?>"><?php echo $row['nama_unit']; ?></option>
				<?php } ?>
			</select>
			<div class="ui-state-error alert-mini alert-danger"><?php echo form_error('id_parent'); ?></div>
		</div>
	</div>
	
	<div class="form-group">
        <label class="col-sm-2 control-label" for="nama_unit">Nama Unit:</label>
        <div class="col-sm-10">
			<input type="text" name="nama_unit" value="<?php echo set_value('nama_unit'); ?>" placeholder="Nama Unit" id="nama_unit" class="form-control">
			<div class="ui-state-error alert-mini alert-danger"><?php echo form_error('nama_unit'); ?></div>
		</div>
	</div>
	
	<div class="form-group">
        <label class="col-sm-2 control-label" for="">Status</label>
		<div class="col-sm-10">
			<div class="input-group">
				<select name="status" class="form-control">
					<option value="1">Aktif</option>
					<option value="0">Non-Aktif</option>
				</select>
				<span class="input-group-btn">
					<button class="btn btn-o btn-primary" type="submit">
						Save
					</button>
				</span>
			</div>
		</div>
	</div>
    
</form>

</div>
