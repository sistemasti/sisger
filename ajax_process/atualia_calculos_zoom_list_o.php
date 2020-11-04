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
					$dados['uvp_le_percent'] 	= $formulaE;
					
					$ca = 5 + log10($formulaE/100);
					$dados['uvp_le_c'] 			= "C: ".round($ca,1); 
					
					$totalLow = Build_value_pie::select_sum_low_estimate_ec_value_pie_table($_POST['risk_id']);
					$a = ((float)$formulaE*(float)$low_estimate_general)/(float)$totalLow['total']; 
					$dados['ex_uvp_le_percent'] 		= round($a,5);
					
					$ca = 5 + log10(round($a,5)/100);
					$dados['ex_uvp_le_c'] 			= "C: ".round($ca,1);
					
					
					
					/* -- dados most probable*/
					$dados['uvp_mp_percent'] 	= $formulaF;
					
					$cb = 5 + log10($formulaF/100);
					$dados['uvp_mp_c'] 			= round($cb,1); 
					
					$totalMost = Build_value_pie::select_sum_most_probable_ec_value_pie_table($_POST['risk_id']);
					$b = ((float)$formulaF*(float)$most_probable_general)/(float)$totalMost['total']; 
					$dados['ex_uvp_mp_percent'] 		= round($b,5);
					
					$cb = 5 + log10(round($b,5)/100);
					$dados['ex_uvp_mp_c'] 			= "C: ".round($cb,1);
					
					
					
					/* -- dados high estimate*/
					$dados['uvp_he_percent'] 	= $formulaG;
					
					$cc =5 + log10($formulaG/100);
					$dados['uvp_he_c'] 			= round($cc,1); 
					
					$totalHigh = Build_value_pie::select_sum_high_estimate_ec_value_pie_table($_POST['risk_id']); 
					$c = ((float)$formulaG*(float)$high_estimate_general)/(float)$totalHigh['total']; 
					$dados['ex_uvp_he_percent'] 		= round($c,5);
					
					$cc 							= 5 + round($c,5)/100;
					$dados['ex_uvp_he_c'] 			= round($cc,1);
					
					
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
					$totalLow = Build_value_pie::select_sum_low_estimate_ec_value_pie_table($_POST['risk_id']); 
					$l = ((float)$totalLow['total']/(float)$items_in_asset)*100;
					$dados['aev_le_percent'] 	= round($l,5);
					
					$cd =5 + log10(round($l,5)/100);
					$dados['aev_le_c'] 			= "C: ".round($cd,1); 
					
					$totalLow = Build_value_pie::select_sum_low_estimate_ec_value_pie_table($_POST['risk_id']); 
					$l = ((float)$totalLow['total']/(float)$items_in_asset)*100;
					$l = round($l,5);
					$d = ((float)$l*(float)$low_estimate_general)/(float)$totalLow['total']; 
					$dados['ex_aev_le_percent'] 		= round($d,5);
					
					$cd =5 + log10(round($d,5)/100);
					$dados['ex_aev_le_c'] 			= "C: ".round($cd,1);
					
						
					/* -- dados most probable */
					$totalMost = Build_value_pie::select_sum_most_probable_ec_value_pie_table($_POST['risk_id']); 
					$m = ((float)$totalMost['total']/(float)$items_in_asset)*100;
					$dados['aev_mp_percent'] 	= $m;
					
					$ce =5 + log10(round($m,5)/100);
					$dados['aev_mp_c'] 			= round($ce,1); 
					
					$totalMost = Build_value_pie::select_sum_most_probable_ec_value_pie_table($_POST['risk_id']); 
					$l = ((float)$totalMost['total']/(float)$items_in_asset)*100;
					$l = round($l,5);
					$e = ((float)$l*(float)$most_probable_general)/(float)$totalMost['total']; 
					$dados['ex_aev_mp_percent'] 		= round($e,5);
					
					$ce =5 + log10(round($e,5)/100);
					$dados['ex_aev_mp_c'] 			= "C: ".round($ce,1);
					
					
					
					/* -- dados high estimate */
					$totalHigh = Build_value_pie::select_sum_high_estimate_ec_value_pie_table($_POST['risk_id']); 
					$h = ((float)$totalHigh['total']/(float)$items_in_asset)*100;
					$dados['aev_he_percent'] 	= $h;
					
					$cf =5 + log10(round($h,5)/100);
					$dados['aev_he_c'] 			= round($cf,1); 
					
					$totalMost = Build_value_pie::select_sum_high_estimate_ec_value_pie_table($_POST['risk_id']); 
					$l = ((float)$totalMost['total']/(float)$items_in_asset)*100;
					$l = round($l,5);
					$f = ((float)$l*(float)$high_estimate_general)/(float)$totalMost['total']; 
					$dados['ex_aev_he_percent'] 		= round($f,5);
					
					$cf = 5 + log10(round($f,5)/100);
					$dados['ex_aev_he_c'] 			= round($cf,1);
				
				
			
					
	echo json_encode($dados); 
				
				
?>








