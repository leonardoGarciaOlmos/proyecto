<?php

	/**
		@author Joseph Huizi
	*/

	class DRole extends CI_Model{
		function __construct(){
			parent::__construct();
		}

		public function validate( $roleName, $systemId )
		{
		//	var_dump($roleName);
		//	var_dump($systemId);
			$query = "SELECT role_id FROM role WHERE system_id=? AND name=?";
			$result = $this->db->query( $query, array( $systemId, $roleName ) );
			return ( $result->num_rows() > 0 )? false : true;
		}

		public function deleteById(){
			$roleId = $this->role->get('role_id')['role_id'];
			$query = "DELETE FROM role WHERE role_id=?";
			$this->db->query($query, array($roleId));
			return ($this->db->affected_rows() > 0)? true : false;
		}

		public function hasUser(){
			$roleId = $this->role->get('role_id')['role_id'];
			$query = "SELECT user_id FROM user_has_role
					  WHERE role_id=?";
			$result = $this->db->query($query, array($roleId));
			return ($result->num_rows() > 0)? true : false;
		}

		public function insertUrls($urls){
			$query = "INSERT INTO role_has_url (role_id, url_id, operations) VALUES ";
			$firstIteration = true;
			$roleId = $this->role->get('role_id')['role_id'];
			foreach($urls as $url){
				$urlId = $url['id'];
				$operations = $url['operations'];
				if($firstIteration){
					$query .= "(".$roleId.",".$urlId.",'".$operations."')";
					$firstIteration = false;
				}
				else{
					$query .= ", (".$roleId.",".$urlId.",'".$operations."')";
				}	
			}
			$result = $this->db->query($query);
		}

		public function insert( )
		{
			//var_dump($this->role);
			$dataRole = $this->role->get('all');
			if($this->db->insert( 'role', $dataRole )){
				$insert_id = $this->db->insert_id();
				$this->role->set(array('id'=>$insert_id));
				return true;
			}
			return false;
		}

		public function update(){
			$query = "UPDATE role SET 
					  system_id=?
					  WHERE role_id=?";
			$role_id = $this->role->get('role_id')['role_id'];
			$system_id = $this->role->get('systemId')['systemId'];
			$result = $this->db->query($query, array($system_id, $role_id));
		}

		public function deleteUrls(){
			$roleId = $this->role->get('role_id')['role_id'];
			$query = "DELETE FROM role_has_url WHERE role_id=?";
			$result = $this->db->query($query, array($roleId));
			if($result)
				return true;
			else
				return false;
		}

		public function getActiveRole($userId, $systemId){
			$query = "SELECT r.role_id, r.name, r.system_id as systemId
					  FROM user_has_role as ur
					  INNER JOIN role as r
					  ON r.role_id=ur.role_id
					  WHERE r.system_id=?
					  AND
					  ur.user_id=?";
			$result = $this->db->query($query, array($systemId, $userId));
			if($result->num_rows() > 0){
				$dataRole = $result->result_array()[0];
				$this->role->set($dataRole);
				return true;
			}
			return false;
		}

		public function getRoleBy( $ids )
		{
			$this->db->select('role_id as id, role_id, name, system_id as systemId');
			$this->db->from('role');
			$this->db->where( $ids );
			$query = $this->db->get();
			if ($query->num_rows > 0){
				$dataRole = $query->result_array()[0];
				$this->role->set($dataRole);
				return true;
			}
			return false;
		}

		public function getRoles( $idSystem )
		{
			$this->db->select('role_id, name, system_id as systemId');
			$this->db->from('role');
			$this->db->where( $ids );
			$query = $this->db->get();
			if ($query->num_rows > 0){
				$dataRole = $query->result_array()[0];
				$this->role->set($dataRole);
				return true;
			}
			return false;
		}

	}
?>