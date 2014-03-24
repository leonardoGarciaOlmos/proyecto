<?php
	class InscripcionMateria_controller extends CI_Controller{
		function __construct()
		{
			// Llamando al contructor del Modelo
			parent::__construct();
			$this->load->model('insc_mat','perfil');
			$this->dx_auth->need_login();
			//$this->dx_auth->check_uri_permissions();
		}

		public function index($value='')
		{
			$this->all($value);

		}

		function all()
		{

			$this->load->model('docente','prof');

		    $output->js_files['hgjfjfjfyjgfyl'] = base_url().'assets/js/jquery-ui-1.10.3.custom.min.js';
		    $output->js_files['hgjfjfjfyjgfssyl2'] = base_url().'assets/js/fuelux.wizard.min.js';
		    $output->js_files['hgjfjfjfyjgfyl32'] = base_url().'assets/js/inscrip_mat.js'; 
		    $output->js_files['hgjfjfjf2'] = base_url().'assets/js/jquery.PrintArea.js';
		    $output->js_files['hgjfjfjf2'] = base_url().'assets/js/jquery.balloon.min.js'; 
		    $output->js_files['jdjdjdjdd']= base_url().'assets/js/bootbox.min.js';
		    $output->css_files['hgjfjfjfyjdsfyl'] = base_url().'assets/css/chosen.css';
		    $output->css_files['hgjfjfjdsfyl'] = base_url().'assets/css/horario.css';
		    $output->css_files['hgjfjfjfyjdsfyl'] = base_url().'assets/css/PrintArea.css';

		    $horas = $this->prof->get_horas();
			$result = array();

			foreach ($horas as $item => $value) {
				array_push($result, $this->prof->get_dias($value['hora_inicio']));
			}
			
			$semestre = $this->perfil->get_semestre($this->session->userdata("DX_user_id"));
			$estatus_mat = $this->perfil->get_status_mat($this->session->userdata("DX_user_id"));
			$user = $this->perfil->get_UserData($this->session->userdata("DX_user_id"));
			$this->smarty->assign("semestre",$semestre["semestre"]);
			$this->smarty->assign("status",$estatus_mat);
			$this->smarty->assign("userData",$user[0]);
			$this->smarty->assign('horas',$horas);
			$this->smarty->assign('dias',$result);

		    $this->smarty->assign('base_url',$this->config->item("base_url"));
		    $vista = $this->smarty->fetch('inscripcion-materia.tpl');
		    $this->smarty->assign('output',$vista);
		    $this->smarty->assign('css_files',$output->css_files);
		    $this->smarty->assign('js_files',$output->js_files);
		    $this->smarty->display('index.tpl');
		}

		
		function Call_get_semestre(){
			$carrera_id = $this->input->post("carrera_id");
			$this->output->set_content_type('application/json')->set_output(json_encode($this->perfil->get_sem($carrera_id)));
		}

		function Call_get_materias(){
			$semestre = $this->input->post("semestre");
			$carrera_id = $this->input->post("carrera_id");
			$ci = $this->session->userdata("DX_user_id");
			$this->output->set_content_type('application/json')->set_output(json_encode($this->perfil->get_materias($semestre, $carrera_id, $ci)));
		}

		function Call_get_horario(){
			$pensum = $this->input->post("pensum");
			$semestre = $this->input->post("semestre");
			$materia = $this->input->post("materia");
			$this->output->set_content_type('application/json')->set_output(json_encode($this->perfil->get_horario_estu($pensum, $semestre, $materia)));
		}

		function Call_inscribir(){
			$bloque = $this->input->post("bloque");
			$pensum = $this->input->post("pensum");
			$ci = $this->session->userdata("DX_user_id");
			$this->output->set_content_type('application/json')->set_output(json_encode($this->perfil->inscribir($bloque, $pensum, $ci)));
		}

		function Call_get_horas(){
			$pensum = $this->input->post("pensum");
			$semestre = $this->input->post("semestre");
			$materia = $this->input->post("materia");
			$this->output->set_content_type('application/json')->set_output(json_encode($this->perfil->get_horario_estu($pensum, $semestre, $materia)));
		}

}
?>