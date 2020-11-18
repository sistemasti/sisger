<?php
session_start();
include("../functions.php");
include("../models/DB.class.php");
include("../controllers/AR_Analyse_risks.class.php");
 
	AR_Analyse_risks::update_expected_scores_o($_REQUEST['Expected_Scores_FR'],$_REQUEST['Expected_Scores_LE'],$_REQUEST['Expected_Scores_IA'],$_REQUEST['magnitude_of_risk'],$_REQUEST['type_calc'],$_REQUEST['id_risk'],$_REQUEST['id_option']);

echo 1;

?>








