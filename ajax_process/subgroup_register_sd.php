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

	Build_value_pie::insert_ec_subgroups_value($_GET['group_id'],$_GET['name'],$_GET['itens'],$_GET['soma_for_single'],'');

echo 1;

?>








