        <script src="https://code.highcharts.com/highcharts.js"></script>
        <script src="https://code.highcharts.com/modules/exporting.js"></script>

        <div id="container" style="min-width: 310px; height: 400px; margin: 0 auto"></div>

        <div class="col-md-8" style="padding-bottom: 50px">
            <div class="panel panel-warning">
                <div class="panel-heading">
                    <h3 class="panel-title">Ubah Profil</h3> 
                </div>
                <div class="panel-body">
                    <form id="contact_form" class="form" action="php/contact.php" method="post"> 
                        <!-- Text input-->
                        <div class="form-group">
                            <input name="name" placeholder="Username" class="form-control" type="text" required title="Please enter your full name">
                        </div>
                        <!-- Email input-->
                        <div class="form-group">
                            <input name="email" placeholder="Password" class="form-control" type="password" required title="Masukan Password" data-msg-email="Ouch, that doesn't look like an email">
                        </div> 
                        <!-- Button -->
                        <button type="submit" class="btn btn-default" id="js-contact-btn">Ubah </button>

                        <div id="js-contact-result" data-success-msg="Form submitted successfully." data-error-msg="Oops. Something went wrong."></div>

                    </form> 

                    <br><br><br><br><br><br><br><br>
                </div>
            </div>
            
        </div> 


        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">Kiri Bawah</h3>
            </div>
            <div class="panel-body">

             <form class="form-inline">
              <div class="form-group">
                <label for="exampleInputName2">Name</label>
                <input type="text" class="form-control" id="exampleInputName2" placeholder="Jane Doe">
            </div>
            <div class="form-group">
                <label for="exampleInputEmail2">Email</label>
                <input type="email" class="form-control" id="exampleInputEmail2" placeholder="jane.doe@example.com">
            </div>
            <button type="submit" class="btn btn-default">Send invitation</button>
        </form>


        <div id="kiribawah" style="min-width: 310px; height: 400px; margin: 0 auto"></div>

    </div>
</div>



<script type="text/javascript">
    // Build the chart
    Highcharts.setOptions({
        colors: ['#FFDA44', '#000000']
    });

    Highcharts.chart('kiribawah', {
        chart: {
            plotBackgroundColor: null,
            plotBorderWidth: null,
            plotShadow: false,
            type: 'pie'
        },
        title: {
            text: 'Browser market shares January, 2015 to May, 2015'
        },
        tooltip: {
            pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
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
            name: 'Brands',
            colorByPoint: true,
            data: <?php echo json_encode($kiribawah, JSON_NUMERIC_CHECK);?> 
        }]
    });

</script>

<?php

exit();

echo json_encode($kbii);
?>
<?php print_r($kiribawah); ?>

<script type="text/javascript">
    Highcharts.chart('container', {
        chart: {
            type: 'column'
        },
        title: {
            text: 'Monthly Average Rainfall'
        },
        subtitle: {
            text: 'Source: WorldClimate.com'
        },
        xAxis: {
            categories: [
            'Jan',
            'Feb',
            'Mar',
            'Apr',
            'May',
            'Jun',
            'Jul',
            'Aug',
            'Sep',
            'Oct',
            'Nov',
            'Dec'
            ],
            crosshair: true
        },
        yAxis: {
            min: 0,
            title: {
                text: 'Rainfall (mm)'
            }
        },
        tooltip: {
            headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
            pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
            '<td style="padding:0"><b>{point.y:.1f} mm</b></td></tr>',
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
        series: [{
            name: 'Tokyo',
            data: [49.9, 71.5, 106.4, 129.2, 144.0, 176.0, 135.6, 148.5, 216.4, 194.1, 95.6, 54.4]

        }, {
            name: 'New York',
            data: [83.6, 78.8, 98.5, 93.4, 106.0, 84.5, 105.0, 104.3, 91.2, 83.5, 106.6, 92.3]

        } ]
    });
</script>


