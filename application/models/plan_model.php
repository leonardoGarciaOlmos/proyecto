<?php class plan_model extends CI_Model{

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
	

	function get_materias($ci, $carrera_id)
	{
		$query = $this->db->query('SELECT m.codigo, m.nombre FROM docente_has_materia dhm, carrera c, pensum p, materia m, materia_has_pensum mhp where m.codigo = dhm.materia_codigo and c.id = dhm.carrera_id and p.carrera_id = c.id and mhp.materia_codigo = m.codigo and mhp.pensum_id = p.id and dhm.usuario_ci = '.$ci.' and c.id ="'.$carrera_id.'"');

		return $query->result_array();
	}

	function get_carreras(){
		$query = $this->db->query('SELECT id, nombre FROM carrera');

		return $query->result_array();
	}

	function get_plan($carrera_id, $ci, $materia){
		$query = $this->db->query('SELECT * FROM plan_evaluacion WHERE carrera_id = '.$carrera_id.' and profesor = '.$ci.' and materia = "'.$materia.'" ');

		$result = $query->result_array();

		if(isset($result[0]["id"])){
			$query = $this->db->query('SELECT porcentaje, descripcion FROM evaluacion WHERE plan_evaluacion_id = '.$result[0]["id"].'');
			
			return $query->result_array();
		}
	}

	function save_plan($plan){

		$query = $this->db->query('SELECT * FROM plan_evaluacion WHERE carrera_id = '.$plan["carrera_id"].' and profesor = '.$plan["profesor"].' and materia = "'.$plan["materia"].'" ');

		$result = $query->result_array();

		if(isset($result[0]["id"])){
			$query = $this->db->query('DELETE FROM evaluacion WHERE plan_evaluacion_id = '.$result[0]["id"].' ');
		}else{
			$query = $this->db->query('INSERT INTO plan_evaluacion values("",'.$plan["carrera_id"].','.$plan["profesor"].',"'.$plan["materia"].'")');

			$query = $this->db->query('SELECT MAX(id) as id FROM plan_evaluacion');
			$result = $query->result_array();
		}

		foreach ($plan["evaluaciones"] as $key => $value) {
			$query = $this->db->query('INSERT INTO evaluacion values("",'.$value["num_eval"].',"'.$value["nom_eval"].'",'.$result[0]["id"].')');
		}

	}



}
?>