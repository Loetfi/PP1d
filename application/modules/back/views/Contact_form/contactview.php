<div class="">  
<div style="float:right;">
	<a href="<?php echo site_url('back/kantor/contact_form/'); ?>" class="btn btn-primary btn-sm"><i class="fa fa-chevron-left"></i> Kembali</a>
</div>
	<p><b><?php echo strtoupper('nama'); ?></b> : <?php echo $q->nama; ?></p>
	<p><b><?php echo strtoupper('email'); ?></b> : <?php echo $q->email; ?></p>
	<p><b><?php echo strtoupper('telepon'); ?></b> : <?php echo $q->telepon; ?></p>
	<p><b><?php echo strtoupper('namapekerjaan'); ?></b> : <?php echo $q->namapekerjaan; ?></p>
	<p><b><?php echo strtoupper('perusahaan'); ?></b> : <?php echo $q->perusahaan; ?></p>
	<p><b><?php echo strtoupper('namakategori'); ?></b> : <?php echo $q->namakategori; ?></p>
	<p><b><?php echo strtoupper('subjek'); ?></b> : <?php echo $q->subjek; ?></p> 
</div>