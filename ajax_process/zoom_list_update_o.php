<?php
session_start();
include("../functions.php");
include("../models/DB.class.php");
include("../controllers/EC_Build_value_pie.class.php");

	
	Build_value_pie::update_ar_zoom_list_items_affected_o($_POST['low_estimate_o'], $_POST['most_probable_o'], $_POST['high_estimate_o'], $_POST['id']);

echo 1;

?>








