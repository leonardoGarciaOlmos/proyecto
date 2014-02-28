<?php if ( ! function_exists('base_cdn'))
{
	/**
	 * [base_cdn description]
	 * @param  string $operation
	 * @return [type]
	 */
	function reg_audit($operation="", $description="desconocida")
	{
		$CI =& get_instance();
		$id_user = $CI->session->userdata('DX_user_id');		
		$date = new DateTime();
		$ip = $_SERVER['REMOTE_ADDR'];
		$query = $CI->db->query('INSERT INTO audit value("",'.$id_user.',"'.$description.'","'.$date->format('Y-m-d H:i:s').'","'.$operation.'","'.$ip.'")');
	}
}

?>