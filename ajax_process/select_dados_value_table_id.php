<?php
session_start();
include("../functions.php");
include("../models/DB.class.php");
include("../controllers/IR_Risks.class.php");
include("../controllers/IR_Agents.class.php");
include("../controllers/EC_Build_value_pie.class.php");

$go = Build_value_pie::select_ec_value_pie_table_id($_POST['id']);

$dados['identification'] 			= $go['group_value'].", ".$go['subgroup_value'];
$dados['items_in_group'] 			= $go['items_ind_subgroup'];
$dados['id_ec_value_pie_table'] 	= $go['id'];



echo json_encode($dados); 
//return dados

?>







