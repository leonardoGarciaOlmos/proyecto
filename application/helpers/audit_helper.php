<?php if ( ! function_exists('base_cdn'))
{
	/**
	 * [base_cdn description]
	 * @param  string $operation
	 * @return [type]
	 */
	function reg_audit($operation="")
	{
		$CI =& get_instance();
		$id_user = $CI->session->userdata('id_user');
		$date = new DateTime();
		$ip = $_SERVER['REMOTE_ADDR'];
		$query = $CI->db->query('INSERT INTO audit value("","20748439","'.$date->format('Y-m-d H:i:s').'","'.$operation.'","'.$ip.'")');
	}
}

?>