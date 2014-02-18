<?php
class DUser extends CI_Model
{
	function __construct(){
		parent::__construct();
	}

	public function insert( )
	{
		$dataUser = $this->user->get('ci, nombre, apellido, direccion, fecha_nac, sexo, est_civil, tipo_sangre, observacion, nivel_instruccion, clave, tipo, estatus, etnia, expediente, laico, religioso, congregacion, nacionalidad, pensum_id');
		if($this->db->insert( 'usuario', $dataUser )){
			$insert_id = $this->db->insert_id();
			$this->user->set(array('id'=>$insert_id, 'ci'=>$insert_id));
			return true;
		}
		return false;
	}

	public function update( )
	{
		$dataUser = $this->user->get('nombre, apellido, direccion, fecha_nac, sexo, est_civil, tipo_sangre, observacion, nivel_instruccion, clave, tipo, estatus, etnia, expediente, laico, religioso, congregacion, nacionalidad, pensum_id');
		$this->db->where( $this->user->get('ci') );
		return $this->db->update( 'usuario', $dataUser );
	}

	public function delete( $userId )
	{
		$this->db->delete('user', array( 'id' => $userId ));
		return $this->db->affected_rows();
	}

	public function setState()
	{
		$state = $this->user->get('status');
		$this->db->where( $this->user->get('id') );
		return $this->db->update( 'user', $state );
	}

	public function getUserById( $ids = '' )
	{
		$this->db->select('*, ci as id');
		$this->db->from('usuario');
		$this->db->where( $ids );
		$query = $this->db->get();
		if ($query->num_rows() > 0){
			$dataUser = $query->result_array()[0];
			$this->user->set($dataUser);
			return true;
		}
		return false;
	}

	public function getRoles( $userId )
	{
		$this->db->select('r.role_id, r.name, r.system_id');
		$this->db->from('role r');
		$this->db->join('user_has_role uhr', 'r.role_id = uhr.role_id');
		$where = array('uhr.user_id' => $userId);
		$this->db->where( $where );
		$query = $this->db->get();
		return $query->result_array();
	}

	public function insertRoles ( $roles )
	{
		$this->db->insert_batch( 'user_has_role', $roles );
		return $this->db->affected_rows();
	}



	public function getAll( $where )
	{
		if ($where != ''){
			$query = $this->db->get_where('user', $where);
		}else{
			$query = $this->db->get('user');
		}

		return $query->result_array();
	}

	/* revisado hasta aqui Jhoynerk */

	public function getSystemRoles( $systemId = null )
	{
		if ($system_id !== null){
			$this->db->select('rhr.id, rhr.name, system_id');
			$this->db->from('user u');
			$this->db->join('user_has_role rhr', 'u.id = rhr.user_id');
			$this->db->join('role r', 'rhr.role_id = r.id');
			$this->db->where('system_id', $systemId );
			$this->db->order_by('role.id', 'ASC');
			$query = $this->db->get($this->_table);
		}else{
			$query = false;
		}

		return $query;
	}

	public function getLogin( $login )
	{
		$this->db->where('username', $login);
		$this->db->or_where('email', $login);
		return $this->db->get($this->_table);
	}

	public function setRole( $role_id, $systemId )
	{
		return $this->set_user($user_id, $data);
	}

	public function findByName( $ci )
	{
		$this->db->select('u.requisito_id');
		$this->db->from('user u');
		$this->db->like('usuario_ci', $ci );
		$this->db->get();
	}

	public function getRequisitos($ci)
	{

		$this->db->select('group_concat(requisito_id) as requisito_id');
		$this->db->from('requisito_has_usuario rhr');
		$this->db->where('usuario_ci', $ci);
		$result = $this->db->get();
		$result = $result->result_array();
		if ($result) {
			$result = $result[0];
			$result = explode(',',$result['requisito_id']);
		}else{
			$result = false;
		}
		return $result;
	}

	public function findByCI( $ci )
	{
		$campos = 'ci,nombre,apellido,congregacion,correo,direccion,est_civil,estatus, etnia, laico, nacionalidad, nivel_instruccion, pensum_id, religioso, sexo, tipo, tipo_sangre, fecha_nac, nacionalidad, carrera_id as carrera';
		$this->db->select( $campos );
		$this->db->from('usuario u');
		$this->db->join('estudiante_has_carrera e', 'u.ci = e.usuario_ci', 'left');
		$this->db->where('estatus', 'PREINSCRITO');
		$this->db->like('ci', $ci);
		$result = $this->db->get();
		return $result->result_array();
	}
}
