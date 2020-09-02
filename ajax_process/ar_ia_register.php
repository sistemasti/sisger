<?php
session_start();
include("../functions.php");
include("../models/DB.class.php");
include("../controllers/AR_Analyse_risks.class.php");

$i = AR_Analyse_risks::select_analyse_risk_id_risk($_REQUEST['id_risk']);
$_SESSION['id_risk_temp'] = $_REQUEST['id_risk'];
/**/ 
/**/ 
/* echo "<pre>";
print_r($_POST);
echo "</pre>";
echo "<pre>";
print_r($_REQUEST);
echo "</pre>"; 

echo "--->".$i['id_risk']; */
 
if($i['num'] > 0){
			//echo "entrou 1";
			AR_Analyse_risks::update_analyse_risk_items_affected($_POST['ia_Inp_Min'],$_POST['ia_Inp_Med'],$_POST['ia_Inp_Max'],$_POST['ia_Inp_Range'],$_POST['explain_ia'],'',$_POST['heia'],$_POST['plia'],$_POST['leia'],$_POST['type_score'],$_POST['C_type_list'],$i['id_risk']);
}else{
	
			//echo "entrou 2";
			AR_Analyse_risks::insert_analyse_risk_items_affected($_SESSION['project_id'],$_REQUEST['id_risk'],'',$_POST['ia_Inp_Min'],$_POST['ia_Inp_Med'],$_POST['ia_Inp_Max'],$_POST['ia_Inp_Range'],$_POST['explain_ia'],'',$_POST['heia'],$_POST['plia'],$_POST['leia'],$_POST['type_score'],$_POST['C_type_list']);
}

/* 	 */

 
/* echo "<pre>"; 
	print_r($_POST);
echo "</pre>";  */
 
echo 1;

?>








