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
		<script src="../js/bootstrap-datepicker.js"></script>
		<script>
			$(document).ready(function(){
				$('#date-start').datepicker({
					format: "yyyy-mm-dd",
		      autoclose: true
		    });
		    $('#date-end').datepicker({
		    	format: "yyyy-mm-dd",
		      autoclose: true
		    });
			});
			
			var statemenu = 'db';

			// const formatter = new Intl.NumberFormat('en-ID', { 
	  //     style: 'currency', 
	  //     currency: '' 
	  //   });
	  	//Date picker
	    
	    function filter(){
	    	var np = $("#prno").val();
      	var sd = $("#date-start").val();
      	var ed = $("#date-end").val();
      	var dp = $("#dept").val();

      	$.ajax({
				  type: "GET",
				  url: '',
				  data: {filter: 1, pjno: np, from: sd, to: ed, dept: dp},
				  success: function(res){
				  	var r = res.split('<!DOCTYPE html>')[0];
				  	var data = JSON.parse(r);
      			show_data(data,true);
				  }
				});
      	
	    }

      function signout(){
      	$.ajax({
				  type: "GET",
				  url: '',
				  data: {sign_out:1},
				  success: function(res){
      			var data = JSON.parse(res);
      			if(data.success == 1){
      				location.reload();
      			}
				  }
				});
      }
      
      var loc = window.location.href;
      var base = loc.split('/')[loc.split('/').length - 1];
      if(base == 'dashboard.php'){
      	$.ajax({
				  type: "GET",
				  url: '',
				  data: {chart:1},
				  success: function(res){
				  	var r = res.split('<!DOCTYPE html>')[0];
				  	var data = JSON.parse(r);
      			gen_chart(data);
      			show_data(data,false);
				  }
				});
				document.getElementById('db').classList.add('active-menu');
				document.getElementById('db').classList.add('active');
				$("#pos").text('Dashboard');
      }else if(base == 'report.php'){
      	var req = {chart:0};
      	$.ajax({
				  type: "GET",
				  url: '',
				  data: req,
				  success: function(res){
				  	var r = res.split('<!DOCTYPE html>')[0];
				  	var data = JSON.parse(r);
      			show_data(data,true);
				  }
				});
      	document.getElementById('rp').classList.add('active-menu');
      	document.getElementById('rp-hd').classList.add('active');
      	$("#pos").text('Report / Plan VS Actual MH');

      	var dt = new Date();
		    var df = dt.getFullYear() +'-'+ (dt.getMonth() + 1) +'-'+ dt.getDate();
		    $("#date-end").val(df);
		    $("#date-start").val(df);
		    $("#prno").val('ALL');
		    $("#dept").val('PRODUKSI');
      }

      function show_data(data, x = false){
      	$("#data-show").children().remove();
      	if(data == null){
      		$("#data-show").append(
      			"<tr><td colspan='10' align='center'>Data Kosong</td></tr>"
      		);
      		return;
      	}
      	var sh = '';
      	var plt = 0, nmt = 0, ott = 0, ttt = 0, vrt = 0;
      	for (var i = 0; i < data.length; i++) {
      		plt += parseInt(data[i].plan);
      		nmt += parseInt(data[i].normal);
      		ott += parseInt(data[i].overtime);
      		ttt += parseInt(data[i].total);
      		vrt += parseInt(data[i].variance);
      		var rd = ((data[i].variance / data[i].plan) * 100).toFixed();
      		var bg = rd < 0 ? 'background:red;' : '';

      		sh += "<tr>";
      		x == false ? "" : sh += "<td align='center'>"+(i + 1)+"</td>";
      		sh += "<td>"+data[i].pj_no+"</td>";
      		sh += "<td>"+data[i].name+"</td>";
      		x == false ? "" : sh += "<td>"+data[i].cust+"</td>";
      		x == false ? "" : sh += "<td>"+data[i].dept+"</td>";
      		sh += "<td align='right'>"+min(data[i].plan)+"</td>";
      		x == false ? "" : sh += "<td align='right'>"+min(data[i].normal)+"</td>";
      		x == false ? "" : sh += "<td align='right'>"+min(data[i].overtime)+"</td>";
      		sh += "<td align='right'>"+min(data[i].total)+"</td>";
      		sh += "<td align='right'>"+min(data[i].variance)+"</td>";
      		x == false ? sh += "<td align='right' style='"+bg+"'>"+(rd)+"</td>" : "";
      		sh += "</tr>";
      	}
      	x == false ? "" : sh += "<tr style='font-weight:bold;'><td colspan='5' align='center'>GRAND TOTAL</td><td align='right'>"+plt+"</td><td align='right'>"+nmt+"</td><td align='right'>"+ott+"</td><td align='right'>"+ttt+"</td><td align='right'>"+vrt+"</td></tr>";
      	$("#data-show").append(sh);
      }

      function min(x){
      	if(x < 0)
      		return "("+(x * -1)+")";
      	else if(x == 0)
      		return '-';
      	return x;
      }

  		function gen_chart(data) {
  			var lab = [];
  			var plan = [];
  			var actual = [];
  			for (var i = 0; i < data.length; i++) {
  				lab[i] = data[i].name;
  				plan[i] = data[i].plan;
  				actual[i] = data[i].total;
  			}

		    var dataChart = {
		      labels  : lab,
		      datasets: [
		        {
		          label               : 'Plannig',
		          fillColor           : 'rgba(210, 214, 222, 1)',
		          strokeColor         : 'rgba(210, 214, 222, 1)',
		          pointColor          : 'rgba(210, 214, 222, 1)',
		          pointStrokeColor    : '#c1c7d1',
		          pointHighlightFill  : '#fff',
		          pointHighlightStroke: 'rgba(220,220,220,1)',
		          data                : plan
		        },
		        {
		          label               : 'Actual',
		          fillColor           : 'rgba(60,141,188,0.9)',
		          strokeColor         : 'rgba(60,141,188,0.8)',
		          pointColor          : '#3b8bba',
		          pointStrokeColor    : 'rgba(60,141,188,1)',
		          pointHighlightFill  : '#fff',
		          pointHighlightStroke: 'rgba(60,141,188,1)',
		          data                : actual
		        }
		      ]
		    }

		    //-------------
		    //- BAR CHART -
		    //-------------
		    var barChartCanvas                   = $('#barChart').get(0).getContext('2d')
		    var barChart                         = new Chart(barChartCanvas)
		    var barChartData                     = dataChart
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
		      // legendTemplate          : '<ul class="<%=name.toLowerCase()%>-legend"><% for (var i=0; i<datasets.length; i++){%><li><span style="background-color:<%=datasets[i].fillColor%>"></span><%if(datasets[i].label){%><%=datasets[i].label%><%}%></li><%}%></ul>',
		      //Boolean - whether to make the chart responsive
		      legend: {
	            display: true,
	            position: 'bottom',
	            labels: {
	                fontColor: 'rgb(255, 99, 132)'
	            }
	        },
		      responsive              : true,
		      maintainAspectRatio     : true
		    }

		    barChartOptions.datasetFill = true
		    barChart.Bar(barChartData, barChartOptions)
		  }
		</script>

		</body>
		</html>