<html>
	
	<div class="widget-box">
		<div class="widget-header widget-header-blue widget-header-flat">
			<h4 class="lighter">Inicio de Semestre</h4>
		</div>

		<div class="widget-body">
			<div class="widget-main">

				<div class="row-fluid">
					<div class="span12">
						
						<div class="span5">
							<div class="widget-box pricing-box">
								<div class="widget-header header-color-dark">
									<h5 class="bigger lighter">Instrucciones</h5>
								</div>

								<div class="widget-body">
									<div class="widget-main">
										<ul class="unstyled spaced2">
											<li>
												<i class="icon-ok green"></i>
												Seleccionar Departamento y carrera
											</li>

											<li>
												<i class="icon-ok green"></i>
												Seleccionar cuales semestre se abriran, si ya la carrera tiene semestres abiertos debe proceder a cerrarlos para abrir otros 
											</li>

											<li>
												<i class="icon-ok green"></i>
												Seleccionar una fecha inicio y fecha fin, la fecha de inicio debe ser menor a la fecha fin
											</li>

											<li>
												<i class="icon-ok green"></i>
												Verificar la información, en caso de ser la correcta presionar el boton enviar para guardar la data
											</li>
										</ul>
									</div>
								</div>
							</div>
						</div>



						<div class="span7">

							<div class="span12">
								<label for="form-field-select-1">Departamento</label>
								<select id="select_departamento">
									<option value="">...</option>
									{foreach from=$depart key=key item=item}
										<option value="{$item['id']}">{$item['nombre']}</option>
									{/foreach}
								</select>
							</div>

							<div class="span12">
								<label for="form-field-select-1">Carrera</label>
								<select id="select_carrera">
									<option value="">...</option>
								</select>
							</div>

							<div class="span12">
								<label for="form-field-select-1">Semestre</label>
								<select id="semestres" disabled="disabled">
									<option value="">...</option>
									<option value="1">Pares</option>
									<option value="2">Impares</option>
								</select> *
							</div>

							<div class="span12">
								<div class="span6">
									<label for="form-field-select-1">Fecha Inicio</label>
									<div class="input-append">
										<input id="FechaIni" type="text" class="input-medium datepicker" disabled="disabled">
										<span class="add-on">
											<i class="icon-calendar"></i>
										</span>
									</div> *
								</div>

								<div class="span6">
									<label for="form-field-select-1">Fecha Final</label>
									<div class="input-append">
										<input id="FechaFin" type="text" class="input-medium datepicker" disabled="disabled">
										<span class="add-on">
											<i class="icon-calendar"></i>
										</span>
									</div> *
								</div>
							</div>

						</div>

					</div>
				</div>

				<hr>
				<div class="row-fluid wizard-actions">
					<button class="btn btn-success btn-next" id="submit">
						Enviar
					</button>
				</div>


			</div>
		</div>
	</div>

</html>