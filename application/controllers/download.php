<?php
	class download_controller extends CI_Controller{
		function __construct()
		{
// $footerE = '<div align="center">See <a href="http://mpdf1.com/manual/index.php">documentation
// manual</a></div>';
// $headerE = '
// <table width="100%" style="border-bottom: 1px solid #000000; vertical-align: bottom; font-family:
// serif; font-size: 9pt; color: #000088;"><tr>
// <td width="33%"><span style="font-weight: bold;">Outer header</span></td>
// <td width="33%" align="center"><img src="sunset.jpg" width="126px" /></td>
// <td width="33%" style="text-align: right;">Inner header p <span
// style="font-size:14pt;">{PAGENO}</span></td>
// </tr></table>
// ';


			// Llamando al contructor del Modelo
			parent::__construct();
			$this->load->library("mpdf");
			$this->mpdf->mPDF('utf-8','A4');
	        //PASAMOS LA RUTA DONDE ESTA EL ESTILO
	        $stylesheet = file_get_contents('assets/css/reports/template.css');
	        $this->mpdf->WriteHTML($stylesheet,1);

			$header = "	<div class='title'>
			<img  class='logo' src='http://localhost/proyecto/assets/template/images/Logo.png' height='60px'>
			<b class='titleh3'>Instituto Universitario Salesiano Padre Ojeda</b>
			<br><b>Control de Estudios</b>
			</div>";

			$footer = '<div align="center">Necesita sello húmedo para ser valido</div>';

			$this->mpdf->SetHTMLHeader($header);
			$this->mpdf->SetHTMLFooter($footer);
			// $this->mpdf->SetHTMLFooter($footerE,'E');
			// $this->mpdf->SetHTMLHeader($headerE,'E');

		}

		public function index($value='')
		{
			$this->all($value);

		}

		public function test(){
	        //PASAMOS LA RUTA DONDE ESTA EL ESTILO
	        $stylesheet = file_get_contents('assets/css/reports/template.css');
	        // '/assets/css/reports/template.css'
	        //cargamos el estilo CSS
	        $this->mpdf->WriteHTML($stylesheet,1);
	        //CARGAMOS LOS PARAMETROS
	       // $data['content'] = "<h1>Renatto NL</h1>";
	        //OBTENEMOS LA VISTA EN HTML
	        $html = $this->load->view('reports/template.php', $data, true);
	        //ESCRIBIMOS AL PDF	        
	        $this->mpdf->WriteHTML($html,2);
	        //SALIDA DE NUESTRO PDF

	        // echo $html;
	        $this->mpdf->Output();
	    }

	     public function test2(){
	        //PASAMOS LA RUTA DONDE ESTA EL ESTILO
	        $stylesheet = file_get_contents('assets/css/reports/template.css');
	        // '/assets/css/reports/template.css'
	        //cargamos el estilo CSS
	        $this->mpdf->WriteHTML($stylesheet,1);
	        //CARGAMOS LOS PARAMETROS
	        $data['content'] = $this->input->post("html");
	        //OBTENEMOS LA VISTA EN HTML
	        $html = $this->load->view('reports/template.php', $data, true);
	        //ESCRIBIMOS AL PDF	        
	        $this->mpdf->WriteHTML($html,2);
	        //SALIDA DE NUESTRO PDF

	        // echo $html;
	        $this->mpdf->Output();
	    }

		public function export()
		{
			$html = $this->input->get_post('html', 'No Valido');
			$stylesheet = $this->input->get_post('css', null);
	        $this->mpdf->WriteHTML($stylesheet,2);
	        $data['content'] = "<h1>Renatto NL</h1>";
	        $html = $this->load->view('reports/template.php', $data, true);
	        $this->mpdf->WriteHTML($html,3);
	        $this->mpdf->Output();
		}

}
?>