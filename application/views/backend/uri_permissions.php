<html>
	<head><title>Manage URI Permissions</title></head>
	<body>	
	<?php  				
	//var_dump($data);

		// Build drop down menu
		foreach ($data['roles'] as $role)
		{
			$options[$role->id] = $role->name;
		}

		// Change allowed uri to string to be inserted in text area
		//var_dump($allowed_uris);
		if ( ! empty($data['allowed_uris']))
		{
			$allowed_uris = implode("\n",$data['allowed_uris']);
		}
		
		// Build form
		$attr = array('class' => 'form-inline' , );
			echo form_open($this->uri->uri_string(),$attr);
			echo form_label('Role', 'role_name_label');
			echo form_dropdown('role', $options); 
			$attr = array('name' => 'show', 'value' => 'Mostrar Permisos de Direcciones', 'class' =>  'btn ' );
			echo form_submit($attr); 
			echo '<hr/>';	
		?>
		<table>
			<tr>
				<td>
				<?php 

					echo form_label('', 'uri_label');
					echo form_textarea('allowed_uris',$allowed_uris); 
					echo '<br/>';
					$attr = array('name' => 'save', 'value' => 'Guardar Permisos de Direcciones', 'class' =>  'btn ' );
					echo form_submit($attr);
				 ?>	
				</td>
				<td>
					<div class="hero-unit">
				<?php 
											
					echo 'Direcciones Permitidas (1 por línea) :<br/>';					
					echo "Input '/' Acceso a todas las direcciones.<br/>";
					echo "Input '/controller/' Acceso a todas las funciones de una zona<br/>";
					echo "Input '/controller/function/' Permite acceso a una dirección en especifico<br/>";
					//echo 'These rules only have effect if you use check_uri_permissions() in your controller<br/>.';
				 ?>	
				 	</div>
				</td>
			</tr>

		</table>
		<?php 
			echo form_close();
		

		
		

				

	//	$allowed_uris = $data['allowed_uris'];
	//	var_dump($allowed_uris);
		
				

		

	?>
	</body>
</html>