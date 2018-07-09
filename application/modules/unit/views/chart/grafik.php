<div class="page-title text-center">
    <h2 class="title"><?php echo @$title; ?></h2> 
</div>
<div class="breadcrumbs">
    <?php echo $this->breadcrumbs->show(); ?>
</div>

<!-- script src="https://code.highcharts.com/highcharts.js"></script -->
<!-- script src="https://code.highcharts.com/modules/exporting.js"></script --> 
<script src="<?php echo base_url('assets/front/plugins/highcharts/highcharts.js'); ?>"></script>
<script src="<?php echo base_url('assets/front/plugins/highcharts/exporting.js'); ?>"></script>

<br><br>
<div class="table-responsive">
    <div class="col-md-12" style="padding-bottom: 50px">
        <div class="panel panel-warning">
            <div class="panel-heading">
                <h3 class="panel-title">Tahunan</h3> 
            </div>
            <div class="panel-body">
				<select class="form-control" id="tahunTahunan">
                    <?php for($i=date('Y'); $i>2015; $i--){ ?>
                    <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
                    <?php } ?>
                </select>
                <div id="grafikTahunan"></div>
            </div>
        </div>
    </div> 
    
    <div class="col-md-6" style="padding-bottom: 50px">
        <div class="panel panel-warning">
            <div class="panel-heading">
                <h3 class="panel-title">Tindakan</h3> 
            </div>
            <div class="panel-body">
				<form class="form" action="#"> 
                    <div class="form-group">
                        <select class="form-control" id="bulanTindakan">
							<?php for($i=1; $i<=12; $i++){ ?>
                            <option value="<?php echo $i; ?>" <?php echo (int)date('m')-1 == $i ? 'selected':''; ?>><?php echo date('F', mktime(0, 0, 0, $i, 10)); ?></option>
							<?php } ?>
                        </select>
                    </div> 
                </form>
                <div id="pieTindakan" style="min-width: 310px; height: 400px; margin: 0 auto"></div>
            </div>
        </div>
    </div> 

	<div class="col-md-6" style="padding-bottom: 50px">
        <div class="panel panel-warning">
            <div class="panel-heading">
                <h3 class="panel-title">Sumber Permohonan</h3> 
            </div>
            <div class="panel-body">
                <form class="form" action="#"> 
                    <div class="form-group">
                        <select class="form-control" id="bulanSumber">
							<?php for($i=1; $i<=12; $i++){ ?>
                            <option value="<?php echo $i; ?>" <?php echo (int)date('m')-1 == $i ? 'selected':''; ?>><?php echo date('F', mktime(0, 0, 0, $i, 10)); ?></option>
							<?php } ?>
                        </select>
                    </div> 
                </form>
				
                <div id="pieSumber" style="min-width: 310px; height: 400px; margin: 0 auto"></div>
            </div>
        </div>
    </div> 

    
<script type="text/javascript">
    
    Highcharts.setOptions({
        colors: ['#FFDA44', '#000000']
    });
</script>

</div> 
<script>

// $('#grafikTahunan').highcharts(function(){
    
// });

$('#bulanTindakan').change(function(){
	$.ajax({
        method: 'POST',
        type: 'json',
        url: '<?php echo site_url('unit/chart/getDiagramPieTindakan'); ?>',
        data: {
            tahun: tahun,
            bulan: $('#bulanTindakan').val(),
        },
        beforeSend: function( ) {
            // $('.card-loading').css('display','block');
        },
        success: function(data) {
            
            $('#pieTindakan').highcharts({
                credits: { enabled: false },
                chart: {
					plotBackgroundColor: null,
					plotBorderWidth: null,
					plotShadow: false,
					type: 'pie'
				},
				title: {
					text: 'Tindakan'
				},
				tooltip: {
					pointFormat: '{point.name}: <b>{point.percentage:.1f}%</b>'
				},
				plotOptions: {
					pie: {
						allowPointSelect: true,
						cursor: 'pointer',
						dataLabels: {
							enabled: false
						},
						showInLegend: true
					}
				},
				series: [{
					name: 'Tindakan',
					colorByPoint: true,
					data: data.series
				}]
            });

        },
        error: function() {
            // alert('Some Error. Please Try Again');
        },
        complete: function(){
            // $('.card-loading').css('display','none');
        }
    });
});
$('#bulanSumber').change(function(){
	$.ajax({
        method: 'POST',
        type: 'json',
        url: '<?php echo site_url('unit/chart/getDiagramPieSumber'); ?>',
        data: {
            tahun: tahun,
            bulan: $('#bulanSumber').val(),
        },
        beforeSend: function( ) {
            // $('.card-loading').css('display','block');
        },
        success: function(data) {
            
            $('#pieSumber').highcharts({
                credits: { enabled: false },
                chart: {
					plotBackgroundColor: null,
					plotBorderWidth: null,
					plotShadow: false,
					type: 'pie'
				},
				title: {
					text: 'Sumber Permohonan'
				},
				tooltip: {
					pointFormat: '{point.name}: <b>{point.percentage:.1f}%</b>'
				},
				plotOptions: {
					pie: {
						allowPointSelect: true,
						cursor: 'pointer',
						dataLabels: {
							enabled: false
						},
						showInLegend: true
					}
				},
				series: [{
					name: 'Sumber',
					colorByPoint: true,
					data: data.series
				}]
            });

        },
        error: function() {
            // alert('Some Error. Please Try Again');
        },
        complete: function(){
            // $('.card-loading').css('display','none');
        }
    });
	
});

$('#tahunTahunan').change(function(){
    tahun = $(this).val();
    $.ajax({
        method: 'POST',
        type: 'json',
        url: '<?php echo site_url('unit/chart/getDiagramBatang'); ?>',
        data: {
            tahun: tahun
        },
        beforeSend: function( ) {
            // $('.card-loading').css('display','block');
        },
        success: function(data) {
            // console.log(data);
            
            // Highcharts.chart('grafikTahunan', {})
            $('#grafikTahunan').highcharts({
                chart: { type: 'column' },
                credits: { enabled: false },
                title: { text: 'Rekap Tahunan ' },
                // subtitle: { text: 'Source: WorldClimate.com' },
                xAxis: {
                    categories: data.categories,
                    crosshair: true 
                },
                yAxis: {
                    min: 0,
                    title: {
                        text: 'Terhitung'
                    }
                },
                tooltip: {
                    headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
                    pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
                    '<td style="padding:0"><b>{point.y:.0f} permohonan</b></td></tr>',
                    footerFormat: '</table>',
                    shared: true,
                    useHTML: true
                },
                plotOptions: {
                    column: {
                        pointPadding: 0.2,
                        borderWidth: 0
                    }
                },
                series: data.series
            });

        },
        error: function() {
            // alert('Some Error. Please Try Again');
        },
        complete: function(){
            // $('.card-loading').css('display','none');
        }
    });
	
	$('#bulanTindakan').change();
	$('#bulanTerusan').change();
	$('#bulanSumber').change();
	
	
	
});


$('#tahunTahunan').change();
</script>
