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
</style>

<div class="container" style="padding-top: 10px; padding-bottom: 80px;">
<!-- RIGHT -->
<div class="col-lg-9 col-lg-push-3 col-md-9 col-md-push-3 col-sm-12 margin-bottom-80">

    <ul class="nav nav-tabs nav-top-border">
        <li class="active"><a href="#info" data-toggle="tab">Detail Permohonan</a></li>
        
        <?php if ($detail['status'] == 'Verifikasi'){ ?>
        <li><a href="#TabTindakan" data-toggle="tab">Tindakan</a></li>
        <?php } ?>
        
        <?php if ($detail['dispos'] != ''){ ?>
        <li><a href="#Disposisi" data-toggle="tab">Teruskan Ke Unit</a></li>
        <li><a href="#BalasanDisposisi" data-toggle="tab">Tanggapan Unit</a></li>
        <?php } ?>
        
        <?php if ($detail['status'] == 'Proses' || $detail['status'] == 'Selesai'){ ?>
        <li><a href="#Balasan" data-toggle="tab">Balasan</a></li>
        <?php } ?>
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
						<h5 class="size-11">Sumber: <?php echo $detail['sumber']; ?></h5>
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
        
        <?php ## <!-- TINDAKAN TAB -->
        if ($detail['status'] == 'Verifikasi'){ 
            $form_tindakan = 'Permohonan/page_02_tindakan.php';
            $this->load->view($form_tindakan);
        }
		?>
        <?php ## <!-- Disposisi TAB -->
        if ($detail['dispos'] != ''){ 
            $form_tindakan = 'Permohonan/page_022_disposisi.php';
            $this->load->view($form_tindakan);
        }
		?>
        <?php ## <!-- Balasan TAB -->
        if ($detail['status'] == 'Proses' || $detail['status'] == 'Selesai'){ 
            $form_tindakan = 'Permohonan/page_03_balas.php';
            $this->load->view($form_tindakan);
        }
		?>
    </div>

</div>


<?php $this->load->view('admin/Pemohon/detail_pemohon_permohonan'); ?>
</div>