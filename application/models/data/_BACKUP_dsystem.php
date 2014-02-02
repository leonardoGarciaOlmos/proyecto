<?php
	/**
		@author Jhoynerk Caraballo
	*/
	class DSystem extends CI_Model
	{
		function __construct(){
			parent::__construct();
		}

		public function validate( $element ){
			$query = "SELECT id FROM system WHERE ".$element['name']."=?";
			$result = $this->db->query( $query, array( $element['value'] ) );
			return ( $result->num_rows() > 0)? false : true;
		}

		public function insert( )
		{
			$dataSystem = $this->system->get('all');
			if($this->db->insert( 'system', $dataSystem)){
				$insert_id = $this->db->insert_id();
				$this->system->set(array('id'=>$insert_id));
				return true;
			}
			return false;
		}

		public function update( )
		{
			$dataSystem = $this->system->get('name, alias, url, path, logo');
			$this->db->where( $this->system->get('id') );
			$this->db->limit(1);
			return $this->db->update( 'system', $dataSystem );
		}

		public function delete( $systemId )
		{
			$this->db->delete('system', array( 'id' => $systemId ));
			return $this->db->affected_rows();
		}

		public function getSystemBy( $ids )
		{
			$this->db->select('id, name, alias, url, path, logo');
			$this->db->from('system');
			$this->db->where( $ids );
			$this->db->limit(1);
			$query = $this->db->get();
			if ($query->num_rows() > 0){
				$dataSystem = $query->result_array()[0];
				$this->system->set($dataSystem);
				return true;
			}
			return false;
		}

		public function getUrlsByRole( $systemId, $roleId )
		{
			$this->db->select('u.url_id as id, u.url, u.is_menu as isMenu, rhu.operations');
			$this->db->from('url u');
			$this->db->join('role_has_url rhu', 'u.url_id = rhu.url_id');
			$where = array('system_id' => $systemId, 'role_id' => $roleId);
			$this->db->where( $where );
			$query = $this->db->get();
			return $query->result_array();
		}

		public function getUrlsBySystem( $systemId ){
			$query = "SELECT url_id as id, url, is_menu as isMenu, operations
					  FROM url
					  WHERE system_id=?";
			//var_dump($query);
			$result = $this->db->query( $query, array($systemId) );
			//var_dump($result->result_array());
			return $result->result_array();
		}

		public function getRolesBySystem( $systemId ){
			$query = "SELECT role_id as id, name, system_id as systemId
					  FROM role
					  WHERE system_id=?";
			$result = $this->db->query( $query, array($systemId) );

			return $result->result_array();
		}

		public function getMenuByRole( $roleId )
		{
			$this->db->select('rhu.url_id id, name, url, parent_id, icon_class');
			$this->db->from('role_has_url rhu');
			$this->db->join('url u', 'u.url_id = rhu.url_id');
			$this->db->join('menu m', 'm.url_id = rhu.url_id');
			$where = array('role_id' => $roleId);
			$this->db->where( $where );
			$this->db->order_by( 'name' );
			$query = $this->db->get();
			return $query->result_array();
		}
	}
