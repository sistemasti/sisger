<?php
session_start();
include("../functions.php");
include("../models/DB.class.php");
include("../controllers/AR_Analyse_risks.class.php");

$i = AR_Analyse_risks::select_ar_magnitudes_risk();


if($i['num'] > 0){
	
			AR_Analyse_risks::update_ar_magnitudes_risk($_GET['uncertainty_range'],$_GET['expected_scores'],$i['id']);
}else{
	
		
			AR_Analyse_risks::insert_ar_magnitudes_risk($_GET['uncertainty_range'],$_GET['expected_scores']);
}

/* 	 */

 
/* echo "<pre>"; 
	print_r($_GET);
echo "</pre>";  */
 
echo 1;

?>








