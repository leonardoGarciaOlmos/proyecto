<div class="span12">
	<div class="widget-box">
		<div class="widget-header header-color-blue2">
			<h4 class="lighter smaller">Perfil del Docente</h4>
		</div>

		<i id="ci" style="display:none" ci="{$userData['ci']}"></i>

		<div class="widget-body">

			<div class= "widget-main padding-8">
				<div class="profile-user-info profile-user-info-striped">
					<div class="profile-info-row">
						<div class="profile-info-name"> Usuario </div>

						<div class="profile-info-value">
							<span class="editable editable-click" id="username">{$userData["nombre"]} {$userData["apellido"]}</span>
						</div>
					</div>

					<div class="profile-info-row">
						<div class="profile-info-name"> Direccion </div>

						<div class="profile-info-value">
							<i class="icon-map-marker light-orange bigger-110"></i>
							<span class="editable editable-click" id="country">{$userData["direccion"]}</span>
						</div>
					</div>

					<div class="profile-info-row">
						<div class="profile-info-name"> Fecha Nac. </div>

						<div class="profile-info-value">
							<span class="editable editable-click" id="age">{$userData["fecha_nac"]}</span>
						</div>
					</div>

					<div class="profile-info-row">
						<div class="profile-info-name"> E-mail </div>

						<div class="profile-info-value">
							<span class="editable editable-click" id="signup">{$userData["correo"]}</span>
						</div>
					</div>

					<div class="profile-info-row">
						<div class="profile-info-name"> Expediente </div>

						<div class="profile-info-value">
							<span class="editable editable-click" id="login">{$userData["expediente"]}</span>
						</div>
					</div>

					<div class="profile-info-row">
						<div class="profile-info-name"> Instruccion </div>

						<div class="profile-info-value">
							<span class="editable editable-click" id="about">{$userData["nivel_instruccion"]}.</span>
						</div>
					</div>
				</div>
			</div>

			<div class="page-header">
				<h1>
					Perfil
					<small>
						<i class="icon-double-angle-right"></i>
						Informacion Academica
					</small>
				</h1>
			</div>
		
			<div class="row-fluid">
				<div class="span6">
					<div class="alert alert-block alert-success" style="display:none" id="alert1">
						    <button type="button" class="close" data-dismiss="alert">
						        <i class="icon-remove"></i>
						    </button>
						    <p><strong>
						            <i class="icon-ok"></i>
						            Listo!
						        </strong>
						        La informacion se agrego con exito en el perfil</p>
						</div>

						<form class="" role="form" style="padding-left: 80px; padding-right: 80px;">
							<div class="space-4"></div>

								<div class="form-group">
									<label for="carrera">Carrera</label>

									<select id="carrera">
										<option value="">&nbsp;</option>
										{foreach key=key from=$carreras item=car}
											<option value="{$car.id}" carrera="{$car.nombre}">{$car.nombre}</option>
										{/foreach}
									</select>

									<label class="col-sm-3 control-label" for="materias" style="padding-right: 10px">Materia</label>

									<div class="col-sm-9">
										<select multiple class="chosen-select tag-input-style" id="materias" data-placeholder="Escoja su Materia">

										</select>
									</div>
								</div>

						</form>
						<div class="clearfix form-actions">
							<div class="col-md-offset-3 col-md-9">
								<button class="btn btn-info" type="button" id="guardar">
									<i class="icon-ok bigger-110"></i>
									Guardar
								</button>
							</div>
						</div>
				</div>

				<div class="span6">
					<div class="space-4"></div><div class="space-4"></div>
						<div class="alert alert-block alert-success" style="display:none" id ="alert2">
						    <button type="button" class="close" data-dismiss="alert">
						        <i class="icon-remove"></i>
						    </button>
						    <p><strong>
						            <i class="icon-ok"></i>
						            Listo!
						        </strong>
						        La informacion se elimino con exito en el perfil</p>
						</div>

						<form style="padding-left: 80px; padding-right: 80px;">
							<label for="c_materias">Multiple</label>

							<select class="form-control span12" id="c_materias" multiple="multiple">

							</select>

						</form>

						<div class="clearfix form-actions">
							<div class="col-md-offset-3 col-md-9">
								<button class="btn btn-danger" type="button" id="eliminar">
									<i class="icon-trash bigger-110"></i>
									Eliminar
								</button>
							</div>
						</div>
						
				</div>

			</div>

						


			
		</div>
	</div>



</div>








