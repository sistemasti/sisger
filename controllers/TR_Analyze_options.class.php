<?php

	class Analyze_options extends DB{
	
/*=================================================isset======================================================*/

		static function isset_analyze_options(){
			
		


		}

/*=================================================selects======================================================*/

		static function select_options(){
			
			
			$n1 = self::getConn()->prepare('SELECT * FROM tr_options WHERE `project_id` ="'.$_SESSION['project_id'].'"');
			$n1->execute(array($id)); 
			$d['dados'] = $n1->fetchAll();	
			$d['num'] = $n1->rowCount();	
			return $d;
			
		}
		
		static function select_options_by_risk($id_risk){
			
			
			$n1 = self::getConn()->prepare('SELECT ti.id_option as id_option, tr.option as option FROM `tr_identify_options` as ti INNER JOIN tr_options AS tr WHERE ti.id_option = tr.id And ti.id_risk=? ORDER BY tr.id
');
			$n1->execute(array($id_risk)); 
			$d['dados'] = $n1->fetchAll();	
			$d['num'] = $n1->rowCount();	
			return $d;
			
		}
		
		static function select_tr_analyze_options_by_risk($id_risk){
			
			
			$n1 = self::getConn()->prepare('SELECT * FROM tr_analyze_options WHERE `id_risk` =?');
			$n1->execute(array($id_risk)); 
			$d['dados'] = $n1->fetchAll();	
			$d['num'] = $n1->rowCount();	
			return $d;
			
		}
		
		static function select_tr_analyze_options_by_project(){
			
			
			$n1 = self::getConn()->prepare('SELECT * FROM tr_analyze_options WHERE `id_project` ="'.$_SESSION['project_id'].'"');
			$n1->execute(array()); 
			$d['dados'] = $n1->fetchAll();	
			$d['num'] = $n1->rowCount();	
			return $d;
			
		}
		
		static function select_analyse_risk_id_risk_id_option($id_risk,$id_option){
			
			$n1 = self::getConn()->prepare('SELECT * FROM tr_analyze_options WHERE id_risk=? AND id_option=?');
			$n1->execute(array($id_risk,$id_option));
			$d = $n1->fetch();	
			$d['num'] = $n1->rowCount();	
			return $d;
			
		}
	
		static function select_analyse_risk_id_risk_id_option_year($ano,$id_option,$id_risk){
			
			$n1 = self::getConn()->prepare('SELECT ao.magnitude_of_risk as magnitude_of_risk FROM tr_analyze_options ao INNER JOIN tr_identify_options io WHERE io.id_option=ao.id_option AND YEAR(io.data)=? AND io.id_option=? AND io.id_risk=?');
			$n1->execute(array($ano,$id_option,$id_risk));
			$d = $n1->fetch();	
			$d['num'] = $n1->rowCount();	
			return $d;
			
		}
	
		static function select_risk_option_by_name($option){
			
			$n1 = self::getConn()->prepare('SELECT * FROM tr_options WHERE option=? AND project_id="'.$_SESSION['project_id'].'"');
			$n1->execute(array($option));
			$d = $n1->fetch();	
			$d['num'] = $n1->rowCount();	
			return $d;
			
		}
	
		static function select_options_by_id_risk($id_risk){
			//session_start();
			$p = $_SESSION['project_id'];
			
			$n1 = self::getConn()->prepare('SELECT * FROM tr_options WHERE id NOT IN (SELECT id_option FROM tr_identify_options WHERE id_risk=?) AND project_id="'.$p.'" ');
			$n1->execute(array($id_risk)); 
			$d['dados'] = $n1->fetchAll();	
			$d['num'] = $n1->rowCount();	
			return $d;
			
		}
	
		static function select_tr_identify_options($risk_id){
			
			
			$n1 = self::getConn()->prepare('SELECT * FROM tr_identify_options WHERE id_risk=?');
			$n1->execute(array($risk_id)); 
			$d['dados'] = $n1->fetchAll();	
			$d['num'] = $n1->rowCount();	
			return $d;
			
		}
	
		static function select_tr_identify_options_by_project(){
			
			
			$n1 = self::getConn()->prepare('SELECT * FROM tr_identify_options');
			$n1->execute(array()); 
			$d['dados'] = $n1->fetchAll();	
			$d['num'] = $n1->rowCount();	
			return $d;
			
		}
	
		static function select_datas_tr_identify_options(){
			
			
			$n1 = self::getConn()->prepare('SELECT id_risk,YEAR(data)as ano FROM `tr_identify_options` WHERE id_risk in (select id FROM ir_risks where project_id="'.$_SESSION['project_id'].'") GROUP BY data ORDER BY data');
			$n1->execute(array()); 
			$d['dados'] = $n1->fetchAll();	
			$d['num'] = $n1->rowCount();	
			return $d;
			
		}
		
		static function select_tr_identify_options_id_by_option($id_risk,$id_option){
			
			$n1 = self::getConn()->prepare('SELECT * FROM tr_identify_options WHERE id_risk=? AND id_option=?');
			$n1->execute(array($id_risk,$id_option)); 
			$d = $n1->fetch();	
			$d['num'] = $n1->rowCount();				
			return $d;
			
		}
	
		static function select_datas_tr_identify_options_by_id($id_risk,$ano){
			
			
			$n1 = self::getConn()->prepare('SELECT YEAR(data)as ano FROM `tr_identify_options` WHERE id_risk in (select id FROM ir_risks where project_id="'.$_SESSION['project_id'].'") AND id_risk=? AND ano=? GROUP BY data ORDER BY data');
			$n1->execute(array()); 
			$d['dados'] = $n1->fetchAll($id_risk,$ano);	
			$d['num'] = $n1->rowCount();	
			return $d;
			
		}
	
		
		static function select_options_id($id){
			
			$n1 = self::getConn()->prepare('SELECT * FROM tr_options WHERE id=?');
			$n1->execute(array($id)); 
			$d = $n1->fetch();	
			$d['num'] = $n1->rowCount();				
			return $d;
			
		}
	
		static function select_total_original_risk(){
			
			$n1 = self::getConn()->prepare('SELECT magnitude_of_risk FROM `tr_analyze_options` WHERE magnitude_of_risk <> "NaN" AND `id_project` ="'.$_SESSION['project_id'].'" ORDER BY magnitude_of_risk desc LIMIT 0,1');
			$n1->execute(array());
			$d = $n1->fetch();	
			$d['num'] = $n1->rowCount();	
			return $d;
			
		}
		
		
		static function select_tr_options_id_by_option($id){
			
			$n1 = self::getConn()->prepare('SELECT * FROM tr_options WHERE id=?');
			$n1->execute(array($id)); 
			$d = $n1->fetch();	
			$d['num'] = $n1->rowCount();				
			return $d;
			
		}
	
		

	
		
		
		static function select_options_id_option_and_id_risk($id_option,$id_risk){
			
			$n1 = self::getConn()->prepare('
											SELECT * 
											FROM tr_identify_options 
											WHERE id_option=? 
											AND id_risk=?
											');
			$n1->execute(array($id_option,$id_risk)); 
			$d = $n1->fetch();	
			$d['num'] = $n1->rowCount();				
			return $d;
			
		}
	
		
		
/*=================================================insert======================================================*/
		
		static function insert_option($option){
			$n = self::getConn()->prepare('INSERT INTO `tr_options` SET 
											option=?,
											project_id="'.$_SESSION['project_id'].'"											
										  ');											
			$n->execute(array($option));
			
			$id = self::getConn()->prepare('SELECT LAST_INSERT_ID() as id_last_insert');	
			$id->execute(array());
			$r = $id->fetch();
			return $r;
		}		
		
		static function insert_identify_options($id_risk,$id_option,$data,$summary,$one_time_cost,$annual_cost){
			$n = self::getConn()->prepare('INSERT INTO `tr_identify_options` SET 
											id_risk=?,	
											id_option=?,	
											data=?,	
											summary=?,	
											one_time_cost=?,	
											annual_cost	=?	
										  ');											
			$n->execute(array($id_risk,$id_option,$data,$summary,$one_time_cost,$annual_cost));
			
			$id = self::getConn()->prepare('SELECT LAST_INSERT_ID() as id_last_insert');	
			$id->execute(array());
			$r = $id->fetch();
			return $r;
		}
		
		
		static function insert_analyse_risk($id_project,$id_risk,$id_option,$A_type_risk,$A_min_score,$A_pro_score,$A_max_score,$A_unc_range,$A_explain,$A_explain_note,$A_field_value_1,$A_field_value_2,$A_field_value_3,$time_horizon){
				
			$n = self::getConn()->prepare('INSERT INTO `tr_analyze_options` SET 
											id_project=?,
											id_risk=?,
											id_option=?,
											A_type_risk=?,
											A_min_score=?,
											A_pro_score=?,
											A_max_score=?,
											A_unc_range=?,
											A_explain=?,
											A_explain_note=?,
											A_field_value_1=?,
											A_field_value_2=?,
											A_field_value_3 = ?, 
											time_horizon = ?, 
											data_cadastro="'.date("Y-m-d").'"		
											
										  ');											
			$n->execute(array($id_project,$id_risk,$id_option,$A_type_risk,$A_min_score,$A_pro_score,$A_max_score,$A_unc_range,$A_explain,$A_explain_note,$A_field_value_1,$A_field_value_2,$A_field_value_3,$time_horizon));
			
			$id = self::getConn()->prepare('SELECT LAST_INSERT_ID() as id_last_insert');	
			$id->execute(array());
			$r = $id->fetch();
			return $r;
				
		}
		
		
		static function insert_analyse_risk_loss_to_each($id_project,$id_risk,$id_option,$B_min_score,$B_pro_score,$B_max_score,$B_unc_range,$B_explain,$B_explain_note,$B_field_value_1,$B_field_value_2,$B_field_value_3,$B_steps){
				
			$n = self::getConn()->prepare('INSERT INTO `tr_analyze_options` SET 
											id_project=?,
											id_risk=?,
											id_option=?,
											B_min_score=?,
											B_pro_score=?,
											B_max_score=?,
											B_unc_range=?,
											B_explain=?,
											B_explain_note=?,
											B_field_value_1=?,
											B_field_value_2=?,
											B_field_value_3=?,
											B_steps = ?, 
											data_cadastro="'.date("Y-m-d").'"		
											
										  ');											
			$n->execute(array($id_project,$id_risk,$id_option,$B_min_score,$B_pro_score,$B_max_score,$B_unc_range,$B_explain,$B_explain_note,$B_field_value_1,$B_field_value_2,$B_field_value_3,$B_steps));
			
			$id = self::getConn()->prepare('SELECT LAST_INSERT_ID() as id_last_insert');	
			$id->execute(array());
			$r = $id->fetch();
			return $r;
				
		}
		
		
		static function insert_zoom_fr_save($fr_zoom_link,$fr_zoom_obs,$fr_zoom_explanation_fields, $fr_zoom_notes_explanation, $fr_zoom_document_name, $fr_zoom_comment, $fr_zoom_document_file, $id_risk, $id_option){
					$n = self::getConn()->prepare('
													INSERT INTO `tr_analyze_options` SET 
														   `fr_zoom_link` =?,
														   `fr_zoom_obs` =?,
														   `fr_zoom_explanation_fields` =?,
														   `fr_zoom_notes_explanation` =?,
														   `fr_zoom_document_name` =?,
														   `fr_zoom_comment` =?,
														   `fr_zoom_document_file` =?,
														   `id_risk` =?,
														   `id_option` =?, 
														   `id_project` ="'.$_SESSION['project_id'].'"
															
															');
											
					$n->execute(array($fr_zoom_link,$fr_zoom_obs, $fr_zoom_explanation_fields, $fr_zoom_notes_explanation, $fr_zoom_document_name, $fr_zoom_comment, $fr_zoom_document_file, $id_risk, $id_option));
		}
		
		
		static function insert_zoom_le_save($le_zoom_link,$le_zoom_obs,$le_zoom_explanation_fields, $le_zoom_notes_explanation, $le_zoom_document_name, $le_zoom_comment, $le_zoom_document_file, $id_risk, $id_option){
					$n = self::getConn()->prepare('
													INSERT INTO `tr_analyze_options` SET 
														   `le_zoom_link` =?,
														   `le_zoom_obs` =?,
														   `le_zoom_explanation_fields` =?,
														   `le_zoom_notes_explanation` =?,
														   `le_zoom_document_name` =?,
														   `le_zoom_comment` =?,
														   `le_zoom_document_file` =?,
														   `id_risk` =?,
														   `id_option` =?, 
														   `id_project` ="'.$_SESSION['project_id'].'"
															
															');
											
					$n->execute(array($le_zoom_link,$le_zoom_obs,$le_zoom_explanation_fields, $le_zoom_notes_explanation, $le_zoom_document_name, $le_zoom_comment, $le_zoom_document_file, $id_risk, $id_option));
		}
		
		static function insert_zoom_ia_save($ia_zoom_link,$ia_zoom_obs,$ia_zoom_explanation_fields, $ia_zoom_notes_explanation, $ia_zoom_document_name, $ia_zoom_comment, $ia_zoom_document_fiia, $id_risk, $id_option){
					$n = self::getConn()->prepare('
													INSERT INTO `tr_analyze_options` SET 
														   `ia_zoom_link` =?,
														   `ia_zoom_obs` =?,
														   `ia_zoom_explanation_fields` =?,
														   `ia_zoom_notes_explanation` =?,
														   `ia_zoom_document_name` =?,
														   `ia_zoom_comment` =?,
														   `ia_zoom_document_file` =?,
														   `id_risk` =?,
														   `id_option` =?, 
														   `id_project` ="'.$_SESSION['project_id'].'"
															
															');
											
					$n->execute(array($ia_zoom_link,$ia_zoom_obs,$ia_zoom_explanation_fields, $ia_zoom_notes_explanation, $ia_zoom_document_name, $ia_zoom_comment, $ia_zoom_document_fiia, $id_risk, $id_option));
		}
		
		
		
		static function insert_analyse_risk_items_affected($id_project,$id_risk,$id_option,$C_min_score,$C_pro_score,$C_max_score,$C_unc_range,$C_explain,$C_explain_note,$C_field_value_1,$C_field_value_2,$C_field_value_3,$C_type_score,$C_type_list){
			
			
			$n = self::getConn()->prepare('INSERT INTO `tr_analyze_options` SET 
											id_project=?,
											id_risk=?,
											id_option=?,
											C_min_score=?,
											C_pro_score=?,
											C_max_score=?,
											C_unc_range=?,
											C_explain=?,
											C_explain_note=?,
											C_field_value_1=?,
											C_field_value_2=?,
											C_field_value_3=?,
											C_type_score = ?, 
											C_type_list = ?, 
											data_cadastro="'.date("Y-m-d").'"
										  ');											
			$n->execute(array($id_project,$id_risk,$id_option,$C_min_score,$C_pro_score,$C_max_score,$C_unc_range,$C_explain,$C_explain_note,$C_field_value_1,$C_field_value_2,$C_field_value_3,$C_type_score,$C_type_list));
			
			$id = self::getConn()->prepare('SELECT LAST_INSERT_ID() as id_last_insert');	
			$id->execute(array());
			$r = $id->fetch();
			return $r;
				
		}	
		
/*=================================================update======================================================*/
		
		
		
		static function update_zoom_fr_save($fr_zoom_link,$fr_zoom_obs,$fr_zoom_explanation_fields, $fr_zoom_notes_explanation, $fr_zoom_document_name, $fr_zoom_comment, $fr_zoom_document_file, $id_risk, $id_option){
					$n = self::getConn()->prepare('
													UPDATE `tr_analyze_options` SET 
														   `fr_zoom_link` =?,
														   `fr_zoom_obs` =?,
														   `fr_zoom_explanation_fields` =?,
														   `fr_zoom_notes_explanation` =?,
														   `fr_zoom_document_name` =?,
														   `fr_zoom_comment` =?,
														   `fr_zoom_document_file` =?
													WHERE  
															`id_risk` =? 
															 AND `id_option` =? 
															
															');
											
					$n->execute(array($fr_zoom_link,$fr_zoom_obs, $fr_zoom_explanation_fields, $fr_zoom_notes_explanation, $fr_zoom_document_name, $fr_zoom_comment, $fr_zoom_document_file, $id_risk, $id_option));
		}
			
		static function update_zoom_le_save($le_zoom_link,$le_zoom_obs,$le_zoom_explanation_fields, $le_zoom_notes_explanation, $le_zoom_document_name, $le_zoom_comment, $le_zoom_document_file, $id_risk, $id_option){
					$n = self::getConn()->prepare('
													UPDATE `tr_analyze_options` SET 
														   `le_zoom_link` =?,
														   `le_zoom_obs` =?,
														   `le_zoom_explanation_fields` =?,
														   `le_zoom_notes_explanation` =?,
														   `le_zoom_document_name` =?,
														   `le_zoom_comment` =?,
														   `le_zoom_document_file` =?
													WHERE  
															`id_risk` =? 
															 AND `id_option` =? 
															
															');
											
					$n->execute(array($le_zoom_link,$le_zoom_obs, $le_zoom_explanation_fields, $le_zoom_notes_explanation, $le_zoom_document_name, $le_zoom_comment, $le_zoom_document_file, $id_risk, $id_option));
		}
			
			
		static function update_zoom_ia_save($ia_zoom_link,$ia_zoom_obs,$ia_zoom_explanation_fields, $ia_zoom_notes_explanation, $ia_zoom_document_name, $ia_zoom_comment, $ia_zoom_document_file, $id_risk, $id_option){
					$n = self::getConn()->prepare('
													UPDATE `tr_analyze_options` SET 
														   `ia_zoom_link` =?,
														   `ia_zoom_obs` =?,
														   `ia_zoom_explanation_fields` =?,
														   `ia_zoom_notes_explanation` =?,
														   `ia_zoom_document_name` =?,
														   `ia_zoom_comment` =?,
														   `ia_zoom_document_file` =?
													WHERE  
															`id_risk` =? 
															 AND `id_option` =? 
															
															');
											
					$n->execute(array($ia_zoom_link,$ia_zoom_obs, $ia_zoom_explanation_fields, $ia_zoom_notes_explanation, $ia_zoom_document_name, $ia_zoom_comment, $ia_zoom_document_file, $id_risk, $id_option));
		}
		
		
		
		static function update_analyse_risk($A_type_risk_o,$A_min_score_o,$A_pro_score_o,$A_max_score_o,$A_unc_range_o,$A_explain_o,$A_field_value_1_o,$A_field_value_2_o,$A_field_value_3_o,$id){
			
				$n = self::getConn()->prepare('
													UPDATE  `tr_analyze_options` SET 
													   `A_type_risk` =?,
													   `A_min_score` =?,
													   `A_pro_score` =?,
													   `A_max_score` =?,
													   `A_unc_range` =?,
													   `A_explain` =?,
													   
													   `A_field_value_1` =?,
													   `A_field_value_2` =?,
													   `A_field_value_3` =?
													WHERE  `id` =? ');
											
				$n->execute(array($A_type_risk_o,$A_min_score_o,$A_pro_score_o,$A_max_score_o,$A_unc_range_o,$A_explain_o,$A_field_value_1_o,$A_field_value_2_o,$A_field_value_3_o,$id));
			
		}
		
		static function update_analyse_risk_le($B_min_score_o,$B_pro_score_o,$B_max_score_o,$B_unc_range_o,$B_explain_o,$B_field_value_1_o,$B_field_value_2_o,$B_field_value_3_o,$B_steps,$id){
			
				$n = self::getConn()->prepare('
													UPDATE  `tr_analyze_options` SET
													   
													   `B_min_score` =?,
													   `B_pro_score` =?,
													   `B_max_score` =?,
													   `B_unc_range` =?,
													   `B_explain` =?,
													   
													   `B_field_value_1` =?,
													   `B_field_value_2` =?,
													   `B_field_value_3` =?,
													   `B_steps` =?
													WHERE  `id` =? ');
											
				$n->execute(array($B_min_score_o,$B_pro_score_o,$B_max_score_o,$B_unc_range_o,$B_explain_o,$B_field_value_1_o,$B_field_value_2_o,$B_field_value_3_o,$B_steps,$id));
			
		}
		
		static function update_analyse_risk_items_affected($C_min_score,$C_pro_score,$C_max_score,$C_unc_range,$C_explain,$C_field_value_1,$C_field_value_2,$C_field_value_3,$C_type_score,$C_type_list,$id_risk){
			
			/* 	echo "
													UPDATE  `tr_analyze_options` SET 
													   `C_min_score` ='".$C_min_score."',
													   `C_pro_score` ='".$C_pro_score."',
													   `C_max_score` ='".$C_max_score."',
													   `C_unc_range` ='".$C_unc_range."',
													   `C_explain` ='".$C_explain."',   
													   `C_field_value_1` ='".$C_field_value_1."',
													   `C_field_value_2` ='".$C_field_value_2."',
													   `C_field_value_3` ='".$C_field_value_3."',
													   `C_type_score` ='".$C_type_score."',
													   `C_type_list` ='".$C_type_list."'
													WHERE  `id_risk` ='".$id_risk."' 
													
													"; */
				
				$n = self::getConn()->prepare('
													UPDATE  `tr_analyze_options` SET 
													   `C_min_score` =?,
													   `C_pro_score` =?,
													   `C_max_score` =?,
													   `C_unc_range` =?,
													   `C_explain` =?,   
													   `C_field_value_1` =?,
													   `C_field_value_2` =?,
													   `C_field_value_3` =?,
													   `C_type_score` =?,
													   `C_type_list` =?
													WHERE  `id` =? ');
											
				$n->execute(array($C_min_score,$C_pro_score,$C_max_score,$C_unc_range,$C_explain,$C_field_value_1,$C_field_value_2,$C_field_value_3,$C_type_score,$C_type_list,$id_risk));
			
		}
		
		static function update_analyse_risk_magnitude_of_risk($MR_low,$MR_Probable,$MR_High,$MR_U_Range,$Expected_Scores_FR,$Expected_Scores_LE,$Expected_Scores_IA,$magnitude_of_risk,$id_risk,$id_option){
			
				$n = self::getConn()->prepare('
													UPDATE  `tr_analyze_options` SET 
													   `MR_low` =?,
													   `MR_Probable` =?,
													   `MR_High` =?,
													   `MR_U_Range` =?,
													   `Expected_Scores_FR` =?,
													   `Expected_Scores_LE` =?,
													   `Expected_Scores_IA` =?,
													   `magnitude_of_risk` =?
													WHERE  
														`id_risk` =? 
														AND `id_option` =? 
													');
											
				$n->execute(array($MR_low,$MR_Probable,$MR_High,$MR_U_Range,$Expected_Scores_FR,$Expected_Scores_LE,$Expected_Scores_IA,$magnitude_of_risk,$id_risk,$id_option));
			
		}
		
		
		static function update_options($option, $id){
					$n = self::getConn()->prepare('
													UPDATE  `tr_options` SET 
												   `option` =?
													WHERE  `id` =? ');
											
					$n->execute(array($option, $id));
			
		}	
		
		static function update_id_option($id_option, $id){
					$n = self::getConn()->prepare('
													UPDATE  `tr_identify_options` SET 
												   `id_option` =?
													WHERE  `id` =? ');
											
					$n->execute(array($id_option, $id));
			
		}
	
		static function update_data($data, $id){
					$n = self::getConn()->prepare('
													UPDATE  `tr_identify_options` SET 
												   `data` =?
													WHERE  `id` =? ');
											
					$n->execute(array($data, $id));
			
		}
	
		static function update_summary($summary, $id){
					$n = self::getConn()->prepare('
													UPDATE  `tr_identify_options` SET 
												   `summary` =?
													WHERE  `id` =? ');
											
					$n->execute(array($summary, $id));
			
		}
	
		static function update_one_time_cost($one_time_cost, $id){
					$n = self::getConn()->prepare('
													UPDATE  `tr_identify_options` SET 
												   `one_time_cost` =?
													WHERE  `id` =? ');
											
					$n->execute(array($one_time_cost, $id));
			
		}
	
		static function update_annual_cost($annual_cost, $id){
					$n = self::getConn()->prepare('
													UPDATE  `tr_identify_options` SET 
												   `annual_cost` =?
													WHERE  `id` =? ');
											
					$n->execute(array($annual_cost, $id));
			
		}
	
/*=================================================delete======================================================*/		
		
		static function delete_options($id){
				$n1 = self::getConn()->prepare('DELETE FROM `tr_options` WHERE id=?');
				$n1->execute(array($id));
		}
		
			
		static function delete_tr_identify_options($id){
				$n1 = self::getConn()->prepare('DELETE FROM `tr_identify_options` WHERE id=?');
				$n1->execute(array($id));
		}
		
		
	
		
		
}

?>