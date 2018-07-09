<!-- right -->
<ul class="top-links list-inline pull-right"> 
	<li class="text-welcome"><?php echo date('d F Y'); ?></li> 
    <?php if ($this->session->userdata('ses_ppid_user_status') != true){ ?>
	<li class=""><a href="<?php echo site_url('auth'); ?>" class="">LOGIN / REGISTER</a></li>
    <?php } else { ?>
	<li class=""><a href="<?php echo site_url('auth/clearSession'); ?>" class="">Logout</a></li>
    <?php } ?>
</ul> 