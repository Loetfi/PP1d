<?php if ($this->session->flashdata('itemFlashData') == 'insertGagal'){ ?>
<div class="alert alert-block alert-danger fade in">
	<button data-dismiss="alert" class="close" type="button">x</button>
	<h4 class="alert-heading margin-bottom-10"><i class="ti-close"></i> Error!</h4>
	<p><?php echo validation_errors(); ?></p>
</div>
<?php } ?>

<h1>Add Master Submenu</h1> 

<div class="row">
	<?php echo form_open('back/menu_detail/input'); ?>
	<div class="col-md-12">
		<div class="form-group">
			<label for="menu_id">
				Select Menu
			</label>
			<select name="menu_id" id="menu_id" class="form-control">
				<option value="">-Select Menu-</option>
				<?php foreach($listMenu as $row){ ?>
				<option value="<?php echo $row['menu_id']; ?>"><?php echo str_replace(';<br>', '|', $row['menuName']); ?></option>
				<?php } ?>
			</select>
			<span class="help-block"><?php echo form_error('menu_id'); ?></span>
		</div>
		
		<div class="form-group">
			<label for="title">
				Title
			</label>
			<input type="text" name="title" 
				value="<?php echo set_value('title'); ?>" 
				placeholder="title" 
				id="Title" 
				class="form-control">
			<span class="help-block"><?php echo form_error('title'); ?></span>
			
		</div>
		
		<div class="form-group">
			<label for="slug">URL</label>
			<input type="text" name="slug" value="<?php echo set_value('slug'); ?>" placeholder="URL" id="slug" class="form-control">
			<span class="help-block"><?php echo form_error('slug'); ?></span>
		</div>
		
		<div class="form-group">
			<label for="position">
				Position
			</label>
			<input type="text" name="position" 
				value="<?php echo set_value('position'); ?>" 
				placeholder="position" 
				id="Position" 
				class="form-control">
			<span class="help-block"><?php echo form_error('position'); ?></span>
			
		</div>
	</div>
	
	<?php foreach($listLanguage as $row){ ?>
	<div class="col-md-6">
		
		<div class="panel panel-white">
			<div class="panel-heading border-light">
				<h4 class="panel-title">Submenu | <span class="text-bold"><?php echo $row['language_name']; ?></span></h4>
			</div>
			<div class="panel-body">
				<div class="form-group">
					<label for="menu_detail_name_<?php echo $row['language_id']; ?>">
						Submenu Name <?php echo $row['language_name']; ?>
					</label>
					<input type="text" name="menu_detail_name_<?php echo $row['language_id']; ?>" 
						value="<?php echo set_value('menu_detail_name_'.$row['language_id']); ?>" 
						placeholder="menu detail name <?php echo $row['language_id']; ?>" 
						id="menu_detail_name_<?php echo $row['language_id']; ?>" 
						class="form-control">
					<span class="help-block"><?php echo form_error('menu_detail_name_'.$row['language_id']); ?></span>
					
				</div>
				
			</div>
		</div>
		
	</div>
	<?php } ?>
	
	<div class="col-md-12">
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