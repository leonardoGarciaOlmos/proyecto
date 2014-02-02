<?php
class Usuario_Controller extends CI_Controller{

	function __construct()
	{
		parent::__construct();
		//$this->load->model('auditor');
	//	$this->dx_auth->check_uri_permissions();
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
		//	$crud->set_theme('flexigrid');
			
			$crud->set_language('spanish');
			$crud->set_table('usuario');
			$crud->set_subject('usuario');
			$crud->unset_jquery_ui();

	/**
	// Vista de Tabla
	**/
			$crud->unset_delete();
			$crud->unset_print();
			$crud->unset_columns('direccion','est_civil','fecha_nac','observacion','nivel_instruccion','clave','laico','religioso','congregacion','nacionalidad','confirmacion_de_clave','etnia','newpass','newpass_key','last_ip','created','modified','pensum_id','newpass_time','last_login');
	/**
	//Agregar
	**/


			$crud->unset_fields('direccion','expediente','estatus','tipo','observacion');
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
			$crud->fields('ci','nombre','apellido','direccion','fecha_nac','sexo','est_civil','tipo_sangre','nivel_instruccion','correo','etnia','clave','confirmacion_de_clave','laico','religioso','congregacion');
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

				$crud->set_rules('ci', 'Cedula de Identidad', 'required|is_unique[usuario.ci]|exact_length[8]');
				$crud->set_rules('nombre', 'Nombre', 'required|min_length[3]|max_length[80]|alpha');
				$crud->set_rules('apellido', 'Apellido', 'required|min_length[3]|max_length[80]|alpha');
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

	public function preInscripcion( $operation = '', $systemId = '' )
	{
		try{
			$this->load->library('grocery_crud');
			$crud = new grocery_CRUD();
			$crud->set_theme('twitter-bootstrap');
		//	$crud->set_theme('flexigrid');
			
			$crud->set_language('spanish');
			$crud->set_table('usuario');
			$crud->set_subject('usuario');
			$crud->unset_jquery_ui();

	/**
	// Vista de Tabla
	**/
			$crud->unset_delete();
			$crud->unset_print();
			$crud->unset_columns('direccion','est_civil','fecha_nac','observacion',
				'nivel_instruccion','clave','laico','religioso',
				'congregacion','nacionalidad','confirmacion_de_clave',
				'etnia','newpass','newpass_key','last_ip','created','modified','pensum_id');
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
			$crud->field_type('clave', 'password');
			$crud->field_type('confirmacion_de_clave', 'password');
			$crud->field_type('pensum_id', 'invisible');
		
	/**
	//General
	**/
			$crud->fields('ci','nombre','apellido','direccion','fecha_nac','sexo','est_civil','tipo_sangre','nivel_instruccion',
				'correo','etnia','clave','confirmacion_de_clave','laico','religioso','congregacion','DPTO','carrera','requisitos','pensum_id');
 			$crud->unset_texteditor('observacion','full_text');
 			$crud->unset_print();
 			$crud->unset_read();
 			//$crud->unset_edit();
 			$crud->unset_delete();
 			$crud->unset_list();
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

 			$crud->callback_add_field('DPTO',array($this,'add_field_callback_DPTO'));
			$crud->callback_add_field('carrera',array($this,'add_field_callback_carrera'));
			$crud->callback_add_field('requisitos',array($this,'add_field_callback_requisitos'));



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

				$crud->set_rules('ci', 'Cedula de Identidad', 'required|is_unique[usuario.ci]|exact_length[8]');
				$crud->set_rules('nombre', 'Nombre', 'required|min_length[3]|max_length[80]|alpha');
				$crud->set_rules('apellido', 'Apellido', 'required|min_length[3]|max_length[80]|alpha');
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
			$output->js_files['hdghjddtjdtjd'] = base_url().'assets/js/Usuario/usuario.js';
			//$output->js_files['hdghjddtjdtjd'] = base_url().'assets/js/chosen-icon.js';
			//$output->js_files['hdghjddtjdtjl'] = base_url().'assets/js/icon-array.js';
			//$output->js_files['hdghjddtjdtjy'] = base_url().'assets/js/system-icons.js';
			//$output->css_files['hdghjddtjdtjy'] = base_url().'assets/chosen/chosen.css';


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


	public function encrypt_password_and_insert_callback($post_array) {
		$this->load->library('encrypt');
		$post_array = $this->requisitos_callback($post_array);
		$key = 'super-secret-key';
		unset($post_array['confirmacion_de_clave']);
		unset($post_array['requisitos'],$post_array['Dpto']);
		$post_array['clave'] = $this->encrypt->encode($post_array['clave'], $key);
		$post_array['semestre'] = 1;
		return $this->db->insert('usuario',$post_array);
	}

	private function requisitos_callback($post_array) {
		$this->load->model('user','usuario');
		$this->load->model('pensumUtil','pensum');
		$dataRequisitos = [];
		foreach ($post_array['requisitos'] as $requisito) {
			$data['requisito_id'] = $requisito;
			$data['usuario_ci'] = $post_array['ci'];
			$dataRequisitos[] = $data;
		}
		$pensumActive = $this->pensum->getActiveByCarrera($post_array['carrera']);
		$this->usuario->saveRequisitos( $dataRequisitos );
		$post_array['pensum_id'] = $pensumActive['id'];
		unset($post_array['requisitos']);		
		return $post_array;
	}




	public function profile($value='')
	{
		$js_files['dfsdf'] = base_url().'assets/js/base_dato.js';
		$this->smarty->assign('process', 'restore');
		$output = $this->smarty->fetch('usuario/profile.tpl');

	    $this->smarty->assign('output', $output);
	    $this->smarty->assign('css_files','');
	    $this->smarty->assign('js_files',$js_files);
	    $this->smarty->display('index.tpl');
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
	$html = '';
	foreach ($requisitos as $requisito ) {
		$html .= 
		'<label>
				<input type="checkbox" id="field-requisitos" name="requisitos[]" class="ace" value="'.$requisito['id'].'">
				<span class="lbl">'.$requisito['nombre'].'</span>
		</label>';
	}
    $html .= '';
    return $html;


}

public function findByCI()
{
	$ci = $this->input->post('ci');
	$this->load->model('user', 'usuario');
	$user = $this->usuario->searchUser( $ci );
	if ($user) {
		$response['success'] = true;
		$response['user'] = $user;
	}else{
		$response['success'] = false;
	}
	echo json_encode($response);
}
 
function add_field_callback_2()
{
    return '<input type="text" maxlength="50" value="" name="state" style="width:400px"> ( for U.S. only )';
}
	
/*function field_callback_1($value = '', $primary_key = null)
{
	return	'<input id="field-clave" name="clave" type="password" value="'.$value.'" maxlength="60">
				<div class="form-field-box" id="clave_confirm_field_box">
					<div class="form-display-as-box" id="clave_confirm_display_as_box">
						Confirmación Clave :
						<span class="required">*</span>
					</div>
					<div class="form-input-box control-group" id="clave_confirm_input_box">
						<input id="field-clave_confirm" name="clave_confirm" type="password" value="'.$value.'" maxlength="60">					</div>
					<div class="clear"></div>
				</div>';
//    return '+30 <input type="text" maxlength="50" value="'.$value.'" name="phone" style="width:462px">';
			}*/

}