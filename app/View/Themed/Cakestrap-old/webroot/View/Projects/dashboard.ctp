<script type="text/javascript">
$(function () {
        $('#container1').highcharts({
            chart: {
                type: 'column',
                margin: [ 50, 50, 100, 80]
            },
            title: {
                text: 'Total number of pest'
            },
            xAxis: {
                categories: <?php echo json_encode($title);?>,
                labels: {
                    rotation: -45,
                    align: 'right',
                    style: {
                        fontSize: '11px',
                        fontFamily: 'Verdana, sans-serif'
                    }
                }
            },
            yAxis: {
                min: 0,
                title: {
                    text: 'Pest'
                }
            },
            legend: {
                enabled: false
            },
            tooltip: {
                formatter: function() {
                    return '<b>'+ this.x +'</b><br/>'+
                        'Number of pest: '+ Highcharts.numberFormat(this.y, 1) ;
                }
            },
            series: [{
                name: 'Number of pest',
                data: <?php  echo json_encode($jobs);?>,
                dataLabels: {
                    enabled: true,
                    rotation: -90,
                    color: '#FFFFFF',
                    align: 'right',
                    x: 4,
                    y: 10,
                    style: {
                        fontSize: '13px',
                        fontFamily: 'Verdana, sans-serif'
                    }
                }
            }]
        });
    });
    

		</script>
        
        <script type="text/javascript">
$(function () {
        $('#container2').highcharts({
            chart: {
                type: 'column'
            },
            title: {
                text: 'Total number of pest'
            },
            xAxis: {
                categories:<?php echo json_encode($title);?>
            },
            yAxis: {
                min: 0,
                title: {
                    text: 'Pest'
                }
            },
            tooltip: {
                headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
                pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
                    '<td style="padding:0"><b>{point.y:.1f}</b></td></tr>',
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
            series: <?php echo json_encode($job_pesttypes2);?>
        });
    });
    

		</script>
	</head>
	<body>
<?php echo $this->Html->script('jQuery-hightchart/highcharts')?>
<?php echo $this->Html->script('jQuery-hightchart/modules/exporting')?>


        <div class="tabbable"> <!-- Only required for left/right tabs -->
    <ul class="nav nav-tabs">
    <li class="active"><a href="#tab1" data-toggle="tab">Section 1</a></li>
    <li><a href="#tab2" data-toggle="tab">Section 2</a></li>
     <li><a href="#tab3" data-toggle="tab">Activity</a></li>
    </ul>
    <div class="tab-content">
    <div class="tab-pane active" id="tab1">
    
<div id="container1" style="min-width: 400px; height: 400px; margin: 0 auto"></div>
    </div>
    <div class="tab-pane notactive" id="tab2">
<div id="container2" style="min-width: 1160px; height: 400px; margin: 0 auto"></div>
    </div>
    
    <div class="tab-pane " id="tab3">
    <!-- Activity --> 
<table class="table table-bordered">
              <thead>
                <tr>
                  <th>Date</th>
                  <th>Activity</th>
                  <th>Chemical</th>
                  <th>Desc</th>
                </tr>
              </thead>
              
              <tbody>
              <?php foreach ($pest_count as $pc){?>
              
              <?php $rowspan = sizeof($pc['Activity']);?>
              <?php foreach ($pc['Activity'] as $ac){?>
              <tr>
                    <?php if($rowspan > 0 ){ ?><td rowspan="<?php echo $rowspan ;?> "><?php echo $pc['Job']['date'];?> (Day:<?php echo $pc['Job']['day'];?>)</td><?php } ?>
                    <td><?php echo $ac['Activitytype']['name'];?></td>
                    <td>
                        <?php $cnt = 1;?>
                        <?php foreach($ac['Chemical'] as $c){?>
                            <?php echo $cnt++;?>&nbsp;)&nbsp;<?php echo $c['name'];?>&nbsp;: &nbsp;<?php echo $c['ChemicalsActivity']['quantity'];?><br />
                        <?php } ?>
                    </td>
                    <td><?php echo $ac['desc'];?></td>
              </tr>
              <?php $rowspan = 0;?>
              <?php } ?>
              <?php } ?>
              </tbody>
</table>
</div>
    </div>
    </div>


<br /><br />
