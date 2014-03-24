<?php class Audit_model extends CI_Model{

	public $carrera;  
	public $pensum; 
	public $semestre;   

	function __construct()
	{
		// Llamando al contructor del Modelo
		parent::__construct();
		$this->carrera = $this->session->userdata('carrera');
		$this->pensum = $this->session->userdata('pensum');
		$this->semestre = $this->session->userdata('semestre');
	}
	

	function get_audit(){
		$query = $this->db->query("SELECT a.id_user, u.nombre, u.apellido, a.description, DATE_FORMAT(a.date,'%d-%m-%Y %h:%m') as date, a.operation, a.client_ip FROM audit a, usuario u WHERE a.id_user=u.ci");
		return $query->result_array();

	}


}
?>