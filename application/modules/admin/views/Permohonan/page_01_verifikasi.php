<!-- TINDAKAN TAB -->
<div class="tab-pane fade" id="tindakan">
	<div class="box-light">
		<form action="<?php echo site_url($this->session->userdata('ses_ppid_user_level').'/permohonan/verifikasi'); ?>" method="POST" role="form">
			<input type="hidden" name="no_permohonan" value="<?php echo $detail['no_permohonan']; ?>">
			<button type="submit" class="btn btn-primary"><i class="fa fa-check"></i> Verifikasi</button>
		</form>
	</div>
</div>