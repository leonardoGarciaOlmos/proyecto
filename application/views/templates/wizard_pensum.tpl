<html class="fuelux">

	{if $process eq "add"}
		<input type="hidden" id="pensum" value="0">
		<input type="hidden" id="num_semestre" value="0">
		<input type="hidden" id="carrera" value="0">
	{elseif $process eq "update"}
		<input type="hidden" id="pensum" value="{$pensum}">
		<input type="hidden" id="num_semestre" value="{$semestre}">
		<input type="hidden" id="carrera" value="{$career['id']}">
	{/if}




	<div class="widget-box">
		<div class="widget-header widget-header-blue widget-header-flat">
			<h4 class="lighter">{$title}</h4>
		</div>

		<div class="widget-body">
			<div class="widget-main">
				<div id="MyWizard" class="row-fluid">
					<div id="fuelux-wizard" class="row-fluid hide" data-target="#step-container" style="display: block;">
						<ul class="steps wizard-steps">
							<li data-target="#step1" class="active">
								<span class="step">1</span>
								<span class="title">Seleccionar Carrea</span>
							</li>

							<li data-target="#step2" class="">
								<span class="step">2</span>
								<span class="title">Añadir Materia</span>
							</li>

							<li data-target="#step3" class="">
								<span class="step">3</span>
								<span class="title">Verificar Pensum</span>
							</li>

							<li data-target="#step4" class="">
								<span class="step">4</span>
								<span class="title">Finalizar</span>
							</li>
						</ul>
					</div>
					<hr>

					<div class="step-content row-fluid position-relative">
						<div class="step-pane active" id="step1">
							<h3 class="lighter block green">Seleccione la carrera de su preferencia</h3>
							<div class="center">
							{if $process eq "add"}
								<h3>Departamento</h3>
								<select id="select_departamento">
									<option value="">Seleccionar departamento</option>
									{foreach from=$depart key=key item=item}
										<option value="{$item['id']}">{$item['nombre']}</option>
									{/foreach}
								</select>

								<h3>Carrera</h3>
								<select disabled="disabled" id="select_carrera">
									<option value="">...</option>
								</select>
							
							{elseif $process eq "update"}
								<h3>Departamento</h3>
								<select id="select_departamento" disabled="disabled">
									<option value="{$depart['id']}">{$depart['nombre']}</option>
								</select>

								<h3>Carrera</h3>
								<select disabled="disabled" id="select_carrera" disabled="disabled">
									<option value="{$career['id']}">{$career['nombre']}</option>
								</select>
							{/if}
							</div>
						</div>


						<div class="step-pane" id="step2">
							<div class="row-fluid">
								<div class="span9">
									<h3 class="lighter block green">Agregar las materias a cada semestre</h3>
								</div>
								<div class="span3">
									<button class="btn btn-primary" name="agregarSemes" id="addSemes">
										<i class="icon-plus icon-white"></i> Agregar Semestre
									</button>
								</div>
							</div>
							{if $process eq "add"}
								<div id="accordion" class="accordion-style1 panel-group">
									<h4>No existe semestre ni materia</h4>
								</div>
							
							{elseif $process eq "update"}
								<div id="accordion" class="accordion-style1 panel-group">
									
									{for $num=1 to $semestre}
										<div class="panel panel-default">
											<div class="panel-heading">
												<h3 class="panel-title">
													<a class="accordion-toggle collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapse{$num}">
														<i class="bigger-110 icon-angle-right" data-icon-hide="icon-angle-down" data-icon-show="icon-angle-right"></i>
														&nbsp;Semestre #{$num}
													</a>
												</h3>
											</div>
										

											<div class="panel-collapse collapse" id="collapse{$num}" style="height: 0px;">
												<div class="panel-body">
													<input type="hidden" value="{$num}", name="semestre" id="semestre">
													<input type="hidden" value="" name="materia_id" id="materia_id">
													<div class="span1"> <h4>Materia</h4> </div>
													<div class="span3"> <input type="text" value="" name="materia" id="materia"> </div>
													<div class="span12">
														<table class="table table-striped table-bordered table-hover" id="tableMateria">
															<tr>
																<th><h5>Codigo</h5></th>
																<th><h5>Uni. Curricular</h5></th>
																<th class="hidden-phone"><h5>H. Teoricas</h5></th>
																<th class="hidden-phone"><h5>H. Practicas</h5></th>
																<th class="hidden-phone"><h5>Total Horas</h5></th>
																<th class="hidden-480"><h5>Uni. Credito</h5></th>
																<th class="hidden-480"><h5>Cod. Prelacion</h5></th>
																<th></th>
															</tr>
															{foreach from=$materia key=key item=item}
																{if $item['semestre'] eq $num}
																	<tr>
																		<th>{$item['codigo']}</th>
																		<th>{$item['nombre']}</th>
																		<th class="hidden-phone">{$item['horas_teoricas']}</th>
																		<th class="hidden-phone">{$item['horas_practicas']}</th>
																		<th class="hidden-phone">{$item['total_horas']}</th>
																		<th class="hidden-480">{$item['uni_credito']}</th>
																		<th class="hidden-480">{$item['cod_prelacion']}</th>
																		<th><button class="btn btn-mini btn-danger" id="eliminarMat" type="button" value="{$item['codigo']}"><i class="icon-remove-sign"></i></th>
																	</tr>
																{/if}
															{/foreach}
														</table>
													</div>
												</div>
											</div>
										</div>
									{/for}

								</div>
							{/if}
						</div>
						

						<div class="step-pane" id="step3">
							<div class="row-fluid">
								<div class="span8">
									<h3 class="lighter block green">Verificar la información del Pensum</h3>
								</div>
							</div>

							<div class="row-fluid">
								<div class="span12" id="view_pensum">
									<h4>No existe semestre ni materia</h4>
								</div>
							</div>

							<div class="row-fluid" style="padding-top: 15px;">
								<div class="span4">
									<label>
										<input name="form-field-checkbox" type="checkbox" class="ace" id="VerificarPensum">
										<span class="lbl"> Acepto que la información es correcta</span>
									</label>
								</div>
							</div>

						</div>

						<div class="step-pane" id="step4">
							<div class="row-fluid">
								<div class="span12 center">
									<h3 class="green">Felicidades!</h3>
									Ha culminado el proceso creación del pensum, precione finalizar!
								</div>
							</div>
						</div>
					</div>
					<hr>


					<div class="row-fluid wizard-actions">
						<button class="btn btn-prev" id="prev">
							<i class="icon-arrow-left"></i>
							Prev
						</button>

						<button class="btn btn-success btn-next" data-last="Finish" id="next">
							Sign
							<i class="icon-arrow-right icon-on-right"></i>
						</button>
					</div>

				</div>
			</div>
		</div>
	</div>




	<!-- <div class="widget-box">
		<div class="widget-header widget-header-blue widget-header-flat">
			<h4 class="lighter">{$title}</h4>
		</div>

		<div class="widget-body">
			<div class="widget-main">

				<div id="MyWizard" class="row-fluid wizard">
					<ul class="steps wizard-steps">
						<li data-target="#step1" class="active">
							<span class="step">1</span>
							<span class="title">Seleccionar Carrea</span>
						</li>

						<li data-target="#step2" class="">
							<span class="step">2</span>
							<span class="title">Añadir Materia</span>
						</li>

						<li data-target="#step3" class="">
							<span class="step">3</span>
							<span class="title">Verificar Pensum</span>
						</li>

						<li data-target="#step4" class="">
							<span class="step">4</span>
							<span class="title">Finalizar</span>
						</li>
					</ul>

				</div>

				<div class="step-content">
					<hr>

					<div class="step-pane active" id="step1">
						<h3 class="lighter block green">Seleccione la carrera de su preferencia</h3>
						<div class="center">
						{if $process eq "add"}
							<h3>Departamento</h3>
							<select id="select_departamento">
								<option value="">Seleccionar departamento</option>
								{foreach from=$depart key=key item=item}
									<option value="{$item['id']}">{$item['nombre']}</option>
								{/foreach}
							</select>

							<h3>Carrera</h3>
							<select disabled="disabled" id="select_carrera">
								<option value="">...</option>
							</select>
						
						{elseif $process eq "update"}
							<h3>Departamento</h3>
							<select id="select_departamento" disabled="disabled">
								<option value="{$depart['id']}">{$depart['nombre']}</option>
							</select>

							<h3>Carrera</h3>
							<select disabled="disabled" id="select_carrera" disabled="disabled">
								<option value="{$career['id']}">{$career['nombre']}</option>
							</select>
						{/if}
						</div>
					</div>


					<div class="step-pane" id="step2">
						<div class="row-fluid">
							<div class="span9">
								<h3 class="lighter block green">Agregar las materias a cada semestre</h3>
							</div>
							<div class="span3">
								<button class="btn btn-primary" name="agregarSemes" id="addSemes">
									<i class="icon-plus icon-white"></i> Agregar Semestre
								</button>
							</div>
						</div>
						{if $process eq "add"}
							<div id="accordion" class="accordion-style1 panel-group">
								<h4>No existe semestre ni materia</h4>
							</div>
						
						{elseif $process eq "update"}
							<div id="accordion" class="accordion-style1 panel-group">
								
								{for $num=1 to $semestre}
									<div class="panel panel-default">
										<div class="panel-heading">
											<h3 class="panel-title">
												<a class="accordion-toggle collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapse{$num}">
													<i class="bigger-110 icon-angle-right" data-icon-hide="icon-angle-down" data-icon-show="icon-angle-right"></i>
													&nbsp;Semestre #{$num}
												</a>
											</h3>
										</div>
									

										<div class="panel-collapse collapse" id="collapse{$num}" style="height: 0px;">
											<div class="panel-body">
												<input type="hidden" value="{$num}", name="semestre" id="semestre">
												<input type="hidden" value="" name="materia_id" id="materia_id">
												<div class="span1"> <h4>Materia</h4> </div>
												<div class="span3"> <input type="text" value="" name="materia" id="materia"> </div>
												<div class="span12">
													<table class="table table-striped table-bordered table-hover" id="tableMateria">
														<tr>
															<th><h5>Codigo</h5></th>
															<th><h5>Uni. Curricular</h5></th>
															<th class="hidden-phone"><h5>H. Teoricas</h5></th>
															<th class="hidden-phone"><h5>H. Practicas</h5></th>
															<th class="hidden-phone"><h5>Total Horas</h5></th>
															<th class="hidden-480"><h5>Uni. Credito</h5></th>
															<th class="hidden-480"><h5>Cod. Prelacion</h5></th>
															<th></th>
														</tr>
														{foreach from=$materia key=key item=item}
															{if $item['semestre'] eq $num}
																<tr>
																	<th>{$item['codigo']}</th>
																	<th>{$item['nombre']}</th>
																	<th class="hidden-phone">{$item['horas_teoricas']}</th>
																	<th class="hidden-phone">{$item['horas_practicas']}</th>
																	<th class="hidden-phone">{$item['total_horas']}</th>
																	<th class="hidden-480">{$item['uni_credito']}</th>
																	<th class="hidden-480">{$item['cod_prelacion']}</th>
																	<th><button class="btn btn-mini btn-danger" id="eliminarMat" type="button" value="{$item['codigo']}"><i class="icon-remove-sign"></i></th>
																</tr>
															{/if}
														{/foreach}
													</table>
												</div>
											</div>
										</div>
									</div>
								{/for}

							</div>
						{/if}
					</div>
					

					<div class="step-pane" id="step3">
						<div class="row-fluid">
							<div class="span8">
								<h3 class="lighter block green">Verificar la información del Pensum</h3>
							</div>
						</div>

						<div class="row-fluid">
							<div class="span12" id="view_pensum">
								<h4>No existe semestre ni materia</h4>
							</div>
						</div>

						<div class="row-fluid" style="padding-top: 15px;">
							<div class="span4">
								<label>
									<input name="form-field-checkbox" type="checkbox" class="ace" id="VerificarPensum">
									<span class="lbl"> Acepto que la información es correcta</span>
								</label>
							</div>
						</div>

					</div>

					<div class="step-pane" id="step4">
						<div class="row-fluid">
							<div class="span12 center">
								<h3 class="green">Felicidades!</h3>
								Ha culminado el proceso creación del pensum, precione finalizar!
							</div>
						</div>
					</div>
				</div>

				<div class="row-fluid wizard-actions">
					<hr>
					<button class="btn btn-prev" id="prev">
						<i class="icon-arrow-left"></i>
						Prev
					</button>

					<button class="btn btn-success btn-next" data-last="Finish" id="next">
						Sign
						<i class="icon-arrow-right icon-on-right"></i>
					</button>
				</div>

			</div>
		</div>
	</div> -->

	
</html>