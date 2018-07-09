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
        <li class="active"><a href="#info" data-toggle="tab">Permohonan</a></li>
        <li><a href="#Balasan" data-toggle="tab">Balasan</a></li>
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
        
        <?php ## <!-- Balasan TAB -->
        $form_tindakan = 'Permohonan/page_03_balas.php';
        $this->load->view($form_tindakan);
        ?>
		
		
		
        <!-- PRIVACY TAB -->
        <div class="tab-pane fade" id="privacy">

            <form action="#" method="post">
                <div class="sky-form">

                    <table class="table table-bordered table-striped">
                        <tbody>
                            <tr>
                                <td>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam.</td>
                                <td>
                                    <div class="inline-group">
                                        <label class="radio nomargin-top nomargin-bottom">
                                            <input type="radio" name="radioOption" checked=""><i></i> Yes
                                        </label>

                                        <label class="radio nomargin-top nomargin-bottom">
                                            <input type="radio" name="radioOption" checked=""><i></i> No
                                        </label>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam.</td>
                                <td>
                                    <label class="checkbox nomargin">
                                        <input type="checkbox" name="checkbox" checked=""><i></i> Yes
                                    </label>
                                </td>
                            </tr>
                            <tr>
                                <td>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam.</td>
                                <td>
                                    <label class="checkbox nomargin">
                                        <input type="checkbox" name="checkbox" checked=""><i></i> Yes
                                    </label>
                                </td>
                            </tr>
                            <tr>
                                <td>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam.</td>
                                <td>
                                    <label class="checkbox nomargin">
                                        <input type="checkbox" name="checkbox" checked=""><i></i> Yes
                                    </label>
                                </td>
                            </tr>
                        </tbody>
                    </table>

                </div>

                <div class="margin-top-10">
                    <a href="#" class="btn btn-primary"><i class="fa fa-check"></i> Save Changes </a>
                    <a href="#" class="btn btn-default">Cancel </a>
                </div>

            </form>

        </div>
        <!-- /PRIVACY TAB -->

    </div>

</div>


<?php $this->load->view('admin/Pemohon/detail_pemohon_permohonan'); ?>
</div>