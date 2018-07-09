<style>.ui-state-error{padding: 0 10px;}</style>
<div class="page-title text-center">
    <h2 class="title"><?php echo @$title; ?></h2> 
    <h3 style="color: #fff;"><?php echo @$subtitle; ?></h3> 
</div>
<div class="breadcrumbs">
<?php echo $this->breadcrumbs->show(); ?>
</div>

<div class="container" style="padding-top: 10px; padding-bottom: 80px;">

<form action="<?php echo site_url('admin/pengguna/add'); ?>" method="POST" class="form-horizontal">
	
	<div class="form-group">
        <label class="col-sm-2 control-label" for="Role">Role:</label>
        <div class="col-sm-10">
			<select name="role" id="role" class="form-control">
				<option value="pemohon" <?php echo set_select('role', 'pemohon', False); ?>>pemohon</option>
				<option value="admin" <?php echo set_select('role', 'admin', False); ?>>admin</option>
				<option value="unit" <?php echo set_select('role', 'unit', False); ?>>unit</option>
			</select>
			<div class="ui-state-error alert-mini alert-danger"><?php echo form_error('role'); ?></div>
		</div>
	</div>
	
	<div class="form-group this_unit">
        <label class="col-sm-2 control-label" for="id_unit">Nama Unit:</label>
        <div class="col-sm-10">
			<select name="id_unit" id="id_unit" class="form-control">
				<option value="">Pilih Unit</option>
				<?php
				$nilai = $this->Unit_model->list_unit_all();
				$head = @$nilai['head'];
				$child = @$nilai['child'];
				for($i=0; $i<count($head); $i++){
					echo '<optgroup label="'.$head[$i]['nama_unit'].'">';
					if (count(@$child[$i]) > 0){
						for($j=0; $j<count($child[$i]); $j++){
							echo '<option value="'.$child[$i][$j]['id_unit'].'" '.set_select('id_unit', $child[$i][$j]['id_unit'], False).'>'.$child[$i][$j]['nama_unit'].'</option>';
						}
					} else{
						echo '<option value="'.$head[$i]['id_unit'].'" '.set_select('id_unit', $head[$i]['id_unit'], False).'>'.$head[$i]['nama_unit'].'</option>';
					}
					echo '</optgroup>';
				}
				?>
			</select>
			<div class="ui-state-error alert-mini alert-danger"><?php echo form_error('id_unit'); ?></div>
		</div>
	</div>
	
	<div class="form-group">
        <label class="col-sm-2 control-label" for="username">username:</label>
        <div class="col-sm-10">
			<input type="text" name="username" value="<?php echo set_value('username'); ?>" placeholder="username" id="username" class="form-control">
			<div class="ui-state-error alert-mini alert-danger"><?php echo form_error('username'); ?></div>
		</div>
	</div>
	
	<div class="form-group">
        <label class="col-sm-2 control-label" for="password">password:</label>
        <div class="col-sm-10">
			<input type="password" name="password" placeholder="password" id="password" class="form-control">
			<div class="ui-state-error alert-mini alert-danger"><?php echo form_error('password'); ?></div>
		</div>
	</div>
	
	<div class="form-group">
        <label class="col-sm-2 control-label" for="repassword">repassword:</label>
        <div class="col-sm-10">
			<input type="password" name="repassword" placeholder="repassword" id="repassword" class="form-control">
			<div class="ui-state-error alert-mini alert-danger"><?php echo form_error('repassword'); ?></div>
		</div>
	</div>
	
	<div class="form-group">
        <label class="col-sm-2 control-label" for="nama">nama:</label>
        <div class="col-sm-10">
			<input type="text" name="nama" value="<?php echo set_value('nama'); ?>" placeholder="nama" id="nama" class="form-control">
			<div class="ui-state-error alert-mini alert-danger"><?php echo form_error('nama'); ?></div>
		</div>
	</div>
	
	<div class="form-group">
        <label class="col-sm-2 control-label" for="email">email:</label>
        <div class="col-sm-10">
			<input type="text" name="email" value="<?php echo set_value('email'); ?>" placeholder="email" id="email" class="form-control">
			<div class="ui-state-error alert-mini alert-danger"><?php echo form_error('email'); ?></div>
		</div>
	</div>
	
	<div class="form-group">
        <label class="col-sm-2 control-label" for="">Status:</label>
        <div class="col-sm-10">
			<div class="input-group">
				<select name="status" class="form-control">
					<option value="Pending">Pending</option>
					<option value="Aktif">Aktif</option>
					<option value="Reject">Reject</option>
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

<script>
$('#role').change(function(){
    $('.this_unit').css('display', 'none');
    thisVal = $(this).val();
    $('.this_'+thisVal).css('display', 'block');
});
$('#role').change();
</script>