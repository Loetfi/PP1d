<div class="tab-pane fade" id="TabTindakan">
	<div class="box-light">
		<form action="<?php echo site_url($this->session->userdata('ses_ppid_user_level').'/permohonan/tindakan'); ?>" method="POST" id="thisForm" class="form-horizontal" role="form" enctype="multipart/form-data">
            <input type="hidden" name="no_permohonan" id="no_permohonan" value="<?php echo $detail['no_permohonan']; ?>">
            
            <div class="form-group">
                <label class="col-sm-2 control-label" for="tindakan">Tindakan:</label>
                <div class="col-sm-10">
                    <select name="tindakan" id="tindakan" class="form-control">
                        <option value="Proses_Mandiri" <?php echo set_select('tindakan', 'Proses_Mandiri', False); ?> >Mandiri</option>
                        <option value="Tolak" <?php echo set_select('tindakan', 'Tolak', False); ?>>Tolak</option>
                    </select>
                </div>
            </div>
            <div class="form-group tindakan Tolak" >
                <label class="col-sm-2 control-label" for="Alasan">Alasan Penolakan</label>
                <div class="col-sm-10">
                <select name="Alasan" id="Alasan" class="form-control">
                    <option value="Persyaratan Tidak Lengkap">Persyaratan Tidak Lengkap</option>
                    <option value="Data tidak dalam penguasaan ESDM">Data tidak dalam penguasaan ESDM</option>
                    <option value="Data dikecualikan">Data dikecualikan</option>
                </select>
                </div>
            </div>
            
            <div class="pull-right">
                <button type="submit" class="btn btn-primary"><i class="fa fa-check"></i> Submit</button>
            </div>
        </form>
		<div class="row">
			
		</div>
	</div>
</div>
<script>
$(function () {
	$('#tindakan').change(function(){
		thisVal = $(this).val();
		$('.tindakan').css('display', 'none');
		$('.'+thisVal).css('display', 'block');
	});
	$('#tindakan').change();
});

</script>