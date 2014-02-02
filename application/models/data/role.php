<?php
	class DRole extends CI_Model
	{
		function __construct(){
			parent::__construct();
		}

		public function getRoleSystem( $id , $systemId )
		{
			$this->db->select('id, name');
			$this->db->from('role r');
			$this->db->where(array( 'id'=>$id ,'system_id'=>$systemId ));
			$query = $this->db->get();				
			return $query->result_array();
		}

		public function create( $role )
		{
			$dataRole = $role->get('all');
			if($this->db->insert( 'user', $dataRole )){
				$insert_id = $this->db->insert_id();
				$role->set(array('id'=>$insert_id));
				return true;
			}
			return false;
		}

		public function update( $role )
		{
			$dataRole = $role->get('name, system_id');
			$this->db->where('id',$role->get('id'));
			return $this->db->update( 'user', $dataRole );
		}

		public function delete( $idUser )
		{
			return	$this->db->delete('user', array( 'id' => $idUser ));
		}
	}
?>	