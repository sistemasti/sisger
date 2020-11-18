<?php
session_start();
include("../functions.php");
include("../models/DB.class.php");
include("../controllers/EC_Build_value_pie.class.php");
	
	print_r($_POST);
	
	Build_value_pie::update_zoom_list_type_list_o($_POST['type_list'], $_POST['option_id'], $_POST['id']);

echo 1;

?>








