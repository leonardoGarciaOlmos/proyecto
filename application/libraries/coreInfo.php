<?php
	/**
		@author Joseph Huizi
	*/


	class CoreInfo{

		// Atributos y constantes de clase

		private $system;
		private $user;
		private $activeRole;
		private $ci;

		// Métodos de inicialización de instancia

		public function __construct(){
			$this->_init();
		}

		private function _init(){
			$this->ci =& get_instance();
			$this->_initSystem();
			$this->_initUser();
			$this->_initActiveRole();
		}

		private function _initSystem(){
			if(isset($_SESSION['System'])){
				$this->system = unserialize($_SESSION['system']);
			}
			else{
				$this->ci->load->model('system');
				$this->system = $this->ci->system;	
			}
		}

		private function _initUser(){
			if(isset($_SESSION['user'])){
				$this->user = unserialize($_SESSION['user']);
			}
			else{
				$this->ci->load->model('user');
				$this->user = $this->ci->user;	
			}
		}

		private function _initActiveRole(){
			if(isset($_SESSION['activeRole'])){
				$this->activeRole = unserialize($_SESSION['activeRole']);
			}
			else{
				$this->ci->load->model('role');
				$this->activeRole = $this->ci->role;	
			}
		}

		/*
			Descripción : Ejecuta las validaciones pertinentes, para verificar si 
			un usuario tiene acceso a determinada URL.
			Retorno : Ninguno.
			Parámetros de entrada :
				url(String). 
		*/

		public function access(){
				$url = $_SERVER['HTTP_HOST'].$this->getDirectoryUri();
				if($this->checkLogin()){
					$this->_setUserSession();
					if($this->system->get('url') != $url){
						$this->system->load(array('url'=>$url));
						$this->loadActiveRole();
					}
					//if(!$this->_checkPermission($url))
						$this->redirect('http://www.google.com');
				}
				else{
					if($this->system->load(array('url'=>$url))){
						$this->redirect($this->ci->config->item('URL_LOGIN_COM').$this->system->get('alias')['alias']);
					}
					else
						$this->redirect($this->ci->config->item('URL_LOGIN_COM'));	
				}
		}

		/*
			Descripcion : A partir de la url que hace la peticionm
			retorna el subdirectorio al que quiere acceder
		*/

		private function getDirectoryUri(){
			$uriSegments = explode('/', $_SERVER['REQUEST_URI'], 3);
			if($uriSegments[0] == '')
				return '/'.$uriSegments[1];
			else
				return '/'.$uriSegments[0];
		}

		/*
			Descripción : Carga el rol que tiene el usuario logueado sobre el sistema
			que se cargo en memoria.
			Retorno : Bool.
			Parámetros de entrada:
				Ninguno
		*/


		public function loadActiveRole(){
			return null;
		}

		/*
			Nombre : getPublicKey($user)
			Descripción : Encripta y retorna el parámetro user
			Retorno : String
			Parámetros de entrada :
				user(String). 
		*/

		public function getPublicKey(){
			$this->ci->load->model('encrypt');
			$id = $this->user->get('id')['id'];
			return $this->ci->encrypt->encryptKey($id);
		}

		/*
			Descripcion : Busca la URL de un sistema, por el alias del sistema.
			Si no encuentra ningún sistema con ese alias, retorna cadena vacia.
			Retorno : String
			Parámetros de entrada:
				systemAlias(String).
		*/

		public function getSystemUrl($systemAlias){
			if($systemAlias != ''){
				$system = new System();
				if($system->load(array('alias'=>$systemAlias))){
					return $system->get('url');
				}
				else
					return '';
			}
			else
				return '';
		}

		/*
			Descripción : Crea el login en el dominio. Esto implica, crear la cookie,
			crear la sesión y ademas asignar el usuario al atributo de la clase User
			Retorno : Bool
			Parámetros de entrada :
				id(Int)
				userType(String)
				duration(Int)
		*/

		public function createLogin($login, $duration){
			$this->ci->load->model('user');
			if($this->ci->user->load(array('login'=>$login))){
				$id = $this->ci->user->get('id')['id'];
				$_SESSION['user'] = serialize($this->ci->user);
				$this->user = $this->ci->user;
				$publicKey = $this->getPublicKey();
				$this->_createCookie($this->ci->config->item('COOKIE_KEY_NAME'), $publicKey, $duration);
				return true;
			}
			else
				return false;
		}

		/*
			Descripción : Redirecciona hacia la url que entra como parámetro.
			Retorno : Ninguno.
			Parámetros de entrada : 
				url(String).
		*/

		public function redirect($url){
			header('location: '.$url);
		}

		/*
			Descripción : Verifica si el usuario que esta cargado en la cookie
			es un usuario válido.
			Retorno : Bool.
			Parámetros de entrada:
				Ninguno.
		*/

		public function checkLogin(){
			$this->ci->load->model('encrypt');
			$publicKey = $this->_getCookie($this->ci->config->item('COOKIE_KEY_NAME'));
			if(empty($publicKey)){
				return false;
			}
			else{
				$id = $this->ci->encrypt->decryptKey($publicKey);
				if($this->checkUser($id))
					return true;
				else
					return false;
			}
		}	

		/*
			Descripción : Valida si la clave pública que entra como parámetro
			esta registrada en la base de datos del sistema.
			Retorno : Bool.
			Parámetros de entrada :
				publicKey(String)
		*/


		public function checkPublicKey($publicKey){
			$this->ci->load->model('encrypt');
			$id = $this->ci->encrypt->decryptKey($publicKey);
			$this->ci->load->model('user');
			if($this->ci->user->load(array('id'=>$id)))
				return true;
			else
				return false;
		}

		/*
			Descripción : Valida si un usuario esta registrado en la base de datos.
			Si esta registrado, valida si las contraseñas coinciden (este paso es opcional)
			Retorno : Bool	
			Parámetros de entrada : 
				id(Int).
				password(String)(opcional).
		*/

		public function checkUser($id, $password = ''){
			$this->ci->load->model('user');
			if($this->ci->user->load(array('id'=>$id))){
				if($password != ''){
					if($this->ci->user->get('password')['password'] == sha1($password))
						return true;
					else
						return false;
				}
				else
					return true;
			}
			else
				return false;
		}

		public function checkUserByLogin($login, $password = ''){
			$this->ci->load->model('user');
			if($this->ci->user->load(array('login'=>$login))){
				if($password != ''){
					if($this->ci->user->get('password')['password'] == sha1($password)){
						return true;
					}
					else 
						return false;
				}
				else
					return true;
			}
			else
				return false;
		}

		/*
			Descripción : Consulta el usuario que esta registrado en la cookie, y
			lo carga en una variable sesión.
			Retorno : Bool.
		*/

		private function _setUserSession(){
			$this->ci->load->model('encrypt');
			$id = $this->ci->encrypt->decryptKey($this->_getCookie($this->ci->config->item('COOKIE_KEY_NAME')));
			$this->ci->load->model('user');
			if($this->ci->user->load(array('id'=>$id))){
				$this->user = $this->ci->user;
				$_SESSION['user'] = serialize($this->ci->user);
				return true;
			}
			else
				return false;
		}

		/*
			Descripción : Crea una cookie en el dominio
			Retorno : Ninguno.
			Parámetros de entrada : 
				name(String)
				value(String)
				duration(Int)  
		*/

		public function _createCookie($name, $value, $duration){
			if($_SERVER['HTTP_HOST'] != 'localhost')
				$host = $_SERVER['HTTP_HOST'];
			else
				$host = false;
			if($duration != 0)
				setcookie($name, $value, time()+$duration, "/", $host, 0, 1);
			else
				setcookie($name, $value, $duration, "/", $host, 0, 1);
		}

		/*
			Descripción : Crea una variable session en el dominio
			Retorno : Ninguno.
			Parámetros de entrada : 
				object(Object)
				name(String)
		*/

		private function _createSession($bject, $name){
			$_SESSION[$name] = $object;
		}

		/*
			Descripción : Obtiene el contenido de una cookie
			Retorno : String.
			Parámetros de entrada : 
				name(String)
		*/

		private function _getCookie($name){
			return (isset($_COOKIE[$name])) ? $_COOKIE[$name] : false;
		}

		/*
			Descripción : Obtiene el contenido de una variable session
			Retorno : Object.
			Parámetros de entrada : 
				name(String)
		*/

		private function _getSession($name){
			return (isset($_SESSION[$name])) ? $_SESSION[$name] : false;
		}

		/*
			Descripción : Destruye una cookie del dominio
			Retorno : Bool.
			Parámetros de entrada : 
				name(String)

		*/

		private function _destroyCookie($name){
			unset($_COOKIE[self::$COOKIE_NAME]);
			return setcookie($name, NULL, time()-self::PERMANENT_COOKIE, "/", self::URL_LOGIN_COM,0,1);
		}

		/*
			Descripción : Obtiene el path del contenido del sistema, que tenga
			como alias el parámetro de entrada.
			Retorno : String.
			Parámetros de entrada : 
				systemAlias(String)
		*/

		public function getLoginContentPath($systemAlias){
			$this->ci->load->model('system', 'auxsystem');
			if($this->ci->auxsystem->load(array('alias'=>$systemAlias)))
				return $this->ci->auxsystem->get('path')['path'].'application\views\templates\content.tpl';
			else
				return '';
		}



	}
?>