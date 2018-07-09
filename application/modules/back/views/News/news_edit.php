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


<div style="float:right;">
		<a href="" class="btn btn-primary"><i class="icon-chevron-left"></i> Kembali</a>
	</div>
	<br>
	<legend><?php echo $title; ?> #<?php echo $idn['id']; ?></legend>

	

	<?php echo validation_errors(); ?>
	<!-- <form>   -->
	<form action="<?php echo site_url('back/news/edit/'.$idn['id']); ?>" method="POST" role="form" enctype="multipart/form-data">

		<div class="row"> 
			<div class="col-sm-12">
				<h1>ID</h1>
				<!-- Konten Indonesia --> 
				<div class="form-group">
					<label for="">Judul Berita</label>
					<input type="text" class="form-control" id="" placeholder="Judul Berita" name="judulberita" value="<?php   echo set_value('judulberita',isset($idn['title']) ? $idn['title'] : ''); ?>">
				</div>

				<div class="form-group">
					<label for="">Konten</label>
					<textarea cols="80" id="redactor_content" name="isiberita" rows="10"> <?php   echo set_value('isiberita',isset($idn['content']) ? $idn['content'] : ''); ?> </textarea> 
				</div>

				<div class="form-group">
					<label for="">Images</label><br>
					<input type="file" name="filefoto">
				</div> 

				<div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
					<a href="#" class="thumbnail">
						<?php if (isset($idn['gambar'])) { ?>
						<img src="<?php echo base_url('uploads/news/'.$idn['gambar']); ?>" alt="">
						<?php } else {  ?>
						<img src="<?php echo base_url('uploads/1.jpg'); ?>" alt="">
						<?php } ?>
					</a>
				</div> 


				<div class="form-group">
					<label for="">Kategori</label> 
					<?php  
					$q = $this->db->query("SELECT category_id, category_name from master_category
						where status = '1' and relasi = '0' ")->result();

					// echo $idn['category_id'];
					?>

					<select id="grup" class="form-control" name="kategori">
						<option value="0">Pilih Kategori</option>
						<?php foreach ($q as $d) { ?>
						<option value="<?php echo $d->category_id; ?>" <?php echo $idn['category_id'] == $d->category_id ? 'selected=""' : ''; ?> > <?php echo strtoupper($d->category_name); ?></option> 
						<?php } ?> 
					</select> 
				</div>

				<div class="form-group">
					<label for="">Parent Kategori</label>

					<?php  
					$qi = $this->db->query("SELECT category_id, category_name,relasi,status from master_category where status = '1' and relasi = '$idn[category_id]' ")->result();
						?>


						<select class="form-control"  id="allResultOffice" name="parent"> 
							<?php foreach ($qi as $d) { ?>
							<option value="<?php echo $d->category_id; ?>" <?php echo $idn['parent_id'] == $d->category_id ? 'selected=""' : ''; ?> > <?php echo strtoupper($d->category_name); ?></option> 
							<?php } ?> 
						</select> 
					</div>

 


					<div class="form-group">
						<label for="">Tag Berita</label>

						<select class="js-example-tags form-control" multiple="multiple" name="tagberita[]">

							<?php 
							$pecah = explode(',', $idn['tagberita']);

							for ($i=0; $i < count($pecah); $i++) { 
								echo "<option selected=''>".$pecah[$i]."</option>";
							} ?> 
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


			<button type="submit" class="btn btn-primary"><i class="fa fa-icon-pencil"></i> Ubah</button>
			<!--  -->
		</form>  <!-- End Form -->


	</div>
</div> 






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

