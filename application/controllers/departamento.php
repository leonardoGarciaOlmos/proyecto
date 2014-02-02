<?php
	class departamento_Controller extends CI_Controller{

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
		 
		    $crud->set_table('departamento')
		        ->set_subject('Departamento');

		    $crud->fields('nombre','descripcion');
		  $crud->required_fields('nombre','descripcion');

			if($operacion == 'insert_validation'){
					    $crud->set_rules('nombre', 'Nombre del departamento', 'trim|required|is_unique[departamento.nombre]');
					    $crud->set_rules('descripcion', 'Descripcion del departamento');
					}
			if($operacion == 'update_validation'){
					    $crud->set_rules('nombre', 'Nombre de la departamento','trim|callback_unique_edit_check[nombre]');
					    $crud->set_rules('descripcion', 'Descripcion de la departamento');
					}

					    $output = $crud->render();
		 
		    
		    $this->smarty->assign('output',$output->output);
		    $this->smarty->assign('css_files',$output->css_files);
		    $this->smarty->assign('js_files',$output->js_files);
		    $this->smarty->display('index.tpl');
		}

			public function unique_edit_check($text, $field){
			//
			$systemID = $this->uri->segment(4);
			$this->system->load( array('id' => $systemID) );
			$element = array( 'name' => $field, 'value' => $text);

			if( $this->system->validate( $element ) ){
				return true;
			}else{
				$this->form_validation->set_message('unique_edit_check', "El campo %s ya esta registrado.");
				return false;
			}
		}

	}