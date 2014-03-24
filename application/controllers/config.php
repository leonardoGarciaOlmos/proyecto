<?php
	class config_Controller extends CI_Controller{

	function __construct(){ 
		parent::__construct(); 
		$this->dx_auth->need_login();
	}


		public function index( $value = '' )
		{
			$this->all($value);
		}


		function all($operacion=0)
		{
		    $output->js_files['hgjfjfjfyjfyl'] =  base_url().'assets/js/config.js';
		    $output->js_files['hgjfjfjfyjfdsdyl'] =  base_url().'assets/js/jquery-ui-1.10.3.custom.min.js';
		    $output->css_files['hgjfjfjfyjfyl'] = base_url().'assets/css/jquery-ui-1.10.3.full.min.css';

		    $this->smarty->assign('base_url',$this->config->item("base_url"));
		    $vista = $this->smarty->fetch('content-config.tpl');
		    $this->smarty->assign('output',$vista);
		    $this->smarty->assign('css_files',$output->css_files);
		    $this->smarty->assign('js_files',$output->js_files);
		    $this->smarty->display('index.tpl');
		}

		public function save(){
			$exist = false;
			$datos = $this->input->post("datos");
			$config_header = $this->input->post("header");

			$fh = fopen("application/config/system_config".".json", 'r');
			$json = json_decode(fgets($fh));

			if($config_header == "cupos"){
				foreach ($json->config->cupos as $key => $value) {
					if($value->nombre === $datos["nombre"]){
						$exist = true;
					}
				}

				if($exist){
					foreach ($json->config->cupos as $key => $value) {
						if($value->nombre === $datos["nombre"]){
							$value->cantidad = $datos["cantidad"];
						}
					}
				}else{
					array_push($json->config->$config_header, $datos);	
				}

				$fh = fopen("application/config/system_config".".json", 'w');
				$json = json_encode($json,JSON_UNESCAPED_UNICODE);
				fwrite($fh, $json);
				fclose($fh);

			}else{

				$fh = fopen("application/config/system_config".".json", 'w');
				$json->config->$config_header = $datos;
				$json = json_encode($json,JSON_UNESCAPED_UNICODE);
				fwrite($fh, $json);
				fclose($fh);
			}

		}

		public function read(){
			$fh = fopen("application/config/system_config".".json", 'r');
			$this->output->set_content_type('application/json')->set_output(fgets($fh));
		}

		public function load(){
			$this->load->model("docente", "obj");
			$this->output->set_content_type('application/json')->set_output(json_encode($this->obj->get_carreras()));
		}

	}