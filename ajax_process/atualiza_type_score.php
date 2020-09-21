<?php
include("../functions.php");
include("../models/DB.class.php");
include("../controllers/AR_Analyse_risks.class.php");

$status = AR_Analyse_risks::atualiza_type_score($_REQUEST['type_score'],$_REQUEST['id_risk']);

?>








