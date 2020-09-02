<?php
require_once "./models/DB.class.php";
require_once "./controllers/Access.class.php";

$objAccess 	= new Access;

$objAccess->sair();
echo'<script language= "JavaScript">location.href="login"</script>';


?>

