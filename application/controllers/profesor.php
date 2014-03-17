<?php
class Profesor_Controller extends CI_Controller{

	function __construct()
	{
		parent::__construct();
		//$this->load->model('auditor');
		//$this->dx_auth->check_uri_permissions();
	} 

	public function index( $value = '' )
	{
		$this->admin();
	}

	private function insert_estudiante_plan($id_plan, $carrera, $materia, $evaluaciones, $estPlan)
	{
		$tag = true;

		// Llamada a los Modelos
		$this->load->model('Materia');
		$this->load->model('docente');

		// Estudiante inscritos a la materia
		$estInscrito = $this->Materia->get_estudiantes_materia($materia, $carrera);

		// Recorre los estudiantes inscrito a la materia
		foreach ($estInscrito as $estInscritoAux) 
		{
			$numEvaluacion = 1;

			// Recorre los estudiantes que estan en el plan de evaluacion
			foreach ($estPlan as $estPlanAux) 
			{
				// Compara si el estudiante esta o no en el plan de evaluacion
				if ($estInscritoAux['ci'] != $estPlanAux['Estudiante']) 
				{ 
					$tag = true;
				}else
				{ 
					$tag = false; 
					break;
				}
			}

			// Evalua que el estudiante no este para insertarlo en el plan
			if($tag == true)
			{
				// arma las evaluaciones
				foreach ($evaluaciones as $evaAux) 
				{
					$arrayInsert['evaluacion'.$numEvaluacion] = $evaAux['id'];
					$numEvaluacion++;
				}

				$arrayInsert['plan_evaluacion_id'] = $id_plan;
				$arrayInsert['Estudiante'] = $estInscritoAux['ci'];

				// Inserta el estudiante en el plan
				$this->docente->insertEstPlan($arrayInsert);
			}
		}	
	}

	public function notas($id_plan)
	{
		$this->load->model('docente');
		$this->load->model('Carrera');
		$this->load->model('Materia');
		$this->load->model('User');

		$notasAux = $this->docente->getNotasPlanEva($id_plan);
		$evaluaciones = $this->docente->getEvaluacionPlanEva($id_plan);
		$plan = $this->docente->getPlanEvaluacion($id_plan);
		$profesor = $this->User->getUserOne($plan[0]['profesor']);
		$this->insert_estudiante_plan($plan[0]['id'], $plan[0]['carrera_id'], $plan[0]['materia'], $evaluaciones, $notasAux);
		$carrera = $this->Carrera->one_carrera($plan[0]['carrera_id']);
		$materia = $this->Materia->get_materia($plan[0]['materia']);
		$notas = $this->docente->getNotasPlanEva($id_plan);

		$output->js_files['jes'] = base_url().'assets/js/numeric.js';
		$output->js_files['je'] = base_url().'assets/js/usuario/notasprof.js';
		$output->css_files['je'] = "";

		$this->smarty->assign('numEvaluaciones', count($evaluaciones));
		$this->smarty->assign('numNotas', count($notas));
		$this->smarty->assign('evaluaciones', $evaluaciones);
		$this->smarty->assign('notas', $notas);
		$this->smarty->assign('carrera', $carrera[0]['nombre']);
		$this->smarty->assign('materia', $materia[0]['nombre']);
		$this->smarty->assign('plan', $plan[0]['id']);
		$this->smarty->assign('estudiante', "");
		$this->smarty->assign('profesor', $profesor[0]['nombre'].' '.$profesor[0]['apellido']);

		$vista = $this->smarty->fetch('usuario/chargeEvaluation.tpl');

		$this->smarty->assign('output',$vista);
		$this->smarty->assign('css_files',$output->css_files);
		$this->smarty->assign('js_files',$output->js_files);
		$this->smarty->display('index.tpl');
	}


	public function updateNotaEstudiante()
	{
		$object = $_POST["objectData"];
		
		$this->load->model('docente');
		echo $this->docente->updateEstPlan(array($object["campo"] => $object["nota"]), $object["estudiante"], $object["plan"]);
	}

