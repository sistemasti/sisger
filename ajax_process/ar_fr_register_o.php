<?php
session_start();
include("../functions.php");
include("../models/DB.class.php");
include("../controllers/TR_Analyze_options.class.php");

	$i = Analyze_options::select_analyse_risk_id_risk_id_option($_REQUEST['id_risk'],$_REQUEST['id_option']);
	
	if($i['num'] > 0){
		
		Analyze_options::update_analyse_risk($_REQUEST['type_risk'],$_POST['fdLow_o'],$_POST['fdProbable_o'],$_POST['fdHigh_o'],$_POST['fdUncert_o'],$_POST['explain_o'],$_POST['ley_o'],$_POST['abey_o'],$_POST['hey_o'],$i['id']);
		
	}else{
		
	
		Analyze_options::insert_analyse_risk($_SESSION['project_id'],$_GET['id_risk'],$_GET['id_option'],$_REQUEST['type_risk'],$_POST['fdLow_o'],$_POST['fdProbable_o'],$_POST['fdHigh_o'],$_POST['fdUncert_o'],$_POST['explain_o'],'',$_POST['hey_o'],$_POST['abey_o'],$_POST['ley_o'],$_REQUEST['time_horizon']);
	}
echo 1;

?>








