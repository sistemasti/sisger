<?php
session_start();
include("../functions.php");
include("../models/DB.class.php");
include("../controllers/EC_Build_value_pie.class.php");

	
	Build_value_pie::update_ar_zoom_list_items_affected($_POST['low_estimate'], $_POST['most_probable'], $_POST['high_estimate'], $_POST['id']);

echo 1;

?>








