<?php
session_start();
include("../functions.php");
include("../models/DB.class.php");
include("../controllers/EC_Build_value_pie.class.php");
 	/* echo "<pre>";
	print_r($_GET);
	echo "</pre>";  */
	Build_value_pie::update_subgroup_numbers_of_items($_GET['item'],$_GET['id']);
	
	$g = Build_value_pie::select_ec_subgroups_value_id($_GET['id']);
	$s = Build_value_pie::select_sum_itens_subgroup($g['group_id']);
echo $s['total'];

?>








