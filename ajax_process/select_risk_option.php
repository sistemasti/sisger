<?php
session_start();
include("../functions.php");
include("../models/DB.class.php");
include("../controllers/IR_Risks.class.php");
include("../controllers/IR_Agents.class.php");
include("../controllers/TR_Analyze_options.class.php");

$ar 							= Analyze_options::select_analyse_risk_id_risk_id_option($_REQUEST['id_risk'],$_REQUEST['id_option']);
$status 						= Risks::select_risk_id($_REQUEST['id_risk']);
//echo $status['name'];
$dados['risk']				= $status['name'];
if($ar['num'] > 0){
	
	
	
	//A	
	$dados['type_risk_o']		= $ar['A_type_risk'];
	$dados['fdLow_o'] 			= ($ar['A_min_score'] != '')?$ar['A_min_score']:'0.0';
	$dados['fdProbable_o'] 		= ($ar['A_pro_score'] != '')?$ar['A_pro_score']:'0.0';
	$dados['fdHigh_o'] 			= ($ar['A_max_score'] != '')?$ar['A_max_score']:'0.0';
	$dados['fdUncert_o'] 		= $ar['A_unc_range'];
	$dados['explain_o'] 		= $ar['A_explain'];
	$dados['ley_o'] 			= $ar['A_field_value_1'];
	$dados['abey_o'] 			= $ar['A_field_value_2'];
	$dados['hey_o'] 			= $ar['A_field_value_3'];
	$dados['B_fdLow_o'] 		= $ar['B_min_score'];
	$dados['steps_o']			= $ar['B_steps'];
	
	$dados['magnitude_FR_Low_o'] 			= ($ar['A_min_score'] != '')?$ar['A_min_score']:'0.0';
	$dados['magnitude_FR_Probable_o'] 	= ($ar['A_pro_score'] != '')?$ar['A_pro_score']:'0.0';
	$dados['magnitude_FR_High_o'] 		= ($ar['A_max_score'] != '')?$ar['A_max_score']:'0.0';
	
	
	$dados['fr_zoom_obs_o']							= $ar['fr_zoom_obs'];
	$dados['fr_zoom_link_o']							= $ar['fr_zoom_link'];	
	$dados['fr_zoom_explanation_fields_o']			= $ar['fr_zoom_explanation_fields'];
	$dados['fr_zoom_notes_explanation_o']				= $ar['fr_zoom_notes_explanation'];
	$dados['fr_zoom_document_name_o']					= $ar['fr_zoom_document_name'];
	$dados['fr_zoom_comment_o']						= $ar['fr_zoom_comment'];
	$dados['fr_zoom_document_file_o']					= $ar['fr_zoom_document_file'];
	
	//B	
	if(isset($ar['B_steps'])){
		
	$dados['B_fdLow_o'] 			= ($ar['B_min_score'] != '')?$ar['B_min_score']:'0.0';
	$dados['B_fdProbable_o'] 		= ($ar['B_pro_score'] != '')?$ar['B_pro_score']:'0.0';
	$dados['B_fdHigh_o'] 			= ($ar['B_max_score'] != '')?$ar['B_max_score']:'0.0';
	$dados['B_fdUncert_o'] 			= ($ar['B_unc_range'] != '')?$ar['B_unc_range']:'0.0';
	$dados['explain_le_o']			= $ar['B_explain'];
	$dados['explain_le_note_o']		= $ar['B_explain_note'];	
	$dados['B_steps_o']				= $ar['B_steps'];	
	
	$dados['magnitude_LE_Min_o'] 			= ($ar['B_min_score'] != '')?$ar['B_min_score']:'0.0';
	$dados['magnitude_LE_Med_o'] 			= ($ar['B_pro_score'] != '')?$ar['B_pro_score']:'0.0';
	$dados['magnitude_LE_Max_o'] 			= ($ar['B_max_score'] != '')?$ar['B_max_score']:'0.0';
	
	
	if($ar['B_steps'] == 1){	
	
		$dados['he_o'] 			= $ar['B_field_value_1'];
		$dados['pl_o'] 			= $ar['B_field_value_2'];
		$dados['le_o'] 			= $ar['B_field_value_3'];
		
	}	
	
	if($ar['B_steps'] == 2){	
	
		$dados['he2_o'] 			= $ar['B_field_value_1'];
		$dados['pl2_o'] 			= $ar['B_field_value_2'];
		$dados['le2_o'] 			= $ar['B_field_value_3'];
		
	}	
	
	if($ar['B_steps'] == 3){	
	
		$dados['he3_o'] 			= $ar['B_field_value_1'];
		$dados['pl3_o'] 			= $ar['B_field_value_2'];
		$dados['le3_o'] 			= $ar['B_field_value_3'];
		
	}	
	
	if($ar['B_steps'] == 4){	
	
		$dados['he4_o'] 			= $ar['B_field_value_1'];
		$dados['pl4_o'] 			= $ar['B_field_value_2'];
		$dados['le4_o'] 			= $ar['B_field_value_3'];
		
	}	
	
	if($ar['B_steps'] == 5){	
	
		$dados['he5_o'] 			= $ar['B_field_value_1'];
		$dados['pl5_o'] 			= $ar['B_field_value_2'];
		$dados['le5_o'] 			= $ar['B_field_value_3'];
		
	}	
		
	}
	
	$dados['le_zoom_obs_o']							= $ar['le_zoom_obs'];
	$dados['le_zoom_link_o']							= $ar['le_zoom_link'];	
	$dados['le_zoom_explanation_fields_o']			= $ar['le_zoom_explanation_fields'];
	$dados['le_zoom_notes_explanation_o']				= $ar['le_zoom_notes_explanation'];
	$dados['le_zoom_document_name_o']					= $ar['le_zoom_document_name'];
	$dados['le_zoom_comment_o']						= $ar['le_zoom_comment'];
	$dados['le_zoom_document_file_o']					= $ar['le_zoom_document_file'];
	
	//C
		$dados['ia_Inp_Min_o'] 			= ($ar['C_min_score'] != '')?$ar['C_min_score']:'0.0';
		$dados['ia_Inp_Med_o'] 			= ($ar['C_pro_score'] != '')?$ar['C_pro_score']:'0.0';
		$dados['ia_Inp_Max_o'] 			= ($ar['C_max_score'] != '')?$ar['C_max_score']:'0.0';
		
		$dados['ia_Inp_Range_o'] 			= ($ar['C_unc_range'] != '')?$ar['C_unc_range']:'0.0';
		$dados['type_score_o'] 				= $ar['C_type_score'];
		$dados['C_type_list_o'] 			= $ar['C_type_list'];
		
		
		$dados['explain_ia_o'] 			= $ar['C_explain'];
		
		$dados['heia_o'] 					= $ar['C_field_value_1'];
		$dados['plia_o'] 					= $ar['C_field_value_2'];
		$dados['leia_o'] 					= $ar['C_field_value_3'];
		
		$dados['ia_zoom_obs_o']							= $ar['ia_zoom_obs'];
		$dados['ia_zoom_link_o']							= $ar['ia_zoom_link'];	
		$dados['ia_zoom_explanation_fields_o']			= $ar['ia_zoom_explanation_fields'];
		$dados['ia_zoom_notes_explanation_o']				= $ar['ia_zoom_notes_explanation'];
		$dados['ia_zoom_document_name_o']					= $ar['ia_zoom_document_name'];
		$dados['ia_zoom_comment_o']						= $ar['ia_zoom_comment'];
		$dados['ia_zoom_document_file_o']					= $ar['ia_zoom_document_file'];
		
		
	//Magnitude	
		
		$dados['magnitude_SOMA_L_o'] 			= ($ar['MR_low'] != '')?$ar['MR_low']:'0.0';
		$dados['magnitude_SOMA_P_o'] 			= ($ar['MR_Probable'] != '')?$ar['MR_Probable']:'0.0';
		$dados['magnitude_SOMA_H_o'] 			= ($ar['MR_High'] != '')?$ar['MR_High']:'0.0';
		
		$dados['magnitude_SOMA_RANGE_o'] 		= ($ar['MR_U_Range'] != '')?$ar['MR_U_Range']:'0.0';
		$dados['magnitude_FR_MEDIA_o'] 		= ($ar['Expected_Scores_FR'] != '')?$ar['Expected_Scores_FR']:'0.0';
		$dados['magnitude_LE_MEDIA_o'] 		= ($ar['Expected_Scores_LE'] != '')?$ar['Expected_Scores_LE']:'0.0';
		$dados['magnitude_IA_MEDIA_o'] 		= ($ar['Expected_Scores_IA'] != '')?$ar['Expected_Scores_IA']:'0.0';
		$dados['magnitude_SOMA_MEDIA_o'] 		= ($ar['magnitude_of_risk'] != '')?$ar['magnitude_of_risk']:'0.0';
		
		
}else{
	$dados['type_risk_o']			= '';
	$dados['fdLow_o'] 			= '0.0';
	$dados['fdProbable_o'] 		= '0.0';
	$dados['fdHigh_o'] 			= '0.0';
	$dados['fdUncert_o'] 			= '0.0';
	$dados['explain_o'] 			= '';
	$dados['ley_o'] 				= '0.0';
	$dados['abey_o'] 				= '0.0';
	$dados['hey_o'] 				= '0.0';
	$dados['B_fdLow_o'] 			= '0.0';
	$dados['B_fdProbable_o'] 		= '0.0';
	$dados['B_fdHigh_o'] 			= '0.0';
	$dados['B_fdUncert_o'] 		= '0.0';
	$dados['explain_le_o']		= '';
	$dados['explain_le_note_o']	= '';	
	$dados['steps_o']				= '';
	$dados['he5_o'] 				= '0.0';
	$dados['pl5_o'] 				= '0.0';
	$dados['le5_o'] 				= '0.0';
	
	$dados['magnitude_SOMA_L_o'] 			= '0.0';
	$dados['magnitude_SOMA_P_o'] 			= '0.0';
	$dados['magnitude_SOMA_H_o'] 			= '0.0';
	$dados['magnitude_SOMA_RANGE_o'] 		= '0.0';
	$dados['magnitude_FR_MEDIA_o'] 		= '0.0';
	$dados['magnitude_LE_MEDIA_o'] 		= '0.0';
	$dados['magnitude_IA_MEDIA_o'] 		= '0.0';
	$dados['magnitude_SOMA_MEDIA_o'] 		= '0.0';
	
	$dados['magnitude_FR_Low_o'] 			= '0.0';
	$dados['magnitude_FR_Probable_o'] 	= '0.0';
	$dados['magnitude_FR_High_o'] 		= '0.0';
	$dados['magnitude_LE_Min_o'] 			= '0.0';
	$dados['magnitude_LE_Med_o'] 			= '0.0';
	$dados['magnitude_LE_Max_o'] 			= '0.0';
	$dados['magnitude_IA_Min_o'] 			= '0.0';
	$dados['magnitude_IA_Med_o'] 			= '0.0';
	$dados['magnitude_IA_Max_o'] 			= '0.0';
	
}	

echo json_encode($dados); 
//return dados

?>







