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
            <h1>Risk History</h1>
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
                <h3 class="card-title">Risk History</h3>

                <div class="card-tools">

                </div>
              </div>
              <div class="card-body">
                
				<div class="row">
				<br>
				
				<div class="col-sm-4 col-md-4">
				<strong>Risks</strong>
					<hr>
						<?php 
				
																				
							$irn = Risks::select_risks();
							
							foreach($irn['dados'] as $irn){
							
							?>
							 <a href="risk_history?id_risk=<?php echo $irn['id']; ?>">
							 
							 <button type="button" class="btn btn-block bg-gradient-success btn-sm" style="margin-top:4px;"> 	 <?php echo $irn['name']; ?>
							 </button>
							 
							 </a>
							<?php } 
										
							?>
				
					
				</div>
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
 <?php 
 
			$dados = array();
			
			$ar = AR_Analyse_risks::select_analyse_risk_id_risk($_GET['id_risk']);
			$ir = Risks::select_risk_id($_GET['id_risk']);
			$ap = Analyze_options::select_tr_analyze_options_by_risk($_GET['id_risk']);
			

			$dados['data'][0] 			= substr(databr($ir['data_analyzed']),6,10);
			$dados['magnitude'][0]	 	= $ar['magnitude_of_risk'];
	
			$x=1;
			if($ap['num'] > 0){
				
				foreach($ap['dados'] as $ap){
					$op = Analyze_options::select_tr_identify_options_id_by_option($ap['id_option']);
					
					$dados['data'][$x] 		= substr(databr($op['data']),6,10);
					$dados['magnitude'][$x] 	= $ap['magnitude_of_risk'];
					$x++;
				}
				
			}	
			
			asort($dados['data']);			
			foreach($dados['data'] as $k => $data){
				$data_p .= $data.",";
				if($dados['magnitude'][$k] == ""){
					$magnitude = 0.0;
				}else{
					$magnitude = $dados['magnitude'][$k];
				}		
				$magnitude_p .= $magnitude.",";
			}	
			
			
 ?>

		window.randomScalingFactor = function() {
			return Math.round(Samples.utils.rand(0, 100));
		};

		var barChartData = {
			labels: [<?php echo substr($data_p,0,-1); ?>],
			datasets: [{
				label: <?php echo "'".$ir['name']."'"; ?>,
				backgroundColor: window.chartColors.green,
				data: [
					<?php echo substr($magnitude_p,0,-1); ?>
				]
			}]

		};
		window.onload = function() {
			var ctx = document.getElementById('canvas').getContext('2d');
			
			var options = {
				scales: {
					xAxes: [{
						gridLines: {
							offsetGridLines: true
						}
					}]
				}
			};
			
			window.myBar = new Chart(ctx, {
								type: 'bar',
								data: barChartData,
								options: options
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