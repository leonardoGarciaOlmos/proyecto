<?php

	/**
		@author Daniel Castillo
	*/
		
class Service_auth extends MY_Model{
	protected $id;
	protected $name;
	protected $systemId;
	
	public function __construct(){
		parent::__construct();
	}

	public function get($service = ''){

		switch ($service) {
			case 'user':
				$currentUser = array('id' => , );
				return 
				break;
			
			default:
				# code...
				break;
		}
	}

}