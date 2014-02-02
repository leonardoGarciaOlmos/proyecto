<?php
	class User_Controller extends CI_Controller{

		private $errorMessage = array("Ocurrio un error al registrar el usuario.",
									  "El usuario se ha registrado correctamente.");


		public function index( $value = '' )
		{
			$this->all($value);
		}

		public function all( $value = '' ){

			$this->load->model('user');
			$where = array('status !=' => 'REMOVED');
			$users = $this->user->loadAll( $where );
			$js_files = array(
					base_url().'assets/js/jquery.dataTables.js',
					base_url().'assets/js/datatable_bootstrap.js',
					base_url().'assets/js/form_validation.js',
					base_url().'assets/js/userAll.js'
					 );
			$css_files = array(
					 base_url().'assets/css/datatable_bootstrap.css'
					);

			$this->smarty->assign('past_controller', base_url().'user');
			$this->smarty->assign('controller', base_url().'user/all');
			$this->smarty->assign('users', $users);
			$output = $this->smarty->fetch('userAll.tpl');
			$this->smarty->assign('output',$output);
			$this->smarty->assign('css_files',$css_files);
			$this->smarty->assign('js_files',$js_files);
			$this->smarty->display('index.tpl');
		}

		public function add( $value = '' ){
			$this->load->model('system');
			$arraySystems = $this->system->loadSyatemsAndRoles();

			$js_files = array(
					 base_url().'assets/template/js/jquery-ui-1.10.3.full.min.js',
					 base_url().'assets/js/userCreate.js',
					 base_url().'assets/js/form_validation.js',
					 base_url().'assets/js/datepicker_spanish.js'
					 );
			$css_files = array(
					'http://code.jquery.com/ui/1.10.3/themes/smoothness/jquery-ui.css'
					);
			$this->smarty->assign('ajax', base_url().'user/ajaxAdd');
			$this->smarty->assign('ajax_validate', base_url().'user/ajaxValidateAdd');
			$this->smarty->assign('past_controller', base_url().'user');
			$this->smarty->assign('controller', base_url().'user/');
			$this->smarty->assign('arraySystems', $arraySystems);
			$this->smarty->assign('user', '');
			$output = $this->smarty->fetch('userCreate.tpl');
			$this->smarty->assign('output', $output);
		    $this->smarty->assign('css_files', $css_files);
		    $this->smarty->assign('js_files', $js_files);
		    $this->smarty->display('index.tpl');
		}

		public function edit( $value = '' ){

			$this->load->model('user');
			$this->load->model('system');
			$arraySystems = $this->system->loadSyatemsAndRoles();
			$userid = array('id' => $value);
			if ($this->user->load($userid)){
				if ($this->user->loadRoles()){
					$userRoles = $this->user->getRoles();
					$arraySystems = $this->joinRolesUser($arraySystems, $userRoles );
				}
				$js_files = array(
						 base_url().'assets/template/js/jquery-ui-1.10.3.full.min.js',
						 base_url().'assets/js/userCreate.js',
						 base_url().'assets/js/form_validation.js',
						 base_url().'assets/js/datepicker_spanish.js'
						 );
				$css_files = array(
						'http://code.jquery.com/ui/1.10.3/themes/smoothness/jquery-ui.css'
						);
				$this->smarty->assign('ajax', base_url().'user/ajaxEdit');
				$this->smarty->assign('ajax_validate', base_url().'user/ajaxValidateEdit');
				$this->smarty->assign('past_controller', base_url().'user');
				$this->smarty->assign('controller', base_url().'user/');
				$this->smarty->assign('arraySystems', $arraySystems);
				$this->smarty->assign('user', $this->user);
				$output = $this->smarty->fetch('userCreate.tpl');
				$this->smarty->assign('output', $output);
				$this->smarty->assign('css_files', $css_files);
				$this->smarty->assign('js_files', $js_files);
				$this->smarty->display('index.tpl');
			}else{
				$message = '<div class="alert alert-error modal-message"><span class="icon"></span><p>No se ha encontro el usuario.</p><a href="'.base_url().'user">Volver al inicio</a></div>';
				$this->smarty->assign('output', $message);
				$this->smarty->assign('css_files', '');
				$this->smarty->assign('js_files', '');
				$this->smarty->display('index.tpl');
			}
		}

		public function ajaxAdd(){
			if(!$this->input->is_ajax_request()){
				show_404();
			}else{
				$vendedor = false;

				if($vendedor == false){
					$this->load->model('user');
					$data = $this->input->post();
					$roles = $this->orderRoles($data['inputSelect']);
					$data = $this->orderInsertUser($data);
					$this->user->set($data);
					$success = $this->user->save($data);
					$this->user->setRoles($roles);
					$this->user->saveRoles($roles);
				}else{
					/*
						aqui se carga el modelo vendedor. para añadir datos.
					*/
				}
				$response['validate'] = $this->errorMessage[$success];
				$success = array('response_message' => $response,
								 'success'      => $success
							     );
				echo json_encode($success);

			}
		}

		public function ajaxDelete( $userId )
		{
			if(!$this->input->is_ajax_request()){
				show_404();
			}else{
				$this->load->model('user');
				$this->user->load(array('id'=>$userId));
				$name = $this->user->get('name');
				$this->user->set(array('status'=>'REMOVED'));
				if($this->user->status_Delete()){
					$success['success_message'] = array('success' => 'Se ha removido el usuario '.$name['name']);
					$success['success']			= true;
					$success['success_url']		= '/all';
				}else{
					$success['error_message'] = array('success' => 'No se ha podido remover el usuario '.$name['name']);
					$success['success']			= false;
				}
				echo json_encode($success);
			}
		}

		public function ajaxEdit()
		{
			if(!$this->input->is_ajax_request()){
				show_404();
			}else{
				echo json_encode($success);
			}
		}

		public function ajaxValidateEdit(){
			if(!$this->input->is_ajax_request()){
				show_404();
			}else{
				$success = array();
				$this->load->library('form_validation');
				$val = $this->form_validation;
				$val->set_rules('username',				'Usuario', 				'trim|required|min_length[4]|max_length[40]|alpha_dash');
				$val->set_rules('inputPassword',		'Contraseña', 			'matches[inputPasswordConfirm]');
				$val->set_rules('inputPasswordConfirm', 'Confirmar Contraseña', '');
				$val->set_rules('inlineSelect[]',		'Roles de Sistema', 	'');
				$val->set_rules('inputNombre',			'Nombre', 				'alpha|trim|required|min_length[4]|max_length[40]');
				$val->set_rules('inputApellido',		'Apellido', 			'alpha|trim|required|min_length[4]|max_length[40]');
				$val->set_rules('inputEmail',			'Email', 				'trim|required|valid_email');
				$val->set_rules('inputSex[]',			'Sexo', 				'required');
				$val->set_rules('inputDate',			'Fecha de nacimiento',  'callback_validate_date');
				if (!$val->run()){
					$success['success_error_message'] = $val->error_array();
					$success['success']				  = false; //cambiar a false
				}else{
					$success['success'] = true;
				}
				echo json_encode($success);
			}
		}

		public function ajaxValidateAdd(){
			if(!$this->input->is_ajax_request()){
				show_404();
			}else{
				$vendedor = false; /* Cuando sea vendedor. */
				$success = array();
				$this->load->library('form_validation');
				$val = $this->form_validation;
				$val->set_rules('username',				'Usuario', 				'trim|required|min_length[4]|max_length[40]|is_unique[user.login]|alpha_dash');
				$val->set_rules('inputPassword',		'Contraseña', 			'required|matches[inputPasswordConfirm]');
				$val->set_rules('inputPasswordConfirm', 'Confirmar Contraseña', 'required');
				$val->set_rules('inlineSelect[]',		'Roles de Sistema', 	'');
				$val->set_rules('inputNombre',			'Nombre', 				'alpha|trim|required|min_length[4]|max_length[40]');
				$val->set_rules('inputApellido',		'Apellido', 			'alpha|trim|required|min_length[4]|max_length[40]');
				$val->set_rules('inputEmail',			'Email', 				'trim|required|valid_email|is_unique[user.email]');
				$val->set_rules('inputSex[]',			'Sexo', 				'required');
			//	$val->set_rules('inputDate',			'Fecha de nacimiento',  'callback_validate_date');
				if ($vendedor){
					/*
						reglas para los vendedores.
					*/
				}
				if (!$val->run()){
					$success['success_error_message'] = $val->error_array();
					$success['success']				  = false; //cambiar a false
				}else{
					$success['success'] = true;
				}
				echo json_encode($success);
			}
		}

		public function validate_date($incoming_date)
		{
			$val = $this->form_validation;
			if (preg_match("^\d{2}/\d{2}/\d{4}^", $incoming_date)){
				$date_array = explode('/', $incoming_date);
				if(! checkdate($date_array[1], $date_array[0], $date_array[2])){
					$val->set_message('validate_date', 'El campo %s tiene que tener un formato (dd/mm/yyyy).');
					return false;
				}
				$today = getdate();
				if($date_array[0] > $today['mday'] || $date_array[1] > $today['mon'] || $date_array[2] > $today['year'] ){
					$val->set_message('validate_date', 'El campo %s no puede ser mayor a la fecha actual.');
					return false;
				}
			}else{
				$val->set_message('validate_date', 'El campo %s tiene que tener un formato (mm/dd/yyyy).');
				return false;
			}
		return true;
		}

		private function joinRolesUser($systemRoles, $userRoles){
			foreach ($userRoles as $key => $value){
				foreach ($systemRoles as $k => $v){
					if ($v['id'] == $value['system_id']){
						foreach ($systemRoles[$k]['roles'] as $j => $e) {
							if ($e['id'] == $value['role_id'] ){
								$systemRoles[$k]['roles'][$j]['status'] = true;
							}
						}

					}
				}
			}
			return $systemRoles;
		}

		private function orderInsertUser( $data ){
			$aux = array();
			$aux['name'] =			 $data['inputNombre'];
			$aux['last_name'] =		 $data['inputApellido'];
			$aux['login'] =			 $data['username'];
			$aux['password'] = 		 sha1($data['inputPassword']);
			$aux['password_s'] = 	 $data['inputPassword'];
			$aux['email'] =			 $data['inputEmail'];
			$aux['sex'] =			 $data['inputSex'][0];
			$aux['specialization'] = 'usuario';
			$aux['date_birth'] =	 date('Y-m-d',strtotime($data['inputDate']));
			$aux['status'] = 		 'ACTIVE';
			return $aux;
		}

		private function orderRoles( $roles ) {
			$datos = array();
			foreach ($roles as $key => $value){
				if($value!=='false'){
					$datos[]['role_id']   = $value;
				}
			}
			return $datos;
		}
	}

?>


