<?php
	session_start();
	require_once('../inc/functions.php');
	$f = new fm;
	if(!isset($_SESSION)){
    header("location: ..");
  }else{
  	if(isset($_POST['sign_out'])){
  		print_r($_POST);die;
  	}
  	$data = $f->get_data();
  	// var_dump($data);
  	?>
		<!DOCTYPE html>
		<html>
		<head>
		  <meta charset="utf-8">
		  <meta http-equiv="X-UA-Compatible" content="IE=edge">
		  <title>PT XYZ</title>
		  <!-- Tell the browser to be responsive to screen width -->
		  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
		  <!-- Bootstrap 3.3.7 -->
		  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css">
		  <!-- Font Awesome -->
		  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css">
		  <!-- Theme style -->
		  <link rel="stylesheet" href="../css/AdminLTE.min.css">
		  <!-- AdminLTE Skins. Choose a skin from the css/skins
		       folder instead of downloading all of them to reduce the load. -->
		  <link rel="stylesheet" href="../css/allskins.min.css">

		  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
		  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
		  <!--[if lt IE 9]>
		  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
		  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
		  <![endif]-->

		  <!-- Google Font -->
		  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
		  <style type="text/css">
		  	.scrollme {
				    overflow-y: auto;
				}

				.silver{
					background: #d2d6de;
				}

				.active-menu{
					background: black;
				}
		  </style>
		</head>
		<body class="hold-transition skin-blue sidebar-mini">
		<div class="wrapper">

		  <header class="main-header">
		    <!-- Logo -->
		    <a href="." class="logo">
		      <!-- mini logo for sidebar mini 50x50 pixels -->
		      <span class="logo-mini"><b>XYZ</b></span>
		      <!-- logo for regular state and mobile devices -->
		      <span class="logo-lg"><b>PT XYZ</b></span>
		    </a>
		    <!-- Header Navbar: style can be found in header.less -->
		    <nav class="navbar navbar-static-top">
		      <!-- Sidebar toggle button-->
		      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
		        <span class="sr-only">Toggle navigation</span>
		        <span class="icon-bar"></span>
		        <span class="icon-bar"></span>
		        <span class="icon-bar"></span>
		      </a>

		      <div class="navbar-custom-menu">
		        <ul class="nav navbar-nav">
		          <!-- User Account: style can be found in dropdown.less -->
		          <li class="dropdown user user-menu">
		            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
		              <img src="../img/avatar.png" class="user-image" alt="User Image">
		              <span class="hidden-xs"><?=var_dump($_SESSION)?></span>
		            </a>
		            <ul class="dropdown-menu">
		              <!-- User image -->
		              <li class="user-header">
		                <img src="../img/avatar.png" class="img-circle" alt="User Image">

		                <p>
		                  <?=var_dump($_SESSION)?> - Web Developer
		                  <small>Member since Nov. 2012</small>
		                </p>
		              </li>
		              <!-- Menu Footer-->
		              <li class="user-footer">
		                <div class="pull-right">
		                  <a href="" onclick="signout();" class="btn btn-default btn-flat">Sign out</a>
		                </div>
		              </li>
		            </ul>
		          </li>
		          <!-- Control Sidebar Toggle Button -->
		        </ul>
		      </div>
		    </nav>
		  </header>
		  <!-- Left side column. contains the logo and sidebar -->
		  <aside class="main-sidebar">
		    <!-- sidebar: style can be found in sidebar.less -->
		    <section class="sidebar">
		      <!-- Sidebar user panel -->
		      <div class="user-panel">
		        <div class="pull-left image">
		          <img src="../img/avatar.png" class="img-circle" alt="User Image">
		        </div>
		        <div class="pull-left info">
		          <p><?=var_dump($_SESSION)?></p>
		          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
		        </div>
		      </div>
		      <!-- sidebar menu: : style can be found in sidebar.less -->
		      <ul class="sidebar-menu" data-widget="tree">
		        <li class="header">MAIN MENU</li>
		        <li>
		          <a href="" class="active-menu menu" id="db">
		            <i class="fa fa-dashboard"></i> <span>Dashboard</span>
		          </a>
		        </li>
		        <li class="treeview">
		          <a href="#">
		            <i class="fa fa-pie-chart"></i> <span>Report</span>
		            <span class="pull-right-container">
		              <i class="fa fa-angle-left pull-right"></i>
		            </span>
		          </a>
		          <ul class="treeview-menu">
		            <li><a href="#" class="menu" id="rp"><i class="fa fa-circle-o"></i> Dashboard v1</a></li>
		          </ul>
		        </li>
		      </ul>
		    </section>
		    <!-- /.sidebar -->
		  </aside>

		  <!-- Content Wrapper. Contains page content -->
		  <div class="content-wrapper">
		    <!-- Content Header (Page header) -->
		    <section class="content-header">
	        <small>
	        	<ol class="breadcrumb">
			        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
			        <li class="active">Dashboard</li>
			      </ol>
	        </small>		      
		    </section>

		    <!-- Main content -->
		    <section class="content">
		      <div class="row">
		        <div class="col-md-8">
		          <div class="box">
		            <div class="box-header with-border silver">
		              <h3 class="box-title">Project Summary (Plan vs Actual MH)</h3>
		            </div>
		            <!-- /.box-header -->
		            <div class="box-body scrollme">
		              <table class="table table-bordered">
		                <tr>
		                  <th>Project No</th>
		                  <th>Name</th>
		                  <th>Planning</th>
		                  <th>Actual</th>
		                  <th>variance</th>
		                  <th>%</th>
		                </tr>
		                <tr>
		                	<?php
		                	if($data){
		                		// print_r($data);
		                		$j = 0;
		                		foreach ($data as $k => $v) {
			                		echo "
			                		<td>".$v['pj_no']."</td>
			                		<td>".$v['name']."</td>
			                		<td>".$v['plan']."</td>
			                		<td>".$v['actual']."</td>
			                		<td>".$v['variance']."</td>
			                		<td>20</td>
			                		";
		                		}
		                	}
		                	?>
		                </tr>
		              </table>
		            </div>
		            <!-- /.box-body -->
		          </div>
		          <!-- /.box -->

		          <div class="box">
		            <div class="box-header silver">
		              <h3 class="box-title">Chart Plan vs Actual MH Summary</h3>
		            </div>
		            <!-- /.box-header -->
		            <div class="box-body">
		            	<div class="chart">
		                <canvas id="barChart" style="height:230px"></canvas>
		              </div>
		            </div>
		            <!-- /.box-body -->
		          </div>
		          <!-- /.box -->
		        </div>
		        <!-- /.col -->
		        <div class="col-md-4">
		          <div class="box">
		            <div class="box-header silver">
		              <h3 class="box-title">Information</h3>		              
		            </div>
		            <!-- /.box-header -->
		            <div class="box-body no-padding">
		              <table class="table">
		                <tr>
		                  <td>Project 0123 Robot system telah selesai</td>
		                </tr>
		                <tr>
		                  <td>New Project 1124 conveyor telah terbit</td>
		                </tr>
		              </table>
		            </div>
		            <!-- /.box-body -->
		          </div>
		          <!-- /.box -->
		        </div>
		        <!-- /.col -->
		      </div>
		      <!-- /.row -->
		    </section>
		    <!-- /.content -->
		  </div>
		  <!-- /.content-wrapper -->
		  <footer class="main-footer">
		    <div class="pull-right hidden-xs">
		      <b>Version</b> 2.4.0
		    </div>
		    <strong>Copyright &copy; 2014-2016 <a href="https://adminlte.io">Almsaeed Studio</a>.</strong> All rights
		    reserved.
		  </footer>
		  <!-- /.control-sidebar -->
		  <!-- Add the sidebar's background. This div must be placed
		       immediately after the control sidebar -->
		  <div class="control-sidebar-bg"></div>
		</div>
		<!-- jQuery 3 -->
		<script src="../js/jquery.min.js"></script>
		<!-- Bootstrap 3.3.7 -->
		<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>
		<script src="../js/adminlte.min.js"></script>
		<script src="../js/chart.js"></script>
		<script>

			var statemenu = 'db';

      $(".menu").on('click',function(){
        var el = document.getElementById(this.id);
        var oldel = document.getElementById(statemenu);
        oldel.classList.remove('active-menu');
        el.classList.add('active-menu');
        statemenu = this.id;
      });

      function signout(){
      	var data = {sign_out: 1};
      	$.ajax({
				  type: "POST",
				  url: '',
				  data: data
				});
      }

  		function gen_chart() {

		    var areaChartData = {
		      labels  : ['January', 'February', 'March', 'April', 'May', 'June', 'July'],
		      datasets: [
		        {
		          label               : 'Electronics',
		          fillColor           : 'rgba(210, 214, 222, 1)',
		          strokeColor         : 'rgba(210, 214, 222, 1)',
		          pointColor          : 'rgba(210, 214, 222, 1)',
		          pointStrokeColor    : '#c1c7d1',
		          pointHighlightFill  : '#fff',
		          pointHighlightStroke: 'rgba(220,220,220,1)',
		          data                : [65, 59, 80, 81, 56, 55, 40]
		        },
		        {
		          label               : 'Digital Goods',
		          fillColor           : 'rgba(60,141,188,0.9)',
		          strokeColor         : 'rgba(60,141,188,0.8)',
		          pointColor          : '#3b8bba',
		          pointStrokeColor    : 'rgba(60,141,188,1)',
		          pointHighlightFill  : '#fff',
		          pointHighlightStroke: 'rgba(60,141,188,1)',
		          data                : [28, 48, 40, 19, 86, 27, 90]
		        }
		      ]
		    }

		    //-------------
		    //- BAR CHART -
		    //-------------
		    var barChartCanvas                   = $('#barChart').get(0).getContext('2d')
		    var barChart                         = new Chart(barChartCanvas)
		    var barChartData                     = areaChartData
		    barChartData.datasets[1].fillColor   = '#00a65a'
		    barChartData.datasets[1].strokeColor = '#00a65a'
		    barChartData.datasets[1].pointColor  = '#00a65a'
		    var barChartOptions                  = {
		      //Boolean - Whether the scale should start at zero, or an order of magnitude down from the lowest value
		      scaleBeginAtZero        : true,
		      //Boolean - Whether grid lines are shown across the chart
		      scaleShowGridLines      : true,
		      //String - Colour of the grid lines
		      scaleGridLineColor      : 'rgba(0,0,0,.05)',
		      //Number - Width of the grid lines
		      scaleGridLineWidth      : 1,
		      //Boolean - Whether to show horizontal lines (except X axis)
		      scaleShowHorizontalLines: true,
		      //Boolean - Whether to show vertical lines (except Y axis)
		      scaleShowVerticalLines  : true,
		      //Boolean - If there is a stroke on each bar
		      barShowStroke           : true,
		      //Number - Pixel width of the bar stroke
		      barStrokeWidth          : 2,
		      //Number - Spacing between each of the X value sets
		      barValueSpacing         : 5,
		      //Number - Spacing between data sets within X values
		      barDatasetSpacing       : 1,
		      //String - A legend template
		      legendTemplate          : '<ul class="<%=name.toLowerCase()%>-legend"><% for (var i=0; i<datasets.length; i++){%><li><span style="background-color:<%=datasets[i].fillColor%>"></span><%if(datasets[i].label){%><%=datasets[i].label%><%}%></li><%}%></ul>',
		      //Boolean - whether to make the chart responsive
		      responsive              : true,
		      maintainAspectRatio     : true
		    }

		    barChartOptions.datasetFill = false
		    barChart.Bar(barChartData, barChartOptions)
		  }
		</script>

		</body>
		</html>

  	<?php
  }
?>