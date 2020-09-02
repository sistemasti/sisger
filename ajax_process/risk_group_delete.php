<?php
include("../functions.php");
include("../models/DB.class.php");
include("../controllers/IR_Risks.class.php");

$status = Risks::delete_risk_group($_REQUEST['id']);
//return dados

?>








