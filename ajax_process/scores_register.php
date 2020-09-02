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
    $result = $value_pie_type[1] * $_GET['value_scale_value'];
	
	/* echo "<pre>";
		print_r($value_pie_type);
	echo "</pre>"; */
	
	Build_value_pie::insert_ec_values_and_their_scores($_GET['subgroup_id'],$value_pie_type[0],$value_pie_type[1],$_GET['value_scale_value'],$result);

	$t = Build_value_pie::select_sum_ec_values_and_their_scores($_GET['subgroup_id']);
	$s = Build_value_pie::select_ec_subgroups_value_id($_GET['subgroup_id']);
	
	
	$t = Build_value_pie::select_sum_ec_values_and_their_scores_by_group($s['group_id']);
	$g = Build_value_pie::update_group_points($t['total'], $s['group_id']);
	
	$u 	= Build_value_pie::update_subgroup_points($t['total'],$_GET['subgroup_id']);
	
	//Build_value_pie::update_group_points($t['total'], $s['group_id']);
	Build_value_pie::update_subgroup_points($t['total'], $_GET['subgroup_id']);
	
    
	echo $t['total'];

?>








