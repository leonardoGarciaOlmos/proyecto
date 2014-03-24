<?php
class Pensum_Controller extends CI_Controller
{
	function __construct(){ 
		parent::__construct(); 
		$this->dx_auth->need_login();
	}

	public function index()
	{
		redirect(base_url().'pensum/all');
	}


	/**
	*	
	* Se visualizan todos los pensum en sistema	
	*
	* Se puede ver la informacion necesaria de todos los pensum
	* creado en el sistema y en caso de requerirlo se puede realizar
	* ingresar en el pensum para modificarlo
	*
	* @param 	none
	* @return 	none
	*
	*/
	public function all()
	{
		try 
		{
			$this->load->library('grocery_crud');
			$crud = new grocery_CRUD();

			$crud->set_theme('twitter-bootstrap');
	      	$crud->set_language('spanish');
	      	$crud->set_table('list_pensum')
	      		 ->set_primary_key('id', 'list_pensum')
	      		 ->columns('id', 'creacion', 'estatus', 'carrera', 'departamento', 'accion')
	      		 ->callback_column('accion', array($this,'_callback_accion'));

	      	$crud->unset_delete();
	      	$crud->unset_edit();     	
	      	$crud->unset_print();

	     	$output = $crud->render();
	     	$output->js_files['hdghjddtjdtjd'] = base_url().'assets/js/pensum.js';
	     	$output->js_files['jdjdjdjdd']= base_url().'assets/js/bootbox.min.js';
	     	$output->css_files['hshshs'] = base_url().'assets/grocery_crud/themes/twitter-bootstrap/css/style.css'; 

	      	$this->smarty->assign('output',$output->output);
		    $this->smarty->assign('css_files',$output->css_files);
		    $this->smarty->assign('js_files',$output->js_files);
		    $this->smarty->display('index.tpl');
		    

		} catch (Exception $e) {
			show_error($e->getMessage().' --- '.$e->getTraceAsString());
		}
	}


	/**
	*	
	* Registrar un nuevo pensum	
	*
	* Realiza el llamado a un template que contiene los pasos
	* para registrar un pensum y carga las librerias que se  
	* requiera
	*
	* @param 	none
	* @return 	none
	*
	*/
	public function add()
	{
		// Carga de los modelos
		$this->load->model('Departamento');

		// Variables del template
		$this->smarty->assign('title', 'Agregar Pensum');
		$this->smarty->assign('process', 'add');
		$this->smarty->assign('depart', $this->Departamento->all_departamento());

		// Template
		$output = $this->smarty->fetch('wizard_pensum.tpl');

		// Librerias
		$js_files = array(base_url().'assets/js/pensum.js',
				          base_url().'assets/js/bootbox.min.js',
						  base_url().'assets/js/loader.js',
						  base_url().'assets/template/js/jquery-ui-1.10.3.full.min.js',
						  base_url().'assets/js/wizard_pensum.js');
		$css_files = array(base_url().'assets/css/wizard.css');

	    $this->smarty->assign('output', $output);
	    $this->smarty->assign('css_files', $css_files);
	    $this->smarty->assign('js_files', $js_files);
	    $this->smarty->display('index.tpl');
	}


	/**
	*	
	* Actualizar un nuevo pensum	
	*
	* Realiza el llamado a un template que contiene los pasos
	* para actualizar un pensum y carga las librerias que se  
	* requiera
	*
	* @param 	none
	* @return 	none
	*
	*/
	public function update($id_pensum)
	{
		// Carga de los modelos
		$this->load->model('Departamento');
		$this->load->model('Pensum');
		$this->load->model('Carrera');

		// Inicializar parametros
		$pensum = $this->Pensum->one_pensum($id_pensum);
		$carrera = $this->Carrera->one_carrera($pensum[0]['carrera_id']);
		$departamento = $this->Departamento->one_departamento($carrera[0]['departamento_id']);
		$materia = $this->Pensum->materia_pensum($id_pensum);
		$semestre = $this->Pensum->row_semestre_pensum($id_pensum);

		// Variables del template
		$this->smarty->assign('title', 'Actualizar Pensum');
		$this->smarty->assign('process', 'update');
		$this->smarty->assign('depart', array('id' => $departamento[0]['id'], 'nombre' => $departamento[0]['nombre']));
		$this->smarty->assign('career', array('id' => $carrera[0]['id'], 'nombre' => $carrera[0]['nombre']));
		$this->smarty->assign('semestre', $semestre);
		$this->smarty->assign('materia', $materia);
		$this->smarty->assign('pensum', $pensum[0]['id']);

		// Template
		$output = $this->smarty->fetch('wizard_pensum.tpl');

		// Librerias
		$js_files = array(base_url().'assets/js/pensum.js',
				          base_url().'assets/js/bootbox.min.js',
						  base_url().'assets/js/loader.js',
						  base_url().'assets/template/js/jquery-ui-1.10.3.full.min.js',
						  base_url().'assets/js/wizard_pensum.js');
		$css_files = array(base_url().'assets/css/wizard.css');

	    $this->smarty->assign('output', $output);
	    $this->smarty->assign('css_files', $css_files);
	    $this->smarty->assign('js_files', $js_files);
	    $this->smarty->display('index.tpl');
	}



