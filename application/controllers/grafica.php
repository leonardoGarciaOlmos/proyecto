<?php
class Grafica_Controller extends CI_Controller
{
	function __construct()
	{
		// constructor
		parent::__construct();
	}


	function graphics_alumno_carrera()
	{
		// Variables del template
		$this->smarty->assign('graphics', 1);

		// Template
		$output = $this->smarty->fetch('grafica.tpl');

		// Librerias
		$js_files = array(base_url().'assets/js/highcharts.js',
				          base_url().'assets/js/grafica.js');
		$css_files = array("");

	    $this->smarty->assign('output', $output);
	    $this->smarty->assign('css_files', $css_files);
	    $this->smarty->assign('js_files', $js_files);
	    $this->smarty->display('index.tpl');
	}

	function json_all_alumno_carrera()
	{
		// Carga de los modelos
		$this->load->model('Grafica');

		// Se realiza la petición para las carreras
		$row = $this->Grafica->all_alumno_carrera();

		echo json_encode($row);
	}

}
?>