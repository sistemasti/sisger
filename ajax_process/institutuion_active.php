<?php
include("../functions.php");
include("../models/DB.class.php");
include("../controllers/ADM_Institutions.class.php");

$status = Institutions::update_institution_status($_REQUEST['status'],$_REQUEST['id'])
//return dados

?>








