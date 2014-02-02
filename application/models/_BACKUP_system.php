<?php
	/**
		@author Daniel Castillo & Jhoynerk Caraballo
	*/
	class System extends MY_Model{
		protected $id;
		protected $name;
		protected $alias;
		protected $url;
		protected $path;
		protected $logo;
		protected $urls; //  - Url[] urls
		private $menu; //  - Array menu

		public function __construct(){
			parent::__construct();
		}

		public function validate( $element )
		{
			if( is_array( $element ) ){
				return ( $this->get( $element['name'] )[ $element['name'] ] == $element['value'])?
				true : $this->dsystem->validate( $element );
			}else
				return false;
		}

		public function load( $ids )
		{
			if(!is_array($ids)){
				$ids = array('alias' => $ids);
			}
			return $this->dsystem->getSystemBy( $ids );
		}

		public function delete( )
		{
			if ($this->dsystem->delete( $this->id )){
				$this->reset();
				return true;
			}
			return false;
		}

		public function loadUrls( $roleId = 0 )
		{
			if( $roleId == 0 )
				$urls = $this->dsystem->getUrlsBySystem( $this->id );
			else
				$urls = $this->dsystem->getUrlsByRole( $this->id, $roleId );
			$auxUrls = array();
			foreach( $urls as $i => $value ){
				$auxUrls[$value['url']] = array();
				$auxUrls[$value['url']]['id'] = $value['id'];
				$auxUrls[$value['url']]['operations'] = $value['operations'];
			}
			$this->urls = $auxUrls;
			if (count($this->urls)>0){
				return true;
			}
			return false;
		}

		public function loadMenu( $roleId = 0 )
		{
			$urls = $this->dsystem->getMenuByRole( $roleId );
			$auxUrls = array();
			foreach( $urls as $i => $value ){
				if ($value['parent_id'] == 0){
					$auxUrls[$i]['id']   = $value['id'];
					$auxUrls[$i]['name'] = $value['name'];
					$auxUrls[$i]['url']  = $value['url'];
					$auxUrls[$i]['icon'] = $value['icon_class'];
					$auxUrls[$i]['child']= false;
				}
			}
			foreach($auxUrls as $i => $value){
				$cont = 0;
				foreach($urls as $j => $val){
					if( $auxUrls[$i]['id'] === $val['parent_id'] ){
						$auxUrls[$i]['child'][$cont]['name']  = $val['name'];
						$auxUrls[$i]['child'][$cont++]['url'] = $val['url'];
					}
				}
			}
			return $auxUrls;
		}

		public function validateUrl( $url )
		{
			if (count($this->urls)>0){
				foreach ($this->urls as $key => $value) {
					if ($url == $value['url']){
						return true;
					}
				}
			}
			return false;
		}

		public function getRoles(){
			return $this->dsystem->getRolesBySystem($this->id);
		}

		private function checkOperation($url, $operation){
			return (strpos($this->urls[$url]['operations'], $operation) !== false)?'true':'false';
		}

		public function canCreate($url){
			return $this->checkOperation($url ,'C');
		}

		public function canRead($url){
			return $this->checkOperation($url ,'R');
		}

		public function canUpdate($url){
			return $this->checkOperation($url ,'U');
		}

		public function canDelete($url){
			return $this->checkOperation($url ,'D');
		}

		public function checkPermission($url){
			return isset($this->urls[$url]);
		}


	}
