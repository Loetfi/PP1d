<h1><?php echo @$title;  ?> | Grup - <?php echo  @$get = $_GET['nama']; ?></h1>

<div style="float:right;">
    <a href="<?php echo site_url('back/hak_akses'); ?>" class="btn btn-primary"><i class="fa fa-chevron-left"></i> Back</a>
</div>

<a href="<?php echo site_url('back/hak_akses/addrole/'.$id.'?nama='.$get); ?>" class="btn btn-primary"><i class="fa fa-plus"></i> Add Role</a>
<br> 
<br> 

<!-- Pesan --> 
<?php echo $this->session->flashdata('pesan'); ?>
<!-- End Pesan -->

<!-- Start Table -->
<table id="table" class="display" cellspacing="0" width="100%">
    <thead>
        <tr>  
            <!-- <th>ID Menu Detail</th>   -->
            <th>Sub Menu Admin</th>
            <th>Link Menu Detail</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
    </tbody> 
</table>
</div>


<!-- Start JS --> 
<script type="text/javascript">

    var table;

    $(document).ready(function() {

    //datatables
    table = $('#table').DataTable({ 
         // paging:false 
        "processing": true, //Feature control the processing indicator.
        "serverSide": true, //Feature control DataTables' server-side processing mode.
         //Feature control the processing indicator.
        "language": {
        "processing": "<img src='<?=base_url('assets/assets_backend/images/loading/default.gif')?>'/>" //add a loading image,simply putting <img src="loader.gif" /> tag.
        },

        "order": [], //Initial no order.

        // Load data for the table's content from an Ajax source
        "ajax": {
            "url": "<?php echo site_url('back/hak_akses/ambildatadetail/'.$id)?>",
            "type": "POST"
        },

        //Set column definition initialisation properties.
        "columnDefs": [
        { 
            "targets": [ 0 ], //first column / numbering column
            "orderable": false, //set not orderable
        },
        ],

    });

});
</script>

</body>
</html> 