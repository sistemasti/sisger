<?php
session_start();
include("../functions.php");
include("../models/DB.class.php");
include("../controllers/AR_Analyse_risks.class.php");

	$i = AR_Analyse_risks::select_analyse_risk_id_risk($_REQUEST['id_risk']);
	
	if($i['num'] > 0){
		AR_Analyse_risks::update_analyse_risk($_POST['type_risk'],$_POST['fdLow'],$_POST['fdProbable'],$_POST['fdHigh'],$_POST['fdUncert'],$_POST['explain'],$_POST['hey'],$_POST['abey'],$_POST['ley'],$_REQUEST['id_risk']);
	}else{
		AR_Analyse_risks::insert_analyse_risk($_SESSION['project_id'],$_GET['id_risk'],$_POST['type_risk'],$_POST['fdLow'],$_POST['fdProbable'],$_POST['fdHigh'],$_POST['fdUncert'],$_POST['explain'],'',$_POST['ley'],$_POST['abey'],$_POST['hey'],$_REQUEST['time_horizon']);
	}
echo 1;

?>








