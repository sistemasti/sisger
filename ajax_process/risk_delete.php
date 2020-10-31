<?php
include("../functions.php");
include("../models/DB.class.php");
include("../controllers/IR_Risks.class.php");

$status = Risks::delete_risk($_REQUEST['id']);
$status = Risks::delete_ar_analyze_risks($_REQUEST['id']);
$status = Risks::delete_ar_zoom_list_items_affected($_REQUEST['id']);
$status = Risks::delete_ar_zoom_list_items_affected_o($_REQUEST['id']);
$status = Risks::delete_tr_analyze_options($_REQUEST['id']);
$status = Risks::delete_tr_identify_options($_REQUEST['id']);
//return dados

?>








