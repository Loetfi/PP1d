<?php if ($this->session->flashdata('itemFlashData') == 'insertGagal'){ ?>
<div class="alert alert-block alert-danger fade in">
	<button data-dismiss="alert" class="close" type="button">x</button>
	<h4 class="alert-heading margin-bottom-10"><i class="ti-close"></i> Error!</h4>
	<p><?php echo validation_errors(); ?></p>
</div>
<?php } ?>

<h5 class="over-title margin-bottom-15"><span class="text-bold">Edit Master Language</span></h5> 

<div class="row">
	<div class="col-md-12">
		<?php echo form_open('back/language/edit/'.$detail['language_id']); ?>
		<input type="hidden" name="language_id" value="<?php echo $detail['language_id']; ?>">
		<div class="form-group">
			<label class="col-sm-2 control-label" for="language_name">
				Language Name
			</label>
			<div class="col-sm-10">
				<input type="text" name="language_name" value="<?php echo set_value('language_name', isset($detail['language_name']) ? $detail['language_name'] : ''); ?>" placeholder="language name" id="language_name" class="form-control">
				<span class="help-block"><?php echo form_error('language_name'); ?></span>
			</div>
		</div>
		<div class="form-group">
			<div class="col-sm-offset-2 col-sm-10">
				<div class="checkbox ck check-primary">
					<input id="status" value="1" type="checkbox" name="status" <?php echo $detail['status'] == '1' ? 'checked' : ''; ?>>
					<label for="checkbox2">
						status
					</label>
				</div>
			</div>
		</div>
		
		<div class="form-group margin-bottom-0">
			<div class="col-sm-offset-2 col-sm-10">
				<button class="btn btn-o btn-primary" type="submit">
					Save
				</button>
			</div>
		</div>
	
		<?php echo form_close(); ?>
	</div>
</div>