<?php
include("../functions.php");
include("../models/DB.class.php");
include("../controllers/IR_Risks.class.php");
include("../controllers/IR_Agents.class.php");
include("../controllers/EC_Build_value_pie.class.php");

$go = Build_value_pie::select_ec_subgroups_value_id($_REQUEST['id']);

$dados['name'] 				= $go['name'];
$dados['definition'] 		= $go['definition'];
$dados['notes'] 			= $go['notes'];


echo json_encode($dados); 
//return dados

?>







