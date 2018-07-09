<ul id="topMain" class="nav nav-pills nav-main navbar-nav">


	<?php   
	// print_r(mainmenu()); 
	// print_r(menudetail(5)); 
	?>

	<?php foreach (mainmenu() as $main) { ?>
        <?php if (count(menudetail($main->menu_detail_id)) > 0){ ?>
	<li class="dropdown">
		<a href="#" class="dropdown-toggle"><?php echo $main->menu_name; ?> </a>
		<ul class="dropdown-menu">
			<?php foreach (menudetail($main->menu_detail_id) as $det) { ?>
				<li><a href="<?php echo site_url('main/'.$det->slug); ?>" ><?php echo $det->title; ?></a></li>
			<?php } ?> 
		</ul> 
	</li>
        <?php } ?>
	<?php } ?> 
	<li>
		<a href="#">Tata Cara Permohonan</a>
	</li> 
	<li>
		<a href="<?php echo site_url('main/hubungi-kami'); ?>">Hubungi Kami</a>
	</li>  

</ul> 
