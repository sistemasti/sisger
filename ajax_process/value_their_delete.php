<?php
include("../functions.php");
include("../models/DB.class.php");
include("../controllers/EC_Build_value_pie.class.php");


$ds  = Build_value_pie::delete_ec_values_and_their_scores($_REQUEST['id']);

$g 	= Build_value_pie::select_sum_ec_values_and_their_scores_by_group($_SESSION['group_id']);
$g2 = Build_value_pie::update_group_points($g['total'], $_SESSION['group_id']);


$v 	= Build_value_pie::select_ec_values_and_their_scores_by_id($_REQUEST['id']);

$t = Build_value_pie::select_sum_ec_values_and_their_scores($v['subgroup_id']);
$u 	= Build_value_pie::update_subgroup_points($t['total'],$v['subgroup_id']);

?>








