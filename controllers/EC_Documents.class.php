<?php

	class Documents extends DB{
	
/*=================================================isset======================================================*/

		static function isset_documents(){
			
		

		}

/* ================================================= selects ====================================================== */




		static function select_documents_for_report($institutions_id){
			
			$n1 = self::getConn()->prepare('SELECT * FROM ec_documents WHERE institutions_id=? AND project_id="'.$_SESSION['project_id'].'"');
			$n1->execute(array($institutions_id)); 
			$d['dados'] = $n1->fetchAll();	
			return $d; 
			
		}
	
		static function select_ec_groups(){
			
			$n1 = self::getConn()->prepare('SELECT * FROM ec_groups');
			$n1->execute(array($institutions_id)); 
			$d['dados'] = $n1->fetchAll();	
			return $d; 
			
		}
		
		static function select_ec_groups_id($id){
			
			$n1 = self::getConn()->prepare('SELECT * FROM ec_groups WHERE id=?');
			$n1->execute(array($id));
			$d = $n1->fetch();	
			$d['num'] = $n1->rowCount();	
			return $d;
			
		}
		
		static function select_document_id($id){
			
			$n1 = self::getConn()->prepare('SELECT * FROM ec_documents WHERE id=?');
			$n1->execute(array($id));
			$d = $n1->fetch();	
			$d['num'] = $n1->rowCount();	
			return $d;
			
		}
	
		
		
/*=================================================insert======================================================*/
		
		static function insert_document($name,$comment,$link,$file,$institutions_id){
			
			$n = self::getConn()->prepare('INSERT INTO `ec_documents` SET 
											name=?,
											comment=?,
											link=?,
											file=?,
											institutions_id=?,
											project_id="'.$_SESSION['project_id'].'",
											status=1,
											date="'.date("Y-m-d").'"		
										  ');											
			$n->execute(array($name,$comment,$link,$file,$institutions_id));
			
			$id = self::getConn()->prepare('SELECT LAST_INSERT_ID() as id_last_insert');	
			$id->execute(array());
			$r = $id->fetch();
			return $r;
			
		}
		
		
		
/*=================================================update======================================================*/
		
		static function update_document($name, $comment, $link, $file, $institutions_id, $id){
					$n = self::getConn()->prepare('
													UPDATE  `ec_documents` SET 
												   `name` =?,
												   `comment` =?,
												   `link` =?,
												   `file` =?,
												   `institutions_id` =?
													WHERE  `id` =? ');
											
					$n->execute(array($name, $comment, $link, $file, $institutions_id, $id));
		}

 		static function update_document_no_file($name, $comment, $link, $institutions_id, $id){            $n = self::getConn()->prepare('
                                            UPDATE  `ec_documents` SET 
                                           `name` =?,
                                           `comment` =?,
                                           `link` =?,
                                           `institutions_id` =?
                                            WHERE  `id` =? ');
            $n->execute(array($name, $comment, $link, $institutions_id, $id));

		}
		static function update_document_status($status,$id){
					$n = self::getConn()->prepare('
													UPDATE  `ec_documents` SET 
												   `status` =?
													WHERE  `id` =? ');
											
					$n->execute(array($status,$id));	
		}
	
/*=================================================delete======================================================*/		
		
		static function delete_document($id){
				$n1 = self::getConn()->prepare('DELETE FROM `ec_documents` WHERE id=?');		
				$n1->execute(array($id));	
		}
		
		static function delete_document_by_institutions_id($id){
				$n1 = self::getConn()->prepare('DELETE FROM `ec_documents` WHERE institutions_id=?');		
				$n1->execute(array($id));	
		}
		
		
		
}

?>