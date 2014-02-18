<?php
class Materia extends CI_Model
{
	function __construct()
	{
		parent::__construct();
	}

	public function autocomplete_materia()
	{
		$this->db->select('*, nombre as value, nombre as label');
		$this->db->from('materia');
		$query = $this->db->get();
		$result = array();
		if($query->num_rows() > 0)
		{
			foreach ($query->result() as $row)
			{ $result[]= $row; }
		}
		
		return $result;
	}
}
?>