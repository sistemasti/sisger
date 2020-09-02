<?php

	class Agents extends DB{
	
/*=================================================isset======================================================*/

		static function isset_agents(){
			
		


		}

/*=================================================selects======================================================*/

		static function select_ir_agents(){
			
			$n1 = self::getConn()->prepare('SELECT * FROM ir_agents WHERE deleted <> 1 ORDER BY agent');
			$n1->execute(array()); 
			$d['dados'] = $n1->fetchAll();	
			return $d; 
			
		}
		
		static function select_ir_agents_id($id){
			
			$n1 = self::getConn()->prepare('SELECT * FROM ir_agents WHERE id=?');
			$n1->execute(array($id));
			$d = $n1->fetch();	
			$d['num'] = $n1->rowCount();	
			return $d;
			
			
		}
		
	
		
		
/*=================================================insert======================================================*/
		
		static function insert_agents($agent,$description){
			$n = self::getConn()->prepare('INSERT INTO `ir_agents` SET 
											agent=?,
											description=?		
										  ');											
			$n->execute(array($agent,$description));
			
			$id = self::getConn()->prepare('SELECT LAST_INSERT_ID() as id_last_insert');	
			$id->execute(array());
			$r = $id->fetch();
			return $r;
		}
		
		
		
/*=================================================update======================================================*/
		
		static function update_agents($agent,$description,$id){
			$n = self::getConn()->prepare('
													UPDATE  `ir_agents` SET 
												   `agent` =?,
												   `description` =?
													WHERE  `id` =? ');
											
			$n->execute(array($agent,$description,$id));
		}
	
/*=================================================delete======================================================*/		
		
		static function delete_agents($id){
			$n = self::getConn()->prepare('
													UPDATE  `ir_agents` SET 
												   `deleted` =1
													WHERE  `id` =? ');
											
			$n->execute(array($id));		
		}
		
		
		
}

?>