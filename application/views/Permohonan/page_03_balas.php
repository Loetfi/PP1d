<!-- Balasan TAB -->
<div class="tab-pane fade" id="Balasan">
    <div class="box-light">
        <div class="row">
            <?php if ($detail['status'] == 'Selesai'){ ?>
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
                    <a href="<?php echo site_url('permohonan/downloadFile/'.str_replace('/','-',$no_permohonan).'/'.$namaFile); ?>" class="btn btn-info btn-sm margin-bottom-10">
                        <i class="fa fa-cloud-download"></i> <?php echo $namaFileAsli; ?>
                    </a>&nbsp;
                    <?php } ?>
                </div>
            </div>
            <?php } else { ?>
            <div class="panel panel-warning">
                <div class="panel-heading">
                    <h4 class="panel-title">
                        Belum Ada Balasan
                    </h4>
                </div>
                <div class="panel-body">
                    -
                </div>
            </div>
            <?php } ?>
        </div>
    </div>
</div>
<!-- /Balasan TAB -->