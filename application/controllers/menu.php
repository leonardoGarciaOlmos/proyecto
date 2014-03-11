<?php
	class Menu_Controller extends CI_Controller{

		public function index( $value = '' )
		{
			$this->all($value);
			//redirect('menu/all/'.$value);
		}

		public function all( $value = '' ){

			$this->load->model('url');
			$systemId = array('system_id'=>$value);
			$Menu = $this->url->loadMenu($systemId);
			$MenuChildren = $this->url->loadMenuChildren($systemId);
			$js_files = array(
					 base_url().'assets/js/chosen-font.jquery.js',
					 base_url().'assets/js/tag.js',
					 base_url().'assets/js/icon-array.js',
					 base_url().'assets/js/menu.js',
					 base_url().'assets/js/form_validation.js');
			$this->smarty->assign('datos', $Menu);
			$this->smarty->assign('children', $MenuChildren);
			$this->smarty->assign('past_controller', base_url().'sistema');
			$this->smarty->assign('controller', base_url().'menu');
			$this->smarty->assign('ajax', 'ajax');
			$this->smarty->assign('ajax_validate', 'ajax_validate');
			$output = $this->smarty->fetch('menuContent.tpl');

			$this->smarty->assign('output', $output);
			$this->smarty->assign('css_files','');
			$this->smarty->assign('js_files',$js_files);
			$this->smarty->display('index.tpl');
		}

		public function ajax(){

			if(!$this->input->is_ajax_request()){
				show_404();
			}else{
				$this->load->model('url');
				$data =  $this->input->post();
				$menuData = $this->orderInsertMenu($data);
				$success = $this->url->saveMenu($menuData);
				echo json_encode($success);
			}
		}

		public function ajaxValidate(){

			if(!$this->input->is_ajax_request()){
				show_404();
			}else{
				$this->load->library('form_validation');
				$val = $this->form_validation;
					$error['success']= true;
			}
			echo json_encode($error);

		}

		private function orderInsertMenu( $data ){
			foreach ($data['id'] as $key => $value){
				$name = $data['name'][$key];
				$parent = (strlen($name)>0)? 1 : 0;
				$parent = ($parent == 1)?$parent = $this->idParent( $data, $data['url'][$key] ): $parent;
				if ($parent !== 0){
				$array[$value] = array(
								'url_id' => $data['id'][$key],
								'name' => $data['name'][$key],
								'parent_id' => $parent,
								'icon_class' => $data['icono'][$key]
								);
				}else{
					$arrayDelet[] = $data['id'][$key];
				}

			}
			$array['delet'] = (empty($arrayDelet))?'':$arrayDelet;
			return $array;
		}

		private function idParent( $data, $url ){
			$id = '';
			for ($i = 0; $i < count($data['hijos']); $i++ ){
				$explod = explode(',',$data['hijos'][$i]);
				for ($j = 0; $j < count($explod); $j++ ){
					if(trim($explod[$j])==$url){
						$id = $i;
			 			break 2;
					}
				}
			}
			return ($id==='')?'':$data['id'][$id];
		}

		private function validateMenu( $value ){
			return true;
		}
}

?>