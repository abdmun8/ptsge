<?php
	session_start();
	require_once('../inc/functions.php');
	$f = new fm;
	if(!isset($_SESSION['userdata'])){
    header("location: ..");
  }else{
  	if(isset($_GET['sign_out'])){
  		session_destroy();
  		json_encode(array('success'=>1));
  	}
  	if(isset($_GET['chart'])){
  		$data = $f->get_data();
  		echo json_encode($data);
  	}
  	$data = $f->get_data();
  	include('header.php');
  	?>

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
		                <tbody id="data-show">
		                	
		                </tbody>
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
		                <canvas id="barChart" width="800" height="450"></canvas>
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

  	<?php
  	include('footer.php');
  }
?>