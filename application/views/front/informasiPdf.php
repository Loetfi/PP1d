 
<!-- Page Title -->
<div class="page-title text-center">
    <h2 class="title"><?php echo @$title; ?></h2> 
</div> 
<div class="container">

    <div class="row about-sidebar">

        <div class="col-md-9 about-content">

            <section class="about-company">

                <div class="com"> 
                    <table class="table table-bordered table-striped table-hover">
                        <thead>
                        <tr>
                            <th>No</th>
                            <th>Unit</th>
                            <th>Kategori Informasi</th>
                            <th>Keterangan</th>
                            <th>File</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php $no = 0; foreach($content as $row){ ?>
                        <tr>
                            <td><?php echo ++$no; ?></td>
                            <td><?php echo $row['title']; ?></td>
                            <td><?php echo $row['subtitle']; ?></td>
                            <td><?php echo $row['content']; ?></td>
                            <td>
                                <a href="<?php echo base_url('uploads/contents/'.$row['photo']); ?>" class="btn btn-default btn-sm" target="_blank"><i class="fa fa-file-pdf-o"></i></a>
                            </td>
                        </tr>
                        <?php } ?>
                        </tbody>
                    </table>
                    
					
					<br><br>
                    <br><br><br><br><br><br><br>
                </div>
            </section> 

        </div>

        <div class="col-md-3 sidebar left"> 

            <div class="sidebar-fact">
                <object data="http://kip.esdm.go.id/flash/banner1.swf" type="application/x-shockwave-flash" width="100%" height="461"><param name="quality" value="high" /><param name="movie" value="/flash/banner1.swf" /></object> 

            </div>

        </div>

    </div>

</div>
</main>
<!-- Main Content Section -->