<?php
	class departamento_Controller extends CI_Controller{

		function __construct(){ 
			parent::__construct(); 
			$this->dx_auth->need_login();
		}


		public function index( $value = '' )
		{
			$this->all($value);
		}


		function all($operacion=0)
		{
			$this->load->library('grocery_crud');
		    $crud = new grocery_CRUD();
		    $crud->set_theme('twitter-bootstrap');
		    $crud->set_language('spanish');
		 	$operacion = $crud->getState();
		    $crud->set_table('departamento')
		        ->set_subject('Departamento');

		    $crud->fields('nombre','descripcion');
		  $crud->required_fields('nombre','descripcion');

			if($operacion == 'insert_validation'){
					    $crud->set_rules('nombre', 'Nombre del departamento', 'trim|required|is_unique[departamento.nombre]');
					    $crud->set_rules('descripcion', 'Descripcion del departamento');
					}
			if($operacion == 'update_validation'){
				$info = $crud->getStateInfo();
					    $crud->set_rules('nombre', 'Nombre de la departamento','trim|required|is_unique[departamento.nombre.id.'.$info->primary_key.']');
					    $crud->set_rules('descripcion', 'Descripcion de la departamento');
					}

					    $output = $crud->render();
		 
		    
		    $this->smarty->assign('output',$output->output);
		    $this->smarty->assign('css_files',$output->css_files);
		    $this->smarty->assign('js_files',$output->js_files);
		    $this->smarty->display('index.tpl');
		}

	}