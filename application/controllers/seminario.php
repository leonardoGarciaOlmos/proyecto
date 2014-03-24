<?php
class Seminario_Controller extends CI_Controller
{


	function __construct(){ 
		parent::__construct(); 
		$this->dx_auth->need_login();
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
	     	$output->js_files['hdghjddtjdtjd'] = base_url().'assets/js/seminario.js';

	      	$this->smarty->assign('output',$output->output);
		    $this->smarty->assign('css_files',$output->css_files);
		    $this->smarty->assign('js_files',$output->js_files);
		    $this->smarty->display('index.tpl');
		    

		} catch (Exception $e) {
			show_error($e->getMessage().' --- '.$e->getTraceAsString());
		}

	}

	public function add_seminario_pensum()
	{
		// Carga de los modelos
		$this->load->model('Departamento');
		$this->load->model('Seminario');

		// Variables del template
		$this->smarty->assign('depart', $this->Departamento->all_departamento());
		$this->smarty->assign('seminario', $this->Seminario->all_seminario());

		// Template
		$output = $this->smarty->fetch('wizard_seminario.tpl');

		// Librerias
		$js_files = array(base_url().'assets/js/seminario.js',
						  base_url().'assets/js/bootbox.min.js',
						  base_url().'assets/js/loader.js',
						  base_url().'assets/js/wizard_seminario.js',);
		$css_files = array(base_url().'assets/css/wisard.css');

	    $this->smarty->assign('output', $output);
	    $this->smarty->assign('css_files', $css_files);
	    $this->smarty->assign('js_files', $js_files);
	    $this->smarty->display('index.tpl');
	}


	public function insert_seminario_pensum()
	{
		// Carga de los modelos
		$this->load->model('Seminario');
		echo $this->Seminario->insert_seminario($_POST['materia'], $_POST['seminario'], $_POST['pensum']);
	}

	public function delete_seminario_pensum()
	{
		// Carga de los modelos
		$this->load->model('Seminario');
		echo $this->Seminario->delete_seminario($_GET['materia'], $_GET['seminario'], $_GET['pensum']);
	}

	public function json_seminario_pensum()
	{
		// Carga de los modelos
		$this->load->model('Seminario');

		// Se realiza la petición para solicitar los semestre del pensum
		$row = $this->Seminario->materia_seminario($_GET['pensum']);

		echo json_encode($row);
	}
}
?>