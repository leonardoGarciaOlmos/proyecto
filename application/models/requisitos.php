<?php

	/**
		@author Daniel Castillo
	*/
		
class requisitos extends CI_Model{

	public function __construct(){
		parent::__construct();
	}

	public function get_all(){		
		$sql = "SELECT * FROM sistemas.requisito where tipo = 'ESTUDIANTE' and requerido = 'S' and oculto = 'N' ;";
		$query = $this->db->query( $sql );
		$data = $query->result_array();
		return $data;
	}

}