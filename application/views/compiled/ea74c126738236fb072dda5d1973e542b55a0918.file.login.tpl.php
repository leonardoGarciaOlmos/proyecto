<?php /* Smarty version Smarty-3.1.14, created on 2014-03-09 16:31:52
         compiled from "application\views\templates\auth\login.tpl" */ ?>
<?php /*%%SmartyHeaderCode:5479531c97788bc224-93301771%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'ea74c126738236fb072dda5d1973e542b55a0918' => 
    array (
      0 => 'application\\views\\templates\\auth\\login.tpl',
      1 => 1393184901,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '5479531c97788bc224-93301771',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'base_url' => 0,
    'ciPath' => 0,
    'data' => 0,
    'catpcha' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.14',
  'unifunc' => 'content_531c9778b73016_91148994',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_531c9778b73016_91148994')) {function content_531c9778b73016_91148994($_smarty_tpl) {?>
<!DOCTYPE html>
<html lang="en">
	
<!-- Mirrored from 192.69.216.111/themes/preview/ace/login.html by HTTrack Website Copier/3.x [XR&CO'2013], Mon, 19 Aug 2013 14:04:52 GMT -->
<head>
		<meta charset="utf-8" />
		<title>Login Page - Ace Admin</title>

		<meta name="description" content="User login page" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />

		<!--basic styles-->

		<link href="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
assets/css/bootstrap.min.css" rel="stylesheet" />
		<link href="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
assets/css/bootstrap-responsive.min.css" rel="stylesheet" />
		<link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
assets/css/font-awesome.min.css" />

		<!--[if IE 7]>
		  <link rel="stylesheet" href="assets/css/font-awesome-ie7.min.css" />
		<![endif]-->

		<!--page specific plugin styles-->

		<!--fonts-->

		<link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Open+Sans:400,300" />

		<!--ace styles-->

		<link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
assets/css/ace.min.css" />
		<link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
assets/css/ace-responsive.min.css" />
		<link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
assets/css/ace-skins.min.css" />

		<!--[if lte IE 8]>
		  <link rel="stylesheet" href="assets/css/ace-ie.min.css" />
		<![endif]-->

		<!--inline styles related to this page-->

		<!--ace settings handler-->


		<script src="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
assets/js/ace-extra.min.js"></script>
<script  type="text/javascript" >
	var base_url = '<?php echo $_smarty_tpl->tpl_vars['ciPath']->value;?>
';
	var show_captcha = '<?php echo $_smarty_tpl->tpl_vars['data']->value['show_captcha'];?>
';
</script>

	</head>

	<body class="login-layout">
		<div class="main-container container-fluid">
			<div class="main-content">
				<div class="row-fluid">
					<div class="span12">
						<div class="login-container">
							<div class="row-fluid">
								<div class="center">
									<h1>
										<i class="icon-leaf green"></i>
										<span class="red">Sistemas</span>
										<span class="white">IUSPO</span>
									</h1>
									<h4 class="blue">&copy; Xirox System</h4>
								</div>
							</div>

							<div class="space-6"></div>

							<div class="row-fluid">
								<div class="position-relative">
									<div id="login-box" class="login-box visible widget-box no-border">
										<div class="widget-body">
											<div class="widget-main">
												<h4 class="header blue lighter bigger">
													<i class="icon-coffee green"></i>
													Por Favor Introduce Tus Datos
												</h4>

												<div class="space-6"></div>

												<form  action="http://localhost/proyecto/auth" method="post" accept-charset="utf-8" class="form-signin" id="form-signin">	<h2 class="form-signin-heading" >
													<fieldset>
														<label>
															<span class="block input-icon input-icon-right">
																<input type="text" class="span12" name="Usuario" placeholder="Usuario" />
																<i class="icon-user"></i>
															</span>
														</label>

														<label>
															<span class="block input-icon input-icon-right">
																<input type="password" class="span12" name="Clave" placeholder="Clave" />
																<i class="icon-lock"></i>
															</span>
														</label>
														<div name="errorAll">
															
														</div>
														<div class="space"></div>

														<div class="clearfix">
															<label class="inline">
																<input type="checkbox" name="remember" class="ace" />
																<span class="lbl"> Recordarme</span>
															</label>

															<button type="submit" class="width-35 pull-right btn btn-small btn-primary">
																<i class="icon-key"></i>
																Acceder
															</button>
														</div>
														<div class="clearfix">
															<!-- terms and conditions checkbox -->
<!-- the captcha div -->
<div id="captcha-wrap">
														<!-- <?php if ($_smarty_tpl->tpl_vars['data']->value['show_captcha']){?>
															<?php echo $_smarty_tpl->tpl_vars['catpcha']->value;?>

														<?php }?> -->
    <div id="captcha-status"></div>
</div>
<div id="captchadiv"></div>
			</div>

														<div class="space-4"></div>
													</fieldset>
												</form>

												<div class="social-or-login center">
													<span class="bigger-110">o Accede Con</span>
												</div>

												<div class="social-login center">
													<a class="btn btn-primary">
														<i class="icon-facebook"></i>
													</a>

													<a class="btn btn-info">
														<i class="icon-twitter"></i>
													</a>

													<a class="btn btn-danger">
														<i class="icon-google-plus"></i>
													</a>
												</div>
											</div><!--/widget-main-->

											<div class="toolbar clearfix">
												<div>
													<a href="#" onclick="show_box('forgot-box'); return false;" class="forgot-password-link">
														<i class="icon-arrow-left"></i>
														Olvide mi Clave
													</a>
												</div>

												<div>
													<a href="#" onclick="show_box('signup-box'); return false;" class="user-signup-link">
														Quiero registrarme
														<i class="icon-arrow-right"></i>
													</a>
												</div>
											</div>
										</div><!--/widget-body-->
									</div><!--/login-box-->

									<div id="forgot-box" class="forgot-box widget-box no-border">
										<div class="widget-body">
											<div class="widget-main">
												<h4 class="header red lighter bigger">
													<i class="icon-key"></i>
													Recuperar clave
												</h4>

												<div class="space-6"></div>
												<p>
													Ingresa tu correo para recibir las instrucciones
												</p>

												<form  id="olvidoClave"  accept-charset="utf-8" action="http://localhost/proyecto/auth" method="post">
													<fieldset>
														<label>
															<span class="block input-icon input-icon-right">
																<input name="login" class="span12" placeholder="Email" />
																<i class="icon-envelope"></i>
															</span>
														</label>

														<div class="clearfix">
															<button type="submit" class="width-35 pull-right btn btn-small btn-danger">
																<i class="icon-lightbulb"></i>
																Enviar!
															</button>
														</div>
													</fieldset>
												</form>
												<div class="msjForgot" style="margin:10px auto;	">
													
												</div>
											</div><!--/widget-main-->

											<div class="toolbar center">
												<a href="#" onclick="show_box('login-box'); return false;" class="back-to-login-link">
													Regresar
													<i class="icon-arrow-right"></i>
												</a>
											</div>
										</div><!--/widget-body-->
									</div><!--/forgot-box-->

									<div id="signup-box" class="signup-box widget-box no-border">
										<div class="widget-body">
											<div class="widget-main">
												<h4 class="header green lighter bigger">
													<i class="icon-group blue"></i>
													Registrar nuevo usuario
												</h4>

												<div class="space-6"></div>
												<p> Enter your details to begin: </p>

												<form>
													<fieldset>
														<label>
															<span class="block input-icon input-icon-right">
																<input type="email" class="span12" placeholder="Email" />
																<i class="icon-envelope"></i>
															</span>
														</label>

														<label>
															<span class="block input-icon input-icon-right">
																<input type="text" class="span12" placeholder="Username" />
																<i class="icon-user"></i>
															</span>
														</label>

														<label>
															<span class="block input-icon input-icon-right">
																<input type="password" class="span12" placeholder="Password" />
																<i class="icon-lock"></i>
															</span>
														</label>

														<label>
															<span class="block input-icon input-icon-right">
																<input type="password" class="span12" placeholder="Repeat password" />
																<i class="icon-retweet"></i>
															</span>
														</label>

														<label>
															<input type="checkbox" class="ace" />
															<span class="lbl">
																I accept the
																<a href="#">User Agreement</a>
															</span>
														</label>

														<div class="space-24"></div>

														<div class="clearfix">
															<button type="reset" class="width-30 pull-left btn btn-small">
																<i class="icon-refresh"></i>
																Reset
															</button>

															<button onclick="return false;" class="width-65 pull-right btn btn-small btn-success">
																Register
																<i class="icon-arrow-right icon-on-right"></i>
															</button>
														</div>
													</fieldset>
												</form>
											</div>

											<div class="toolbar center">
												<a href="#" onclick="show_box('login-box'); return false;" class="back-to-login-link">
													<i class="icon-arrow-left"></i>
													Back to login
												</a>
											</div>
										</div><!--/widget-body-->
									</div><!--/signup-box-->
								</div><!--/position-relative-->
							</div>
						</div>
					</div><!--/.span-->
				</div><!--/.row-fluid-->
			</div>
		</div><!--/.main-container-->

		<!--basic scripts-->

		<!--[if !IE]>-->

	<!-- 	<script src="../../../../ajax.googleapis.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script> -->

		<!--<![endif]-->

		<!--[if IE]>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
<![endif]-->

		<!--[if !IE]>-->

		<script type="text/javascript">
			window.jQuery || document.write("<script src='<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
assets/js/jquery-2.0.3.min.js'>"+"<"+"/script>");
		</script>

		<!--<![endif]-->

		<!--[if IE]>
<script type="text/javascript">
 window.jQuery || document.write("<script src='assets/js/jquery-1.10.2.min.js'>"+"<"+"/script>");
</script>
<![endif]-->

		<script type="text/javascript">
			if("ontouchend" in document) document.write("<script src='<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
assets/js/jquery.mobile.custom.min.js'>"+"<"+"/script>");
		</script>
		<script src="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
assets/js/bootstrap.min.js"></script>

		<!--page specific plugin scripts-->

		<!--ace scripts-->

		<script src="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
assets/js/ace-elements.min.js"></script>
		<script src="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
assets/js/ace.min.js"></script>

		<!--inline scripts related to this page-->
		<script type="text/javascript" src="http://www.google.com/recaptcha/api/js/recaptcha_ajax.js"></script>
<script type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
assets/js/auth.js"></script>
	</body>

<!-- Mirrored from 192.69.216.111/themes/preview/ace/login.html by HTTrack Website Copier/3.x [XR&CO'2013], Mon, 19 Aug 2013 14:04:52 GMT -->
</html>
<?php }} ?>