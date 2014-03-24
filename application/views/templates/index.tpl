<!DOCTYPE html>
<html lang="es">

<head>
		<meta charset="utf-8" />
		<title>Dashboard - Ace Admin</title>
		<meta name="description" content="overview &amp; stats" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<script src="{$assetPath}js/jquery-2.0.3.min.js"></script>
		{*Incluir css*}
		{foreach from=$styles item=stylePath}
			<link rel="stylesheet" href={$stylePath}>
		{/foreach}

		<!--[if IE 7]>
			{*Incluir css IE 7*}
			{foreach from=$stylesIE7 item=styleIE7Path}
				<link rel="stylesheet" href={$styleIE7Path}>
			{/foreach}
		<![endif]-->

		{*Incluir font*}
		{foreach from=$font item=fontPath}
			<link rel="stylesheet" href={$fontPath}>
		{/foreach}

		<!--[if lte IE 8]>
		  	{*Incluir css IE 8*}
			{foreach from=$stylesIE8 item=styleIE8Path}
				<link rel="stylesheet" href={$styleIE8Path}>
			{/foreach}
		<![endif]-->

</head>

<body>

	<div class="navbar " id="navbar">
		<div class="navbar-inner navbar-color">
			<div class="container-fluid">
				<a href="#" class="brand logo nav-logo">
					<small>
						<img class="img" src="{$assetPath}images/Logo.png" style="height: 42px;width: 50px; margin-right: 50px;"  alt="Infoguia.com En un click lo encuentras todo!" title="Infoguia.com"/><small>Instituto Universitario Padre Ojeda</small>
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
									<img src="{$assetPath}avatars/avatar.png" class="msg-photo" alt="Alex's Avatar" />
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
									<img src="{$assetPath}avatars/avatar3.png" class="msg-photo" alt="Susan's Avatar" />
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
									<img src="{$assetPath}avatars/avatar4.png" class="msg-photo" alt="Bob's Avatar" />
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
							<img class="nav-user-photo" src="{$assetPath}avatars/User.png" alt="Jason's Photo" />
							<span class="user-info">
								<small>Bienvenido,</small>
								{$nombre}
							</span>
							<i class="icon-angle-down"></i>
						</a>
						<ul class="user-menu pull-right dropdown-menu dropdown-yellow dropdown-caret dropdown-closer">

							<li>
								<a href="{$ciPath}auth/logout">
									<i class="icon-off"></i>
									Cerrar Sesion
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

		{if $menu neq false}
		<div class="sidebar" id="sidebar">

			<ul class="nav nav-list">
				{foreach from=$menu item=cmenu}
					{$value = $ciPath|cat:$cmenu.url}
					{if $value|lower eq $currentUrl|lower}
						<li class="active">
					{else}
						<li>
					{/if}
						{if $cmenu.child eq false}
							<a href="{$ciPath}{$cmenu.url}">
								<i class="{$cmenu.icon}"></i>
								<span class="menu-text">{$cmenu.name} </span>
							</a>
						{else}
							<a href="#" class="dropdown-toggle">
								<i class="{$cmenu.icon}"></i>
								<span class="menu-text"> {$cmenu.name} </span>
								<b class="arrow icon-angle-down"></b>
							</a>
							<ul class="submenu">
								{foreach from=$cmenu.child item=cchild}
									{$value = $ciPath|cat:$cchild.url}
									{if $value|lower eq $currentUrl|lower}
										<li class="active">
											<script type="text/javascript">
												$('.active').parent().slideToggle(200).parent().toggleClass("open");
											</script>
									{else}
										<li>
									{/if}
										<a href="{$ciPath}{$cchild.url}">
											<i class="icon-double-angle-right"></i>
											{$cchild.name}
										</a>
									</li>
								{/foreach}
							</ul>

						{/if}
					</li>
				{/foreach}
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
		{/if}

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
							{$output}
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

	<script src="{$assetPath}js/ace-extra.min.js"></script>
	<!--[if !IE]>-->

	<!--<![endif]-->

	<!--[if !IE]>-->
	<script type="text/javascript">
		window.jQuery || document.write("<script src='{$assetPath}js/jquery-2.0.3.js'>"+"<"+"/script>");
	</script>
	<!--<![endif]-->

	<!--[if IE]>
		<script type="text/javascript">
 			window.jQuery || document.write("<script src='{$assetPath}js/jquery-1.10.2.min.js'>"+"<"+"/script>");
		</script>
	<![endif]-->

	<script type="text/javascript">
		if("ontouchend" in document) document.write("<script src='{$assetPath}js/jquery.mobile.custom.min.js'>"+"<"+"/script>");
	</script>
	<script src="{$assetPath}js/bootstrap.min.js"></script>
	<script src="{$assetPath}js/ace-elements.min.js"></script>
	<script src="{$assetPath}js/ace.js"></script>

	<!--inline scripts related to this page-->
	<!--[if IE]>
		{*Incluir JS IE*}
		{foreach from=$jsIE item=jsIEPath}
			<script src={$jsIEPath}></script>
		{/foreach}
	<![endif]-->
	{*Incluir JS*}
	{if is_array($js_files)}
		{foreach from=$js_files item=files}
			<script src="{$files}"></script>
		{/foreach}
	{/if}
	{if is_array($css_files)}
		{foreach from=$css_files item=files}
			<link type="text/css" rel="stylesheet" href={$files} />
		{/foreach}
	{/if}

	<script type="text/javascript">
	 	var base_url= '{$ciPath}';
	</script>

</body>
</html>