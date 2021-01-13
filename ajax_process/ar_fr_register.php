<?php
session_start();
include("../functions.php");
include("../models/DB.class.php");
include("../controllers/AR_Analyse_risks.class.php");

	$i = AR_Analyse_risks::select_analyse_risk_id_risk($_REQUEST['id_risk']);
	
	if($i['num'] > 0){
		
		
		/* 
		update_analyse_risk(
		
		$A_type_risk,
		$A_min_score,
		$A_pro_score,
		$A_max_score,
		$A_unc_range,
		$A_explain,
		$A_field_value_1,
		$A_field_value_2,
		$A_field_value_3,
		$id_risk
		
		) 
		
		*/
		
		AR_Analyse_risks::update_analyse_risk(
		$_POST['type_risk'],
		$_POST['fdLow'],
		$_POST['fdProbable'],
		$_POST['fdHigh'],
		$_POST['fdUncert'],
		$_POST['explain'],
		$_POST['ley'],
		$_POST['abey'],
		$_POST['hey'],
		$_REQUEST['id_risk']
		);
	}else{
		
		/* 
			
			insert_analyse_risk(
			$id_project,
			$id_risk,
			$A_type_risk,
			$A_min_score,
			$A_pro_score,
			$A_max_score,
			$A_unc_range,
			$A_explain,
			$A_explain_note,
			$A_field_value_1,
			$A_field_value_2,
			$A_field_value_3,
			$time_horizon)

		*/
		
		AR_Analyse_risks::insert_analyse_risk(
		
		
		$_SESSION['project_id'],
		$_GET['id_risk'],
		$_POST['type_risk'],
		$_POST['fdLow'],
		$_POST['fdProbable'],
		$_POST['fdHigh'],
		$_POST['fdUncert'],
		$_POST['explain'],
		'',
		$_POST['ley'],
		$_POST['abey'],
		$_POST['hey'],
		$_REQUEST['time_horizon']
		
		);
	}
echo 1;

?>








