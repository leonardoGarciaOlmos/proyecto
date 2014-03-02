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
		$query = $this->db->query("SELECT * FROM audit a, usuario u WHERE a.id_user=u.ci");
		return $query->result_array();

	}


}
?>