<?php

class Admisionestudiante extends CI_Model
{

	function __construct()
	{
		parent::__construct();
	}

	public function update($arrayData)
	{
		$this->db->where('ci', $arrayData['ci']);
		$statusUpdate = $this->db->update('usuario', array('estatus' => $arrayData['estatus'])); 
		return $statusUpdate; 
	}
}
?>