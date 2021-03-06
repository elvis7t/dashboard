<?php
$sess = "GRA";
$pag = "at_grafico_prestadoras.php";
require_once("../config/main.php");
require_once("../config/valida.php");
require_once("../config/mnutop.php");
require_once("../config/menu.php");
require_once("../config/modals.php");
require_once("../class/class.functions.php");
require_once("../controller/acao_graficos.php");
require_once("../model/recordset.php");
$fn = new functions();
?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1> 
            B I
            <small>Gr&aacute;ficos</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> B I</a></li>
            <li class="active">Gr&aacute;ficos</li>
			  <li class="active">Prestadoras</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      

      <div class="row">
       

        
          <!-- /.box -->
		<div class="col-md-6">
          <!-- Donut chart Graficos de rosca % porcentagem-->
          <div class="box box-primary">
            <div class="box-header with-border">
              <i class="fa fa-bar-chart-o"></i>

              <h3 class="box-title">Atendimentos</h3>

              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
              </div>
            </div> 
            <div class="box-body">
			<div class="row">
                <div class="col-md-10">
                  <div class="chart-responsive">
              <div id="donut-chart" style="height: 300px;"></div>
            </div>
			 <!-- ./chart-responsive -->           
          </div>
		  <!-- /.col -->
                <div class="col-md-2">
                  <ul class="chart-legend clearfix">
				    <li><i class="fa fa-circle-o text-blue"></i> TRIX</li>
                    <li><i class="fa fa-circle-o text-orange"></i>  LUCTEL</li>
                    <li><i class="fa fa-circle-o text-green"></i>  IMASIC</li>
                    <li><i class="fa fa-circle-o text-yellow"></i>  DIMEP</li>
                    
                  </ul> 
                </div>
                <!-- /.col --> 
          </div>
		  <!-- /.row -->
          </div>
		   <!-- /.box-body-->
          
        </div> 
		<!-- /.box -->
        </div> 
        <!-- /.col -->
      
      
        <!-- /.col (LEFT) -->
        <div class="col-md-6">
       

         <!-- //- BAR CHART - Gráficos de coluna por ano  -\\ -->
          <div class="box box-primary">
            <div class="box-header with-border">
			<i class="fa fa-bar-chart-o"></i>
              <h3 class="box-title">Atendimentos</h3>

              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
              </div>
            </div>
            <div class="box-body chart-responsive">
              <div class="chart" id="bar-chart-morris" style="height: 300px;"></div>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->

        </div>
		<!-- //- DONUT CHART - Graficos de rosca com valores - \\ -->
		<div class="col-md-6">
			 <div class="box box-primary">
            <div class="box-header with-border">
			<i class="fa fa-bar-chart-o"></i>
              <h3 class="box-title">Valor de Manuten&ccedil;&atilde;o por Prestadora</h3>

              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
              </div>
            </div>
            <div class="box-body chart-responsive">
              <div class="chart" id="sales-chart" style="height: 300px; position: relative;"></div>
            </div>
            <!-- /.box-body -->  
          </div>
        </div>
		<div class="col-md-6">
		<!--   //- PIE CHART - Graficos de rosca com efeito -\\--> 
		  <div class="box box-primary">
            <div class="box-header with-border">
			<i class="fa fa-bar-chart-o"></i>
              <h3 class="box-title">Atendimentos</h3>

              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
              </div>
            </div> 
                    <!-- /.box-header -->
            <div class="box-body">
              <div class="row"> 
                <div class="col-md-10">
                  <div class="chart-responsive">
                    <canvas id="pieChart" height="174"></canvas>
                  </div>
                  <!-- ./chart-responsive -->
                </div>
                <!-- /.col -->
                <div class="col-md-2">
                  <ul class="chart-legend clearfix">
				    <li><i class="fa fa-circle-o text-blue"></i> TRIX</li>
                    <li><i class="fa fa-circle-o text-green"></i>  IMASIC</li>
                    <li><i class="fa fa-circle-o text-orange"></i>  LUCTEL</li>
                    
                  </ul> 
                </div>
                <!-- /.col --> 
              </div> 
              <!-- /.row -->
            </div>
            <div class="box-footer no-padding">
              <ul class="nav nav-pills nav-stacked">
                <li><a href="#">Valor Total de Manuten&ccedil;&otilde;es
                  <span class="pull-right text-red"> <?=$fn->formata_din($total);?></span></a></li>
                
              </ul>
            </div>
            <!-- /.box-body -->
          </div>
        <!-- /.col (RIGHT) -->
      </div>
      <!-- /.row -->
	  
	   
        <!-- /.col (RIGHT) -->
      
      <!-- /.row -->
    </section>
    <!-- /.content --> 

  </div>
  <!-- /.content-wrapper -->
 <?php 
        require_once("../config/footer.php");
        //require_once("../config/side.php"); 
      ?>

 
  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div> 
