<?php
include("../functions.php");
include("../models/DB.class.php");
include("../controllers/ADM_Users.class.php");

$status = Users::update_user_status($_REQUEST['status'],$_REQUEST['id']);

?>








