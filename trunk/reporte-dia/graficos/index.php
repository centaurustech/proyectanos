
<?php 
  require '../init.php';
  include '../includes/head.php';
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
#link { 
	background-color:#ccc;
	height: 400px; 
	min-width: 310px; 
	max-width: 800px;
	margin: 0 auto;
}
#container { 
	background-color:#ccc;
	height: 400px; 
	min-width: 310px; 
	max-width: 800px;
	margin: 0 auto;
}
#container1 {
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
                text: 'Rainfall (%)'
            }
        },
        tooltip: {
            headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
            pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
                '<td style="padding:0"><b>{point.y:.1f} %</b></td></tr>',
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

        }, {
            name: 'London',
            data: [48.9, 38.8, 39.3, 41.4, 47.0, 48.3, 59.0, 59.6, 52.4, 65.2, 59.3, 51.2]

        }, {
            name: 'Berlin',
            data: [42.4, 33.2, 34.5, 39.7, 52.6, 75.5, 57.4, 60.4, 47.6, 39.1, 46.8, 51.1]

        }]
    });

	

	/*=================*/
	$('#container1').highcharts({
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

<script src="js/highcharts.js"></script>
<script src="js/highcharts-3d.js"></script>
<script src="js/modules/exporting.js"></script>


<div id="link" style="height: 100px"><a href="index.htm">ver lista</a></div>
<div id="container" style="height: 400px"></div>
<div id="container1" style="height: 400px"></div>
<div id="container2" style="height: 400px"></div>
<div id="container3" style="height: 400px"></div>
	</body>
</html>

<?php 

  include '../includes/right.php'; 
  include '../includes/footer.php';
?>