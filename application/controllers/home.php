<?php
	class Home_Controller extends CI_Controller{

		public function index( $value = '' )
		{
			if(!$this->dx_auth->is_logged_in()){
				redirect($base_url.'/auth/');
			}
			$js_files['dfsdf'] = base_url().'assets/js/base_dato.js';
			$output ='';

		    $this->smarty->assign('output', $output);
		    $this->smarty->assign('css_files','');
		    $this->smarty->assign('js_files',$js_files);
		    $this->smarty->display('index.tpl');
		
		}
	}