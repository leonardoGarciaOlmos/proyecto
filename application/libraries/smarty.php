<?php
	/*
		Descripcion: Clase para redefinir el comportamiento de la clase smarty dentro
		de codeigniter
	*/
	if(!defined('BASEPATH'))
		exit('Acceso denegado');

	require_once(APPPATH.'libraries/smarty/libs/Smarty.class.php');

	class CI_Smarty extends Smarty{

		function __construct(){
			parent::__construct();
			$this->setTemplateDir(APPPATH.'views/templates');
			$this->setCompileDir(APPPATH.'views/compiled');
			$this->setConfigDir(APPPATH.'libraries/smarty/configs');
			$this->setCacheDir(APPPATH.'libraries/smarty/cache');


			$this->assign( 'APPPATH', APPPATH );
			$this->assign( 'BASEPATH', BASEPATH );

			if (method_exists( $this, 'assignByRef'))
			{
				$ci =& get_instance();
				$this->assignByRef("ci", $ci);
			}
			$this->force_compile = 0;
			$this->caching = false;
			$this->cache_lifetime = 120;
		}

		function view($template_name){
			if ((strpos($template_name, '.') === FALSE) && (strpos($template_name, ':') === FALSE)){
				$template_name .= '.tpl';
			}
			parent::display($template_name);
		}


	}
?>