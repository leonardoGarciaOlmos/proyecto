<?php
	class Perfil_controller extends CI_Controller{
		function __construct()
		{
			// Llamando al contructor del Modelo
			parent::__construct();
			$this->dx_auth->need_login();
			$this->load->model('perfil_model','perfil');
		}

		public function index($value='')
		{
			$this->profile($value);

		}

		public function profile($value='')
		{
			$this->load->model('estudiante');
			$carrera = $this->estudiante->get_estudiante_carrera($this->dx_auth->userData('user_id'))[0];
			$semestre = $this->estudiante->get_estudiante_semestre($this->dx_auth->userData('user_id'))[0]['semestre'];

			$output->js_files['jdjdjdjdd']= base_url().'assets/js/bootbox.min.js';
			$js_files['dfsdf'] = base_url().'assets/js/usuario/profile.js';
			$data['ci'] = $this->dx_auth->userData('user_id');
			$data['nombre'] = $this->dx_auth->userData('nombre')." ".$this->dx_auth->userData('nombre');
			$data['correo'] = $this->dx_auth->userData('email');
			$data['carrera'] = $carrera['nombre'];
			$data['edad'] = $this->CalculaEdad($this->dx_auth->userData('fecha_nac'));
			$data['semestre'] = $semestre;
			$data['direccion'] = $this->dx_auth->userData('direccion');
			$this->smarty->assign('usuario', $data);
			$output = $this->smarty->fetch('usuario/profile.tpl');

		    $this->smarty->assign('output', $output);
		    $this->smarty->assign('css_files','');
		    $this->smarty->assign('js_files',$js_files);
		    $this->smarty->display('index.tpl');
		}

	public function CalculaEdad( $fecha ) {
		list($Y,$m,$d) = explode("-",$fecha);
		return( date("md") < $m.$d ? date("Y")-$Y-1 : date("Y")-$Y );
	}


		function all($ci)
		{
			$output->js_files['hgjfjfjfyjgfyl'] = base_url().'assets/js/jquery-ui-1.10.3.custom.min.js';
			$output->js_files['hgjfjfjfyjgfyl2'] = base_url().'assets/js/perfilDocente.js';
			$output->js_files['hgjfjfjfyjgfyl32'] = base_url().'assets/js/chosen.jquery.min.js';
			$output->css_files['hgjfjfjfyjdsfyl'] = base_url().'assets/css/chosen.css';

			$carreras = $this->perfil->get_carreras();
			$this->smarty->assign('carreras',$carreras);
			$userData = $this->perfil->get_UserData($ci);
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
			$ci = $this->input->post("ci");
			$this->output->set_content_type('application/json')->set_output(json_encode($this->perfil->get_materias($carrera, $ci)));
		}

		function Call_insert_materias(){
			$materias = $this->input->post("materias");
			$carrera = $this->input->post("carrera_id");
			$ci = $this->input->post("ci");
			$this->output->set_content_type('application/json')->set_output(json_encode($this->perfil->insert_materias($carrera,$materias,$ci)));
		}

		function Call_get_materias_doc(){
			$carrera = $this->input->post("carrera_id");
			$ci = $this->input->post("ci");
			$this->output->set_content_type('application/json')->set_output(json_encode($this->perfil->get_materias_doc($carrera,$ci)));
		}

		function Call_delete_materias(){
			$materias = $this->input->post("materias");
			$ci = $this->input->post("ci");
			$this->output->set_content_type('application/json')->set_output(json_encode($this->perfil->delete_materias($materias,$ci)));
		}

}
?>