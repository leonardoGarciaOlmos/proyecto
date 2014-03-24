<?php
	class Sistema_controller extends CI_Controller{

		function __construct()
		{
			parent::__construct();
			$this->dx_auth->need_login();
			$this->dx_auth->check_uri_permissions();
		} 

		public function index($value='')
		{
			//$this->all( $value );
			redirect('sistema/all/edit/4');
			
		}

		public function all($operation = '', $systemId = ''){
			try{
				$this->load->library('grocery_crud');
			    $crud = new grocery_CRUD();

		      	$crud->set_theme('twitter-bootstrap');
		      	$crud->set_language('spanish');
		     	$crud->set_table('system')
		      		 ->set_subject('Sistemas')
		      		 ->columns('id','name','alias')
		      		 ->fields('name','alias','url','path','logo','id')
		      		 ->field_type('id', 'hidden', $systemId)
		      		 ->display_as('name', 'Nombre del Sistema');

		      	$crud->unset_jquery_ui();

		      	$crud->add_action('Urls', base_url().'assets/grocery_crud/themes/flexigrid/css/images/link.png', '','',array($this,'urls'));
		      	$crud->add_action('Roles', '', '','ui-icon-imagen',array($this,'roles'));
		      	$crud->add_action('Menu', '', '','ui-icon-imagen',array($this,'menu'));

		      	$crud->callback_add_field('logo', array($this, 'callback_logo_add_field'));
		      	$crud->callback_edit_field('logo', array($this, 'callback_logo_edit_field'));
		      	$crud->callback_after_insert(array($this, 'system_callback_after_insert'));
		      	$crud->callback_after_update(array($this, 'system_callback_after_update'));

		      	$crud->unset_print();

		      	if($operation == 'insert_validation'){

		      		$crud->set_rules('name', 'nombre del sistema', 'required|callback_name_check|is_unique[system.name]|min_length[5]|max_length[79]');
			      	$crud->set_rules('alias', 'alias', 'required|is_unique[system.alias]|alpha|min_length[2]|max_length[5]');
			      	$crud->set_rules('url', 'url', 'required|is_unique[system.url]|min_length[2]|max_length[149]|callback_url_check');
			      	$crud->set_rules('path', 'path', 'required|is_unique[system.path]|min_length[5]|max_length[44]|callback_path_check');

		      	}else if($operation == 'update_validation'){

		      		$crud->set_rules('name', 'nombre del sistema', 'required|callback_name_check|callback_unique_edit_check[name]|min_length[5]|max_length[79]');
			      	$crud->set_rules('alias', 'alias', 'required|alpha|callback_unique_edit_check[alias]|min_length[2]|max_length[5]');
			      	$crud->set_rules('url', 'url', 'required|callback_unique_edit_check[url]|min_length[2]|max_length[149]|callback_url_check');
			      	$crud->set_rules('path', 'path', 'required|callback_unique_edit_check[path]|min_length[5]|max_length[44]|callback_path_check');
			    }

			    $crud->unset_delete();

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

		// Validaciones

		public function name_check($text){
			$regularExpression = "/^([ -a-z0-9_-])+$/i";

			if(preg_match($regularExpression, $text)){
				return true;
			}else{
				$errorMessage = "El campo %s sólo puede contener carácteres alfabéticos y espacios en blanco.";
				$this->form_validation->set_message('name_check', $errorMessage);
				return false;
			}
		}

		public function url_check($text){
			$regularExpression = '/^(http|https|ftp)\\:(\\\{2}|\/{2})([a-zA-Z0-9\.-_:\%]+(\\|\/){1})*/i';

			if(preg_match($regularExpression, $text)){
				return true;
			}else{
				$errorMessage = "El campo %s no tiene formato válido. Ejemplo (HTTP://miDominio.com)";
				$this->form_validation->set_message('url_check', $errorMessage);
				return false;
			}
		}

		public function path_check($text){
			$regularExpression = "/^([a-zA-Z]{1}:\\\){1}([a-zA-Z0-9\._-]+\\\)+$/";

			if(preg_match($regularExpression, $text)){
				return true;
			}
			else{
				$errorMessage = "El campo %s no tiene formato válido. Ejemplo (C:/miPath/)";
				$this->form_validation->set_message('path_check', $errorMessage);
				return false;
			}
		}

		public function unique_edit_check($text, $field){
			//
			$systemID = $this->uri->segment(4);
			$this->system->load( array('id' => $systemID) );
			$element = array( 'name' => $field, 'value' => $text);

			if( $this->system->validate( $element ) ){
				return true;
			}else{
				$this->form_validation->set_message('unique_edit_check', "El campo %s ya esta registrado.");
				return false;
			}
		}

		// Callbacks

		public function system_callback_after_update($postArray, $primaryKey){
			if(isset($postArray['icono'][0])){
				$logo = $postArray['icono'][0];
				$this->load->model('system');
				$this->system->load(array('id' => $primaryKey));
				$this->system->set(array('logo' => $logo));
				$this->system->save();
			}
		}

		public function system_callback_after_insert($postArray, $primaryKey){
			$logo = $postArray['icono'][0];
			$this->load->model('system');
			$this->system->load(array('id' => $primaryKey));
			$this->system->set(array('logo' => $logo));
			$this->system->save();
		}

		public function callback_logo_add_field(){
			return '<div class="chosen-select-div">
						<select name="icono[]" data-placeholder="Elegir el icono..." class="select-chosen" tabindex="2">
							<option value=""></option>
						</select>
						<button disabled><i id="icon-system" class="icon-white"></i></button>
					</div>';
		}

		public function callback_logo_edit_field($value, $primaryKey){
			$this->load->model('system');
			$this->system->load( array('id' => $primaryKey) );
			$logo = $this->system->get('logo')['logo'];
			if( empty($logo) )
				$logo = '';
			return '<div class="chosen-select-div">
						<select name="icono[]" data-placeholder="Elegir el icono..." class="select-chosen" tabindex="2">
							<option value="'.$logo.'"" selected>'.$logo.'</option>
						</select>
						<button disabled><i id="icon-system" class="icon-white '.$logo.'"></i></button>
					</div>';
		}

		public function urls($primaryKey , $row){
			return site_url().'url/index/'.$row->id;
		}

		public function roles($primaryKey , $row){
			return site_url().'role/index/'.$row->id;
		}

		public function menu($primaryKey , $row){
			return site_url().'menu/index/'.$row->id;
		}

	}
?>