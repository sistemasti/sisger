<?php
session_start();
include("../functions.php");
include("../models/DB.class.php");
include("../controllers/AR_Analyse_risks.class.php");

$i = AR_Analyse_risks::select_analyse_risk_id_risk($_REQUEST['id_risk']);
$_SESSION['id_risk_temp'] = $_REQUEST['id_risk'];
/**/ 
/**/ 
/*
	static function update_analyse_risk_items_affected($C_min_score,$C_pro_score,$C_max_score,$C_unc_range,$C_explain,$C_field_value_1,$C_field_value_2,$C_field_value_3,$C_type_score,$C_type_list,$id_risk){
			
				$n = self::getConn()->prepare('
													UPDATE  `ar_analyze_risks` SET 
													   `C_min_score` =?,
													   `C_pro_score` =?,
													   `C_max_score` =?,
													   `C_unc_range` =?,
													   `C_explain` =?,
													   
													   `C_field_value_1` =?,
													   `C_field_value_2` =?,
													   `C_field_value_3` =?,
													   `C_type_score` =?,
													   `C_type_list` =?
													WHERE  `id_risk` =? ');
											
				$n->execute(array($C_min_score,$C_pro_score,$C_max_score,$C_unc_range,$C_explain,$C_field_value_1,$C_field_value_2,$C_field_value_3,$C_type_list,$C_type_list,$_SESSION['id_risk_temp']));
			
		}
  */
if($i['num'] > 0){
			//echo "entrou 1";
			AR_Analyse_risks::update_analyse_risk_items_affected($_POST['ia_Inp_Min'],$_POST['ia_Inp_Med'],$_POST['ia_Inp_Max'],$_POST['ia_Inp_Range'],$_POST['explain_ia'],$_POST['heia'],$_POST['plia'],$_POST['leia'],$_POST['type_score'],$_POST['C_type_list'],$i['id_risk']);
}else{
	
			/* 

			$n = self::getConn()->prepare('INSERT INTO `ar_analyze_risks` SET 
											id_project=?,
											id_risk=?,
											C_min_score=?,
											C_pro_score=?,
											C_max_score=?,
											C_unc_range=?,
											C_explain=?,
											C_explain_note=?,
											C_field_value_1=?,
											C_field_value_2=?,
											C_field_value_3=?,
											C_type_score = ?, 
											C_type_list = ?, 
											data_cadastro="'.date("Y-m-d").'"		
										  ');		
					
			*/
			AR_Analyse_risks::insert_analyse_risk_items_affected($_SESSION['project_id'],$_REQUEST['id_risk'],$_POST['ia_Inp_Min'],$_POST['ia_Inp_Med'],$_POST['ia_Inp_Max'],$_POST['ia_Inp_Range'],$_POST['explain_ia'],'',$_POST['heia'],$_POST['plia'],$_POST['leia'],$_POST['type_score'],$_POST['C_type_list']);
			
			
			
}

/* 	 */

 if($_POST['type_score']==1){
				
				AR_Analyse_risks::delete_ar_zoom_list_items_affected_by_risk($_REQUEST['id_risk']);
			}
/* echo "<pre>"; 
	print_r($_POST);
echo "</pre>"; */ 
 
echo 1;

?>








