<?php
	class Rolehasurl extends CI_Controller{

		public function index($value = '')
		{
			redirect('rolehasurl/all/'.$value);
		}

		public function all($value = ''){
			try{
				$this->load->library('grocery_crud');
			    $crud = new grocery_CRUD();

		      	$crud->set_theme('twitter-bootstrap');
		      	$crud->set_language('spanish');

		     	$crud->set_table('role')
		      		 ->set_subject('Roles')
		      		 ->columns('name')
		      		 ->display_as('name', 'Nombre Rol')
		      		 ->where('system_id', $value)
		      		 ->set_relation_n_n('URLS', 'role_has_url', 'url', 'role_id', 'url_id', 'url', 'url_id', 'system_id ='.$value);
		      	$crud->fields('name', 'URLS');
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

	}
?>