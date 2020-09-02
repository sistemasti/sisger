<?php

require_once("header.php");

?>
	<style>
	canvas {
		-moz-user-select: none;
		-webkit-user-select: none;
		-ms-user-select: none;
	}
	</style>
  <!-- DataTables -->
  <link rel="stylesheet" href="plugins/datatables-bs4/css/dataTables.bootstrap4.css">
 <style>
    .color-palette {
      height: 35px;
      line-height: 35px;
      text-align: left;
      padding-left: 15px;
	  font-size: 13px;
    }
    
    .color-palette.disabled {
      text-align: center;
      padding-right: 0;
      display: block;
    }
    
    .color-palette-set {
      margin-bottom: 15px;
    }

    .color-palette span {
      display: none;
      font-size: 12px;
    }

    .color-palette:hover span {
      display: block;
    }

    .color-palette.disabled span {
      display: block;
      text-align: left;
      padding-left: .75rem;
    }

    .color-palette-box h4 {
      position: absolute;
      left: 1.25rem;
      margin-top: .75rem;
      color: rgba(255, 255, 255, 0.8);
      font-size: 12px;
      display: block;
      z-index: 7;
    }
  </style>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
      
<br>
         <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-10">
            <h1>Risk Graphs</h1>
          </div>
          <div class="col-sm-2">
            <!--<ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Report Institution</li>
            </ol>
			<br>-->
			
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

        <div class="row">
          <div class="col-md-12">
            <div class="card">
              
              <!-- /.card-header -->
            <div class="card-body">
             
			 
			  <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Risk Graphs</h3>

                <div class="card-tools">

                </div>
              </div>
              <div class="card-body">
                
				<div class="row">
             
				<div class="col-sm-4 col-md-8">
					<canvas id="canvas"></canvas>
					<!--<canvas id="chart-area"></canvas>
					<br>
					<br>
					<canvas id="chart-area2"></canvas>
					<br>
					<br>
					<canvas id="chart-area3"></canvas>
					<br>
					<br>
					<canvas id="chart-area4"></canvas>
					<br>
					<br>
					<canvas id="chart-area5"></canvas>
					<br>
					<br>
					<canvas id="chart-area6"></canvas>-->
					
					
					
				</div>
				             
				<div class="col-sm-4 col-md-4">
					
					<div class="callout callout-info">
						<div class="row">
							<div class="col-sm-4 col-md-6">
								<div style="background-color:#ecedf1;padding:10px;">
									<center><strong>Use the Value Pie, then sort by</strong></center>
									<br>
									
									<a href="analyze_graphs" style="text-decoration:none;"><button type="button" class="btn btn-block btn-primary btn-sm">By Agent, Type</button></a>
									<a href="analyze_graphs?order=m" style="text-decoration:none;"><button type="button" class="btn btn-block btn-primary btn-sm"  style="margin-top:3px;">By Magnitude of Risk</button></a>
									<!--<button type="button" class="btn btn-block btn-primary btn-sm">Include bars for all items equal</button>
									<button type="button" class="btn btn-block btn-primary btn-sm">Rare events in top group</button>-->
									<a href="analyze_graphs?order=f" style="text-decoration:none"><button type="button" class="btn btn-block btn-primary btn-sm"  style="margin-top:3px;">By Frequency or Rate</button></a>
									<a href="analyze_graphs?order=l" style="text-decoration:none"><button type="button" class="btn btn-block btn-primary btn-sm"  style="margin-top:3px;">By Loss to Each Item Affected</button></a>
									<a href="analyze_graphs?order=i" style="text-decoration:none"><button type="button" class="btn btn-block btn-primary btn-sm"  style="margin-top:3px;">By Items Affected</button></a>
									<!--<button type="button" class="btn btn-block btn-primary btn-sm">Franction on Risk (linear)</button>-->
								</div>	
							</div>
							<div class="col-sm-4 col-md-6">
								<div style="background-color:#ecedf1;padding:10px;">
									<center><strong>Consider all items equal, then sort by</strong></center>
									<br>
									
									<a href="analyze_graphs" style="text-decoration:none"><button type="button" class="btn btn-block btn-primary btn-sm"  style="margin-top:3px;">By Agent, Type</button></a>
									<a href="analyze_graphs?order=m" style="text-decoration:none"><button type="button" class="btn btn-block btn-primary btn-sm"  style="margin-top:3px;">By Magnitude of Risk</button></a>
									
								</div>	
								<!--<br>
								<button type="button" class="btn btn-block btn-primary btn-sm">Uncertainty bars on/off</button>	-->
								<br>
								Time horizon
								<input type="text" disabled="disabled" value="<?php echo $_SESSION['time_horizon']; ?>" style="width:100% !important">
								<br>
								<br>
								<div style="background-color:#ecedf1;padding:10px;">
									<center><strong>Risk Totals For Agents</strong></center>
									<br>
									
									<a href="analyze_graphs?order=m" style="text-decoration:none"><button type="button" class="btn btn-block btn-primary btn-sm"  style="margin-top:3px;">By Magnitude of Risk</button></a>
									
								</div>	<!--<br>
								<div style="background-color:#ecedf1;padding:10px;">
									<center><strong>Risk Totals For Groups</strong></center>
									<br>
									
									<button type="button" class="btn btn-block btn-primary btn-sm">By Magnitude of Risk</button>
									
								</div>	-->
							</div>
						</div>					
					
					</div>
				</div>
				
					
					
				
				</div>
              </div>
              <!-- /.card-body -->
            </div>
			 
			 
            </div>
              <!-- ./card-body -->
           
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->

       
        <!-- /.row -->

      
      </div><!--/. container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
 
  <script>
  function institution_active(id,status) {			
	  var i = '#row'+id;
	  $.ajax({
		type: "POST",
		url: "ajax_process/institutuion_active.php",
		data: {
			id: id,
			status: status
		},
		success: function(data) {
		  //$(i).css({"display":"none"});
		  location.reload();
		}
	  });
	}
	
	function agent_delete(id) {			
	  var i = '#row'+id;
	  $.ajax({
		type: "POST",
		url: "ajax_process/agent_delete.php",
		data: {
			id: id
		},
		success: function(data) {
		  $(i).css({"display":"none"});
		}
	  });
	}
  </script>
  
  
  
  
