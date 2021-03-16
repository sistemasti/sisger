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
            <h1><?php echo $_SESSION[$_SESSION['lang']]['Risk Graphs']; ?></h1>
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
                <h3 class="card-title"><?php 
				if(isset($_GET['title'])){
					echo $_GET['title'];
				}else{
					echo $_SESSION[$_SESSION['lang']]['By Agent, Type'];
				}
				?></h3>

                <div class="card-tools">

                </div>
              </div>
              <div class="card-body">
                
				<div class="row">
             
				<div class="col-sm-4 col-md-8" id="reportPage">
					<canvas id="canvas" style="position:absolute"></canvas>
					<canvas id="canvas2" style="position:absolute"></canvas>
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
					
			
					<br>
					<br>
					<br>
					<br>
					<br>
					<br>
					<br>
					<br>
					<br>
					<br>
					<br>
					<br>
					<br>
					<br>
					<br>
					<br>
					<center><b><?php echo $_SESSION[$_SESSION['lang']]['Click on "Uncertainty bar" to hide/show.']; ?></b></center>
					
				</div>
				             
				<div class="col-sm-4 col-md-4">
					
					<div class="callout callout-info">
						<div class="row">
							<div class="col-sm-4 col-md-6">
								<div style="background-color:#ecedf1;padding:10px;">
									<center><strong><?php echo $_SESSION[$_SESSION['lang']]['Use the Value Pie, then sort by']; ?></strong></center>
									<br>
									
									<a href="analyze_graphs?order=m&title=<?php echo $_SESSION[$_SESSION['lang']]['By Magnitude of Risk']; ?>" style="text-decoration:none;"><button type="button" class="btn btn-block btn-primary btn-sm"  style="margin-top:3px;"><?php echo $_SESSION[$_SESSION['lang']]['By Magnitude of Risk']; ?></button></a>
									
									<a href="analyze_graphs" style="text-decoration:none;"><button type="button" class="btn btn-block btn-primary btn-sm" style="margin-top:3px;"><?php echo $_SESSION[$_SESSION['lang']]['By Agent, Type']; ?></button></a>
									
									<!--
									<a href="analyze_graphs?order=cf" style="text-decoration:none;"><button type="button" class="btn btn-block btn-primary btn-sm"  style="margin-top:3px;">Show C for all objects equal</button></a>-->
									
									<a href="analyze_graphs?order=r&title=<?php echo $_SESSION[$_SESSION['lang']]['Rare event on top']; ?>" style="text-decoration:none"><button type="button" class="btn btn-block btn-primary btn-sm"  style="margin-top:3px;"><?php echo $_SESSION[$_SESSION['lang']]['Rare event on top']; ?></button></a>
									
									<a href="analyze_graphs?order=f&title=<?php echo $_SESSION[$_SESSION['lang']]['By Frequency or Rate']; ?>" style="text-decoration:none"><button type="button" class="btn btn-block btn-primary btn-sm"  style="margin-top:3px;"><?php echo $_SESSION[$_SESSION['lang']]['By Frequency or Rate']; ?></button></a>
									
									<a href="analyze_graphs?order=l&title=<?php echo $_SESSION[$_SESSION['lang']]['By Loss to Each Item Affected']; ?>" style="text-decoration:none"><button type="button" class="btn btn-block btn-primary btn-sm"  style="margin-top:3px;"><?php echo $_SESSION[$_SESSION['lang']]['By Loss to Each Item Affected']; ?></button></a>
									
									<a href="analyze_graphs?order=i&title=<?php echo $_SESSION[$_SESSION['lang']]['By collection affected']; ?>" style="text-decoration:none"><button type="button" class="btn btn-block btn-primary btn-sm"  style="margin-top:3px;"><?php echo $_SESSION[$_SESSION['lang']]['By collection affected']; ?></button></a>
									
									<a href="analyze_graphs?order=rlr&title=<?php echo $_SESSION[$_SESSION['lang']]['Linear, relative to largest risk']; ?>" style="text-decoration:none"><button type="button" class="btn btn-block btn-primary btn-sm"  style="margin-top:3px;"><?php echo $_SESSION[$_SESSION['lang']]['Linear, relative to largest risk']; ?></button></a>
									
									<!--<button type="button" class="btn btn-block btn-primary btn-sm">Franction on Risk (linear)</button>-->
								</div>	
							</div>
							<div class="col-sm-4 col-md-6">
								<div style="background-color:#ecedf1;padding:13px;">
									<center><strong><?php echo $_SESSION[$_SESSION['lang']]['Use all objects equal']; ?></strong></center>
									
									
									<a href="analyze_graphs?order=m&title=<?php echo $_SESSION[$_SESSION['lang']]['By Magnitude of Risk']; ?>" style="text-decoration:none"><button type="button" class="btn btn-block btn-primary btn-sm"  style="margin-top:3px;"><?php echo $_SESSION[$_SESSION['lang']]['By Magnitude of Risk']; ?></button></a>
									
									<a href="analyze_graphs" style="text-decoration:none"><button type="button" class="btn btn-block btn-primary btn-sm"  style="margin-top:3px;"><?php echo $_SESSION[$_SESSION['lang']]['By Agent, Type']; ?></button></a>
									
									
								</div>	
								<!--<br>
								<button type="button" class="btn btn-block btn-primary btn-sm">Uncertainty bars on/off</button>	-->
								
								
								<div style="background-color:#ecedf1;padding:10px;margin-top:12px;">
									<center><strong><?php echo $_SESSION[$_SESSION['lang']]['Risk Totals For Agents']; ?></strong></center>
									
									
									<a href="analyze_graphs?order=m&title=<?php echo $_SESSION[$_SESSION['lang']]['By Magnitude of Risk']; ?>" style="text-decoration:none"><button type="button" class="btn btn-block btn-primary btn-sm"  style="margin-top:3px;"><?php echo $_SESSION[$_SESSION['lang']]['By Magnitude of Risk']; ?></button></a>
									
								</div>	
								<div style="background-color:#ecedf1;padding:10px;margin-top:12px;">
									<center><strong><?php echo $_SESSION[$_SESSION['lang']]['Risk Totals For Groups']; ?></strong></center>
									
									
									<a href="analyze_graphs?order=gm&title=<?php echo $_SESSION[$_SESSION['lang']]['By Magnitude of Risk']; ?>" style="text-decoration:none"><button type="button" class="btn btn-block btn-primary btn-sm"  style="margin-top:3px;"><?php echo $_SESSION[$_SESSION['lang']]['By Magnitude of Risk']; ?></button></a>
									
								</div>	<!--<br>
								<div style="background-color:#ecedf1;padding:10px;">
									<center><strong>Risk Totals For Groups</strong></center>
									<br>
									
									<button type="button" class="btn btn-block btn-primary btn-sm">By Magnitude of Risk</button>
									
								</div>	-->
								
								<br>
								<br>
								<?php echo $_SESSION[$_SESSION['lang']]['Time horizon']; ?>
								<input type="text" disabled="disabled" value="<?php echo $_SESSION['time_horizon']; ?>" style="width:100% !important">
								<br>
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
           
		   
		   
		   
		   
		   
	<script >

