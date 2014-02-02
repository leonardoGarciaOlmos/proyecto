<?php
class Seminario_Controller extends CI_Controller
{

	function __construct()
	{
		parent::__construct();
	}

	public function index()
	{ redirect('seminario/all'); }


	public function all($operation = '')
	{

		try {
			$this->load->library('grocery_crud');
			$crud = new grocery_CRUD();

			$crud->set_theme('twitter-bootstrap');
	      	$crud->set_language('spanish');
	      	$crud->set_table('seminario')
	      		 ->columns('id', 'nombre')
	      		 ->fields('nombre')
	      		 ->required_fields('nombre');

	      	if($operation == 'insert_validation')
		    {
		    	$crud->set_rules('nombre', 'nombre', 'trim|is_unique[seminario.nombre]|required|min_length[4]|max_length[50]|xss_clean');
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
		    

		} catch (Exception $e) {
			show_error($e->getMessage().' --- '.$e->getTraceAsString());
		}

	}
}
?>