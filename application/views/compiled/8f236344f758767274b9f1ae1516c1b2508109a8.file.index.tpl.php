<?php /* Smarty version Smarty-3.1.14, created on 2014-02-18 19:11:26
         compiled from "application\views\templates\index.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1467552fec62ad23311-77916744%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '8f236344f758767274b9f1ae1516c1b2508109a8' => 
    array (
      0 => 'application\\views\\templates\\index.tpl',
      1 => 1392009299,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1467552fec62ad23311-77916744',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.14',
  'unifunc' => 'content_52fec62b153ce9_54460394',
  'variables' => 
  array (
    'assetPath' => 0,
    'styles' => 0,
    'stylePath' => 0,
    'stylesIE7' => 0,
    'styleIE7Path' => 0,
    'font' => 0,
    'fontPath' => 0,
    'stylesIE8' => 0,
    'styleIE8Path' => 0,
    'ciPath' => 0,
    'menu' => 0,
    'cmenu' => 0,
    'value' => 0,
    'currentUrl' => 0,
    'cchild' => 0,
    'output' => 0,
    'jsIE' => 0,
    'jsIEPath' => 0,
    'js_files' => 0,
    'files' => 0,
    'css_files' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_52fec62b153ce9_54460394')) {function content_52fec62b153ce9_54460394($_smarty_tpl) {?><!DOCTYPE html>
<html lang="es">

<head>
		<meta charset="utf-8" />
		<title>Dashboard - Ace Admin</title>
		<meta name="description" content="overview &amp; stats" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<script src="<?php echo $_smarty_tpl->tpl_vars['assetPath']->value;?>
js/jquery-2.0.3.min.js"></script>
		
		<?php  $_smarty_tpl->tpl_vars['stylePath'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['stylePath']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['styles']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['stylePath']->key => $_smarty_tpl->tpl_vars['stylePath']->value){
$_smarty_tpl->tpl_vars['stylePath']->_loop = true;
?>
			<link rel="stylesheet" href=<?php echo $_smarty_tpl->tpl_vars['stylePath']->value;?>
>
		<?php } ?>

		<!--[if IE 7]>
			
			<?php  $_smarty_tpl->tpl_vars['styleIE7Path'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['styleIE7Path']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['stylesIE7']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['styleIE7Path']->key => $_smarty_tpl->tpl_vars['styleIE7Path']->value){
$_smarty_tpl->tpl_vars['styleIE7Path']->_loop = true;
?>
				<link rel="stylesheet" href=<?php echo $_smarty_tpl->tpl_vars['styleIE7Path']->value;?>
>
			<?php } ?>
		<![endif]-->

		
		<?php  $_smarty_tpl->tpl_vars['fontPath'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['fontPath']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['font']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['fontPath']->key => $_smarty_tpl->tpl_vars['fontPath']->value){
$_smarty_tpl->tpl_vars['fontPath']->_loop = true;
?>
			<link rel="stylesheet" href=<?php echo $_smarty_tpl->tpl_vars['fontPath']->value;?>
>
		<?php } ?>

		<!--[if lte IE 8]>
		  	
			<?php  $_smarty_tpl->tpl_vars['styleIE8Path'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['styleIE8Path']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['stylesIE8']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['styleIE8Path']->key => $_smarty_tpl->tpl_vars['styleIE8Path']->value){
$_smarty_tpl->tpl_vars['styleIE8Path']->_loop = true;
?>
				<link rel="stylesheet" href=<?php echo $_smarty_tpl->tpl_vars['styleIE8Path']->value;?>
>
			<?php } ?>
		<![endif]-->

</head>

<body>

	<div class="navbar " id="navbar">
		<div class="navbar-inner navbar-color">
			<div class="container-fluid">
				<a href="#" class="brand logo nav-logo">
					<small>
						<img class="img" src="<?php echo $_smarty_tpl->tpl_vars['assetPath']->value;?>
images/Logo.png" style="height: 42px;width: 50px;"  alt="Infoguia.com En un click lo encuentras todo!" title="Infoguia.com"/>
					</small>
				</a>
				<ul class="nav ace-nav pull-right">
					<!-- <li class="black">
						<a data-toggle="dropdown" class="dropdown-toggle" href="#">
							<i class="icon-shopping-cart"></i>
							<span class="badge badge-blue">2</span>
						</a>

						<ul class="pull-right dropdown-navbar dropdown-menu dropdown-caret dropdown-closer">
							<li class="nav-header">
								<i class="icon-ok"></i>
								2 Tasks to complete
							</li>
							<li>
								<a href="#">
									<div class="clearfix">
										<span class="pull-left">Unit Testing</span>
										<span class="pull-right">15%</span>
									</div>

									<div class="progress progress-mini progress-warning">
										<div style="width:15%" class="bar"></div>
									</div>
								</a>
							</li>

							<li>
								<a href="#">
									<div class="clearfix">
										<span class="pull-left">Bug Fixes</span>
										<span class="pull-right">90%</span>
									</div>

									<div class="progress progress-mini progress-success progress-striped active">
										<div style="width:90%" class="bar"></div>
									</div>
								</a>
							</li>

							<li>
								<a href="#">
									See tasks with details
									<i class="icon-arrow-right"></i>
								</a>
							</li>
						</ul>
					</li> -->
					<!-- <li class="black">
						<a data-toggle="dropdown" class="dropdown-toggle" href="#">
							<i class="icon-bell-alt icon-animated-bell"></i>
							<span class="badge badge-red">3</span>
						</a>

						<ul class="pull-right dropdown-navbar navbar-pink dropdown-menu dropdown-caret dropdown-closer">
							<li class="nav-header">
								<i class="icon-warning-sign"></i>
								3 Notifications
							</li>

							<li>
								<a href="#">
									<div class="clearfix">
										<span class="pull-left">
											<i class="btn btn-mini no-hover btn-pink icon-comment"></i>
											New Comments
										</span>
										<span class="pull-right badge badge-info">+2</span>
									</div>
								</a>
							</li>

							<li>
								<a href="#">
									<i class="btn btn-mini btn-primary icon-user"></i>
									Bob just signed up as an editor ...
								</a>
							</li>

							<li>
								<a href="#">
									<div class="clearfix">
										<span class="pull-left">
											<i class="btn btn-mini no-hover btn-success icon-shopping-cart"></i>
											New Orders
										</span>
										<span class="pull-right badge badge-success">+1</span>
									</div>
								</a>
							</li>
							<li>
								<a href="#">
									See all notifications
									<i class="icon-arrow-right"></i>
								</a>
							</li>
						</ul>
					</li> -->

					<!-- <li class="black">
						<a data-toggle="dropdown" class="dropdown-toggle" href="#">
							<i class="icon-android icon-animated-vertical"></i>
							<small><b>SACE</b></small>
							<span class="badge badge-red">3</span>
						</a>

						<ul class="pull-right dropdown-navbar navbar-pink dropdown-menu dropdown-caret dropdown-closer">
							<li class="nav-header">
								<i class="icon-warning-sign"></i>
								3 Notifications
							</li>
							<li>
								<a href="#">
									<div class="clearfix">
										<span class="pull-left">
											<i class="btn btn-mini no-hover btn-pink icon-comment"></i>
											New Comments
										</span>
										<span class="pull-right badge badge-info">+2</span>
									</div>
								</a>
							</li>

							<li>
								<a href="#">
									<i class="btn btn-mini btn-primary icon-user"></i>
									Bob just signed up as an editor ...
								</a>
							</li>

							<li>
								<a href="#">
									<div class="clearfix">
										<span class="pull-left">
											<i class="btn btn-mini no-hover btn-success icon-shopping-cart"></i>
											New Orders
										</span>
										<span class="pull-right badge badge-success">+1</span>
									</div>
								</a>
							</li>
							<li>
								<a href="#">
									See all notifications
									<i class="icon-arrow-right"></i>
								</a>
							</li>
						</ul>
					</li> -->
					<!-- <li class="black">
						<a data-toggle="dropdown" class="dropdown-toggle" href="#">
							<i class="icon-envelope icon-animated-vertical"></i>
							<span class="badge badge-green">5</span>
						</a>

						<ul class="pull-right dropdown-navbar dropdown-menu dropdown-caret dropdown-closer">
							<li class="nav-header">
								<i class="icon-envelope-alt"></i>
								5 Messages
							</li>

							<li>
								<a href="#">
									<img src="<?php echo $_smarty_tpl->tpl_vars['assetPath']->value;?>
avatars/avatar.png" class="msg-photo" alt="Alex's Avatar" />
									<span class="msg-body">
										<span class="msg-title">
											<span class="blue">Alex:</span>
											Ciao sociis natoque penatibus et auctor ...
										</span>

										<span class="msg-time">
											<i class="icon-time"></i>
											<span>a moment ago</span>
										</span>
									</span>
								</a>
							</li>

							<li>
								<a href="#">
									<img src="<?php echo $_smarty_tpl->tpl_vars['assetPath']->value;?>
avatars/avatar3.png" class="msg-photo" alt="Susan's Avatar" />
									<span class="msg-body">
										<span class="msg-title">
											<span class="blue">Susan:</span>
											Vestibulum id ligula porta felis euismod ...
										</span>

										<span class="msg-time">
											<i class="icon-time"></i>
											<span>20 minutes ago</span>
										</span>
									</span>
								</a>
							</li>

							<li>
								<a href="#">
									<img src="<?php echo $_smarty_tpl->tpl_vars['assetPath']->value;?>
avatars/avatar4.png" class="msg-photo" alt="Bob's Avatar" />
									<span class="msg-body">
										<span class="msg-title">
											<span class="blue">Bob:</span>
											Nullam quis risus eget urna mollis ornare ...
										</span>

										<span class="msg-time">
											<i class="icon-time"></i>
											<span>3:15 pm</span>
										</span>
									</span>
								</a>
							</li>

							<li>
								<a href="#">
									See all messages
									<i class="icon-arrow-right"></i>
								</a>
							</li>
						</ul>
					</li> -->
					<li class="black">
						<a data-toggle="dropdown" href="#" class="dropdown-toggle">
							<img class="nav-user-photo" src="<?php echo $_smarty_tpl->tpl_vars['assetPath']->value;?>
avatars/User.png" alt="Jason's Photo" />
							<span class="user-info">
								<small>Bienvenido,</small>
								Daniel Castillo
							</span>
							<i class="icon-angle-down"></i>
						</a>
						<ul class="user-menu pull-right dropdown-menu dropdown-yellow dropdown-caret dropdown-closer">
							<li>
								<a href="#">
									<i class="icon-cog"></i>
									Settings
								</a>
							</li>

							<li>
								<a href="#">
									<i class="icon-user"></i>
									Profile
								</a>
							</li>

							<li class="divider"></li>

							<li>
								<a href="<?php echo $_smarty_tpl->tpl_vars['ciPath']->value;?>
auth/logout">
									<i class="icon-off"></i>
									Logout
								</a>
							</li>
						</ul>
					</li>
				</ul><!--/.ace-nav-->
			</div><!--/.container-fluid-->
		</div><!--/.navbar-inner-->
	</div><!-- /-navbar -->

	<div class="main-container container-fluid">
		<a class="menu-toggler" id="menu-toggler" href="#">
			<span class="menu-text"></span>
		</a>

		<?php if ($_smarty_tpl->tpl_vars['menu']->value!=false){?>
		<div class="sidebar" id="sidebar">

			<ul class="nav nav-list">
				<?php  $_smarty_tpl->tpl_vars['cmenu'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['cmenu']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['menu']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['cmenu']->key => $_smarty_tpl->tpl_vars['cmenu']->value){
$_smarty_tpl->tpl_vars['cmenu']->_loop = true;
?>
					<?php $_smarty_tpl->tpl_vars['value'] = new Smarty_variable(($_smarty_tpl->tpl_vars['ciPath']->value).($_smarty_tpl->tpl_vars['cmenu']->value['url']), null, 0);?>
					<?php if (mb_strtolower($_smarty_tpl->tpl_vars['value']->value, 'UTF-8')==mb_strtolower($_smarty_tpl->tpl_vars['currentUrl']->value, 'UTF-8')){?>
						<li class="active">
					<?php }else{ ?>
						<li>
					<?php }?>
						<?php if ($_smarty_tpl->tpl_vars['cmenu']->value['child']==false){?>
							<a href="<?php echo $_smarty_tpl->tpl_vars['ciPath']->value;?>
<?php echo $_smarty_tpl->tpl_vars['cmenu']->value['url'];?>
">
								<i class="<?php echo $_smarty_tpl->tpl_vars['cmenu']->value['icon'];?>
"></i>
								<span class="menu-text"><?php echo $_smarty_tpl->tpl_vars['cmenu']->value['name'];?>
 </span>
							</a>
						<?php }else{ ?>
							<a href="#" class="dropdown-toggle">
								<i class="<?php echo $_smarty_tpl->tpl_vars['cmenu']->value['icon'];?>
"></i>
								<span class="menu-text"> <?php echo $_smarty_tpl->tpl_vars['cmenu']->value['name'];?>
 </span>
								<b class="arrow icon-angle-down"></b>
							</a>
							<ul class="submenu">
								<?php  $_smarty_tpl->tpl_vars['cchild'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['cchild']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['cmenu']->value['child']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['cchild']->key => $_smarty_tpl->tpl_vars['cchild']->value){
$_smarty_tpl->tpl_vars['cchild']->_loop = true;
?>
									<?php $_smarty_tpl->tpl_vars['value'] = new Smarty_variable(($_smarty_tpl->tpl_vars['ciPath']->value).($_smarty_tpl->tpl_vars['cchild']->value['url']), null, 0);?>
									<?php if (mb_strtolower($_smarty_tpl->tpl_vars['value']->value, 'UTF-8')==mb_strtolower($_smarty_tpl->tpl_vars['currentUrl']->value, 'UTF-8')){?>
										<li class="active">
											<script type="text/javascript">
												$('.active').parent().slideToggle(200).parent().toggleClass("open");
											</script>
									<?php }else{ ?>
										<li>
									<?php }?>
										<a href="<?php echo $_smarty_tpl->tpl_vars['ciPath']->value;?>
<?php echo $_smarty_tpl->tpl_vars['cchild']->value['url'];?>
">
											<i class="icon-double-angle-right"></i>
											<?php echo $_smarty_tpl->tpl_vars['cchild']->value['name'];?>

										</a>
									</li>
								<?php } ?>
							</ul>

						<?php }?>
					</li>
				<?php } ?>
				<!-- <li class="active">
					<a href="index.php" class="dropdown-toggle">
						<i class="icon-list"></i>
						<span class="menu-text"> Gestión de Sistema </span>

						<b class="arrow icon-angle-down"></b>
					</a>

					<ul class="submenu">
						<li>
							<a href="tables.html">
								<i class="icon-double-angle-right"></i>
								Gestión de Sistema
							</a>
						</li>
						<li>
							<a href="tables.html">
								<i class="icon-double-angle-right"></i>
								Url
							</a>
						</li>
						<li>
							<a href="tables.html">
								<i class="icon-double-angle-right"></i>
								Roles
							</a>
						</li>
						<li>
							<a href="tables.html">
								<i class="icon-double-angle-right"></i>
								Menu
							</a>
						</li>
					</ul>
				</li> -->

				<!-- <li>
					<a href="typography.html">
						<i class="icon-text-width"></i>
						<span class="menu-text"> Typography </span>
					</a>
				</li>
				<li>
					<a href="#" class="dropdown-toggle">
						<i class="icon-list"></i>
						<span class="menu-text"> Tables </span>

						<b class="arrow icon-angle-down"></b>
					</a>

					<ul class="submenu">
						<li>
							<a href="tables.html">
								<i class="icon-double-angle-right"></i>
								Simple &amp; Dynamic
							</a>
						</li>

						<li>
							<a href="jqgrid.html">
								<i class="icon-double-angle-right"></i>
								jqGrid plugin
							</a>
						</li>
					</ul>
				</li>
				<li>
					<a href="calendar.html">
						<i class="icon-calendar"></i>

						<span class="menu-text">
							Calendar
							<span class="badge badge-transparent tooltip-error" title="2&nbsp;Important&nbsp;Events">
								<i class="icon-warning-sign red bigger-130"></i>
							</span>
						</span>
					</a>
				</li>

				<li>
					<a href="#" class="dropdown-toggle">
						<i class="icon-file-alt"></i>

						<span class="menu-text">
							Other Pages
							<span class="badge badge-primary ">5</span>
						</span>

						<b class="arrow icon-angle-down"></b>
					</a>

					<ul class="submenu">
						<li>
							<a href="faq.html">
								<i class="icon-double-angle-right"></i>
								FAQ
							</a>
						</li>

						<li>
							<a href="error-404.html">
								<i class="icon-double-angle-right"></i>
								Error 404
							</a>
						</li>

						<li>
							<a href="error-500.html">
								<i class="icon-double-angle-right"></i>
								Error 500
							</a>
						</li>

						<li>
							<a href="grid.html">
								<i class="icon-double-angle-right"></i>
								Grid
							</a>
						</li>

						<li>
							<a href="blank.html">
								<i class="icon-double-angle-right"></i>
								Blank Page
							</a>
						</li>
					</ul>
				</li> -->
			</ul><!--/.nav-list-->

			<div class="sidebar-collapse" id="sidebar-collapse">
				<i class="icon-double-angle-left" data-icon1="icon-double-angle-left" data-icon2="icon-double-angle-right"></i>
			</div>
		</div>
		<?php }?>

		<div class="main-content">
			<div class="breadcrumbs" id="breadcrumbs">

				<ul class="breadcrumb">
					<li>
						<i class="icon-home home-icon"></i>
						<a href="#">Inicio</a>
						<span class="divider">
							<i class="icon-angle-right arrow-icon"></i>
						</span>
					</li>
					<li class="active">Sistema</li>
				</ul><!--.breadcrumb-->
			</div>

			<div class="page-content">
				<div class="page-header position-relative">
					<!-- CONTENIDOOOOOOOOOO -->
					<div class="row-fluid">
						<div class="span12">
						<!--PAGE CONTENT BEGINS-->
							<?php echo $_smarty_tpl->tpl_vars['output']->value;?>

							<div class="hr hr32 hr-dotted"></div> <!-- LINEA HR -->
						</div>
					</div>
					<!-- CONTENIDOOOOOOOOOO -->

				</div><!--/.page-header-->
			</div><!--/.page-content-->
		</div><!--/.main-content-->
	</div><!--/.main-container-->

	<a href="#" id="btn-scroll-up" class="btn-scroll-up btn btn-small btn-inverse">
		<i class="icon-double-angle-up icon-only bigger-110"></i>
	</a>

	<!--basic scripts-->

	<script src="<?php echo $_smarty_tpl->tpl_vars['assetPath']->value;?>
js/ace-extra.min.js"></script>
	<!--[if !IE]>-->

	<!--<![endif]-->

	<!--[if !IE]>-->
	<script type="text/javascript">
		window.jQuery || document.write("<script src='<?php echo $_smarty_tpl->tpl_vars['assetPath']->value;?>
js/jquery-2.0.3.js'>"+"<"+"/script>");
	</script>
	<!--<![endif]-->

	<!--[if IE]>
		<script type="text/javascript">
 			window.jQuery || document.write("<script src='<?php echo $_smarty_tpl->tpl_vars['assetPath']->value;?>
js/jquery-1.10.2.min.js'>"+"<"+"/script>");
		</script>
	<![endif]-->

	<script type="text/javascript">
		if("ontouchend" in document) document.write("<script src='<?php echo $_smarty_tpl->tpl_vars['assetPath']->value;?>
js/jquery.mobile.custom.min.js'>"+"<"+"/script>");
	</script>
	<script src="<?php echo $_smarty_tpl->tpl_vars['assetPath']->value;?>
js/bootstrap.min.js"></script>
	<script src="<?php echo $_smarty_tpl->tpl_vars['assetPath']->value;?>
js/ace-elements.min.js"></script>
	<script src="<?php echo $_smarty_tpl->tpl_vars['assetPath']->value;?>
js/ace.js"></script>

	<!--inline scripts related to this page-->
	<!--[if IE]>
		
		<?php  $_smarty_tpl->tpl_vars['jsIEPath'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['jsIEPath']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['jsIE']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['jsIEPath']->key => $_smarty_tpl->tpl_vars['jsIEPath']->value){
$_smarty_tpl->tpl_vars['jsIEPath']->_loop = true;
?>
			<script src=<?php echo $_smarty_tpl->tpl_vars['jsIEPath']->value;?>
></script>
		<?php } ?>
	<![endif]-->
	
	<?php if (is_array($_smarty_tpl->tpl_vars['js_files']->value)){?>
		<?php  $_smarty_tpl->tpl_vars['files'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['files']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['js_files']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['files']->key => $_smarty_tpl->tpl_vars['files']->value){
$_smarty_tpl->tpl_vars['files']->_loop = true;
?>
			<script src="<?php echo $_smarty_tpl->tpl_vars['files']->value;?>
"></script>
		<?php } ?>
	<?php }?>
	<?php if (is_array($_smarty_tpl->tpl_vars['css_files']->value)){?>
		<?php  $_smarty_tpl->tpl_vars['files'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['files']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['css_files']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['files']->key => $_smarty_tpl->tpl_vars['files']->value){
$_smarty_tpl->tpl_vars['files']->_loop = true;
?>
			<link type="text/css" rel="stylesheet" href=<?php echo $_smarty_tpl->tpl_vars['files']->value;?>
 />
		<?php } ?>
	<?php }?>

	<script type="text/javascript">
	 	var base_url= '<?php echo $_smarty_tpl->tpl_vars['ciPath']->value;?>
';
	</script>

</body>
</html><?php }} ?>