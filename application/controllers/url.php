<?php
	class Url_Controller extends CI_Controller{
		private $systemId;

		public function index($systemId = '')
		{
			$this->all($systemId);
		}

		public function all($systemId = ''){
			$this->systemId = $systemId;
			try{
				$this->load->library('grocery_crud');
			    $crud = new grocery_CRUD();
		      	$crud->set_theme('twitter-bootstrap');
		      	$crud->set_language('spanish');

		     	$crud->set_table('url')
		      		 ->set_subject('Urls')
		      		 ->columns('url','is_menu')
		      		 ->add_fields('url', 'system_id' ,'is_menu' ,'operations')
		      		 ->edit_fields('url', 'system_id' ,'is_menu' ,'operations')
		      		 ->field_type('system_id', 'hidden', $systemId)
		      		 ->display_as('is_menu', 'Es menu')
		      		 ->where('system_id', $systemId);
		      		$crud->change_field_type('operations', 'enum', array('Crear'=>'C','Leer'=>'R','Actualizar'=>'U','Borrar'=>'D'));
		      	$operation = $crud->getState();
		      	if($operation == 'insert_validation'){
		      		$crud->set_rules('url', 'url', 'required|min_length[5]|max_length[79]');
					$crud->set_rules('is_menu', 'menu', 'required');
		      	}else if($operation == 'update'){
		      		$crud->set_rules('url', 'url', 'required|min_length[5]|max_length[79]');
					$crud->set_rules('is_menu', 'menu', 'required');
			    }
		    	$crud->callback_before_insert(array($this,'fix_url_callback'));
		    	$crud->callback_before_update(array($this,'fix_url_callback'));
				$crud->unset_print();
		      	$output = $crud->render();
		    }catch(Exception $e){
		     	show_error($e->getMessage().' --- '.$e->getTraceAsString());
		    }
		    $this->smarty->assign('output',$output->output);
		    $this->smarty->assign('css_files',$output->css_files);
		    $this->smarty->assign('js_files',$output->js_files);
		    $this->smarty->display('index.tpl');
		}


		function fix_url_callback($post_array) {		 
			$pos = strpos($post_array['url'], '/');
			if ($pos === false) { 
				$post_array['url'] = $post_array['url'].'/';
			}
			return $post_array;
		}

	}
?>