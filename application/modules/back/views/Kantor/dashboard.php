<?php echo $map['js']; ?>
<h1>Dashboard</h1> 

<div class="row">
	<div class="col-md-3">
		<div class="form-group">
			<select class="form-control" name="kantor_grup">
				<?php for($idx=0; $idx<count($arrKota); $idx++){ ?>
				<option value="<?php echo $arrKota[$idx]; ?>"><?php echo $arrKota[$idx]; ?></option>
				<?php } ?>
			</select>
		</div>
		<div class="form-group">
			<select class="form-control" name="kantor_grup">
				<?php for($idx=0; $idx<count($arrKotaGrup[$arrKota[0]]['nama']); $idx++){ ?>
				<option value="<?php echo $arrKotaGrup[$arrKota[0]]['id'][$idx]; ?>"><?php echo $arrKotaGrup[$arrKota[0]]['nama'][$idx]; ?></option>
				<?php } ?>
			</select>
		</div>
		<?php foreach($listKantor as $row){ ?>
		<button type="button" class="btn" onclick="newLocation(<?php echo $row['lat']; ?>,<?php echo $row['long']; ?>)"><?php echo $row['nama_kantor']; ?></button>
		<?php } ?>
		
	</div>
	<div class="col-md-9">
		<?php echo $map['html']; ?>
	</div>



<script>
function newLocation(newLat,newLng){
	map.panTo({
		lat : newLat,
		lng : newLng
	});
	map.setZoom(18);
}
</script>