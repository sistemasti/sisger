<?php
session_start();
include("../functions.php");
include("../models/DB.class.php");
include("../controllers/Carrega_calculos.class.php");

/**/ echo  "<pre>";
print_r($_POST);
echo  "</pre>";

echo  "<pre>";
print_r($_GET);
echo  "</pre>"; 

	$c = Carrega_calculos::carrega_dados();
	
	

echo 1;

?>








