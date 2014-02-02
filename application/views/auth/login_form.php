<?php
$username = array(
	'name'	=> 'username',
	'id'	=> 'username',
	'maxlength'	=> 20,
	'class' => 'input-block-level',
	'value' => set_value('username'),
	'placeholder' => 'Usuario'
);

$password = array(
	'name'	=> 'password',
	'id'	=> 'password',
	'maxlength' => 20,
	'class' => 'input-block-level',
	'placeholder' => 'password'
	//'size'	=> 30
);

$remember = array(
	'name'	=> 'remember',
	'id'	=> 'remember',
	'value'	=> 1,
	'checked'	=> set_value('remember'),
	'style' => 'margin:0;paliing:0'
);

$confirmation_code = array(
	'name'	=> 'captcha',
	'id'	=> 'captcha',
	'maxlength'	=> 8
);

$submit = array('name' => 'submit','class' => 'btn  btn-primary', 'value' => 'Entrar');
$attributes = array('class' => 'form-signin', 'id' => 'form-signin');

?>
<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="utf-8">
    <title>IUSPO</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Le styles -->
    <link href="<?=base_url()?>/css/docs/assets/css/bootstrap.css" rel="stylesheet">
    <link  href="<?=base_url()?>/css/iuspo_style.css" rel="stylesheet" >
    <style type="text/css">
      body {
        padding-top: 60px;
        padding-bottom: 40px;
      }
      .sidebar-nav {
        padding: 9px 0;
      }
    </style>
    <link href="<?=base_url()?>/css/docs/assets/css/bootstrap-responsive.css" rel="stylesheet">
    <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->

    <!-- Fav and touch icons -->
    <link rel="shortcut icon" href="<?=base_url()?>/css/docs/assets/ico/favicon.ico">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="<?=base_url()?>/css/docs/assets/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="<?=base_url()?>/css/docs/assets/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="<?=base_url()?>/css/docs/assets/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="<?=base_url()?>/css/docs/assets/ico/apple-touch-icon-57-precomposed.png">
  </head>

 <body style=" background-color: #efefef;">


    <div class="container-fluid">
      <div class="row-fluid">
         <div class="span12">

<div id="login" style="border: 1px solid #bbb;">
	<?php echo form_open($this->uri->uri_string(),$attributes)?>
	<h2 class="form-signin-heading">Iniciar Session</h2>
	<?php echo $this->dx_auth->get_auth_error(); ?>


	<?php echo form_label('Username', $username['id']);?>
	
			<?php echo form_input($username)?>
	    <?php echo form_error($username['name']); ?>
		

	 <?php echo form_label('Password', $password['id']);?>
	
			<?php echo form_password($password)?>
	    <?php echo form_error($password['name']); ?>
		
	 <?php 
	 if ($show_captcha): ?>
			
		<?php 	echo $this->dx_auth->get_recaptcha_html();?>
					
			<?php echo form_error('recaptcha_response_field'); ?>
			
	<?php endif; ?>
	
	
			<?php echo form_checkbox($remember);?> <?php echo form_label('Remember me', $remember['id']);?> 
			<?php echo anchor($this->dx_auth->forgot_password_uri, 'Forgot password');?> 
			<?php
				if ($this->dx_auth->allow_registration) {
					echo anchor($this->dx_auth->register_uri, 'Register');
				};
			?>
		

	
	<?php echo form_submit($submit);?>

	<?php echo form_close()?>
</div>
          </div><!--/row-->
        </div><!--/span-->
      </div><!--/row-->

      <hr>

      <footer>
        <p style="text-align: center;">&copy; XirosSystem e InnovaSystem</p>
      </footer>

    </div><!--/.fluid-container-->

    <!-- Le javascript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="<?=base_url()?>/css/docs/assets/js/jquery.js"></script>
    <script src="<?=base_url()?>/css/docs/assets/js/bootstrap-transition.js"></script>
    <script src="<?=base_url()?>/css/docs/assets/js/bootstrap-alert.js"></script>
    <script src="<?=base_url()?>/css/docs/assets/js/bootstrap-modal.js"></script>
    <script src="<?=base_url()?>/css/docs/assets/js/bootstrap-dropdown.js"></script>
    <script src="<?=base_url()?>/css/docs/assets/js/bootstrap-scrollspy.js"></script>
    <script src="<?=base_url()?>/css/docs/assets/js/bootstrap-tab.js"></script>
    <script src="<?=base_url()?>/css/docs/assets/js/bootstrap-tooltip.js"></script>
    <script src="<?=base_url()?>/css/docs/assets/js/bootstrap-popover.js"></script>
    <script src="<?=base_url()?>/css/docs/assets/js/bootstrap-button.js"></script>
    <script src="<?=base_url()?>/css/docs/assets/js/bootstrap-collapse.js"></script>
    <script src="<?=base_url()?>/css/docs/assets/js/bootstrap-carousel.js"></script>
    <script src="<?=base_url()?>/css/docs/assets/js/bootstrap-typeahead.js"></script>

  </body>
</html>

