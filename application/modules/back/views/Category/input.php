<?php if ($this->session->flashdata('itemFlashData') == 'insertGagal'){ ?>
<div class="alert alert-block alert-danger fade in">
	<button data-dismiss="alert" class="close" type="button">x</button>
	<h4 class="alert-heading margin-bottom-10"><i class="ti-close"></i> Error!</h4>
	<p><?php echo validation_errors(); ?></p> 
</div>
<?php } ?>

<h5 class="over-title margin-bottom-15"><span class="text-bold">Add </span></h5> 

<div class="row">
	<div class="col-md-12">

		<?php echo form_open('back/category/input'); ?>

		<div class="form-group">
			<label class="col-sm-2 control-label" for="category_name">
				Name Category
			</label>
			<div class="col-sm-10">
				<input type="text" name="category_name" value="<?php echo set_value('category_name'); ?>" placeholder="Input Disini" id="category_name" class="form-control">
				<span class="help-block"><?php echo form_error('category_name'); ?></span>
			</div>
		</div>

		<div class="form-group">
			<label class="col-sm-2 control-label" for="">
				Turunan
			</label>
			<div class="col-sm-10">
			<?php 
            $q = $this->db->query("SELECT category_id, category_name from master_category
              where status = '1' and relasi is null")->result();

			 ?> 
		
              <select id="grup" class="form-control" name="relasi">
                <option value="0">Pilih Kategori</option>
                <?php foreach ($q as $d) { ?>
                <option value="<?php echo $d->category_id; ?>"><?php echo strtoupper($d->category_name); ?></option> 
                <?php } ?> 
              </select> 
			</div>
		</div>


		<div class="form-group">
			<div class="col-sm-offset-2 col-sm-10">
				<div class="checkbox ck check-primary">
					<input id="status" value="1" type="checkbox" name="status">
					<label for="checkbox2">
						Aktif
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