'use strict';

window.chartColors = {
	red: 'rgb(255, 99, 132)',
	orange: 'rgb(255, 159, 64)',
	yellow: 'rgb(255, 205, 86)',
	green: 'rgb(75, 192, 192)',
	blue: 'rgb(54, 162, 235)',
	purple: 'rgb(153, 102, 255)',
	grey: 'rgb(201, 203, 207)'
};

(function(global) {
	var MONTHS = [
		'January',
		'February',
		'March',
		'April',
		'May',
		'June',
		'July',
		'August',
		'September',
		'October',
		'November',
		'December'
	];

	var COLORS = [
		'#4dc9f6',
		'#f67019',
		'#f53794',
		'#537bc4',
		'#acc236',
		'#166a8f',
		'#00a950',
		'#58595b',
		'#8549ba'
	];

	var Samples = global.Samples || (global.Samples = {});
	var Color = global.Color;

	Samples.utils = {
		// Adapted from http://indiegamr.com/generate-repeatable-random-numbers-in-js/
		srand: function(seed) {
			this._seed = seed;
		},

		rand: function(min, max) {
			var seed = this._seed;
			min = min === undefined ? 0 : min;
			max = max === undefined ? 1 : max;
			this._seed = (seed * 9301 + 49297) % 233280;
			return min + (this._seed / 233280) * (max - min);
		},

		numbers: function(config) {
			var cfg = config || {};
			var min = cfg.min || 0;
			var max = cfg.max || 1;
			var from = cfg.from || [];
			var count = cfg.count || 8;
			var decimals = cfg.decimals || 8;
			var continuity = cfg.continuity || 1;
			var dfactor = Math.pow(10, decimals) || 0;
			var data = [];
			var i, value;

			for (i = 0; i < count; ++i) {
				value = (from[i] || 0) + this.rand(min, max);
				if (this.rand() <= continuity) {
					data.push(Math.round(dfactor * value) / dfactor);
				} else {
					data.push(null);
				}
			}

			return data;
		},

		labels: function(config) {
			var cfg = config || {};
			var min = cfg.min || 0;
			var max = cfg.max || 100;
			var count = cfg.count || 8;
			var step = (max - min) / count;
			var decimals = cfg.decimals || 8;
			var dfactor = Math.pow(10, decimals) || 0;
			var prefix = cfg.prefix || '';
			var values = [];
			var i;

			for (i = min; i < max; i += step) {
				values.push(prefix + Math.round(dfactor * i) / dfactor);
			}

			return values;
		},

		months: function(config) {
			var cfg = config || {};
			var count = cfg.count || 12;
			var section = cfg.section;
			var values = [];
			var i, value;

			for (i = 0; i < count; ++i) {
				value = MONTHS[Math.ceil(i) % 12];
				values.push(value.substring(0, section));
			}

			return values;
		},

		color: function(index) {
			return COLORS[index % COLORS.length];
		},

		transparentize: function(color, opacity) {
			var alpha = opacity === undefined ? 0.5 : 1 - opacity;
			return Color(color).alpha(alpha).rgbString();
		}
	};



	// INITIALIZATION

	Samples.utils.srand(Date.now());

	// Google Analytics
	/* eslint-disable */
	if (document.location.hostname.match(/^(www\.)?chartjs\.org$/)) {
		(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
		(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
		m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
		})(window,document,'script','//www.google-analytics.com/analytics.js','ga');
		ga('create', 'UA-28909194-3', 'auto');
		ga('send', 'pageview');
	}
	/* eslint-enable */

}(this));

