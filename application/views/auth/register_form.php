<?php







$campos['username'] = array('label' => 'Usuario',  'atr' => 
array('name' => 'username',	'id' => 'username',	'size'	=> 30,	'value' => '',	'readonly' => 'true')
); 

$campos['password'] =array('label' => 'Clave',  'atr' => 
 array(	'name'	=> 'password',	'id'	=> 'password',	'maxlength'	=> 80,	'size'	=> 30,
 	'value'	=> '')
 );

$campos['confirmpassword'] =array('label' => 'Confirmacion de Contraseña',  'atr' => 
 array(	'name'	=> 'confirmpassword',	'id'	=> 'confirmpassword',	'maxlength'	=> 80,	'size'	=> 30,
 	'value'	=> set_value('confirmpassword'))
 );

$campos['name'] = array('label' => 'Nombre',  'atr' => 
 array(	'name'	=> 'name',	'id'	=> 'name',	'size'	=> 30,	'value' => ''));

$campos['email'] =array('label' => 'Correo',  'atr' => 
 array(	'name'	=> 'email',	'id'	=> 'email',	'maxlength'	=> 80,	'size'	=> 30,
 	'value'	=> '')
 );
?>

<html>
<body>

<?php echo form_open($this->uri->uri_string())?>
	<h1></h1>
<?php 
	inputB($campos['username']); 
	passwordB($campos['password']); 
	passwordB($campos['confirmpassword']); 
	inputB($campos['email']); 
 ?>


<?php if ($this->dx_auth->captcha_registration): ?>  
  <div class="control-group">
    <div class="controls">
 	<?php 		// Get recaptcha javascript and non javasript html
 		echo $this->dx_auth->get_recaptcha_html();
		 echo form_error('recaptcha_response_field'); ?>
    
    </div>
  </div>  




	
<?php endif; ?>

  <div class="control-group">
    <div class="controls">
      <label class="checkbox">

      </label>
      <?php echo form_submit('register','Register');?>
    </div>
  </div>
<?php echo form_close()?>


<!-- <fieldset><legend>Register</legend>


<dl>
	<dt></dt>
	<dd>
		<?php echo form_input($username)?>
    
	</dd>

	<dt><?php echo form_label('Clave', $password['id']);?></dt>
	<dd>

	</dd>

	<dt></dt>
	<dd>

	</dd>

	<dt></dt>
	<dd>

	</dd>
		
<?php if ($this->dx_auth->captcha_registration): ?>

	<dt></dt>


	
	<?php 
		// Get recaptcha javascript and non javasript html
		echo $this->dx_auth->get_recaptcha_html();

	?>
		<dd>
		
		<?php echo form_error('recaptcha_response_field'); ?>
	</dd>
<?php endif; ?>

	<dt></dt>
	<dd><?php echo form_submit('register','Register');?></dd>
</dl>

<?php echo form_close()?>
</fieldset> -->
</body>
</html>