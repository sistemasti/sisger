<?php
session_start();
//error_reporting(0);

include("../functions.php");
include("../models/DB.class.php");
include("../controllers/EC_Build_value_pie.class.php");

				


	
				$ia = Build_value_pie::select_ar_zoom_list_items_affected_o($_POST['risk_id'],$_POST['option_id']); 
				//if($ia['num'] > 0){
				if(isset($ia['dados'][0]['low_estimate_general'])){
					$low_estimate_general=$ia['dados'][0]['low_estimate_general'];
				}else{
					$low_estimate_general='0.0';
				}	
				
				if(isset($ia['dados'][0]['most_probable_general'])){
					$most_probable_top=$ia['dados'][0]['most_probable_general'];
				}else{
					$most_probable_top='0.0';
				}	
				
				if(isset($ia['dados'][0]['high_estimate_general'])){
					$high_estimate_top=$ia['dados'][0]['high_estimate_general'];
				}else{
					$high_estimate_top='0.0';
				}	
				
				
				$formulaE = 0;
				$formulaF = 0;
				$formulaG = 0;
				foreach($ia['dados'] as $ia){
					
				$vp = Build_value_pie::select_ec_value_pie_table_id($ia['id_ec_value_pie_table']);	
				
				//if($vp['num'] > 0){
				
				if($vp['items_value_as_percent_of_asset'] ==0 || $vp['items_value_as_percent_of_asset'] ==''){
					$items_value_as_percent_of_asset = 1;
				}else{
					$items_value_as_percent_of_asset = $vp['items_value_as_percent_of_asset'];		
				}		
				
				$formulaE = $formulaE+((float)($ia['low_estimate'])*(float)($items_value_as_percent_of_asset));
				
				$formulaF = $formulaF+((float)($ia['most_probable'])*(float)($items_value_as_percent_of_asset));
				
				$formulaG = $formulaG+((float)($ia['high_estimate'])*(float)($items_value_as_percent_of_asset));
				
				$items_in_asset = $vp['items_in_asset'];
				$low_estimate_general = $ia['low_estimate_general'];
				$most_probable_general = $ia['most_probable_general'];
				$high_estimate_general = $ia['high_estimate_general'];
				
				}
				
				
				/* USING VALUE PIE:	*/
				
				
					/* -- dados low estimate*/
					$dados['uvp_le_percent'] 	= round($formulaE,4)."%";
					
					$ca = 5 + log10($formulaE/100);
					$dados['uvp_le_c'] 			= "C: ".round($ca,1); 
					
					$totalLow = Build_value_pie::select_sum_low_estimate_ec_value_pie_table_o($_POST['risk_id'],$_POST['option_id']);
					
					if((float)$totalLow['total'] > 0){
					
						$a = ((float)$formulaE*(float)$low_estimate_general)/(float)$totalLow['total']; 
						$dados['ex_uvp_le_percent'] 		= round($a,4)."%";
						
						$ca = 5 + log10(round($a,5)/100);
						//$dados['ex_uvp_le_c'] 			= "C: ".round($ca,1);
					}else{
						$ca = 0.0;
					}
					
					if(round($ca,1) != -INF){
						$dados['ex_uvp_le_c'] 			= round($ca,1);
					}else{
						$dados['ex_uvp_le_c'] 			= 0.0;
					}
					
					
					/* -- dados most probable*/
					$dados['uvp_mp_percent'] 	= round($formulaF,4)."%";
					
					$cb = 5 + log10($formulaF/100);
					$dados['uvp_mp_c'] 			= round($cb,1); 
					
					$totalMost = Build_value_pie::select_sum_most_probable_ec_value_pie_table_o($_POST['risk_id'],$_POST['option_id']);
					
					if((float)$totalMost['total'] > 0){
						$b = ((float)$formulaF*(float)$most_probable_general)/(float)$totalMost['total']; 
						$dados['ex_uvp_mp_percent'] 		= round($b,4)."%";
						
						$cb = 5 + log10(round($b,5)/100);
						//$dados['ex_uvp_mp_c'] 			= "".round($cb,1);
					}else{
						$cb = 0.0;	
					}
					
					if(round($cb,1) != -INF){
						$dados['ex_uvp_mp_c'] 			= round($cb,1);
					}else{
						$dados['ex_uvp_mp_c'] 			= 0.0;
					}
					
					
					/* -- dados high estimate*/
					$dados['uvp_he_percent'] 	= round($formulaG,4)."%";
					
					$cc =5 + log10($formulaG/100);
					$dados['uvp_he_c'] 			= round($cc,1); 
					
					$totalHigh = Build_value_pie::select_sum_high_estimate_ec_value_pie_table_o($_POST['risk_id'],$_POST['option_id']); 
					
					if((float)$totalHigh['total'] > 0){
						
						$c = ((float)$formulaG*(float)$high_estimate_general)/(float)$totalHigh['total']; 
						$dados['ex_uvp_he_percent'] 		= round($c,4)."%";
						
						//$cc 							= round($c,5)/100;
						$cc 							= 5 + log10(round($c,5)/100);
						//$cc 							= 5 + round($c,5)/100;
						//$dados['ex_uvp_he_c'] 		= round($cc,1);
						
					}else{
						$cc 							= 0.0;
					}
					
					if(round($cc,1) != -INF){
						$dados['ex_uvp_he_c'] 			= round($cc,1);
					}else{
						$dados['ex_uvp_he_c'] 			= 0.0;
					}
					
					
					if($_GET['type_list_1'] == 'true'){
						
						$C_unc_range = (float)$dados['uvp_he_c'] - (float)$dados['uvp_le_c'];
						
						$u = Build_value_pie::update_analyze_risk_by_zoom_ia_o(str_ireplace("C:","",$dados['uvp_le_c']),$dados['uvp_mp_c'], $dados['uvp_he_c'],$C_unc_range, $_POST['risk_id'],$_POST['option_id']);
						
					}
					
					if($_GET['type_list_2'] == 'true'){
						
						$C_unc_range = (float)$dados['ex_uvp_he_c'] - (float)$dados['ex_uvp_le_c'];
						
						$u = Build_value_pie::update_analyze_risk_by_zoom_ia_o(str_ireplace("C:","",$dados['ex_uvp_le_c']),str_ireplace("C:","",$dados['ex_uvp_mp_c']), $dados['ex_uvp_he_c'],$C_unc_range, $_POST['risk_id'],$_POST['option_id']);
						
					}
					
					
					
					/* ASSUMING ALL ITEMS OF EQUAL VALUE::	*/
				
				
					/* -- dados low estimate*/
					$totalLow = Build_value_pie::select_sum_low_estimate_ec_value_pie_table_o($_POST['risk_id'],$_POST['option_id']); 
					$l = ((float)$totalLow['total']/(float)$items_in_asset)*100;
					$dados['aev_le_percent'] 	= round($l,4)."%";
					
					$cd =5 + log10(round($l,5)/100);
					$dados['aev_le_c'] 			= "C: ".round($cd,1); 
					
					$totalLow = Build_value_pie::select_sum_low_estimate_ec_value_pie_table_o($_POST['risk_id'],$_POST['option_id']); 
					$l = ((float)$totalLow['total']/(float)$items_in_asset)*100;
					$l = round($l,5);
					
					if((float)$totalLow['total'] > 0){
						$d = ((float)$l*(float)$low_estimate_general)/(float)$totalLow['total']; 
					}else{
						$d = 0.0;
					}
					
					
					$dados['ex_aev_le_percent'] 		= round($d,4)."%";
					
					$cd =5 + log10(round($d,5)/100);
					//$dados['ex_aev_le_c'] 			= "C: ".round($cd,1);
					
					if(round($cd,1) != -INF){
						$dados['ex_aev_le_c'] 			= round($cd,1);
					}else{
						$dados['ex_aev_le_c'] 			= 0.0;
					}
					
						
					/* -- dados most probable */
					$totalMost = Build_value_pie::select_sum_most_probable_ec_value_pie_table_o($_POST['risk_id'],$_POST['option_id']); 
					$m = ((float)$totalMost['total']/(float)$items_in_asset)*100;
					$dados['aev_mp_percent'] 	= round($m,4)."%";
					
					$ce =5 + log10(round($m,5)/100);
					$dados['aev_mp_c'] 			= round($ce,1); 
					
					$totalMost = Build_value_pie::select_sum_most_probable_ec_value_pie_table_o($_POST['risk_id'],$_POST['option_id']); 
					$l = ((float)$totalMost['total']/(float)$items_in_asset)*100;
					$l = round($l,5);
					
					if((float)$totalMost['total'] > 0){
						$e = ((float)$l*(float)$most_probable_general)/(float)$totalMost['total']; 
					}else{
						$e = 0.0;	
					}
					$dados['ex_aev_mp_percent'] 		= round($e,4)."%";
					
					$ce =5 + log10(round($e,5)/100);
					//$dados['ex_aev_mp_c'] 			= "".round($ce,1);
					
					if(round($ce,1) != -INF){
						$dados['ex_aev_mp_c'] 			= round($ce,1);
					}else{
						$dados['ex_aev_mp_c'] 			= 0.0;
					}
					
					
					/* -- dados high estimate */
					$totalHigh = Build_value_pie::select_sum_high_estimate_ec_value_pie_table_o($_POST['risk_id'],$_POST['option_id']); 
					$h = ((float)$totalHigh['total']/(float)$items_in_asset)*100;
					$dados['aev_he_percent'] 	= round($h,4)."%";
					
					$cf =5 + log10(round($h,5)/100);
					$dados['aev_he_c'] 			= round($cf,1); 
					
					$totalMost = Build_value_pie::select_sum_high_estimate_ec_value_pie_table_o($_POST['risk_id'],$_POST['option_id']); 
					$l = ((float)$totalMost['total']/(float)$items_in_asset)*100;
					$l = round($l,5);
					
					if((float)$totalMost['total'] > 0){
						$f = ((float)$l*(float)$high_estimate_general)/(float)$totalMost['total']; 
					}else{
						$f = 0.0;	
					}
					
					$dados['ex_aev_he_percent'] 		= round($f,4)."%";
					
					$cf = 5 + log10(round($f,5)/100);
					
					
					if(round($cf,1) != -INF){
						$dados['ex_aev_he_c'] 			= round($cf,1);
					}else{
						$dados['ex_aev_he_c'] 			= 0.0;
					}
				
				
					
	echo json_encode($dados); 
				
				
?>