<?php

require_once("footer.php");

?>

<script>
		// DEPRECATED
		window.randomScalingFactor = function() {
			return Math.round(Samples.utils.rand(0, 100));
		};
		
		
		<?php 
								if($_GET['order'] == "m"){
									
									$in = AR_Analyse_risks::select_analyse_risk_by_project_by_magnitude();
									
								}else if($_GET['order'] == "f"){
								
									$in = AR_Analyse_risks::select_analyse_risk_by_project_by_fr();
								
								}else if($_GET['order'] == "l"){
								
									$in = AR_Analyse_risks::select_analyse_risk_by_project_by_le();
								
								}else if($_GET['order'] == "i"){
								
									$in = AR_Analyse_risks::select_analyse_risk_by_project_by_ia();
								
								}else{
								
									$in = AR_Analyse_risks::select_analyse_risk_by_project();
								
								}	
									
									
									
								if($in['num'] > 0){		 										
									foreach($in['dados'] as $in){
																		
											$r = AR_Analyse_risks::select_risk_by_id($in['id_risk']);
											$labels .= "'".$r['name']."',";
											$fr .= "'".$in['Expected_Scores_FR']."',";
											$le .= "'".$in['Expected_Scores_LE']."',";
											$ia .= "'".$in['Expected_Scores_IA']."',";
										
									}
								}
								
		?>
								

		var barChartData = {
			labels: [<?php echo substr($labels,0,-1); ?>],
			datasets: [{
				label: 'Frequency / Rate',
				backgroundColor: window.chartColors.red,
				data: [
					<?php echo substr($fr,0,-1); ?>
				]
			}, {
				label: 'Loss to object',
				backgroundColor: window.chartColors.blue,
				data: [
					<?php echo substr($le,0,-1); ?>
				]
			}, {
				label: 'Collection affected',
				backgroundColor: window.chartColors.green,
				data: [
					<?php echo substr($ia,0,-1); ?>
				]
			}]

		};
		
		window.onload = function() {
			var ctx = document.getElementById('canvas').getContext('2d');
			window.myBar = new Chart(ctx, {
				type: 'horizontalBar',
				data: barChartData,
				options: {
					title: {
						display: true,
						text: ''
					},
					tooltips: {
						mode: 'index',
						intersect: false
					},
					responsive: true,
					scales: {
						xAxes: [{
							stacked: true,
						}],
						yAxes: [{
							stacked: true
						}]
					}
				}
			});
		};

		document.getElementById('randomizeData').addEventListener('click', function() {
			barChartData.datasets.forEach(function(dataset) {
				dataset.data = dataset.data.map(function() {
					return randomScalingFactor();
				});
			});
			window.myBar.update();
		});
	</script>