<div class="span12">
	<div class="widget-box">
		<div class="widget-header header-color-dark">
			<h4 class="smaller">
				Plan de Evaluacion
				<small>Lenin Luque</small>
			</h4>
		</div>

		<div class="widget-body">
			<div class="widget-main">
				<div class ="row-fluid">
					<div class="span6">
						<label for="carrera">Carrera</label>

						<select id="carrera">
							<option value="">&nbsp;</option>
							{foreach key=key from=$carreras item=car}
								<option value="{$car.id}" carrera="{$car.nombre}">{$car.nombre}</option>
							{/foreach}
						</select>

						<label for="materia">Materia</label>

						<select id="materia">
							<option value="">&nbsp;</option>
						</select>


					<div class="controls ">
						<span class="input-append">
							<label for="nom_eval">Nombre Evaluacion</label>
							<input type="text" id="nom_eval" placeholder="Evaluacion X">
						</span>

						<span class="input-append">
							<label for="num_eval">Porcentaje (%)</label>
							<input type="number" min="0" id="num_eval" class="input-small input-mask-date" placeholder ="15">
							<span id="add" class="btn btn-small btn-success">
								<i class="icon-plus bigger-110"></i>
								Añadir
							</span>
						</span>

					</div>

						<label for="form-field-select-2">Lista de Evaluaciones</label>

						<select id="evaluaciones" size="5" total="0">
						</select>
						<span id="delete" class="btn btn-danger btn-small tooltip-warning" data-rel="tooltip" data-placement="left" title="" data-original-title="Left Warning">Eliminar</span>
					</div>

					<div class="span6">
						<div class="well">
							<h4 class="red smaller lighter ">Cuidado!</h4>
							<dt class="text-warning">Para añadir una nueva evaluacion debe cumplir con las siguientes condiciones:</dt>
							<dd>- La evaluacion no puede valer mas de 60%</dd>
							<dd>- El nombre y el valor de la evaluacion no pueden estar vacios</dd>
							<dd>- La suma de todas la evaluaciones debe ser de 100%</dd>
							<dd>- La cantidad de evaluaciones no puede ser mayor a 8</dd>
						</div>
					<div class="alert alert-block alert-success hide">
						<button type="button" class="close" data-dismiss="alert">
							<i class="icon-remove"></i>
						</button>

						<p>
							<strong>
								<i class="icon-ok"></i>
								Listo!
							</strong>
							La informacion se ha guardado con exito!.
						</p>
					</div>
					</div>
				</div>	

				<hr>

				<div class="form-actions">
					<button id="guardar" class="btn btn-info" type="button">
						<i class="icon-ok bigger-110"></i>
						Guardar
					</button>

					&nbsp; &nbsp; &nbsp;
					<button class="btn" type="reset">
						<i class="icon-undo bigger-110"></i>
						Cancelar
					</button>
				</div>
			</div>
		</div>
	</div>
</div>