	/**
	*	
	* Vizualizar un pensum	
	*
	* Realiza el llamado a un template que contiene la
	* información de un pensum en donde se ven los
	* semestres y las materias
	*
	* @param 	integer $id_pensum ID del pensum
	* @return 	none
	*
	*/
	public function view($id_pensum)
	{
		// Carga de los modelos
		$this->load->model('Pensum');
		$this->load->model('Carrera');
		$this->load->model('Semestre');

		// Inicializar parametros
		$pensum = $this->Pensum->one_pensum($id_pensum);
		$carrera = $this->Carrera->one_carrera($pensum[0]['carrera_id']);
		$materia = $this->Pensum->materia_pensum($id_pensum);
		$semestre = $this->Pensum->row_semestre_pensum($id_pensum);
		$semestreInfo = $this->Pensum->semestre_info($id_pensum);
		$perioSemestre = $this->Semestre->get_periodo_semestres($id_pensum);
		if (count($perioSemestre) == 0) 
		{ $perioSemestre = 'no hay';	
		}else
		{ $perioSemestre = ($perioSemestre[0]['semestre']%2 == 0)? 'Pares': 'Impares';}

		// Variables del template
		$this->smarty->assign('carrera', $carrera[0]['nombre']);
		$this->smarty->assign('NumSemestre', $semestre);
		$this->smarty->assign('NumMateria', count($materia));
		$this->smarty->assign('SemAbiertos', $perioSemestre);
		$this->smarty->assign('SemestreInfo', $semestreInfo);
		$this->smarty->assign('semestre', $semestre);
		$this->smarty->assign('materia', $materia);

		// Template
		$output = $this->smarty->fetch('view_pensum.tpl');

		// Librerias
		$js_files = array("");
		$css_files = array("");

	    $this->smarty->assign('output', $output);
	    $this->smarty->assign('css_files', $css_files);
	    $this->smarty->assign('js_files', $js_files);
	    $this->smarty->display('index.tpl');
	}


	/**
	*	
	* Eliminar un pensum	
	*
	* Realiza la petición a base de dato para eliminar un
	* pensum en especifico
	*
	* @param 	integer $row Objeto que contiene los datos de un registro
	* @return 	none
	*
	*/
	public function delete($id_pensum)
	{
		$this->load->model('Pensum');
		echo $this->Pensum->delete_pensum($id_pensum);
	}


	/**
	*	
	* Añade la matería a un pensum	
	*
	* Realiza la petición a base de dato para insertar una 
	* materia en un semestre en especifico del pensum
	*
	* @param 	none
	* @return 	none
	*
	*/
	public function add_materia_semestre()
	{
		$this->load->model('Pensum');
		echo $this->Pensum->add_materia_pensum($_GET['pensum'], $_GET['semes'], $_GET['materia']);
	}


	/**
	*	
	* Actualiza el estatus del pensum	
	*
	* Realiza la petición a base de dato para actualizar una 
	* informacion del pensum
	*
	* @param 	none
	* @return 	none
	*
	*/
	public function update_estatus_pensum()
	{
		$this->load->model('Pensum');

		// Actualizar los pensum a estado INACTIVO
		if ($_GET['estatus'] == "ACTIVO")
		{
			$arrayCarrera = $this->Pensum->carrera_pensum($_GET['carrera']);
			foreach ($arrayCarrera as $key => $value) 
			{
				if($value['estatus'] != 'PENDIENTE')
					$this->Pensum->update_pensum( $value['id'], array('estatus' => 'INACTIVO') );
			}
		}

		// Actualiza el pensum al estatus que sea enviado
		echo $this->Pensum->update_pensum($_GET['pensum'], array('estatus' => $_GET['estatus']));
	}


