<?php if ($this->session->flashdata('itemFlashData') == 'insertSukses'){ ?>
<div class="alert alert-block alert-success fade in">
	<button data-dismiss="alert" class="close" type="button">x</button>
	<h4 class="alert-heading margin-bottom-10"><i class="ti-check"></i> Success!</h4>
</div>
<?php } ?>

<h5 class="over-title margin-bottom-15"><span class="text-bold">Investor Report</span></h5> 

<div class="row">
	<div class="col-md-12">
		
		<table class="table table-striped" cellspacing="0">
			<thead>
				<tr>
					<th rowspan="2">(Dinyatakan dalam jutaan rupiah, kecuali dinyatakan lain)</th>
					<th colspan="<?php echo count($arrPeriode); ?>">Tahun</th>
				</tr>
				<tr>
					<?php for($i=0; $i<count($arrPeriode); $i++){ ?>
					<th><?php echo $arrPeriode[$i]; ?></th>
					<?php } ?>
				</tr>
			</thead>
			<tbody>
			<?php 
			$kategori = 1;
			for($i=0; $i<count($allRow[$kategori]); $i++){ ?>
			<tr>
				<td><?php echo $allRow[$kategori][$i]['kepala'] == '0' ? '<b>'.$allRow[$kategori][$i]['nama'].'</b>' : '->'.$allRow[$kategori][$i]['nama']; ?></td>
				<?php for($thn=0; $thn<count($arrPeriode); $thn++){ ?>
				<td align="right">
					<?php echo $allRow[$kategori][$i][$arrPeriode[$thn]] != '' ? number_format($allRow[$kategori][$i][$arrPeriode[$thn]],2) : ''; ?>
				</td>
				<?php } ?>
			</tr>
			<?php } ?>
			</tbody>
		</table>
		<br><br>
		<table class="table table-striped" cellspacing="0">
			<thead>
				<tr>
					<th rowspan="2"></th>
					<th colspan="<?php echo count($arrPeriode); ?>">Tahun</th>
				</tr>
				<tr>
					<?php for($i=0; $i<count($arrPeriode); $i++){ ?>
					<th><?php echo $arrPeriode[$i]; ?></th>
					<?php } ?>
				</tr>
			</thead>
			<tbody>
			<?php 
			$kategori = 2;
			for($i=0; $i<count($allRow[$kategori]); $i++){ ?>
			<tr>
				<td><?php echo $allRow[$kategori][$i]['kepala'] == '0' ? '<b>'.$allRow[$kategori][$i]['nama'].'</b>' : '->'.$allRow[$kategori][$i]['nama']; ?></td>
				<?php for($thn=0; $thn<count($arrPeriode); $thn++){ ?>
				<td align="right">
					<?php echo $allRow[$kategori][$i][$arrPeriode[$thn]] != '' ? number_format($allRow[$kategori][$i][$arrPeriode[$thn]],2) : ''; ?>
					<?php echo $allRow[$kategori][$i]['satuan'] == 'percen' ? '%' : ''; ?>
				</td>
				<?php } ?>
			</tr>
			<?php } ?>
			</tbody>
		</table>
	</div>
</div>
