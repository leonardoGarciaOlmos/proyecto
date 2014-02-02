<?php

	/**
		@author Daniel Castillo
	*/
	class Encrypt extends MY_Model{

		private $masterPass = 'jhoynerk';
		
		public  function __construct(){
			parent::__construct();
		}

		public static function encryptKey($key){
			$iv_size = mcrypt_get_iv_size(MCRYPT_RIJNDAEL_256, MCRYPT_MODE_ECB);
		    $iv = mcrypt_create_iv($iv_size, MCRYPT_RAND);
		    return base64_encode(mcrypt_encrypt(MCRYPT_RIJNDAEL_256, $this->masterPass, $text, MCRYPT_MODE_ECB, $iv));	
		}

		public static function decryptKey($key){
			$iv_size = mcrypt_get_iv_size(MCRYPT_RIJNDAEL_256, MCRYPT_MODE_ECB);
		    $iv = mcrypt_create_iv($iv_size, MCRYPT_RAND);
		    return trim(mcrypt_decrypt(MCRYPT_RIJNDAEL_256, self::MASTERPASS, base64_decode($text), MCRYPT_MODE_ECB, $iv));
		}

		public static function encryptPass($pass){
			return sha1($pass);
		}
	}