<?php
session_start();
include("../functions.php");
include("../models/DB.class.php");
include("../controllers/TR_Analyze_options.class.php");
 
	Analyze_options::update_data(datasql($_GET['datas']),$_GET['id']);

echo 1;

?>








