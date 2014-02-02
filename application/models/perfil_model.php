<?php class perfil_model extends CI_Model{
	/**
		@author Lenin Luque
	*/
	var $carrera;  
	var $pensum; 
	var $semestre;   

	function __construct()
	{
		// Llamando al contructor del Modelo
		parent::__construct();
		$this->carrera = $this->session->userdata('carrera');
		$this->pensum = $this->session->userdata('pensum');
		$this->semestre = $this->session->userdata('semestre');
	}

	function view_pensum(){
		$query = $this->db->query("SELECT * FROM view_pensum");
		$data = $query->result_array();

		return $data;

	}

	function get_UserData($ci){
		$query = $this->db->query("SELECT * FROM usuario WHERE ci = ".$ci.";");
		$data = $query->result_array();

		return $data;

	}

	function get_pensum(){
		$query = $this->db->query("SELECT * FROM list_pensum WHERE estatus = 'ACTIVO'");
		$data = $query->result_array();

		return $data;
	}

	function get_semestres($pensum_id){
		$query = $this->db->query("SELECT Distinct semestre FROM sistemas.materia_has_pensum WHERE pensum_id=".$pensum_id.";");
		$data = $query->result_array();

		return $data;
	}

	function get_materias($carrera, $ci){
		$query = $this->db->query("SELECT id FROM pensum WHERE carrera_id=".$carrera.";");
		$result = $query->result_array();

		$query = $this->db->query("SELECT a.codigo, a.nombre FROM materia a, materia_has_pensum m where a.codigo = m.materia_codigo and m.pensum_id = ".$result[0]["id"]." and NOT exists(SELECT b.materia_codigo FROM docente_has_materia b WHERE a.codigo = b.materia_codigo and b.usuario_ci = ".$ci.")");
		$data = $query->result_array();

		return $data;
	}

	function insert_materias($carrera, $materias, $ci){
		foreach ($materias as $key => $value) {
			$query = $this->db->query("INSERT INTO docente_has_materia values (".$ci.",'".$value."',".$carrera.",'');");
		}

	}

	function get_materias_doc($carrera_id, $ci){
		$query = $this->db->query("SELECT m.codigo, m.nombre FROM docente_has_materia d, materia m where d.usuario_ci = ".$ci." and m.codigo = d.materia_codigo and d.carrera_id = ".$carrera_id."");
		$data = $query->result_array();
		return $data;
	}

	function delete_materias($materias){
		foreach ($materias as $key => $value) {
			$query = $this->db->query("DELETE FROM docente_has_materia WHERE materia_codigo = '".$value."';");
		}
	}

	function get_carreras(){
		$query = $this->db->query('SELECT id, nombre FROM carrera');

		return $query->result_array();
	}
}
?>