	public function admin()
	{
		try{
			$this->load->library('grocery_crud');
			$crud = new grocery_CRUD();
			$crud->set_theme('twitter-bootstrap');
			$crud->where('tipo =', 'DOCENTE');
			$crud->set_language('spanish');
			$crud->set_table('usuario');
			$crud->set_subject('usuario');
			$crud->unset_jquery_ui();
			$operation = $crud->getState();
			$crud->set_relation('nacionalidad','paises','nombre');

	/**
	// Vista de Tabla
	**/
			$crud->unset_delete();
			$crud->unset_columns('direccion','est_civil','fecha_nac','observacion','nivel_instruccion','clave','laico','religioso','congregacion','nacionalidad','confirmacion_de_clave','etnia','newpass','newpass_key','last_ip','created','modified','pensum_id','newpass_time','last_login','semestre','carrera','expediente');

	/**
	//Agregar
	**/
	$crud->callback_insert(array($this,'encrypt_password_and_insert_callback'));
	/**
	//Editar
	**/
			$crud->unset_edit_fields('direccion','expediente','estatus','tipo','observacion');
			$crud->field_type('clave', 'password');
			$crud->field_type('confirmacion_de_clave', 'password');
		
	/**
	//General
	**/
			$crud->fields('ci','nombre','apellido','direccion','fecha_nac','sexo','est_civil','tipo_sangre','nivel_instruccion','correo','etnia','clave','confirmacion_de_clave','laico','religioso','congregacion','nacionalidad');
 			$crud->unset_texteditor('observacion','full_text');
 			$crud->display_as('fecha_nac','Fecha de Nacimiento')
 			->display_as('est_civil','Estado Civil')
 			->display_as('nivel_instruccion','Nivel de Instrucción')
 			->display_as('confirmacion_de_clave','Confirmación de Clave')
 			->display_as('congregacion','Congregación')
 			->display_as('DPTO','Departamento');
 				$crud->edit_fields('ci','nombre','apellido','direccion','fecha_nac','sexo','est_civil','tipo_sangre','nivel_instruccion','correo','etnia','laico','religioso','congregacion');
	/**
	//Validaciones
	**/

			if($operation == 'add'){
				$crud->required_fields('ci','nombre','apellido','direccion','fecha_nac','sexo','est_civil','tipo_sangre','nivel_instruccion','correo','etnia','laico','religioso','congregacion','clave','confirmacion_de_clave');
			}elseif($operation == 'edit'){
				$crud->field_type('ci', 'readonly');
				$crud->required_fields('ci','nombre','apellido','direccion','fecha_nac','sexo','est_civil','tipo_sangre','nivel_instruccion','correo','etnia','laico','religioso','congregacion');
			}

			if($operation == 'insert_validation'){

				$crud->set_rules('ci', 'Cedula de Identidad', 'required|is_unique[usuario.ci]|exact_length[8]');
				$crud->set_rules('nombre', 'Nombre', 'required|min_length[3]|max_length[80]|alpha_dash_space');
				$crud->set_rules('fecha_nac', 'fecha Nacimiento', 'required|exact_length[10]|callback_check_fecha');
				$crud->set_rules('apellido', 'Apellido', 'required|min_length[3]|max_length[80]|alpha_dash_space');
				$crud->set_rules('correo', 'Correo Electronico', 'required|is_unique[usuario.correo]|valid_email');
				$crud->set_rules('fecha_nac', 'Fecha de Nacimiento', 'required|min_length[3]|max_length[80]');
				$crud->set_rules('clave', 'clave', 'required|min_length[6]|max_length[44]');
				$crud->set_rules('confirmacion_de_clave', 'Confirmacion de Clave', 'required|min_length[6]|max_length[44]|matches[clave]');

			}else if($operation == 'update_validation'){
				$crud->set_rules('nombre', 'Nombre', 'required|min_length[3]|max_length[80]|alpha_dash_space');
				$crud->set_rules('fecha_nac', 'fecha Nacimiento', 'required|exact_length[10]|callback_check_fecha');
				$crud->set_rules('apellido', 'Apellido', 'required|min_length[3]|max_length[80]|alpha_dash_space');
				$crud->set_rules('correo', 'Correo Electronico', 'required|valid_email');
				$crud->set_rules('fecha_nac', 'Fecha de Nacimiento', 'required|min_length[3]|max_length[80]');
			}

	/**
	//Vista
	**/

			$output = $crud->render();
			$output->js_files['hdghjddtjdtjd'] = base_url().'assets/js/chosen-icon.js';
			$output->js_files['hdghjddtjdtjl'] = base_url().'assets/js/icon-array.js';
			$output->js_files['hdghjddtjdtjy'] = base_url().'assets/js/system-icons.js';
			$output->css_files['hdghjddtjdtjy'] = base_url().'assets/chosen/chosen.css';


		}catch(Exception $e){

			show_error($e->getMessage().' --- '.$e->getTraceAsString());

		}

		$this->smarty->assign('output',$output->output);
		$this->smarty->assign('css_files',$output->css_files);
		$this->smarty->assign('js_files',$output->js_files);
		$this->smarty->display('index.tpl');

	}



