<?php if ($this->session->flashdata('itemFlashData') == 'insertGagal'){ ?>
<div class="alert alert-block alert-danger fade in">
	<button data-dismiss="alert" class="close" type="button">x</button>
	<h4 class="alert-heading margin-bottom-10"><i class="ti-close"></i> Error!</h4>
	<p><?php echo validation_errors(); ?></p>
</div>
<?php } ?>

<h1>Add Investor Report</h1> 

<div class="row">
	<?php echo form_open('back/investor/input'); ?>
	
	<div class="col-md-12">
		<div class="form-group">
			<label for="tahun">
				Tahun
			</label>
			<input type="text" name="tahun" 
				value="<?php echo set_value('tahun', isset($detail['tahun']) ? $detail['tahun'] : ''); ?>" 
				placeholder="tahun" 
				id="tahun" 
				class="form-control">
			<span class="help-block"><?php echo form_error('tahun'); ?></span>
		</div>
		<table class="table table-bordered">
			<tr>
				<th width="30%">Nama</th>
				<th>Nilai</th>
			</tr>
			<?php foreach($hirarkiReport as $row){ ?>
				<?php if($row['kepala'] == '0' && $row['tipe'] != ''){ ?>
				<tr class="success">
					<td><b><?php echo $row['nama']; ?></b></td>
					<td></td>
				</tr>
				<?php } else if($row['kepala'] == '0'){ ?>
				<tr class="success">
					<td><b><?php echo $row['nama']; ?></b></td>
					<td>
						<input type="text" name="<?php echo 'isian_id_'.$row['id']; ?>" 
							value="<?php echo set_value('isian_id_'.$row['id'], isset($detail['isian_id_'.$row['id']]) ? $detail['isian_id_'.$row['id']] : ''); ?>" 
							placeholder="<?php echo $row['nama']; ?>" 
							id="<?php echo 'isian_id_'.$row['id']; ?>" 
							class="form-control">
						<span class="help-block"><?php echo form_error('isian_id_'.$row['id']); ?></span>
					</td>
				</tr>
				<?php } else { ?>
				<tr>
					<td>&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $row['nama']; ?></td>
					<td>
						<input type="text" name="<?php echo 'isian_id_'.$row['id']; ?>" 
							value="<?php echo set_value('isian_id_'.$row['id'], isset($detail['isian_id_'.$row['id']]) ? $detail['isian_id_'.$row['id']] : ''); ?>" 
							placeholder="<?php echo $row['nama']; ?>" 
							id="<?php echo 'isian_id_'.$row['id']; ?>" 
							class="form-control">
						<span class="help-block"><?php echo form_error('isian_id_'.$row['id']); ?></span>
					</td>
				</tr>
				<?php } ?>
				
			<?php } ?>
		</table>
		
		<div class="form-group">
			<button class="btn btn-o btn-primary" type="submit">
				Save
			</button>
		</div>
	</div>
	<?php echo form_close(); ?>
</div>