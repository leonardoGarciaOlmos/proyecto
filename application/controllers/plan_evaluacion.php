<?php
	class Plan_evaluacion_controller extends CI_Controller{
		function __construct()
		{
			// Llamando al contructor del Modelo
			parent::__construct();
			$this->load->model('plan_model','plan');
		}

		public function index($value='')
		{
			$this->all($value);

		}

		function all()
		{

		    $output->js_files['hgjfjfjfyjgfyl'] = base_url().'assets/js/plan_evaluacion.js';
		    $output->css_files['hgjfjfjfyjfyl'] = base_url().'assets/css/horario.css';


		    //$nombre = $this->session->userdata('DX_nombre')." ".$this->session->userdata('DX_apellido');

		    $carreras = $this->plan->get_carreras();
		    $this->smarty->assign('carreras',$carreras);
		    $this->smarty->assign('base_url',$this->config->item("base_url"));
		    $vista = $this->smarty->fetch('plan-evaluacion.tpl');
		    $this->smarty->assign('output',$vista);
		    $this->smarty->assign('css_files',$output->css_files);
		    $this->smarty->assign('js_files',$output->js_files);
		    $this->smarty->display('index.tpl');
		}

		function call_get_materias(){
			$carrera = $this->input->post("carrera_id");
			//$cedula = $this->session->userdata('DX_user_id');
			$this->output->set_content_type('application/json')->set_output(json_encode($this->plan->get_materias("20748439",$carrera)));
		}

		function call_save_plan(){
			$plan = $this->input->post("plan");
			$this->plan->save_plan($plan);
		}

		function call_get_plan(){
			$carrera_id = $this->input->post("carrera");
			$ci = $this->input->post("profesor");
			$materia = $this->input->post("materia");

			$this->output->set_content_type('application/json')->set_output(json_encode($this->plan->get_plan($carrera_id, $ci, $materia)));


		}

}
?>