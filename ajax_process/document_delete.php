<?php
include("../functions.php");
include("../models/DB.class.php");
include("../controllers/EC_Documents.class.php");

$f 	 = Documents::select_document_id($_REQUEST['id']);
$del = Documents::delete_document($_REQUEST['id']);


if($f['file'] != ""){
unlink("../files/".$f['file']);
}
//return dados

?>








