<?php

require_once("header.php");
if($_SESSION['perfil_logado'] != "1" && $_SESSION['perfil_logado'] != "2" && $_SESSION['perfil_logado'] != "3"){ 

	echo'<script language= "JavaScript">alert("You dont have permission to access this page");location.href="index"</script>';

} 

?>
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
            <h1>Reports</h1>
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
		<center>
        <div class="row">
          <div class="col-md-4">
            <div class="card">
              
              <!-- /.card-header -->
				<div class="card-body">
				  <a href="value_pie_pdf" ><button type="button" class="btn btn-block bg-gradient-success btn-sm" data-toggle="modal" data-target="#modal-graph"><i class="fas fa-search"></i> Value pie</button></a> 
				 
				
				  <hr>
				 
				 
				  <a href="risk_graph_pdf" ><button type="button" class="btn btn-block bg-gradient-success btn-sm"  data-toggle="modal" data-target="#modal-graph-rg"><i class="fas fa-search"></i> Risk graphs</button></a> 
				  <hr>
				 
				 
				  <a href="pdf" target="_blank"><button type="button" class="btn btn-block bg-gradient-success btn-sm"  data-toggle="modal" data-target="#modal-graph-rg"><i class="fas fa-search"></i> Risk analysis</button></a> 
				</div>
              <!-- ./card-body -->
           
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
		</center>
       
        <!-- /.row -->
