<?php

	class Groups extends DB{
	
/*=================================================isset======================================================*/

		static function isset_groups(){
			


		}

/*=================================================selects======================================================*/

		static function select_groups(){ /// esse metodo será modificado 
			
			$n1 = self::getConn()->prepare('SELECT * FROM ec_groups');
			$n1->execute(array()); 
			$d['dados'] = $n1->fetchAll();	
			return $d; 
			
		}
	
		
		
/*=================================================insert======================================================*/
		
		static function insert_group(){

		}
		
		
		
/*=================================================update======================================================*/
		
		static function update_group(){
			
		}
	
/*=================================================delete======================================================*/		
		
		static function delete_group($id){
				
		}
		
		
		
}

?>