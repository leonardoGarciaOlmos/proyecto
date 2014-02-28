<?php class Insc_mat extends CI_Model{

	public $carrera;  
	public $pensum; 
	public $semestre;   

	function __construct()
	{
		// Llamando al contructor del Modelo
		parent::__construct();
		$this->carrera = $this->session->userdata('carrera');
		$this->pensum = $this->session->userdata('pensum');
		$this->semestre = $this->session->userdata('semestre');
	}
	

	function get_UserData($ci){
		$query = $this->db->query("SELECT u.ci, u.nombre, u.apellido, u.direccion, u.fecha_nac, u.correo, u.expediente, u.nivel_instruccion, c.nombre as carrera, d.nombre as departamento, c.id as carrera_id, u.pensum_id FROM usuario u, carrera c, departamento d, estudiante_has_carrera ec WHERE c.departamento_id = d.id
and c.id = ec.carrera_id and ec.usuario_ci = u.ci and u.ci = ".$ci." ");

		$data = $query->result_array();
		return $data;
	}

	function get_semestre($ci){
		$query = $this->db->query("SELECT semestre FROM estudiante_has_carrera where usuario_ci = ".$ci." ");

		$data = $query->result_array();
		return $data[0];
	}

	function get_status_mat($ci){
		$query = $this->db->query("SELECT estatus, count(estatus) as num FROM estudiante_nota WHERE usuario_ci = ".$ci." GROUP BY estatus");

		$data = $query->result_array();
		$status = array();
		foreach ($data as $key => $value) {
			$status[$value["estatus"]]=$value["num"];
		}
		return $status;
	}

	function get_sem($carrera_id){
		$query = $this->db->query("SELECT semestre, pensum FROM pensum_estatus WHERE carrera = ".$carrera_id." ");
		$data = $query->result_array();

		$this->pensum = $data[0]["pensum"];

		if($data[0]["semestre"] % 2 == 0){
			$query = $this->db->query("SELECT semestre FROM list_mat_has_pensum WHERE mod(semestre,2) = 0 AND pensum = ".$this->pensum."  GROUP BY semestre");
		}else{
			$query = $this->db->query("SELECT semestre FROM list_mat_has_pensum WHERE mod(semestre,2) <> 0 AND pensum = ".$this->pensum." GROUP BY semestre");
		}
		$data = $query->result_array();
		return $data;

	}

	function get_materias($semestre, $carrera_id, $ci){
		$query = $this->db->query("SELECT semestre, pensum FROM pensum_estatus WHERE carrera = ".$carrera_id." ");
		$data = $query->result_array();

		$this->pensum = $data[0]["pensum"];

		$query = $this->db->query("select * from (select MAT.*, MHP.semestre
									from materia_has_pensum as MHP inner join materia as MAT
									on MHP.materia_codigo = MAT.codigo
									where MHP.pensum_id = ".$this->pensum."
									and MHP.materia_codigo not in(select MHP.materia_codigo 'codigo'
									from estudiante_nota as ESN inner join materia_has_pensum as MHP
									on ESN.materia_has_pensum_materia_codigo = MHP.cod_prelacion
									where MHP.pensum_id = ".$this->pensum."
									and ESN.usuario_ci = ".$ci."
									union all
									select ESN.materia_has_pensum_materia_codigo 'codigo'
									from estudiante_nota as ESN
									where ESN.usuario_ci = ".$ci."
									and ESN.estatus = 'APROBADA')) as x where semestre = ".$semestre.";");
		$data = $query->result_array();
		return $data;
	}

	function get_horario_estu($pensum, $semestre, $materia){
		$query = $this->db->query('SELECT * from view_horario where pensum ="'.$pensum.'" and semestre="'.$semestre.'" and materia_codigo = "'.$materia.'" ');
		return $query->result();
	}

	function inscribir($bloque, $pensum, $ci){
		foreach ($bloque as $key => $value) {
			$query = $this->db->query('SELECT horario_id FROM sistemas.view_horario where pensum = '.$pensum.' and materia_codigo="'.$value["mat"].'" and bloque='.$value["bloque"].' ');
			$result = $query->result_array();
			
			$query = $this->db->query('INSERT INTO usuario_has_horario values('.$ci.', '.$result[0]["horario_id"].')');
		}
	}

	function get_horas($pensum, $semestre, $materia){
		$query = $this->db->query('SELECT * from dia, hora_inicio, hora_final where pensum ="'.$pensum.'" and semestre="'.$semestre.'" and materia_codigo = "'.$materia.'" ');
		return $query->result();
	}


}
?>