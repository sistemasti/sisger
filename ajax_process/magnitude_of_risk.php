<?php
session_start();
include("../functions.php");
include("../models/DB.class.php");
include("../controllers/AR_Analyse_risks.class.php");

//$i = AR_Analyse_risks::select_analyse_risk_id_risk($_REQUEST['id_risk']);


AR_Analyse_risks::update_analyse_risk_magnitude_of_risk($_POST['MR_low'],$_POST['MR_Probable'],$_POST['MR_High'],$_POST['MR_U_Range'],$_POST['Expected_Scores_FR'],$_POST['Expected_Scores_LE'],$_POST['Expected_Scores_IA'],$_POST['magnitude_of_risk'],$_REQUEST['id_risk']);
/* 	 */

 
/*  echo "<pre>"; 
	print_r($_POST);
echo "</pre>";  
  */
echo 1;

?>








