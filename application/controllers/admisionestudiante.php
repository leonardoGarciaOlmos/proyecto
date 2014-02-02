<?php 

class Admisionestudiante_Controller extends CI_Controller
{

	function __construct()
	{
		parent::__construct();
	}

	public function index ()
	{
		redirect('admisionestudiante/all_admision');
	}

	public function all_admision()
	{

		try {
			$this->load->library('grocery_crud');
			$crud = new grocery_CRUD();

			$crud->set_theme('twitter-bootstrap');
	      	$crud->set_language('spanish');
	      	$crud->set_table('admision_estudiante')
	      		 ->set_primary_key('ci', 'admision_estudiante')
	      		 ->columns('ci', 'nombre', 'tipo', 'estatus', 'carrera', 'departamento', 'Fino')
	      		 ->callback_column('Fino', array($this,'_callback_field_checkbox'));

	      	$crud->unset_add();
	      	$crud->unset_delete();
	      	$crud->unset_edit();     	
	      	$crud->unset_print();

	     	$output = $crud->render();
	     	$output->js_files['hdghjddtjdtjd'] = base_url().'assets/js/admisionestudiante.js';
	     	$output->css_files['hshshs'] = base_url().'assets/grocery_crud/themes/twitter-bootstrap/css/style.css'; 

	      	$this->smarty->assign('output',$output->output);
		    $this->smarty->assign('css_files',$output->css_files);
		    $this->smarty->assign('js_files',$output->js_files);
		    $this->smarty->display('index.tpl');
		    

		} catch (Exception $e) {
			show_error($e->getMessage().' --- '.$e->getTraceAsString());
		}

	}

	public function _callback_field_checkbox($value, $row)
	{
		return '<input type="checkbox" class="ace ace-switch ace-switch-6" value="'.$row->ci.'">
				<span class="lbl"></span>';
	}

	public function admisionUpdate()
	{
		$arrayAdmitidos = $_POST['arrayAdmitidos'];

		$this->load->model('Admisionestudiante');

		foreach ($arrayAdmitidos as $key => $value) {
			$return = $this->Admisionestudiante->update($value);
			if($return){
				$varStatus = true;
			}else{
				$varStatus = false;
				break;
			}
		}

		echo json_encode($varStatus);
	}
}

?>