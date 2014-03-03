	<div class="widget-box">
		<div class="widget-header widget-header-blue widget-header-flat">
			<h4 class="lighter">Vista del Pensum</h4>

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
					<div class="grid4">
						<span class="grey">
							<i class="icon-bookmark icon-2x blue"></i>
							Carrera
						</span>
						<h5 class="bigger pull-right">{$carrera}</h5>
					</div>

					<div class="grid4">
						<span class="grey">
							<i class="icon-bullhorn icon-2x purple"></i>
							Semestres
						</span>
						<h5 class="bigger pull-right">{$NumSemestre}</h5>
					</div>

					<div class="grid4">
						<span class="grey">
							<i class="icon-book icon-2x red"></i>
							Materias
						</span>
						<h5 class="bigger pull-right">{$NumMateria}</h5>
					</div>

					<div class="grid4">
						<span class="grey">
							<i class="icon-dashboard icon-2x green"></i>
							Sem. Abiertos
						</span>
						<h5 class="bigger pull-right">{$SemAbiertos}</h5>
					</div>
				</div>

				<div class="hr hr8 hr-double"></div>


				<div class="timeline-items">
					<div class="timeline-item clearfix">

						{for $num=1 to $semestre}
							<div class="widget-box transparent" style="margin-left: 0px; margin-bottom:5px; border-bottom: 3px solid #dae1e5">
								<div class="widget-header widget-header-small">
									<h5 class="smaller">
										<span class="blue">Semestre #{$num}</span>
									</h5>

									<span class="widget-toolbar no-border">
										<table>
											<tr>
												<th class="center" style="padding-left: 2px; padding-right: 2px;"> HT:{$SemestreInfo[$num-1]['HT']} </th>
												<th class="center" style="padding-left: 2px; padding-right: 2px;"> HP:{$SemestreInfo[$num-1]['HP']} </th>
												<th class="center" style="padding-left: 2px; padding-right: 2px;"> TH:{$SemestreInfo[$num-1]['TH']} </th>
												<th class="center" style="padding-left: 2px; padding-right: 2px;"> UC:{$SemestreInfo[$num-1]['UC']} </th>
											</tr>
										</table>
									</span>

									<span class="widget-toolbar">
										<a href="#" data-action="collapse">
											<i class="icon-chevron-up"></i>
										</a>
									</span>
								</div>

								<div class="widget-body">
									<div class="widget-main">


										<table style="width:100%;" class="table">
											<thead>
												<tr>
													<th>Codigo</th>
													<th>Uni. Curricular</th>
													<th class="hidden-phone">H. Teoricas</th>
													<th class="hidden-phone">H. Practicas</th>
													<th class="hidden-phone">Total Horas</th>
													<th class="hidden-480">Uni. Credito</th>
													<th class="hidden-480">Cod. Prelacion</th>
												</tr>
											</thead>
											<tbody>

												{foreach from=$materia key=key item=item}
													{if $item['semestre'] eq $num}
														<tr>
															<td>{$item['codigo']}</td>
															<td>{$item['nombre']}</td>
															<td class="hidden-phone">{$item['horas_teoricas']}</td>
															<td class="hidden-phone">{$item['horas_practicas']}</td>
															<td class="hidden-phone">{$item['total_horas']}</td>
															<td class="hidden-480">{$item['uni_credito']}</td>
															<td class="hidden-480">{$item['cod_prelacion']}</td>
														</tr>
													{/if}
												{/foreach}
											</tbody>
										</table>

									</div>
								</div>
							</div>
						{/for}
					</div>
				</div>
			</div>
		</div>
	</div>