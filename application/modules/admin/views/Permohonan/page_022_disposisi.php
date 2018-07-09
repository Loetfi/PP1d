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
                    Sifat: <?php echo $detail_disposisi['sifat']; ?><hr>
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

<!-- Balasan Disposisi TAB -->
<div class="tab-pane fade" id="BalasanDisposisi">
    <!-- div class="toggle toggle-transparent-body" -->
        <div class="panel-group" id="accordion">
        <?php $no=0; if (count($list_disposisi) > 0){ foreach($list_disposisi as $row){ ?>
        <div class="panel panel-default">
            <div class="panel-heading" <?php echo $row['status']=='Balas'?'style="background: #dff0d8; color: #3c763d;"':'' ?>>
                <h4 class="panel-title">
                    <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapse<?php echo $no; ?>"><?php echo $row['nama_unit']; ?></a>
                </h4>
            </div>
            <div id="collapse<?php echo $no; ?>" class="panel-collapse collapse">
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
        
        <!-- div class="toggle">
            <label <?php echo $row['status']=='Balas'?'style="background: #dff0d8; color: #3c763d;"':'' ?>>
                Unit: <?php echo $row['nama_unit']; ?>
            </label>
            <div class="toggle-content">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <?php echo $row['replay']; ?>
                    </div>
                    <div class="panel-footer panel-footer-transparent">
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
        </div -->
        <?php $no++; }  } ?>
        </div>
        
    <!-- /div -->
    
</div>
<!-- /Balasan Disposisi TAB -->