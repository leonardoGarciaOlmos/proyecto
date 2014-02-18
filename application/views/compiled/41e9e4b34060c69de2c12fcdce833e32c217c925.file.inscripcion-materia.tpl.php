<?php /* Smarty version Smarty-3.1.14, created on 2014-02-15 02:19:51
         compiled from "application\views\templates\inscripcion-materia.tpl" */ ?>
<?php /*%%SmartyHeaderCode:2231152fecec7a8a4a0-04890353%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '41e9e4b34060c69de2c12fcdce833e32c217c925' => 
    array (
      0 => 'application\\views\\templates\\inscripcion-materia.tpl',
      1 => 1391628379,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2231152fecec7a8a4a0-04890353',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'userData' => 0,
    'horas' => 0,
    'hora' => 0,
    'key' => 0,
    'dias' => 0,
    'datos' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.14',
  'unifunc' => 'content_52fecec7c09206_90423359',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_52fecec7c09206_90423359')) {function content_52fecec7c09206_90423359($_smarty_tpl) {?><div class="row-fluid">
	<div class="span12">
		<div class="widget-box">
			<div class="widget-header widget-header-blue widget-header-flat">
				<h4 class="lighter">Inscripcion de Materias</h4>
			</div>

			<div class="widget-body">
				<div class="widget-main">
					<div class="row-fluid">
						<div id="fuelux-wizard" class="row-fluid hide" data-target="#step-container" style="display: block;">
							<ul class="wizard-steps">
								<li data-target="#step1" class="active" style="min-width: 25%; max-width: 25%;">
									<span class="step">1</span>
									<span class="title">Validacion de Status</span>
								</li>

								<li data-target="#step2" style="min-width: 25%; max-width: 25%;">
									<span class="step">2</span>
									<span class="title">Inscripcion en Semestres</span>
								</li>

								<li data-target="#step3" style="min-width: 25%; max-width: 25%;">
									<span class="step">3</span>
									<span class="title">Resumen de Inscripcion</span>
								</li>

								<li data-target="#step4" style="min-width: 25%; max-width: 25%;">
									<span class="step">4</span>
									<span class="title">Finalizacion</span>
								</li>
							</ul>
						</div>

						<hr>
						<div class="step-content row-fluid position-relative" id="step-container">
							<div class="step-pane active" id="step1">

								<div>
								<div id="user-profile-1" class="user-profile row-fluid">
									<div class="span3 center">
										<div>
											<span class="profile-picture">
												<img id="avatar" class="editable editable-click editable-empty" alt="Alex's Avatar" src="assets/avatars/profile-pic.jpg"></img>
											</span>

											<div class="space-4"></div>

											<div class="width-80 label label-info label-large arrowed-in arrowed-in-right">
												<div class="inline position-relative">
													<a href="#" class="user-title-label dropdown-toggle" data-toggle="dropdown">
														<!-- <i class="icon-circle light-green middle"></i> -->
														&nbsp;
														<span class="white middle bigger-120"><?php echo $_smarty_tpl->tpl_vars['userData']->value["nombre"];?>
 <?php echo $_smarty_tpl->tpl_vars['userData']->value["apellido"];?>
</span>
													</a>

												</div>
											</div>
										</div>

										<div class="space-6"></div>

										<div class="hr hr12 dotted"></div>

										<div class="hr hr16 dotted"></div>
									</div>

									<div class="span9">
								
										<div class="space-12"></div>

										<div class="profile-user-info profile-user-info-striped">
											<div class="profile-info-row">
												<div class="profile-info-name"> Nombre: </div>

												<div class="profile-info-value">
													<span class="editable editable-click" id="username"><?php echo $_smarty_tpl->tpl_vars['userData']->value["nombre"];?>
 <?php echo $_smarty_tpl->tpl_vars['userData']->value["apellido"];?>
.</span>
												</div>
											</div>

											<div class="profile-info-row">
												<div class="profile-info-name"> Direccion </div>

												<div class="profile-info-value">
													<i class="icon-map-marker light-orange bigger-110"></i>
													<span class="editable editable-click" id="country"><?php echo $_smarty_tpl->tpl_vars['userData']->value["direccion"];?>
.</span>
												</div>
											</div>

											<div class="profile-info-row">
												<div class="profile-info-name"> Fecha Nac. </div>

												<div class="profile-info-value">
													<span class="editable editable-click" id="age"><?php echo $_smarty_tpl->tpl_vars['userData']->value["fecha_nac"];?>
.</span>
												</div>
											</div>

											<div class="profile-info-row">
												<div class="profile-info-name"> E-mail </div>

												<div class="profile-info-value">
													<span class="editable editable-click" id="signup"><?php echo $_smarty_tpl->tpl_vars['userData']->value["correo"];?>
.</span>
												</div>
											</div>

											<div class="profile-info-row">
												<div class="profile-info-name"> Expediente </div>

												<div class="profile-info-value">
													<span class="editable editable-click" id="login"><?php echo $_smarty_tpl->tpl_vars['userData']->value["expediente"];?>
.</span>
												</div>
											</div>

											<div class="profile-info-row">
												<div class="profile-info-name"> Instruccion </div>

												<div class="profile-info-value">
													<span class="editable editable-click" id="about"><?php echo $_smarty_tpl->tpl_vars['userData']->value["nivel_instruccion"];?>
.</span>
												</div>
											</div>
										</div>

										<div class="space-20"></div>

										<div class="hr hr2 hr-double"></div>

										<div class="space-6"></div>

									</div>

								</div>
								<div class="widget-box transparent invoice-box">
										<div class="widget-header widget-header-large">
											<h3 class="grey lighter pull-left position-relative">
												<i class="icon-book green"></i>
												Informacion Academica
											</h3>

											<div class="widget-toolbar hidden-480">
												<a href="#">
													<i class="icon-print"></i>
												</a>
											</div>
										</div>

										<div class="widget-body">
											<div class="widget-main padding-24">
												<div class="row-fluid">
													<div class="row-fluid">
														<div class="span6">
															<div class="row-fluid">
																<div class="span12 label label-large label-info arrowed-in arrowed-right">
																	<b>Informacion Intitucional</b>
																</div>
															</div>

															<div class="row-fluid">
																<ul class="unstyled spaced">
																	<li>
																		<i class="icon-caret-right blue"></i>
																		Carrera: <?php echo $_smarty_tpl->tpl_vars['userData']->value["carrera"];?>

																	</li>

																	<li>
																		<i class="icon-caret-right blue"></i>
																		Departamento: <?php echo $_smarty_tpl->tpl_vars['userData']->value["departamento"];?>

																	</li>

																	<li>
																		<i class="icon-caret-right blue"></i>
																		Periodo: 2014 - 2015.
																	</li>

																	<li class="divider"></li>

																</ul>
															</div>
														</div><!--/span-->

														<div class="span6">
															<div class="row-fluid">
																<div class="span12 label label-large label-success arrowed-in arrowed-right">
																	<b>Informacion Semestral</b>
																</div>
															</div>

															<div class="row-fluid">
																<ul class="unstyled spaced">
																	<li>
																		<i class="icon-caret-right green"></i>
																		Semestre en Cruso: <b class="green">3er Semestre</b>.
																	</li>

																	<li>
																		<i class="icon-caret-right green"></i>
																		Materias Reprovadas: <b class="red">3</b>.
																	</li>

																	<li>
																		<i class="icon-caret-right green"></i>
																		Materias Pendientes: <b class="blue">2</b>
																	</li>
																</ul>
															</div>
														</div><!--/span-->
													</div><!--row-->

													<div class="space"></div>

													

													<div class="hr hr8 hr-double hr-dotted"></div>

													<div class="space-6"></div>

													<div class="widget-box transparent" style="opacity: 1; z-index: 0;">
														<div class="widget-header">
															<h4 class="lighter">Instrucciones</h4>

															<div class="widget-toolbar no-border">
																<a href="#" data-action="collapse">
																	<i class="icon-chevron-up"></i>
																</a>
															</div>
														</div>

														<div class="widget-body"><div class="widget-body-inner" style="display: block;">
															<div class="widget-main padding-6 no-padding-left no-padding-right">
																<ul class="unstyled spaced">
															<li>
																<i class="icon-check purple"></i>
																Verifique que toda su informacion es correcta, de lo contrario dirijase a su perfil para modificar su informacion.
															</li>

															<li>
																<i class="icon-star blue"></i>
																Tenga en cuenta que debe planificar el uso de las unidades de creditos en las materias disponibles para su inscripcion, ya que solo podra inscribir 23 unidades de creditos por semestres.
															</li>

															<li>
																<i class="icon-remove red"></i>
																No debe refrescar la pagina, esta accion borrara toda la informacion que haya cargado sobre su inscripción y debera realizar todos los pasos nuevamente. 
															</li>

															<li>
																<i class="icon-ok green"></i>
																Hechale un vistado al resumen de inscripcion antes de continuar para evitar modificaciones.
															</li>
														</ul>
															</div>
														</div></div>
													</div>

													<div class="row-fluid">
														<div class="span12 well">
															La informacion sumistrada en esta panalla es referencial en caso de existir alguna incongruencia contacte a su Administrador. <a>Admin@iuspo.com</a>
														</div>
													</div>

												</div>
											</div>
										</div>
									</div>
							</div>

							</div>

							<div class="step-pane" id="step2">
								<div class="row-fluid span12">
									<div class="page-header position-relative">
										<h1>
											Materias
											<small>
												<i class="icon-double-angle-right"></i>
												seleccion de materias.
											</small>
										</h1>
									</div>

									<div class="span12">
										
										<div class="span6">
											<span class="span6">
												<label for="semestres">Semestres</label>
												<select id="semestres" multiple="multiple">
													<option value="AL">Semestre 1</option>
													<option value="AK">Semestre 2</option>
													<option value="AZ">Semestre 3</option>
													<option value="AR">Semestre 4</option>
													<option value="AR">Semestre 5</option>
												</select>
											</span>

											<span class="span6">											
												<label for="materias">Materia Disponibles</label>
												<select id="materias" multiple="multiple">
													<option value="AL">Matematica (DSA25)</option>
													<option value="AK">Informatica (FDS56)</option>

												</select>
											</span>
											<div class="row span12">
												<div class="space-20"></div>
												<div class="form-actions">
													<button class="btn btn-info" type="button">
														<i class="icon-ok bigger-110"></i>
														Asignar
													</button>
												</div>
											</div>
										</div>

										<div class="span6">
											<span class="span6">
												<label for="form-field-select-2">A cursar:</label>
												<select id="form-field-select-2" multiple="multiple">
													<optgroup label="Semestre 1">
														<option value="AL">Matematica (DSA25)</option>
														<option value="AK">Informatica (FDS56)</option>
													</optgroup>
													 <optgroup label="Semestre 2">
														<option value="AL">Matematica (DSA25)</option>
														<option value="AK">Informatica (FDS56)</option>
													</optgroup>
												</select>
											</span>

											<span class="span6">											
												<div class="infobox infobox-blue  ">
													<div class="infobox-icon">
														<i class=" icon-dashboard"></i>
													</div>

													<div class="infobox-data">
														<span class="infobox-data-number">11</span>
														<div class="infobox-content">Unidades de Credito</div>
													</div>

												</div>
												<div class="infobox infobox-blue  ">
													<div class="infobox-icon">
														<i class="icon-book"></i>
													</div>

													<div class="infobox-data">
														<span class="infobox-data-number">7</span>
														<div class="infobox-content">Cant. Materias</div>
													</div>
												</div>
											</span>
											
											<div class="row span12">
												<div class="form-actions">
													<button class="btn btn-danger" type="button">
														<i class="icon-trash bigger-110"></i>
														Eliminar
													</button>
												</div>
											</div>
										</div>
										
									</div>

									<div class="span12" >

										<div class="hr hr2 hr-double"></div>

										<div class="page-header position-relative">
											<h1>
												Horario
												<small>
													<i class="icon-double-angle-right"></i>
													informacion horaria de materia seleccionadas.
												</small>
											</h1>
										</div>
									    <table id="format" border="1" class="table">
									        <thead>    
									            <tr>
									                <th class="day-hour ">Horas</th>
									                <th class="day-hour ">Lunes</th>
									                <th class="day-hour ">Martes</th>
									                <th class="day-hour ">Miércoles</th>
									                <th class="day-hour ">Jueves</th>
									                <th class="day-hour ">Viernes</th>
									            </tr>
									        </thead>
									        <tbody>    
									            <?php  $_smarty_tpl->tpl_vars['hora'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['hora']->_loop = false;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['horas']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['hora']->key => $_smarty_tpl->tpl_vars['hora']->value){
$_smarty_tpl->tpl_vars['hora']->_loop = true;
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['hora']->key;
?>
									                <tr data-hora="<?php echo $_smarty_tpl->tpl_vars['hora']->value['hora_inicio'];?>
 - <?php echo $_smarty_tpl->tpl_vars['hora']->value['hora_final'];?>
">
									                    <td class="horas"><?php echo $_smarty_tpl->tpl_vars['hora']->value['hora_inicio'];?>
 - <?php echo $_smarty_tpl->tpl_vars['hora']->value['hora_final'];?>
</td>
									                 <?php  $_smarty_tpl->tpl_vars['datos'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['datos']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['dias']->value[$_smarty_tpl->tpl_vars['key']->value]; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['datos']->key => $_smarty_tpl->tpl_vars['datos']->value){
$_smarty_tpl->tpl_vars['datos']->_loop = true;
?> 
									                    <td data-dia="<?php echo $_smarty_tpl->tpl_vars['datos']->value['dia'];?>
" id="<?php echo $_smarty_tpl->tpl_vars['datos']->value['id'];?>
"></td>
									                <?php } ?>   
									                
									                </tr>
									            <?php } ?>
									        </tbody>   

									        <tfoot></tfoot> 
									    </table>
									</div>
								</div>
							</div>

							<div class="step-pane" id="step3">
								<div class="center">
									<h3 class="blue lighter">This is step 3</h3>
								</div>
							</div>

							<div class="step-pane" id="step4">
								<div class="center">
									<h3 class="green">Congrats!</h3>
									Your product is ready to ship! Click finish to continue!
								</div>
							</div>
						</div>

						<hr>
						<div class="row-fluid wizard-actions">
							<button class="btn btn-prev" disabled="disabled">
								<i class="icon-arrow-left"></i>
								Anterior
							</button>

							<button class="btn btn-success btn-next" data-last="Finish ">
								Siguiente
								<i class="icon-arrow-right icon-on-right"></i>
							</button>
						</div>
					</div>
				</div><!--/widget-main-->
			</div><!--/widget-body-->
		</div>
	</div>
</div><?php }} ?>