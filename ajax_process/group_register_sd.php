<?php
session_start();
include("../functions.php");
include("../models/DB.class.php");
include("../controllers/EC_Build_value_pie.class.php");

/* echo  "<pre>";
print_r($_POST);
echo  "</pre>";

echo  "<pre>";
print_r($_GET);
echo  "</pre>"; */

	Build_value_pie::insert_ec_groups_value_sd($_REQUEST['name'],$_REQUEST['value_ratio'],$_REQUEST['method_for_quantifying']);

echo 1;

?>








