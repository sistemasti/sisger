<?php
session_start();
include("../functions.php");
include("../models/DB.class.php");
include("../controllers/AR_Analyse_risks.class.php");

$i = AR_Analyse_risks::select_analyse_risk_id_risk($_REQUEST['id_risk']);


if($_POST['steps'] == "1"){
	
	$B_field_value_1 = $_POST['he'];
	$B_field_value_2 = $_POST['pl'];
	$B_field_value_3 = $_POST['le'];
	
}	

if($_POST['steps'] == "2"){
	
	$B_field_value_1 = $_POST['he2'];
	$B_field_value_2 = $_POST['pl2'];
	$B_field_value_3 = $_POST['le2'];
	
}	

if($_POST['steps'] == "3"){
	
	$B_field_value_1 = $_POST['he3'];
	$B_field_value_2 = $_POST['pl3'];
	$B_field_value_3 = $_POST['le3'];
	
}	

if($_POST['steps'] == "4"){
	
	$B_field_value_1 = $_POST['he4'];
	$B_field_value_2 = $_POST['pl4'];
	$B_field_value_3 = $_POST['le4'];
	
}	

if($_POST['steps'] == "5"){
	
	$B_field_value_1 = $_POST['he5'];
	$B_field_value_2 = $_POST['pl5'];
	$B_field_value_3 = $_POST['le5'];
	
}	

if($i['num'] > 0){
			//				update_analyse_risk_loss_to_each($B_min_score,$B_pro_score,$B_max_score,$B_unc_range,$B_explain,$B_explain_note,$B_field_value_1,$B_field_value_2,$B_field_value_3,$B_steps,$id_risk)
			AR_Analyse_risks::update_analyse_risk_loss_to_each($_POST['B_fdLow'],$_POST['B_fdProbable'],$_POST['B_fdHigh'],$_POST['B_fdUncert'],$_POST['explain_le'],'',$B_field_value_1,$B_field_value_2,$B_field_value_3,$_POST['steps'],$_REQUEST['id_risk']);
}else{
	
			
			AR_Analyse_risks::insert_analyse_risk_loss_to_each($_SESSION['project_id'],$_REQUEST['id_risk'],'',$_POST['B_fdLow'],$_POST['B_fdProbable'],$_POST['B_fdHigh'],$_POST['B_fdUncert'],$_POST['explain_le'],'',$B_field_value_1,$B_field_value_2,$B_field_value_3,$_POST['steps']);
}

/* 	 */

 
/* echo "<pre>"; 
	print_r($_POST);
echo "</pre>";  */
 
echo 1;

?>








