<?php /*%%SmartyHeaderCode:6489524348c0e55507-49794744%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '8f236344f758767274b9f1ae1516c1b2508109a8' => 
    array (
      0 => 'application\\views\\templates\\index.tpl',
      1 => 1380131083,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '6489524348c0e55507-49794744',
  'variables' => 
  array (
    'styles' => 0,
    'stylePath' => 0,
    'stylesIE7' => 0,
    'styleIE7Path' => 0,
    'font' => 0,
    'fontPath' => 0,
    'stylesIE8' => 0,
    'styleIE8Path' => 0,
    'assetPath' => 0,
    'menu' => 0,
    'ciPath' => 0,
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
  'version' => 'Smarty-3.1.14',
  'unifunc' => 'content_524348c115c5b3_55226192',
  'cache_lifetime' => 120,
),true); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_524348c115c5b3_55226192')) {function content_524348c115c5b3_55226192($_smarty_tpl) {?><!DOCTYPE html>
<html lang="es">

<head>
		<meta charset="utf-8" />
		<title>Dashboard - Ace Admin</title>
		<meta name="description" content="overview &amp; stats" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />

		
					<link rel="stylesheet" href=http://192.168.5.3/adsi_v1/assets/template/css/bootstrap.min.css>
					<link rel="stylesheet" href=http://192.168.5.3/adsi_v1/assets/template/css/bootstrap-responsive.min.css>
					<link rel="stylesheet" href=http://192.168.5.3/adsi_v1/assets/template/css/font-awesome.min.css>
					<link rel="stylesheet" href=http://192.168.5.3/adsi_v1/assets/template/css/ace.min.css>
					<link rel="stylesheet" href=http://192.168.5.3/adsi_v1/assets/template/css/ace-responsive.min.css>
					<link rel="stylesheet" href=http://192.168.5.3/adsi_v1/assets/template/css/style-skin.css>
					<link rel="stylesheet" href=http://192.168.5.3/adsi_v1/assets/template/css/style.css>
		
		<!--[if IE 7]>
			
							<link rel="stylesheet" href=http://192.168.5.3/adsi_v1/assets/template/css/font-awesome-ie7.min.css>
					<![endif]-->

		
					<link rel="stylesheet" href=//fonts.googleapis.com/css?family=Open+Sans:400,300>
		
		<!--[if lte IE 8]>
		  	
							<link rel="stylesheet" href=http://192.168.5.3/adsi_v1/assets/template/css/ace-ie.min.css>
					<![endif]-->

</head>

<body>

	<div class="navbar " id="navbar">
		<div class="navbar-inner navbar-color">
			<div class="container-fluid">
				<a href="#" class="brand logo nav-logo">
					<small>
						<img class="img" src="http://192.168.5.3/adsi_v1/assets/template/images/Logo.png"  alt="Infoguia.com En un click lo encuentras todo!" title="Infoguia.com" width="146" height="42"/>
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
									<img src="http://192.168.5.3/adsi_v1/assets/template/avatars/avatar.png" class="msg-photo" alt="Alex's Avatar" />
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
									<img src="http://192.168.5.3/adsi_v1/assets/template/avatars/avatar3.png" class="msg-photo" alt="Susan's Avatar" />
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
									<img src="http://192.168.5.3/adsi_v1/assets/template/avatars/avatar4.png" class="msg-photo" alt="Bob's Avatar" />
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
							<img class="nav-user-photo" src="http://192.168.5.3/adsi_v1/assets/template/avatars/User.png" alt="Jason's Photo" />
							<span class="user-info">
								<small>Bienvenido,</small>
								Jhoynerk
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
								<a href="#">
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

				<div class="sidebar" id="sidebar">

			<ul class="nav nav-list">
																				<li class="active">
																		<a href="http://192.168.5.3/adsi_v1/sistema/all">
								<i class="icon-keyboard"></i>
								<span class="menu-text">Sistema </span>
							</a>
											</li>
																				<li>
																		<a href="#" class="dropdown-toggle">
								<i class="icon-user"></i>
								<span class="menu-text"> Usuario </span>

								<b class="arrow icon-angle-down"></b>
							</a>
							<ul class="submenu">
																	<li>
										<a href="http://192.168.5.3/adsi_v1/user/management">
											<i class="icon-double-angle-right"></i>
											Gestión
										</a>
									</li>
																	<li>
										<a href="http://192.168.5.3/adsi_v1/user/permissions">
											<i class="icon-double-angle-right"></i>
											Permisos
										</a>
									</li>
															</ul>

											</li>
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
		
		<div class="main-content">
			<div class="breadcrumbs" id="breadcrumbs">

				<ul class="breadcrumb">
					<li>
						<i class="icon-home home-icon"></i>
						<a href="#">Home</a>
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
							<script type="text/javascript">
	var dialog_forms = '1';

</script>

<script type="text/javascript">
	var base_url = "http://192.168.5.3/adsi_v1/",
		subject = "Sistemas",
		ajax_list_info_url = "http://192.168.5.3/adsi_v1/sistema/all/ajax_list_info",
		unique_hash = "17c5efd0526b14cc1e34058330b683fe",
		message_alert_delete = "Estas seguro que queres eliminar este registro?";
</script>

<!-- UTILIZADO PARA IMPRESSÃO DA LISTAGEM -->
<div id="hidden-operations"></div>

<div class="twitter-bootstrap">
	<div id="main-table-box">
		<br/>
		<div id="options-content" class="span12">
												<a href="http://192.168.5.3/adsi_v1/sistema/all/add" title="Añadir Sistemas" class="add-anchor btn">
						<i class="icon-plus"></i>
						Añadir Sistemas					</a>
	 					 			<a class="export-anchor btn" data-url="http://192.168.5.3/adsi_v1/sistema/all/export" rel="external">
		 				<i class="icon-download"></i>
		 				Exportar		 			</a>
	 			 			<a class="btn" data-toggle="modal" href="#filtering-form-search" >
 				<i class="icon-search"></i>
 				Buscar 			</a>
 		</div>
		<br/>

		<!-- CONTENT FOR ALERT MESSAGES -->
		<div id="message-box" class="span12">
			<div class="alert alert-sucess hide">
				<a class="close" data-dismiss="alert" href="#"> x </a>
							</div>
		</div>

		<div id="ajax_list">
			<div class="span12" >
	<table class="table table-bordered tablesorter table-striped">
		<thead>
			<tr>
								<th>
					<div class="text-left field-sorting "
						rel="id">
						Id					</div>
				</th>
								<th>
					<div class="text-left field-sorting "
						rel="name">
						Nombre del Sistema					</div>
				</th>
								<th>
					<div class="text-left field-sorting "
						rel="alias">
						Alias					</div>
				</th>
												<th class="no-sorter">
						Acciones				</th>
							</tr>
		</thead>
		<tbody>
						<tr class="">
									<td class="">
						<div class="text-left">1</div>
					</td>
									<td class="">
						<div class="text-left">Sistema de Herramientas para Actualización</div>
					</td>
									<td class="">
						<div class="text-left">sha</div>
					</td>
												<td align="left">
					<div class="tools">
						<div class="btn-group">
							<button class="btn">Acciones</button>
							<button class="btn dropdown-toggle" data-toggle="dropdown">
								<span class="caret"></span>
							</button>
							<ul class="dropdown-menu">
																	<li>
										<a href="http://192.168.5.3/adsi_v1/sistema/all/edit/1" title="Editar Sistemas">
											<i class="icon-pencil"></i>
											Editar Sistemas										</a>
									</li>
																	<li>
										<a href="javascript:void(0);" data-target-url="http://192.168.5.3/adsi_v1/sistema/all/delete/1" title="Eliminar Sistemas" class="delete-row" >
											<i class="icon-trash"></i>
											Eliminar Sistemas										</a>
									</li>
																		<li>
											<a href="http://192.168.5.3/adsi_v1/url/index/1" class=" crud-action" title="Urls">												<img src="http://192.168.5.3/adsi_v1/assets/grocery_crud/themes/flexigrid/css/images/link.png" alt="" />
											 Urls											</a>
										</li>
																			<li>
											<a href="http://192.168.5.3/adsi_v1/role/index/1" class="ui-icon-imagen crud-action" title="Roles"> Roles											</a>
										</li>
																			<li>
											<a href="http://192.168.5.3/adsi_v1/menu/index/1" class="ui-icon-imagen crud-action" title="Menu"> Menu											</a>
										</li>
																	</ul>
							</div>
							<div class="clear"></div>
						</div>
					</td>
									</tr>
							<tr class="erow">
									<td class="">
						<div class="text-left">2</div>
					</td>
									<td class="">
						<div class="text-left">Sistema de Registro y Control...</div>
					</td>
									<td class="">
						<div class="text-left">srcc</div>
					</td>
												<td align="left">
					<div class="tools">
						<div class="btn-group">
							<button class="btn">Acciones</button>
							<button class="btn dropdown-toggle" data-toggle="dropdown">
								<span class="caret"></span>
							</button>
							<ul class="dropdown-menu">
																	<li>
										<a href="http://192.168.5.3/adsi_v1/sistema/all/edit/2" title="Editar Sistemas">
											<i class="icon-pencil"></i>
											Editar Sistemas										</a>
									</li>
																	<li>
										<a href="javascript:void(0);" data-target-url="http://192.168.5.3/adsi_v1/sistema/all/delete/2" title="Eliminar Sistemas" class="delete-row" >
											<i class="icon-trash"></i>
											Eliminar Sistemas										</a>
									</li>
																		<li>
											<a href="http://192.168.5.3/adsi_v1/url/index/2" class=" crud-action" title="Urls">												<img src="http://192.168.5.3/adsi_v1/assets/grocery_crud/themes/flexigrid/css/images/link.png" alt="" />
											 Urls											</a>
										</li>
																			<li>
											<a href="http://192.168.5.3/adsi_v1/role/index/2" class="ui-icon-imagen crud-action" title="Roles"> Roles											</a>
										</li>
																			<li>
											<a href="http://192.168.5.3/adsi_v1/menu/index/2" class="ui-icon-imagen crud-action" title="Menu"> Menu											</a>
										</li>
																	</ul>
							</div>
							<div class="clear"></div>
						</div>
					</td>
									</tr>
							<tr class="">
									<td class="">
						<div class="text-left">3</div>
					</td>
									<td class="">
						<div class="text-left">Sistema de Administración de...</div>
					</td>
									<td class="">
						<div class="text-left">sace</div>
					</td>
												<td align="left">
					<div class="tools">
						<div class="btn-group">
							<button class="btn">Acciones</button>
							<button class="btn dropdown-toggle" data-toggle="dropdown">
								<span class="caret"></span>
							</button>
							<ul class="dropdown-menu">
																	<li>
										<a href="http://192.168.5.3/adsi_v1/sistema/all/edit/3" title="Editar Sistemas">
											<i class="icon-pencil"></i>
											Editar Sistemas										</a>
									</li>
																	<li>
										<a href="javascript:void(0);" data-target-url="http://192.168.5.3/adsi_v1/sistema/all/delete/3" title="Eliminar Sistemas" class="delete-row" >
											<i class="icon-trash"></i>
											Eliminar Sistemas										</a>
									</li>
																		<li>
											<a href="http://192.168.5.3/adsi_v1/url/index/3" class=" crud-action" title="Urls">												<img src="http://192.168.5.3/adsi_v1/assets/grocery_crud/themes/flexigrid/css/images/link.png" alt="" />
											 Urls											</a>
										</li>
																			<li>
											<a href="http://192.168.5.3/adsi_v1/role/index/3" class="ui-icon-imagen crud-action" title="Roles"> Roles											</a>
										</li>
																			<li>
											<a href="http://192.168.5.3/adsi_v1/menu/index/3" class="ui-icon-imagen crud-action" title="Menu"> Menu											</a>
										</li>
																	</ul>
							</div>
							<div class="clear"></div>
						</div>
					</td>
									</tr>
							<tr class="erow">
									<td class="">
						<div class="text-left">4</div>
					</td>
									<td class="">
						<div class="text-left">Administracion de sistemas</div>
					</td>
									<td class="">
						<div class="text-left">adsi</div>
					</td>
												<td align="left">
					<div class="tools">
						<div class="btn-group">
							<button class="btn">Acciones</button>
							<button class="btn dropdown-toggle" data-toggle="dropdown">
								<span class="caret"></span>
							</button>
							<ul class="dropdown-menu">
																	<li>
										<a href="http://192.168.5.3/adsi_v1/sistema/all/edit/4" title="Editar Sistemas">
											<i class="icon-pencil"></i>
											Editar Sistemas										</a>
									</li>
																	<li>
										<a href="javascript:void(0);" data-target-url="http://192.168.5.3/adsi_v1/sistema/all/delete/4" title="Eliminar Sistemas" class="delete-row" >
											<i class="icon-trash"></i>
											Eliminar Sistemas										</a>
									</li>
																		<li>
											<a href="http://192.168.5.3/adsi_v1/url/index/4" class=" crud-action" title="Urls">												<img src="http://192.168.5.3/adsi_v1/assets/grocery_crud/themes/flexigrid/css/images/link.png" alt="" />
											 Urls											</a>
										</li>
																			<li>
											<a href="http://192.168.5.3/adsi_v1/role/index/4" class="ui-icon-imagen crud-action" title="Roles"> Roles											</a>
										</li>
																			<li>
											<a href="http://192.168.5.3/adsi_v1/menu/index/4" class="ui-icon-imagen crud-action" title="Menu"> Menu											</a>
										</li>
																	</ul>
							</div>
							<div class="clear"></div>
						</div>
					</td>
									</tr>
							<tr class="">
									<td class="">
						<div class="text-left">5</div>
					</td>
									<td class="">
						<div class="text-left">Sistema</div>
					</td>
									<td class="">
						<div class="text-left">sis</div>
					</td>
												<td align="left">
					<div class="tools">
						<div class="btn-group">
							<button class="btn">Acciones</button>
							<button class="btn dropdown-toggle" data-toggle="dropdown">
								<span class="caret"></span>
							</button>
							<ul class="dropdown-menu">
																	<li>
										<a href="http://192.168.5.3/adsi_v1/sistema/all/edit/5" title="Editar Sistemas">
											<i class="icon-pencil"></i>
											Editar Sistemas										</a>
									</li>
																	<li>
										<a href="javascript:void(0);" data-target-url="http://192.168.5.3/adsi_v1/sistema/all/delete/5" title="Eliminar Sistemas" class="delete-row" >
											<i class="icon-trash"></i>
											Eliminar Sistemas										</a>
									</li>
																		<li>
											<a href="http://192.168.5.3/adsi_v1/url/index/5" class=" crud-action" title="Urls">												<img src="http://192.168.5.3/adsi_v1/assets/grocery_crud/themes/flexigrid/css/images/link.png" alt="" />
											 Urls											</a>
										</li>
																			<li>
											<a href="http://192.168.5.3/adsi_v1/role/index/5" class="ui-icon-imagen crud-action" title="Roles"> Roles											</a>
										</li>
																			<li>
											<a href="http://192.168.5.3/adsi_v1/menu/index/5" class="ui-icon-imagen crud-action" title="Menu"> Menu											</a>
										</li>
																	</ul>
							</div>
							<div class="clear"></div>
						</div>
					</td>
									</tr>
							</tbody>
		</table>
	</div>
		</div>

		<div class="pGroup span12">
			<select name="tb_per_page" id="tb_per_page">
									<option value="10"  >10</option>
									<option value="25" selected="selected" >25</option>
									<option value="50"  >50</option>
									<option value="100"  >100</option>
							</select>

			<span class="pPageStat">
				Mostrando <span id="page-starts-from">1</span> a <span id="page-ends-to">5</span> de <span id="total_items" class="badge badge-info">5</span> registros			</span>

			<span class="pcontrol">
				Pagina				<input name="tb_crud_page" type="text" value="1" size="4" id="tb_crud_page">
				de				<span id="last-page-number">1</span>
			</span>

			<div class="hide loading" id="ajax-loading">Cargando, actualizando cambios...</div>

			<ul class="pager">
				<li class="previous first-button"><a href="javascript:void(0);">&laquo; Primero</a></li>
				<li class="prev-button"><a href="javascript:void(0);">&laquo; Anterior</a></li>
				<li class="next-button"><a href="javascript:void(0);">Siguiente &raquo;</a></li>
				<li class="next last-button"><a href="javascript:void(0);">Ultimo &raquo;</a></li>
			</ul>
		</div>
	</div>
</div>


<div class="modal hide" id="filtering-form-search">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">✕</button>
        <h3>Buscar Sistemas</h3>
    </div>
        <div class="modal-body" style="text-align:center;">
        <div class="row-fluid">
            <div class="span10 offset1">
                <div id="modalTab">
                    <div class="tab-content">
						<form action="http://192.168.5.3/adsi_v1/sistema/all/ajax_list" method="post" id="filtering_form" autocomplete = "off" accept-charset="utf-8">						<div class="sDiv" id="quickSearchBox">
							<div class="sDiv2">
								<input type="hidden" name="page" value="1" size="4" id="crud_page">
								<input type="hidden" name="per_page" id="per_page" value="25" />
								<input type="hidden" name="order_by[0]" id="hidden-sorting" value="" />
								<input type="hidden" name="order_by[1]" id="hidden-ordering"  value=""/>

								Buscar: <input type="text" class="qsbsearch_fieldox" name="search_text" size="30" id="search_text">
								<select name="search_field" id="search_field">
									<option value="">Buscar todo</option>
																			<option value="id">Id</option>
																			<option value="name">Nombre del Sistema</option>
																			<option value="alias">Alias</option>
																	</select>

								<input type="button" class="btn btn-primary" data-dismiss="modal" value="Buscar" id="crud_search">
								<input type="button" class="btn btn-inverse" data-dismiss="modal" value="Resetear filtro" id="search_clear">
							</div>
						</div>
						</form>                    </div>
                </div>
            </div>
        </div>
    </div>
</div><script type="text/javascript">
	var default_javascript_path = 'http://192.168.5.3/adsi_v1/assets/grocery_crud/js';
	var default_css_path = 'http://192.168.5.3/adsi_v1/assets/grocery_crud/css';
	var default_texteditor_path = 'http://192.168.5.3/adsi_v1/assets/grocery_crud/texteditor';
	var default_theme_path = 'http://192.168.5.3/adsi_v1/assets/grocery_crud/themes';
	var base_url = 'http://192.168.5.3/adsi_v1/';

</script>

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
	<script src="http://192.168.5.3/adsi_v1/assets/template/js/jquery-2.0.3.min.js"></script>
	<script src="http://192.168.5.3/adsi_v1/assets/template/js/ace-extra.min.js"></script>
	<!--[if !IE]>-->

	<!--<![endif]-->

	<!--[if !IE]>-->
	<script type="text/javascript">
		window.jQuery || document.write("<script src='http://192.168.5.3/adsi_v1/assets/template/js/jquery-2.0.3.js'>"+"<"+"/script>");
	</script>
	<!--<![endif]-->

	<!--[if IE]>
		<script type="text/javascript">
 			window.jQuery || document.write("<script src='http://192.168.5.3/adsi_v1/assets/template/js/jquery-1.10.2.min.js'>"+"<"+"/script>");
		</script>
	<![endif]-->

	<script type="text/javascript">
		if("ontouchend" in document) document.write("<script src='http://192.168.5.3/adsi_v1/assets/template/js/jquery.mobile.custom.min.js'>"+"<"+"/script>");
	</script>
	<script src="http://192.168.5.3/adsi_v1/assets/template/js/bootstrap.min.js"></script>
	<script src="http://192.168.5.3/adsi_v1/assets/template/js/ace-elements.min.js"></script>
	<script src="http://192.168.5.3/adsi_v1/assets/template/js/ace.js"></script>

	<!--inline scripts related to this page-->
	<!--[if IE]>
		
			<![endif]-->
	
			<script src="http://192.168.5.3/adsi_v1/assets/grocery_crud/js/common/lazyload-min.js"></script>
			<script src="http://192.168.5.3/adsi_v1/assets/grocery_crud/js/common/list.js"></script>
			<script src="http://192.168.5.3/adsi_v1/assets/grocery_crud/themes/twitter-bootstrap/js/libs/bootstrap/application.js"></script>
			<script src="http://192.168.5.3/adsi_v1/assets/grocery_crud/themes/twitter-bootstrap/js/libs/modernizr/modernizr-2.6.1.custom.js"></script>
			<script src="http://192.168.5.3/adsi_v1/assets/grocery_crud/themes/twitter-bootstrap/js/libs/tablesorter/jquery.tablesorter.min.js"></script>
			<script src="http://192.168.5.3/adsi_v1/assets/grocery_crud/themes/twitter-bootstrap/js/cookies.js"></script>
			<script src="http://192.168.5.3/adsi_v1/assets/grocery_crud/themes/twitter-bootstrap/js/jquery.form.js"></script>
			<script src="http://192.168.5.3/adsi_v1/assets/grocery_crud/js/jquery_plugins/jquery.numeric.min.js"></script>
			<script src="http://192.168.5.3/adsi_v1/assets/grocery_crud/themes/twitter-bootstrap/js/libs/print-element/jquery.printElement.min.js"></script>
			<script src="http://192.168.5.3/adsi_v1/assets/grocery_crud/js/jquery_plugins/jquery.fancybox-1.3.4.js"></script>
			<script src="http://192.168.5.3/adsi_v1/assets/grocery_crud/js/jquery_plugins/jquery.easing-1.3.pack.js"></script>
			<script src="http://192.168.5.3/adsi_v1/assets/grocery_crud/themes/twitter-bootstrap/js/app/twitter-bootstrap.js"></script>
			<script src="http://192.168.5.3/adsi_v1/assets/grocery_crud/themes/twitter-bootstrap/js/jquery.functions.js"></script>
			<script src="http://192.168.5.3/adsi_v1/assets/js/chosen-icon.js"></script>
			<script src="http://192.168.5.3/adsi_v1/assets/js/icon-array.js"></script>
			<script src="http://192.168.5.3/adsi_v1/assets/js/system-icons.js"></script>
	
			<link type="text/css" rel="stylesheet" href=http://192.168.5.3/adsi_v1/assets/chosen/chosen.css />
	
	<script type="text/javascript">
	 	var base_url= 'http://192.168.5.3/adsi_v1/';
	</script>

</body>
</html><?php }} ?>