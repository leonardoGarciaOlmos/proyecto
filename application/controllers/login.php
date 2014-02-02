<?php
	class Login_Controller extends CI_Controller{

		public function index( $value = '' )
		{
			 $this->smarty->display('auth/login.tpl');
		}
	}