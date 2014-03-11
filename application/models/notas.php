<?php
class Notas extends CI_Model
{

	public function get_notas()
	{
		$query = $this->db->query("SELECT u.ci, u.nombre, u.apellido, c.nombre as carrera, mhp.semestre, m.nombre as materia, en.total, en.estatus 
			FROM estudiante_nota en, materia m, usuario u, materia_has_pensum mhp, pensum p, carrera c
			WHERE en.usuario_ci = u.ci and m.codigo = en.materia_has_pensum_materia_codigo 
			and mhp.materia_codigo = m.codigo
			and p.id = mhp.pensum_id
			and p.carrera_id = c.id;");
		return $query->result_array();
	}


}
?>