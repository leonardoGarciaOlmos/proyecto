<?php
class Pensum extends CI_Model
{
	function __construct()
	{
		parent::__construct();
	}


	public function get_departamento()
	{
		$this->db->select(array('id', 'nombre'));
		$this->db->from('departamento');
		$query = $this->db->get();
		return $query->result_array();
	}

	public function get_departamento_pensum($id)
	{
		$this->db->select(array('DEP.id', 'DEP.nombre'));
		$this->db->from('pensum as PEN');
		$this->db->from('carrera as CAR');
		$this->db->from('departamento as DEP');
		$this->db->where('PEN.carrera_id = CAR.id');
		$this->db->where('CAR.departamento_id = DEP.id');
		$this->db->where('PEN.id', $id);
		$query = $this->db->get();
		return $query->result_array();
	}

	public function get_carrera($id_departamento)
	{
		$this->db->select(array('id', 'nombre'));
		$this->db->from('carrera');
		$this->db->where('departamento_id', $id_departamento);
		$query = $this->db->get();
		return $query->result_array();
	}

	public function get_carrera_pensum($id)
	{
		$this->db->select(array('CAR.id', 'CAR.nombre'));
		$this->db->from('pensum as PEN');
		$this->db->from('carrera as CAR');
		$this->db->where('PEN.carrera_id = CAR.id');
		$this->db->where('PEN.id', $id);
		$query = $this->db->get();
		return $query->result_array();
	}

	public function get_seminario()
	{
		$this->db->select(array('id', 'nombre'));
		$this->db->from('seminario');
		$query = $this->db->get();
		return $query->result_array();
	}

	public function get_mat_has_pen($pensum)
	{
		$this->db->select(array('id', 'nombre'));
		$this->db->from('list_mat_has_pensum');
		$this->db->where('pensum', $pensum);
		$query = $this->db->get();
		return $query->result_array();
	}

	public function get_semestre_has_pensum($pensum)
	{
		$this->db->select('*');
		$this->db->from('materia_has_pensum');
		$this->db->where('pensum_id', $pensum);
		$this->db->group_by('semestre asc');
		$query = $this->db->get();
		return $query->result_array();
	}

	public function get_materia_has_semestre($pensum)
	{
		$this->db->select('MAT.*, MHP.semestre');
		$this->db->from('materia as MAT');
		$this->db->from('materia_has_pensum as MHP');
		$this->db->where('MHP.pensum_id', $pensum);
		$this->db->where('MHP.materia_codigo = MAT.codigo');
		$query = $this->db->get();
		return $query->result_array();
	}

	public function get_materia_has_seminario($pensum)
	{
		$this->db->select('MAT.codigo, MAT.nombre');
		$this->db->from('materia_has_seminario as MHS');
		$this->db->from('materia as MAT');
		$this->db->where('MHS.pensum_id', $pensum);
		$this->db->where('MAT.codigo = MHS.materia_codigo');
		$this->db->group_by('MHS.materia_codigo');
		$query = $this->db->get();
		return $query->result_array();
	}

	public function get_seminario_has_pensum($pensum)
	{
		$this->db->select('SEM.id, SEM.nombre, MHS.materia_codigo');
		$this->db->from('materia_has_seminario as MHS');
		$this->db->from('seminario as SEM');
		$this->db->where('MHS.pensum_id', $pensum);
		$this->db->where('SEM.id = MHS.seminario_id');
		$query = $this->db->get();
		return $query->result_array();
	}

	public function insert_pensum($id_carrera)
	{
		$data = array( 'estatus' => 'ACTIVO' ,
					   'carrera_id' => $id_carrera);

		$statusInsert = $this->db->insert('pensum', $data);
		return $statusInsert;
	}

	public function get_last_pensum()
	{
		$this->db->select_max('id');
		$query = $this->db->get('pensum');
		return $query->result_array();
	}

	public function get_pensum($id)
	{
		$this->db->from('pensum');
		$this->db->where('id', $id);
		$query = $this->db->get();
		return $query->result_array();
	}

	public function update_pensum($id, $arrayUpdate)
	{
		$this->db->where('id', $id);
		$statusUpdate = $this->db->update('pensum', $arrayUpdate);
		return $statusUpdate; 
	}

	public function consultar_mat_a()
	{
		$this->db->select('*, nombre as value, nombre as label');
		$this->db->from('materia');
		$query = $this->db->get();
		$result = array();
		if($query->num_rows() > 0)
		{
			foreach ($query->result() as $row)
			{
				$result[]= $row;
			}
		}
		return $result;
	}

	public function insertar_semestre($pensum_id, $materia_codigo, $semestre)
    {	
    	$data = array('materia_codigo' => $materia_codigo, 'pensum_id' => $pensum_id, 'semestre' => $semestre);
    	return $this->db->insert('materia_has_pensum',$data);
    }

    public function eliminar_semestre($pensum_id, $materia_codigo)
    {
    	$array = array('pensum_id' => $pensum_id, 'materia_codigo' => $materia_codigo);
    	$this->db->where($array);
		return $this->db->delete('materia_has_pensum');
    }

    public function insertar_seminario($materia_codigo, $seminario_id, $pensum_id)
    {
    	$data = array('materia_codigo' => $materia_codigo, 'seminario_id' => $seminario_id, 'pensum_id' => $pensum_id);
    	return $this->db->insert('materia_has_seminario',$data);
    }

    public function eliminar_seminario($seminario_id, $pensum_id, $materia_codigo)
    {
    	$array = array('seminario_id' => $seminario_id, 'pensum_id' => $pensum_id, 'materia_codigo' => $materia_codigo);
    	$this->db->where($array);
		return $this->db->delete('materia_has_seminario');
    }

}
?>