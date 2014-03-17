<?php class docente extends CI_Model{

	var $carrera;  
	var $pensum; 
	var $semestre;   

	function __construct()
	{
		// Llamando al contructor del Modelo
		parent::__construct();
		$this->carrera = $this->session->userdata('carrera');
		$this->pensum = $this->session->userdata('pensum');
		$this->semestre = $this->session->userdata('semestre');
	}
	

	function get_materias()
	{
		$query = $this->db->query('SELECT m.codigo as id, m.nombre as materia, "0" as seminario from materia m, materia_has_pensum mhp, pensum p, carrera c where c.id="'.$this->carrera.'" and p.carrera_id="'.$this->carrera.'" and mhp.semestre="'.$this->semestre.'" and mhp.pensum_id=p.id and p.carrera_id=c.id and m.codigo=mhp.materia_codigo and p.id='.$this->pensum.'');

		return array('data'=>$query->result());
	}

	function get_pensum($carrera){
		$query = $this->db->query('SELECT id from pensum where carrera_id ='.$carrera.' and estatus="ACTIVO"');
		$query = $query->result_array();
		return $query[0]['id'];
	}

	function get_horario(){
		$query = $this->db->query('SELECT * from view_horario where pensum ="'.$this->pensum.'" and semestre="'.$this->semestre.'"');

		return $query->result();
	}

	function get_profesor_full(){
		$get_prof = $this->db->query('SELECT DISTINCT u.ci, u.nombre, u.apellido from usuario u, docente_has_materia dhm, materia_has_pensum mhp where u.tipo=2 and dhm.usuario_ci = u.ci and mhp.materia_codigo = dhm.materia_codigo and mhp.semestre="'.$this->semestre.'" and mhp.pensum_id ="'.$this->pensum.'"');

		$result = array('data'=>array());
		foreach ($get_prof->result() as $row) {

			$get_mat = $this->db->query('SELECT dhm.materia_codigo as id, "0" as seminario from usuario u, docente_has_materia dhm, materia_has_pensum mhp, carrera c, pensum p where u.ci = dhm.usuario_ci and u.tipo=2 and mhp.pensum_id = p.id and mhp.materia_codigo = dhm.materia_codigo and p.carrera_id = c.id and c.id='.$this->carrera.' and mhp.semestre='.$this->semestre.' and u.ci="'.$row->ci.'"');
			$mat = $get_mat->result_array();

			$get_hour = $this->db->query('SELECT CONCAT(TIME_FORMAT(hora_inicio,"%h:%i %p"), " - ", TIME_FORMAT(hora_final,"%h:%i %p")) as hora, dia from view_horario where ci="'.$row->ci.'"');
			$ocup = $get_hour->result_array();

			$prof =array(
				'id'=>$row->ci,
				'nombre'=>$row->nombre." ".$row->apellido,
				'materia'=>$mat,
				//'hora'=>date("H:i:s",strtotime('08:00 PM')),
				'ocupado'=>$ocup
				);

			array_push($result['data'],$prof);

		}	


		return $result;

	}

	function get_horas(){
		$query = $this->db->query('SELECT DISTINCT TIME_FORMAT(hora_inicio,"%h:%i %p") as hora_inicio, TIME_FORMAT(hora_final,"%h:%i %p") as hora_final from bloque_hora');

		return $query->result_array();
	}

	function get_dias($hora){
		$hora = date('H:i:s',strtotime($hora));
		$query = $this->db->query('SELECT id, dia, TIME_FORMAT(hora_inicio,"%h:%i %p") as hora_inicio, TIME_FORMAT(hora_final,"%h:%i %p") as hora_final from bloque_hora where hora_inicio = "'.$hora.'"');

		return $query->result_array();
	}

	function insert_horario($data){
		var_dump($data[0]);
		$query = $this->db->query('SELECT DISTINCT horario_id from view_horario where pensum = "'.$this->pensum.'" and semestre = "'.$this->semestre.'"');
		$result = $query->result_array();

		if(isset($result[0])){
			print_r("se ejecuto");
			//$num = $result[0]["horario_id"];
			foreach ($result as $key => $value) {
				$this->db->query('DELETE FROM bloque_hora_has_horario where horario_id = "'.$value['horario_id'].'"');
				# code...
			}
		}

		foreach ($data as $key => $value) {

			foreach ($value['materia'] as $key2 => $value2) {
				if(isset($value2['bloque'])){
					$query = $this->db->query('SELECT id from horario where materia_has_pensum_materia_codigo = "'.$value2['id'].'" and materia_has_pensum_pensum_id = "'.$this->pensum.'"');
					if($query->result() == null){
						if($value2["seminario"] != "vacio"){
							$this->db->query('INSERT INTO horario values("","'.$value2['id'].'","'.$this->pensum.'", '.$value2['seminario'].')');
						}else{
							$this->db->query('INSERT INTO horario values("","'.$value2['id'].'","'.$this->pensum.'", "")');
						}
						$query = $this->db->query('SELECT MAX(id) as id from horario');
						$id = $query->result_array();
						$id = $id['0']['id'];

						$query = $this->db->query('SELECT usuario_ci as ci, horario_id as id from usuario_has_horario where usuario_ci = "'.$value['id'].'" and horario_id = "'.$id.'"');
						if($query->result() == null){
							$this->db->query('INSERT INTO usuario_has_horario values("'.$value['id'].'","'.$id.'")');
						}
					}else{
						$result = $query->result_array();
						$id = $result['0']['id'];

						if($value2["seminario"] != "vacio"){
							$query = $this->db->query('UPDATE horario SET seminario_id = '.$value2['seminario'].' WHERE id = '.$id.' ');	
						}	
						

						$query = $this->db->query('SELECT usuario_ci as ci, horario_id as id from usuario_has_horario where usuario_ci = "'.$value['id'].'" and horario_id = "'.$id.'"');
						if($query->result() == null){
							$this->db->query('INSERT INTO usuario_has_horario values("'.$value['id'].'","'.$id.'")');
						}

					}
					foreach ($value2['bloque'] as $key3 => $value3) {
						$this->db->query('INSERT INTO bloque_hora_has_horario values("'.$value3.'","'.$id.'")');
					}
					
				}
			}
		}

	}

	function get_carreras(){

		$query = $this->db->query('SELECT c.id, c.nombre, p.id as pensum_id FROM carrera c, pensum p where p.carrera_id= c.id and p.estatus= "ACTIVO"');
		$data = $query->result_array();

		return $data;
	}

	function get_semestre($pensum_id){
		$query = $this->db->query('SELECT DISTINCT semestre FROM materia_has_pensum mhp where mhp.pensum_id="'.$pensum_id.'" order by semestre');
		$data = $query->result_array();

		return $data;

	}
	
	function verify_horario($pensum_id, $semestre){
		$query = $this->db->query('SELECT DISTINCT semestre FROM view_horario vh where vh.pensum="'.$pensum_id.'" and vh.semestre= "'.$semestre.'"');
		$data = $query->result_array();

		return $data;
	}

	function view_pensum(){
		$query = $this->db->query("SELECT * FROM view_pensum");
		$data = $query->result_array();

		return $data;

	}

	public function getEstudiantes( $horario_id, $usuario_ci ){
		$query = "SELECT u.ci, concat(nombre,' ',apellido) as nombre 
					FROM sistemas.usuario_has_horario uh join
					sistemas.usuario u on uh.usuario_ci=u.ci
					where horario_id=? and usuario_ci!=? and tipo='ESTUDIANTE';";
		$query = $this->db->query($query, array($horario_id,$usuario_ci));
		$data = $query->result_array();
		return $data;
	}

	/*public function getPlanEvaluacion( $id_plan ){
		$query = "SELECT *
					 FROM sistemas.plan_evaluacion pe inner join sistemas.evaluacion e 
						on e.plan_evaluacion_id=pe.id
						and pe.id = ? ";

		$query = $this->db->query($query, array($ci, $carrera_id, $materia));
		$data = $query->result_array();
		return $data;
	}*/


	public function getPlanEvaluacion( $id_plan )
	{
		$this->db->select('*');
		$this->db->where('id', $id_plan);
		$query = $this->db->get('plan_evaluacion');
		$data = $query->result_array();
		return $data;
	}

	public function getEvaluacionPlanEva($id_plan)
	{
		$query = 'select EVA.*
				  from plan_evaluacion as PEV
				  inner join evaluacion as EVA
				  on PEV.id = EVA.plan_evaluacion_id
				  where PEV.id = '. $id_plan;

		$query = $this->db->query($query);
		$data = $query->result_array();
		return $data;
	}

	public function getNotasPlanEva($id_plan)
	{
		$query = 'select Concat(USU.nombre, " ", USU.apellido) as nombre_estudiante, NDE.*
				  from plan_evaluacion as PEV
				  inner join notas_detallada as NDE
				  inner join usuario as USU
				  on PEV.id = NDE.plan_evaluacion_id
				  and NDE.Estudiante = USU.ci
				  where PEV.id = '.$id_plan;

		$query = $this->db->query($query);
		$data = $query->result_array();
		return $data;
	}

	public function insertEstPlan($arrayData)
	{
		$statusInsert = $this->db->insert('notas_detallada', $arrayData);
		return $statusInsert;
	}

	public function updateEstPlan($arrayData, $estudiante, $id_plan)
	{
		$this->db->where('Estudiante', $estudiante);
		$this->db->where('plan_evaluacion_id', $id_plan);
		$statusUpdate = $this->db->update('notas_detallada', $arrayData);
		return $statusUpdate;
	}

	function consulta_horario_user($ci){
		$query = $this->db->query("SELECT * FROM view_horario h, usuario_has_horario uhh WHERE uhh.horario_id = h.horario_id and uhh.usuario_ci = ".$ci." ");
		$data = $query->result_array();
		return $data;
	
	}

	function verificar_seminario($materia){
		$query = $this->db->query("SELECT s.id, s.nombre FROM materia_has_seminario mhs, seminario s WHERE materia_codigo = '".$materia."' and mhs.seminario_id = s.id ");
		return $query->result_array();
	}

	function horario_seminario($materia){
		$query = $this->db->query("SELECT * FROM horario WHERE materia_has_pensum_materia_codigo = '".$materia."' ");
		return $query->result_array();
	}

}
?>