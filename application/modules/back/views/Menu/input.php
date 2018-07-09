<?php if ($this->session->flashdata('itemFlashData') == 'insertGagal'){ ?>
<div class="alert alert-block alert-danger fade in">
	<button data-dismiss="alert" class="close" type="button">x</button>
	<h4 class="alert-heading margin-bottom-10"><i class="ti-close"></i> Error!</h4>
	<p><?php echo validation_errors(); ?></p>
</div>
<?php } ?>

<h1>Add Master Menu</h1> 

<div class="row">
	<?php echo form_open('back/menu/input'); ?>
	
	<?php foreach($listLanguage as $row){ ?>
	<div class="col-md-6">
		
		<div class="panel panel-white">
			<div class="panel-heading border-light">
				<h4 class="panel-title">Menu <span class="text-bold"><?php echo $row['language_name']; ?></span></h4>
			</div>
			<div class="panel-body">
				<div class="form-group">
					<label for="menu_name_<?php echo $row['language_id']; ?>">
						menu name <?php echo $row['language_name']; ?>
					</label>
					<input type="text" name="menu_name_<?php echo $row['language_id']; ?>" value="<?php echo set_value('menu_name_'.$row['language_id']); ?>" placeholder="menu name <?php echo $row['language_id']; ?>" id="menu_name_<?php echo $row['language_id']; ?>" class="form-control">
					<span class="help-block"><?php echo form_error('menu_name_'.$row['language_id']); ?></span>
					
				</div>
			</div>
		</div>
		
		
		
	</div>
	<?php } ?>
	
	<div class="col-md-12">
		<div class="form-group">
			<label for="position">
				position
			</label>
			<input type="text" name="position" 
				value="<?php echo set_value('position', isset($detail['position']) ? $detail['position'] : ''); ?>" 
				placeholder="position" 
				id="position" 
				class="form-control">
			<span class="help-block"><?php echo form_error('position'); ?></span>
		</div>
		
		<div class="form-group">
			<label for="form-field-mask-1">
				Status
			</label>
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
	<?php echo form_close(); ?>
</div>