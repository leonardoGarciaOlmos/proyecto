<?php
	class InscripcionMateria_controller extends CI_Controller{
		function __construct()
		{
			// Llamando al contructor del Modelo
			parent::__construct();
			$this->load->model('insc_mat','perfil');
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
		    $output->css_files['hgjfjfjfyjdsfyl'] = base_url().'assets/css/chosen.css';
		    $output->css_files['hgjfjfjfyjdsfyl'] = base_url().'assets/css/horario.css';

		    $horas = $this->prof->get_horas();
			$result = array();

			foreach ($horas as $item => $value) {
				array_push($result, $this->prof->get_dias($value['hora_inicio']));
			}
			
			$user = $this->perfil->get_UserData($this->session->userdata("DX_user_id"));
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
			$pensum = $this->input->post("pensum");
			$this->output->set_content_type('application/json')->set_output(json_encode($this->perfil->get_semestre($pensum)));
		}

		function Call_get_materias(){
			$this->output->set_content_type('application/json')->set_output(json_encode($this->perfil->get_materias("20748439")));
		}

		function Call_insert_materias(){
			$materias = $this->input->post("materias");
			$this->output->set_content_type('application/json')->set_output(json_encode($this->perfil->insert_materias($materias,"20748439")));
		}

		function Call_get_materias_doc(){
			$this->output->set_content_type('application/json')->set_output(json_encode($this->perfil->get_materias_doc("20748439")));
		}

		function Call_delete_materias(){
			$materias = $this->input->post("materias");
			$this->output->set_content_type('application/json')->set_output(json_encode($this->perfil->delete_materias($materias,"20748439")));
		}

}
?>