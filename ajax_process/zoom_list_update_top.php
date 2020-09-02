<?php
session_start();
include("../functions.php");
include("../models/DB.class.php");
include("../controllers/EC_Build_value_pie.class.php");

	
	Build_value_pie::update_ar_zoom_list_items_affected_top($_GET['low_estimate_top'],$_GET['most_probable_top'],$_GET['high_estimate_top']);

echo 1;

?>








