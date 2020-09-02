<?php
session_start();
include("../functions.php");
include("../models/DB.class.php");
include("../controllers/EC_Build_value_pie.class.php");
 	/**/ 
	echo "<pre>";
	print_r($_POST);
	echo "</pre>";  
	Build_value_pie::update_group($_POST['nameGroup'],$_POST['definition'],$_POST['note'],$_POST['group_selected']);

echo 1;

?>








