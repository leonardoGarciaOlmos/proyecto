<?php
	class audit_controller extends CI_Controller{
		function __construct()
		{
			// Llamando al contructor del Modelo
			parent::__construct();
			$this->dx_auth->need_login();
		}

		public function index($value='')
		{
			$this->all($value);


		}

		function all()
		{
		    $output->js_files['hgjfjfjfyjgfyl'] = base_url().'assets/js/jquery.dataTables.bootstrap.js';
		    $output->js_files['hgfjfjfjfyjgfyl'] = base_url().'assets/js/jquery.dataTables.min.js';
		    $output->js_files['hgfjfdsfjfjfyjgfyl'] = base_url().'assets/js/ace.min.js';
		    $output->js_files['hgfjfjfjfyjgfsyl'] = base_url().'assets/js/audit.js';

		    $output->css_files['hgjfjfjfyjdsfyl'] = base_url().'assets/css/jquery.dataTables.css';
			
		    $this->load->model('Audit_model','audit');
			$this->smarty->assign('audit',$this->audit->get_audit());

		    $this->smarty->assign('base_url',$this->config->item("base_url"));
		    $vista = $this->smarty->fetch('audit-content.tpl');
		    $this->smarty->assign('output',$vista);
		    $this->smarty->assign('css_files',$output->css_files);
		    $this->smarty->assign('js_files',$output->js_files);
		    $this->smarty->display('index.tpl');
		}

		
		function Call_get_semestre(){
			$carrera_id = $this->input->post("carrera_id");
			$this->output->set_content_type('application/json')->set_output(json_encode($this->perfil->get_sem($carrera_id)));
		}


}
?>