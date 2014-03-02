<html>

	<div class="widget-box">
		<div class="widget-header widget-header-blue widget-header-flat">
			<h4 class="lighter">Cierre de Semestre</h4>
		</div>

		<div class="widget-body">
			<div class="widget-main">

				<div class="row-fluid">
					<div class="span4">
						<div class="widget-box pricing-box">
							<div class="widget-header header-color-dark">
								<h5 class="bigger lighter">Inf. a Considerar</h5>
							</div>

							<div class="widget-body">
								<div class="widget-main">
									Al momento de cerrar los semestres se realizaran los siguientes procesos que se presenta a continuacion:
									<ul class="unstyled spaced2">
										<li>
											<i class="icon-ok green"></i>
											Calular nota final del estudiante por materia
										</li>

										<li>
											<i class="icon-ok green"></i>
											Calcular semestre que se encuentra el estudiante
										</li>

										<li>
											<i class="icon-ok green"></i>
											Eliminar los horarios y plan de evaluacion
										</li>

										<li>
											<i class="icon-ok green"></i>
											Eliminar los seminarios seleccionados
										</li>
									</ul>
								</div>
							</div>
						</div>
					</div>

					<div class="span4">
						
						<div class="widget-box pricing-box">
							<div class="widget-header header-color-dark">
								<h5 class="bigger lighter">Inf. del Semestres</h5>
							</div>

							<div class="widget-body">
								<div class="widget-main">
									<div class="row-fluid">
										<label for="form-field-select-1">Departamento</label>
										<select id="departamento">
											<option value="">...</option>
											{foreach from=$depart key=key item=item}
												<option value="{$item['id']}">{$item['nombre']}</option>
											{/foreach}
										</select>
									</div>

									<div class="row-fluid">
										<label for="form-field-select-1">Carrera</label>
										<select id="carrera">
											<option value="">...</option>
										</select>
									</div>

									<div class="row-fluid">
										<label for="form-field-select-1">Semestre</label>
										<select id="semestres" disabled="disabled" data-toggle="popover" data-placement="bottom" data-content="Seleccione los semestre" data-original-title="Campo Obligatorio">
											<option value="">...</option>
											<option value="1">Pares</option>
											<option value="2">Impares</option>
										</select>
									</div>
								</div>
							</div>
						</div>
					</div>


					<div class="span4">
						<div class="widget-box pricing-box">
							<div class="widget-header header-color-dark">
								<h5 class="bigger lighter">Progreso del Semestre</h5>
							</div>

							<div class="widget-body">
								<div class="widget-main">
									<div class="row-fluid">
										<div class="span6">
											<label for="form-field-select-1">Fecha Inicio</label>
											<div class="input-append">
												<input id="FechaIni" type="text" class="input-small datepicker" disabled="disabled" data-toggle="popover">
												<span class="add-on">
													<i class="icon-calendar"></i>
												</span>
											</div>
										</div>

										<div class="span6">
											<label for="form-field-select-1">Fecha Final</label>
											<div class="input-append">
												<input id="FechaFin" type="text" class="input-small datepicker" disabled="disabled" data-toggle="popover">
												<span class="add-on">
													<i class="icon-calendar"></i>
												</span>
											</div>
										</div>
									</div>

									<div class="row-fluid">
										<div class="span12 center">
											<div id="progressBar" class="progress progress-success progress-striped active" data-percent="0% de Avance" style="margin-top: 4px; margin-bottom: 18px;">
												<div class="bar" style="width: 0%;"></div>
											</div>
										</div>			
									</div>	

									<div class="row-fluid">
										<div class="span12">
											<div class="media">
												<div class="pull-left center">
													<div id="circle" class="easy-pie-chart percentage" data-percent="0" data-color="#D15B47">
														<span class="percent">0</span>
													</div>
												</div>
												<div class="media-body">
													<h4 class="media-heading">Dias Restantes</h4>
													Faltan <span id="day">0</span> dia para que se culminen los semestres
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>

				<hr>
				<div class="row-fluid wizard-actions">
					<button class="btn btn-success" id="close">
						<i class="icon-lock bigger-160"></i>Cerrar semestre
					</button>
				</div>
			</div>
		</div>
	</div>

</html>