<div class="modal fade" id="modal-graph">
					<div class="modal-dialog modal-lg">
						<div class="modal-content">
						<div class="modal-header">
							<h4 class="modal-title">Value Pie</h4>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
							</button>
						</div>
						<div class="modal-body">
							<!--
							<button type="button" class="btn btn-block bg-gradient-primary btn-sm" onclick="
							$('#bxPieChart1').hide();
							$('#bxPieChart2').show();
							$('#bxPieChart3').hide();
							$('#bxPieChart4').hide();
							">sorted by item value</button>
							
							<button type="button" class="btn btn-block bg-gradient-primary btn-sm" onclick="
							$('#bxPieChart1').hide();
							$('#bxPieChart2').hide();
							$('#bxPieChart3').show();
							$('#bxPieChart4').hide();
							">sorted by size of the slice</button>
							
							<button type="button" class="btn btn-block bg-gradient-primary btn-sm" onclick="
							$('#bxPieChart1').show();
							$('#bxPieChart2').hide();
							$('#bxPieChart3').hide();
							$('#bxPieChart4').hide();
							">sorted by name of the subgroup</button>
							
							
							<button type="button" class="btn btn-block bg-gradient-primary btn-sm" onclick="
							$('#bxPieChart1').hide();
							$('#bxPieChart2').hide();
							$('#bxPieChart3').hide();
							$('#bxPieChart4').show();">sorted by size of the slice, ASSUMING ALL ITEMS EQUAL</button>
							
							<br>
							
							<hr>
							
							<br>-->
							
							
							
							
							<div class="card card-danger" id="bxPieChart4" style="display:block">
								
								<div class="card-body" id="reportPage">
								<canvas id="pieChart4b" ></canvas>
								
								</div>
								<!-- /.card-body -->
								
							</div>
							<!-- /.card -->
						</div>
						
						<div class="modal-footer justify-content-between">
							<button type="button" class="btn btn-block bg-gradient-info btn-sm" id="downloadPdf"><i class="fas fa-bars"></i> Value pie</button>
						</div>
						</div>
						<!-- /.modal-content -->
					</div>
					<!-- /.modal-dialog -->
					</div>	
      
	  
	  
	  <div class="modal fade" id="modal-graph-rg">
					<div class="modal-dialog modal-lg">
						<div class="modal-content">
						<div class="modal-header">
							<h4 class="modal-title">Value Pie</h4>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
							</button>
						</div>
						<div class="modal-body">
							
							<canvas id="canvasRG" ></canvas>
							<!-- /.card -->
						</div>
						
						<div class="modal-footer justify-content-between">
							<button type="button" class="btn btn-block bg-gradient-info btn-sm" id="downloadPdf"><i class="fas fa-bars"></i> Value pie</button>
						</div>
						</div>
						<!-- /.modal-content -->
					</div>
					<!-- /.modal-dialog -->
					</div>	
      
	  
	  
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
  function document_active(id,status) {			
	  var i = '#row'+id;
	  $.ajax({
		type: "POST",
		url: "ajax_process/documents_active.php",
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
	
	function document_delete(id) {			
	  var i = '#row'+id;
	  $.ajax({
		type: "POST",
		url: "ajax_process/document_delete.php",
		data: {
			id: id
		},
		success: function(data) {
		  $(i).css({"display":"none"});
		  //location.reload();
		}
	  });
	}
	
	
  </script>
<?php

require_once("footer.php");

?>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.4.1/jspdf.debug.js" integrity="sha384-THVO/sM0mFD9h7dfSndI6TS0PgAGavwKvB5hAxRRvc0o9cPLohB0wb/PTA7LdUHs" crossorigin="anonymous"></script>
<script>
 
		
		window.randomScalingFactor = function() {
			return Math.round(Samples.utils.rand(0, 100));
		};
		
		
	
		<?php 
				$bgColors2 = "";
				$name2 = "";
				$data2 = "";
				$in2 = Build_value_pie::select_ec_values_for_table();
				foreach($in2['dados'] as $in2){
						
						$a = Build_value_pie::select_sum_points_group($in2['group_id']);
						$b = (float)$in2['groupPoints'];
						$c = (float)$in2['subgroupPoints'];
						$d = (float)$in2['numbers_of_items'];
						
						$bgColors2 	.= "'".random_color()."',";
						$name2 		.= "'".$in2['group_name'].";".$in2['subgroup_name']."',";
						$data2 		.= $in2['numbers_of_items'].",";
				}	
		?>
		/**/ 
		var barChartData1d = {
			datasets: [{
				backgroundColor: [
				<?php echo substr($bgColors2,0,-1); ?>
				],
				data: [<?php echo substr($data2,0,-1); ?>]
			}],
			
			

			// These labels appear in the legend and in the tooltips when hovering different arcs
			labels: [
				<?php echo substr($name2,0,-1); ?>
			]

		}; 
		
	
		//////////////////////////////////////////////////////
		
		//////////////////////////////////////////////////////
		//////////////////////////////////////////////////////
		///////// CHAT POR GRUPO
		//////////////////////////////////////////////////////		
		//////////////////////////////////////////
		

		//////////////////////////////////////////////////////
		///////// FIM CHAT POR GRUPO /////////
		//////////////////////////////////////////////////////
		//////////////////////////////////////////////////////
	
	



$('#downloadPdf').click(function(event) {
  // get size of report page
  var reportPageHeight = '800';
  var reportPageWidth = '900';
  
  // create a new canvas object that we will populate with all other canvas objects
  var pdfCanvas = $('<canvas />').attr({
    id: "canvaspdf",
    width: reportPageWidth,
    height: reportPageHeight
  });
  
  // keep track canvas position
  var pdfctx = $(pdfCanvas)[0].getContext('2d');
  var pdfctxX = 0;
  var pdfctxY = 0;
  var buffer = 100;
  
  // for each chart.js chart
  $("canvas").each(function(index) {
    // get the chart height/width
    var canvasHeight = '350';
    var canvasWidth = '655';
    
    // draw the chart into the new canvas
    pdfctx.drawImage($(this)[0], pdfctxX, pdfctxY, canvasWidth, canvasHeight);
    pdfctxX += canvasWidth + buffer;
    
    // our report page is in a grid pattern so replicate that in the new canvas
    if (index % 2 === 1) {
      pdfctxX = 0;
      pdfctxY += canvasHeight + buffer;
    }
  });
  
  // create new pdf and add our new canvas as an image
  var pdf = new jsPDF({
  orientation: "portrait",
  unit: "px",
  format: [650, 390]
});
  pdf.text("SISGER - Value Pie", 15, 20);
  pdf.addImage($(pdfCanvas)[0], 'PNG', 10, 40);
  
  // download the pdf
  pdf.save('vie_pie.pdf');
});
		
		<?php 
								$in = AR_Analyse_risks::select_analyse_risk_by_project();
									
									
									
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
			
				
			var ctx5 = document.getElementById('pieChart4b').getContext('2d');
			
			var options = {
				cutoutPercentage: 50
			};
			
			window.myBar = new Chart(ctx5, {
				type: 'pie',
				data: barChartData1d,
				options: options
			});
			
			var ctx = document.getElementById('canvasRG').getContext('2d');
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