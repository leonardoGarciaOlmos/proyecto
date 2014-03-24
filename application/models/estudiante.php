<?php
class Estudiante extends CI_Model
{


	public function get_estudiante_carrera($estudiante)
	{
		$this->db->select('CAR.*');
		$this->db->from('estudiante_has_carrera as EHC');
		$this->db->join('carrera as CAR', 'EHC.carrera_id = CAR.id');
		$this->db->where('usuario_ci = "'.$estudiante.'"');

		$query = $this->db->get();
		return $query->result_array();
	}


	public function get_estudiante($estudiante)
	{
		$this->db->select('*');
		$this->db->from('usuario');
		$this->db->where('ci = "'.$estudiante.'"');
		$this->db->where('tipo = "ESTUDIANTE"'); 

		$query = $this->db->get();
		return $query->result_array();
	}


	public function get_estudiante_semestre($estudiante)
	{
		$this->db->select('*');
		$this->db->from('estudiante_has_carrera');
		$this->db->where('usuario_ci = "'.$estudiante.'"');

		$query = $this->db->get();
		return $query->result_array();
	}


	public function get_estudiante_notas_totales($estudiante)
	{
		$query = $this->db->query('select MHP.materia_codigo, MAT.nombre, MHP.semestre, IF(ENO.total is null,0,ENO.total) as total, IF(ENO.estatus is null,"SIN CURSAR",ENO.estatus) as estatus
			  					   from usuario as USU,
								   materia as MAT,
								   materia_has_pensum as MHP
								   left join estudiante_nota as ENO
								   on ENO.materia_has_pensum_pensum_id = MHP.pensum_id
								   and ENO.materia_has_pensum_materia_codigo = MHP.materia_codigo
								   where USU.ci = "'.$estudiante.'"
								   and MHP.pensum_id = USU.pensum_id
								   and MAT.codigo = MHP.materia_codigo
								   order by MHP.semestre ASC');

		return $query->result_array();
	}

	public function get_estudiante_carrera_report(){
		$query = $this->db->query('SELECT u.ci, u.nombre, u.apellido, u.est_civil, u.sexo, u.nivel_instruccion, u.direccion, c.nombre as carrera from estudiante_has_carrera ehs, usuario u, carrera c where u.ci=ehs.usuario_ci and c.id = ehs.carrera_id ');
		return $query->result_array();
	}

}
?>