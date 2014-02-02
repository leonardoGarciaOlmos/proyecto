<?php

	class CoreInfoNew{

		private $system;
		private $activeRole;
		private $user;
		private $data;
		private $config;

		public function __construct(){
			$this->_init();
		}
		
		public function loadConfig($config){
			$this->config = $config;

			if( $this->config['SYSTEM_NAME'] != $this->system->get('name')['name'] ){
				if( isset($this->config['SYSTEM_ALIAS']) && ! empty( $this->config['SYSTEM_ALIAS'] ) ){
					$this->data->loadSystem( $this->config['SYSTEM_ALIAS'] );
					$this->_initSystem();
					$this->_initActiveRole();
					return true;
				}else{
					throw new Exception("Error en la configuración del nucleo");
				} 
			}
		}



		public function _init(){
			$this->_initData();
			$this->_initSystem();
			$this->_initUser();
			$this->_initActiveRole();
		}

		private function _initData( ){
			$this->data = new Data( );
		}

		private function _initSystem( ){
			$this->currentSystem = $this->data->getCurrentSystem();
		}

		private function _initUser( ){
			$this->currentUser = $this->data->getCurrentUser();
		}

		private function _initActiveRole( ){
			$this->activeRole = $this->data->getActiveRole();
		}

		public function validateAccess( ){
			if( isset( $this->config['SYSTEM_NAME'] ) && ! empty( $this->config['SYSTEM_NAME']) ){
				return ( $this->system->validateUrl( $this->config['url'] ) )? true : false;
			}else{
				throw new Exception("Error en la configuración del nucleo");
			}
		}

		public function login( $user , $password ){

		} 



		/*

		public function signIn($user, $password){

		}

		*/

		public function checkLogin( ){
			$user = $this->data->getCurrentUser();
			return ( $user )? true : false;
		}



		/*

			Notas : por cada proceso, si se actualiza un dato persistente 
			en la capa de datos, 

			- Es necesario que la capa data siempre mantenga la congruencia de sus datos
			esta no es tarea inherente al proceso de los metodos de coreInfo


			METODOS DE CLASE DATA

				getCurrentSystem();
				getCurrentUser();
				getActiveRole();

			Coreinfo debe conocer donde esta ubicado el login tanto .NET como .COM

			verificar tema de llamados a metodo get en mymodel

			El controlador debe obtener el nombre de metodo y controlador

		*/











	}