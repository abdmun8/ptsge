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

  	if(isset($_GET['filter'])){
  		$data = $f->get_data();
  		echo json_encode($data);
  	}
  	$data = $f->get_data();
  	include('header.php');
  	?>
					<div class="row">
						<div class="col-md-12">
							<div class="box">
								<div class="form-horizontal">
									<div class="box-body">
										<div class="row">
											<div class="form-group col-md-4">
			                  <label for="prno" class="col-md-4 control-label">Project No:</label>
			                  <div class="col-md-8">
			                    <input type="text" class="form-control" id="prno" placeholder="Pr No">
			                  </div>
			                </div>
			                <div class="form-group col-md-4">
			                  <label for="prno" class="col-md-4 control-label">Date:</label>
			                  <div class="col-md-8">
			                    <input type="text" class="form-control" id="date-start" class="datepicker">
			                  </div>
			                </div>
			                <div class="form-group col-md-4">
			                  <label for="prno" class="col-md-4 control-label">to:</label>
			                  <div class="col-md-8">
			                    <input type="text" class="form-control" id="date-end" class="datepicker">
			                  </div>
			                </div>
			                <div class="form-group col-md-1">
			                  <button class="btn btn-primary pull-right" onclick="filter();">Submit</button>
			                </div>
			              </div>
			              <div class="row">
			              	<div class="form-group col-md-4">
			                  <label for="prno" class="col-md-4 control-label">Dept:</label>
			                  <div class="col-md-8">
			                    <input type="text" class="form-control" id="dept" placeholder="Dept">
			                  </div>
			                </div>			              	
			              </div>		                
	                </div>
								</div>
							</div>
						</div>
					</div>
		      <div class="row">
		        <div class="col-md-12">
		          <div class="box">
		            <div class="box-header with-border silver">
		              <h3 class="box-title">Project Summary (Plan vs Actual MH)</h3>
		            </div>
		            <!-- /.box-header -->
		            <div class="box-body scrollme">
		              <table class="table table-bordered">
		                <tr>
		                  <th rowspan="2">No</th>
		                  <th rowspan="2">Project No</th>
		                  <th rowspan="2">Name</th>
		                  <th rowspan="2">Customer</th>
		                  <th rowspan="2">Dept</th>
		                  <th rowspan="2">Plan</th>
		                  <th colspan="3">Actual</th>
		                  <th rowspan="2">variance</th>
		                </tr>
		                <tr>
		                	<th>Normal</th>
		                	<th>Over Time</th>
		                	<th>Total</th>
		                </tr>
		                <tbody id="data-show">		                	
		                </tbody>
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