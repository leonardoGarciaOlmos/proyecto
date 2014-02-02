<html>
	<head><title>Manage unactivated users</title></head>
	<body>
	<?php  				
		// Show error
	$users = $data['users'];
	$pagination = $data['pagination'];
	
		echo validation_errors();
	
	if(count($users)>0){
		$this->table->set_heading('', 'Username', 'Email', 'Register IP', 'Activation Key', 'Created');
		
		foreach ($users as $user) 
		{
			$this->table->add_row(
				form_checkbox('checkbox_'.$user->id, $user->username).form_hidden('key_'.$user->id, $user->activation_key),
				$user->username, 
				$user->email, 
				$user->last_ip, 				
				$user->activation_key, 
				date('Y-m-d', strtotime($user->created)));
		}
		
		echo form_open($this->uri->uri_string());
				
		echo form_submit('activate', 'Activate User');
		
		echo '<hr/>';
		
		echo $this->table->generate(); 
		
		echo form_close();
		
		echo $pagination;
	}else{
		echo '<h2> No existen usuarios Inactivos</h2>';
	}
	?>
	</body>
</html>