<?php

class MY_Model extends CI_Model {
	private $_dataModel;

		function __construct( )
		{
			parent::__construct();

			$className = get_class($this);
			if($className !== 'MY_Model'){
				$classAlias = strtolower('d'.$className);
				$this->_dataModel = $classAlias;
				$this->load->model("data/$classAlias",$classAlias);
			}
		}

		public function get( $attributes )
		{
			$todos = ( $attributes == 'all' );
			$attributes = $todos ? $this: explode(',', $attributes);
			$Aux = [];
			foreach ($attributes as $key => $value){
				$value = (!$todos)?$value:$key;
				$value = trim($value);
				if(property_exists($this, $value) && !($value === '_dataModel') ){
					$Aux[$value] = $this->$value;
				}
			}
			return $Aux;
		}

		public function set( $attributes )
		{
			foreach ($attributes as $key => $value){
				$key = trim($key);
				if(property_exists($this, $key) && !($key === '_dataModel') ){
					if(!is_array($value)){
						$this->$key = $value;
					}else{
						$this->$key = $value;
					}
				}
			}
		}

		public function save( )
		{
			$nameModelD = $this->_dataModel;
			//if($this->validate()){
				if ($this->id === null){
					if($this->$nameModelD->insert($this)){
						return true;
					}else{
						return false;
					}
				}else{
					return $this->$nameModelD->update($this);
				}
			//}
		}

		public function validate()
		{
			return true;
		}

		public function reset( )
		{
			foreach ($this as $key => $value){
				if(property_exists($this, $key) && !($key === '_dataModel') ){
					$this->$key=null;
				}
			}
		}

		public function arrayToObj($data)
		{
			return is_array($data) ? (object) array_map(__FUNCTION__,$data) : $data;
		}

}
