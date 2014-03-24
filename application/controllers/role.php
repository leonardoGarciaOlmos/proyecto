<?php
	class Role_controller extends CI_Controller{

		private $systemId;


		function __construct(){ 
			parent::__construct(); 
			$this->dx_auth->need_login();
		}

		public function index($systemId = 4)
		{
			/*$this->load->model('role');
			var_dump($this->role);*/
			$this->all($systemId);

		}

		public function getUrlsByRole($roleId, $systemId){
			$this->load->model('system');
			$this->system->load(array('id'=>$systemId));
			$this->system->loadUrls($roleId);
			echo json_encode($this->system->get('urls')['urls']);
		}

		public function all($systemId = 0, $operation = '', $roleId = 0){

			$this->systemId = $systemId;
			$this->load->model('system');
			$this->load->model('role');
			$this->system->load(array('id'=>$systemId));

			try{
				$this->load->library('grocery_crud');
			    $crud = new grocery_CRUD();
		      	$crud->set_theme('twitter-bootstrap');
		      	$crud->set_language('spanish');
		     	$crud->set_table('role')
		      		 ->set_subject('Roles')
		      		 ->columns('name')
		      		 ->add_fields('name', 'system_id' ,'role_id', 'roles', 'permission')
		      		 ->edit_fields('name', 'system_id', 'role_id', 'permission')
		      		 ->field_type('system_id', 'hidden', $systemId)
		      		 ->field_type('role_id', 'hidden', $roleId)
		      		 ->display_as('name', 'Nombre Rol')
		      		 ->display_as('roles', 'Roles')
		      		 ->display_as('permission', 'Permisos')
		      		 ->where('system_id', $systemId);

		      	$crud->set_rules('name', 'Nombre Rol', 'required|callback_unique_name_check|alpha|min_length[5]|max_length[44]');

		      	$crud->callback_add_field('roles', array($this, 'roles_field_add_callback'));
		      	$crud->callback_field('permission', array($this,'permission_field_add_callback'));
		      	$crud->callback_after_update(array($this, 'role_after_update'));
		      	$crud->callback_after_insert(array($this, 'role_after_insert'));
		      	$crud->callback_delete(array($this, 'role_delete'));

		      	$crud->unset_print();

		      	$output = $crud->render();
		    }catch(Exception $e){
		     	show_error($e->getMessage().' --- '.$e->getTraceAsString());
		    }

		    $output->js_files['hdghjddtjdtjd'] = base_url().'assets/chosen/chosen.jquery.min.js';
		    $output->js_files['jyjkyhkhkghkk'] = base_url().'assets/js/prueba.js';
		  	$output->js_files['hgjfjfjfyjfyj'] = base_url().'assets/js/roleSelect.js';
		  	$output->js_files['hgjfjfjfyjfyl'] = base_url().'assets/js/eliminar.js';

		    $this->smarty->assign('output',$output->output);
		    $this->smarty->assign('css_files',$output->css_files);
		    $this->smarty->assign('js_files',$output->js_files);
		    $this->smarty->display('index.tpl');
		}

		// Validation

		public function unique_name_check( $text ){
			$roleId = $this->uri->segment(5);
			$this->role->load( $roleId );
			if( $this->role->validate( $text ) ){
				return true;
			}else{
				$this->form_validation->set_message('unique_name_check', "El campo %s ya esta registrado.");
				return false;
			}
		}

		public function delete($primaryKey){
			$this->load->model('role');
			$this->role->load($primaryKey);
			$response = array();

			if(!$this->role->hasUser()){
				$this->role->deleteUrls();
				$this->role->delete();
				$response['success'] = 'true';
				echo json_encode($response);
			}
			else{
				$response['error'] = 'true';
				echo json_encode($response);
			}
		}

		public function role_after_insert($postArray, $primaryKey){

			$this->role->load($primaryKey);
			$this->role->set(array('systemId'=>$this->systemId));
			$this->role->save();

			if(isset($postArray['urls'])){
				$arrayUrls = $postArray['urls'];
				$this->role->insertUrlsByRole($this->postToUrlArray($arrayUrls));
			}
		}

		public function role_after_update($postArray, $primaryKey){
			$this->role->load($primaryKey);
			$this->role->deleteUrls();

			if(isset($postArray['urls'])){
				$arrayUrls = $postArray['urls'];
				$this->role->insertUrlsByRole($this->postToUrlArray($arrayUrls));
			}
		}

		public function roles_field_add_callback(){
			$roles = $this->system->getRoles();
			$this->smarty->assign('roles', $roles);
			$this->smarty->assign('asset', base_url().'assets');
			return $this->smarty->fetch('roleSelect.tpl');
		}

		public function permission_field_add_callback(){
			$this->system->loadUrls();
			$items = $this->urlToArray($this->system->get('urls')['urls']);
			$this->smarty->assign('items', $items);
			return $this->smarty->fetch('rolecontent.tpl');
		}

		public function urls($primaryKey , $row){
			return site_url().'rolehasurl/index/'.$row->role_id;
		}

		private function urlToArray($urls){
			$i = 0;
			foreach($urls as $name => $url){
				$item = array();
				$item['id'] = $url['id'];
				$auxUrl = explode('/', $name);
				$item['controller'] = $auxUrl[0];
				$item['url'] = $auxUrl[1];
				$auxOperations = explode(',', $url['operations']);
				foreach($auxOperations as $key => $value){
					$auxOperations[$value] = '';
					unset($auxOperations[$key]);
				}
				$item['operations'] = $auxOperations;
				unset($urls[$name]);
				$urls[$i] = $item;
				$i++;
			}
			$auxUrls = array();
			$i = 0;
			while( count($urls) > 0 ){
				$url = $urls[0];
				$auxUrls[$i]['name'] = $url['controller'];
				$auxUrls[$i]['subItems'] = array();
				foreach($urls as $j => $auxUrl){
					if($auxUrl['controller'] == $url['controller']){
						$auxUrls[$i]['subItems'][$j]['name'] = $auxUrl['url'];
						$auxUrls[$i]['subItems'][$j]['id'] = $auxUrl['id'];
						$auxUrls[$i]['subItems'][$j]['operations'] = $auxUrl['operations'];
						unset($urls[$j]);
					}
				}
				 $urls = array_values($urls);
				 $i++;
			}
			return $auxUrls;
		}

		private function postToUrlArray($postUrls){
			$urls = array();
			$auxUrls = array();
			foreach($postUrls as $value){
				$url = explode('-', $value);
				$urlOperation = $url[0];
				$urlId = $url[1];
				if(empty($auxUrls[$urlId])){
					$auxUrls[$urlId] = $urlOperation;
				}
				else{
					$auxUrls[$urlId] .= ','.$urlOperation;
				}
			}
			foreach($auxUrls as $urlId => $urlOperations){
				$urls[] = array('id'=>$urlId, 'operations'=>$urlOperations);
			}
			return $urls;
		}
	}
?>