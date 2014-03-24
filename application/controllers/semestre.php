<?php
class Semestre_Controller extends CI_Controller
{

	function __construct(){ 
		parent::__construct(); 
		$this->dx_auth->need_login();
	}


	public function add()
	{
		// Carga de los modelos
		$this->load->model('Departamento');

		// Variables del template
		$this->smarty->assign('depart', $this->Departamento->all_departamento());

		// Template
		$output = $this->smarty->fetch('semestre-add.tpl');
		$js_files = array(base_url().'assets/template/js/jquery-ui-1.10.3.full.min.js',
						  base_url().'assets/grocery_crud/js/jquery_plugins/ui/i18n/datepicker/jquery.ui.datepicker-es.js',
						  base_url().'assets/js/semestre.js',
						  base_url().'assets/js/pensum.js',
						  base_url().'assets/js/bootbox.min.js');
		$css_files = array(base_url().'assets/grocery_crud/css/ui/simple/jquery-ui-1.10.1.custom.min.css');


		$this->smarty->assign('output', $output);
	    $this->smarty->assign('css_files', $css_files);
	    $this->smarty->assign('js_files', $js_files);
	    $this->smarty->display('index.tpl');
	}


	public function close()
	{
		// Carga de los modelos
		$this->load->model('Departamento');

		// Variables del template
		$this->smarty->assign('depart', $this->Departamento->all_departamento());

		// Template
		$output = $this->smarty->fetch('semestre-close.tpl');
		$js_files = array(base_url().'assets/template/js/jquery-ui-1.10.3.full.min.js',
						  base_url().'assets/js/jquery.easy-pie-chart.min.js',
						  base_url().'assets/grocery_crud/js/jquery_plugins/ui/i18n/datepicker/jquery.ui.datepicker-es.js',
						  base_url().'assets/js/semestre.js',
						  base_url().'assets/js/pensum.js',
						  base_url().'assets/js/bootbox.min.js');
		$css_files = array(base_url().'assets/grocery_crud/css/ui/simple/jquery-ui-1.10.1.custom.min.css');


		$this->smarty->assign('output', $output);
	    $this->smarty->assign('css_files', $css_files);
	    $this->smarty->assign('js_files', $js_files);
	    $this->smarty->display('index.tpl');
	}



	public function insert_periodo_semestre()
	{
		$objectSemestre = $_POST['semestre'];

		// Carga de los modelos
		$this->load->model('Pensum');
		$this->load->model('Semestre');

		// Total de semestre de un pensum
		$semestreAll = $this->Pensum->row_semestre_pensum($objectSemestre['pensum']);

		// Validar los pensum que se van a abrir
		for ($i=1; $i <= $semestreAll ; $i++) 
		{ 
			$num = $i%2;

			if($objectSemestre['semestre'] == 1 && $num == 0) // SEMESTRES PARES
				$this->Semestre->insert($objectSemestre['carrera'], $objectSemestre['pensum'], $i, $objectSemestre['fecINI'], $objectSemestre['fecFIN']);
			elseif ($objectSemestre['semestre'] == 2 && $num != 0) // SEMESTRES IMPARES
				$this->Semestre->insert($objectSemestre['carrera'], $objectSemestre['pensum'], $i, $objectSemestre['fecINI'], $objectSemestre['fecFIN']);
		}
	}


	public function delete_periodo_semestre()
	{
		// Carga de los modelos
		$this->load->model('Semestre');

		// Se borra el semestre
		$this->Semestre->delete($_POST['carrera'], $_POST['pensum']);
	}


	public function json_periodo_semestre()
	{
		// Carga de los modelos
		$this->load->model('Semestre');

		// Se realiza la petición de la inserción a la base de dato
		$perioSemestre = $this->Semestre->get_periodo_semestres($_POST['pensum']);

		echo json_encode($perioSemestre);
	}
}
?>