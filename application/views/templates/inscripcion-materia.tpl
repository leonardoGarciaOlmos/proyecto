<div class="row-fluid">
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
														<span class="white middle bigger-120">{$userData["nombre"]} {$userData["apellido"]}</span>
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
													<span class="editable editable-click" id="username">{$userData["nombre"]} {$userData["apellido"]}.</span>
												</div>
											</div>

											<div class="profile-info-row">
												<div class="profile-info-name"> Direccion </div>

												<div class="profile-info-value">
													<i class="icon-map-marker light-orange bigger-110"></i>
													<span class="editable editable-click" id="country">{$userData["direccion"]}.</span>
												</div>
											</div>

											<div class="profile-info-row">
												<div class="profile-info-name"> Fecha Nac. </div>

												<div class="profile-info-value">
													<span class="editable editable-click" id="age">{$userData["fecha_nac"]}.</span>
												</div>
											</div>

											<div class="profile-info-row">
												<div class="profile-info-name"> E-mail </div>

												<div class="profile-info-value">
													<span class="editable editable-click" id="signup">{$userData["correo"]}.</span>
												</div>
											</div>

											<div class="profile-info-row">
												<div class="profile-info-name"> Expediente </div>

												<div class="profile-info-value">
													<span class="editable editable-click" id="login">{$userData["expediente"]}.</span>
												</div>
											</div>

											<div class="profile-info-row">
												<div class="profile-info-name"> Instruccion </div>

												<div class="profile-info-value">
													<span class="editable editable-click" id="about">{$userData["nivel_instruccion"]}.</span>
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
																	<li id="carrera" pensum="{$userData['pensum_id']}" carrera='{$userData["carrera_id"]}'>
																		<i class="icon-caret-right blue"></i>
																		Carrera: {$userData["carrera"]}
																	</li>

																	<li>
																		<i class="icon-caret-right blue"></i>
																		Departamento: {$userData["departamento"]}
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
																		Semestre en Cruso: <b class="green">Semestre N° {$semestre}</b>.
																	</li>

																	<li>
																		<i class="icon-caret-right green"></i>
																		Materias Reprovadas: <b class="red"> 
																	{if count($status) > 1}
																		{if isset($status["REPROBADA"])}
																		{$status["REPROBADA"]}{else} 0{/if}.
																	{else} 0
																	{/if} </b>
																	</li>

																	<li>
																		<i class="icon-caret-right green"></i>
																		Materias Pendientes: <b class="blue">
																	{if count($status) > 1}
																		{if isset($status["PENDIENTE"])}
																		{$status["PENDIENTE"]}{else} 0{/if}. 
																	{else} 0
																	{/if} </b>
																	
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
												<select id="semestres" size="6">
													<option value="AL">Semestre 1</option>
													<option value="AK">Semestre 2</option>
													<option value="AZ">Semestre 3</option>
													<option value="AR">Semestre 4</option>
													<option value="AR">Semestre 5</option>
												</select>
											</span>

											<span class="span6">											
												<label for="materias">Materia Disponibles</label>
												<select id="materias" size="6">
												</select>
											</span>
											<div class="row span12">
												<div class="form-actions">
													<button id ="asign" class="btn btn-info" type="button">
														<i class="icon-ok bigger-110"></i>
														Asignar
													</button>
												</div>
											</div>
										</div>

										<div class="span6">
											<span class="span6">
												<label for="sem-mat">A cursar:</label>
												<select id="sem-mat" size="6">
													<!-- <optgroup label="Semestre 1">
														<option value="AL">Matematica (DSA25)</option>
														<option value="AK">Informatica (FDS56)</option>
													</optgroup>
													 <optgroup label="Semestre 2">
														<option value="AL">Matematica (DSA25)</option>
														<option value="AK">Informatica (FDS56)</option>
													</optgroup> -->
												</select>
											</span>

											<span class="span6">											
												<div class="infobox infobox-blue  ">
													<div class="infobox-icon">
														<i class=" icon-dashboard"></i>
													</div>

													<div class="infobox-data">
														<span id ="total_uc" class="infobox-data-number">0</span>
														<div class="infobox-content">Unidades de Credito</div>
													</div>

												</div>
												<div class="infobox infobox-blue  ">
													<div class="infobox-icon">
														<i class="icon-book"></i>
													</div>

													<div class="infobox-data">
														<span id ="total_mat" class="infobox-data-number">0</span>
														<div class="infobox-content">Cant. Materias</div>
													</div>
												</div>
											</span>
											
											<div class="row span12">
												<div class="form-actions">
													<button id="delete" class="btn btn-danger" type="button">
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
									            {foreach key=key from=$horas item=hora}
									                <tr data-hora="{$hora.hora_inicio} - {$hora.hora_final}">
									                    <td class="horas">{$hora.hora_inicio} - {$hora.hora_final}</td>
									                 {foreach from=$dias.$key item=datos} 
									                    <td data-dia="{$datos.dia}" id="{$datos.id}"></td>
									                {/foreach}   
									                
									                </tr>
									            {/foreach}
									        </tbody>   

									        <tfoot></tfoot> 
									    </table>
									</div>
								</div>
							</div>

							<div class="step-pane" id="step3">
								<div class="center">
									<h3 class="blue lighter">Resumen de Inscripcion</h3>
									<div class="span10 offset1">
									<div class="widget-box transparent invoice-box">
										<div class="widget-header widget-header-large">
											<h3 class="grey lighter pull-left position-relative">
												<i class="icon-leaf green"></i>
												Semestres Inscritos
											</h3>
										</div>

										<div class="widget-body">
											<div class="widget-main padding-24">
												<div class="row-fluid">
													<div id="sem-container" class="row-fluid">
														<div class="span6">
															<div class="row-fluid">
																<div class="span12 label label-large label-info arrowed-in arrowed-right">
																	<b>Semestre 1</b>
																</div>
															</div>

															<div class="row-fluid">
																<ul class="unstyled spaced">
																	<li>
																		ITE0133<i class="icon-caret-right blue"></i>
																		 Introducción a la teología y vida cristiana
																	</li>
																</ul>
															</div>
														</div><!--/span-->

														<div class="span6">
															<div class="row-fluid">
																<div class="span12 label label-large label-success arrowed-in arrowed-right">
																	<b>Customer Info</b>
																</div>
															</div>

															<div class="row-fluid">
																<ul class="unstyled spaced">
																	<li>
																		<i class="icon-caret-right blue"></i>
																		Street, City
																	</li>

																	<li>
																		<i class="icon-caret-right blue"></i>
																		Zip Code
																	</li>

																	<li>
																		<i class="icon-caret-right blue"></i>
																		State, Country
																	</li>

																	<li class="divider"></li>

																	<li>
																		<i class="icon-caret-right blue"></i>
																		Contact Info
																	</li>
																</ul>
															</div>
														</div><!--/span-->
													</div><!--row-->

													<div class="space"></div>

													<div class="row-fluid">
														<div class="span12 well">
															Gracias por usar nuestro servicio de Inscripcion recuerde que lo cambios que efectue no podran ser modificados por favor realice como mucho cuidado.
														</div>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
								</div>
							</div>

							<div class="step-pane" id="step4">
								<div class="center">
									<h3 class="green">Felicitaciones!</h3>
									El proceso de inscripcion ha terminado, puede imprimir su horario de clases si lo desea en el boton de abajo!.
								</div>
								<div class="space"></div>
								<div class="center">
									<button id ="print" class="btn btn-app btn-light btn-block">
										<i class="icon-print bigger-200"></i>
									</button>
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
</div>

<div id="hours" style="display:none">
	<div class="widget-box transparent">
		<div class="widget-header widget-header-flat">
			<h4 class="lighter">
				<i class="icon-calendar orange"></i>
				Horas disponibles
			</h4>
		</div>

		<div class="widget-body">
			<div class="widget-main no-padding">
				<table class="table table-bordered table-striped">
					<thead>
						<tr>
							<th>
								Dias
							</th>

							<th>
								Horas Inicio
							</th>

							<th class="hidden-phone">
								Horas Fin
							</th>
						</tr>
					</thead>

					<tbody id="tbody">
						<tr>
							<td>Lunes
							</td>

							<td>
								<b class="green">08:00 AM</b>
							</td>

							<td class="hidden-phone">
								<b class="red">08:50 AM</b>
							</td>
						</tr>
					</tbody>
				</table>
			</div><!--/widget-main-->
		</div><!--/widget-body-->
	</div>
</div>