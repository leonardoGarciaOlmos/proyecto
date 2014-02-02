<?php
	$ci =& get_instance();
	$config['ci_css'] = array(
			$ci->config->base_url().'assets/template/css/bootstrap.min.css',
			$ci->config->base_url().'assets/template/css/bootstrap-responsive.min.css',
			$ci->config->base_url().'assets/template/css/font-awesome.min.css',
			$ci->config->base_url().'assets/template/css/ace.min.css',
			$ci->config->base_url().'assets/template/css/ace-responsive.min.css',
			$ci->config->base_url().'assets/template/css/style-skin.css',
			$ci->config->base_url().'assets/template/css/style.css',
		);

	$config['ci_css_IE7'] =  array(
			$ci->config->base_url().'assets/template/css/font-awesome-ie7.min.css'
		);

	$config['ci_css_IE8'] = array(
			$ci->config->base_url().'assets/template/css/ace-ie.min.css'
		);

	$config['ci_fonts'] = array(
			'//fonts.googleapis.com/css?family=Open+Sans:400,300'
		);

	$config['ci_js'] = array();

	$config['ci_js_IE'] = array();



