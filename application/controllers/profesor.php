<?php
class Profesor_Controller extends CI_Controller{

	function __construct()
	{
		parent::__construct();
		//$this->load->model('auditor');
		//$this->dx_auth->check_uri_permissions();
	} 

	public function index( $value = '' )
	{
		//$this->notas($value);
	}

	public function notas($value='')
	{

		$output->js_files['hgjfjfjfyjgfyl'] = base_url().'assets/js/usuario/notasprof.js';
		$output->js_files['hgjfjfjfyjggfyl'] = base_url().'assets/js/numeric.js';
		$output->css_files['hgjfjfjfyjgfyl2'] = base_url().'assets/css/notasProf.css';



		$alumnos = $this->getNotas(12,'20748439');
		$planEvaluacion = $this->getPlanEvaluacion( '20748439', 2, 2 );

		$encodePE =json_encode( $planEvaluacion );

		$this->smarty->assign('encodePE',$encodePE);
		$this->smarty->assign('alumnos',$alumnos);
		$this->smarty->assign('planEvaluacion',$planEvaluacion);
		$this->smarty->assign('base_url',$this->config->item("base_url"));
		$vista = $this->smarty->fetch('usuario/chargeEvaluation.tpl');
		$this->smarty->assign('output',$vista);
		$this->smarty->assign('css_files',$output->css_files);
		$this->smarty->assign('js_files',$output->js_files);
		$this->smarty->display('index.tpl');
	}

	private function getNotas( $horario_id, $usuario_ci )
	{
		$this->load->model('docente');
		$estudiantes = $this->docente->getEstudiantes( $horario_id, $usuario_ci );
		if($estudiantes){
			return $estudiantes;
		}else{
			return false;
		}
	}

	private function getPlanEvaluacion( $ci, $carrera_id, $materia )
	{
		$this->load->model('docente');
		$planEvaluacion = $this->docente->getPlanEvaluacion( $ci, $carrera_id, $materia );
		if($planEvaluacion){
			return $planEvaluacion;
		}else{
			return false;
		}
	}

}