<a href="<?php echo site_url('back/auth/create_group/'); ?>" class="btn btn-primary"><i class="fa fa-plus"></i> Add Group</a>
<br><br>


<!-- Pesan -->
<?php echo $this->session->flashdata('message'); ?>
<!-- End Pesan -->


<!-- Start Table -->
<table id="table" class="display" cellspacing="0" width="100%">
    <thead>
        <tr> 
            <th>Nama Groups</th>
            <th>Deskripsi</th> 
            
            <!-- <?php if ($this->ion_auth->is_admin()) { ?>
            <th>Create User</th>
            <th>Update User</th>
            <th>Create Date</th>  
            <th>Update Date</th>
            <?php } ?> -->

            <th>Action </th>
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

        "processing": true, //Feature control the processing indicator.
        "serverSide": true, //Feature control DataTables' server-side processing mode.
        "order": [], //Initial no order.

        "language": {
        "processing": "<img src='<?=base_url('assets/assets_backend/images/loading/default.gif')?>'/>" //add a loading image,simply putting <img src="loader.gif" /> tag.
        },

        // Load data for the table's content from an Ajax source
        "ajax": {
            "url": "<?php echo site_url('back/auth/ambildatagroups')?>",
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