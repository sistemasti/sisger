<?php
session_start();
include("../functions.php");
include("../models/DB.class.php");
include("../controllers/IR_Risks.class.php");
include("../controllers/IR_Agents.class.php");
include("../controllers/TR_Analyze_options.class.php");

/* echo "<pre>";
print_r($_POST); 
echo "<pre>"; */

$ar = Analyze_options::select_options_id_option_and_id_risk($_POST['id_option'],$_POST['id_risk']);


if($ar['num'] > 0){
	
	$dados['data']					= databr($ar['data']);
	$dados['summary']				= $ar['summary'];
	$dados['one_time_cost']			= $ar['one_time_cost'];
	$dados['annual_cost']			= $ar['annual_cost'];
	
		
}else{

	$dados['data']					= '00/00/0000';
	$dados['summary']				= '-';
	$dados['one_time_cost']			= '0.00';
	$dados['annual_cost']			= '0.00';
	
	
}	

echo json_encode($dados); 
//return dados

?>







