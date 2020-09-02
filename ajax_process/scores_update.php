<?php
session_start();
include("../functions.php");
include("../models/DB.class.php");
include("../controllers/EC_Build_value_pie.class.php");

/* echo  "<pre>";
print_r($_POST);
echo  "</pre>";

echo  "<pre>";
print_r($_GET);
echo  "</pre>"; */

   
	$value_pie_type = explode("|",$_GET['value_pie_value']);
	
    Build_value_pie::update_ec_values_and_their_scores($value_pie_type[1], $value_pie_type[0], $_GET['value_scale_value'], $_GET['result'], $_GET['id']);
    
	
	$v 	= Build_value_pie::select_ec_values_and_their_scores_by_id($_GET['id']);
	
	
	
	
	
	$g 	= Build_value_pie::select_sum_ec_values_and_their_scores_by_group($_SESSION['group_id']);
	$g2 = Build_value_pie::update_group_points($g['total'], $_SESSION['group_id']);
	
	
	
	
    $t 	= Build_value_pie::select_sum_ec_values_and_their_scores($v['subgroup_id']);
	$u 	= Build_value_pie::update_subgroup_points($t['total'],$v['subgroup_id']);
	
	$dados['total_group'] = $g['total'];
	$dados['total'] = $t['total'];
    echo json_encode($dados);

?>








