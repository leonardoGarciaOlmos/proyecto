<?php

$campos['username'] = array('label' => 'Cedula',  'atr' => 
array('name' => 'username',	'id'	=> 'username',	'placeholder' => 'Usuario',
		'value' =>  set_value('username'))
); 

$campos['password'] =array('label' => 'Clave',  'atr' => 
 array(	'name'	=> 'password',	'id'	=> 'password',	'maxlength'	=> 80,	
 	'placeholder' => '******', 'value'	=> set_value('password'))
 );

$campos['confirmpassword'] =array('label' => 'Confirmacion de Contraseña',  'atr' => 
 array(	'name'	=> 'confirmpassword',	'id'	=> 'confirmpassword',	'maxlength'	=> 80,	
 	 'placeholder' => '******', 'value'	=> set_value('confirmpassword'))
 );

$campos['last_name'] = array('label' => 'Apellido',  'atr' => 
	array('name'	=> 'last_name',	'id'	=> 'last_name',	
	'placeholder' => 'Apellido',	'value' => set_value('last_name'))
	);

$campos['name'] = array('label' => 'Nombre',  'atr' => 
 array(	'name'	=> 'name',	'id'	=> 'name',	'placeholder' => 'Nombre',	'value' => set_value('name'))
);

$campos['email'] =array('label' => 'Correo',  'atr' => 
 array(	'name'	=> 'email',	'id'	=> 'email',	'maxlength'	=> 80,	
 	'placeholder' => 'Usuario@iuspo.edu.org', 'value'	=> set_value('email'))
 );


$campos['birth_date'] =array('label' => 'Fecha Nacimiento',  'atr' => 
 array(	'name'	=> 'birth_date',	'id'	=> 'birth_date',	'maxlength'	=> 80,	
 	'readonly' => true,	'placeholder' => '2000-10-10','value'	=> set_value('birth_date'))
 );

$campos['addres'] =array('label' => 'Direccion',  'atr' => 
 array(	'name'	=> 'addres',	'id'	=> 'addres',	'maxlength'	=> 80,	
 	'placeholder' => 'Los Teques ...', 'value'	=> set_value('addres'))
 );

$campos['observations'] = array('name'=>'observations',	'id'=>'observations',
	'maxlength'	=> 40,	 'class' => 'input-block-level', 'cols' => '100', 'rows' => '3',
 	'value'	=> set_value('observations')
 );

?>

<html>
<body>
<?php $this->load->helper('bootstrap');  ?>
<div class="contentautoForm">
<?php 
$attr = array('class' => 'form-horizontal', 'id' => 'formusers' );
echo form_open($this->uri->uri_string(),$attr)?>


	<h2>Nuevo Usuario</h2>
	<?php inputB($campos['username']); 
	inputB($campos['name']); 
	inputB($campos['last_name']); 
	inputB($campos['email']); 
	inputB($campos['birth_date']); 
	inputB($campos['addres']); 
	$options = array('M'  => 'Hombre','F'    => 'Mujer');
	selectB('Sexo','gender',$options);
	$options = array('C'  => 'Casado','S' => 'Soltero','V' => 'Viudo');
	selectB('Estado Civil','civil_status',$options);
	passwordB($campos['password']); 
	passwordB($campos['confirmpassword']); 
	$options = array( "O-" =>"O-" ,"O+" =>"O+" ,"A-" =>"A-" ,"A+" =>"A+","B-" =>"B-" ,"B+" =>"B+" ,"AB-" =>"AB-" ,"AB+" =>"AB+");	
	selectB('Tipo de Sangre','blood_type',$options);
	//$options =  (!count($carreras))? array(0 => 'Cargue Carreras' ):$carreras;
	$options = $carreras;
	selectB('Carrera','Carrera',$options);

	//var_dump($options);
	textareaB('Observaciones',$campos['observations']);

	?>

<?/* if ($this->dx_auth->captcha_registration): ?>  
  <div class="control-group">
    <div class="controls">
 	<?php 		// Get recaptcha javascript and non javasript html
 		echo $this->dx_auth->get_recaptcha_html();
		 echo form_error('recaptcha_response_field'); ?>
    
    </div>
  </div>  
<?php endif; */?>

<?php  
	//inputB($campos['observations']);
	?>
	<div class="textarea">
	<?php
	// echo '<br>'.anchor('auth/change_password', 'change_password', array('class' => 'btn btn-primary' ));
	  echo ''.anchor($this->router->fetch_class().'/users', 'Volver', 
	  	array('class' => 'btn btn-primary', 'style' => 'float:left; margin:25px;'));

	?>
	<div>
		<button name="submit" class="btn btn-primary" style=" float:right; margin:25px; " type="submit" value="Enviar">
			<i class="icon-user icon-white"></i>Crear Usuario
		</button>
	</div>
	</div>


<div class="clearfix">	</div>


<?php echo form_close()?>
</div>
</body>
</html>