<html class="fuelux">

	<div class="widget-box">
		<div class="widget-header widget-header-blue widget-header-flat">
			<h4 class="lighter">Añadir seminario a pensum</h4>
		</div>

		<div class="widget-body">
			<div class="widget-main">

				<div id="MyWizard" class="row-fluid wizard">
					<ul class="steps wizard-steps">
						<li data-target="#step1" class="active" style="min-width: 25%; max-width: 25%;">
							<span class="step">1</span>
							<span class="title">Seleccionar Carrera</span>
						</li>

						<li data-target="#step2" class="" style="min-width: 25%; max-width: 25%;">
							<span class="step">2</span>
							<span class="title">Añadir seminario</span>
						</li>

						<li data-target="#step3" class="" style="min-width: 25%; max-width: 25%;">
							<span class="step">3</span>
							<span class="title">Finalizar</span>
						</li>
					</ul>

				</div>

				<div class="step-content">
					<hr>

					<div class="step-pane active" id="step1">
						<h3 class="lighter block green">Seleccione la carrera de su preferencia</h3>
						<div class="center">
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
						</div>
					</div>


					<div class="step-pane" id="step2">
						<div class="row-fluid">
							<div class="span9">
								<h3 class="lighter block green">Agregar los seminarios a las materia</h3>
							</div>
						</div>

						<div class="row-fluid">
							<div class="span4">
								<div class="row-fluid">
									<h3 for="form-field-select-3">Materia</h3>
									<select id="select_materia">
										<option value="">...</option>
									</select>
								</div>
								<hr>
								<div class="row-fluid">
									<h3 for="form-field-select-3">Seminario</h3>
									<select id="select_seminario">
										<option value="">...</option>
										{foreach from=$seminario key=key item=item}
											<option value="{$item['id']}">{$item['nombre']}</option>
										{/foreach}
									</select>
								</div>
								<hr>
								<div class="row-fluid">
									<button class="btn btn-info" type="button" id="add_materia_has_pensum" style="margin-bottom: 15px;">
										<i class="icon-ok bigger-110"></i>
										Agregar
									</button>
								</div>
							</div>

							<div class="span8">
								<div id="accordion" class="accordion-style1 panel-group"> </div>
							</div>
						</div>					
					</div>
					

					<div class="step-pane" id="step3">
						<div class="row-fluid">
							<div class="span12 center">
								<h3 class="green">Felicidades!</h3>
								Ha culminado el proceso de registro de seminario, precione finalizar!
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
	</div>


</html>