<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

	class HTemplate{
		public function index(){
			$ci =& get_instance();
			$styles = $ci->config->item('ci_css');
			$stylesIE7 = $ci->config->item('ci_css_IE7');
			$stylesIE8 = $ci->config->item('ci_css_IE8');
			$font = $ci->config->item('ci_fonts');
			$js = $ci->config->item('ci_js');
			$jsIE = $ci->config->item('ci_js_IE');
			$assetPath = base_url().'assets/template/';
			$ci->smarty->assign(
				array('styles' => $styles,
					  'stylesIE7' => $stylesIE7,
					  'stylesIE8' => $stylesIE8,
					  'font' => $font,
					  'js' => $js,
					  'jsIE' => $jsIE));
			$ci->smarty->assign('assetPath', $assetPath);
			$ci->smarty->assign('ciPath', base_url());
			$ci->smarty->assign('currentUrl', current_url());
			$ci->load->model('system');
			//$ci->system->loadMenu($systemId);

		}

		public function hMenu(){
			$ci =& get_instance();
			$ci->load->model('system');
			$array = $ci->system->loadMenu(12); /* Falta el parametro del roleId */
			//print_r($array);
			$ci->smarty->assign('menu', $array);
		}

	}