</div>
<!-- ./wrapper -->

<!-- jQuery 2.2.3 -->
  <script src="<?=$hosted;?>/assets/plugins/jQuery/jQuery-2.2.3.min.js"></script>
<!-- Bootstrap 3.3.6 -->
<script src="<?=$hosted;?>/assets/bootstrap/js/bootstrap.min.js"></script>
<!-- Morris.js charts -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
<script src="<?=$hosted;?>/assets/plugins/morris/morris.min.js"></script>
<!-- ChartJS 1.0.1 -->
<script src="<?=$hosted;?>/assets/plugins/chartjs/Chart.min.js"></script>
<!-- FastClick -->
<script src="<?=$hosted;?>/assets/plugins/fastclick/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="<?=$hosted;?>/assets/dist/js/app.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?=$hosted;?>/assets/dist/js/demo.js"></script>
<!-- FLOT CHARTS -->
<script src="<?=$hosted;?>/assets/plugins/flot/jquery.flot.min.js"></script>
<!-- FLOT RESIZE PLUGIN - allows the chart to redraw when the window is resized -->
<script src="<?=$hosted;?>/assets/plugins/flot/jquery.flot.resize.min.js"></script>
<!-- FLOT PIE PLUGIN - also used to draw donut charts -->
<script src="<?=$hosted;?>/assets/plugins/flot/jquery.flot.pie.min.js"></script>
<!-- FLOT CATEGORIES PLUGIN - Used to draw bar charts -->
<script src="<?=$hosted;?>/assets/plugins/flot/jquery.flot.categories.min.js"></script>
<!-- Page script -->
<!--  script  flot-->
<script>
  $(function () {
    //--------------------------------------------------\\
    //- DONUT CHART - Graficos de rosca % porcentagem - \\
    //---------------------------------------------------\\
	var donutData = [
      {label: "Imasic", data: <?=$imasic;?>, color: "#59bc3c"},
      {label: "Trix", data: <?=$trix;?>, color: "#0073b7"},
      {label: "Luctel", data: <?=$luctel;?>, color: "#ef5f00"},
      {label: "DIMEP", data: <?=$dimep;?>, color: "#efb300"}
    ];
    $.plot("#donut-chart", donutData, {
      series: {
        pie: {
          show: true,
          radius: 1,
          innerRadius: 0.5,
          label: {
            show: true,
            radius: 2 / 3,
            formatter: labelFormatter,
            threshold: 0.1
          }

        }
      },
      legend: {
        show: false
      }
    });
    /*
     * END DONUT CHART
     */

  });

  /*
   * Custom Label formatter
   * ----------------------
   */
  function labelFormatter(label, series) {
    return '<div style="font-size:13px; text-align:center; padding:2px; color: #fff; font-weight: 600;">'
        + label
        + "<br>"
        + Math.round(series.percent) + "%</div>";
  }
</script>
<!--  script  morris-->

