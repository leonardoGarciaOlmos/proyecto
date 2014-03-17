<?php
class Estudiante_Controller extends CI_Controller{

	function __construct()
	{
		parent::__construct();
	} 

	public function index( $value = '' )
	{
		$this->preInscripcion($value);
	}

	public function preInscripcion( $operation = '', $systemId = '' )
	{
		try{
			$this->load->library('grocery_crud');
			$crud = new grocery_CRUD();
			$crud->set_theme('twitter-bootstrap');
			$crud->set_language('spanish');
			$crud->set_table('usuario');
			$crud->where('tipo', 'ESTUDIANTE');
			$crud->set_subject('usuario');
			$crud->unset_jquery_ui();
			$crud->set_relation('nacionalidad','paises','nombre');
			 $crud->set_relation_n_n('carrera', 'estudiante_has_carrera', 'carrera', 'usuario_ci', 'carrera_id', 'nombre');
		if($operation != 'add'){
		//	$this->dx_auth->check_uri_permissions();
		}

	/**
	// Vista de Tabla
	**/
			$crud->unset_columns('direccion','est_civil','fecha_nac','observacion',
				'nivel_instruccion','clave','laico','religioso', 'tipo','tipo_sangre',
				'congregacion','nacionalidad','confirmacion_de_clave',
				'etnia','newpass','newpass_key','last_ip','created','modified','pensum_id','last_login','newpass_time','DPTO');
			//$crud->unset_list();
 			$crud->unset_print();
 			$crud->unset_read();
 			$crud->unset_edit();
 			$crud->unset_delete();
	/**
	//Agregar
	**/


			$crud->unset_fields('direccion','expediente','estatus','tipo','observacion');
			$crud->callback_insert(array($this,'encrypt_password_and_insert_callback'));
			//$crud->callback_before_insert(array($this,'requisitos_callback'));

	/**
	//Editar
	**/
			$crud->unset_edit_fields('direccion','expediente','estatus','tipo','observacion');
		//	$crud->field_type('clave', 'password');
		//	$crud->field_type('confirmacion_de_clave', 'password');
			$crud->field_type('pensum_id', 'invisible');
		
	/**
	//General
	**/
			$crud->fields('ci','nombre','apellido','direccion','fecha_nac','sexo','est_civil','tipo_sangre','nivel_instruccion',
				'correo','etnia','clave','confirmacion_de_clave','laico','religioso','congregacion','DPTO','nacionalidad','carrera','pensum_id');
 			$crud->unset_texteditor('observacion','full_text');

 			$crud->display_as('ci','Cedula de identidad')
 			->display_as('fecha_nac','Fecha de Nacimiento')
 			->display_as('est_civil','Estado Civil')
 			->display_as('nivel_instruccion','Nivel de Instrucción')
 			->display_as('confirmacion_de_clave','Confirmación de Clave')
 			->display_as('congregacion','Congregación')
 			->display_as('DPTO','Departamento')
 			->display_as('requisitos','Requisitos')
 			->display_as('carrera','Carrera');
 		//	->display_as('confirmacion_de_clave','Confirmación de Clave')

 			$crud->callback_field('DPTO',array($this,'add_field_callback_DPTO'));
			$crud->callback_field('carrera',array($this,'add_field_callback_carrera'));
		//	$crud->callback_field('requisitos',array($this,'add_field_callback_requisitos'));



	/**
	//Validaciones
	**/
			if($operation == 'add'){
					$crud->required_fields('ci','nombre','apellido','direccion','fecha_nac','sexo','est_civil','tipo_sangre','nivel_instruccion','correo','etnia','clave','confirmacion_de_clave');
					//,'laico','religioso','congregacion'
			}elseif($operation == 'edit'){
						$crud->required_fields('ci','nombre','apellido','direccion','fecha_nac','sexo','est_civil','tipo_sangre','nivel_instruccion','correo','etnia','laico','religioso','congregacion');
			}


			
			if($operation == 'insert_validation'){

				$crud->set_rules('ci', 'Cedula de Identidad', 'required|is_unique[usuario.ci]');
				$crud->set_rules('nombre', 'Nombre', 'required|min_length[3]|max_length[80]|alpha_dash_space');
				$crud->set_rules('apellido', 'Apellido', 'required|min_length[3]|max_length[80]|alpha_dash_space');
				$crud->set_rules('correo', 'Correo Electronico', 'required|is_unique[usuario.correo]|valid_email');
				$crud->set_rules('fecha_nac', 'Fecha de Nacimiento', 'required|exact_length[10]|callback_check_fecha');
				$crud->set_rules('clave', 'clave', 'required|min_length[6]|max_length[44]');
				$crud->set_rules('confirmacion_de_clave', 'Confirmacion de Clave', 'required|min_length[6]|max_length[44]|matches[clave]');

			}else if($operation == 'update_validation'){

			}

	/**
	//Vista
	**/

			$output = $crud->render();
			$output->js_files['hdghjddtjdtjd'] = base_url().'assets/js/Usuario/usuario.js';

		}catch(Exception $e){
  if($e->getCode() == 14) //The 14 is the code of the "You don't have permissions" error on grocery CRUD.
   {
      redirect('');//This is a custom view that you have to create
   }
   else
   {
    show_error($e->getMessage().' --- '.$e->getTraceAsString());
   }
	//		show_error($e->getMessage().' --- '.$e->getTraceAsString());

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
		$post_array['semestre'] = 1;
		$post_array['tipo'] = 'ESTUDIANTE';
		$post_array['estatus'] = 'PREINSCRITO';
		return $this->save($post_array);
	}




	private function save( $data )
	{
		$this->load->model('user','user');
		$this->user->load( array('ci' => $data['ci']));
		$this->user->set( $data );
		$this->user->save();
		$this->user->saveRol(20);//role ESTUDIANTE
	}

	private function requisitos_callback($post_array) {
		$this->load->model('user','usuario');
		$this->load->model('pensumUtil','pensum');
		$dataRequisitos = [];

		if (isset($post_array['requisitos'])) {

				foreach ($post_array['requisitos'] as $requisito) {
					$data['requisito_id'] = $requisito;
					$data['usuario_ci'] = $post_array['ci'];
					$dataRequisitos[] = $data;
				}
				$this->usuario->saveRequisitos( $dataRequisitos );
		}
		$carrera = array('usuario_ci' => $post_array['ci'], 
			'carrera_id' => $post_array['carrera'], 'semestre' => 1);
		$this->usuario->saveCarreras($post_array['ci'], $carrera);
		$pensumActive = $this->pensum->getActiveByCarrera($post_array['carrera']);
		$post_array['pensum_id'] = $pensumActive['id'];
		unset($post_array['requisitos']);		
		return $post_array;
	}



function add_field_callback_DPTO()
{
	$this->load->model('departamento', 'departamento');
	$dptos = $this->departamento->get_all();
	$html = '<select id="field-Dpto" name="Dpto" class="chosen-select" data-placeholder="Seleccionar Departamento a Inscribir" >
	<option value="0">--Seleccionar--</option>';
	foreach ($dptos as $dpto ) {
		$html .= '<option value="'.$dpto['id'].'">'.$dpto['nombre'].'</option>';
	}
    $html .= '</select>';
    return $html;
}

function add_field_callback_carrera()
{
	$this->load->model('departamento', 'departamento');
	$this->load->model('departamento', 'departamento');
	$dptos = $this->departamento->get_all();
	$carreras = $this->departamento->getCarreras( $dptos[0]['id'] );
	$html = '<select id="field-carrera" name="carrera" class="chosen-select" data-placeholder="Seleccionar Departamento a Inscribir" >--Seleccionar--';
	foreach ($carreras as $carrera ) {
		$html .= '<option value="'.$carrera['id'].'">'.$carrera['nombre'].'</option>';
	}
    $html .= '</select>';
    return $html;
}

function add_field_callback_requisitos()
{
	$this->load->model('requisitos', 'requisitos');
	$requisitos = $this->requisitos->get_all();
	$html = '<div name="requisitos_error"></div>';
	foreach ($requisitos as $requisito ) {
		$html .= 
		'<label>
				<input type="checkbox" id="field-requisitos-'.$requisito['id'].'" name="requisitos[]" class="ace" value="'.$requisito['id'].'">
				<span class="lbl">'.$requisito['nombre'].'</span>
		</label>';
	}
    $html .= '';
    return $html;


}

public function findByCI()
{
	$ci = $this->input->post('ci');
	$this->load->model('user', 'user');
	$user = $this->user->searchUser( $ci );
	if ($user) {
		$response['success'] = true;
		$response['user'] = $user;
	}else{
		$response['success'] = false;
	}
	echo json_encode($response);
}


public function notaTotales($estudiante)
{
	$this->load->model('Estudiante');
	$this->load->model('Pensum');

	// Inicializar parametros
	$materiaApro = 0;
	$materiaRepr = 0;
	$materiaFalt = 0;
	$carrera = $this->Estudiante->get_estudiante_carrera($estudiante);
	$infoEstud = $this->Estudiante->get_estudiante($estudiante);
	$semestre = $this->Estudiante->get_estudiante_semestre($estudiante);
	$Numsemestre = $this->Pensum->row_semestre_pensum($infoEstud[0]['pensum_id']);
	$notas = $this->Estudiante->get_estudiante_notas_totales($estudiante);
	foreach ($notas as $value) 
	{
		switch ($value['estatus']) 
		{
			case 'APROBADA':
				$materiaApro++;
			break;

			case 'REPROBADA':
				$materiaRepr++;
			break;			
			
			default:
				$materiaFalt++;
			break;
		}
	}

	// Variables del template
	$this->smarty->assign('carrera', $carrera[0]['nombre']);
	$this->smarty->assign('semestre', $semestre[0]['semestre']);
	$this->smarty->assign('matApro', $materiaApro);
	$this->smarty->assign('matRepro', $materiaRepr);
	$this->smarty->assign('matFaltante', $materiaFalt);
	$this->smarty->assign('notas', $notas);
	$this->smarty->assign('numSemes', $Numsemestre);

	// Template
	$output = $this->smarty->fetch('usuario/notasTotales.tpl');

	// Librerias
	$js_files = array("");
	$css_files = array("");

    $this->smarty->assign('output', $output);
    $this->smarty->assign('css_files', $css_files);
    $this->smarty->assign('js_files', $js_files);
    $this->smarty->display('index.tpl');
}


public function notas($id_plan, $estudiante)
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
	$this->smarty->assign('estudiante', $estudiante);
	$this->smarty->assign('profesor', $profesor[0]['nombre'].' '.$profesor[0]['apellido']);

	$vista = $this->smarty->fetch('usuario/chargeEvaluation.tpl');

	$this->smarty->assign('output',$vista);
	$this->smarty->assign('css_files',$output->css_files);
	$this->smarty->assign('js_files',$output->js_files);
	$this->smarty->display('index.tpl');
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


	public function all_plan()
	{
		try 
		{
			$this->load->library('grocery_crud');
			$crud = new grocery_CRUD();

			$crud->where('cedula', $this->session->userdata("DX_user_id"));
			$crud->set_theme('twitter-bootstrap');
	      	$crud->set_language('spanish');
	      	$crud->set_table('view_plan_estudiante')
	      		 ->set_primary_key('id', 'view_plan_estudiante')
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
							<a id="view" href="'.base_url().'estudiante/notas/'.$row->id.'/19274679" value="'.$row->id.'">
								<i class="icon-search"></i> Ver Plan									
							</a>
						</li>
					</ul>
				</div>';
	}




}