<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/assets_backend/select2/select2.css'); ?>">
<script type="text/javascript" src="<?php echo base_url('assets/assets_backend/select2/select2.js'); ?>"></script>


<!-- Redactor is here -->
<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/assets_backend/redactor/css/style.css'); ?>" />
<link rel="stylesheet" href="<?php echo base_url('assets/assets_backend/redactor/redactor/redactor.css'); ?>" />
<script src="<?php echo base_url('assets/assets_backend/redactor/redactor/redactor.min.js'); ?>"></script> 


<script type="text/javascript">
  $(document).ready(
    function()
    {
      $('#redactor_content').redactor({
        imageUpload: '../../../assets/assets_backend/redactor/demo/scripts/image_upload.php' 
      });

      $('#redactor_content_eng').redactor({
        imageUpload: '../../../assets/assets_backend/redactor/demo/scripts/image_upload.php' 
      });
    }
    );
  </script>


  <legend><?php echo $title; ?></legend>

  <?php echo validation_errors(); ?>

  <?php echo $error; ?>
  <!-- <form>   -->
  <form action="<?php echo site_url('back/news/proses/'); ?>" method="POST" role="form" enctype="multipart/form-data">

    <div class="row">
      <div class="col-sm-6">
        <h1>ID</h1>
        <!-- Konten Indonesia -->
        <div class="form-group">
          <label for="">Judul Berita</label>
          <input type="text" class="form-control" id="" placeholder="Judul Berita" name="judulberita" value="<?php echo set_value('judulberita'); ?>">
        </div>

        <div class="form-group">
          <label for="">Konten</label>
          <textarea  cols="80" id="redactor_content"  name="isiberita" rows="10"> <?php echo set_value('isiberita'); ?> </textarea>
        </div>

        <div class="form-group">
          <label for="">Images</label><br>
          <input type="file" name="filefoto">
        </div>  
 
        <div class="form-group">
          <label for="">Kategori</label> 
            <?php  
            $q = $this->db->query("SELECT category_id, category_name from master_category
              where status = '1' and relasi = '0' ")->result();
              ?>

              <select id="grup" class="form-control" name="kategori">
                <option value="0">Pilih Kategori</option>
                <?php foreach ($q as $d) { ?>
                <option value="<?php echo $d->category_id; ?>"><?php echo strtoupper($d->category_name); ?></option> 
                <?php } ?> 
              </select> 
        </div>

        <div class="form-group">
          <label for="">Parent Kategori</label>
          <select class="form-control"  id="allResultOffice" name="parent">
              <option value="0"> Pilih Dahulu Kategori</option>
          </select> 
          </div> 
 

        <div class="form-group">
          <label for="">Tag Berita</label>

          <select class="js-example-tags form-control" multiple="multiple" name="tagberita[]">

            <?php foreach ($bu as $c) { ?>
            <option><?php echo $c->nama_bu; ?></option>
            <?php } ?>

          </select>
        </div>


        <div class="alert alert-info">
         <strong>Perhatian</strong>, pastikan gambar sudah dipilih.
       </div>


       <div class="form-group">
        <label for="">Status</label><br>
        <input type="radio" name="status" checked="" value="1"> Publish
        <input type="radio" name="status" value="0"> Draft
      </div>


      <!-- end -->
    </div>
    <!-- End konten bahasa indonesia -->

    <!-- start konten bahasa inggris -->
    <div class="col-sm-6"> 
      <h1>EN</h1>

      <!-- Konten Indonesia -->
      <div class="form-group">
       <label for="">Judul Berita</label>
       <input type="text" class="form-control" id="" placeholder="Judul Berita" name="EN_judulberita" value="<?php echo set_value('EN_judulberita'); ?>">
     </div>

     <div class="form-group">
       <label for="">Konten</label>
       <textarea cols="80"  id="redactor_content_eng" rows="10" name="EN_isiberita"> <?php echo set_value('EN_isiberita'); ?> </textarea>
     </div>

   </div>


 </div>

 <button type="submit" class="btn btn-primary">Submit</button>
 <!--  -->
</form>  <!-- End Form -->






<script type="text/javascript">


 $(".js-example-tags").select2({
  tags: true
});

 $(document).ready(function() {
       /*  $('#kota').change(function(){
          kota = $(this).val();
          kantor_grup = $('#grup').val();
          $.ajax({
            type: 'POST',
            dataType: 'json',
            url: '<?php echo site_url('front/contact/getGrup'); ?>',
            data: {
              kota: kota
            },
            success: function(data) {
              option = '';
              for (var i = 0; i < data.dataGrup.length; i++) {
                if (data.dataGrup[i].id == parseInt(kantor_grup))
                  option = option + '<option value="'+data.dataGrup[i].id+'" selected>'+data.dataGrup[i].nama_grup+'</option>';
                else 
                  option = option + '<option value="'+data.dataGrup[i].id+'">'+data.dataGrup[i].nama_grup+'</option>';
                
              }
              $('#grup').html(option);
              $('#grup').change();
            }
          });
        }); */
        $('#grup').change(function(){
          kantor_grup = $(this).val();
          kota = $('#kota').val();
          $.ajax({
            type: 'POST',
            url: '<?php echo site_url('back/news/getDetail'); ?>',
            data: {
              kota: kota,
              kantor_grup: kantor_grup
            },
            success: function(data) {
              $('#allResultOffice').html(data);
            }
          });
        });
        
        $('#kota').change();
      });

    </script>


</div>
</div>
 