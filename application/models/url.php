<?php

	/**
		@author Jhoynerk Caraballo
	*/
	class Url extends MY_Model{

		protected $id;
		protected $systemId;
		protected $url;
		protected $isMenu;
		protected $operations;

		public function __construct(){
			parent::__construct();
		}

		public function load( $id ){
			if(!is_array($id)){
				$id = array('url_id' => $id);
			}
			return $this->durl->getUrlBy($id);
		}

		public function loadMenu( $systemId ){
			return $this->durl->getMenuBySystem($systemId);
		}

		public function loadMenuChildren( $systemId ){
			return $this->durl->getMenuChildrenBySystem($systemId);
		}

		public function getUrlPermision( $role_id )
		{
			$urls = $this->durl->getUrlPermision( $role_id );
			foreach ($urls as $key => $value) {
				$urls[$key]['operations'] = explode(',', $value['operations']);
			}
			return $urls;
		}

		public function saveMenu( $menuData ){
			$return['success'] = true;
			$return['response_message'] = array('message' => 'Se ha insertado completamente todos los datos');
			foreach ($menuData as $key => $value){
				if($key!='delet'){
				//	var_dump($key,$value);
					if($this->durl->getMenuById($value['url_id'])){
						$return['success'] = $this->durl->updateMenu($value, $value['url_id']);
					}else{
						$return['success'] = $this->durl->insertMenu($value);
					}
				}else{
					if(is_array($menuData['delet'])){
						$return['success'] = $this->durl->deleteMenu($value);
					}
				}

				if($return['success'] == false){
					
					$return['response_message'] =  array('message' => 'Ha ocurrido un error al intentar insertar todos los datos');
					break;
				}
			}
			return $return;
		}


		public function IsMenu()
		{
			return $this->get('isMenu');
		}

		public function create()
		{
			# code...
		}

		public function update()
		{
			# code...
		}

		public function delete()
		{
			# code...
		}
	}
