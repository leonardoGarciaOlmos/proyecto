<input type="hidden" value="{$totalStep}" id="total-step" />
<input type="hidden" value="" id="id_carrera" />
<input type="hidden" value="{$id_pensum}" id="id_pensum" />

<div class="widget-box">
	<div class="widget-header widget-header-blue widget-header-flat">
		<h4 class="lighter">{$title}</h4>
	</div>

	<div class="widget-body">
		<div class="widget-main">
			<div id="fuelux-wizard" class="row-fluid" data-target="#step-container">
				<ul class="wizard-steps">
					{foreach from=$step key=key item=data}
						{if $key+1 eq 1}
							<li data-target="#step{$key+1}" class="active">
						{else}
							<li data-target="#step{$key+1}" class="">
						{/if}
							<span class="step">{$key+1}</span>
							<span class="title">{$data}</span>
						</li>
					{/foreach}
				</ul>
			</div>

			<hr>

			<div class="step-content row-fluid position-relative" id="step-container">
				
				{foreach from=$stepConten key=key item=data}
					{if $key+1 eq 1}
						<div class="step-pane active" id="step{$key+1}">
					{else}
						<div class="step-pane" id="step{$key+1}">
					{/if}

					
					{if $data eq "selectCarre"}
						<h3 class="lighter block green">Seleccione la carrera de su preferencia</h3>
						<div class="center">
							<h3>Departamento</h3>
							{if $status eq "add"}
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
								
							{elseif $status eq "update"}
								<select id="select_departamento" disabled="disabled">
									{foreach from=$depart key=key item=item}
										<option value="{$item['id']}">{$item['nombre']}</option>
									{/foreach}
								</select>

								<h3>Carrera</h3>
								<select disabled="disabled" id="select_carrera" disabled="disabled">
									{foreach from=$carrera key=key item=item}
										<option value="{$item['id']}">{$item['nombre']}</option>
									{/foreach}
								</select>
							{/if}
						</div>
					{/if}

					{if $data eq "addMateria"}
						<div class="row-fluid">
							<div class="span9">
								<h3 class="lighter block green">Agregar las materias a cada semestre</h3>
							</div>
							<div class="span3">
								<button style="float:right;" class="btn btn-primary" name="agregarSemes" id="addSemes"><i class="icon-plus icon-white"></i> Agregar Semestre</button>
							</div>
						</div>
						
						{if $status eq "add"}
							<input type="hidden" value="1" id="num_semestre" />
							<div id="accordion" class="accordion-style1 panel-group">
								<h4>No existe semestre ni materia</h4>
							</div>
						{elseif $status eq "update"}
							{$coundSemestre = 0}
							<div id="accordion" class="accordion-style1 panel-group">
								{foreach from=$semestre key=key item=data}
								{$coundSemestre = $data['semestre']}
								<div class="panel panel-default">
									<div class="panel-heading">
										<h3 class="panel-title">
										<a class="accordion-toggle collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapse{$data['semestre']}">
										<i class="bigger-110 icon-angle-right" data-icon-hide="icon-angle-down" data-icon-show="icon-angle-right"></i>
										&nbspSemestre #{$data['semestre']}
										</a>
										</h3>
									</div>

									<div class="panel-collapse collapse" id="collapse{$data['semestre']}" style="height: 0px">
										<div class="panel-body">
											<input type="hidden" value="{$data['semestre']}", name="semestre" id="semestre">
											<input type="hidden" value="" name="materia_id" id="materia_id">
											<div class="span1"> <h4>Materia</h4> </div>
											<div class="span3"> <input type="text" value="" name="materia" id="materia"> </div>
											<div class="span12">
												<table class="table" id="tableMateria">
													<tr>
														<td><h5>Codigo</h5></td>
														<td><h5>Uni. Curricular</h5></td>
														<td><h5>H. Teoricas</h5></td>
														<td><h5>H. Practicas</h5></td>
														<td><h5>Total Horas</h5></td>
														<td><h5>Uni. Credito</h5></td>
														<td><h5>Cod. Prelacion</h5></td>
														<td></td>
													</tr>
													{foreach from=$MHS key=key item=data}
														{if $coundSemestre eq $data['semestre']}
														<tr>
															<td>{$data['codigo']}</td>
															<td>{$data['nombre']}</td>
															<td>{$data['horas_teoricas']}</td>
															<td>{$data['horas_practicas']}</td>
															<td>{$data['total_horas']}</td>
															<td>{$data['uni_credito']}</td>
															<td>{$data['cod_prelacion']}</td>
															<td><button class="btn btn-mini btn-danger" id="eliminarMat" type="button" value="{$data['codigo']}"><i class="icon-remove-sign"></i></td>
														</tr>
														{/if}
													{/foreach}
												</table>
											</div>
										</div>
									</div>
								</div>
								{foreachelse}
									<h4>No existe semestre ni materia</h4>
								{/foreach}
							</div>

							<input type="hidden" value="{$coundSemestre+1}" id="num_semestre" />

						{/if}

						
					{/if}

					{if $data eq "addElect"}
						<h3 class="lighter block green">Agregar seminario a la materia que pertenesca</h3>

						<div class="row-fluid">
							<div class="span4" >
								<select id="seminario">
									<option value="">...</option>
								</select>
							</div>

							<div class="span4" >
								<select id="mat_has_pensum">
									<option value="">...</option>
								</select>
							</div>

							<div class="span4 center" >
								<button class="btn btn-primary" name="agregarSemes" id="addSeminario"><i class="icon-plus icon-white"></i> Agregar Seminario</button>
							</div>
						</div>

						{if $status eq "add"}
							<div id="accordion-semestre" class="accordion-style1 panel-group" style="margin-top:10px;">
								<h4>No existe seminario registrado</h4>
							</div>
						{elseif $status eq "update"}
							<div id="accordion-semestre" class="accordion-style1 panel-group" style="margin-top:10px;">

								{foreach from=$MatHasSem key=key item=data}
									<div class="panel panel-default">
										<div class="panel-heading">
											<h3 class="panel-title">
											<a class="accordion-toggle collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapse{$data['codigo']}">
											<i class="bigger-110 icon-angle-right" data-icon-hide="icon-angle-down" data-icon-show="icon-angle-right"></i>
											&nbsp;{$data['nombre']}
											</a>
											</h3>
										</div>

										<div class="panel-collapse collapse" id="collapse{$data['codigo']}" style="height: 0px;">
											<div class="panel-body">
										        <div class="span12">
											        <table class="table" id="tableSeminario">
												        <tr>
													        <td><h5>Codigo</h5></td>
													        <td><h5>Seminario</h5></td>
													        <td></td>
												        </tr>
												        {foreach from=$SemHasPen key=key item=dataAux}
												        	{if $dataAux['materia_codigo'] eq $data['codigo']}
												        		<tr>
															        <td>{$dataAux['id']}</td>
															        <td>{$dataAux['nombre']}</td>
															        <td><button class="btn btn-mini btn-danger" id="eliSeminario" type="button" name="{$dataAux['materia_codigo']}" value="{$dataAux['id']}"><i class="icon-remove-sign"></i></td>
														        </tr>
												        	{/if}
												        {/foreach}
											        </table>
										        </div>
											</div>
										</div>
									</div>
								{foreachelse}
									<h4>No existe seminario registrado</h4>
								{/foreach}
							</div>
						{/if}

					{/if}

					{if $data eq "finish"}
						<div class="center">
							<h3 class="green">Proceso Finalizado</h3>
							El proceso de insercion de datos ha culminado, precione finalizar para concluir
						</div>
					{/if}


					</div>

				{/foreach}
			</div>

			<hr>

			<div class="row-fluid wizard-actions">
				<button class="btn btn-prev" disabled="disabled" id="prev">
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