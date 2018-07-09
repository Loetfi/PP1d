<?php include 'kepala.php'; ?>  

<div class="container">
    <h6>Navigasi Member : </h6>
    <div class="row about-sidebar">

      <?php include 'menuadmin.php'; ?>

    <!-- Breadcrumbs --> 
    <div class="col-md-12 about-content">  
        <br><br><br>
        <link href="http://localhost:8080/projekan/esdm/baru/datatable/dt/css/jquery.dataTables.min.css" rel="stylesheet"> 
        <script src="http://localhost:8080/projekan/esdm/baru/datatable/dt/js/jquery.dataTables.min.js"></script>


        <h3>Master Permohonan</h3>
        <hr>
        <!-- Start Table -->
        <table id="table" class="display" cellspacing="0" width="100%">
            <thead>
                <tr>  
                    <th>Judul Berita </th>
                    <th>Kategori</th> 
                    <th>Tanggal</th>  
                    <th>Status</th>
                    <th>Tag</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
            </tbody> 
        </table> 


    </section>

    <br><br><br><br><br><br><br><br><br><br>
</div>
</section> 

</div> 

</div>

</div>
</main>
<!-- Main Content Section -->

<!-- Start JS -->
<script type="text/javascript">

    var table;

    $(document).ready(function() {

    //datatables
    table = $('#table').DataTable({ 

        "processing": true, //Feature control the processing indicator.
        "serverSide": true, //Feature control DataTables' server-side processing mode.
        "order": [], //Initial no order.

        // Load data for the table's content from an Ajax source
        "ajax": {
            "url": "http://moneter.co.id/akun/posts/ambildata",
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




<?php include 'footer.php'; ?>