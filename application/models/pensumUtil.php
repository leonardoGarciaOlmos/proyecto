<?php
class PensumUtil extends CI_Model
{
	function __construct()
	{
		parent::__construct();
	}

	public function getActiveByCarrera( $id_carrera )
	{
		$query = "SELECT * FROM sistemas.pensum where estatus = 'ACTIVO' and carrera_id = ?;";
		$result = $this->db->query( $query, $id_carrera);
		return $result->result_array()[0];
	}

}
