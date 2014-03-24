		<div class="page-content">
					<div class="page-header position-relative">
						<h1>
							Mi perfil
						</h1>
					</div><!--/.page-header-->

					<div class="row-fluid">
						<div class="span12">
						<form action="../auth/change_password" id="profileform"  >
							<!--PAGE CONTENT BEGINS-->
							<div class="clearfix">
							</div>
							<div >
								<div id="user-profile-2" class="user-profile row-fluid">
									<div class="tabbable">
										<ul class="nav nav-tabs padding-18">
											<li class="active">
												<a data-toggle="tab" href="#home">
													<i class="green icon-user bigger-120"></i>
													Perfil
												</a>
											</li>

											<li>
												<a data-toggle="tab" href="#edit-password">
													<i class="blue icon-key bigger-125"></i>
													Clave
												</a>
											</li>
<!-- 											<li>
												<a data-toggle="tab" href="#edit-settings">
													<i class="purple icon-cog bigger-125"></i>
													Opciones
												</a>
											</li>
											<li>
												<a data-toggle="tab" href="#pictures">
													<i class="pink icon-picture bigger-120"></i>
													Información
												</a>
											</li> -->
										</ul>

										<div class="tab-content no-border padding-24">
											<div id="home" class="tab-pane in active">
												<div class="row-fluid">
													<div class="span3 center">
														<span class="profile-picture">
															<img class="editable" alt="Alex's Avatar" id="avatar2" src="http://192.168.0.103/proyecto/assets/avatars/profile-pic.jpg" />
														</span>

														<div class="space space-4"></div>

													</div><!--/span-->

													<div class="span9">
														<h4 class="blue">
															<span class="middle">{$usuario.nombre}</span>

															<span class="label label-purple arrowed-in-right">
																<i class="icon-circle smaller-80"></i>
																online
															</span>
														</h4>

														<div class="profile-user-info">
															<div class="profile-info-row">
																<div class="profile-info-name"> Correo </div>

																<div class="profile-info-value">
																	<span>{$usuario.correo}</span>
																</div>
															</div>

															<div class="profile-info-row">
																<div class="profile-info-name"> Dirección </div>

																<div class="profile-info-value">
																	<i class="icon-map-marker light-orange bigger-110"></i>
																	<span>{$usuario.correo}</span>
																</div>
															</div>

															<div class="profile-info-row">
																<div class="profile-info-name"> Edad </div>

																<div class="profile-info-value">
																	<span>{$usuario.edad}</span>
																</div>
															</div>

															<div class="profile-info-row">
																<div class="profile-info-name"> Carrera </div>

																<div class="profile-info-value">
																	<span>{$usuario.carrera}</span>
																</div>
															</div>

															<div class="profile-info-row">
																<div class="profile-info-name">Semestre</div>

																<div class="profile-info-value">
																	<span>{$usuario.semestre}</span>
																</div>
															</div>
														</div>

														<div class="hr hr-8 dotted"></div>

													</div><!--/span-->
												</div><!--/row-fluid-->

												<div class="space-20"></div>

											</div><!--#home-->


											<div id="edit-password" class="tab-pane">
												<div class="space-10"></div>
												<div class="control-group">
													<label class="control-label" for="form-field-pass1">Contraseña Anterior</label>

													<div class="controls">
														<input type="password" id="old_password"  name="old_password" />
													</div>
												</div>
												<div class="control-group">
													<label class="control-label" for="form-field-pass1">Contraseña Nueva</label>

													<div class="controls">
														<input type="password" id="new_password"  name="new_password" />
													</div>
												</div>

												<div class="control-group">
													<label class="control-label" for="form-field-pass2">Confirmación de Contraseña</label>

													<div class="controls">
														<input type="password" id="confirm_new_password"  name="confirm_new_password" />
													</div>
												</div>
											</div><!--#home-->

											<div id="edit-settings" class="tab-pane">
												<div class="space-10"></div>

												<div>
													<label class="inline">
														<input type="checkbox" name="form-field-checkbox" class="ace" />
														<span class="lbl"> Make my profile public</span>
													</label>
												</div>

												<div class="space-8"></div>

												<div>
													<label class="inline">
														<input type="checkbox" name="form-field-checkbox" class="ace" />
														<span class="lbl"> Email me new updates</span>
													</label>
												</div>

												<div class="space-8"></div>

												<div>
													<label class="inline">
														<input type="checkbox" name="form-field-checkbox" class="ace" />
														<span class="lbl"> Keep a history of my conversations</span>
													</label>

													<label class="inline">
														<span class="space-2 block"></span>

														for
														<input type="text" class="input-mini" maxlength="3" />
														days
													</label>
												</div>
											</div><!--#edit-settings-->

											<div id="pictures" class="tab-pane">
												<ul class="ace-thumbnails">
													<li>
														<a href="#" data-rel="colorbox">
															<img alt="150x150" src="assets/images/gallery/thumb-1.jpg" />
															<div class="text">
																<div class="inner">Sample Caption on Hover</div>
															</div>
														</a>

														<div class="tools tools-bottom">
															<a href="#">
																<i class="icon-link"></i>
															</a>

															<a href="#">
																<i class="icon-paper-clip"></i>
															</a>

															<a href="#">
																<i class="icon-pencil"></i>
															</a>

															<a href="#">
																<i class="icon-remove red"></i>
															</a>
														</div>
													</li>

													<li>
														<a href="#" data-rel="colorbox">
															<img alt="150x150" src="assets/images/gallery/thumb-2.jpg" />
															<div class="text">
																<div class="inner">Sample Caption on Hover</div>
															</div>
														</a>

														<div class="tools tools-bottom">
															<a href="#">
																<i class="icon-link"></i>
															</a>

															<a href="#">
																<i class="icon-paper-clip"></i>
															</a>

															<a href="#">
																<i class="icon-pencil"></i>
															</a>

															<a href="#">
																<i class="icon-remove red"></i>
															</a>
														</div>
													</li>

													<li>
														<a href="#" data-rel="colorbox">
															<img alt="150x150" src="assets/images/gallery/thumb-3.jpg" />
															<div class="text">
																<div class="inner">Sample Caption on Hover</div>
															</div>
														</a>

														<div class="tools tools-bottom">
															<a href="#">
																<i class="icon-link"></i>
															</a>

															<a href="#">
																<i class="icon-paper-clip"></i>
															</a>

															<a href="#">
																<i class="icon-pencil"></i>
															</a>

															<a href="#">
																<i class="icon-remove red"></i>
															</a>
														</div>
													</li>

													<li>
														<a href="#" data-rel="colorbox">
															<img alt="150x150" src="assets/images/gallery/thumb-4.jpg" />
															<div class="text">
																<div class="inner">Sample Caption on Hover</div>
															</div>
														</a>

														<div class="tools tools-bottom">
															<a href="#">
																<i class="icon-link"></i>
															</a>

															<a href="#">
																<i class="icon-paper-clip"></i>
															</a>

															<a href="#">
																<i class="icon-pencil"></i>
															</a>

															<a href="#">
																<i class="icon-remove red"></i>
															</a>
														</div>
													</li>

													<li>
														<a href="#" data-rel="colorbox">
															<img alt="150x150" src="assets/images/gallery/thumb-5.jpg" />
															<div class="text">
																<div class="inner">Sample Caption on Hover</div>
															</div>
														</a>

														<div class="tools tools-bottom">
															<a href="#">
																<i class="icon-link"></i>
															</a>

															<a href="#">
																<i class="icon-paper-clip"></i>
															</a>

															<a href="#">
																<i class="icon-pencil"></i>
															</a>

															<a href="#">
																<i class="icon-remove red"></i>
															</a>
														</div>
													</li>

													<li>
														<a href="#" data-rel="colorbox">
															<img alt="150x150" src="assets/images/gallery/thumb-6.jpg" />
															<div class="text">
																<div class="inner">Sample Caption on Hover</div>
															</div>
														</a>

														<div class="tools tools-bottom">
															<a href="#">
																<i class="icon-link"></i>
															</a>

															<a href="#">
																<i class="icon-paper-clip"></i>
															</a>

															<a href="#">
																<i class="icon-pencil"></i>
															</a>

															<a href="#">
																<i class="icon-remove red"></i>
															</a>
														</div>
													</li>

													<li>
														<a href="#" data-rel="colorbox">
															<img alt="150x150" src="assets/images/gallery/thumb-1.jpg" />
															<div class="text">
																<div class="inner">Sample Caption on Hover</div>
															</div>
														</a>

														<div class="tools tools-bottom">
															<a href="#">
																<i class="icon-link"></i>
															</a>

															<a href="#">
																<i class="icon-paper-clip"></i>
															</a>

															<a href="#">
																<i class="icon-pencil"></i>
															</a>

															<a href="#">
																<i class="icon-remove red"></i>
															</a>
														</div>
													</li>

													<li>
														<a href="#" data-rel="colorbox">
															<img alt="150x150" src="assets/images/gallery/thumb-2.jpg" />
															<div class="text">
																<div class="inner">Sample Caption on Hover</div>
															</div>
														</a>

														<div class="tools tools-bottom">
															<a href="#">
																<i class="icon-link"></i>
															</a>

															<a href="#">
																<i class="icon-paper-clip"></i>
															</a>

															<a href="#">
																<i class="icon-pencil"></i>
															</a>

															<a href="#">
																<i class="icon-remove red"></i>
															</a>
														</div>
													</li>
												</ul>
											</div><!--/#pictures-->
										</div>
									</div>
								</div>
								<div class="form-actions">
									<button class="btn btn-info" type="submit">
										<i class="icon-ok bigger-110"></i>
										Save
									</button>

									&nbsp; &nbsp; &nbsp;
									<button class="btn" type="reset">
										<i class="icon-undo bigger-110"></i>
										Reset
									</button>
								</div>
							</div>
							<!--PAGE CONTENT ENDS-->
						</form>


						</div><!--/.span-->
					</div><!--/.row-fluid-->
				</div><!--/.page-content-->
