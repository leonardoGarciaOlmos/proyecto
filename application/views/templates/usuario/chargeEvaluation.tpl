					<div class="row-fluid">
						<div class="span12">
							<!--PAGE CONTENT BEGINS-->

							<div class="row-fluid">
								<div class="span12">
<!-- 									<table id="sample-table-1" class="table table-striped table-bordered table-hover">
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
									</table> -->
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
					</div>