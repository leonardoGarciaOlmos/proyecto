<?php
class Semestre extends CI_Model
{
	function __construct()
	{
		parent::__construct();
	}


	public function insert($carrera, $pensum, $semestre, $iniSemestre, $finSemestre)
	{
		$data = array('carrera' => $carrera,
					  'pensum' => $pensum,
					  'semestre' => $semestre,
					  'ini_semestre' => $iniSemestre,
					  'fin_semestre' => $finSemestre);

		$statusInsert = $this->db->insert('pensum_estatus', $data);
		return $statusInsert;
	}


	public function delete($carrera, $pensum)
	{
		$this->db->where(array('carrera' => $carrera, 'pensum' => $pensum));
		$statusDelete = $this->db->delete('pensum_estatus');
		return $statusDelete;
	}


	public function get_periodo_semestres($pensum)
	{
		$query = $this->db->query('select PES.semestre, DATE_FORMAT(PES.ini_semestre, "%d/%m/%Y") as ini_semestre, DATE_FORMAT(PES.fin_semestre, "%d/%m/%Y") as fin_semestre, DATEDIFF(now(),PES.ini_semestre) as transcurrido, DATEDIFF(PES.fin_semestre,now()) as faltante, DATEDIFF(PES.fin_semestre, PES.ini_semestre) as total from pensum_estatus as PES where pensum ='.$pensum);
		return $query->result_array();
	}

}
?>