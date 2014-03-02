<?php

class Users extends CI_Model 
{
	function __construct()
	{
		parent::__construct();

		// Other stuff
		$this->_prefix = $this->config->item('DX_table_prefix');
		$this->_table = $this->_prefix.$this->config->item('DX_users_table');	
		$this->_roles_table = $this->_prefix.$this->config->item('DX_roles_table');
	}
	
	// General function
	
	function get_all($offset = 0, $row_count = 0)
	{
		$users_table = $this->_table;
		$roles_table = $this->_roles_table;
		
		if ($offset >= 0 AND $row_count > 0)
		{
			$this->db->select("$users_table.*", FALSE);
			$this->db->select("$roles_table.name AS role_name", FALSE);
			$this->db->join($roles_table, "$roles_table.id = $users_table.role_id");
			$this->db->order_by("$users_table.id", "ASC");
			
			$query = $this->db->get($this->_table, $row_count, $offset); 
		}
		else
		{
			$query = $this->db->get($this->_table);
		}
		
		return $query;
	}

	function get_all_rol($rol = 0, $offset = 0, $row_count = 0)
	{
		$users_table = $this->_table;
		$roles_table = $this->_roles_table;
		
		if ($offset >= 0 AND $row_count > 0)
		{
			$this->db->select("$users_table.*", FALSE);
			$this->db->select("$roles_table.name AS role_name", FALSE);
			$this->db->join($roles_table, "$roles_table.id = $users_table.role_id");
			$this->db->where("$roles_table.id", $rol);
			$this->db->order_by("$users_table.id", "ASC");
			
			$query = $this->db->get($this->_table, $row_count, $offset); 
		}
		else
		{
			$query = $this->db->get($this->_table);
		}
		
		return $query;
	}	

	function get_user_by_id($user_id)
	{
		$this->db->select('*, ci as id ');
		$this->db->where('ci', $user_id);
		return $this->db->get($this->_table);
	}

	function get_user_by_username($username)
	{
		$this->db->select('*, ci as id ');
		$this->db->where('nombre', $username);
		return $this->db->get($this->_table);
	}
	
	function get_user_by_email($email)
	{
		$this->db->select('*, ci as id ');
		$this->db->where('correo', $email);
		return $this->db->get($this->_table);
	}
	
	function get_login($login)
	{
		$this->db->select('*, ci as id ');
		$this->db->where('nombre', $login);
		$this->db->or_where('correo', $login);
		return $this->db->get($this->_table);
	}
	
	function check_ban($user_id)
	{
		$this->db->select('1', FALSE);
		$this->db->where('ci', $user_id);
		$this->db->where('banned', '1');
		return $this->db->get($this->_table);
	}
	
	function check_username($username)
	{
		$this->db->select('1', FALSE);
		$this->db->where('LOWER(nombre)=', strtolower($username));
		return $this->db->get($this->_table);
	}

	function check_email($email)
	{
		$this->db->select('1', FALSE);
		$this->db->where('LOWER(correo)=', strtolower($email));
		return $this->db->get($this->_table);
	}
		
	function ban_user($user_id, $reason = NULL)
	{
		$data = array(
			'banned' 			=> 1,
			'ban_reason' 	=> $reason
		);
		return $this->set_user($user_id, $data);
	}
	
	function unban_user($user_id)
	{
		$data = array(
			'banned' 			=> 0,
			'ban_reason' 	=> NULL
		);
		return $this->set_user($user_id, $data);
	}
		
	function set_role($user_id, $role_id)
	{
		$data = array(
			'role_id' => $role_id
		);
		return $this->set_user($user_id, $data);
	}

	// User table function

	function create_user($data)
	{
		$data['created'] = date('Y-m-d H:i:s', time());
		return $this->db->insert($this->_table, $data);
	}

	function get_user_field($user_id, $fields)
	{
		$this->db->select($fields);
		$this->db->where('ci', $user_id);
		return $this->db->get($this->_table);
	}

	function set_user($user_id, $data)
	{
		$this->db->where('ci', $user_id);
		return $this->db->update($this->_table, $data);
	}
	
	function delete_user($user_id)
	{
		$this->db->where('ci', $user_id);
		$this->db->delete($this->_table);
		return $this->db->affected_rows() > 0;
	}
	
	// Forgot password function

	function newpass($user_id, $pass, $key)
	{
		$data = array(
			'newpass' 			=> $pass,
			'newpass_key' 	=> $key,
			'newpass_time' 	=> date('Y-m-d h:i:s', time() + $this->config->item('DX_forgot_password_expire'))
		);
		return $this->set_user($user_id, $data);
	}

	function activate_newpass($ci, $key)
	{
		$this->db->set('clave', 'newpass', FALSE);
		$this->db->set('newpass', NULL);
		$this->db->set('newpass_key', NULL);
		$this->db->set('newpass_time', NULL);
		$this->db->where('ci', $ci);
		$this->db->where('newpass_key', $key);
		
		return $this->db->update($this->_table);
	}

	function clear_newpass($user_id)
	{
		$data = array(
			'newpass' 			=> NULL,
			'newpass_key' 	=> NULL,
			'newpass_time' 	=> NULL
		);
		return $this->set_user($user_id, $data);
	}
	
	// Change password function

	function change_password($user_id, $new_pass)
	{
		$this->db->set('clave', $new_pass);
		$this->db->where('ci', $user_id);
		return $this->db->update($this->_table);
	}

/*		public function cargar_profesor(){	
			$this->db->select('id,name, last_name');
			$this->db->from('users');
			$this->db->where('role_id = 3');
			$query = $this->db->get();
			$profesor[0]= '';
			foreach ($query->result() as $row) {
				$profesor[$row->id] = $row->name;
			}
			//die(var_dump($profesor));
			return $profesor;
		}*/


	
}

?>