<?php
class Usuario_Controller extends CI_Controller{

	function __construct()
	{
		parent::__construct();
		//$this->load->model('auditor');
		//$this->dx_auth->check_uri_permissions();
		$this->dx_auth->need_login();
	} 

		public function index( $value = '' )
		{
			$this->admin($value);
		}


	public function admin( $operation = '', $systemId = '' )
	{
		try{
			$this->load->library('grocery_crud');
			$crud = new grocery_CRUD();
			$crud->set_theme('twitter-bootstrap');
			$crud->set_language('spanish');
			$crud->set_table('usuario');
			$crud->set_subject('usuario');
			$crud->unset_jquery_ui();

	/**
	// Vista de Tabla
	**/
			$crud->unset_delete();
			$crud->unset_print();
			$crud->unset_columns('direccion','est_civil','fecha_nac','observacion','nivel_instruccion','clave','laico','religioso','congregacion','nacionalidad','confirmacion_de_clave','etnia','newpass','newpass_key','last_ip','created','modified','pensum_id','newpass_time','last_login','semestre','carrera');
	/**
	//Agregar
	**/
			$crud->unset_fields('direccion','expediente','estatus','tipo','observacion','confirmacion_de_clave','clave');
			$crud->callback_insert(array($this,'encrypt_password_and_insert_admin_callback'));

	/**
	//Editar
	**/
			$crud->unset_edit_fields('direccion','expediente','estatus','tipo','observacion');
			$crud->field_type('clave', 'password');
			$crud->field_type('confirmacion_de_clave', 'password');
		
	/**
	//General
	**/
			$crud->fields('ci','nombre','apellido','direccion','fecha_nac','sexo','est_civil','tipo_sangre','nivel_instruccion','correo','etnia','laico','religioso','congregacion');
 			$crud->unset_texteditor('observacion','full_text');
 			$crud->display_as('fecha_nac','Fecha de Nacimiento')
 			->display_as('est_civil','Estado Civil')
 			->display_as('nivel_instruccion','Nivel de Instrucción')
 			->display_as('confirmacion_de_clave','Confirmación de Clave')
 			->display_as('congregacion','Congregación')
 			->display_as('DPTO','Departamento');
	/**
	//Validaciones
	**/

			if($operation == 'add'){
				$crud->required_fields('ci','nombre','apellido','direccion','fecha_nac','sexo','est_civil','tipo_sangre','nivel_instruccion','correo','etnia','clave','confirmacion_de_clave','laico','religioso','congregacion');
			}elseif($operation == 'edit'){
				$crud->required_fields('ci','nombre','apellido','direccion','fecha_nac','sexo','est_civil','tipo_sangre','nivel_instruccion','correo','etnia','laico','religioso','congregacion');
			}

			if($operation == 'insert_validation'){

				$crud->set_rules('ci', 'Cedula de Identidad', 'required|is_unique[usuario.ci]|min_length[7]');
				$crud->set_rules('nombre', 'Nombre', 'required|min_length[3]|max_length[80]|alpha_dash_space');
				$crud->set_rules('fecha_nac', 'fecha Nacimiento', 'required|exact_length[10]|callback_check_fecha');
				$crud->set_rules('apellido', 'Apellido', 'required|min_length[3]|max_length[80]|alpha_dash_space');
				$crud->set_rules('correo', 'Correo Electronico', 'required|is_unique[usuario.correo]|valid_email');
				$crud->set_rules('fecha_nac', 'Fecha de Nacimiento', 'required|min_length[3]|max_length[80]');
				$crud->set_rules('clave', 'clave', 'required|min_length[6]|max_length[44]');
				$crud->set_rules('confirmacion_de_clave', 'Confirmacion de Clave', 'required|min_length[6]|max_length[44]|matches[clave]');

			}else if($operation == 'update_validation'){

			}

	/**
	//Vista
	**/

			$output = $crud->render();
			$output->js_files['hdghjddtsdjdtjd'] = base_url().'assets/js/usuario/dateformat.js';
			$output->js_files['hdghjddtsdjdtjd'] = base_url().'assets/js/usuario/profile.js';
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




	public function preInscripcionAdmin( $operation = '', $systemId = '' )
	{
		try{
			$this->load->library('grocery_crud');
			$crud = new grocery_CRUD();
			$crud->set_theme('twitter-bootstrap');			
			$crud->set_language('spanish');
			$crud->set_table('usuario');
			$crud->set_subject('usuario');
			$crud->unset_jquery_ui();
			$crud->set_relation('nacionalidad','paises','nombre');
			$crud->set_relation_n_n('carrera', 'estudiante_has_carrera', 'carrera', 'usuario_ci', 'carrera_id', 'nombre');
			$crud->unset_list();
 			$crud->unset_print();
 			$crud->unset_read();
 			$crud->unset_edit();
 			$crud->unset_delete();



	/**
	// Vista de Tabla
	**/
			$crud->unset_columns('direccion','est_civil','fecha_nac','observacion',
				'nivel_instruccion','clave','laico','religioso',
				'congregacion','nacionalidad','confirmacion_de_clave','requisitos'
				,'newpass','newpass_key','last_ip','created','modified','pensum_id','last_login','newpass_time','DPTO');
	/**
	//Agregar
	**/
			$crud->unset_fields('direccion','expediente','estatus','tipo','observacion');
			$crud->callback_insert(array($this,'encrypt_password_preinscripcionAdmin_callback'));

	/**
	//Editar
	**/
			$crud->unset_edit_fields('direccion','expediente','estatus','tipo','observacion');
			$crud->field_type('clave', 'password');
			$crud->field_type('confirmacion_de_clave', 'password');
			$crud->field_type('pensum_id', 'invisible');
		
	/**
	//General
	**/
			$crud->fields('ci','nombre','apellido','direccion','fecha_nac','sexo','est_civil','tipo_sangre','nivel_instruccion',
				'correo','etnia','clave','confirmacion_de_clave','laico','religioso','congregacion','nacionalidad','DPTO','carrera','requisitos','pensum_id');
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

 			$crud->callback_field('DPTO',array($this,'add_field_callback_DPTO'));
			$crud->callback_field('carrera',array($this,'add_field_callback_carrera'));
			$crud->callback_field('requisitos',array($this,'add_field_callback_requisitos'));



	/**
	//Validaciones
	**/
			if($operation == 'add'){
					$crud->required_fields('ci','nombre','apellido','direccion','fecha_nac','sexo','est_civil','tipo_sangre','nivel_instruccion','correo','etnia','carrera');
			}elseif($operation == 'edit'){
						$crud->required_fields('ci','nombre','apellido','direccion','fecha_nac','sexo','est_civil',
							'tipo_sangre','nivel_instruccion','correo','etnia','laico','religioso','congregacion','carrera');
			}


			
			if($operation == 'insert_validation'){

				$crud->set_rules('ci', 'Cedula de Identidad', 'required|is_unique[usuario.ci]|min_length[7]');
				$crud->set_rules('nombre', 'Nombre', 'required|min_length[3]|max_length[80]|alpha_dash_space');
				$crud->set_rules('apellido', 'Apellido', 'required|min_length[3]|max_length[80]|alpha_dash_space');
				$crud->set_rules('correo', 'Correo Electronico', 'required|is_unique[usuario.correo]|valid_email');
				$crud->set_rules('fecha_nac', 'Fecha de Nacimiento', 'required|min_length[3]|max_length[80]');
				$crud->set_rules('clave', 'clave', 'required|min_length[6]|max_length[44]');
				$crud->set_rules('confirmacion_de_clave', 'Confirmacion de Clave', 'required|min_length[6]|max_length[44]|matches[clave]');
				$crud->set_rules('carrera', 'carrera', 'required');

			}else if($operation == 'update_validation'){
				$crud->set_rules('requisitos', 'requisitos', 'etnia');
				$crud->set_rules('ci', 'Cedula de Identidad', 'required|min_length[7]');
				$crud->set_rules('nombre', 'Nombre', 'required|min_length[3]|max_length[80]|alpha_dash_space');
				$crud->set_rules('apellido', 'Apellido', 'required|min_length[3]|max_length[80]|alpha_dash_space');
				$crud->set_rules('correo', 'Correo Electronico', 'required|valid_email');
				$crud->set_rules('fecha_nac', 'Fecha de Nacimiento', 'required|min_length[3]|max_length[80]');
				$crud->set_rules('carrera', 'carrera', 'required');
			}

	/**
	//Vista
	**/

			$output = $crud->render();
			$output->js_files['hdghjddtsdjdtjd'] = base_url().'assets/js/usuario/dateformat.js';
			$output->js_files['hdghjddtjdtjd'] = base_url().'assets/js/Usuario/usuarioAdmin.js';

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



	public function profile($value='')
	{
		$this->load->model('estudiante');
		$carrera = $this->estudiante->get_estudiante_carrera($this->dx_auth->userData('user_id'))[0];
		$semestre = $this->estudiante->get_estudiante_semestre($this->dx_auth->userData('user_id'))[0]['semestre'];

		$output->js_files['jdjdjdjdd']= base_url().'assets/js/bootbox.min.js';
		$js_files['dfsdf'] = base_url().'assets/js/usuario/profile.js';
		$data['ci'] = $this->dx_auth->userData('user_id');
		$data['nombre'] = $this->dx_auth->userData('nombre')." ".$this->dx_auth->userData('nombre');
		$data['correo'] = $this->dx_auth->userData('email');
		$data['carrera'] = $carrera['nombre'];
		$data['edad'] = $this->CalculaEdad($this->dx_auth->userData('fecha_nac'));
		$data['semestre'] = $semestre;
		$data['direccion'] = $this->dx_auth->userData('direccion');
		$this->smarty->assign('usuario', $data);
		$output = $this->smarty->fetch('usuario/profile.tpl');

	    $this->smarty->assign('output', $output);
	    $this->smarty->assign('css_files','');
	    $this->smarty->assign('js_files',$js_files);
	    $this->smarty->display('index.tpl');
	}

	public function CalculaEdad( $fecha ) {
		list($Y,$m,$d) = explode("-",$fecha);
		return( date("md") < $m.$d ? date("Y")-$Y-1 : date("Y")-$Y );
	}

	public function encrypt_password_and_insert_admin_callback($post_array) {
		$post_array = $this->requisitos_callback($post_array);
		unset($post_array['confirmacion_de_clave']);
		unset($post_array['requisitos'],$post_array['Dpto']);
		$post_array['clave'] =  $this->dx_auth->_encode($post_array['clave']);
		$post_array['semestre'] = 1;
		$post_array['tipo'] = 'ADMINISTRATIVO';
		$post_array['estatus'] = 'ACTIVO';
		return $this->save($post_array);
	}

	public function encrypt_password_preinscripcionAdmin_callback($post_array) {
		$post_array = $this->requisitos_callback($post_array);
		unset($post_array['confirmacion_de_clave']);
		unset($post_array['requisitos'],$post_array['Dpto']);
		$post_array['semestre'] = 1;
		$post_array['tipo'] = 'ESTUDIANTE';
		$post_array['estatus'] = 'ACTIVO';


		return $this->save($post_array);
	}


	private function save( $data )
	{
		$data['fecha_nac'] = date("Y-m-d", strtotime($data['fecha_nac']));
		$this->load->model('user','user');
		$this->user->load( array('ci' => $data['ci']));
		if( trim($data['clave']) != ""){
			$data['clave'] =  $this->dx_auth->_encode($post_array['clave']);
		}
		$this->user->set( $data );
		$this->user->save();
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
	

}