<?php
	class Horario_controller extends CI_Controller{
		function __construct()
		{
			// Llamando al contructor del Modelo
			parent::__construct();
			$this->load->model('docente','prof');
		}

		public function index($value='')
		{
			$this->principal($value);

		}

		function all()
		{
			$car = $this->input->post('carrera');
			$sem = $this->input->post('semestre');

			if($car == false || $sem == false){
				header('Location: '.$this->config->item("base_url").'');
			}else{
				$data = array("carrera"=>$car,
							  "semestre" =>$sem,
							  "pensum"=>$this->prof->get_pensum($car));
				$this->session->set_userdata($data);
			}

		    $output->js_files['hgjfjfjfyjgfyl'] = base_url().'assets/js/horario.js';
		    $output->js_files['hgjfjfjfy22jgfyl'] = base_url().'assets/js/bootbox.min.js';
		    $output->js_files['hgjfjfjfyjfyl'] = base_url().'assets/js/jquery-ui-1.10.3.custom.min.js';
		    $output->css_files['hgjfjfjfyjfyl'] = base_url().'assets/css/horario.css';

		   	$horas = $this->prof->get_horas();
			$result = array();

			foreach ($horas as $item => $value) {
				array_push($result, $this->prof->get_dias($value['hora_inicio']));
			}


			$this->smarty->assign('horas',$horas);
		    $this->smarty->assign('dias',$result);
		    $this->smarty->assign('base_url',$this->config->item("base_url"));
		    $vista = $this->smarty->fetch('horario-content.tpl');
		    $this->smarty->assign('output',$vista);
		    $this->smarty->assign('css_files',$output->css_files);
		    $this->smarty->assign('js_files',$output->js_files);
		    $this->smarty->display('index.tpl');
		}

		function consulta()
		{
			$car = $this->input->post('carrera');
			$sem = $this->input->post('semestre');

			if($car == false || $sem == false){
				header('Location: '.$this->config->item("base_url").'');
			}else{
				$data = array("carrera"=>$car,
							  "semestre" =>$sem,
							  "pensum"=>$this->prof->get_pensum($car));
				$this->session->set_userdata($data);
			}
			
		    $output->js_files['hgjfjfjfyjgfyl'] = base_url().'assets/js/horario.js';
		    $output->js_files['hgjfjfjfyjfyl'] = base_url().'assets/js/jquery-ui-1.10.3.custom.min.js';
		    $output->css_files['hgjfjfjfyjfyl'] = base_url().'assets/css/horario.css';

		   	$horas = $this->prof->get_horas();
			$result = array();

			foreach ($horas as $item => $value) {
				array_push($result, $this->prof->get_dias($value['hora_inicio']));
			}

			$this->smarty->assign('tiporef','consulta');
			$this->smarty->assign('horas',$horas);
		    $this->smarty->assign('dias',$result);
		    $this->smarty->assign('base_url',$this->config->item("base_url"));
		    $vista = $this->smarty->fetch('horario-content.tpl');
		    $this->smarty->assign('output',$vista);
		    $this->smarty->assign('css_files',$output->css_files);
		    $this->smarty->assign('js_files',$output->js_files);
		    $this->smarty->display('index.tpl');
		}

		function principal(){
		    $output->js_files['hgjfjfjfyjfyl'] = base_url().'assets/js/jquery-ui-1.10.3.custom.min.js';
		    $output->js_files['hgjfjfjfyjfyl'] = base_url().'assets/js/horario_principal.js';
		    $output->css_files['hgjfjfjfyjfyl'] = '';

		   	$data = $this->prof->get_carreras();

			$this->smarty->assign('data',$data);
		    $this->smarty->assign('base_url',$this->config->item("base_url"));
		    $vista = $this->smarty->fetch('horario-info.tpl');
		    $this->smarty->assign('output',$vista);
		    $this->smarty->assign('css_files',$output->css_files);
		    $this->smarty->assign('js_files',$output->js_files);
		    $this->smarty->display('index.tpl');
		}

		function inscripcion(){
		    $output->js_files['hgjfjfjfyjfyl'] = base_url().'assets/js/jquery-ui-1.10.3.custom.min.js';
		    $output->js_files['hgjfjfjfyjfyl'] = base_url().'assets/js/';
		    $output->css_files['hgjfjfjfyjfyl'] = '';

		   	$data = $this->prof->get_carreras();

			$this->smarty->assign('data',$data);
		    $this->smarty->assign('base_url',$this->config->item("base_url"));
		    $vista = $this->smarty->fetch('inscripcion.tpl');
		    $this->smarty->assign('output',$vista);
		    $this->smarty->assign('css_files',$output->css_files);
		    $this->smarty->assign('js_files',$output->js_files);
		    $this->smarty->display('index.tpl');
		}

		function Call_view_pensum(){
			$this->output->set_content_type('application/json')->set_output(json_encode($this->prof->view_pensum()));
		}

		function Call_horas(){
			$horas = $this->prof->get_horas();

			$result = array();

			foreach ($horas as $item => $value) {
				array_push($result, $this->prof->get_dias($value['hora_inicio']));
			}

			var_dump($result);

		}

		function Call_materias_profe(){

			$output = array('materias'=>$this->prof->get_materias(),
							'profesores'=>$this->prof->get_profesor_full());	

			$this->output->set_content_type('application/json')->set_output(json_encode($output));
		}

		function insert_data(){
			$data = $this->input->post('data');
			$this->prof->insert_horario($data);

		}

		function call_consulta_horario(){
			$this->output->set_content_type('application/json')->set_output(json_encode($this->prof->get_horario()));
			
		}

		function call_get_cerreras(){
			$this->output->set_content_type('application/json')->set_output(json_encode($this->prof->get_carreras()));
		}

		function call_get_semestre(){
			$pen = $this->input->post('pensum');
			$this->output->set_content_type('application/json')->set_output(json_encode($this->prof->get_semestre($pen)));
		}

		function call_verify_horario(){
			$pen = $this->input->post('pensum');
			$sem = $this->input->post('semestre');
			$this->output->set_content_type('application/json')->set_output(json_encode($this->prof->verify_horario($pen, $sem)));
		}

		function sesion(){
			//var_dump($this->session->all_userdata());
			//reg_audit("cool");
			var_dump($this->session->userdata("DX_user_id"));
		}



}
?>