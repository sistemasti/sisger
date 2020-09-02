<?php
session_start();
include("../functions.php");
include("../models/DB.class.php");
include("../controllers/TR_Analyze_options.class.php");
 
	Analyze_options::update_annual_cost($_GET['annual_cost'],$_GET['id']);

echo 1;

?>








