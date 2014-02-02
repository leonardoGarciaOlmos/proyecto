<div class="main-container">
			<div class="">
				<div class="row">
					<div class="col-sm-10 col-sm-offset-1">
						<div class="login-container">

							<div class="space-6"></div>

							<div class="position-relative">
								<div id="login-box" class="login-box visible widget-box no-border">
									<div class="widget-body">
										<div class="widget-main">
											<h4 class="header blue lighter bigger">
												<i class="icon-coffee green"></i>
												Seleccione la información del Horario
											</h4>

											<div class="space-6"></div>

											<form id="principal" style="margin-left:65px" action="" method="post">
												

													<label class="block clearfix" for="carrera">Carrera</label>
														<select id="carrera" name = "carrera" class="form-control error">
															<option value="">&nbsp;</option>
															{foreach key=key from=$data item=car}
															<option value="{$car.id}" pensum="{$car.pensum_id}">{$car.nombre}</option>
															{/foreach}  
														</select>

													<label class="block clearfix" for="semestre">Semestre</label>
														<select id="semestre" name = "semestre" class="form-control col-xs-3">
															<option value="">&nbsp;</option>
														</select>

													<div class="space"></div>

												
											</form>

										<div id="error" class="alert alert-danger" style="display:none">
											<button type="button" class="close" data-dismiss="alert">
												<i class="icon-remove"></i>
											</button>

											<strong>
												<i class="icon-remove"></i>
												Disculpe! 
											</strong>

											Debe seleccionar semestre y carrera antes de continuar.
											<br>
										</div>

										<div id="errorEmpty" class="alert alert-danger" style="display:none">
											<button type="button" class="close" data-dismiss="alert">
												<i class="icon-remove"></i>
											</button>

											<strong>
												<i class="icon-remove"></i>
												Disculpe! 
											</strong>

											El semestre que ha seleccionado no tiene informacion disponible.
											<br>
										</div>

										</div><!-- /widget-main -->

										<div class="toolbar clearfix">
											<div>
												<a id="c_horario" class="forgot-password-link">
													<i class="icon-arrow-left"></i>
													Consultar Horario
												</a>
											</div>

											<div>
												<a id="g_horario" class="user-signup-link">
													Generar Horario
													<i class="icon-arrow-right"></i>
												</a>
											</div>
										</div>
									</div><!-- /widget-body -->
								</div><!-- /login-box -->
							</div><!-- /position-relative -->
						</div>
					</div><!-- /.col -->
				</div><!-- /.row -->
			</div>
		</div>