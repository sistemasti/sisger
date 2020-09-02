<?php
include("../functions.php");
include("../models/DB.class.php");
include("../controllers/EC_Build_value_pie.class.php");

$status = Build_value_pie::delete_ar_zoom_list_items_affected_o($_REQUEST['id']);
//return dados

?>








