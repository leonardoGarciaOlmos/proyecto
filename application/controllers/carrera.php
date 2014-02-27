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
			$info = $crud->getStateInfo();
		    $crud->set_table('carrera')
		        ->set_subject('Carrera');

		    $crud->fields('nombre','descripcion','departamento_id');
		  	$crud->required_fields('nombre','departamento_id');
		  	$operacion = $crud->getState();


			if($operacion == 'insert_validation'){
					    $crud->set_rules('nombre', 'Nombre de la carrera', 'trim|required|is_unique[carrera.nombre]');
						$crud->set_rules('departamento_id', 'Departamento','trim|required');
					}
			if($operacion == 'update_validation'){
					    $crud->set_rules('nombre', 'Nombre de la carrera','trim|required|is_unique[carrera.nombre.id.'.$info->primary_key.']');
						$crud->set_rules('departamento_id', 'Departamento');
					}
			$crud->display_as('departamento_id','Departamento');
			$crud->set_relation('departamento_id','departamento','{id} ({nombre})');
			$output = $crud->render();		 
		    
		    $this->smarty->assign('output',$output->output);
		    $this->smarty->assign('css_files',$output->css_files);
		    $this->smarty->assign('js_files',$output->js_files);
		    $this->smarty->display('index.tpl');
		}


		public function carreraByDPTO( $id_Dpto ){
			$this->load->model('departamento', 'departamento');
			$carreras = $this->departamento->getCarreras( $id_Dpto );
			echo json_encode($carreras);
		}

		public function json_carrera_depart()
		{
			$this->load->model('Carrera');
			$array = $this->Carrera->carrera_departamento($_GET['id_dep']);
			echo json_encode($array);
		}

	}
?>