	/**
	*	
	* Actualiza la carrera del pensum	
	*
	* Realiza la petición a base de dato para actualizar una 
	* carrera del pensum
	*
	* @param 	none
	* @return 	none
	*
	*/
	public function update_carrera_pensum()
	{
		$this->load->model('Pensum');
		echo $this->Pensum->update_pensum($_GET['pensum'], array('carrera_id' => $_GET['carrera']));
	}


	/**
	*	
	* Borra la matería a un pensum	
	*
	* Realiza la petición a base de dato para eliminar una 
	* materia en un semestre en especifico del pensum
	*
	* @param 	none
	* @return 	none
	*
	*/
	public function delete_materia_semestre()
	{
		$this->load->model('Pensum');
		echo $this->Pensum->delete_materia_pensum($_GET['pensum'], $_GET['materia']);
	}


	/**
	*	
	* Crear un unevo pensum en base de dato	
	*
	* Realiza una petición a la base de dato para ingresar
	* un pensum y devuelve el valor con el que se registro
	*
	* @param 	none
	* @return 	none
	*
	*/
	public function json_new_pensum()
	{
		// Carga de los modelos
		$this->load->model('Pensum');

		// Se realiza la petición de la inserción a la base de dato
		$this->Pensum->insert_pensum_pending($_GET['id_carrera']);

		// Se realiza la petición de la data del ultimo pensum
		$Pensum = $this->Pensum->last_pensum();

		echo json_encode($Pensum);
	}


	/**
	*	
	* Obtiene las materia de cada semestre	
	*
	* Realiza una petición a la base de dato para solicitar
	* todo las materias de cada semestre del pensum
	*
	* @param 	none
	* @return 	none
	*
	*/
	public function json_materia_semestre()
	{
		// Carga de los modelos
		$this->load->model('Pensum');

		// Se realiza la petición para solicitar las materias de cada semestre
		$Pensum = $this->Pensum->materia_pensum($_GET['pensum']);

		echo json_encode($Pensum);
	}


	/**
	*	
	* Obtiene la cantidad de semestre	
	*
	* Realiza una petición a la base de dato para solicitar
	* el numero total de semestre que tiene el pensum
	*
	* @param 	none
	* @return 	none
	*
	*/
	public function json_row_semestre()
	{
		// Carga de los modelos
		$this->load->model('Pensum');

		// Se realiza la petición para solicitar los semestre del pensum
		$row = $this->Pensum->row_semestre_pensum($_GET['pensum']);

		echo json_encode($row);
	}


	/**
	*	
	* Obtiene el registro de un pensum	
	*
	* Realiza una petición a la base de dato para solicitar
	* la informacion de un pensum
	*
	* @param 	none
	* @return 	none
	*
	*/
	public function json_pensum()
	{
		// Carga de los modelos
		$this->load->model('Pensum');

		// Se realiza la petición para solicitar la informacion del pensum
		$row = $this->Pensum->one_pensum($_POST['pensum']);

		echo json_encode($row);
	}


	/**
	*	
	* Obtiene el pensum segun una carrera	
	*
	* Realiza una petición a la base de dato para solicitar
	* la informacion de un pensum segun una carrera
	*
	* @param 	none
	* @return 	none
	*
	*/
	public function json_pensum_carrera_activate()
	{
		// Carga de los modelos
		$this->load->model('Pensum');

		// Se realiza la petición para solicitar la informacion del pensum
		$row = $this->Pensum->carrera_pensum_activate($_GET['carrera']);

		echo json_encode($row);
	}


	/**
	*	
	* Realiza una modificacion a una columna del registro	
	*
	* En la columna de accion se modifica el boton por default
	* para colocar un boton con otra accion diferente 
	*
	* @param 	$value
	* @param 	object $row Objeto que contiene los datos de un registro
	* @return 	string HTML del boton
	*
	*/
	public function _callback_accion($value, $row)
	{

		return '<div class="btn-group">
					<button class="btn">Acciones</button>
					<button class="btn dropdown-toggle" data-toggle="dropdown">
						<span class="caret"></span>
					</button>
					<ul class="dropdown-menu">
						<li>
							<a id="update" href="#" value="'.$row->id.'">
								<i class="icon-pencil"></i>	Editar Registro										
							</a>
						</li>

						<li>
							<a id="delete" href="#" value="'.$row->id.'">
								<i class="icon-trash"></i> Eliminar Registro										
							</a>
						</li>

						<li>
							<a id="view" href="'.base_url().'pensum/view/'.$row->id.'" value="'.$row->id.'">
								<i class="icon-search"></i> Ver Registro										
							</a>
						</li>
					</ul>
				</div>';
	}

}
?>