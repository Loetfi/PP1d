<?php if ($this->session->flashdata('itemFlashData') == 'insertGagal'){ ?>
<div class="alert alert-block alert-danger fade in">
	<button data-dismiss="alert" class="close" type="button">x</button>
	<h4 class="alert-heading margin-bottom-10"><i class="ti-close"></i> Error!</h4>
	<p><?php echo validation_errors(); ?></p>
</div>
<?php } ?>

<h1>Add Group Office</h1> 

<div class="row">
	<?php echo form_open('back/kantor/grup_input'); ?>
	
	<div class="col-md-12">
		<div class="form-group">
			<label for="nama_grup">
				Group Office Name
			</label>
			<input type="text" name="nama_grup" 
				value="<?php echo set_value('nama_grup', isset($detail['nama_grup']) ? $detail['nama_grup'] : ''); ?>" 
				placeholder="nama grup" 
				id="nama_grup" 
				class="form-control">
			<span class="help-block"><?php echo form_error('nama_grup'); ?></span>
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