<!-- Balasan TAB -->
<div class="tab-pane fade" id="Balasan">
    <div class="box-light">
        <div class="row">
            <?php if ($detail['status'] == 'Proses' && ($detail['dispos'] == '' || $detail['dispos'] == 'Balas' )){ ?>
            <div class="col-md-12 col-sm-12">
                <h3>Balasan Permohonan</h3>
            </div>
            <!-- CSS summernote -->
            <link href="<?php echo base_url('assets/front'); ?>/plugins/editor.summernote/summernote.css" rel="stylesheet" type="text/css" />
            <!-- JS summernote -->
            <script type="text/javascript" src="<?php echo base_url('assets/front'); ?>/plugins/editor.summernote/summernote.min.js"></script>
            
                <form action="<?php echo site_url($this->session->userdata('ses_ppid_user_level').'/permohonan/balasPermohonan'); ?>" method="POST" id="thisForm" class="form-horizontal" role="form" enctype="multipart/form-data">
                    <input type="hidden" name="no_permohonan" id="no_permohonan" value="<?php echo $detail['no_permohonan']; ?>">
                    <!-- Judul Balasan Permohonan -->
                    <div class="form-group">
                        <label class="col-sm-3 control-label" for="subjek">Judul Balasan Permohonan:</label>
                        <div class="col-sm-9 formFieldSs <?php echo form_error('subjek') !='' ? 'error':''; ?>">
                            <input name="subjek" id="subjek" placeholder="Judul Balasan Permohonan:" 
                            class="form-control" 
                            value="<?php echo set_value('subjek'); ?>"
                            >
                            <label class="ui-state-error"><?php echo form_error('subjek'); ?></label>
                        </div>
                    </div>
                    <!-- Balasan Permohonan -->
                    <div class="form-group">
                        <label class="col-sm-3 control-label" for="compose-textarea">Balasan Permohonan:</label>
                        <div class="col-sm-9 formFieldSs <?php echo form_error('balasan') !='' ? 'error':''; ?>">
                            <textarea name="balasan" id="compose-textarea" style="height: 300px" placeholder="Informasi yang diperlukan:" class="summernote form-control" data-height="200" data-lang="en-US" ><?php echo set_value('info_req'); ?></textarea>
                            <label class="ui-state-error"><?php echo form_error('balasan'); ?></label>
                        </div>
                    </div>
                    <!-- Lampiran -->
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Lampiran:</label> 
                        <div class="col-sm-9 formFieldSs <?php echo form_error('fileUpload') !='' ? 'error':''; ?>" >
                            <input type="file" name="userfile[]" class="form-control fileUpload" id="userfile" placeholder="File Pendukung" style="padding: 0">
                            <div id="uploadField"></div>
                            <!-- p class="help-block">Max. 32MB</p -->
                            <button type="button" onclick="myFunction()" class="btn-xs btn-link"><i class="fa fa-plus"></i>Tambah lampiran</button>
                            <label class="ui-state-error"><?php echo form_error('fileUpload'); ?></label>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label" ></label>
                        <div class="col-sm-9"><button type="submit" class="btn btn-primary" id="btnUpload"><i class="fa fa-envelope-o"></i> Submit</button></div>
                    </div>
                </form>
                <script>
                function myFunction() {
                    uploadField = '<input type="file" name="userfile[]" class="form-control fileUpload" placeholder="File Pendukung" style="padding: 0">';
                    $('#uploadField').append(uploadField);
                }
                </script>
            <?php } else if ($detail['status'] == 'Selesai'){ ?>
            <div class="panel panel-warning">
                <div class="panel-heading">
                    <h4 class="panel-title">
                        <?php echo $balasan['subjek']; ?>
                    </h4>
                </div>
                <div class="panel-body">
                    <?php echo $balasan['balasan']; ?>
                </div>
                <div class="panel-footer">
                    <?php 
                    $file_nameasli = explode(';',$balasan['file_nameasli']);
                    $file_pendukung = explode(';',$balasan['file_pendukung']);
                    for($i=0; $i<count($file_pendukung) -1; $i++){ 
                        $namaFile = $file_pendukung[$i]; 
                        $namaFileAsli = $file_nameasli[$i]; 
                        ?>
                    <a href="<?php echo site_url($this->session->userdata('ses_ppid_user_level').'/permohonan/downloadFile/'.str_replace('/','-',$no_permohonan).'/'.$namaFile); ?>" class="btn btn-info btn-sm margin-bottom-10">
                        <i class="fa fa-cloud-download"></i> <?php echo $namaFileAsli; ?>
                    </a>&nbsp;
                    <?php } ?>
                </div>
            </div>
            <?php } ?>
        </div>
    </div>
</div>
<!-- /Balasan TAB -->