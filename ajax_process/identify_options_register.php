<?php
session_start();
include("../functions.php");
include("../models/DB.class.php");
include("../controllers/TR_Analyze_options.class.php");


	Analyze_options::insert_identify_options($_POST['id_risk'],$_POST['id_option'],datasql($_POST['data']),$_POST['summary'],$_POST['one_time_cost'],$_POST['annual_cost']);
/* 	 */

 
/* echo "<pre>"; 
	print_r($_POST);
echo "</pre>";  */
 
echo $_POST['id_risk'];

?>








