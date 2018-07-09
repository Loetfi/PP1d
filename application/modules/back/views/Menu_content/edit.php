
    <script src="<?php echo base_url('assets/assets_backend/plugins/ckeditor/ckeditor.js'); ?>"></script>
<?php if ($this->session->flashdata('itemFlashData') == 'insertGagal'){ ?>
<div class="alert alert-block alert-danger fade in">
	<button data-dismiss="alert" class="close" type="button">x</button>
	<h4 class="alert-heading margin-bottom-10"><i class="ti-close"></i> Error!</h4>
	<p><?php echo validation_errors(); ?></p>
</div>
<?php } ?>

<h1>Edit Menu Content</h1> 

<div class="row">
	<div class="col-md-12">
		<table class="table table-bordered table-striped">
			<tr>
				<td>Title</td>
				<td>:</td>
				<td><?php echo $detailMenu['title']; ?></td>
			</tr>
			<tr>
				<td>Menu</td>
				<td>:</td>
				<td><?php foreach($listLanguage as $row){ 
					echo $detailMenu['menu_detail_name_'.$row['language_id']].' ('.$row['language_name'].')<br>';
				} ?></td>
			</tr>
		</table>
	</div>
	<?php echo form_open_multipart('back/menu_content/edit/'.$idMenuContent); ?>
	<div class="col-md-12">
		<div class="form-group">
			<label for="position">
				Position *)
			</label>
			<input type="text" name="position" 
				value="<?php echo set_value('position', isset($detail['position']) ? $detail['position'] : ''); ?>" 
				placeholder="position" 
				id="position" 
				class="form-control">
			<span class="help-block"><?php echo form_error('position'); ?></span>
		</div>
		<div class="row">
			<div class="col-md-6" style="border: 1px solid #eee;">
				<div class="form-group" >
					<label for="photo">
						Main Photo/Video
					</label>
					<input type="file" name="photo" 
						value="<?php echo set_value('photo'); ?>" 
						placeholder="photo/video" 
						id="photo" 
						class="form-control" style="margin: 0; padding: 0;">
					<span class="help-block"><?php echo form_error('photo'); ?></span>
					<?php if ($detail['photo'] != ''){ ?>
					<img src="<?php echo base_url(); ?>/uploads/contents/<?php echo $detail['photo']; ?>" width="200px">
					<?php } ?>
				</div>
				<div class="form-group">
					<label for="url_video">
						URL Video Youtube
					</label>
					<input type="text" name="url_video" 
						value="<?php echo set_value('url_video', isset($detail['url_video']) ? $detail['url_video'] : ''); ?>" 
						placeholder="URL Youtube" 
						id="url_video" 
						class="form-control" style="margin: 0; padding: 0;">
					<span class="help-block"><?php echo form_error('url_video'); ?></span>
				</div>
			</div>
			<div class="col-md-6" style="border: 1px solid #eee;">
				<div class="form-group" >
					<label for="photo_litle">
						Thumbnail Photo 
					</label>
					<input type="file" name="photo_litle" 
						value="<?php echo set_value('photo_litle'); ?>" 
						placeholder="Photo Litle" 
						id="photo_litle" 
						class="form-control" style="margin: 0; padding: 0;">
					<span class="help-block"><?php echo form_error('photo_litle'); ?></span>
					<?php if ($detail['photo_litle'] != ''){ ?>
					<img src="<?php echo base_url(); ?>/uploads/contents/<?php echo $detail['photo_litle']; ?>" width="200px">
					<?php } ?>
				</div>
			</div>
		</div>
		
	</div>
	
	<?php foreach($listLanguage as $row){ ?>
	<div class="col-md-6">
		
		<div class="panel panel-white">
			<div class="panel-heading border-light">
				<h4 class="panel-title">Content | <span class="text-bold"><?php echo $row['language_name']; ?></span></h4>
			</div>
			<div class="panel-body">
				<div class="form-group">
					<label for="title_<?php echo $row['language_id']; ?>">
						Title <?php echo $row['language_name']; ?> *)
					</label>
					<input type="text" name="title_<?php echo $row['language_id']; ?>" 
						value="<?php echo set_value('title_'.$row['language_id'], isset($detail['title_'.$row['language_id']]) ? $detail['title_'.$row['language_id']] : ''); ?>" 
						placeholder="title <?php echo $row['language_id']; ?>" 
						id="title_<?php echo $row['language_id']; ?>" 
						class="form-control">
					<span class="help-block"><?php echo form_error('title_'.$row['language_id']); ?></span>
				</div>
				<div class="form-group">
					<label for="subtitle_<?php echo $row['language_id']; ?>">
						Subtitle <?php echo $row['language_name']; ?>
					</label>
					<input type="text" name="subtitle_<?php echo $row['language_id']; ?>" 
						value="<?php echo set_value('subtitle_'.$row['language_id'], isset($detail['subtitle_'.$row['language_id']]) ? $detail['subtitle_'.$row['language_id']] : ''); ?>" 
						placeholder="subtitle <?php echo $row['language_id']; ?>" 
						id="subtitle_<?php echo $row['language_id']; ?>" 
						class="form-control">
					<span class="help-block"><?php echo form_error('subtitle_'.$row['language_id']); ?></span>
				</div>
				
				<div class="form-group">
					<label for="content_<?php echo $row['language_id']; ?>">
						Content <?php echo $row['language_name']; ?> *)
					</label>
					<textarea 
						name="content_<?php echo $row['language_id']; ?>"
						class="ckeditor" 
						cols="80" rows="10" 
						id="content_<?php echo $row['language_id']; ?>" 
					><?php echo set_value('content_'.$row['language_id'], isset($detail['content_'.$row['language_id']]) ? $detail['content_'.$row['language_id']] : ''); ?></textarea>
					<span class="help-block"><?php echo form_error('content_'.$row['language_id']); ?></span>
				</div>
				
			</div>
		</div>
		
	</div>
	<?php } ?>
	
	<div class="col-md-12">
		<input type="hidden" name="idMenuContent" value="<?php echo $idMenuContent; ?>">
		
		<div class="form-group">
			<label for="form-field-mask-1">
				Status *)
			</label>
			<div class="input-group">
				<select name="status" class="form-control">
					<option value="1" <?php echo $detail['status'] == '1' ? 'selected' : ''; ?>>Aktif</option>
					<option value="0" <?php echo $detail['status'] == '0' ? 'selected' : ''; ?>>Non-Aktif</option>
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