</script>
	
		   
		   
		   
		   
		   
		   
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
session_start();


function porcentagem_nx ( $parcial, $total ) {
    return ( $parcial * 100 ) / $total;
}
?>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.5.3/jspdf.min.js"></script>
<script>

$('#downloadPdf').click(function(event) {
  // get size of report page
  var reportPageHeight = $('#reportPage').innerHeight()*3;
  var reportPageWidth = $('#reportPage').innerWidth()*3;
  
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
    var canvasHeight = $(this).innerHeight();
    var canvasWidth = $(this).innerWidth();
    
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
  var pdf = new jsPDF('l', 'pt', [reportPageWidth, reportPageHeight]);
  pdf.addImage($(pdfCanvas)[0], 'PNG', 0, 0);
  
  // download the pdf
  pdf.save('filename.pdf');
});

		// DEPRECATED
		window.randomScalingFactor = function() {
			return Math.round(Samples.utils.rand(0, 100));
		};
		
		
		<?php 
								if($_GET['order'] == "m" ){
									
									$in = AR_Analyse_risks::select_analyse_risk_by_project_by_magnitude();
									
								}else if($_GET['order'] == "gm" ){
									
									$in = AR_Analyse_risks::select_analyse_risk_by_group_by_magnitude();
									
								}else if($_GET['order'] == "f"){
								
									$in = AR_Analyse_risks::select_analyse_risk_by_project_by_fr();
								
								}else if($_GET['order'] == "l"){
								
									$in = AR_Analyse_risks::select_analyse_risk_by_project_by_le();
								
								}else if($_GET['order'] == "i"){
								
									$in = AR_Analyse_risks::select_analyse_risk_by_project_by_ia();
								
								}else if($_GET['order'] == "r"){
								
									$in = AR_Analyse_risks::select_analyse_risk_by_project_by_rare();
								
								}else{
								
									$in = AR_Analyse_risks::select_analyse_risk_by_project();
								
								}	
									
									/* 
									
									VALOR INICIAL DA BARRA DE INCERTEZA: Soma dos low estimates do A,B e C 
									VALOR FINAL DA BARRA DE INCERTEZA: Soma dos high estimates do A,B e C 
									
									*/
									
								if($in['num'] > 0){		 										
									foreach($in['dados'] as $in){
											$iniUncBar = 0.0;							
											$maxUncBar = 0.0;							
											$r = AR_Analyse_risks::select_risk_by_id($in['id_risk']);
											
											if($_GET['order'] == "gm" ){
												$nn = Risks::select_risk_group_id($r['ec_groups_id']);
												
												if(strlen($nn['risk_group']) > 40){
													$labels .= "'".substr($nn['risk_group'],0,40)."...',";
												}else{
													$labels .= "'".$nn['risk_group']."',";
													
												}
												
											}else{
												if(strlen($r['name']) > 40){
													$labels .= "'".substr($r['name'],0,40)."...',";
												}else{
													$labels .= "'".$r['name']."',";
													
												}	
											}	
											
											$iniUncBar = (float)$in['A_min_score']+(float)$in['B_min_score']+(float)$in['C_min_score'];
											$maxUncBar = (float)$in['A_max_score']+(float)$in['B_max_score']+(float)$in['C_max_score'];
											
											$fr .= "'".$in['Expected_Scores_FR']."',";
											$le .= "'".$in['Expected_Scores_LE']."',";
											$ia .= "'".$in['Expected_Scores_IA']."',";
											$iac .= "'".$in['C_unc_range']."',";
											$unBar .= "[".$iniUncBar.", ".$maxUncBar."],";
											
										
									}
								}
								
		?>
								
		<?php if($_GET['order'] == "l"){ ?>
		
			
			var barChartData = {
				labels: [<?php echo substr($labels,0,-1); ?>],
				datasets: [{
					label: <?php echo "'".$_SESSION[$_SESSION['lang']]['Loss to object']."'"; ?>,
					backgroundColor: window.chartColors.yellow,
					data: [
						<?php echo substr($le,0,-1); ?>
					]
				}, {
					label: <?php echo "'".$_SESSION[$_SESSION['lang']]['Frequency / Rate']."'"; ?>,
					backgroundColor: window.chartColors.red,
					data: [
						<?php echo substr($fr,0,-1); ?>
					]
				}, {
					label: <?php echo "'".$_SESSION[$_SESSION['lang']]['Collection affected']."'"; ?>,
					backgroundColor: window.chartColors.blue,
					data: [
						<?php echo substr($ia,0,-1); ?>
					]
				}, {
							label: 'Uncertainty bar',
							backgroundColor: "#000000",
							stack: 'Stack 1',
							
							barThickness: 6,
											
							data: [
								<?php echo substr($unBar,0,-1); ?>
							]
						}]

			};
			
		
		<?php }else if($_GET['order'] == "i"){ ?>
		
			var barChartData = {
				labels: [<?php echo substr($labels,0,-1); ?>],
				datasets: [
				
				 {
					label: <?php echo "'".$_SESSION[$_SESSION['lang']]['Collection affected']."'"; ?>,
					backgroundColor: window.chartColors.blue,
					data: [
						<?php echo substr($ia,0,-1); ?>
					]
				},
				{
					label: <?php echo "'".$_SESSION[$_SESSION['lang']]['Frequency / Rate']."'"; ?>,
					backgroundColor: window.chartColors.red,
					data: [
						<?php echo substr($fr,0,-1); ?>
					]
				}, {
					label: <?php echo "'".$_SESSION[$_SESSION['lang']]['Loss to object']."'"; ?>,
					backgroundColor: window.chartColors.yellow,
					data: [
						<?php echo substr($le,0,-1); ?>
					]
				}, {
							label: 'Uncertainty bar',
							backgroundColor: "#000000",
							stack: 'Stack 1',
							
							barThickness: 6,
											
							data: [
								<?php echo substr($unBar,0,-1); ?>
							]
						}]

			};
		
		
		<?php }else if($_GET['order'] == "gm"){ ?>
		
			 var barChartData = {
				labels: [<?php echo substr($labels,0,-1); ?>],
				datasets: [{
					label: [<?php echo substr($labels,0,-1); ?>],
					backgroundColor: window.chartColors.red,
					data: [
						<?php echo substr($ia,0,-1); ?>,
						<?php echo substr($fr,0,-1); ?>,
						<?php echo substr($le,0,-1); ?>
					]
				}]

			};
		
		
		<?php 
			}else if($_GET['order'] == "rlr"){ 
			
				$labels ="";
				$datas = "1,";	
				
				$inL = AR_Analyse_risks::select_analyse_risk_by_project_by_linear_MAX();
				$linearMAX = pow(10, ($inL['mrMAX']-15));
				$labels = "'".$inL['risk']." ',";			
				$magnitudMAX = $linearMAX;
				
				$inO = AR_Analyse_risks::select_analyse_risk_by_project_by_linear_OTHER($inL['id_risk']);	

				if($inO['num'] > 0){		 										
								foreach($inO['dados'] as $inO){
									$linearMR = pow(10, ($inO['magnitude_of_risk']-15));
									$labels .= "'".$inO['risk']." ',";	
									//$perc = porcentagem_nx($inO['magnitude_of_risk'], $magnitudMAX);
									$perc = (($linearMR / $magnitudMAX) * 100) ;
									$datas .= round(($perc/100),2).",";	
								}
				}
				
				
			
			?>
			
			
			
			 var barChartData = {
				labels: [<?php echo substr($labels,0,-1); ?>],
				datasets: [{
					label: [<?php echo substr($labels,0,-1); ?>],
					backgroundColor: window.chartColors.red,
					data: [
						<?php echo substr($datas,0,-1); ?>
					]
				}]

			};
		
		
		<?php }else if($_GET['order'] == "cf"){ ?>
		
			var barChartData = {
				labels: [<?php echo substr($labels,0,-1); ?>],
				datasets: [{
					label: <?php echo "'".$_SESSION[$_SESSION['lang']]['Frequency / Rate']."'"; ?>,
					backgroundColor: window.chartColors.red,
					data: [
						<?php echo substr($fr,0,-1); ?>
					]
				}, {
					label: <?php echo "'".$_SESSION[$_SESSION['lang']]['Loss to object']."'"; ?>,
					backgroundColor: window.chartColors.yellow,
					data: [
						<?php echo substr($le,0,-1); ?>
					]
				}, {
					label: <?php echo "'".$_SESSION[$_SESSION['lang']]['Collection affected']."'"; ?>,
					backgroundColor: window.chartColors.blue,
					data: [
						<?php echo substr($ia,0,-1); ?>
					]
				}]

			};
			
			var barChartData2 = {
					labels: [<?php echo substr($labels,0,-1); ?>],
					datasets: [{
						label: <?php echo "'".$_SESSION[$_SESSION['lang']]['Frequency / Rate']."'"; ?>,
						backgroundColor: 'rgba(54, 162, 235, 0)',
						data: [
							<?php echo substr($fr,0,-1); ?>
						]
					}, {
						label: <?php echo "'".$_SESSION[$_SESSION['lang']]['Loss to object']."'"; ?>,
						backgroundColor: 'rgba(255, 205, 86, 0.1)',
						data: [
							<?php echo substr($le,0,-1); ?>
						]
					}, {
						label: <?php echo "'".$_SESSION[$_SESSION['lang']]['Collection affected']."'"; ?>,
						backgroundColor: 'rgba(54, 162, 235, 1)',
						borderWidth: 1,
						borderColor: 'rgba(54, 162, 235, 0)',
						borderAlign: "inner",
						data: [
							<?php echo substr($iac,0,-1); ?>
						]
					}]

				};
				
		
		<?php }else{ ?>
		
				var barChartData = {
						labels: [<?php echo substr($labels,0,-1); ?>],
						datasets: [{
							label: <?php echo "'".$_SESSION[$_SESSION['lang']]['Frequency / Rate']."'"; ?>,
							backgroundColor: window.chartColors.red,
							stack: 'Stack 0',
							data: [
								<?php echo substr($fr,0,-1); ?>
							]
						}, {
							label: <?php echo "'".$_SESSION[$_SESSION['lang']]['Loss to object']."'"; ?>,
							backgroundColor: window.chartColors.yellow,
							stack: 'Stack 0',
							data: [
								<?php echo substr($le,0,-1); ?>
							]
						}, {
							label: <?php echo "'".$_SESSION[$_SESSION['lang']]['Collection affected']."'"; ?>,
							backgroundColor: window.chartColors.blue,
							stack: 'Stack 0',
							data: [
								<?php echo substr($ia,0,-1); ?>
							]
						} , {
							label: 'Uncertainty bar',
							backgroundColor: "#000000",
							stack: 'Stack 1',
							
							barThickness: 6,
											
							data: [
								<?php echo substr($unBar,0,-1); ?>
							]
						} ]

					};
		
	
		
		<?php } ?>
