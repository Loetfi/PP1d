<!-- LEFT -->
<div class="sidebar col-sm-12 col-md-3 col-md-pull-9" style="padding-top: 0px;">
    <!-- div class="thumbnail text-center">
        <img src="<?php echo base_url('uploads/profil/'.@$detailPemohon['foto']); ?>" alt="Foto Profil" />
    </div -->
    <div class="thumbnail text-center">
		<?php if ($detailPemohon['ktp_img'] == ''){ ?>
        <img src="<?php echo base_url('uploads/profil/no-image.png'); ?>" alt="Foto Pengenal" />
		<?php } else { ?>
        <img src="<?php echo base_url('uploads/profil/'.$detailPemohon['ktp_img']); ?>" alt="Foto Pengenal" />
		<?php } ?>
        <h4>Nama Pemohon: <?php echo $detailPemohon['nama']; ?></h4>
        <!-- h4 class="size-18 margin-top-10 margin-bottom-0">No KTP:<?php echo $detailPemohon['no_identitas']; ?></h4 -->
        <p>No KTP: <?php echo $detailPemohon['no_identitas']; ?></p>
        <p>Tlp: <?php echo $detailPemohon['tlp']; ?></p>
        <p>Email: <?php echo $detailPemohon['email']; ?></p>
        <p>Status: <?php echo $detailPemohon['role']; ?></p>
    </div>
</div>