<script>
  $(function () {
    "use strict";
	//-----------------------------------------------\\ 
    //- DONUT CHART - Graficos de rosca com valores - \\
    //-------------------------------------------------\\
    var donut = new Morris.Donut({
      element: 'sales-chart',  
      resize: true,
      colors: ["#0073b7", "#59bc3c", "#ef5f00","#efb300","#00a65a","#f39c12","#3c8dbc","#f27311","#d2d6de"],
      data: [
        {label: "TRIX", value: <?=$trixvl;?>},
        {label: "IMASIC", value: <?=$imasicvl;?>},
        {label: "LUCTEL", value: <?=$luctelvl;?>},
        {label: "DIMEP", value: <?=$dimepvl;?>}
      ],
      hideHover: 'auto'
    });
   
     //-------------------------------------------\\
    //- BAR CHART - Gráficos de coluna por ano  -\\
    //-------------------------------------------\\

   
    var bar = new Morris.Bar({
      element: 'bar-chart-morris', 
      resize: true,
      data: [
        {y: 'Imasic', a: <?=$imasic;?>},
        {y: 'Trix', a: <?=$trix;?> },
        {y: 'Luctel', a: <?=$luctel;?>},
		{y: 'Dimep', a: <?=$dimep;?>}
      ],
      barColors: ['#e51b1b'],
      xkey: 'y',
      ykeys: ['a'],
      labels: ['Atendimento'],
      hideHover: 'auto'
    });
  });
</script> 
<!--  script  chartjs-->
<script>
  $(function () {
	 //------------------------------------------\\
    //- PIE CHART - Graficos de rosca com efeito -\\
    //---------------------------------------------\\
	
    // Get context with jQuery - using jQuery's .get() method.
    var pieChartCanvas = $("#pieChart").get(0).getContext("2d");
    var pieChart = new Chart(pieChartCanvas);
    var PieData = [
      {
        value: <?=$imasic;?>, 
        color: "#59bc3c",
        highlight: "#59bc3c",
        label: "Imasic"
      },
	  { 
        value: <?=$trix;?>,
        color: "#0073b7",
        highlight: "#0073b7",
        label: "Trix"
      },
	  
      
      {
        value: <?=$luctel;?>, 
        color: "#ef5f00",
        highlight: "#ef5f00",
        label: "Luctel"
      },
	  {
        value: <?=$luctel;?>, 
        color: "#efb300",
        highlight: "#efb300",
        label: "Dimep"
      }
    ];
    var pieOptions = {
      //Boolean - Whether we should show a stroke on each segment
      segmentShowStroke: true,
      //String - The colour of each segment stroke
      segmentStrokeColor: "#fff",
      //Number - The width of each segment stroke
      segmentStrokeWidth: 2,
      //Number - The percentage of the chart that we cut out of the middle
      percentageInnerCutout: 50, // This is 0 for Pie charts
      //Number - Amount of animation steps
      animationSteps: 100,
      //String - Animation easing effect
      animationEasing: "easeOutBounce",
      //Boolean - Whether we animate the rotation of the Doughnut
      animateRotate: true,
      //Boolean - Whether we animate scaling the Doughnut from the centre
      animateScale: false,
      //Boolean - whether to make the chart responsive to window resizing
      responsive: true,
      // Boolean - whether to maintain the starting aspect ratio or not when responsive, if set to false, will take up entire container
      maintainAspectRatio: true,
      //String - A legend template
      legendTemplate: "<ul class=\"<%=name.toLowerCase()%>-legend\"><% for (var i=0; i<segments.length; i++){%><li><span style=\"background-color:<%=segments[i].fillColor%>\"></span><%if(segments[i].label){%><%=segments[i].label%><%}%></li><%}%></ul>"
    };
    //Create pie or douhnut chart
    // You can switch between pie and douhnut using the method below.
    pieChart.Doughnut(PieData, pieOptions);

   
  });
</script>



</body>
</html>
