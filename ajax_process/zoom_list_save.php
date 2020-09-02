<?php
session_start();
include("../functions.php");
include("../models/DB.class.php");
include("../controllers/EC_Build_value_pie.class.php");

	
	Build_value_pie::insert_ar_zoom_list_items_affected($_GET['risk_id'],$_POST['id_ec_value_pie_table'],$_POST['identification'],$_POST['numbers_itens_inp'],$_POST['low_estimate'],$_POST['most_probable'],$_POST['high_estimate']);

echo 1;

?>








