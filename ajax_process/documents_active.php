<?php
include("../functions.php");
include("../models/DB.class.php");
include("../controllers/EC_Documents.class.php");

$status = Documents::update_document_status($_REQUEST['status'],$_REQUEST['id']);

?>








