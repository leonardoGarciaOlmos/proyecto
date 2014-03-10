<?php
	class download_controller extends CI_Controller{
		function __construct()
		{
			// Llamando al contructor del Modelo
			parent::__construct();
			$this->load->library("mpdf");
		}

		public function index($value='')
		{
			$this->all($value);

		}

		public function test(){
	        $this->mpdf->mPDF('utf-8','A4');
	        //PASAMOS LA RUTA DONDE ESTA EL ESTILO
	        $stylesheet = file_get_contents('assets/css/reports/template.css');
	        // '/assets/css/reports/template.css'
	        var_dump($stylesheet);
	        //cargamos el estilo CSS
	        $this->mpdf->WriteHTML($stylesheet,1);
	        //CARGAMOS LOS PARAMETROS
	        $data['nombre'] = "Renatto NL";
	        //OBTENEMOS LA VISTA EN HTML
	        $html = $this->load->view('reports/template.php', $data, true);
	        //ESCRIBIMOS AL PDF
	        $this->mpdf->WriteHTML($html,2);
	        //SALIDA DE NUESTRO PDF
	        $this->mpdf->Output();
	    }

}
?>