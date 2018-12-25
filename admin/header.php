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
		  <link rel="stylesheet" href="../css/bootstrap-datepicker.css">

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

				.table tr th {
					text-align: center;
					vertical-align: middle;
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
		              <span class="hidden-xs"><?=$_SESSION['userdata']['name']?></span>
		            </a>
		            <ul class="dropdown-menu">
		              <!-- User image -->
		              <li class="user-header">
		                <img src="../img/avatar.png" class="img-circle" alt="User Image">

		                <p>
		                  <?=$_SESSION['userdata']['name']?>
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
		          <p><?=$_SESSION['userdata']['name']?></p>
		          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
		        </div>
		      </div>
		      <!-- sidebar menu: : style can be found in sidebar.less -->
		      <ul class="sidebar-menu" data-widget="tree">
		        <li class="header">MAIN MENU</li>
		        <li>
		          <a href="dashboard.php" class="menu" id="db">
		            <i class="fa fa-dashboard"></i> <span>Dashboard</span>
		          </a>
		        </li>
		        <li class="treeview" id="rp-hd">
		          <a href="#">
		            <i class="fa fa-pie-chart"></i> <span>Report</span>
		            <span class="pull-right-container">
		              <i class="fa fa-angle-left pull-right"></i>
		            </span>
		          </a>
		          <ul class="treeview-menu">
		            <li><a href="report.php" class="menu" id="rp"><i class="fa fa-circle-o"></i> Plan VS Actual MH</a></li>
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
			        <li class="active" id="pos"></li>
			      </ol>
	        </small>		      
		    </section>

		    <!-- Main content -->
		    <section class="content">