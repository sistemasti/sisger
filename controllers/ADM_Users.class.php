<?php

	class Users extends DB{
	
/*=================================================isset======================================================*/

		static function isset_cpf($cpf){
			
			$n = self::getConn()->prepare('SELECT cpf FROM users WHERE cpf=?');					
			$n->execute(array($cpf));		
			$d['num'] = $n->rowCount();
			return $d;
			
		}
		
		static function isset_email($email){
			$n = self::getConn()->prepare('SELECT email FROM users WHERE email=?');					
			$n->execute(array($email));		
			$d['num'] = $n->rowCount();
			return $d;
		}


/*=================================================selects======================================================*/


	
		static function select_users_for_report(){
			
			if($_SESSION['perfil_logado'] != "1"){ 
				$where = " WHERE institutions_id=".$_SESSION['institutions_id'];
			}else{
				$where="";
			}	
			
			$n1 = self::getConn()->prepare('SELECT * FROM users '.$where);
			$n1->execute(array()); 
			$d['dados'] = $n1->fetchAll();	
			return $d; 
			
		}
	
	
		static function select_profiles(){
			
			if($_SESSION['perfil_logado'] != "1"){ 
				$where = " WHERE id <> 1 ";
			}else{
				$where="";
			}
			
			
			$n1 = self::getConn()->prepare('SELECT * FROM profiles '.$where);
			$n1->execute(array()); 
			$d['dados'] = $n1->fetchAll();	
			return $d; 
			
		}
	
		static function select_profile_id($id){
			
			$n1 = self::getConn()->prepare('SELECT * FROM profiles WHERE id=?');
			$n1->execute(array($id));
			$d = $n1->fetch();	
			$d['num'] = $n1->rowCount();	
			return $d;
			
		}
	
		static function select_users_id($id){
			
			$n1 = self::getConn()->prepare('SELECT * FROM users WHERE id=?');
			$n1->execute(array($id));
			$d = $n1->fetch();	
			$d['num'] = $n1->rowCount();	
			return $d;
			
		}
	
		
		
/*=================================================insert======================================================*/
		
	static function insert_users($name, $email, $cpf, $matriculation, $telephone, $password, $institutions_id, $profiles_id){
			
			$n = self::getConn()->prepare('INSERT INTO `users` SET 
											name=?,
											email=?,
											cpf=?, 
											matriculation=?, 
											telephone=?, 
											first_acess=1,
											password=?,		
											institutions_id=?,		
											profiles_id=?,		
											status=1,		
											date_register="'.date("Y-m-d").'"		
										  ');											
			$n->execute(array($name, $email, $cpf, $matriculation, $telephone, $password, $institutions_id, $profiles_id));
			
			$id = self::getConn()->prepare('SELECT LAST_INSERT_ID() as id_last_insert');	
			$id->execute(array());
			$r = $id->fetch();
			return $r;
			
		}
		
		
		
/*=================================================update======================================================*/
		
		static function update_user($name, $email, $cpf, $matriculation, $telephone, $first_acess, $institutions_id, $profiles_id, $id){
					$n = self::getConn()->prepare('
													UPDATE  `users` SET 
												   `name` =?,
												   `email` =?,
												   `cpf` =?,
												   `matriculation` =?,
												   `telephone` =?,
												   `first_acess` =?,												   
												   `institutions_id` =?,
												   `profiles_id` =?
													WHERE  `id` =? ');
											
					$n->execute(array($name, $email, $cpf, $matriculation, $telephone, $first_acess, $institutions_id, $profiles_id, $id));
		}
	
		static function update_user_status($status,$id){
					$n = self::getConn()->prepare('
													UPDATE  `users` SET 
												   `status` =?
													WHERE  `id` =? ');
											
					$n->execute(array($status,$id));	
		}
		
		static function update_user_password($password,$id){
			
					if($_SESSION['first_acess'] == 1 ){
						
						$where = ", first_acess=0";
						
					}else{
						$where="";
					}	
			
					$n = self::getConn()->prepare('
													UPDATE  `users` SET 
												   `password` =? '.$where.'
													WHERE  `id` =? ');
													
					$_SESSION['first_acess'] = 0;						
					$n->execute(array($password,$id));	
		}
	
/*=================================================delete======================================================*/		
		

		static function delete_user($id){
				$n1 = self::getConn()->prepare('DELETE FROM `users` WHERE id=?');		
				$n1->execute(array($id));	
		}
		
		static function delete_user_by_institutions_id($id){
				$n1 = self::getConn()->prepare('DELETE FROM `users` WHERE institutions_id=?');		
				$n1->execute(array($id));	
		}
		
		
		
}

?>