<?php

	class Institutions extends DB{
	
/*=================================================isset======================================================*/

		static function isset_institutions(){
			
		


		}

/*=================================================selects======================================================*/

		static function select_institutions_for_hierarquie_register(){
			
			$n1 = self::getConn()->prepare('SELECT * FROM institutions WHERE status = 1 AND type="10"');
			$n1->execute(array()); 
			$d['dados'] = $n1->fetchAll();	
			return $d; 
			
		}
		
		static function select_institutions_for_hierarquie_register_unity(){
			
			$n1 = self::getConn()->prepare('SELECT * FROM institutions WHERE status = 1 AND type="20"');
			$n1->execute(array()); 
			$d['dados'] = $n1->fetchAll();	
			return $d; 
			
		}
	
		static function select_institutions_for_hierarquie_register_setor(){
			
			$n1 = self::getConn()->prepare('SELECT * FROM institutions WHERE status = 1 AND type="30"');
			$n1->execute(array()); 
			$d['dados'] = $n1->fetchAll();	
			return $d; 
			
		}
	
		static function select_institutions_for_report(){
			
			$n1 = self::getConn()->prepare('SELECT * FROM institutions');
			$n1->execute(array()); 
			$d['dados'] = $n1->fetchAll();	
			return $d; 
			
		}
	
		static function select_institutions_id($id){
			
			$n1 = self::getConn()->prepare('SELECT * FROM institutions WHERE id=?');
			$n1->execute(array($id));
			$d = $n1->fetch();	
			$d['num'] = $n1->rowCount();	
			return $d;
			
		}
	
		
		
/*=================================================insert======================================================*/
		
		static function insert_institution($name, $code, $sigla, $description, $type, $hierarquie){
			
			$n = self::getConn()->prepare('INSERT INTO `institutions` SET 
											name=?,
											code=?,
											sigla=?, 
											description=?, 
											type=?, 
											hierarquie=?,
											status=1,		
											date_register="'.date("Y-m-d").'"		
										  ');											
			$n->execute(array($name, $code, $sigla, $description, $type, $hierarquie));
			
			$id = self::getConn()->prepare('SELECT LAST_INSERT_ID() as id_last_insert');	
			$id->execute(array());
			$r = $id->fetch();
			return $r;
			
		}
		
		
		
/*=================================================update======================================================*/
		
		static function update_institution($name, $code, $sigla, $description, $type, $hierarquie, $id){
					$n = self::getConn()->prepare('
													UPDATE  `institutions` SET 
												   `name` =?,
												   `code` =?,
												   `sigla` =?,
												   `description` =?,
												   `type` =?,
												   `hierarquie` =?
													WHERE  `id` =? ');
											
					$n->execute(array($name, $code, $sigla, $description, $type, $hierarquie, $id));
		}
	
		static function update_institution_status($status,$id){
					$n = self::getConn()->prepare('
													UPDATE  `institutions` SET 
												   `status` =?
													WHERE  `id` =? ');
											
					$n->execute(array($status,$id));	
		}
	
/*=================================================delete======================================================*/		
		
		static function delete_institution($id){
				$n1 = self::getConn()->prepare('DELETE FROM `institutions` WHERE id=?');		
				$n1->execute(array($id));	
		}
		
		
		
}

?>