<?php
class Requisitos_controller extends CI_Controller
{
	public function index ($value='')
	{
		redirect('requisitos/all');
	}


	public function all($operation = '')
	{
		try{
			$this->load->library('grocery_crud');
			$crud = new grocery_CRUD();

			$crud->set_theme('twitter-bootstrap');
	      	$crud->set_language('spanish');
	     	$crud->set_table('requisito')
	      		 ->set_subject('Requisito')
	      		 ->columns('id','nombre','requerido', 'oculto', 'tipo')
	      		 ->callback_column('requerido', array($this, '_column_requerido_oculto'))
	      		 ->callback_column('oculto', array($this, '_column_requerido_oculto'))
	      		 ->fields('nombre','requerido', 'oculto', 'tipo')
	      		 ->required_fields('nombre','requerido', 'oculto', 'tipo')
		      	 ->display_as('tipo', 'Tipo Usuarios');

		    if($operation == 'insert_validation')
		    {
		    	$crud->set_rules('nombre', 'nombre', 'trim|is_unique[requisito.nombre]|required|min_length[4]|max_length[50]|xss_clean');
		    }else if ($operation == 'update_validation')
		    {
		    	$crud->set_rules('nombre', 'nombre', 'trim|required|min_length[4]|max_length[50]|xss_clean');
		    }

		    $crud->unset_print();
	      	$output = $crud->render();


	      	$this->smarty->assign('output',$output->output);
		    $this->smarty->assign('css_files',$output->css_files);
		    $this->smarty->assign('js_files',$output->js_files);
		    $this->smarty->display('index.tpl');

		}catch(Exception $e){
			show_error($e->getMessage().' --- '.$e->getTraceAsString());
		}

	}


	public function _column_requerido_oculto($field)
	{
		if ($field == 'N') {
			return 'NO';
		}elseif ($field == 'S') {
			return 'SI';
		}
	}
}


?>