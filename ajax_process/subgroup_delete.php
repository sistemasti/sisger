<?php
session_start();
include("../functions.php");
include("../models/DB.class.php");
include("../controllers/EC_Build_value_pie.class.php");


$ds  = Build_value_pie::delete_ec_subgroups_value_by_id($_REQUEST['id']);


//PARA DELETAR DO ZOOM LIST
$gel = Build_value_pie::select_ec_value_pie_table_all_by_subgroup($_REQUEST['id']);
if($gel['num']>0){
	foreach($gel['dados'] as $gel){
		$del_vt = Build_value_pie::delete_ar_zoom_list_items_affected_by_table($gel['id']);
	}
}


$del_vt = Build_value_pie::delete_ec_values_and_their_scores_by_subgroup($_REQUEST['id']);

$dg  = Build_value_pie::delete_ec_value_pie_table_by_subgroup($_REQUEST['id']);
//return dados

?>








