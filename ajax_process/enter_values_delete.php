<?php
include("../functions.php");
include("../models/DB.class.php");
include("../controllers/EC_Enter_values.class.php");

$value_pie_type = Enter_values::select_ec_mixed_values_by_value_pie_type($_REQUEST['id']);

if($value_pie_type['num'] > 0){
	echo 1;
}else{	
	$status = Enter_values::delete_ec_mixed_values($_REQUEST['id']);
}
//return dados

?>








