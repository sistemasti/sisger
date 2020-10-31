<?php

	class Risks extends DB{
	
/*=================================================isset======================================================*/

		static function isset_risks(){
			


		}

/*=================================================selects======================================================*/

		static function select_risk_id($id){
			
			$n1 = self::getConn()->prepare('SELECT * FROM ir_risks WHERE id=?');
			$n1->execute(array($id));
			$d = $n1->fetch();	
			$d['num'] = $n1->rowCount();	
			return $d;
			
		}
		

		static function select_risks(){
			
			$n1 = self::getConn()->prepare('SELECT * FROM ir_risks WHERE project_id='.$_SESSION['project_id'].'  and deleted=0 ');
			$n1->execute(array()); 
			$d['dados'] = $n1->fetchAll();	
			return $d; 
			
		}
		

		static function select_risk_group_id($id){
			
			$n1 = self::getConn()->prepare('SELECT * FROM ir_risk_groups WHERE id=?');
			$n1->execute(array($id));
			$d = $n1->fetch();	
			$d['num'] = $n1->rowCount();	
			return $d;
			
		}
		

		

		static function select_risk_group(){
			
			$n1 = self::getConn()->prepare('SELECT * FROM ir_risk_groups WHERE deleted=0 AND institutions_id='.$_SESSION['institutions_id'].'');
			$n1->execute(array()); 
			$d['dados'] = $n1->fetchAll();	
			return $d; 
			
		}
		
		static function select_risk_group_superadmin(){
			
			$n1 = self::getConn()->prepare('SELECT * FROM ir_risk_groups WHERE deleted=0');
			$n1->execute(array()); 
			$d['dados'] = $n1->fetchAll();	
			return $d; 
			
		}
		

		
/*=================================================insert======================================================*/
		
		static function insert_document($name,$summary,$risk_group,$institutions_id,$project_id,$ir_agents_id,$data_analyzed){
			
			$n = self::getConn()->prepare('INSERT INTO `ir_risks` SET 
											name=?,
											summary=?,
											ec_groups_id=?,
											institutions_id	=?,
											project_id=?,
											ir_agents_id=?,		
											data_analyzed=?		
										  ');											
			$n->execute(array($name,$summary,$risk_group,$institutions_id,$project_id,$ir_agents_id,$data_analyzed));
			
			$id = self::getConn()->prepare('SELECT LAST_INSERT_ID() as id_last_insert');	
			$id->execute(array());
			$r = $id->fetch();
			return $r;
			
		}
			
		static function insert_risk_group($risk_group,$institutions_id,$description){
			
			$n = self::getConn()->prepare('INSERT INTO `ir_risk_groups` SET 
											risk_group=?,		
											institutions_id=?,		
											description=?		
										  ');											
			$n->execute(array($risk_group,$institutions_id,$description));
			
			$id = self::getConn()->prepare('SELECT LAST_INSERT_ID() as id_last_insert');	
			$id->execute(array());
			$r = $id->fetch();
			return $r;
			
		}
		
		
		
/*=================================================update======================================================*/
		
		static function update_risk($name, $summary, $ec_groups_id, $ir_agents_id, $data_analyzed, $id){
					$n = self::getConn()->prepare('
													UPDATE  `ir_risks` SET 
												   `name` =?,
												   `summary` =?,
												   `ec_groups_id` =?,
												   `ir_agents_id` =?,
												   `data_analyzed` =?
													WHERE  `id` =? ');
											
					$n->execute(array($name, $summary, $ec_groups_id, $ir_agents_id, $data_analyzed, $id));
		}
	
	
	static function update_risk_group($risk_group,$description, $id){
					$n = self::getConn()->prepare('
													UPDATE  `ir_risk_groups` SET 
												   `risk_group` =?,
												   `description` =?
													WHERE  `id` =? ');
											
					$n->execute(array($risk_group,$description, $id));
		}
	
/*=================================================delete======================================================*/		
		
		static function delete_risk_group($id){
				$n = self::getConn()->prepare('
													UPDATE  `ir_risk_groups` SET 
												   `deleted` =1
													WHERE  `id` =? ');
											
					$n->execute(array($id));	
		}
		
			
		static function delete_risk($id){
				$n = self::getConn()->prepare('
													UPDATE  `ir_risks` SET 
												   `deleted` =1
													WHERE  `id` =? ');
											
					$n->execute(array($id));	
		}	
		
		
		
		static function delete_risk_group_institutions_id($id){
				$n = self::getConn()->prepare('
													DELETE  FROM `ir_risk_groups`
													WHERE  `institutions_id` =? ');
											
					$n->execute(array($id));	
		}
		
		
		static function delete_ar_analyze_risks($id){
				$n = self::getConn()->prepare('
													DELETE  FROM `ar_analyze_risks`
													WHERE  `id_risk` =? ');
											
					$n->execute(array($id));	
		}
		
		static function delete_ar_zoom_list_items_affected($id){
				$n = self::getConn()->prepare('
													DELETE  FROM `ar_zoom_list_items_affected`
													WHERE  `risk_id` =? ');
											
					$n->execute(array($id));	
		}
		
		static function delete_ar_zoom_list_items_affected_o($id){
				$n = self::getConn()->prepare('
													DELETE  FROM `ar_zoom_list_items_affected_o`
													WHERE  `risk_id` =? ');
											
					$n->execute(array($id));	
		}
		
		static function delete_tr_analyze_options($id){
				$n = self::getConn()->prepare('
													DELETE  FROM `tr_analyze_options`
													WHERE  `id_risk` =? ');
											
					$n->execute(array($id));	
		}
		
		static function delete_tr_identify_options($id){
				$n = self::getConn()->prepare('
													DELETE  FROM `tr_identify_options`
													WHERE  `id_risk` =? ');
											
					$n->execute(array($id));	
		}
		
		
			
		static function delete_risk_institutions_id($id){
				$n = self::getConn()->prepare('
													DELETE  FROM `ir_risks`
													WHERE  `institutions_id` =? ');
											
					$n->execute(array($id));	
		}
		
		
		
}

?>