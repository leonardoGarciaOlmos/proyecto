<?php
	class carrera_Controller extends CI_Controller{

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
		 
		    $crud->set_table('carrera')
		        ->set_subject('Carrera');

		    $crud->fields('nombre','descripcion','departamento_id');
		  

			if($operacion == 'insert_validation'){
					    $crud->set_rules('nombre', 'Nombre de la carrera', 'trim|required|is_unique[carrera.nombre]');
					    $crud->set_rules('descripcion', 'Descripcion de la carrera');
					}
			if($operacion == 'update_validation'){
					    $crud->set_rules('nombre', 'Nombre de la carrera','trim|callback_unique_edit_check[nombre]');
					    $crud->set_rules('descripcion', 'Descripcion de la carrera');
					}

			$crud->set_relation('departamento_id','departamento','{id} ({nombre})');
					   

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
		public function carreraByDPTO( $id_Dpto ){
			$this->load->model('departamento', 'departamento');
			$carreras = $this->departamento->getCarreras( $id_Dpto );
			echo json_encode($carreras);
		}

				/* FUNCTION RETURN JSON */
		public function json_carrera_depart()
		{
			$this->load->model('Carrera');

			$array = $this->Carrera->carrera_departamento($_GET['id_dep']);
			echo json_encode($array);
		}

	}
?>