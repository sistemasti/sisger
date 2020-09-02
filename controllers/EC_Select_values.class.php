<?php

	class Select_values_scale extends DB{
	
/*=================================================isset======================================================*/

		static function isset_documents(){
			
		

		}

/* ================================================= selects ====================================================== */




		static function select_ec_values_scale_for_report(){
			
			$n1 = self::getConn()->prepare('SELECT * FROM ec_values_scale WHERE project_id="'.$_SESSION['project_id'].'"');
			$n1->execute(array()); 
			$d = $n1->fetch();	
			$d['num'] = $n1->rowCount();	
			return $d;
			
		}

		
		
/*=================================================insert======================================================*/
		
		static function insert_ec_values_scale($ratio,$none,$very_small,$small,$medium,$large,$very_large,$excepitional){
			
			$n = self::getConn()->prepare('INSERT INTO `ec_values_scale` SET 
											ratio=?,
											none=?,
											very_small=?,
											small=?,
											medium=?,
											large=?,
											very_large=?,
											excepitional=?,
											project_id="'.$_SESSION['project_id'].'"	
										  ');											
			$n->execute(array($ratio,$none,$very_small,$small,$medium,$large,$very_large,$excepitional));
			
			$id = self::getConn()->prepare('SELECT LAST_INSERT_ID() as id_last_insert');	
			$id->execute(array());
			$r = $id->fetch();
			return $r;
			
		}
		
		
		
/*=================================================update======================================================*/
		
		static function update_ec_mixed_values($ratio,$none,$very_small,$small,$medium,$large,$very_large,$excepitional, $id){
					$n = self::getConn()->prepare('
													UPDATE  `ec_values_scale` SET 
												   `ratio` =?,
												   `none` =?,
												   `very_small` =?,
												   `small` =?,
												   `medium` =?,
												   `large` =?,
												   `very_large` =?,
												   `excepitional` =?
													WHERE  `project_id` =? ');
											
					$n->execute(array($ratio,$none,$very_small,$small,$medium,$large,$very_large,$excepitional, $id));
		}

		
		
/*=================================================delete======================================================*/		
		
		static function delete_ec_mixed_values($id){
				$n1 = self::getConn()->prepare('DELETE FROM `ec_mixed_values` WHERE id=?');		
				$n1->execute(array($id));	
		}
		
		
		
}

?>