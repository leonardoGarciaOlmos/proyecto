<?php

	/**
		@author Daniel Castillo
	*/
	class Authentication {

		const $PERMANENT_COOKIE = 604800;
		const $NOT_PERMANENT_COOKIE = 0;
		private static $COM_SERVER_PATH = 'http://login.infoguia.com/';
		private static $NET_SERVER_PATH = 'http://login.infoguia.net/';
		private static $SERVER_NET = "http://login.infoguia.net/login.php";
		private static $SERVER_COM = ".infoguia.com";
		private static $COOKIE_NAME = 'authentication';

		static public function createCookie($value, $duration){
			setcookie(self::$COOKIE_NAME, $value, $duration, "/", self::$SERVER_COM, 0, 1);
		}

		static public function createSession($user){
			$_SESSION['user'] = $user;
		}

		static public function getCookie(){
			return (isset($_COOKIE[self::$COOKIE_NAME])) ? $_COOKIE[self::$COOKIE_NAME] : false;
		}

		static public function getSession(){
			return (isset($_SESSION['user'])) ? $_SESSION['user'] : false;
		}

		static public function getIdSession(){
			return session_id();
		}

		static public function destroyCookie(){
			unset($_COOKIE[self::$COOKIE_NAME]);
			return setcookie(self::$COOKIE_NAME, NULL, time()-self::PERMANENT_COOKIE, "/", self::SERVERCOM,0,1);
		}
	}