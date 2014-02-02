<?php
class Respaldos_Controller extends CI_Controller
{



	function __construct()
	{ 
		parent::__construct();
		$this->load->dbutil(); 
		//$this->dx_auth->check_uri_permissions();
	}
	public function index($value='')
	{
		# code...
	}


	function backup() 
	{
		$nombre_BD = 'backup' . date('dmY') . '.gz';
		$prefs = array(
                'tables'      => array(),  		// Array of tables to backup.
                'ignore'      => array(),       // List of tables to omit from the backup
                'format'      => 'gzip',        // gzip, zip, txt
                'filename'    => $nombre_BD,    // File name - NEEDED ONLY WITH ZIP FILES
                'add_drop'    => TRUE,          // Whether to add DROP TABLE statements to backup file
                'add_insert'  => TRUE,          // Whether to add INSERT data to backup file
                'newline'     => "\n"           // Newline character used in backup file
              );
		
		$datos_plantillas['contenido'] = 'BD/msj_BD';
		$datos_plantillas['msj'] = 'backup';
		$this->load->view('plantilla', $datos_plantillas);

		$backup =& $this->dbutil->backup($prefs);
		$this->load->helper('download');
		force_download($nombre_BD, $backup);
	}

	function restore_view()
	{
		$datos_plantillas['contenido'] = 'BD/restoreBD';
		$datos_plantillas['error'] = "";
		$this->load->view('plantilla', $datos_plantillas);
	}

	function restore()
	{
		$config['upload_path'] 		= './BD/';
		$config['allowed_types']	= 'gz';
		$config['overwrite']		= TRUE;
		$this->load->library('upload', $config);
		

		if ( !$this->upload->do_upload('fileBD') )
		{
			$datos_plantillas['contenido'] = 'BD/restoreBD';
			$datos_plantillas['error'] = $this->upload->display_errors('<div class="alert alert-error">', '</div>');	
		}
		else
		{
			$datos = $this->upload->data();
			$this->load->model('BD/GestorBD');
			$obj = new GestorBD;
			$return = $obj->restoreBD($datos['full_path']);
			if($return !== FALSE)
			{
				$datos_plantillas['contenido'] = 'BD/msj_BD';
				$datos_plantillas['msj'] = 'restore';
			}
			else
			{
				$datos_plantillas['contenido'] = 'BD/msj_BD';
				$datos_plantillas['msj'] = 'restore_false';
			}
							
		}

		$this->load->view('plantilla', $datos_plantillas);
	}

}
?>