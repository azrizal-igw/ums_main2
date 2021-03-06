
  <!--[if lt IE 9]><script language="javascript" type="text/javascript" src="../excanvas.js"></script><![endif]-->
  <!--
  <link rel="stylesheet" type="text/css" href="../jquery.jqplot.min.css" />
  <link rel="stylesheet" type="text/css" href="../examples/examples.css" />-->
  <?php
  echo $html->css('jqplot/jquery.jqplot.min'); 
  echo $html->css('jqplot/examples.css'); 
  //echo $strList;
  ?>
  
  <!-- BEGIN: load jquery -->
  <!--
  <script language="javascript" type="text/javascript" src="../jquery.min.js"></script>-->
  <?php  echo  $javascript->link('jqplot/jquery.min'); ?>
  <!-- END: load jquery -->
  
  <!-- BEGIN: load jqplot -->
  <!--
  <script language="javascript" type="text/javascript" src="../jquery.jqplot.min.js"></script>
  <script language="javascript" type="text/javascript" src="../plugins/jqplot.barRenderer.min.js"></script>
  <script language="javascript" type="text/javascript" src="../plugins/jqplot.highlighter.min.js"></script>
  <script language="javascript" type="text/javascript" src="../plugins/jqplot.cursor.min.js"></script> 
  <script type="text/javascript" src="./jquery-ui/js/jquery.effects.core.min.js"></script>
  <script type="text/javascript" src="./jquery-ui/js/jquery.effects.blind.min.js"></script>
  <script type="text/javascript" src="../plugins/jqplot.categoryAxisRenderer.min.js"></script>
  -->
  <?php
	echo  $javascript->link('jqplot/jquery.jqplot.min');
	echo  $javascript->link('jqplot/jqplot.barRenderer.min');
	echo  $javascript->link('jqplot/jqplot.highlighter.min');
	echo  $javascript->link('jqplot/jqplot.categoryAxisRenderer.min');
	echo  $javascript->link('jqplot/jqplot.cursor.min');
	echo  $javascript->link('jqplot/jquery.effects.core.min');
	echo  $javascript->link('jqplot/jquery.effects.blind.min');?>
  
  <!-- END: load jqplot -->

  <style type="text/css">
    .jqplot-target {
        margin-bottom: 2em;
    }
    
    pre {
        background: #D8F4DC;
        border: 1px solid rgb(200, 200, 200);
        padding-top: 1em;
        padding-left: 3em;
        padding-bottom: 1em;
        margin-top: 1em;
        margin-bottom: 4em;
        
    }
    
    p {
        margin: 2em 0;
    }
    
    .note {
        font-size: 0.8em;
    }

    .jqplot-breakTick {
        
    }
  </style>
  
  <script class="code" type="text/javascript">

    $(document).ready(function () {
      var s1 = [<?php echo $strList[0]; ?>]; 
      //var s1 = [[2002, 112000], [2003, 122000], [2004, 104000], [2005, 99000], [2006, 121000], 
      //[2007, 148000], [2008, 114000], [2009, 133000], [2010, 161000], [2011, 173000]];
      var s2 = [<?php echo $strList[1]; ?>]; 
	  //[[2002, 10200], [2003, 10800], [2004, 11200], [2005, 11800], [2006, 12400], 
      //[2007, 12800], [2008, 1200], [2009, 12600], [2010, 13100]];
      var tick = [<?php echo $strTick; ?>];
	  
      plot1 = $.jqplot("chart1", [s2, s1], {
      //plot1 = $.jqplot("chart1", [s1], {
        cursor: {
            show: true,
            zoom: false,
            looseZoom: true,
            showTooltip: false
        },
        series:[
          {
            renderer: $.jqplot.BarRenderer,
            showHighlight: false,
            yaxis: 'y2axis',
            rendererOptions: {
              barWidth: 15,
              barPadding: -15,
              barMargin: 0,
              highlightMouseOver: false
            }
          }, {}],
          axesDefaults: {
            pad: 0
          },
          axes: {
            // These options will set up the x axis like a category axis.
            xaxis: {
              //tickInterval: 1,
			  renderer: $.jqplot.CategoryAxisRenderer,
			  ticks: tick,
              drawMajorGridlines: false,
              drawMinorGridlines: true,
              drawMajorTickMarks: false,
              rendererOptions: {
                //tickInset: 0.5,
                //minorTicks: 1
              }
            },
            yaxis: {
              rendererOptions: {
                forceTickAt0: true,
				min: 0,
				max: 150000
              }
            },
            y2axis: {
              rendererOptions: {
                // align the ticks on the y2 axis with the y axis.
                alignTicks: true,
                forceTickAt0: true,
				min: 0,
				max: 150000
              }
            }
          },
          highlighter: {
            show: true, 
            showLabel: true, 
            tooltipAxes: 'y',
            sizeAdjust: 7.5 , tooltipLocation : 'ne' , formatString:"$%'i"}
      });

      // Add animation to the bars and line.
      // use jquery-ui to initially hide the canvases for the series.
      // Then use the 'blind' effect to show the canvases.

      plot1.series[0].canvas._elem.hide();
      plot1.series[1].canvas._elem.hide();
      plot1.series[0].canvas._elem.show('blind', {direction: 'down'}, 2000);
      plot1.series[1].canvas._elem.show('blind', {direction: 'left'}, 2000);
    });


</script>

<script type="text/javascript">    
    $(document).ready(function(){
        $('script.code').each(function(index) {
            $('pre.code').eq(index).text($(this).html());
        });
        $('script.common').each(function(index) {
            $('pre.common').eq(index).html($(this).html());
        });
        $(document).unload(function() {$('*').unbind(); });
    });
</script> 
<?php
//margin-right:150px; margin-left:auto;
?>
<div id="chart1" style="margin-top:140px;  width:80%; height:600px; margin-left:auto;margin-right:auto;"></div>