</script>		



<script>
		/* var barChartData2 = {
			labels: ['Fire', 'Theft', 'Chemical decay', 'Water', 'Bad weather', 'Lost', 'Others'],
			
			datasets: [{
				label: 'Frequenci/Rate (A)',
				backgroundColor: window.chartColors.red,
				stack: 'Stack 0',
				data: [
					3,
					2,
					4,
					2,
					3,
					7,
					4
				]
			}, {
				label: 'Loss to object (B)',
				backgroundColor: window.chartColors.yellow,
				stack: 'Stack 0',
				data: [
					4,
					5,
					3,
					5,
					2,
					6,
					3
				]
			}, {
				label: 'Collection affected (C)',
				backgroundColor: window.chartColors.blue,
				stack: 'Stack 0',
				data: [
					5,
					3,
					7,
					5,
					8,
					1,
					2
				]
			}, {
				label: 'Uncertainty bar',
				backgroundColor: "#000000",
				stack: 'Stack 1',
				
				barThickness: 6,
								
				data: [
					[5, 9],
					[8, 12],
					[12, 15],
					[2, 6],
					[4, 8],
					[7, 9],
					[8, 12]
				]
			}]

		};
		window.onload = function() {
			var ctx3 = document.getElementById('canvas2').getContext('2d');
			window.myBar = new Chart(ctx3, {
				type: 'horizontalBar',
				data: barChartData2,
				options: {
					plugins: {
						title: {
							display: true,
							text: 'Chart.js Bar Chart - Stacked'
						},
						tooltip: {
							mode: 'index',
							intersect: false
						}
					},
					responsive: true,
					scales: {
						x: {
							stacked: true,
						},
						y: {
							stacked: true
						}
					}
				}
			});
		}; */

		//document.getElementById('randomizeData').addEventListener('click', function() {
		//	barChartData.datasets.forEach(function(dataset) {
		//		dataset.data = dataset.data.map(function() {
		//			return randomScalingFactor();
		//		});
		//	});
		//	window.myBar.update();
		//});
	</script>

<script>		
		window.onload = function() {
			var ctx = document.getElementById('canvas').getContext('2d');
			var ctx2 = document.getElementById('canvas2').getContext('2d');
			
			window.myBar = new Chart(ctx, {
				type: 'horizontalBar',
				data: barChartData,
				options: {
					plugins: {
						title: {
							display: true,
							text: ''
						},
						tooltip: {
							mode: 'index',
							intersect: false
						}
					},
					responsive: true,
					scales: {
						x: {
							stacked: true,
						},
						y: {
							stacked: true
						}
					}
				}
			});
			
			window.myBar2 = new Chart(ctx2, {
				type: 'horizontalBar',
				data: barChartData2,
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
							gridLines: {
								color: "rgba(0, 0, 0, 0)",
							}
						}],
						yAxes: [{
							stacked: true,
							gridLines: {
								color: "rgba(0, 0, 0, 0)",
							}
						}]
					},
							legend: {
									onClick: (e) => e.stopPropagation()
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
			window.myBar2.update();
		});
		
		
		

	</script>