<?php
	class Perfil_controller extends CI_Controller{
		function __construct()
		{
			// Llamando al contructor del Modelo
			parent::__construct();
			$this->load->model('perfil_model','perfil');
		}

		public function index($value='')
		{
			$this->all($value);

		}

		function all()
		{
			$output->js_files['hgjfjfjfyjgfyl'] = base_url().'assets/js/jquery-ui-1.10.3.custom.min.js';
			$output->js_files['hgjfjfjfyjgfyl2'] = base_url().'assets/js/perfilDocente.js';
			$output->js_files['hgjfjfjfyjgfyl32'] = base_url().'assets/js/chosen.jquery.min.js';
			$output->css_files['hgjfjfjfyjdsfyl'] = base_url().'assets/css/chosen.css';

			$carreras = $this->perfil->get_carreras();
			$this->smarty->assign('carreras',$carreras);
			$userData = $this->perfil->get_UserData("20748439");
			$this->smarty->assign('userData',$userData[0]);
			$this->smarty->assign('base_url',$this->config->item("base_url"));
			$vista = $this->smarty->fetch('perfil-docente.tpl');
			$this->smarty->assign('output',$vista);
			$this->smarty->assign('css_files',$output->css_files);
			$this->smarty->assign('js_files',$output->js_files);
			$this->smarty->display('index.tpl');
		}

		
		function Call_view_pensum(){
			$this->output->set_content_type('application/json')->set_output(json_encode($this->prof->view_pensum()));
		}

		function Call_get_materias(){
			$carrera = $this->input->post("carrera_id");
			$this->output->set_content_type('application/json')->set_output(json_encode($this->perfil->get_materias($carrera, "20748439")));
		}

		function Call_insert_materias(){
			$materias = $this->input->post("materias");
			$carrera = $this->input->post("carrera_id");
			$this->output->set_content_type('application/json')->set_output(json_encode($this->perfil->insert_materias($carrera,$materias,"20748439")));
		}

		function Call_get_materias_doc(){
			$carrera = $this->input->post("carrera_id");
			$this->output->set_content_type('application/json')->set_output(json_encode($this->perfil->get_materias_doc($carrera,"20748439")));
		}

		function Call_delete_materias(){
			$materias = $this->input->post("materias");
			$this->output->set_content_type('application/json')->set_output(json_encode($this->perfil->delete_materias($materias,"20748439")));
		}

}
?>