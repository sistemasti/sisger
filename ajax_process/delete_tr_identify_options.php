<?php
session_start();
include("../functions.php");
include("../models/DB.class.php");
include("../controllers/TR_Analyze_options.class.php");
 
	Analyze_options::delete_tr_identify_options($_POST['id']);

echo 1;

?>








