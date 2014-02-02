<?php
class Pensum_Controller extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
	}

	public function index()
	{ redirect('pensum/all'); }

	public function all()
	{
		try {
			$this->load->library('grocery_crud');
			$crud = new grocery_CRUD();

			$crud->set_theme('twitter-bootstrap');
	      	$crud->set_language('spanish');
	      	$crud->set_table('list_pensum')
	      		 ->set_primary_key('id', 'list_pensum')
	      		 ->columns('id', 'creacion', 'estatus', 'carrera', 'departamento', 'accion')
	      		 ->callback_column('accion', array($this,'_callback_columns'));

	      	//$crud->unset_add();
	      	$crud->unset_delete();
	      	$crud->unset_edit();     	
	      	$crud->unset_print();

	     	$output = $crud->render();
	     	$output->js_files['hdghjddtjdtjd'] = base_url().'assets/js/pensum.js';
	     	//$output->css_files['hshshs'] = base_url().'assets/grocery_crud/themes/twitter-bootstrap/css/style.css'; 

	      	$this->smarty->assign('output',$output->output);
		    $this->smarty->assign('css_files',$output->css_files);
		    $this->smarty->assign('js_files',$output->js_files);
		    $this->smarty->display('index.tpl');
		    

		} catch (Exception $e) {
			show_error($e->getMessage().' --- '.$e->getTraceAsString());
		}
	}


	public function _callback_columns($value, $row)
	{
		return '<a id="update-pensum" class="btn" href="'.base_url().'pensum/update/'.$row->id.'">Modificar</a>';
	}


	public function add()
	{
		$this->load->model('Pensum');
		$class = new Pensum;
		$step = array('Seleccionar Carrea', 'Añadir Materia', 'Añadir Electivas', 'Finalizar');
		$stepConten = array('selectCarre', 'addMateria', 'addElect', 'finish');
		$totalStep = count($step);

		$this->smarty->assign('status', 'add');
		$this->smarty->assign('totalStep', $totalStep);
		$this->smarty->assign('ciPath', base_url());
		$this->smarty->assign('title', 'Agregar Pensum');
	    $this->smarty->assign('step', $step);
	    $this->smarty->assign('stepConten', $stepConten);
	    $this->smarty->assign('depart', $class->get_departamento());
	    $this->smarty->assign('id_pensum', '');
	    

		$output = $this->smarty->fetch('wizard.tpl');
		$js_files = array(base_url().'assets/template/js/ace-elements.min.js',
	    				  base_url().'assets/js/pensum.js',
	    				  base_url().'assets/js/semestre.js',
	    				  base_url().'assets/js/bootbox.min.js',
	    				  base_url().'assets/template/js/jquery-ui-1.10.3.full.min.js',
	    				  base_url().'assets/js/seminario.js');

		$css_files = array(base_url().'assets/css/wisard.css',
						   base_url().'assets/grocery_crud/themes/twitter-bootstrap/css/style.css'); 

	    $this->smarty->assign('output', $output);
	    $this->smarty->assign('css_files', $css_files);
	    $this->smarty->assign('js_files', $js_files);
	    $this->smarty->display('index.tpl');
	}


	public function update($pensum_id)
	{
		$this->load->model('Pensum');
		$class = new Pensum;
		$step = array('Seleccionar Carrea', 'Añadir Materia', 'Añadir Electivas', 'Finalizar');
		$stepConten = array('selectCarre', 'addMateria', 'addElect', 'finish');
		$totalStep = count($step);

		$this->smarty->assign('status', 'update');
		$this->smarty->assign('id_pensum', $pensum_id);
		$this->smarty->assign('totalStep', $totalStep);
		$this->smarty->assign('ciPath', base_url());
		$this->smarty->assign('title', 'Actualizar Pensum');
	    $this->smarty->assign('step', $step);
	    $this->smarty->assign('stepConten', $stepConten);
	    $this->smarty->assign('depart', $class->get_departamento_pensum($pensum_id));
	    $this->smarty->assign('carrera', $class->get_carrera_pensum($pensum_id));
	    $this->smarty->assign('semestre', $class->get_semestre_has_pensum($pensum_id));
	    $this->smarty->assign('MHS', $class->get_materia_has_semestre($pensum_id));
	    $this->smarty->assign('MatHasSem', $class->get_materia_has_seminario($pensum_id));
	    $this->smarty->assign('SemHasPen', $class->get_seminario_has_pensum($pensum_id));

		$output = $this->smarty->fetch('wizard.tpl');
		$js_files = array(base_url().'assets/template/js/ace-elements.min.js',
	    				  base_url().'assets/js/pensum.js',
	    				  base_url().'assets/js/semestre.js',
	    				  base_url().'assets/js/bootbox.min.js',
	    				  base_url().'assets/template/js/jquery-ui-1.10.3.full.min.js',
	    				  base_url().'assets/js/seminario.js');

		$css_files = array(base_url().'assets/css/wisard.css',
						   base_url().'assets/grocery_crud/themes/twitter-bootstrap/css/style.css'); 

	    $this->smarty->assign('output', $output);
	    $this->smarty->assign('css_files', $css_files);
	    $this->smarty->assign('js_files', $js_files);
	    $this->smarty->display('index.tpl');
	}


	public function agregar_semestre()
	{
		$this->load->model('Pensum');
		$modelPensum = new Pensum;

		echo $modelPensum->insertar_semestre($_POST['pensum'], $_POST['materia'], $_POST['semes']);
	}


	public function borrar_semestre()
	{
		$this->load->model('Pensum');
		$modelPensum = new Pensum;

		echo $modelPensum->eliminar_semestre($_POST['pensum'], $_POST['materia']);
	}

	public function borrar_seminario()
	{
		$this->load->model('Pensum');
		$modelPensum = new Pensum;

		echo $modelPensum->eliminar_seminario($_POST['seminario_id'], $_POST['pensum_id'], $_POST['materia_codigo']);
	}


	public function json_carrera()
	{
		$this->load->model('Pensum');
		$modelPensum = new Pensum;

		$array = $modelPensum->get_carrera($_POST['id_dep']);
		echo json_encode($array);
	}


	public function json_seminario()
	{
		$this->load->model('Pensum');
		$modelPensum = new Pensum;

		$array = $modelPensum->get_seminario();
		echo json_encode($array);
	}


	public function json_mate_has_pens()
	{
		$this->load->model('Pensum');
		$modelPensum = new Pensum;

		$array = $modelPensum->get_mat_has_pen($_REQUEST['pensum_id']);
		echo json_encode($array);
	}


	public function json_insert_pensum()
	{
		$this->load->model('Pensum');
		$modelPensum = new Pensum;
		$return = $modelPensum->insert_pensum($_POST['id_carrera']);

		if($return){
			$idPensum = $modelPensum->get_last_pensum();
			$returnVal = $modelPensum->get_pensum($idPensum[0]['id']);
		}
		else
			$returnVal = '';

		echo json_encode($returnVal);
	}

	public function json_get_materia()
	{
		$this->load->model('Pensum');
		$modelPensum = new Pensum;
		echo json_encode($modelPensum->consultar_mat_a());
	}


	public function json_update_pensum()
	{
		$this->load->model('Pensum');
		$modelPensum = new Pensum;
		$arrayUpdate = array ('carrera_id' => $_POST['carrera_id']);
		echo json_encode($modelPensum->update_pensum($_POST['pensum_id'], $arrayUpdate));
	}


	public function json_insert_seminario()
	{
		$this->load->model('Pensum');
		$modelPensum = new Pensum;
		$return = $modelPensum->insertar_seminario($_POST['materia_codigo'], $_POST['seminario_id'], $_POST['pensum_id']);
		echo json_encode($return);
	}
}
?>