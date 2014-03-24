<div class="widget-box">
	<div class="widget-header widget-header-blue widget-header-flat">
		<h4 class="lighter">Notas Totales</h4>

		<div class="widget-toolbar no-border">
			<button id = "print" class="btn btn-mini btn-primary">
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
						Semestre
					</span>
					<h5 class="bigger pull-right">{$semestre}</h5>
				</div>

				<div class="grid4">
					<span class="grey">
						<i class="icon-book icon-2x red"></i>
						Materias Aprob / Repro
					</span>
					<h5 class="bigger pull-right">{$matApro} / {$matRepro}</h5>
				</div>

				<div class="grid4">
					<span class="grey">
						<i class="icon-dashboard icon-2x green"></i>
						Materias Faltantes
					</span>
					<h5 class="bigger pull-right">{$matFaltante}</h5>
				</div>
			</div>

			<div class="hr hr8 hr-double"></div>


			<div class="timeline-items">
				<div class="timeline-item clearfix">

					
					{for $num=1 to $numSemes}
						<div class="widget-box transparent" style="margin-left: 0px; margin-bottom:5px; border-bottom: 3px solid #dae1e5">
							<div class="widget-header widget-header-small">
								<h5 class="smaller">
									<span class="blue">Semestre #{$num}</span>
								</h5>

								<span class="widget-toolbar no-border">
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
												<th style="width:70%;">Uni. Curricular</th>
												<th class="center">Nota</th>
												<th class="hidden-phone center">Estatus</th>
											</tr>
										</thead>
										<tbody>

											{foreach from=$notas key=key item=item}
												{if $item['semestre'] eq $num}

													{if $item['estatus'] eq "APROBADA"}
														<tr class="success">
													{elseif $item['estatus'] eq "REPROBADA"}
														<tr class="error">
													{elseif $item['estatus'] eq "PENDIENTE"}
														<tr class="warning">
													{else}
														<tr>
													{/if}
														<td>{$item['materia_codigo']}</td>
														<td>{$item['nombre']}</td>
														{if $item['estatus'] eq "APROBADA"}
															<td class="text-success center">{$item['total']}</td>
															<td class="hidden-phone text-success center">{$item['estatus']}</td>
														{elseif $item['estatus'] eq "REPROBADA"}
															<td class="text-error center">{$item['total']}</td>
															<td class="hidden-phone text-error center">{$item['estatus']}</td>
														{elseif $item['estatus'] eq "PENDIENTE"}
															<td class="text-warning center">{$item['total']}</td>
															<td class="hidden-phone text-warning center">{$item['estatus']}</td>
														{else}
															<td class="center">{$item['total']}</td>
															<td class="hidden-phone center">{$item['estatus']}</td>
														{/if}
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
<form method="post" style="display:none">
    <input id="html" name="html" type="text" value=""/>
</form>
<script type="text/javascript">
	$("#print").click(function(event) {
		$("form").attr('action', base_url+'download/reporte_notas');
        $("#html").val($(".timeline-items").html());
        $("form").submit();
	});

</script>>