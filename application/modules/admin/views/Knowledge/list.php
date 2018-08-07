<div class="page-title text-center">
    <h2 class="title"><?php echo @$title; ?></h2> 
</div>
<div class="breadcrumbs">
<?php echo $this->breadcrumbs->show(); ?>
</div>

<!-- CSS DATATABLES -->
<link href="<?php echo base_url('assets/front'); ?>/css/layout-datatables.css" rel="stylesheet" type="text/css" />

<!-- JS DATATABLES -->
<script type="text/javascript" src="<?php echo base_url('assets/front'); ?>/plugins/datatables/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="<?php echo base_url('assets/front'); ?>/plugins/datatables/dataTables.bootstrap.js"></script>
<script type="text/javascript" src="<?php echo base_url('assets/front'); ?>/plugins/select2/js/select2.full.min.js"></script>

<script type="text/javascript"> $(function(){ $('#thisDataTable').dataTable(); }) </script>

<div class="container" style="padding-top: 10px; padding-bottom: 80px; min-height: 500px;">

<!-- nacigasi member -->
   <?php // echo $this->load->view('template/navigasi'); ?>
<!-- end --> 

<br><br>
 <div class="table-responsive">
    <table class="table table-bordered table-striped table-hover" id="thisDataTable">
        <thead>
            <tr>
                <th>No</th>
                <th>Kode Permohonan</th>
                <th>Subjek</th>
                <th>Permintaan</th>
                <th>Tgl Selesai</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php $no=0; foreach($listData as $row){
                $classRow="";$rowColor="";
                $edate = strtotime(date('Y-m-d'));
                if ($row['status'] == 'Selesai') $classRow = 'success';
                ?>
                <tr class="<?php echo $classRow; ?>" style="<?php echo $rowColor; ?>">
                    <td><?php echo ++$no; ?></td>
                    <td><?php echo $row['no_permohonan']; ?></td>
                    <td><?php echo strip_tags($row['info_req']); ?></td>
                    <td><?php echo $row['subjek']; ?></td>
                    <td><?php echo date('Y-m-d H:i', $row['mdate']); ?></td>
                    <td>
                        <a href="<?php echo site_url($this->session->userdata('ses_ppid_user_level').'/permohonan/detail'); ?>/<?php echo $row['no_permohonan']; ?>" class="btn btn-default btn-sm thisForRead" thisCode="<?php echo $row['no_permohonan']; ?>">Detail</a>
                    </td>
                </tr>
                <?php } ?>
            </tbody>
        </table>
        
</div> 
</div> 