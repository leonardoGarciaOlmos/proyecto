<?php
class Grafica extends CI_Model
{
	function __construct()
	{
		parent::__construct();
	}

	public function all_alumno_carrera()
	{
		$this->db->select('count(USU.ci) as estudiante, CAR.nombre as carrera');
		$this->db->from('usuario as USU');
		$this->db->from('estudiante_has_carrera as EHC');
		$this->db->from('carrera as CAR');
		$this->db->where('USU.ci = EHC.usuario_ci');
		$this->db->where('EHC.carrera_id = CAR.id');
		$this->db->where('USU.tipo = 1');
		$this->db->where('USU.estatus = 3');
		$this->db->group_by('CAR.id');
		$query = $this->db->get();
		$array = $query->result_array();

		foreach ($array as $data) 
		{ $arrayReturn[] = [$data['carrera'], (int) $data['estudiante']]; }

		return $arrayReturn;
	}


	public function all_alumno_carrera_sexo()
	{
		$this->db->select('count(USU.ci) as estudiante, CAR.nombre as carrera, USU.sexo');
		$this->db->from('usuario as USU');
		$this->db->from('estudiante_has_carrera as UHC');
		$this->db->from('carrera as CAR');
		$this->db->where('USU.ci = UHC.usuario_ci');
		$this->db->where('UHC.carrera_id = CAR.id');
		$this->db->where('USU.tipo = 1');
		$this->db->where('USU.estatus = 3');
		$this->db->group_by('CAR.id');
		$this->db->group_by('USU.sexo');
		$this->db->order_by('CAR.id', 'asc');

		$query = $this->db->get();
		return $query->result_array();
	}


	public function all_alumno_nivel()
	{
		$this->db->select('USU.nivel_instruccion as nivel, count(USU.ci) as estudiante');
		$this->db->from('usuario as USU');
		$this->db->from('estudiante_has_carrera as UHC');
		$this->db->from('carrera as CAR');
		$this->db->where('USU.ci = UHC.usuario_ci');
		$this->db->where('UHC.carrera_id = CAR.id');
		$this->db->where('USU.tipo = 1');
		$this->db->where('USU.estatus = 3');
		$this->db->group_by('USU.nivel_instruccion');
		$query = $this->db->get();
		$array = $query->result_array();

		foreach ($array as $data) 
		{ $arrayReturn[] = [$data['nivel'], (int) $data['estudiante']]; }

		return $arrayReturn;
	}


	public function all_alumno_edad()
	{
		$query = $this->db->query("SELECT YEAR(CURDATE())-YEAR(USU.fecha_nac) + IF(DATE_FORMAT(CURDATE(), '%m-%d') > DATE_FORMAT(USU.fecha_nac, '%m-%d'), 0, -1) AS edad, count(USU.ci) as estudiante
								FROM (`usuario` as USU, 
								`estudiante_has_carrera` as UHC, 
								`carrera` as CAR) 
								WHERE `USU`.`ci` = UHC.usuario_ci 
								AND `UHC`.`carrera_id` = CAR.id 
								AND `USU`.`tipo` = 1 
								AND `USU`.`estatus` = 3 
								GROUP BY `edad`");
		
		$array = $query->result_array();

		foreach ($array as $data) 
		{ $arrayReturn[] = [$data['edad'], (int) $data['estudiante']]; }
		
		return $arrayReturn;
	}


	public function all_tipo_usuario_tipo()
	{
		$this->db->select('USU.tipo, count(USU.ci) as usuario');
		$this->db->from('usuario as USU');
		$this->db->where('USU.estatus = 3');
		$this->db->group_by('USU.tipo');
		$query = $this->db->get();
		$array = $query->result_array();

		foreach ($array as $data) 
		{ $arrayReturn[] = [$data['tipo'], (int) $data['usuario']]; }

		return $arrayReturn;
	} 
}
?>