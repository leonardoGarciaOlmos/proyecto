<?php
	class notas_Controller extends CI_Controller{

		public function index( $value = '' )
		{
			$this->all($value);
		}


		function all($operacion=0)
		{
			$output->js_files['hgjfjfjfyjgfyl'] = base_url().'assets/js/bootstrap-editable.min.js';
		    $output->js_files['hgfjfjfjfyjgfyl'] = base_url().'assets/js/ace-editable.min.js';
		    $output->js_files['hgfjfdsfjfjfyjgfyl'] = base_url().'assets/js/fuelux.spinner.min.js';
		    $output->js_files['hgfjfjfjfyjgfsyl'] = base_url().'assets/js/notas.js';
		    $output->js_files['jdjdjdjdd']= base_url().'assets/js/bootbox.min.js';

		    $output->css_files['hgjfjfjfyjdsfyl'] = '';
			
		    $this->load->model('notas','nota');
			$this->smarty->assign('notas',$this->nota->get_notas());

		    $this->smarty->assign('base_url',$this->config->item("base_url"));
		    $vista = $this->smarty->fetch('notas_admin.tpl');
		    $this->smarty->assign('output',$vista);
		    $this->smarty->assign('css_files',$output->css_files);
		    $this->smarty->assign('js_files',$output->js_files);
		    $this->smarty->display('index.tpl');
		}

		function prueba(){
			$notas = $this->input->post("notas");
			print_r($notas);
		}
	}