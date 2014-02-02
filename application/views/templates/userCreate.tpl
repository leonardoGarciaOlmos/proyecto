<div id="message-box" class="span12"></div>
<div id="ajax_list">
<div class="span12">
{if $user neq ''}{$user = $user->get('all')}{/if}
<form class="form-horizontal form-menu" id="form-consult" data-ajax="{$ajax}" data-ajax-validate="{$ajax_validate}">
	<div class="accordion"> <!--  id="accordion2" para que sea padre -->
		<!-- user -->
		<div class="accordion-group">
			<div class="accordion-heading">
				<a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="#collapseOne">
					Usuario
				</a>
			</div>
			<div id="collapseOne" class="accordion-body collapse in">
				<div class="accordion-inner">
					<div class="control-group">
						<label class="control-label" for="username">* Usuario:</label>
						<div class="controls">
							<input type="text" id="username" name="username" value="{if $user neq ''}{$user.login}{/if}" placeholder="Usuario">
						</div>
					</div>
					<div class="control-group">
						<label class="control-label" for="inputPassword">* Contraseña:</label>
						<div class="controls">
							<input type="password" id="inputPassword" name="inputPassword" placeholder="Contraseña">
						</div>
					</div>
					<div class="control-group">
						<label class="control-label" for="inputPasswordConfirm">* Confirmación Contraseña:</label>
						<div class="controls">
							<input type="password" id="inputPasswordConfirm" name="inputPasswordConfirm" placeholder="Confirmación Contraseña">
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- /user -->
		<!-- Datos Adicionales -->
		<div class="accordion-group">
			<div class="accordion-heading">
				<a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="#collapseThree">
					Datos Adicionales
				</a>
			</div>
			<div id="collapseThree" class="accordion-body collapse">
				<div class="accordion-inner">
					<div class="control-group">
						<label class="control-label" for="inputNombre">* Nombre:</label>
						<div class="controls">
							<input type="text" id="inputNombre" name="inputNombre" value="{if $user neq ''}{$user.name}{/if}" placeholder="Nombre">
						</div>
					</div>
					<div class="control-group">
						<label class="control-label" for="inputApellido">* Apellido:</label>
						<div class="controls">
							<input type="text" id="inputApellido" name="inputApellido" value="{if $user neq ''}{$user.last_name}{/if}" placeholder="Apellido">
						</div>
					</div>
					<div class="control-group">
						<label class="control-label" for="inputEmail">* Email:</label>
						<div class="controls">
							<input type="email" id="inputEmail" name="inputEmail" value="{if $user neq ''}{$user.email}{/if}" placeholder="Email">
						</div>
					</div>
					<div class="control-group">
						<label  class="control-label" for="optionsRadios1">* Sexo:</label>
						<div class="controls">

							<div class="radio">
								<input type="radio" name="inputSex[]" id="optionsRadios1" value="Masculino" {if $user neq ''}{if $user.sex == 'Masculino'}CHECKED{/if}{ELSE}CHECKED{/if}>
								Masculino
							</div>
							<div class="radio">
								<input type="radio" name="inputSex[]" id="optionsRadios2" value="Femenino" {if $user neq ''}{if $user.sex == 'Femenino'}CHECKED{/if}{ELSE}{/if} >
								Femenino
							</div>
						</div>
					</div>
					<div class="control-group">
						<label  class="control-label" for="inputDate">Fecha de Nacimiento:</label>
						<div class="controls">
							<div class="input-group input-group-sm">
								<input type="text" id="inputDate" name="inputDate" value="{if $user neq ''}{$user.date_birth|date_format:'%d/%m/%Y'}{/if}" placeholder="Fecha de Nacimiento">
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- /Datos Adicionales -->
				<!-- roles -->
		<div class="accordion-group">
			<div class="accordion-heading">
				<a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="#collapseTwo">
				Roles de Sistema
				</a>
			</div>
			<div id="collapseTwo" class="accordion-body collapse">
				<div class="accordion-inner">
					{foreach from=$arraySystems item=system}
					<div class="control-group">
						<label class="control-label" for="{$system.id}Select">{$system.system}:</label>
						<div class="controls">
							<select name="inputSelect[]" id="{$system.id}Select">
								<option value="false">No posee</option>
								{foreach from=$system.roles item=rol}
									{if $rol.status == true}
										<option value="{$rol.id}" selected>{$rol.name}</option>
									{else}
										<option value="{$rol.id}">{$rol.name}</option>
									{/if}
								{/foreach}
							</select>
						</div>
					</div>
					{/foreach}
				</div>
			</div>
		</div>
		<!-- /roles  -->
	</div>
	<div class="loading hide" id="ajax-loading">Cargando, actualizando cambios...</div>
	<input type="button" value="Guardar" class="btn btn-large btn-primary submit-form">
	<input type="button" value="Guardar y volver a la lista" id="save-and-go-back-button" class="btn btn-large btn-primary">
	<input type="button" value="Cancelar" class="btn btn-large return-to-list">
</form>
</div>
</div>

<script>
	var past_controller = "{$past_controller}";
	var controller = "{$controller}";
</script>
