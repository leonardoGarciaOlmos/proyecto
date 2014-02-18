<?php class Insc_mat extends CI_Model{

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
	

	function get_UserData($ci){
		$query = $this->db->query("SELECT u.ci, u.nombre, u.apellido, u.direccion, u.fecha_nac, u.correo, u.expediente, u.nivel_instruccion, c.nombre as carrera, d.nombre as departamento FROM usuario u, carrera c, departamento d, estudiante_has_carrera ec WHERE c.departamento_id = d.id
and c.id = ec.carrera_id and ec.usuario_ci = u.ci and u.ci = ".$ci." ");

		$data = $query->result_array();
		return $data;
	}

	function get_semestre($pensum){
		$query = $this->db->query("SELECT max(semestre) as semestre from materia_has_pensum mhp WHERE pensum_id = ".$pensum." ");

		$data = $query->result_array();
		return $data;
	}


}
?>