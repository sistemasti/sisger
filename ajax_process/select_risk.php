<?php
session_start();
include("../functions.php");
include("../models/DB.class.php");
include("../controllers/IR_Risks.class.php");
include("../controllers/IR_Agents.class.php");
include("../controllers/AR_Analyse_risks.class.php");

$ar = AR_Analyse_risks::select_analyse_risk_id_risk($_REQUEST['id']);

$_SESSION['risk_id'] = $_REQUEST['id'];

$status = Risks::select_risk_id($_REQUEST['id']);
$agente = Agents::select_ir_agents_id($status['ir_agents_id']);

$dados['agent'] 		= $agente['agent'] != "" ? $agente['agent']:"";
$dados['summary'] 		= $status['summary'] != "" ? $status['summary']:"";

if($ar['num'] > 0){
	
	$dados['risk']		= $status['name'];
	
	//A	
	$dados['type_risk']		= $ar['A_type_risk'];
	$dados['fdLow'] 		= ($ar['A_min_score'] != '')?$ar['A_min_score']:'0.0';
	$dados['fdProbable'] 	= ($ar['A_pro_score'] != '')?$ar['A_pro_score']:'0.0';
	$dados['fdHigh'] 		= ($ar['A_max_score'] != '')?$ar['A_max_score']:'0.0';
	$dados['fdUncert'] 		= $ar['A_unc_range'];
	$dados['explain'] 		= $ar['A_explain'];
	$dados['ley'] 			= $ar['A_field_value_1'];
	$dados['abey'] 			= $ar['A_field_value_2'];
	$dados['hey'] 			= $ar['A_field_value_3'];
	$dados['B_fdLow'] 		= $ar['B_min_score'];
	$dados['steps']			= $ar['B_steps'];
	
	$dados['magnitude_FR_Low'] 			= ($ar['A_min_score'] != '')?$ar['A_min_score']:'0.0';
	$dados['magnitude_FR_Probable'] 	= ($ar['A_pro_score'] != '')?$ar['A_pro_score']:'0.0';
	$dados['magnitude_FR_High'] 		= ($ar['A_max_score'] != '')?$ar['A_max_score']:'0.0';
	
	
	$dados['fr_zoom_obs']							= $ar['fr_zoom_obs'];
	$dados['fr_zoom_link']							= $ar['fr_zoom_link'];	
	$dados['fr_zoom_explanation_fields']			= $ar['fr_zoom_explanation_fields'];
	$dados['fr_zoom_notes_explanation']				= $ar['fr_zoom_notes_explanation'];
	$dados['fr_zoom_document_name']					= $ar['fr_zoom_document_name'];
	$dados['fr_zoom_comment']						= $ar['fr_zoom_comment'];
	$dados['fr_zoom_document_file']					= $ar['fr_zoom_document_file'];
	
	//B	
	if(isset($ar['B_steps'])){
		
	$dados['B_fdLow'] 			= ($ar['B_min_score'] != '')?$ar['B_min_score']:'0.0';
	$dados['B_fdProbable'] 		= ($ar['B_pro_score'] != '')?$ar['B_pro_score']:'0.0';
	$dados['B_fdHigh'] 			= ($ar['B_max_score'] != '')?$ar['B_max_score']:'0.0';
	$dados['B_fdUncert'] 		= ($ar['B_unc_range'] != '')?$ar['B_unc_range']:'0.0';
	$dados['explain_le']		= $ar['B_explain'];
	$dados['explain_le_note']	= $ar['B_explain_note'];	
	$dados['B_steps']				= $ar['B_steps'];	
	
	$dados['magnitude_LE_Min'] 			= ($ar['B_min_score'] != '')?$ar['B_min_score']:'0.0';
	$dados['magnitude_LE_Med'] 			= ($ar['B_pro_score'] != '')?$ar['B_pro_score']:'0.0';
	$dados['magnitude_LE_Max'] 			= ($ar['B_max_score'] != '')?$ar['B_max_score']:'0.0';
	
	
	if($ar['B_steps'] == 1){	
	
		$dados['he'] 			= $ar['B_field_value_1'];
		$dados['pl'] 			= $ar['B_field_value_2'];
		$dados['le'] 			= $ar['B_field_value_3'];
		
	}	
	
	if($ar['B_steps'] == 2){	
	
		$dados['he2'] 			= $ar['B_field_value_1'];
		$dados['pl2'] 			= $ar['B_field_value_2'];
		$dados['le2'] 			= $ar['B_field_value_3'];
		
	}	
	
	if($ar['B_steps'] == 3){	
	
		$dados['he3'] 			= $ar['B_field_value_1'];
		$dados['pl3'] 			= $ar['B_field_value_2'];
		$dados['le3'] 			= $ar['B_field_value_3'];
		
	}	
	
	if($ar['B_steps'] == 4){	
	
		$dados['he4'] 			= $ar['B_field_value_1'];
		$dados['pl4'] 			= $ar['B_field_value_2'];
		$dados['le4'] 			= $ar['B_field_value_3'];
		
	}	
	
	if($ar['B_steps'] == 5){	
	
		$dados['he5'] 			= $ar['B_field_value_1'];
		$dados['pl5'] 			= $ar['B_field_value_2'];
		$dados['le5'] 			= $ar['B_field_value_3'];
		
	}	
		
	}
	
	$dados['le_zoom_obs']							= $ar['le_zoom_obs'];
	$dados['le_zoom_link']							= $ar['le_zoom_link'];	
	$dados['le_zoom_explanation_fields']			= $ar['le_zoom_explanation_fields'];
	$dados['le_zoom_notes_explanation']				= $ar['le_zoom_notes_explanation'];
	$dados['le_zoom_document_name']					= $ar['le_zoom_document_name'];
	$dados['le_zoom_comment']						= $ar['le_zoom_comment'];
	$dados['le_zoom_document_file']					= $ar['le_zoom_document_file'];
	
	//C
		$dados['ia_Inp_Min'] 			= ($ar['C_min_score'] != '')?$ar['C_min_score']:'0.0';
		$dados['ia_Inp_Med'] 			= ($ar['C_pro_score'] != '')?$ar['C_pro_score']:'0.0';
		$dados['ia_Inp_Max'] 			= ($ar['C_max_score'] != '')?$ar['C_max_score']:'0.0';
		
		$dados['ia_Inp_Range'] 			= ($ar['C_unc_range'] != '')?$ar['C_unc_range']:'0.0';
		$dados['type_score'] 			= $ar['C_type_score'];
		$dados['C_type_list'] 			= $ar['C_type_list'];
		
		
		$dados['explain_ia'] 			= $ar['C_explain'];
		
		$dados['heia'] 					= $ar['C_field_value_1'];
		$dados['plia'] 					= $ar['C_field_value_2'];
		$dados['leia'] 					= $ar['C_field_value_3'];
		
		$dados['ia_zoom_obs']							= $ar['ia_zoom_obs'];
		$dados['ia_zoom_link']							= $ar['ia_zoom_link'];	
		$dados['ia_zoom_explanation_fields']			= $ar['ia_zoom_explanation_fields'];
		$dados['ia_zoom_notes_explanation']				= $ar['ia_zoom_notes_explanation'];
		$dados['ia_zoom_document_name']					= $ar['ia_zoom_document_name'];
		$dados['ia_zoom_comment']						= $ar['ia_zoom_comment'];
		$dados['ia_zoom_document_file']					= $ar['ia_zoom_document_file'];
		
		
	//Magnitude	
		
		$dados['magnitude_SOMA_L'] 			= ($ar['MR_low'] != '')?$ar['MR_low']:'0.0';
		$dados['magnitude_SOMA_P'] 			= ($ar['MR_Probable'] != '')?$ar['MR_Probable']:'0.0';
		$dados['magnitude_SOMA_H'] 			= ($ar['MR_High'] != '')?$ar['MR_High']:'0.0';
		
		$dados['magnitude_SOMA_RANGE'] 		= ($ar['MR_U_Range'] != '')?$ar['MR_U_Range']:'0.0';
		$dados['magnitude_FR_MEDIA'] 		= ($ar['Expected_Scores_FR'] != '')?$ar['Expected_Scores_FR']:'0.0';
		$dados['magnitude_LE_MEDIA'] 		= ($ar['Expected_Scores_LE'] != '')?$ar['Expected_Scores_LE']:'0.0';
		$dados['magnitude_IA_MEDIA'] 		= ($ar['Expected_Scores_IA'] != '')?$ar['Expected_Scores_IA']:'0.0';
		$dados['magnitude_SOMA_MEDIA'] 		= ($ar['magnitude_of_risk'] != '')?$ar['magnitude_of_risk']:'0.0';
		$dados['type_calc'] 				= $ar['type_calc'];
		
		
}else{
	$dados['type_risk']			= '';
	$dados['fdLow'] 			= '0.0';
	$dados['fdProbable'] 		= '0.0';
	$dados['fdHigh'] 			= '0.0';
	$dados['fdUncert'] 			= '0.0';
	$dados['explain'] 			= '';
	$dados['ley'] 				= '0.0';
	$dados['abey'] 				= '0.0';
	$dados['hey'] 				= '0.0';
	$dados['B_fdLow'] 			= '0.0';
	$dados['B_fdProbable'] 		= '0.0';
	$dados['B_fdHigh'] 			= '0.0';
	$dados['B_fdUncert'] 		= '0.0';
	$dados['explain_le']		= '';
	$dados['explain_le_note']	= '';	
	$dados['steps']				= '';
	$dados['he5'] 				= '0.0';
	$dados['pl5'] 				= '0.0';
	$dados['le5'] 				= '0.0';
	
	$dados['magnitude_SOMA_L'] 			= '0.0';
	$dados['magnitude_SOMA_P'] 			= '0.0';
	$dados['magnitude_SOMA_H'] 			= '0.0';
	$dados['magnitude_SOMA_RANGE'] 		= '0.0';
	$dados['magnitude_FR_MEDIA'] 		= '0.0';
	$dados['magnitude_LE_MEDIA'] 		= '0.0';
	$dados['magnitude_IA_MEDIA'] 		= '0.0';
	$dados['magnitude_SOMA_MEDIA'] 		= '0.0';
	
	$dados['magnitude_FR_Low'] 			= '0.0';
	$dados['magnitude_FR_Probable'] 	= '0.0';
	$dados['magnitude_FR_High'] 		= '0.0';
	$dados['magnitude_LE_Min'] 			= '0.0';
	$dados['magnitude_LE_Med'] 			= '0.0';
	$dados['magnitude_LE_Max'] 			= '0.0';
	$dados['magnitude_IA_Min'] 			= '0.0';
	$dados['magnitude_IA_Med'] 			= '0.0';
	$dados['magnitude_IA_Max'] 			= '0.0';
	
}	

echo json_encode($dados); 
//return dados

?>







