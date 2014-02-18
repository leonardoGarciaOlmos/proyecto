<?php
class Seminario extends CI_Model
{
	function __construct()
	{
		parent::__construct();
	}

	public function all_seminario()
	{
		$this->db->select('*');
		$query = $this->db->get('seminario');
		return $query->result_array();
	}

	public function insert_seminario($materia, $seminario, $pensum)
	{
		$data = array( 'materia_codigo' => $materia,
					   'seminario_id' => $seminario,
					   'pensum_id' => $pensum);

		$statusInsert = $this->db->insert('materia_has_seminario', $data);
		return $statusInsert;
	}

	public function delete_seminario($materia, $seminario, $pensum)
	{
		$this->db->where('materia_codigo', $materia);
		$this->db->where('seminario_id', $seminario);
		$this->db->where('pensum_id', $pensum);
		$statusInsert = $this->db->delete('materia_has_seminario');
		return $statusInsert;
	}

	public function materia_seminario($id_pensum)
	{
		$this->db->select('MAT.codigo as materia_codigo, MAT.nombre as materia_nombre, SEM.id as seminario_id, SEM.nombre as seminario_nombre, MHS.pensum_id');
		$this->db->from('materia_has_seminario as MHS, materia as MAT, seminario as SEM');
		$this->db->where('MAT.codigo = MHS.materia_codigo');
		$this->db->where('SEM.id = MHS.seminario_id');
		$this->db->where('MHS.pensum_id', $id_pensum);
		$this->db->order_by("materia_codigo", "ASC"); 
		$query = $this->db->get();
		return $query->result_array();
	}

}
?>