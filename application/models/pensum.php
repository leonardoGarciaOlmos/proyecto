<?php
class Pensum extends CI_Model
{
	function __construct()
	{
		parent::__construct();
	}

	public function one_pensum($id_pensum)
	{
		$this->db->select('*');
		$this->db->where('id', $id_pensum);
		$query = $this->db->get('pensum');
		return $query->result_array();
	}

	public function insert_pensum_activate($id_carrera)
	{
		$data = array( 'estatus' => 'ACTIVO' ,
					   'carrera_id' => $id_carrera);

		$statusInsert = $this->db->insert('pensum', $data);
		return $statusInsert;
	}

	public function insert_pensum_pending($id_carrera)
	{
		$data = array( 'estatus' => 'PENDIENTE' ,
					   'carrera_id' => $id_carrera);

		$statusInsert = $this->db->insert('pensum', $data);
		return $statusInsert;
	}

	public function update_pensum($id_pensum, $data)
	{
		$this->db->where('id', $id_pensum);
		$statusUpload = $this->db->update('pensum', $data); 

		return $statusUpload;
	}

	public function delete_pensum($id_pensum)
	{
		$this->db->where('id', $id_pensum);
		$statusDelete = $this->db->delete('pensum'); 

		return $statusUpload;
	}

	public function carrera_pensum($id_carrera)
	{
		$this->db->select('*');
		$this->db->where('carrera_id', $id_carrera);
		$query = $this->db->get('pensum');
		return $query->result_array();
	}

	public function carrera_pensum_activate($id_carrera)
	{
		$this->db->select('*');
		$this->db->where('carrera_id', $id_carrera);
		$this->db->where('estatus', "ACTIVO");
		$query = $this->db->get('pensum');
		return $query->result_array();
	}

	public function materia_pensum($id_pensum)
	{
		$this->db->select('MAT.codigo, MAT.nombre, MHP.horas_teoricas, MHP.horas_practicas, MHP.total_horas, MHP.uni_credito, MHP.cod_prelacion, MHP.pensum_id, MHP.semestre');
		$this->db->from('materia_has_pensum as MHP, materia as MAT');
		$this->db->where('pensum_id', $id_pensum);
		$this->db->where('codigo = `materia_codigo`');
		$this->db->order_by("semestre", "asc");
		$query = $this->db->get();
		return $query->result_array();
	}

	public function last_pensum()
	{
		$query = $this->db->query('select * from `pensum` where `id` = (select MAX(`id`) from `pensum`)');
		return $query->result_array();
	}

	public function row_semestre_pensum($id_pensum)
	{
		$this->db->where('pensum_id = '. $id_pensum);
		$this->db->group_by("semestre");
		$query = $this->db->get("materia_has_pensum");
		$arrayRow = $query->result_array();
		$arrayRow = count($arrayRow);
		return $arrayRow;
	}

	public function add_materia_pensum($pensum, $semestre, $materia)
	{
		$data = array('materia_codigo' => $materia['codigo'], 'pensum_id' => $pensum, 'semestre' => $semestre, 
			'horas_teoricas' => $materia['horas_teoricas'], 'horas_practicas' => $materia['horas_practicas'], 
			'total_horas' => $materia['total_horas'], 'uni_credito' => $materia['uni_credito'], 'cod_prelacion' => $materia['cod_prelacion']);
		return $this->db->insert('materia_has_pensum',$data);
	}

	public function delete_materia_pensum($pensum_id, $materia_codigo)
    {
     	$array = array('pensum_id' => $pensum_id, 'materia_codigo' => $materia_codigo);
     	$this->db->where($array);
	 	return $this->db->delete('materia_has_pensum');
    }

}
?>