
<!DOCTYPE html>
<html lang="en">
	
<!-- Mirrored from 192.69.216.111/themes/preview/ace/login.html by HTTrack Website Copier/3.x [XR&CO'2013], Mon, 19 Aug 2013 14:04:52 GMT -->
<head>
		<meta charset="utf-8" />
		<title>Login Page - Ace Admin</title>

		<meta name="description" content="User login page" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />

		<!--basic styles-->

		<link href="assets/css/bootstrap.min.css" rel="stylesheet" />
		<link href="assets/css/bootstrap-responsive.min.css" rel="stylesheet" />
		<link rel="stylesheet" href="assets/css/font-awesome.min.css" />

		<!--[if IE 7]>
		  <link rel="stylesheet" href="assets/css/font-awesome-ie7.min.css" />
		<![endif]-->

		<!--page specific plugin styles-->

		<!--fonts-->

		<link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Open+Sans:400,300" />

		<!--ace styles-->

		<link rel="stylesheet" href="assets/css/ace.min.css" />
		<link rel="stylesheet" href="assets/css/ace-responsive.min.css" />
		<link rel="stylesheet" href="assets/css/ace-skins.min.css" />

		<!--[if lte IE 8]>
		  <link rel="stylesheet" href="assets/css/ace-ie.min.css" />
		<![endif]-->

		<!--inline styles related to this page-->

		<!--ace settings handler-->


		<script src="assets/js/ace-extra.min.js"></script>


	</head>

	<body >
		<div class="main-container container-fluid">
			<div class="main-content">
			








<div class="page-content">
					<div class="page-header position-relative">
						<h1>
							Form Elements
							<small>
								<i class="icon-double-angle-right"></i>
								Common form elements and layouts
							</small>
						</h1>
					</div><!--/.page-header-->

					<div class="row-fluid">
						<div class="span12">
							<!--PAGE CONTENT BEGINS-->

							<form class="form-horizontal">
								<div class="control-group">
									<label class="control-label" for="form-field-1">Text Field</label>

									<div class="controls">
										<input type="text" id="form-field-1" placeholder="Username">
									</div>
								</div>

								<div class="control-group">
									<label class="control-label" for="form-field-2">Password Field</label>

									<div class="controls">
										<input type="password" id="form-field-2" placeholder="Password">
										<span class="help-inline">Inline help text</span>
									</div>
								</div>

								<div class="control-group">
									<label class="control-label" for="form-input-readonly">Readonly field</label>

									<div class="controls">
										<input readonly="" type="text" id="form-input-readonly" value="This text field is readonly!">
										&nbsp; &nbsp;
										<input class="ace" type="checkbox" id="id-disable-check">
										<label class="lbl" for="id-disable-check"> Disable it!</label>
									</div>
								</div>

								<div class="control-group">
									<label class="control-label" for="form-field-4">Relative Sizing</label>

									<div class="controls">
										<input class="input-mini" type="text" id="form-field-4" placeholder=".input-mini">
										<div class="help-block ui-slider ui-slider-horizontal ui-widget ui-widget-content ui-corner-all" id="input-size-slider" aria-disabled="false" style="width: 200px;"><div class="ui-slider-range ui-widget-header ui-corner-all ui-slider-range-min" style="width: 0%;"></div><a class="ui-slider-handle ui-state-default ui-corner-all" href="#" style="left: 0%;"></a></div>
									</div>
								</div>

								<div class="control-group">
									<label class="control-label" for="form-field-5">Grid Sizing</label>

									<div class="controls">
										<input class="span1" type="text" id="form-field-5" placeholder=".span1">
										<input class="span11" type="text" placeholder=".span11">
										<div class="help-block ui-slider ui-slider-horizontal ui-widget ui-widget-content ui-corner-all" id="input-span-slider" aria-disabled="false"><div class="ui-slider-range ui-widget-header ui-corner-all ui-slider-range-min" style="width: 0%;"></div><a class="ui-slider-handle ui-state-default ui-corner-all" href="#" style="left: 0%;"></a></div>
									</div>
								</div>

								<div class="control-group">
									<label class="control-label">Input with Icon</label>

									<div class="controls">
										<span class="input-icon">
											<input type="text" id="form-field-icon-1">
											<i class="icon-leaf"></i>
										</span>

										<span class="input-icon input-icon-right">
											<input type="text" id="form-field-icon-2">
											<i class="icon-leaf"></i>
										</span>
									</div>
								</div>

								<div class="control-group">
									<label class="control-label" for="form-field-6">Tooltip and help button</label>

									<div class="controls">
										<input data-rel="tooltip" type="text" id="form-field-6" placeholder="Tooltip on hover" title="" data-placement="bottom" data-original-title="Hello Tooltip!">
										<span class="help-button" data-rel="popover" data-trigger="hover" data-placement="left" data-content="More details." title="" data-original-title="Popover on hover">?</span>
									</div>
								</div>

								<div class="space-4"></div>

								<div class="control-group">
									<label class="control-label" for="form-field-tags">Tag input</label>

									<div class="controls"><div class="tags"><span class="tag">Tag Input Control<button type="button" class="close">×</button></span><input type="text" name="tags" id="form-field-tags" value="Tag Input Control" placeholder="Enter tags ..." style="display: none;"><input type="text" placeholder="Enter tags ..."></div>
										
									</div>
								</div>

								<div class="form-actions">
									<button class="btn btn-info" type="button">
										<i class="icon-ok bigger-110"></i>
										Submit
									</button>

									&nbsp; &nbsp; &nbsp;
									<button class="btn" type="reset">
										<i class="icon-undo bigger-110"></i>
										Reset
									</button>
								</div>

								<div class="hr"></div>

								<div class="row-fluid">
									<div class="span4">
										<div class="widget-box">
											<div class="widget-header">
												<h4>Text Area</h4>

												<span class="widget-toolbar">
													<a href="#" data-action="collapse">
														<i class="icon-chevron-up"></i>
													</a>

													<a href="#" data-action="close">
														<i class="icon-remove"></i>
													</a>
												</span>
											</div>

											<div class="widget-body">
												<div class="widget-main">
													<div class="row-fluid">
														<label for="form-field-8">Default</label>

														<textarea class="span12" id="form-field-8" placeholder="Default Text"></textarea>
													</div>

													<hr>
													<div class="row-fluid">
														<label for="form-field-9">With Character Limit</label>

														<textarea class="span12 limited" id="form-field-9" maxlength="50"></textarea>
													</div>

													<hr>
													<div class="row-fluid">
														<label for="form-field-11">Autosize</label>

														<textarea id="form-field-11" class="autosize-transition span12" style="overflow: hidden; word-wrap: break-word; resize: horizontal; height: 50px;"></textarea>
													</div>
												</div>
											</div>
										</div>
									</div><!--/span-->

									<div class="span4">
										<div class="widget-box">
											<div class="widget-header">
												<h4>Masked Input</h4>

												<span class="widget-toolbar">
													<a href="#" data-action="settings">
														<i class="icon-cog"></i>
													</a>

													<a href="#" data-action="reload">
														<i class="icon-refresh"></i>
													</a>

													<a href="#" data-action="collapse">
														<i class="icon-chevron-up"></i>
													</a>

													<a href="#" data-action="close">
														<i class="icon-remove"></i>
													</a>
												</span>
											</div>

											<div class="widget-body">
												<div class="widget-main">
													<div class="row-fluid">
														<label for="form-field-mask-1">
															Date
															<small class="text-success">99/99/9999</small>
														</label>

														<div class="input-append">
															<input class="input-small input-mask-date" type="text" id="form-field-mask-1">
															<span class="btn btn-small">
																<i class="icon-calendar bigger-110"></i>
																Go!
															</span>
														</div>
													</div>

													<hr>
													<div class="row-fluid">
														<label for="form-field-mask-2">
															Phone
															<small class="text-warning">(999) 999-9999</small>
														</label>

														<div class="input-prepend">
															<span class="add-on">
																<i class="icon-phone"></i>
															</span>

															<input class="input-medium input-mask-phone" type="text" id="form-field-mask-2">
														</div>
													</div>

													<hr>
													<div class="row-fluid">
														<label for="form-field-mask-3">
															Product Key
															<small class="text-error">a*-999-a999</small>
														</label>

														<div class="input-prepend">
															<span class="add-on">
																<i class="icon-key"></i>
															</span>

															<input class="input-medium input-mask-product" type="text" id="form-field-mask-3">
														</div>
													</div>

													<hr>
													<div class="row-fluid">
														<label for="form-field-mask-4">
															Eye Script
															<small class="text-info">~9.99 ~9.99 999</small>
														</label>

														<div>
															<input class="input-medium input-mask-eyescript" type="text" id="form-field-mask-4">
														</div>
													</div>
												</div>
											</div>
										</div>
									</div><!--/span-->

									<div class="span4">
										<div class="widget-box">
											<div class="widget-header">
												<h4>Select Box</h4>

												<span class="widget-toolbar">
													<a href="#" data-action="settings">
														<i class="icon-cog"></i>
													</a>

													<a href="#" data-action="reload">
														<i class="icon-refresh"></i>
													</a>

													<a href="#" data-action="collapse">
														<i class="icon-chevron-up"></i>
													</a>

													<a href="#" data-action="close">
														<i class="icon-remove"></i>
													</a>
												</span>
											</div>

											<div class="widget-body">
												<div class="widget-main">
													<div class="row-fluid">
														<label for="form-field-select-1">Default</label>

														<select id="form-field-select-1">
															<option value="">&nbsp;</option>
															<option value="AL">Alabama</option>
															<option value="AK">Alaska</option>
															<option value="AZ">Arizona</option>
															<option value="AR">Arkansas</option>
															<option value="CA">California</option>
															<option value="CO">Colorado</option>
															<option value="CT">Connecticut</option>
															<option value="DE">Delaware</option>
															<option value="FL">Florida</option>
															<option value="GA">Georgia</option>
															<option value="HI">Hawaii</option>
															<option value="ID">Idaho</option>
															<option value="IL">Illinois</option>
															<option value="IN">Indiana</option>
															<option value="IA">Iowa</option>
															<option value="KS">Kansas</option>
															<option value="KY">Kentucky</option>
															<option value="LA">Louisiana</option>
															<option value="ME">Maine</option>
															<option value="MD">Maryland</option>
															<option value="MA">Massachusetts</option>
															<option value="MI">Michigan</option>
															<option value="MN">Minnesota</option>
															<option value="MS">Mississippi</option>
															<option value="MO">Missouri</option>
															<option value="MT">Montana</option>
															<option value="NE">Nebraska</option>
															<option value="NV">Nevada</option>
															<option value="NH">New Hampshire</option>
															<option value="NJ">New Jersey</option>
															<option value="NM">New Mexico</option>
															<option value="NY">New York</option>
															<option value="NC">North Carolina</option>
															<option value="ND">North Dakota</option>
															<option value="OH">Ohio</option>
															<option value="OK">Oklahoma</option>
															<option value="OR">Oregon</option>
															<option value="PA">Pennsylvania</option>
															<option value="RI">Rhode Island</option>
															<option value="SC">South Carolina</option>
															<option value="SD">South Dakota</option>
															<option value="TN">Tennessee</option>
															<option value="TX">Texas</option>
															<option value="UT">Utah</option>
															<option value="VT">Vermont</option>
															<option value="VA">Virginia</option>
															<option value="WA">Washington</option>
															<option value="WV">West Virginia</option>
															<option value="WI">Wisconsin</option>
															<option value="WY">Wyoming</option>
														</select>
													</div>

													<hr>
													<div class="row-fluid">
														<label for="form-field-select-2">Multiple</label>

														<select id="form-field-select-2" multiple="multiple">
															<option value="AL">Alabama</option>
															<option value="AK">Alaska</option>
															<option value="AZ">Arizona</option>
															<option value="AR">Arkansas</option>
															<option value="CA">California</option>
															<option value="CO">Colorado</option>
															<option value="CT">Connecticut</option>
															<option value="DE">Delaware</option>
															<option value="FL">Florida</option>
															<option value="GA">Georgia</option>
															<option value="HI">Hawaii</option>
															<option value="ID">Idaho</option>
															<option value="IL">Illinois</option>
															<option value="IN">Indiana</option>
															<option value="IA">Iowa</option>
															<option value="KS">Kansas</option>
															<option value="KY">Kentucky</option>
															<option value="LA">Louisiana</option>
															<option value="ME">Maine</option>
															<option value="MD">Maryland</option>
															<option value="MA">Massachusetts</option>
															<option value="MI">Michigan</option>
															<option value="MN">Minnesota</option>
															<option value="MS">Mississippi</option>
															<option value="MO">Missouri</option>
															<option value="MT">Montana</option>
															<option value="NE">Nebraska</option>
															<option value="NV">Nevada</option>
															<option value="NH">New Hampshire</option>
															<option value="NJ">New Jersey</option>
															<option value="NM">New Mexico</option>
															<option value="NY">New York</option>
															<option value="NC">North Carolina</option>
															<option value="ND">North Dakota</option>
															<option value="OH">Ohio</option>
															<option value="OK">Oklahoma</option>
															<option value="OR">Oregon</option>
															<option value="PA">Pennsylvania</option>
															<option value="RI">Rhode Island</option>
															<option value="SC">South Carolina</option>
															<option value="SD">South Dakota</option>
															<option value="TN">Tennessee</option>
															<option value="TX">Texas</option>
															<option value="UT">Utah</option>
															<option value="VT">Vermont</option>
															<option value="VA">Virginia</option>
															<option value="WA">Washington</option>
															<option value="WV">West Virginia</option>
															<option value="WI">Wisconsin</option>
															<option value="WY">Wyoming</option>
														</select>
													</div>

													<hr>
													<div class="row-fluid">
														<label for="form-field-select-3">Chosen</label>

														<select class="chosen-select" id="form-field-select-3" data-placeholder="Choose a Country..." style="display: none;">
															<option value="">&nbsp;</option>
															<option value="AL">Alabama</option>
															<option value="AK">Alaska</option>
															<option value="AZ">Arizona</option>
															<option value="AR">Arkansas</option>
															<option value="CA">California</option>
															<option value="CO">Colorado</option>
															<option value="CT">Connecticut</option>
															<option value="DE">Delaware</option>
															<option value="FL">Florida</option>
															<option value="GA">Georgia</option>
															<option value="HI">Hawaii</option>
															<option value="ID">Idaho</option>
															<option value="IL">Illinois</option>
															<option value="IN">Indiana</option>
															<option value="IA">Iowa</option>
															<option value="KS">Kansas</option>
															<option value="KY">Kentucky</option>
															<option value="LA">Louisiana</option>
															<option value="ME">Maine</option>
															<option value="MD">Maryland</option>
															<option value="MA">Massachusetts</option>
															<option value="MI">Michigan</option>
															<option value="MN">Minnesota</option>
															<option value="MS">Mississippi</option>
															<option value="MO">Missouri</option>
															<option value="MT">Montana</option>
															<option value="NE">Nebraska</option>
															<option value="NV">Nevada</option>
															<option value="NH">New Hampshire</option>
															<option value="NJ">New Jersey</option>
															<option value="NM">New Mexico</option>
															<option value="NY">New York</option>
															<option value="NC">North Carolina</option>
															<option value="ND">North Dakota</option>
															<option value="OH">Ohio</option>
															<option value="OK">Oklahoma</option>
															<option value="OR">Oregon</option>
															<option value="PA">Pennsylvania</option>
															<option value="RI">Rhode Island</option>
															<option value="SC">South Carolina</option>
															<option value="SD">South Dakota</option>
															<option value="TN">Tennessee</option>
															<option value="TX">Texas</option>
															<option value="UT">Utah</option>
															<option value="VT">Vermont</option>
															<option value="VA">Virginia</option>
															<option value="WA">Washington</option>
															<option value="WV">West Virginia</option>
															<option value="WI">Wisconsin</option>
															<option value="WY">Wyoming</option>
														</select><div class="chosen-container chosen-container-single" style="width: 220px;" title="" id="form_field_select_3_chosen"><a class="chosen-single" tabindex="-1"><span>&nbsp;</span><div><b></b></div></a><div class="chosen-drop"><div class="chosen-search"><input type="text" autocomplete="off"></div><ul class="chosen-results"></ul></div></div>
													</div>

													<hr>
													<div class="row-fluid">
														<div class="row-fluid">
															<div class="span7">
																<span class="bigger-110">Multiple</span>
															</div><!--/span-->

															<div class="span5">
																<span class="pull-right inline">
																	<span class="grey">style:</span>

																	<span class="btn-toolbar inline middle no-margin">
																		<span id="chosen-multiple-style" data-toggle="buttons-radio" class="btn-group no-margin">
																			<button type="button" class="btn btn-mini btn-yellow active">1</button>
																			<button type="button" class="btn btn-mini btn-yellow">2</button>
																		</span>
																	</span>
																</span>
															</div><!--/span-->
														</div>

														<select multiple="" class="chosen-select" id="form-field-select-4" data-placeholder="Choose a Country..." style="display: none;">
															<option value="">&nbsp;</option>
															<option value="AL">Alabama</option>
															<option value="AK">Alaska</option>
															<option value="AZ">Arizona</option>
															<option value="AR">Arkansas</option>
															<option value="CA">California</option>
															<option value="CO">Colorado</option>
															<option value="CT">Connecticut</option>
															<option value="DE">Delaware</option>
															<option value="FL">Florida</option>
															<option value="GA">Georgia</option>
															<option value="HI">Hawaii</option>
															<option value="ID">Idaho</option>
															<option value="IL">Illinois</option>
															<option value="IN">Indiana</option>
															<option value="IA">Iowa</option>
															<option value="KS">Kansas</option>
															<option value="KY">Kentucky</option>
															<option value="LA">Louisiana</option>
															<option value="ME">Maine</option>
															<option value="MD">Maryland</option>
															<option value="MA">Massachusetts</option>
															<option value="MI">Michigan</option>
															<option value="MN">Minnesota</option>
															<option value="MS">Mississippi</option>
															<option value="MO">Missouri</option>
															<option value="MT">Montana</option>
															<option value="NE">Nebraska</option>
															<option value="NV">Nevada</option>
															<option value="NH">New Hampshire</option>
															<option value="NJ">New Jersey</option>
															<option value="NM">New Mexico</option>
															<option value="NY">New York</option>
															<option value="NC">North Carolina</option>
															<option value="ND">North Dakota</option>
															<option value="OH">Ohio</option>
															<option value="OK">Oklahoma</option>
															<option value="OR">Oregon</option>
															<option value="PA">Pennsylvania</option>
															<option value="RI">Rhode Island</option>
															<option value="SC">South Carolina</option>
															<option value="SD">South Dakota</option>
															<option value="TN">Tennessee</option>
															<option value="TX">Texas</option>
															<option value="UT">Utah</option>
															<option value="VT">Vermont</option>
															<option value="VA">Virginia</option>
															<option value="WA">Washington</option>
															<option value="WV">West Virginia</option>
															<option value="WI">Wisconsin</option>
															<option value="WY">Wyoming</option>
														</select><div class="chosen-container chosen-container-multi" style="width: 220px;" title="" id="form_field_select_4_chosen"><ul class="chosen-choices"><li class="search-field"><input type="text" value="Choose a Country..." class="default" autocomplete="off" style="width: 141px;"></li></ul><div class="chosen-drop"><ul class="chosen-results"></ul></div></div>
													</div>
												</div>
											</div>
										</div>
									</div><!--/span-->
								</div><!--/row-->

								<div class="space-24"></div>

								<h3 class="header smaller lighter blue">
									Checkboxes &amp; Radio
									<small>All Checkboxes, Radios and Switch Buttons Are Pure CSS</small>
								</h3>

								<div class="row-fluid">
									<div class="span5">
										<div class="control-group">
											<label class="control-label">Checkbox</label>

											<div class="controls">
												<label>
													<input name="form-field-checkbox" type="checkbox" class="ace">
													<span class="lbl"> choice 1</span>
												</label>

												<label>
													<input name="form-field-checkbox" type="checkbox" class="ace">
													<span class="lbl"> choice 2</span>
												</label>

												<label>
													<input name="form-field-checkbox" class="ace ace-checkbox-2" type="checkbox">
													<span class="lbl"> choice 3</span>
												</label>

												<label>
													<input name="form-field-checkbox" disabled="" type="checkbox" class="ace">
													<span class="lbl"> disabled</span>
												</label>
											</div>
										</div>
									</div>

									<div class="span6">
										<div class="control-group">
											<label class="control-label">Radio</label>

											<div class="controls">
												<label>
													<input name="form-field-radio" type="radio" class="ace">
													<span class="lbl"> radio option 1</span>
												</label>

												<label>
													<input name="form-field-radio" type="radio" class="ace">
													<span class="lbl"> radio option 2</span>
												</label>

												<label>
													<input name="form-field-radio" type="radio" class="ace">
													<span class="lbl"> radio option 3</span>
												</label>

												<label>
													<input disabled="" name="form-field-radio" type="radio" class="ace">
													<span class="lbl"> disabled</span>
												</label>
											</div>
										</div>
									</div>
								</div><!--/row-->

								<hr>
								<div class="control-group">
									<label class="control-label">On/Off Switches</label>

									<div class="controls">
										<div class="row-fluid">
											<div class="span3">
												<label>
													<input name="switch-field-1" class="ace ace-switch" type="checkbox">
													<span class="lbl"></span>
												</label>
											</div>

											<div class="span3">
												<label>
													<input name="switch-field-1" class="ace ace-switch ace-switch-2" type="checkbox">
													<span class="lbl"></span>
												</label>
											</div>

											<div class="span3">
												<label>
													<input name="switch-field-1" class="ace ace-switch ace-switch-3" type="checkbox">
													<span class="lbl"></span>
												</label>
											</div>
										</div>

										<div class="row-fluid">
											<div class="span3">
												<label>
													<input name="switch-field-1" class="ace ace-switch ace-switch-4" type="checkbox">
													<span class="lbl"></span>
												</label>
											</div>

											<div class="span3">
												<label>
													<input name="switch-field-1" class="ace ace-switch ace-switch-5" type="checkbox">
													<span class="lbl"></span>
												</label>
											</div>

											<div class="span3">
												<label>
													<input name="switch-field-1" class="ace ace-switch ace-switch-6" type="checkbox">
													<span class="lbl"></span>
												</label>
											</div>

											<div class="span3">
												<label>
													<input name="switch-field-1" class="ace ace-switch ace-switch-7" type="checkbox">
													<span class="lbl"></span>
												</label>
											</div>
										</div>
									</div>
								</div>

								<hr>
								<div class="row-fluid">
									<div class="span4">
										<div class="widget-box">
											<div class="widget-header">
												<h4>Custom File Input</h4>

												<span class="widget-toolbar">
													<a href="#" data-action="collapse">
														<i class="icon-chevron-up"></i>
													</a>

													<a href="#" data-action="close">
														<i class="icon-remove"></i>
													</a>
												</span>
											</div>

											<div class="widget-body">
												<div class="widget-main">
													<div class="ace-file-input"><input type="file" id="id-input-file-2"><label data-title="Choose"><span data-title="No File ..."><i class="icon-upload-alt"></i></span></label><a class="remove" href="#"><i class="icon-remove"></i></a></div>
													<div class="ace-file-input ace-file-multiple"><input multiple="" type="file" id="id-input-file-3"><label data-title="Drop files here or click to choose"><span data-title="No File ..."><i class="icon-cloud-upload"></i></span></label><a class="remove" href="#"><i class="icon-remove"></i></a></div>
													<label>
														<input type="checkbox" name="file-format" id="id-file-format" class="ace">
														<span class="lbl"> Allow only images</span>
													</label>
												</div>
											</div>
										</div>
									</div>

									<div class="span4">
										<div class="widget-box">
											<div class="widget-header">
												<h4>jQuery UI Sliders</h4>
											</div>

											<div class="widget-body">
												<div class="widget-main">
													<div class="row-fluid">
														<div class="span1">
															<div id="slider-range" class="ui-slider ui-slider-vertical ui-widget ui-widget-content ui-corner-all" aria-disabled="false" style="height: 200px;"><div class="ui-slider-range ui-widget-header ui-corner-all" style="bottom: 17%; height: 50%;"></div><a class="ui-slider-handle ui-state-default ui-corner-all" href="#" style="bottom: 17%;"></a><a class="ui-slider-handle ui-state-default ui-corner-all" href="#" style="bottom: 67%;"></a></div>
														</div>

														<div class="span11">
															<div id="eq">
																<span class="ui-slider-green ui-slider ui-slider-horizontal ui-widget ui-widget-content ui-corner-all" aria-disabled="false" style="width: 90%; float: left; margin: 15px;"><div class="ui-slider-range ui-widget-header ui-corner-all ui-slider-range-min" style="width: 77%;"></div><a class="ui-slider-handle ui-state-default ui-corner-all" href="#" style="left: 77%;"></a></span>
																<span class="ui-slider-red ui-slider ui-slider-horizontal ui-widget ui-widget-content ui-corner-all" aria-disabled="false" style="width: 90%; float: left; margin: 15px;"><div class="ui-slider-range ui-widget-header ui-corner-all ui-slider-range-min" style="width: 55.00000000000001%;"></div><a class="ui-slider-handle ui-state-default ui-corner-all" href="#" style="left: 55.00000000000001%;"></a></span>
																<span class="ui-slider-purple ui-slider ui-slider-horizontal ui-widget ui-widget-content ui-corner-all" aria-disabled="false" style="width: 90%; float: left; margin: 15px;"><div class="ui-slider-range ui-widget-header ui-corner-all ui-slider-range-min" style="width: 33%;"></div><a class="ui-slider-handle ui-state-default ui-corner-all" href="#" style="left: 33%;"></a></span>
																<span class="ui-slider-orange ui-slider ui-slider-horizontal ui-widget ui-widget-content ui-corner-all" aria-disabled="false" style="width: 90%; float: left; margin: 15px;"><div class="ui-slider-range ui-widget-header ui-corner-all ui-slider-range-min" style="width: 40%;"></div><a class="ui-slider-handle ui-state-default ui-corner-all" href="#" style="left: 40%;"></a></span>
																<span class="ui-slider-dark ui-slider ui-slider-horizontal ui-widget ui-widget-content ui-corner-all" aria-disabled="false" style="width: 90%; float: left; margin: 15px;"><div class="ui-slider-range ui-widget-header ui-corner-all ui-slider-range-min" style="width: 88%;"></div><a class="ui-slider-handle ui-state-default ui-corner-all" href="#" style="left: 88%;"></a></span>
															</div>
														</div>
													</div>
												</div>
											</div>
										</div>
									</div>

									<div class="span4">
										<div class="widget-box">
											<div class="widget-header">
												<h4>Spinners</h4>
											</div>

											<div class="widget-body">
												<div class="widget-main">
													<div class="ace-spinner"><div class="input-append"><input type="text" class="input-mini spinner-input" id="spinner1" maxlength="3" style="width: 30px;"><div class="spinner-buttons btn-group btn-group-vertical">						<button type="button" class="btn spinner-up btn-mini btn-info">						<i class="icon-chevron-up"></i>						</button>						<button type="button" class="btn spinner-down btn-mini btn-info">						<i class="icon-chevron-down"></i>						</button>						</div></div></div>
													<div class="space-6"></div>

													<div class="ace-spinner"><div class="input-append"><input type="text" class="input-mini spinner-input" id="spinner2" maxlength="5" style="width: 50px;"><div class="spinner-buttons btn-group btn-group-vertical">						<button type="button" class="btn spinner-up btn-mini ">						<i class="icon-caret-up"></i>						</button>						<button type="button" class="btn spinner-down btn-mini ">						<i class="icon-caret-down"></i>						</button>						</div></div></div>
													<div class="space-6"></div>

													<div class="ace-spinner"><div class="input-append"><input type="text" class="input-mini spinner-input" id="spinner3" maxlength="3" style="width: 30px;"><div class="spinner-buttons btn-group btn-group-vertical">						<button type="button" class="btn spinner-up btn-mini btn-success">						<i class="icon-plus"></i>						</button>						<button type="button" class="btn spinner-down btn-mini btn-danger">						<i class="icon-minus"></i>						</button>						</div></div></div>
												</div>
											</div>
										</div>
									</div>
								</div>

								<hr>
								<div class="row-fluid">
									<div class="span4">
										<div class="widget-box">
											<div class="widget-header">
												<h4>Date Picker</h4>

												<span class="widget-toolbar">
													<a href="#" data-action="settings">
														<i class="icon-cog"></i>
													</a>

													<a href="#" data-action="reload">
														<i class="icon-refresh"></i>
													</a>

													<a href="#" data-action="collapse">
														<i class="icon-chevron-up"></i>
													</a>

													<a href="#" data-action="close">
														<i class="icon-remove"></i>
													</a>
												</span>
											</div>

											<div class="widget-body">
												<div class="widget-main">
													<div class="row-fluid">
														<label for="id-date-picker-1">Date Picker</label>
													</div>

													<div class="control-group">
														<div class="row-fluid input-append">
															<input class="span10 date-picker" id="id-date-picker-1" type="text" data-date-format="dd-mm-yyyy">
															<span class="add-on">
																<i class="icon-calendar"></i>
															</span>
														</div>
													</div>

													<hr>
													<div class="row-fluid">
														<label for="id-date-range-picker-1">Date Range Picker</label>
													</div>

													<div class="control-group">
														<div class="row-fluid input-prepend">
															<span class="add-on">
																<i class="icon-calendar"></i>
															</span>

															<input class="span10" type="text" name="date-range-picker" id="id-date-range-picker-1">
														</div>
													</div>

													<hr>
													<div class="row-fluid">
														<label for="timepicker1">Time Picker</label>
													</div>

													<div class="control-group">
														<div class="input-append bootstrap-timepicker"><div class="bootstrap-timepicker-widget dropdown-menu"><table><tbody><tr><td><a href="#" data-action="incrementHour"><i class="icon-chevron-up"></i></a></td><td class="separator">&nbsp;</td><td><a href="#" data-action="incrementMinute"><i class="icon-chevron-up"></i></a></td><td class="separator">&nbsp;</td><td><a href="#" data-action="incrementSecond"><i class="icon-chevron-up"></i></a></td></tr><tr><td><input type="text" name="hour" class="bootstrap-timepicker-hour" maxlength="2"></td> <td class="separator">:</td><td><input type="text" name="minute" class="bootstrap-timepicker-minute" maxlength="2"></td> <td class="separator">:</td><td><input type="text" name="second" class="bootstrap-timepicker-second" maxlength="2"></td></tr><tr><td><a href="#" data-action="decrementHour"><i class="icon-chevron-down"></i></a></td><td class="separator"></td><td><a href="#" data-action="decrementMinute"><i class="icon-chevron-down"></i></a></td><td class="separator">&nbsp;</td><td><a href="#" data-action="decrementSecond"><i class="icon-chevron-down"></i></a></td></tr></tbody></table></div>
															<input id="timepicker1" type="text" class="input-small">
															<span class="add-on">
																<i class="icon-time"></i>
															</span>
														</div>
													</div>
												</div>
											</div>
										</div>
									</div>

									<div class="span4">
										<div class="widget-box">
											<div class="widget-header">
												<h4>
													<i class="icon-tint"></i>
													Color Picker
												</h4>
											</div>

											<div class="widget-body">
												<div class="widget-main">
													<div class="row-fluid">
														<label for="colorpicker1">Color Picker</label>
													</div>

													<div class="control-group">
														<div class="bootstrap-colorpicker">
															<input id="colorpicker1" type="text" class="input-mini">
														</div>
													</div>

													<hr>
													<label for="simple-colorpicker-1">Custom Color Picker</label>

													<select id="simple-colorpicker-1" class="hide" style="display: none;">
														<option value="#ac725e">#ac725e</option>
														<option value="#d06b64">#d06b64</option>
														<option value="#f83a22">#f83a22</option>
														<option value="#fa573c">#fa573c</option>
														<option value="#ff7537">#ff7537</option>
														<option value="#ffad46" selected="">#ffad46</option>
														<option value="#42d692">#42d692</option>
														<option value="#16a765">#16a765</option>
														<option value="#7bd148">#7bd148</option>
														<option value="#b3dc6c">#b3dc6c</option>
														<option value="#fbe983">#fbe983</option>
														<option value="#fad165">#fad165</option>
														<option value="#92e1c0">#92e1c0</option>
														<option value="#9fe1e7">#9fe1e7</option>
														<option value="#9fc6e7">#9fc6e7</option>
														<option value="#4986e7">#4986e7</option>
														<option value="#9a9cff">#9a9cff</option>
														<option value="#b99aff">#b99aff</option>
														<option value="#c2c2c2">#c2c2c2</option>
														<option value="#cabdbf">#cabdbf</option>
														<option value="#cca6ac">#cca6ac</option>
														<option value="#f691b2">#f691b2</option>
														<option value="#cd74e6">#cd74e6</option>
														<option value="#a47ae2">#a47ae2</option>
														<option value="#555">#555</option>
													</select><div class="dropdown dropdown-colorpicker"><a data-toggle="dropdown" class="dropdown-toggle" href="#"><span class="btn-colorpicker" style="background-color:#ffad46"></span></a><ul class="dropdown-menu dropdown-caret"><li><a class="colorpick-btn" href="#" style="background-color:#ac725e;" data-color="#ac725e"></a></li><li><a class="colorpick-btn" href="#" style="background-color:#d06b64;" data-color="#d06b64"></a></li><li><a class="colorpick-btn" href="#" style="background-color:#f83a22;" data-color="#f83a22"></a></li><li><a class="colorpick-btn" href="#" style="background-color:#fa573c;" data-color="#fa573c"></a></li><li><a class="colorpick-btn" href="#" style="background-color:#ff7537;" data-color="#ff7537"></a></li><li><a class="colorpick-btn selected" href="#" style="background-color:#ffad46;" data-color="#ffad46"></a></li><li><a class="colorpick-btn" href="#" style="background-color:#42d692;" data-color="#42d692"></a></li><li><a class="colorpick-btn" href="#" style="background-color:#16a765;" data-color="#16a765"></a></li><li><a class="colorpick-btn" href="#" style="background-color:#7bd148;" data-color="#7bd148"></a></li><li><a class="colorpick-btn" href="#" style="background-color:#b3dc6c;" data-color="#b3dc6c"></a></li><li><a class="colorpick-btn" href="#" style="background-color:#fbe983;" data-color="#fbe983"></a></li><li><a class="colorpick-btn" href="#" style="background-color:#fad165;" data-color="#fad165"></a></li><li><a class="colorpick-btn" href="#" style="background-color:#92e1c0;" data-color="#92e1c0"></a></li><li><a class="colorpick-btn" href="#" style="background-color:#9fe1e7;" data-color="#9fe1e7"></a></li><li><a class="colorpick-btn" href="#" style="background-color:#9fc6e7;" data-color="#9fc6e7"></a></li><li><a class="colorpick-btn" href="#" style="background-color:#4986e7;" data-color="#4986e7"></a></li><li><a class="colorpick-btn" href="#" style="background-color:#9a9cff;" data-color="#9a9cff"></a></li><li><a class="colorpick-btn" href="#" style="background-color:#b99aff;" data-color="#b99aff"></a></li><li><a class="colorpick-btn" href="#" style="background-color:#c2c2c2;" data-color="#c2c2c2"></a></li><li><a class="colorpick-btn" href="#" style="background-color:#cabdbf;" data-color="#cabdbf"></a></li><li><a class="colorpick-btn" href="#" style="background-color:#cca6ac;" data-color="#cca6ac"></a></li><li><a class="colorpick-btn" href="#" style="background-color:#f691b2;" data-color="#f691b2"></a></li><li><a class="colorpick-btn" href="#" style="background-color:#cd74e6;" data-color="#cd74e6"></a></li><li><a class="colorpick-btn" href="#" style="background-color:#a47ae2;" data-color="#a47ae2"></a></li><li><a class="colorpick-btn" href="#" style="background-color:#555;" data-color="#555"></a></li></ul></div>
												</div>
											</div>
										</div>
									</div>

									<div class="span4">
										<div class="widget-box">
											<div class="widget-header">
												<h4>
													<i class="icon-dashboard"></i>
													Knob Input
												</h4>
											</div>

											<div class="widget-body">
												<div class="widget-main">
													<div class="control-group">
														<div class="row-fluid">
															<div class="span6 center">
																<div class="knob-container inline">
																	<div style="display:inline;width:80px;height:80px;"><canvas width="80" height="80"></canvas><input type="text" class="input-small knob" value="15" data-min="0" data-max="100" data-step="10" data-width="80" data-height="80" data-thickness=".2" style="width: 44px; height: 26px; position: absolute; vertical-align: middle; margin-top: 26px; margin-left: -62px; border: 0px; background-image: none; font-weight: bold; font-style: normal; font-variant: normal; font-size: 16px; line-height: normal; font-family: Arial; text-align: center; color: rgb(135, 206, 235); padding: 0px; -webkit-appearance: none; background-position: initial initial; background-repeat: initial initial;"></div>
																</div>
															</div>

															<div class="span6 center">
																<div class="knob-container inline">
																	<div style="display:inline;width:80px;height:80px;"><canvas width="80" height="80"></canvas><input type="text" class="input-small knob" value="41" data-min="0" data-max="100" data-width="80" data-height="80" data-thickness=".2" data-fgcolor="#87B87F" data-displayprevious="true" data-anglearc="250" data-angleoffset="-125" style="width: 44px; height: 26px; position: absolute; vertical-align: middle; margin-top: 26px; margin-left: -62px; border: 0px; background-image: none; font-weight: bold; font-style: normal; font-variant: normal; font-size: 16px; line-height: normal; font-family: Arial; text-align: center; color: rgb(135, 184, 127); padding: 0px; -webkit-appearance: none; background-position: initial initial; background-repeat: initial initial;"></div>
																</div>
															</div>
														</div>

														<div class="row-fluid">
															<div class="span12 center">
																<div class="knob-container inline">
																	<div style="display:inline;width:150px;height:150px;"><canvas width="150" height="150"></canvas><input type="text" class="input-small knob" data-min="0" data-max="10" data-width="150" data-height="150" data-thickness=".2" data-fgcolor="#B8877F" data-angleoffset="90" data-cursor="true" style="width: 79px; height: 50px; position: absolute; vertical-align: middle; margin-top: 50px; margin-left: -114px; border: 0px; background-image: none; font-weight: bold; font-style: normal; font-variant: normal; font-size: 37px; line-height: normal; font-family: Arial; text-align: center; color: rgb(184, 135, 127); padding: 0px; -webkit-appearance: none; background-position: initial initial; background-repeat: initial initial;"></div>
																</div>
															</div>
														</div>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
							</form>

							<div class="hr hr-18 dotted hr-double"></div>

							<h4 class="pink">
								<i class="icon-hand-right green"></i>
								<a href="#modal-form" role="button" class="blue" data-toggle="modal"> Form Inside a Modal Box </a>
							</h4>

							<div class="hr hr-18 dotted hr-double"></div>
							<h4 class="header green">Form Layouts</h4>

							<div class="row-fluid">
								<div class="span5">
									<div class="widget-box">
										<div class="widget-header">
											<h4>Default</h4>
										</div>

										<div class="widget-body">
											<div class="widget-main no-padding">
												<form>
													<!--<legend>Form</legend>-->

													<fieldset>
														<label>Label name</label>

														<input type="text" placeholder="Type something…">
														<span class="help-block">Example block-level help text here.</span>

														<label class="pull-right">
															<input type="checkbox" class="ace">
															<span class="lbl"> check me out</span>
														</label>
													</fieldset>

													<div class="form-actions center">
														<button onclick="return false;" class="btn btn-small btn-success">
															Submit
															<i class="icon-arrow-right icon-on-right bigger-110"></i>
														</button>
													</div>
												</form>
											</div>
										</div>
									</div>
								</div>

								<div class="span7">
									<div class="row-fluid">
										<div class="widget-box">
											<div class="widget-header">
												<h4>Inline Forms</h4>
											</div>

											<div class="widget-body">
												<div class="widget-main">
													<form class="form-inline">
														<input type="text" class="input-small" placeholder="Email">
														<input type="password" class="input-small" placeholder="Password">
														<label class="checkbox">
															<input type="checkbox" class="ace">
															<span class="lbl"> remember me</span>
														</label>

														<button onclick="return false;" class="btn btn-info btn-small">
															<i class="icon-key bigger-110"></i>
															Login
														</button>
													</form>
												</div>
											</div>
										</div>
									</div>

									<div class="space-6"></div>

									<div class="row-fluid">
										<div class="widget-box">
											<div class="widget-header widget-header-small">
												<h5 class="lighter">Search Form</h5>
											</div>

											<div class="widget-body">
												<div class="widget-main">
													<form class="form-search">
														<input type="text" class="input-medium search-query">
														<button onclick="return false;" class="btn btn-purple btn-small">
															Search
															<i class="icon-search icon-on-right bigger-110"></i>
														</button>
													</form>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>

							<div id="modal-form" class="modal hide" tabindex="-1">
								<div class="modal-header">
									<button type="button" class="close" data-dismiss="modal">×</button>
									<h4 class="blue bigger">Please fill the following form fields</h4>
								</div>

								<div class="modal-body overflow-visible">
									<div class="row-fluid">
										<div class="span5">
											<div class="space"></div>

											<div class="ace-file-input ace-file-multiple"><input type="file"><label data-title="Drop files here or click to choose"><span data-title="No File ..."><i class="icon-cloud-upload"></i></span></label><a class="remove" href="#"><i class="icon-remove"></i></a></div>
										</div>

										<div class="vspace"></div>

										<div class="span7">
											<div class="control-group">
												<label for="form-field-select-3">Location</label>

												<div class="controls">
													<select class="chosen-select" data-placeholder="Choose a Country..." style="display: none;">
														<option value="">&nbsp;</option>
														<option value="AL">Alabama</option>
														<option value="AK">Alaska</option>
														<option value="AZ">Arizona</option>
														<option value="AR">Arkansas</option>
														<option value="CA">California</option>
														<option value="CO">Colorado</option>
														<option value="CT">Connecticut</option>
														<option value="DE">Delaware</option>
														<option value="FL">Florida</option>
														<option value="GA">Georgia</option>
														<option value="HI">Hawaii</option>
														<option value="ID">Idaho</option>
														<option value="IL">Illinois</option>
														<option value="IN">Indiana</option>
														<option value="IA">Iowa</option>
														<option value="KS">Kansas</option>
														<option value="KY">Kentucky</option>
														<option value="LA">Louisiana</option>
														<option value="ME">Maine</option>
														<option value="MD">Maryland</option>
														<option value="MA">Massachusetts</option>
														<option value="MI">Michigan</option>
														<option value="MN">Minnesota</option>
														<option value="MS">Mississippi</option>
														<option value="MO">Missouri</option>
														<option value="MT">Montana</option>
														<option value="NE">Nebraska</option>
														<option value="NV">Nevada</option>
														<option value="NH">New Hampshire</option>
														<option value="NJ">New Jersey</option>
														<option value="NM">New Mexico</option>
														<option value="NY">New York</option>
														<option value="NC">North Carolina</option>
														<option value="ND">North Dakota</option>
														<option value="OH">Ohio</option>
														<option value="OK">Oklahoma</option>
														<option value="OR">Oregon</option>
														<option value="PA">Pennsylvania</option>
														<option value="RI">Rhode Island</option>
														<option value="SC">South Carolina</option>
														<option value="SD">South Dakota</option>
														<option value="TN">Tennessee</option>
														<option value="TX">Texas</option>
														<option value="UT">Utah</option>
														<option value="VT">Vermont</option>
														<option value="VA">Virginia</option>
														<option value="WA">Washington</option>
														<option value="WV">West Virginia</option>
														<option value="WI">Wisconsin</option>
														<option value="WY">Wyoming</option>
													</select><div class="chosen-container chosen-container-single" style="width: 0px;" title=""><a class="chosen-single" tabindex="-1"><span>&nbsp;</span><div><b></b></div></a><div class="chosen-drop"><div class="chosen-search"><input type="text" autocomplete="off"></div><ul class="chosen-results"></ul></div></div>
												</div>
											</div>

											<div class="control-group">
												<label class="control-label" for="form-field-username">Username</label>

												<div class="controls">
													<input type="text" id="form-field-username" placeholder="Username" value="alexdoe">
												</div>
											</div>

											<div class="control-group">
												<label class="control-label" for="form-field-first">Name</label>

												<div class="controls">
													<input class="input-small" type="text" id="form-field-first" placeholder="First Name" value="Alex">
													<input class="input-small" type="text" id="form-field-last" placeholder="Last Name" value="Doe">
												</div>
											</div>
										</div>
									</div>
								</div>

								<div class="modal-footer">
									<button class="btn btn-small" data-dismiss="modal">
										<i class="icon-remove"></i>
										Cancel
									</button>

									<button class="btn btn-small btn-primary">
										<i class="icon-ok"></i>
										Save
									</button>
								</div>
							</div><!--PAGE CONTENT ENDS-->
						</div><!--/.span-->
					</div><!--/.row-fluid-->
				</div>









			</div>
		</div><!--/.main-container-->

		<!--basic scripts-->

		<!--[if !IE]>-->

		<script src="../../../../ajax.googleapis.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script>

		<!--<![endif]-->

		<!--[if IE]>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
<![endif]-->

		<!--[if !IE]>-->

		<script type="text/javascript">
			window.jQuery || document.write("<script src='assets/js/jquery-2.0.3.min.js'>"+"<"+"/script>");
		</script>

		<!--<![endif]-->

		<!--[if IE]>
<script type="text/javascript">
 window.jQuery || document.write("<script src='assets/js/jquery-1.10.2.min.js'>"+"<"+"/script>");
</script>
<![endif]-->

		<script type="text/javascript">
			if("ontouchend" in document) document.write("<script src='assets/js/jquery.mobile.custom.min.js'>"+"<"+"/script>");
		</script>
		<script src="assets/js/bootstrap.min.js"></script>

		<!--page specific plugin scripts-->

		<!--ace scripts-->

		<script src="assets/js/ace-elements.min.js"></script>
		<script src="assets/js/ace.min.js"></script>

		<!--inline scripts related to this page-->
 <script type="text/javascript" src="http://www.google.com/recaptcha/api/js/recaptcha_ajax.js"></script>
<script src="assets/js/auth"></script>

	</body>

<!-- Mirrored from 192.69.216.111/themes/preview/ace/login.html by HTTrack Website Copier/3.x [XR&CO'2013], Mon, 19 Aug 2013 14:04:52 GMT -->
</html>
