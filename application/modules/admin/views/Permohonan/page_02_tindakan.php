<style>.ui-state-error{padding: 0 10px;}</style>
<div class="tab-pane fade" id="TabTindakan">
	<div class="box-light">
		<form action="<?php echo site_url($this->session->userdata('ses_ppid_user_level').'/permohonan/tindakan'); ?>" method="POST" id="thisForm" class="form-horizontal" role="form" enctype="multipart/form-data">
            <input type="hidden" name="no_permohonan" id="no_permohonan" value="<?php echo $detail['no_permohonan']; ?>">
            
            <div class="form-group">
                <label class="col-sm-2 control-label" for="tindakan">Tindakan:</label>
                <div class="col-sm-10">
                    <select name="tindakan" id="tindakan" class="form-control">
                        <optgroup label="Proses">
                            <option value="Proses_Mandiri" <?php echo set_select('tindakan', 'Proses_Mandiri', False); ?> >Mandiri</option>
                            <option value="Proses_Disposisi" <?php echo set_select('tindakan', 'Proses_Disposisi', False); ?>>Teruskan Ke Unit</option>
                        </optgroup>
                        <option value="Tolak" <?php echo set_select('tindakan', 'Tolak', False); ?>>Tolak</option>
                        <option value="Lainnya" <?php echo set_select('tindakan', 'Lainnya', False); ?>>Lainnya</option>
                    </select>
                </div>
            </div>
			<div class="form-group tindakan Proses_Disposisi">
				<label class="col-sm-2 control-label" for="sifat">Sifat:</label>
				<div class="col-sm-10">
					<select name="sifat" id="sifat" class="form-control">
						<option <?php echo set_select('sifat', 'Biasa', False); ?> value="Biasa">Biasa</option>
						<option <?php echo set_select('sifat', 'Segera', False); ?> value="Segera">Segera</option>
						<option <?php echo set_select('sifat', 'Sangat Segera', False); ?> value="Sangat Segera">Sangat Segera</option>
					</select>
				</div>
			</div>
            <div class="row">
				<!-- Unit -->
				<div class="col-md-12 col-sm-12 tindakan Proses_Disposisi">
					<div class="box-inner">
						<h3>Teruskan ke Unit</h3>
						<div class="height-250 slimscroll" data-always-visible="true" data-size="5px" data-position="right" data-opacity="0.4" disable-body-scroll="true">
							<?php 
							$nilai = $this->Unit_model->list_unit_all();
							$head = @$nilai['head'];
							$child = @$nilai['child'];
							
							for($i=0; $i<count($head); $i++){
								echo '<br><strong>'.$head[$i]['nama_unit'].'</strong><br>';
								
								if (count(@$child[$i]) > 0){
									for($j=0; $j<count($child[$i]); $j++){
										echo '<label class="switch switch-warning" style="padding-left: 15px;">
											<input type="checkbox" name="unit[]" value="'.$child[$i][$j]['id_unit'].'">
											<span class="switch-label" data-on="YES" data-off="NO"></span>
											<span style="font-weight: normal;"> '.$child[$i][$j]['nama_unit'].'</span>
										</label><br>';
									}
								} else {
									echo '<label class="switch switch-warning" style="padding-left: 15px;">
										<input type="checkbox" name="unit[]" value="'.$head[$i]['id_unit'].'">
										<span class="switch-label" data-on="YES" data-off="NO"></span>
										<span style="font-weight: normal;"> '.$head[$i]['nama_unit'].'</span>
									</label><br>';
								}
							}
							?>
						</div>
						<div class="ui-state-error alert-mini alert-danger"><?php echo form_error('unitDisposisi'); ?></div>
					</div>
				</div>
				<!-- Catatan -->
				<div class="col-md-12 col-sm-12 tindakan Proses_Disposisi margin-top-20">
					<div class="box-inner">
						<h3>Catatan</h3>
						<div>
							<textarea name="catatan_disposisi" id="compose-textarea" class="summernote form-control" style="height: 300px"><?php echo set_value('catatan_disposisi'); ?></textarea>
							<div class="ui-state-error alert-mini alert-danger"><?php echo form_error('catatan_disposisi'); ?></div>
						</div>
					</div>
				</div>
				<!-- Lampiran -->
				<div class="col-md-12 col-sm-12 tindakan Proses_Disposisi margin-top-20">
					<div class="box-inner">
						<h3>Lampiran</h3>
						<div>
							<input type="file" name="userfile[]" class="form-control fileUpload" id="userfile" placeholder="File Pendukung" style="padding: 0">
							<div id="uploadField"></div>
							<button type="button" onclick="myFunction()" class="btn-xs btn-link"><i class="fa fa-plus"></i>Tambah lampiran</button>
						</div>
						<div class="ui-state-error alert-mini alert-danger"><?php echo form_error('fileUpload'); ?></div>
					</div>
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
            <div class="form-group tindakan Lainnya" >
                <label class="col-sm-2 control-label" for="Alasan">Alasan</label>
                <div class="col-sm-10">
                <input type="text" name="txtLainnya" class="form-control" placeholder="Alasan">
                <!-- select name="Alasan" id="Alasan" class="form-control">
                    <option value="Persyaratan Tidak Lengkap">Persyaratan Tidak Lengkap</option>
                    <option value="Data tidak dalam penguasaan ESDM">Data tidak dalam penguasaan ESDM</option>
                    <option value="Data dikecualikan">Data dikecualikan</option>
                </select -->
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

function myFunction() {
	uploadField = '<input type="file" name="userfile[]" class="form-control fileUpload" placeholder="File Pendukung" style="padding: 0">';
	$('#uploadField').append(uploadField);
}
</script>