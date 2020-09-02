<?php
session_start();
include("../functions.php");
include("../models/DB.class.php");
include("../controllers/TR_Analyze_options.class.php");

$i = Analyze_options::select_analyse_risk_id_risk_id_option($_REQUEST['id_risk'],$_REQUEST['id_option']);

/* echo "<pre>";
print_r($_REQUEST);
echo "</pre>";
 */
if($_REQUEST['steps_o'] == "1"){
	
	$B_field_value_1 = $_POST['he_o'];
	$B_field_value_2 = $_POST['pl_o'];
	$B_field_value_3 = $_POST['le_o'];
	
}	

if($_REQUEST['steps_o'] == "2"){
	
	$B_field_value_1 = $_POST['he2_o'];
	$B_field_value_2 = $_POST['pl2_o'];
	$B_field_value_3 = $_POST['le2_o'];
	
}	

if($_REQUEST['steps_o'] == "3"){
	
	$B_field_value_1 = $_POST['he3_o'];
	$B_field_value_2 = $_POST['pl3_o'];
	$B_field_value_3 = $_POST['le3_o'];
	
}	

if($_REQUEST['steps_o'] == "4"){
	
	$B_field_value_1 = $_POST['he4_o'];
	$B_field_value_2 = $_POST['pl4_o'];
	$B_field_value_3 = $_POST['le4_o'];
	
}	

if($_REQUEST['steps_o'] == "5"){
	
	$B_field_value_1 = $_POST['he5_o'];
	$B_field_value_2 = $_POST['pl5_o'];
	$B_field_value_3 = $_POST['le5_o'];
	
}	

if($i['num'] > 0){
			//update_analyse_risk_le($B_type_risk_o,$B_min_score_o,$B_pro_score_o,$B_max_score_o,$B_unc_range_o,$B_explain_o,$B_field_value_1_o,$B_field_value_2_o,$B_field_value_3_o,$id){		
			Analyze_options::update_analyse_risk_le($_POST['B_fdLow_o'],$_POST['B_fdProbable_o'],$_POST['B_fdHigh_o'],$_POST['B_fdUncert_o'],$_POST['explain_le_o'],$B_field_value_1,$B_field_value_2,$B_field_value_3,$_REQUEST['steps_o'],$i['id']);
}else{
	
			//($id_project,$id_risk,$id_option,$B_min_score,$B_pro_score,$B_max_score,$B_unc_range,$B_explain,$B_explain_note,$B_field_value_1,$B_field_value_2,$B_field_value_3,$B_steps)
			Analyze_options::insert_analyse_risk_loss_to_each($_SESSION['project_id'],$_REQUEST['id_risk'],$_REQUEST['id_option'],$_POST['B_fdLow_o'],$_POST['B_fdProbable_o'],$_POST['B_fdHigh_o'],$_POST['B_fdUncert_o'],$_POST['explain_le_o'],'',$B_field_value_1,$B_field_value_2,$B_field_value_3,$_REQUEST['steps_o']);
}

/* 	 */

 
/* echo "<pre>"; 
	print_r($_POST);
echo "</pre>";  */
 
echo 1;

?>








