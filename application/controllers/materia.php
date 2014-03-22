<?php
	class materia_Controller extends CI_Controller{

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
			$crud->set_table('materia')
				->set_subject('Materia');
			$operacion = $crud->getState();
			$crud->fields('codigo','nombre','horas_teoricas','horas_practicas','total_horas','uni_credito','cod_prelacion');
		  $crud->display_as('codigo','Código')
		  ->display_as('fecha_nac','Horas Teóricas')
		  ->display_as('total_horas','Total de Horas')
		  ->display_as('uni_credito','Unidades de Crédito')
		  ->display_as('cod_prelacion','Código de Prelación');

		  if ($operacion == 'ajax_list_info' || $operacion == 'ajax_list') {
			$crud->set_relation('cod_prelacion','materia m','{codigo} ({nombre})');
		  }else {
		  	$crud->set_relation('cod_prelacion','materia','{codigo} ({nombre})');
		  }

		  
			$crud->callback_before_update(array($this,'calculate_credit_unit_callback'));

			if($operacion == 'edit'){
				$crud->field_type('codigo', 'readonly');
			}
			if($operacion == 'insert_validation'){
			    $crud->set_rules('codigo', 'Codigo de materia', 'trim|required|is_unique[materia.codigo]|length[7]');
			    $crud->set_rules('nombre', 'Nombre de la materia', 'trim|required|is_unique[materia.nombre]');
			    $crud->set_rules('horas_teoricas', 'Horas teoricas', 'required|is_numeric');
			    $crud->set_rules('horas_practicas', 'Horas materia', 'required|is_numeric');
			    $crud->set_rules('total_horas', 'Total de horas', 'required|is_numeric');
			    $crud->set_rules('uni_credito', 'Unidades de credito', 'required|is_numeric');
			}
			if($operacion == 'update_validation'){
				$info = $crud->getStateInfo();
			   // $crud->set_rules('codigo', 'Codigo de materia', 'required|is_unique[materia.codigo]|length[7]');
			    $crud->set_rules('nombre', 'Nombre de la materia', 'trim|required|is_unique[materia.nombre.codigo.'.$info->primary_key.']');
			    $crud->set_rules('horas_teoricas', 'Horas teoricas', 'required|is_numeric');
			    $crud->set_rules('horas_practicas', 'Horas materia', 'required|is_numeric');
			}

		       //->columns('nombre','horas_teoricas','horas_practicas','total_horas','uni_credito','cod_prelacion');
			  // $crud->fields('nombre','horas_teoricas','horas_practicas','total_horas','uni_credito','cod_prelacion');
		 /*   $crud->required_fields('nombre','horas_teoricas');
		 	$crud->set_relation('cod_prelacion','materia','nombre');*/


		    $output = $crud->render();
		 
		    $output->js_files['hdfr54dtjd'] = base_url().'assets/js/materia/editMateria.js';
		    $this->smarty->assign('output',$output->output);
		    $this->smarty->assign('css_files',$output->css_files);
		    $this->smarty->assign('js_files',$output->js_files);
		    $this->smarty->display('index.tpl');
		}


		protected function _unique_join_name($field_name)
		{
		 return 'j'.substr(md5($field_name),0,8);
		}

		public function calculate_credit_unit_callback($post_array, $primary_key)
		{			
			$unidades_credito = 48;
			$semanas_semestre = 16;
			$total_horas = $post_array['horas_teoricas']+$post_array['horas_practicas'];
			$unidades_credito = round($total_horas * $semanas_semestre / $unidades_credito);
			$post_array['total_horas'] = $total_horas;
			$post_array['uni_credito'] = $unidades_credito;
			return $post_array;
		}

				/**
		*	
		* Retorna las materia en formato JSON	
		*
		* Realiza una consulta a base de dato de las materias
		* para enviarla en formato JSON
		*
		* @param 	none
		* @return 	none
		*
		*/
		public function json_materia_autocomplete()
		{
			$this->load->model('Materia');
			echo json_encode($this->Materia->autocomplete_materia());
		}

	}