
<?php 
  require '../../../init.php';
  include '../../../includes/head.php';
?>

<!DOCTYPE HTML>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		<title>Highcharts Example</title>

		<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>
		<style type="text/css">
		body{
			background-color:#e8e3e9;}
#container {
	height: 400px; 
	min-width: 310px; 
	max-width: 800px;
	margin: 0 auto;
}
#container2 {
	height: 400px; 
	min-width: 310px; 
	max-width: 800px;
	margin: 0 auto;
}
#container3 {
	height: 400px; 
	min-width: 310px; 
	max-width: 800px;
	margin: 0 auto;
}

${demo.css}
		</style>
		<script type="text/javascript">
$(function () {
	$('#container').highcharts({
        chart: {
            type: 'column',
            margin: 75,
            options3d: {
                enabled: true,
                alpha: 10,
                beta: 25,
                depth: 70
            }
        },
        title: {
            text: 'grafico de abandono'
        },
        subtitle: {
            text: ''
        },
        plotOptions: {
            column: {
                depth: 25
            },
			showInLegend: true
        },
        xAxis: {
            categories: Highcharts.getOptions().lang.shortMonths
        },
        yAxis: {
            title: {
                text: null
            }
        },
        series: [{
            name: 'Sales',
            data: [8, 3, null, 4, 0, 5, 1, 4, 6, 3]
			
			
			
		<?php //muestra casos completos
	$sid = $rowQ['id_encuesta'];

	$sql2 = MYSQL_2::Bits("SELECT max(lastpage) FROM survey_{$sid}");
	$abandono = 0;
	while ($aban = mysqli_fetch_assoc($sql2)) { 
	$c += ($aban['completed'] != 'N' && $aban['completed'] != 'Q');  }	
	echo $abandono; ?>
	
	
        }]
    });
	
	

        // Build the chart
        $('#container2').highcharts({
            chart: {
                plotBackgroundColor: null,
                plotBorderWidth: null,
                plotShadow: false
            },
            title: {
                text: 'Browser market shares at a specific website, 2014'
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
                type: 'pie',
                name: 'Browser share',
                data: [
                    ['Firefox',   45.0],
                    ['IE',       26.8],
                    {
                        name: 'Chrome',
                        y: 12.8,
                        sliced: true,
                        selected: true
                    },
                    ['Safari',    8.5],
                    ['Opera',     6.2],
                    ['Others',   0.7]
                ]
            }]
        });/**/
    
	
	 $('#container3').highcharts({
        chart: {
            type: 'pie',
            options3d: {
                enabled: true,
                alpha: 45,
                beta: 0
            }
			
        },
        title: {
            text: 'Browser market shares at a specific website, 2014'
        },
        tooltip: {
            pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
        },
        plotOptions: {
            pie: {
                allowPointSelect: true,
                cursor: 'pointer',
                depth: 35,
                dataLabels: {
                    enabled: true,
                    format: '{point.name}'
                }
            }
        },
        series: [{
            type: 'pie',
            name: 'Browser share',
            data: [
                ['Firefox',   45.0],
                ['IE',       3.0],
                {
                    name: 'Chrome',
                    y: 12.8,
                    sliced: true,
                    selected: true
                },
                ['Safari',    8.5],
                ['Opera',     6.2],
                ['Others',   0.7]
            ]
        }]
    });
	
	
	
});
		</script>
	</head>
	<body>

<script src="../../js/highcharts.js"></script>
<script src="../../js/highcharts-3d.js"></script>
<script src="../../js/modules/exporting.js"></script>

<div id="container" style="height: 400px"></div>
<div id="container2" style="height: 400px"></div>
<div id="container3" style="height: 400px"></div>
	</body>
</html>

<?php 
  include '../../../includes/right.php'; 
  include '../../../includes/footer.php';
?>