
<form action="<?php echo site_url('back/setting/ga'); ?>" method="POST" role="form">
	<legend>Google Analitycs</legend>


	<?php echo validation_errors(); ?>

	<div class="form-group"> 
		<br>
		<textarea name="ga" rows="10px" cols="100px">
 <?php   echo set_value('ga',isset($ga->ga) ? $ga->ga : ''); ?></textarea>
	</div>
 
	<button type="submit" class="btn btn-primary">Submit</button>
</form>