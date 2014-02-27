<?php
	/**
		@author Jhoynerk Caraballo
	*/
	class DUrl extends CI_Model
	{
		function __construct(){
			parent::__construct();
		}

		public function insert( )
		{
			$dataUrl = $this->url->get('all');
			if($this->db->insert( 'url', $dataUrl)){
				$insert_id = $this->db->insert_id();
				$this->url->set(array('id'=>$insert_id));
				return true;
			}
			return false;
		}

		public function update( )
		{
			$dataUrl = $this->url->get('system_id, url, is_menu, operations');
			$this->db->where( $this->url->get('id'));
			$this->db->limit(1);
			return $this->db->update( 'url', $dataUrl );
		}

		public function delete( $UrlId )
		{
			$this->db->delete('url', array( 'id' => $UrlId ));
			return $this->db->affected_rows();
		}

		public function getUrlBy( $ids )
		{
			$this->db->select('url_id id, system_id systemId, url, is_menu isMenu, operations');
			$this->db->from('url');
			$this->db->where( $ids );
			$this->db->limit(1);
			$query = $this->db->get();
			if ($query->num_rows() > 0){
				$dataUrl = $query->result_array()[0];
				$this->url->set($dataUrl);
				return true;
			}
			return false;
		}

		public function getMenuById( $menuId )
		{
			$where = array('url_id'=>$menuId);
			$this->db->select('url_id')
					 ->from('menu')
					 ->where( $where )
					 ->limit(1);
			$query = $this->db->get();
			return $query->num_rows();
		}

		public function getMenuBySystem( $systemId )
		{
			$this->db->select('u.url_id id, u.url,
							   m.name, m.parent_id, m.icon_class' );
			$this->db->from('url u');
			$this->db->join('menu m', 'u.url_id = m.url_id', 'left');
			$where = $systemId;
			$where['is_menu'] = 1;
			$this->db->where( $where );
			$query = $this->db->get();
			$query->result_array();
			return $query->result_array();
		}


		public function getMenuChildrenBySystem( $systemId )
		{
			$query = "SELECT GROUP_CONCAT(m.url_id) as url_id, GROUP_CONCAT(u.url) as url, parent_id
					  FROM menu m
					  INNER JOIN url u ON u.url_id = m.url_id
					  WHERE parent_id != 0
					  AND m.url_id IN (SELECT url_id FROM url WHERE system_id = ?)
					  GROUP BY parent_id;";
			$result = $this->db->query($query, $systemId);
			return $result->result_array();
		}

		public function insertMenu( $menuData )
		{
			return $this->db->insert('menu', $menuData);
		}

		public function updateMenu( $menuData, $menuId )
		{
			$where = array('url_id'=> $menuId);
			return $this->db->update('menu', $menuData, $where);
		}

		public function deleteMenu( $urlsId )
		{
			$this->db->where_in('url_id', $urlsId);
			$this->db->delete('menu');
			return $this->db->affected_rows();
		}


		public function getUrlsByUrl( $UrlId ){
			$query = "SELECT url_id as id, url, is_menu as isMenu, operations
					  FROM url
					  WHERE Url_id=?";
			//var_dump($query);
			$result = $this->db->query( $query, array($UrlId) );
			//var_dump($result->result_array());
			return $result->result_array();
		}

		public function getRolesByUrl( $UrlId ){
			$query = "SELECT role_id as id, name, Url_id as UrlId
					  FROM role
					  WHERE Url_id=?";
			$result = $this->db->query( $query, array($UrlId) );
			return $result->result_array();
		}

		public function getUrlPermision( $role_id ){
			$query = 'SELECT rhu.operations, r.url 
					FROM sistemas.role_has_url rhu inner join sistemas.url r 
					on rhu.url_id=r.url_id
					 where rhu.role_id= ? ';
			$result = $this->db->query($query, array( $role_id ));
			if($result->num_rows() > 0){
				$urlAllowed = $result->result_array();
				return $urlAllowed;
			}else{
				return false;
			}

		}


	}
