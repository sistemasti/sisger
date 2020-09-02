<?php
	
class Access extends DB{
		
	private $tabela = 'users';
	private $prefix = '';
	public $erro = '';

	private function valid_email($username, $password){
		
		$validar = self::getConn()->prepare('SELECT `id` FROM `'.$this->tabela.'` WHERE `email`=? AND `password`=? and status=1 LIMIT 1');
		$validar->execute(array($username, $password));
		
		if($validar->rowCount()==1){
		
			$asValidar = $validar->fetch(PDO::FETCH_NUM);
			$_SESSION[$this->prefix.'uid'] = $asValidar[0];
			return true;
			
		}else{
			return false;
		}
		
	}
		
	private function valid_email_admin($username, $password){
		
		$validar = self::getConn()->prepare('SELECT `id` FROM `users_a` WHERE `login`=? AND `password`=?  and status=1 LIMIT 1');
		$validar->execute(array($username, $password));
		
		if($validar->rowCount()==1){
		
			$asValidar = $validar->fetch(PDO::FETCH_NUM);
			$_SESSION[$this->prefix.'uid'] = $asValidar[0];
			return true;
			
		}else{
			return false;
		}
		
	}
					
	function logar($usuario,$senha){
		
		if($this->valid_email($usuario,$senha)){
			
			if(!isset($_SESSION)){
				session_start();
			}
			
			$_SESSION[$this->prefix.'usuario'] = $usuario;
			$_SESSION[$this->prefix.'logado'] = true;

			return true;
		}else{
			$this->erro=  'Usuario invalido';
			return false;
		}
		
	}
	
					
	function logar_admin($usuario,$senha){
		
		if($this->valid_email_admin($usuario,$senha)){
			
			if(!isset($_SESSION)){
				session_start();
			}
			
			$_SESSION[$this->prefix.'usuario'] = $usuario;
			$_SESSION[$this->prefix.'logado'] = true;

			return true;
		}else{
			$this->erro=  'Usuario invalido';
			return false;
		}
		
	}
	
	
	
	
	function logado(){
	
		if(!isset($_SESSION)){
			session_start();
		}
		
		if(isset($_SESSION[$this->prefix.'logado'])){
			return true;
		}else{
			return false;
		}
		
	}
	
	function sair(){
	
		if(!isset($_SESSION)){
			session_start();
		}
		
		$_SESSION[$this->prefix.'logado'] = false;			
		session_destroy();	
		
	}
	
	function read($uid){			
		$dados = self::getConn()->prepare('SELECT * FROM '.$this->tabela.'  WHERE id="'.$uid.'"');
		$dados->execute(array($uid));
		return $dados->fetch(PDO::FETCH_ASSOC);
		
	}

	function getDados($uid){
		
		if($this->logado()){
			$dados = self::getConn()->prepare('SELECT * FROM `'.$this->tabela.'` WHERE `id`=?');
			$dados->execute(array($uid));
			return $dados->fetch(PDO::FETCH_ASSOC);
		}
		
	}
	
	
########################################################################

	

	
	static function select_login($login, $senha){
		$n1 = self::getConn()->prepare('SELECT * FROM users WHERE email=? and password=? and status=1');		
		
		$n1->execute(array($login, $senha));
		$d = $n1->fetch();		
		$d['num'] = $n1->rowCount();
		return $d;
	}
	
	static function select_login_admin($login, $senha){
		$n1 = self::getConn()->prepare('SELECT * FROM users_a WHERE email=? and password=?');		
		
		$n1->execute(array($login, $senha));
		$d = $n1->fetch();		
		return $d;
	}
	

	static function controlar_acesso($id_perfil){
		//if ($id_perfil == 1){echo'<script language= "JavaScript">location.href="login.php"</script>';}
	}
	
	
	
	
	
}