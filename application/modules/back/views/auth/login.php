<body> 
	<div class="row">       
		<div class="main-login col-xs-10 col-xs-offset-1 col-sm-8 col-sm-offset-2 col-md-4 col-md-offset-4">
			<div class="logo margin-top-30 text-center">
				<img src="<?php echo base_url('assets/logo/logo-esdm.png'); ?>" alt="myLogo" width="200px"/> 
			</div> 
			<div class="box-login">  
				<?php echo $message;?> 

				<?php echo form_open("back/auth/login","class='form-login'");?> 
				<center style="padding-bottom: 5px;">
					<h3 style="color: #007AFF;">Content Management System</h3>
				</center>

				<fieldset>
					<legend>
						Log In 
					</legend>
					<p>
						Please enter your username and password.
					</p>                        
					<div class="form-group">
						<span class="input-icon"> 
							<?php echo form_input($identity);?>
							<i class="fa fa-user"></i> 
						</span>
					</div>
					<div class="form-group form-actions">
						<span class="input-icon"> 
						 <?php echo form_input($password);?> 
						 <i class="fa fa-lock"></i>
					 </span>
				 </div>

				 <p>
					<?php echo lang('login_remember_label', 'remember');?>
					<?php echo form_checkbox('remember', '1', FALSE, 'id="remember"');?>
				</p>

				<div class="form-actions">
					<button type="submit" class="btn btn-primary pull-right">
						Login <i class="fa fa-arrow-circle-right"></i>
					</button>
				</div>
			</fieldset> 




			<div class="copyright">
				&copy; <span class="current-year"></span><span class="text-bold text-uppercase"> CIST Division</span>. <span>All rights reserved</span>
			</div>

		</div>

	</div>
</div>

</body>
