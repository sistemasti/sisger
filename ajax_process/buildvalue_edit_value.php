<?php
session_start();
include("../functions.php");
include("../models/DB.class.php");
include("../controllers/EC_Build_value_pie.class.php");
/* 	echo "<pre>";
	print_r($_GET);
	echo "</pre>"; */
	Build_value_pie::update_subgroup_name($_GET['name'],$_GET['id']);

echo 1;

?>








