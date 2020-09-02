<?php

	class Enter_values extends DB{
	
/*=================================================isset======================================================*/

		static function isset_documents(){
			
		

		}

/* ================================================= selects ====================================================== */




		static function select_mixed_values_for_report(){
			
			$n1 = self::getConn()->prepare('SELECT * FROM ec_mixed_values WHERE project_id="'.$_SESSION['project_id'].'"');
			$n1->execute(array()); 
			$d['dados'] = $n1->fetchAll();	
			return $d; 
			
		}

		static function select_ec_mixed_values_id($id){
			
			$n1 = self::getConn()->prepare('SELECT * FROM ec_mixed_values WHERE id=?');
			$n1->execute(array($id));
			$d = $n1->fetch();	
			$d['num'] = $n1->rowCount();	
			return $d;
			
		}
	
		static function select_ec_mixed_values_by_value_pie_type($id){
			
			$n1 = self::getConn()->prepare('SELECT * FROM ec_values_and_their_scores WHERE value_pie_type=?');
			$n1->execute(array($id));
			$d = $n1->fetch();	
			$d['num'] = $n1->rowCount();	
			return $d;
			
		}
	
		
		
/*=================================================insert======================================================*/
		
		static function insert_ec_mixed_values($name_value,$weight,$definition,$notes){
			
			$n = self::getConn()->prepare('INSERT INTO `ec_mixed_values` SET 
											name_value=?,
											weight=?,
											definition=?,
											notes=?,
											project_id="'.$_SESSION['project_id'].'"	
										  ');											
			$n->execute(array($name_value,$weight,$definition,$notes));
			
			$id = self::getConn()->prepare('SELECT LAST_INSERT_ID() as id_last_insert');	
			$id->execute(array());
			$r = $id->fetch();
			return $r;
			
		}
		
		
		
/*=================================================update======================================================*/
		
		static function update_ec_mixed_values($name_value, $weight, $definition, $notes, $id){
					$n = self::getConn()->prepare('
													UPDATE  `ec_mixed_values` SET 
												   `name_value` =?,
												   `weight` =?,
												   `definition` =?,
												   `notes` =?
													WHERE  `id` =? ');
											
					$n->execute(array($name_value, $weight, $definition, $notes, $id));
		}

		
		
/*=================================================delete======================================================*/		
		
		static function delete_ec_mixed_values($id){
				$n1 = self::getConn()->prepare('DELETE FROM `ec_mixed_values` WHERE id=?');		
				$n1->execute(array($id));	
		}
		
		
		
}

?>