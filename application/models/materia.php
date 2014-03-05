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

	public function get_materia($materia)
	{
		$this->db->select('*');
		$this->db->where('codigo', $materia);
		$query = $this->db->get('materia');
		$data = $query->result_array();
		return $data;
	}

	public function get_estudiantes_materia($materia, $carrera)
	{
		$query = 'select USU.ci
				  from usuario as USU inner join pensum as PEN inner join horario as HOR inner join usuario_has_horario as UHH
				  on USU.pensum_id = PEN.id
				  and USU.pensum_id = HOR.materia_has_pensum_pensum_id
				  and USU.ci = UHH.usuario_ci
				  and UHH.horario_id = HOR.id
				  where USU.tipo = "ESTUDIANTE"
				  and PEN.carrera_id = '.$carrera.'
				  and HOR.materia_has_pensum_materia_codigo = "'.$materia.'"';

		$query = $this->db->query($query);
		$data = $query->result_array();
		return $data;
	}
}
?>