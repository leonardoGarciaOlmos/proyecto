<div class="widget-box">
	<div class="widget-header widget-header-blue widget-header-flat">
		<h4 class="lighter">Notas de estudiante</h4>

		<div class="widget-toolbar no-border">
			<button class="btn btn-mini btn-primary">
				<i class="icon-print"></i>
				Imprimir
			</button>
		</div>
	</div>

	<div class="widget-body">
		<div class="widget-main">
		
			<div class="clearfix">
				<div class="grid3">
					<span class="grey">
						<i class="icon-bookmark icon-2x blue"></i>
						Carrera
					</span>
					<h5 class="bigger pull-right">{$carrera}</h5>
				</div>

				<div class="grid2">
					<span class="grey">
						<i class="icon-book icon-2x red"></i>
						Materia
					</span>
					<h5 class="bigger pull-right">{$materia}</h5>
				</div>
			</div>

			<div class="hr hr8 hr-double"></div>


			<div class="row-fluid">
				<div class="span12">
					<table class="table">
						<thead>
							<tr>
								<th>
									<span>Cedula</span>
								</th>
								<th>
									<span>Estudiantes</span>
								</th>
								{for $numEva=1 to $numEvaluaciones}
									<th class="center">
										<a href="#" data-rel="tooltip" data-original-title="{$evaluaciones[$numEva-1]['descripcion']}">
											Evaluación{$numEva} ({$evaluaciones[$numEva-1]['porcentaje']}%)
										</a>
									</th>
								{/for}
							</tr>
						</thead>

						<tbody>

							{if $numNotas eq 0}
								<tr>
									<td class="center" colspan="{$numEvaluaciones+2}">
										<h4>No hay alumnos inscritos</h4>
									</td>
								</tr>
							{else}
								{for $numNot=1 to $numNotas}
									<tr>
										<td><span>{$notas[$numNot-1]['Estudiante']}</span></td>
										<td><span>{$notas[$numNot-1]['nombre_estudiante']}</span></td>
										{for $numEva=1 to $numEvaluaciones}
											{for $numEvaAux=1 to $numEvaluaciones}
												{if $evaluaciones[$numEva-1]['id'] eq $notas[$numNot-1]["evaluacion$numEvaAux"]}
													<td class="center">
														<input type="text" class="nota" style="width:36px;" value="{$notas[$numNot-1]["nota$numEvaAux"]}" campo="nota{$numEva}" plan="{$plan}" estudiante="{$notas[$numNot-1]['Estudiante']}">
													</td>
												{/if}
											{/for}
										{/for}
									</tr>
								{/for}
							{/if}
						</tbody>
					</table>
				</div>
			</div>

		</div>
	</div>
</div>


<!-- 					<div class="row-fluid">
						<div class="span12">
							<div class="row-fluid">
								<div class="span12">
 									<table id="sample-table-1" class="table table-striped table-bordered table-hover">
										<thead>
											<tr>
												<th class="center">
													<label>
														<input type="checkbox" class="ace" />
														<span class="lbl"></span>
													</label>
												</th>
												<th>Domain</th>
												<th>Price</th>
												<th class="hidden-480">Clicks</th>

												<th class="hidden-phone">
													<i class="icon-time bigger-110 hidden-phone"></i>
													Update
												</th>
												<th class="hidden-480">Status</th>

												<th></th>
											</tr>
										</thead>

										<tbody>
											<tr>
												<td class="center">
													<label>
														<input type="checkbox" class="ace" />
														<span class="lbl"></span>
													</label>
												</td>

												<td>
													<a href="#">ace.com</a>
												</td>
												<td>$45</td>
												<td class="hidden-480">3,330</td>
												<td class="hidden-phone">Feb 12</td>

											</tr>
									</table>
									<script type="text/javascript" >
										var plan = {$encodePE};
									</script>
									<div class="title">
										<h2></h2>
									</div>
									<table id="format" class="table table-striped table-bordred table-hover">
										<thead>
											<tr>
												<th><b>Cedula</b></th>
												<th><b>Nombre y Apellido</b></th>
												{foreach from=$planEvaluacion item=evaluacion} 
												<th >
													<b alt="{$evaluacion.descripcion}">{$evaluacion.porcentaje}%</b>
													<input type="hidden" value="{$evaluacion.porcentaje}">
												</th>
												{/foreach}
												<th><b>Def</b></th>
											</tr>
										</thead>
										<tbody>
											{foreach key=key from=$alumnos item=alumno}
											<tr >
												<td >{$alumno.ci}</td>
												<td>{$alumno.nombre}</td>
												{foreach from=$planEvaluacion item=evaluacion} 
												<td >
													<input type="number" class="note" step="1" value='1' maxlength="2" min="0" max="20"  pattern="\d*" >
												</td>
												{/foreach}
												<td><b id="def{$alumno.ci}" class="def">0</b></td>
											</tr>
											{/foreach}
										</tbody>

										<tfoot></tfoot> 
									</table>
								</div>
							</div>
						</div>
					</div> -->