	public function check_fecha($date)
	{
			$dateBorn = strtotime( $date );
			$start = strtotime('1900-01-01'); //Fecha es un campo tipo DATE formato Y-m-d
			 
			if($start > $dateBorn){
				$this->form_validation->set_message('check_fecha', 'El Campo % debe tener una fecha valida');
				return FALSE;
			}else{
				return TRUE;
			}
	}

	public function encrypt_password_and_insert_callback($post_array) {
		$post_array = $this->requisitos_callback($post_array);
		unset($post_array['confirmacion_de_clave']);
		unset($post_array['requisitos'],$post_array['Dpto']);
		$post_array['clave'] = crypt($this->dx_auth->_encode($post_array['clave']));
		$post_array['semestre'] = null;
		$post_array['tipo'] = 'DOCENTE';
		$post_array['estatus'] = 'ACTIVO';
		return $this->save($post_array);
	}


	private function save( $data )
	{
		$this->load->model('user','user');
		$this->user->load( array('ci' => $data['ci']));
		$this->user->set( $data );
		$this->user->save();
		$this->user->saveRol(23);//role ESTUDIANTE
	}

	private function requisitos_callback($post_array) {
		$post_array['pensum_id'] = null;
		unset($post_array['requisitos']);		
		return $post_array;
	}


	public function all_plan()
	{
		try 
		{
			$this->load->library('grocery_crud');
			$crud = new grocery_CRUD();

			$crud->where('profesor',$this->session->userdata("DX_user_id"));
			$crud->set_theme('twitter-bootstrap');
	      	$crud->set_language('spanish');
	      	$crud->set_table('view_plan_profesor')
	      		 ->set_primary_key('id', 'view_plan_profesor')
	      		 ->columns('id', 'carrera', 'materia', 'evaluaciones', 'accion')
	      		 ->callback_column('accion', array($this,'_callback_accion'));

	      	$crud->unset_delete();
	      	$crud->unset_edit();     	
	      	$crud->unset_print();

	     	$output = $crud->render();
	     	//$output->js_files['hdghjddtjdtjd'] = base_url().'assets/js/pensum.js';
	     	//$output->js_files['jdjdjdjdd']= base_url().'assets/js/bootbox.min.js';
	     	$output->css_files['hshshs'] = base_url().'assets/grocery_crud/themes/twitter-bootstrap/css/style.css'; 

	      	$this->smarty->assign('output',$output->output);
		    $this->smarty->assign('css_files',$output->css_files);
		    $this->smarty->assign('js_files',"");
		    $this->smarty->display('index.tpl');
		    

		} catch (Exception $e) {
			show_error($e->getMessage().' --- '.$e->getTraceAsString());
		}
	}


	public function _callback_accion($value, $row)
	{

		return '<div class="btn-group">
					<button class="btn">Acciones</button>
					<button class="btn dropdown-toggle" data-toggle="dropdown">
						<span class="caret"></span>
					</button>
					<ul class="dropdown-menu">
						<li>
							<a id="view" href="'.base_url().'profesor/notas/'.$row->id.'" value="'.$row->id.'">
								<i class="icon-search"></i> Ver Plan									
							</a>
						</li>
					</ul>
				</div>';
	}


}