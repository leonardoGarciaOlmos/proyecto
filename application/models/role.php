<?php

	/**
		@author Daniel Castillo
	*/
	class Role extends MY_Model{
		protected $id;
		protected $role_id;
		protected $name;
		protected $systemId;
		
		public function __construct(){
			parent::__construct();
		}

		public function validate( $value ){
			if( isset( $value ) ){
				return ( $this->name == $value )?
				true : $this->drole->validate( $value, $this->systemId );
			}else
				return false;
		}

		public function load($id){
			if(!is_array($id)){
				$id = array('role_id' => $id);
			}
			return $this->drole->getRoleBy($id);
		}

		public function delete(){
			return $this->drole->deleteById();
		}

		public function hasUser(){
			return $this->drole->hasUser();
		}

		public function loadActive($userId, $systemId){
			return $this->drole->getActiveRole($userId, $systemId);
		}

		public function insertUrlsByRole($urls){
			return $this->drole->insertUrls($urls);
		}

		public function deleteUrls(){
			return $this->drole->deleteUrls();
		}
	}

