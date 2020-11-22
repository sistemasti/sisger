<?php

	class AR_Analyse_risks extends DB{
	
/*=================================================isset======================================================*/

		static function isset_type_risks(){
			
		


		}

/*=================================================selects======================================================*/

		static function select_analyse_risk_id_risk($id){
			
			$n1 = self::getConn()->prepare('SELECT * FROM ar_analyze_risks ar, ir_risks ir WHERE ar.id_risk = ir.id and ar.id_risk=? and ir.deleted = 0');
			$n1->execute(array($id));
			$d = $n1->fetch();	
			$d['num'] = $n1->rowCount();	
			return $d;
			
		}
		
		static function select_risk_by_id($id){
			
			$n1 = self::getConn()->prepare('SELECT * FROM ir_risks WHERE id=? ');
			$n1->execute(array($id));
			$d = $n1->fetch();	
			$d['num'] = $n1->rowCount();	
			return $d;
			
		}
		
		static function select_ar_magnitudes_risk(){
			
			$n1 = self::getConn()->prepare('SELECT * FROM ar_magnitudes_risk WHERE project_id="'.$_SESSION['project_id'].'"');
			$n1->execute(array());
			$d = $n1->fetch();	
			$d['num'] = $n1->rowCount();	
			return $d;
			
		}
		
		static function select_analyse_risk_by_project(){
			
			$n1 = self::getConn()->prepare('SELECT * FROM ar_analyze_risks ar, ir_risks ir WHERE ar.id_risk = ir.id and ir.deleted = 0 and ar.id_project="'.$_SESSION['project_id'].'" GROUP BY ar.id_risk');
			$n1->execute(array());			 
			$d['dados'] = $n1->fetchAll();	
			$d['num'] = $n1->rowCount();
			return $d;			
			
		}
		
		static function select_analyse_risk_by_project_by_magnitude(){
			
			$n1 = self::getConn()->prepare('SELECT * FROM ar_analyze_risks ar, ir_risks ir WHERE ar.id_risk = ir.id and ir.deleted = 0 and ar.id_project="'.$_SESSION['project_id'].'" ORDER BY ar.magnitude_of_risk ASC');
			$n1->execute(array());			 
			$d['dados'] = $n1->fetchAll();	
			$d['num'] = $n1->rowCount();
			return $d;			
			
		}
		
		static function select_analyse_risk_by_project_by_fr(){
			
			$n1 = self::getConn()->prepare('SELECT * FROM ar_analyze_risks ar, ir_risks ir WHERE ar.id_risk = ir.id and ir.deleted = 0 and ar.id_project="'.$_SESSION['project_id'].'" ORDER BY ar.Expected_Scores_FR ASC');
			$n1->execute(array());			 
			$d['dados'] = $n1->fetchAll();	
			$d['num'] = $n1->rowCount();
			return $d;			
			
		}
		
		
		static function select_analyse_risk_by_project_by_le(){
			
			$n1 = self::getConn()->prepare('SELECT * FROM ar_analyze_risks ar, ir_risks ir WHERE ar.id_risk = ir.id and ir.deleted = 0 and ar.id_project="'.$_SESSION['project_id'].'" ORDER BY ar.Expected_Scores_LE ASC');
			$n1->execute(array());			 
			$d['dados'] = $n1->fetchAll();	
			$d['num'] = $n1->rowCount();
			return $d;			
			
		}
		
		
		static function select_analyse_risk_by_project_by_ia(){
			
			$n1 = self::getConn()->prepare('SELECT * FROM ar_analyze_risks ar, ir_risks ir WHERE ar.id_risk = ir.id and ir.deleted = 0 and ar.id_project="'.$_SESSION['project_id'].'" ORDER BY ar.Expected_Scores_IA ASC');
			$n1->execute(array());			 
			$d['dados'] = $n1->fetchAll();	
			$d['num'] = $n1->rowCount();
			return $d;			
			
		}
		
		
		
		
		
/*=================================================insert======================================================*/
		
		static function insert_analyse_risk($id_project,$id_risk,$A_type_risk,$A_min_score,$A_pro_score,$A_max_score,$A_unc_range,$A_explain,$A_explain_note,$A_field_value_1,$A_field_value_2,$A_field_value_3,$time_horizon){
				
			$n = self::getConn()->prepare('INSERT INTO `ar_analyze_risks` SET 
											id_project=?,
											id_risk=?,
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
			$n->execute(array($id_project,$id_risk,$A_type_risk,$A_min_score,$A_pro_score,$A_max_score,$A_unc_range,$A_explain,$A_explain_note,$A_field_value_1,$A_field_value_2,$A_field_value_3,$time_horizon));
			
			$id = self::getConn()->prepare('SELECT LAST_INSERT_ID() as id_last_insert');	
			$id->execute(array());
			$r = $id->fetch();
			return $r;
				
		}
		
		static function insert_analyse_risk_loss_to_each($id_project,$id_risk,$B_min_score,$B_pro_score,$B_max_score,$B_unc_range,$B_explain,$B_explain_note,$B_field_value_1,$B_field_value_2,$B_field_value_3,$B_steps){
				
			$n = self::getConn()->prepare('INSERT INTO `ar_analyze_risks` SET 
											id_project=?,
											id_risk=?,
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
			$n->execute(array($id_project,$id_risk,$B_min_score,$B_pro_score,$B_max_score,$B_unc_range,$B_explain,$B_explain_note,$B_field_value_1,$B_field_value_2,$B_field_value_3,$B_steps));
			
			$id = self::getConn()->prepare('SELECT LAST_INSERT_ID() as id_last_insert');	
			$id->execute(array());
			$r = $id->fetch();
			return $r;
				
		}
		
		static function insert_analyse_risk_items_affected($id_project,$id_risk,$C_min_score,$C_pro_score,$C_max_score,$C_unc_range,$C_explain,$C_explain_note,$C_field_value_1,$C_field_value_2,$C_field_value_3,$C_type_score,$C_type_list){
				
			$n = self::getConn()->prepare('INSERT INTO `ar_analyze_risks` SET 
											id_project=?,
											id_risk=?,
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
			$n->execute(array($id_project,$id_risk,$C_min_score,$C_pro_score,$C_max_score,$C_unc_range,$C_explain,$C_explain_note,$C_field_value_1,$C_field_value_2,$C_field_value_3,$C_type_score,$C_type_list));
			
			$id = self::getConn()->prepare('SELECT LAST_INSERT_ID() as id_last_insert');	
			$id->execute(array());
			$r = $id->fetch();
			return $r;
				
		}	
		
		static function insert_ar_magnitudes_risk($uncertainty_range,$expected_scores){
				
			$n = self::getConn()->prepare('INSERT INTO `ar_magnitudes_risk` SET 
											project_id="'.$_SESSION['project_id'].'",
											uncertainty_range=?,
											expected_scores=?
										  ');											
			$n->execute(array($uncertainty_range,$expected_scores));
			
			$id = self::getConn()->prepare('SELECT LAST_INSERT_ID() as id_last_insert');	
			$id->execute(array());
			$r = $id->fetch();
			return $r;
				
		}
		
		
		
/*=================================================update======================================================*/
		
		static function update_analyse_risk($A_type_risk,$A_min_score,$A_pro_score,$A_max_score,$A_unc_range,$A_explain,$A_field_value_1,$A_field_value_2,$A_field_value_3,$id_risk){
			
				$n = self::getConn()->prepare('
													UPDATE  `ar_analyze_risks` SET 
													   `A_type_risk` =?,
													   `A_min_score` =?,
													   `A_pro_score` =?,
													   `A_max_score` =?,
													   `A_unc_range` =?,
													   `A_explain` =?,
													   
													   `A_field_value_1` =?,
													   `A_field_value_2` =?,
													   `A_field_value_3` =?
													WHERE  `id_risk` =? ');
											
				$n->execute(array($A_type_risk,$A_min_score,$A_pro_score,$A_max_score,$A_unc_range,$A_explain,$A_field_value_1,$A_field_value_2,$A_field_value_3,$id_risk));
			
		}
		
		static function update_analyse_risk_loss_to_each($B_min_score,$B_pro_score,$B_max_score,$B_unc_range,$B_explain,$B_explain_note,$B_field_value_1,$B_field_value_2,$B_field_value_3,$B_steps,$id_risk){
			
				$n = self::getConn()->prepare('
													UPDATE  `ar_analyze_risks` SET 
													   `B_min_score` =?,
													   `B_pro_score` =?,
													   `B_max_score` =?,
													   `B_unc_range` =?,
													   `B_explain` =?,
													   `B_explain_note` =?,
													   `B_field_value_1` =?,
													   `B_field_value_2` =?,
													   `B_field_value_3` =?,
													   `B_steps` =?
													WHERE  `id_risk` =? ');
											
				$n->execute(array($B_min_score,$B_pro_score,$B_max_score,$B_unc_range,$B_explain,$B_explain_note,$B_field_value_1,$B_field_value_2,$B_field_value_3,$B_steps,$id_risk));
			
		}
	
		static function update_analyse_risk_items_affected($C_min_score,$C_pro_score,$C_max_score,$C_unc_range,$C_explain,$C_field_value_1,$C_field_value_2,$C_field_value_3,$C_type_score,$C_type_list,$id_risk){
			
				$n = self::getConn()->prepare('
													UPDATE  `ar_analyze_risks` SET 
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
													WHERE  `id_risk` =? ');
											
				$n->execute(array($C_min_score,$C_pro_score,$C_max_score,$C_unc_range,$C_explain,$C_field_value_1,$C_field_value_2,$C_field_value_3,$C_type_score,$C_type_list,$_SESSION['id_risk_temp']));
			
		}
	
		static function update_analyse_risk_magnitude_of_risk($MR_low,$MR_Probable,$MR_High,$MR_U_Range,$Expected_Scores_FR,$Expected_Scores_LE,$Expected_Scores_IA,$magnitude_of_risk,$id_risk){
			
				$n = self::getConn()->prepare('
													UPDATE  `ar_analyze_risks` SET 
													   `MR_low` =?,
													   `MR_Probable` =?,
													   `MR_High` =?,
													   `MR_U_Range` =?,
													   `Expected_Scores_FR` =?,
													   `Expected_Scores_LE` =?,
													   `Expected_Scores_IA` =?,
													   `magnitude_of_risk` =?
													WHERE  `id_risk` =? ');
											
				$n->execute(array($MR_low,$MR_Probable,$MR_High,$MR_U_Range,$Expected_Scores_FR,$Expected_Scores_LE,$Expected_Scores_IA,$magnitude_of_risk,$id_risk));
			
		}
		
		static function update_expected_scores($Expected_Scores_FR,$Expected_Scores_LE,$Expected_Scores_IA,$magnitude_of_risk,$type_calc,$id_risk){
			
				$n = self::getConn()->prepare('
													UPDATE  `ar_analyze_risks` SET 
													   `Expected_Scores_FR` =?,
													   `Expected_Scores_LE` =?,
													   `Expected_Scores_IA` =?,
													   `magnitude_of_risk` =?,
													   `type_calc` =?
													WHERE  `id_risk` =? ');
											
				$n->execute(array($Expected_Scores_FR,$Expected_Scores_LE,$Expected_Scores_IA,$magnitude_of_risk,$type_calc,$id_risk));
			
		}
	
		static function update_expected_scores_o($Expected_Scores_FR,$Expected_Scores_LE,$Expected_Scores_IA,$magnitude_of_risk,$type_calc,$id_risk,$id_option){
			
				$n = self::getConn()->prepare('
													UPDATE  `tr_analyze_options` SET 
													   `Expected_Scores_FR` =?,
													   `Expected_Scores_LE` =?,
													   `Expected_Scores_IA` =?,
													   `magnitude_of_risk` =?,
													   `type_calc` =?
													WHERE  
													`id_risk` =? 
													AND`id_option` =? 
													
													');
											
				$n->execute(array($Expected_Scores_FR,$Expected_Scores_LE,$Expected_Scores_IA,$magnitude_of_risk,$type_calc,$id_risk,$id_option));
			
		}
	
		static function update_ar_magnitudes_risk($uncertainty_range,$expected_scores,$id){
			
				$n = self::getConn()->prepare('
													UPDATE  `ar_magnitudes_risk` SET 
													   `uncertainty_range` =?,
													   `expected_scores` =?
													WHERE  `id` =? ');
											
				$n->execute(array($uncertainty_range,$expected_scores,$id));
			
		}
		static function atualiza_type_score($value,$id_risk){
			
				$n = self::getConn()->prepare('
													UPDATE  `ar_analyze_risks` SET 
													   `C_type_score` =?
													WHERE  `id_risk` =? ');
											
				$n->execute(array($value,$id_risk));
			
		}
	
/*=================================================delete======================================================*/		
		
		static function delete_ar_zoom_list_items_affected_by_risk($id){
				$n1 = self::getConn()->prepare('DELETE FROM `ar_zoom_list_items_affected` WHERE risk_id=?');		
				$n1->execute(array($id));	
		}
		
}

?>