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

				<div class="grid3">
					<span class="grey">
						<i class="icon-book icon-2x red"></i>
						Materia
					</span>
					<h5 class="bigger pull-right">{$materia}</h5>
				</div>

				<div class="grid3">
					<span class="grey">
						<i class="icon-user icon-2x green"></i>
						Docente
					</span>
					<h5 class="bigger pull-right">{$profesor}</h5>
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

									{if $estudiante eq ""}
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
									{else}

										{if $estudiante eq $notas[$numNot-1]['Estudiante']}
											<tr>
												<td><span>{$notas[$numNot-1]['Estudiante']}</span></td>
												<td><span>{$notas[$numNot-1]['nombre_estudiante']}</span></td>
												{for $numEva=1 to $numEvaluaciones}
													{for $numEvaAux=1 to $numEvaluaciones}
														{if $evaluaciones[$numEva-1]['id'] eq $notas[$numNot-1]["evaluacion$numEvaAux"]}
															<td class="center">
																<span type="text" class="center">{$notas[$numNot-1]["nota$numEvaAux"]}</span>
															</td>
														{/if}
													{/for}
												{/for}
											</tr>
										{/if}

									{/if}

								{/for}
							{/if}
						</tbody>
					</table>
				</div>
			</div>

		</div>
	</div>
</div>