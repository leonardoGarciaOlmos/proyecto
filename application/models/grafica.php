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
		$this->db->group_by('CAR.nombre');
		$query = $this->db->get();
		$array = $query->result_array();

		foreach ($array as $data) 
		{
			$arrayReturn[] = [$data['carrera'], (int) $data['estudiante']];
		}

		return $arrayReturn;
	} 
}
?>