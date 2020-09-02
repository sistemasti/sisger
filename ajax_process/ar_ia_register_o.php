<?php
session_start();
include("../functions.php");
include("../models/DB.class.php");
include("../controllers/TR_Analyze_options.class.php");

$i = Analyze_options::select_analyse_risk_id_risk_id_option($_REQUEST['id_risk'],$_REQUEST['id_option']);

/*  echo "<pre>";
print_r($_REQUEST);
echo "</pre>";*/



if($i['num'] > 0){
			//$C_min_score,$C_pro_score,$C_max_score,$C_unc_range,$C_explain,$C_field_value_1,$C_field_value_2,$C_field_value_3,$C_type_score,$C_type_list,$id_risk	
			Analyze_options::update_analyse_risk_items_affected($_POST['ia_Inp_Min_o'],$_POST['ia_Inp_Med_o'],$_POST['ia_Inp_Max_o'],$_POST['ia_Inp_Range_o'],$_POST['explain_ia_o'],$_POST['heia_o'],$_POST['plia_o'],$_REQUEST['leia_o'],$_REQUEST['type_score'],$_REQUEST['C_type_list'],$i['id']);
}else{
	
			//($id_project,$id_risk,$id_option,$C_min_score,$C_pro_score,$C_max_score,$C_unc_range,$C_explain,$C_explain_note,$C_field_value_1,$C_field_value_2,$C_field_value_3,$C_type_score,$C_type_list)
			Analyze_options::insert_analyse_risk_items_affected($_SESSION['project_id'],$_REQUEST['id_risk'],$_REQUEST['id_option'],$_POST['ia_Inp_Min_o'],$_POST['ia_Inp_Med_o'],$_POST['ia_Inp_Max_o'],$_POST['ia_Inp_Range_o'],$_POST['explain_ia_o'],'',$_POST['heia_o'],$_POST['plia_o'],$_REQUEST['leia_o'],$_REQUEST['type_score'],$_REQUEST['C_type_list']);
}

/* 	 */

 
/* echo "<pre>"; 
	print_r($_POST);
echo "</pre>";  */
 
echo 1;

?>








