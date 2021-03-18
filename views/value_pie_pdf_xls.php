<?php error_reporting(0); session_start(); 


ini_set("display_errors", 1);
if(isset($_GET['lang'])){
	
	$_SESSION['lang'] = $_GET['lang'];
	
}elseif(!isset($_SESSION['lang'])){

	$_SESSION['lang'] = "eng";

}

//session_name(md5('seg'.$_SERVER['REMOTE_ADDR'].$_SERVER['HTTP_USER_AGENT']));

if(!isset($_SESSION['id_logado'])){
	
	echo'<script language= "JavaScript">location.href="login"</script>';
	
}	

if($_SESSION['first_acess'] == "1"){
	
	echo'<script language= "JavaScript">location.href="first_acess"</script>';
	
}	

if((isset($_SESSION['project_fi']) && $_SESSION['project_fi'] == 0) || $_SESSION['perfil_logado'] == 4){
	$readonly = "readonly";
}else{ 
	$readonly = "";
}		

include("./functions.php");
include("./translate.php");
include("./models/DB.class.php");
include("./controllers/ADM_Institutions.class.php");
include("./controllers/ADM_Users.class.php");
include("./controllers/ADM_Projects.class.php");
include("./controllers/EC_Documents.class.php");
include("./controllers/IR_Risks.class.php");
include("./controllers/IR_Agents.class.php");
include("./controllers/AR_Analyse_risks.class.php");
include("./controllers/EC_Enter_values.class.php");
include("./controllers/EC_Build_value_pie.class.php");
include("./controllers/EC_Select_values.class.php");
include("./controllers/TR_Analyze_options.class.php");
include("./controllers/Access.class.php");

/* 

function __autoload($className){
	
	 //Carrega models
	 if(file_exists("./models/".$className.".class.php")){
          include("./models/".$className.".class.php"); 
     }
	 
	 //Carrega controllers
     if(file_exists("./controllers/".$className.".class.php")){
          include("./controllers/".$className.".class.php"); 
     }
} */
$arquivo = "value_pie.xls";  

   /**/
	/**/
	/* header('Content-Type: application/vnd.ms-excel; charset=UTF-8');
    header('Content-Disposition: attachment;filename="'.$arquivo.'"');
    header('Cache-Control: max-age=0'); 
  
    header('Cache-Control: max-age=1');    */
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
      

         <section class="content-header">
     
    </section>
		<center>
        <div class="row" style="margin-left:10%;">
          <div class="col-md-10" style="text-align:center !important;">
            <div class="card">
                <h2><?php echo $_SESSION[$_SESSION['lang']]['Value pie']; ?></h2>
             <!--<canvas id="pieChart4b" ></canvas>-->
			 <table>
			 <tr style="background-color: #ccc;">
			 <td><strong><?php echo $_SESSION[$_SESSION['lang']]['Group']; ?></strong></td>
			 <td><strong><?php echo $_SESSION[$_SESSION['lang']]['Subgroup']; ?></strong></td>
			 <td></strong><?php echo $_SESSION[$_SESSION['lang']]['Number of items']; ?></strong></td>
			 </tr>
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
						<tr>
						<td><?php echo $in2['group_name']; ?></td>
						<td><?php echo $in2['subgroup_name']; ?></td>
						<td><?php echo $in2['numbers_of_items']; ?></td>
						
						</tr>
						<?php
						
		?>
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
		</center>
       
        <!-- /.row -->

	  
	
      
	  
	  
      </div><!--/. container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <!-- Control Sidebar -->
 
  <!-- /.control-sidebar -->
  
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
				cutoutPercentage: 0
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
		});
	</script>