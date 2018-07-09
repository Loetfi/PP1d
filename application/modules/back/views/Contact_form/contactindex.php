<legend>Contact Form</legend>
<!-- Start Table -->
<table id="table" class="display" cellspacing="0" width="100%">
    <thead>
        <tr>  

            <th>Nama</th>  
            <th>Email</th> 
            <th>Telepon</th>   
            <th>Nama Pekerjaan</th> 
            <th>Perusahaan</th>
            <th>Nama Kategori</th>  
            <th>Subjek</th>
            
            
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
        "language": {
        "processing": "<img src='<?=base_url('assets/assets_backend/images/loading/default.gif')?>'/>" //add a loading image,simply putting <img src="loader.gif" /> tag.
    },
        "serverSide": true, //Feature control DataTables' server-side processing mode.
        "order": [], //Initial no order.

        // Load data for the table's content from an Ajax source   
        "ajax": {
            "url": "<?php echo site_url('back/kantor/contact_ambildata')?>",
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