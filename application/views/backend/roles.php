<html>
	<head><title>Manage roles</title></head>
	<body>
	<?php  		
	$roles = $data['roles'];
		// Show error
		echo validation_errors();
		
		// Build drop down menu
		$options[0] = 'None';
		foreach ($roles as $role)
		{
			$options[$role->id] = $role->name;
		}
	
		// Build table
		$tmpl = array ( 'table_open'  => '<table class="table table-striped table-condensed ">' );
		$this->table->set_template($tmpl);
		$this->table->set_heading('', 'ID', 'Name', 'Parent ID');
		
		foreach ($roles as $role)
		{			
			$this->table->add_row(form_checkbox('checkbox_'.$role->id, $role->id), $role->id, $role->name, $role->parent_id);
		}
		
		// Build form
		$attr = array('class' =>'form-inline' , );
		echo form_open($this->uri->uri_string(),$attr);
		
		echo form_label('Rol Padre', 'role_parent');
		echo form_dropdown('role_parent', $options); 
		echo '<br>';		
		echo form_label('Nombre de Rol', 'role_name');
		echo form_input('role_name', ''); 
		$attr = array('name' => 'add', 'value' => 'Agregar Rol', 'class' =>  'btn ' );
		echo form_submit($attr);
		$attr = array('name' => 'delete', 'value' => 'Borrar Seleccion', 'class' =>  'btn ' );
		echo form_submit($attr);
//		echo form_submit('add', 'Add role');
//		echo form_submit('delete', 'Delete selected role');
		echo '<hr/>';
		
		// Show table
		echo $this->table->generate(); 
		
		echo form_close();
			
	?>
	</body>
</html>