<?php
	class Ejemplo_Controller extends CI_Controller{

		public function index($value='')
		{
			$styles = $this->config->item('ci_css');
			$stylesIE7 = $this->config->item('ci_css_IE7');
			$stylesIE8 = $this->config->item('ci_css_IE8');
			$font = $this->config->item('ci_fonts');
			$js = $this->config->item('ci_js');
			$jsIE = $this->config->item('ci_js_IE');
			$assetPath = base_url().'assets/template/';
			// $this->smarty->assign('font', $font);
			/*$ci->smarty->assign('js', $js);
			$ci->smarty->assign('assetPath', $assetPath);*/
			try{
			$this->load->library('grocery_crud');
		      /* Creamos el objeto */
		      $crud = new grocery_CRUD();
		      /* Seleccionamos el tema  twitter-bootstrap datatables flexigrid */
		      $crud->set_theme('twitter-bootstrap');
		      /* Seleccionmos el nombre de la tabla de nuestra base de datos*/
		      $crud->set_table('system');
		      /* Le asignamos un nombre */
		      $crud->set_subject('Sistemas');
		      /* Asignamos el idioma español */
		      $crud->set_language('spanish');
		      /* Aqui estan todos los datos que se mostraran*/
		      $crud->fields(
		        'id','name','alias','url','path','logo'
		      );
		      /* Aqui le indicamos que campos deseamos mostrar en el data table */
		      $crud->columns(
		        'id','name','alias'
		      );

		      /* Aqui deshabilito el boton de imprimir */
		      $crud->unset_print();

		      $output = $crud->render();

		      //$this->load->view('productos/administracion', $output);
		    }catch(Exception $e){
		      /* Si algo sale mal cachamos el error y lo mostramos */
		      show_error($e->getMessage().' --- '.$e->getTraceAsString());
		    }

		    //var_dump($output);
		    $this->smarty->assign(
				array('styles' => $styles,
					  'stylesIE7' => $stylesIE7,
					  'stylesIE8' => $stylesIE8,
					  'font' => $font,
					  'js' => $js,
					  'jsIE' => $jsIE));

		    $this->smarty->assign('output',$output->output);
		    $this->smarty->assign('css_files',$output->css_files);
		    $this->smarty->assign('js_files',$output->js_files);
		    $this->smarty->assign('assetPath', $assetPath);

			$this->smarty->display('index1.tpl');


			/*** user */
			// $this->load->model('user');
			// $userId = array('id'=>3);
			// $this->user->load($userId);
			// $this->user->loadRoles();
			// $this->user->getUrls();
			// var_dump($this->user->get('all'));
			// var_dump($this->user->getRole(3));
			// var_dump($this->user->delete());
			// var_dump($this->user->get('all'));
			// $dataUser = array('name' => 'daniel Castillo', 'email'=>'danielcfe' );
			// $this->user->set($dataUser);
			// $this->user->save();
			// $this->user->delete();
			// $this->user->delete();
			// $this->user->set(array('login' => 'jhoynerk'));
			// $this->user->save();

			/** role*/
			// this->load->model('role');
			// var_dump($this->user);

			/** system*/
			// $this->load->model('system');
			// $systemId =  array('id'=>1);
			// $this->system->load($systemId);
			// var_dump($this->system->loadUrls(1));
			// $this->system->getUrls();
			// var_dump($this->system->get('all'));
			// var_dump($this->system->validateUrl('http:\\www.google/pepito/.com'));
			// $this->system->set(array('name' => 'Sistema en Prueba'));
			// $this->system->save();
			// $dataSystem = array('urls' => array('casa','put'));
			// var_dump($this->system->set($dataSystem));
			// var_dump($this->system->save());
			// var_dump($this->system->delete());
			// $this->system->reset();
			// var_dump($this->system->delete());
			// $dataSystem = array(
			// 					'name' => 'sistema211',
			// 					'path' => 's211',
			// 					'alias'=> 'sis',
			// 					'url'  => 'http\ww.s211.com',
			// 					);
			// $this->system->set($dataSystem);
			// $this->system->save();

		}

		public function prueba(){
			$styles = $this->_stylesToArray();
			$js = $this->_jsToArray();
			$assetPath = base_url().'asset/';
			$this->smarty->assign('styles', $styles);
			$this->smarty->assign('js', $js);
			$this->smarty->assign('assetPath', $assetPath);
			$this->smarty->caching = 0;
			$this->smarty->view('index');
			//$this->load->view('prueba_view');
		}
	}
?>