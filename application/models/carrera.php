<?php
class Carrera extends CI_Model
{
	/**
	*	
	* Las carrera por cada departamento	
	*
	* Consulta en la base de dato las carrera que
	* contiene un departamento en especifico 
	*
	* @param 	string id_departamento El identificador del departamento 
	* @return 	array carrera Las carrera del departamento
	*
	*/
	public function carrera_departamento($id_departamento)
	{
		$this->db->select(array('id', 'nombre'));
		$this->db->from('carrera');
		$this->db->where('departamento_id', $id_departamento);
		$query = $this->db->get();
		return $query->result_array();
	}


	/**
	*	
	* Informacion de carrera	
	*
	* Consulta en la base de dato una
	* carrera en especifico
	*
	* @param 	string id_carrera El identificador de la carrera 
	* @return 	array carrera Las carrera del departamento
	*
	*/
	public function one_carrera($id_carrera)
	{
		$this->db->select('*');
		$this->db->where('id', $id_carrera);
		$query = $this->db->get('carrera');
		return $query->result_array();
	}
}
?>