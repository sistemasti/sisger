<?php
session_start();
include("../functions.php");
include("../models/DB.class.php");
include("../controllers/TR_Analyze_options.class.php");

//$i = AR_Analyse_risks::select_analyse_risk_id_risk($_REQUEST['id_risk']);


Analyze_options::update_analyse_risk_magnitude_of_risk($_POST['MR_low'],$_POST['MR_Probable'],$_POST['MR_High'],'0.0',$_POST['Expected_Scores_FR'],$_POST['Expected_Scores_LE'],$_POST['Expected_Scores_IA'],$_POST['magnitude_of_risk'],$_REQUEST['id_risk'],$_REQUEST['id_option']);
/* 	 */

 
/*  echo "<pre>"; 
	print_r($_POST);
echo "</pre>";  
  */
echo 1;

?>








