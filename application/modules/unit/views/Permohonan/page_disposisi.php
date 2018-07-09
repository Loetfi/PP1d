<div class="page-title text-center">
    <h2 class="title"><?php echo @$title; ?></h2> 
    <h3 style="color: #fff;"><?php echo @$subtitle; ?></h3> 
</div>
<div class="breadcrumbs">
<?php echo $this->breadcrumbs->show(); ?>
</div>

<style>
.thumbnail > h4{
    border-bottom: 1px solid #000;
    padding-bottom: 10px;
}
h4.panel-title{
    font-size: 15px;
}
#info h4.panel-title, #Disposisi h4.panel-title{
    padding: 10px;
}
.ui-state-error{
    padding: 0 10px;
}
</style>

<div class="container" style="padding-top: 10px; padding-bottom: 80px;">

<!-- RIGHT -->
<div class="col-lg-9 col-md-9 col-sm-8 col-lg-push-3 col-md-push-3 col-sm-push-4 margin-bottom-80">

    <ul class="nav nav-tabs nav-top-border">
        <li class="active"><a href="#info" data-toggle="tab">Detail Permohonan</a></li>
        <li><a href="#Disposisi" data-toggle="tab">Terusan Admin</a></li>
        <li><a href="#Balasan" data-toggle="tab">Tanggapan ke Admin</a></li>
    </ul>

    <div class="tab-content">

        <!-- PERMOHONAN TAB -->
        <div class="tab-pane fade in active" id="info">
            <div class="box-light">
                <div class="row">
                    <!-- SUBJEK -->
                    <div class="col-md-12 col-sm-12">
                        <h4 class="size-11 pull-right">Status: <?php echo $detail['status']; ?></h4>
                        <h3>Subjek: <?php echo $detail['subjek']; ?></h3>
                        <?php if ($detail['status'] == 'Pending'){ ?>
                        <center>
                            <form action="<?php echo site_url($this->session->userdata('ses_ppid_user_level').'/permohonan/verifikasi'); ?>" method="POST" role="form">
                                <input type="hidden" name="no_permohonan" value="<?php echo $detail['no_permohonan']; ?>">
                                <button type="submit" class="btn btn-primary"><i class="fa fa-check"></i> Verifikasi</button>
                            </form>
                        </center>
                        <?php } ?>
                    </div>
                    <!-- INFO -->
                    <div class="col-md-6 col-sm-6">
                        <div class="panel panel-warning">
                            <div class="panel-heading">
                                <h4 class="panel-title">Informasi Yang Diperlukan</h4>
                            </div>
                            <div class="panel-body" style="min-height: 200px;">
                                <?php echo $detail['info_req']; ?>
                            </div>
                        </div>
                        
                        <!-- div class="box-inner">
                            <h3>Informasi Yang Diperlukan</h3>
                            <div class="height-250 slimscroll" data-always-visible="true" data-size="5px" data-position="right" data-opacity="0.4" disable-body-scroll="true">
                                <?php echo $detail['info_req']; ?>
                            </div>
                        </div -->
                    </div>
                    <!-- TUJUAN -->
                    <div class="col-md-6 col-sm-6">
                        <div class="panel panel-warning">
                            <div class="panel-heading">
                                <h4 class="panel-title">Tujuan Penggunaan Informasi</h4>
                            </div>
                            <div class="panel-body" style="min-height: 200px;">
                                <?php echo $detail['info_tujuan']; ?>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <!-- Lampiran -->
                    <div class="col-md-12 col-sm-12 margin-top-20">
                        <div class="panel panel-warning">
                            <div class="panel-heading">
                                <h4 class="panel-title">Lampiran</h4>
                            </div>
                            <div class="panel-body">
                                <?php 
                                $file_nameasli = explode(';',$detail['file_nameasli']);
                                $file_pendukung = explode(';',$detail['file_pendukung']);
                                for($i=0; $i<count($file_pendukung) -1; $i++){ 
                                    $namaFile = $file_pendukung[$i]; 
                                    $namaFileAsli = $file_nameasli[$i]; 
                                    ?>
                                <a href="<?php echo site_url($this->session->userdata('ses_ppid_user_level').'/permohonan/downloadFile/'.str_replace('/','-',$no_permohonan).'/'.$namaFile); ?>" class="btn btn-info btn-sm margin-bottom-10">
                                    <i class="fa fa-cloud-download"></i> <?php echo $namaFileAsli; ?>
                                </a>
                                <?php } ?>
                            </div>
                        </div>
                        
                    </div>
					<!-- Riwayat Permohonan -->
                    <div class="col-md-12 col-sm-12 margin-top-20">
                        <div class="panel panel-warning">
                            <div class="panel-heading">
                                <h4 class="panel-title">Riwayat Permohonan</h4>
                            </div>
                            <div class="panel-body">
                                <table class="table table-bordered table-striped table-hover">
                                    <thead>
                                        <th width="100px">Waktu</th>
                                        <th>Status</th>
                                        <th>Keterangan</th>
                                        <th>Aktor</th>
                                    </thead>
                                    <tbody>
                                        <?php foreach($log as $row){ ?>
                                        <tr>
                                            <td align="center"><?php echo date('Y-m-d', $row['cdate']).'<br>'.date('H:i', $row['cdate']); ?></td>
                                            <td><?php echo $row['status']; ?></td>
                                            <td><?php echo $row['deskripsi']; ?></td>
                                            <td><?php echo $row['nama']==''?'Pemohon':$row['nama']; ?></td>
                                        </tr>
                                        <?php } ?>
                                    </tbody>
                                </table>
                            
                            </div>
                        </div>
                        
                    </div>
                    
                </div>
                
            </div>
            
        </div>
        <!-- /PERMOHONAN TAB -->
        
        <?php if ($detail['status'] == 'Pending'){ }
		else if ($detail['status'] == 'Verifikasi'){ }
		else if ($detail['status'] == 'Proses' && $detail['dispos'] == 'Kirim'){ }
		else if ($detail['status'] == 'Proses' && ($detail['dispos'] == '' || $detail['dispos'] == 'Balas' )){ } ?>
        
        <!-- Disposisi TAB -->
        <div class="tab-pane fade" id="Disposisi">
            
            <div class="box-light">
                <div class="row">
                    <div class="panel panel-warning">
                        <div class="panel-heading">
                            <h4 class="panel-title">
                                Unit: <?php echo str_replace(',',',&nbsp;',$detail_disposisi['nama_unit']); ?>
                            </h4>
                        </div>
                        <div class="panel-body">
                            <?php echo $detail_disposisi['catatan']; ?>
                        </div>
                        <div class="panel-footer">
                            <?php 
                            $file_nameasli = explode(';',$detail_disposisi['file_nameasli']);
                            $file_pendukung = explode(';',$detail_disposisi['file_pendukung']);
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
                    
                </div>
            </div>
            <br>
            
        </div>
        <!-- /Disposisi TAB -->
        
		<!-- Balasan TAB -->
        <div class="tab-pane fade" id="Balasan">
            
            <div class="box-light">
                <div class="row">
                    <div class="panel-group" id="accordion">
                    <?php foreach($list_disposisi as $row){ ?>
                    
                    <?php if ($row['status'] == 'Pending'){ ?>
                        <div class="panel panel-default">
                            <div class="panel-heading" <?php echo $row['status']=='Balas'?'style="background: #dff0d8; color: #3c763d;"':'' ?>>
                                <h4 class="panel-title">
                                    <a class="collapse" data-toggle="collapse" data-parent="#accordion" href="#collapseUnit"><?php echo $row['nama_unit']; ?></a>
                                </h4>
                            </div>
                            <div id="collapseUnit" class="panel-collapse collapse in">
                                <div class="panel-body">
                                    <!-- CSS summernote -->
                                    <link href="<?php echo base_url('assets/front'); ?>/plugins/editor.summernote/summernote.css" rel="stylesheet" type="text/css" />
                                    <!-- JS summernote -->
                                    <script type="text/javascript" src="<?php echo base_url('assets/front'); ?>/plugins/editor.summernote/summernote.min.js"></script>
                                    
                                    <form action="<?php echo site_url($this->session->userdata('ses_ppid_user_level').'/permohonan/disposisi'); ?>" method="POST" id="thisForm" class="form-horizontal" role="form" enctype="multipart/form-data">
                                        <input type="hidden" name="no_permohonan" id="no_permohonan" value="<?php echo $detail['no_permohonan']; ?>">
                                        <!-- Balasan Disposisi -->
                                        <div class="col-md-12 col-sm-12 tindakan Proses_Disposisi margin-top-20">
                                            <div class="box-inner">
                                                <h3>Balasan Disposisi</h3>
                                                <div>
                                                    <textarea name="replay" id="compose-textarea" class="summernote form-control" style="height: 300px"><?php echo set_value('replay'); ?></textarea>
                                                    <div class="ui-state-error alert-mini alert-danger"><?php echo form_error('replay'); ?></div>
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
                                        <div class="col-md-12 col-sm-12 tindakan Proses_Disposisi">
                                            <button type="submit" class="btn btn-primary pull-left"><i class="fa fa-check"></i> Submit</button>
                                        </div>
                                    </form>
                                    <script>
                                    function myFunction() {
                                        uploadField = '<input type="file" name="userfile[]" class="form-control fileUpload" placeholder="File Pendukung" style="padding: 0">';
                                        $('#uploadField').append(uploadField);
                                    }
                                    </script>

                                </div>
                            </div>
                        </div>
                        
                    <?php } else if ($row['status'] == 'Balas'){ ?>
                        <div class="panel panel-default">
                            <div class="panel-heading" <?php echo $row['status']=='Balas'?'style="background: #dff0d8; color: #3c763d;"':'' ?>>
                                <h4 class="panel-title">
                                    <a class="collapse" data-toggle="collapse" data-parent="#accordion" href="#collapseUnit"><?php echo $row['nama_unit']; ?></a>
                                </h4>
                            </div>
                            <div id="collapseUnit" class="panel-collapse collapse in">
                                <div class="panel-body">
                                    <?php echo $row['replay']; ?>
                                </div>
                                <div class="panel-footer">
                                    <?php 
                                    $file_nameasli = explode(';',$row['file_replayasli']);
                                    $file_pendukung = explode(';',$row['file_replay']);
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
                        </div>
                    <?php } ?>
                    
                    <?php } ?>
                    </div>
                    
                </div>
            </div>
        </div>
        <!-- /Balasan TAB -->
		
		<?php 
        if ($detail['status'] == 'Pending'){ 
            $form_tindakan = 'Permohonan/page_01_verifikasi.php'; 
            $this->load->view($form_tindakan);
        }
		else if ($detail['status'] == 'Verifikasi'){ 
            $form_tindakan = 'Permohonan/page_021_mandiri.php'; 
            $this->load->view($form_tindakan);
        }
		else if ($detail['status'] == 'Proses' && $detail['dispos'] == 'Kirim'){ }
		else if ($detail['status'] == 'Proses' && ($detail['dispos'] == '' || $detail['dispos'] == 'Balas' )){ } 
		
		// if ($detail['status'] != 'Selesai'){ $this->load->view($form_tindakan); }
		?>

    </div>

</div>


<?php $this->load->view('admin/Pemohon/detail_pemohon_permohonan'); ?>
</div>