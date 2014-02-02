<?php /*%%SmartyHeaderCode:3040252433d158fef91-72794914%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '1a11a5a0fb8f5ab7ee1cba46436f1cf4622b284c' => 
    array (
      0 => 'application\\views\\templates\\menu.tpl',
      1 => 1380130886,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '3040252433d158fef91-72794914',
  'variables' => 
  array (
    'datos' => 0,
    'data' => 0,
    'children' => 0,
    'child' => 0,
    'value' => 0,
    'list_sistema' => 0,
    'ciPath' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.14',
  'unifunc' => 'content_52433d15ac6137_26761906',
  'cache_lifetime' => 120,
),true); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_52433d15ac6137_26761906')) {function content_52433d15ac6137_26761906($_smarty_tpl) {?><div id="message-box" class="span12"></div>
<form id="form-menu">
	<table class="table table-bordered tablesorter table-striped">
		<thead>
			<tr>
				<th class="table-url">
					<div class="text-left field-sorting " rel="id">Url</div>
				</th>
				<th class="table-nombre">
					<div class="text-left field-sorting " rel="name">Nombre</div>
				</th>
				<th class="table-icono">
					<div class="text-left field-sorting " rel="name">Icono</div>
				</th>
				<th class="table-padre">
					<div class="text-left field-sorting " rel="alias">Padre</div>
				</th>
				<th class="table-hijos">
					<div class="text-left field-sorting " rel="alias">Hijos</div>
				</th>
			</tr>
		</thead>
		<tbody>
						<tr class="">
				<td class="">
					<div class="text-left url" data-id="1" data-url="mapa/">
						mapa/
						<input name="id[]" type="hidden" value="1">
						<input name="url[]" type="hidden" value="mapa/">
					</div>
				</td>
				<td class="">
					<div class="text-left"><input name="name[]" type="text" value="Mapas"></div>
				</td>
				<td class="">
					<div class="text-left">
						<div class="chosen-select-div">
							<select name="icono[]" data-placeholder="Elegir el icono..." class="chosen-select" tabindex="2">
								<option value=""></option>
																	<option selected>icon-question-sign</option>
															</select>
						</div>
						<span class="chosen-select-button">
															<button><i class="icon-question-sign"></i></button>
													</span>
					</div>
				</td>
				<td class="">
					<div class="text-center">
																					<input type="checkbox" name="check[]" id="mapa/" value="1" data-father="1" data-url="mapa/" checked>
																		</div>
				</td>
				<td class="">
					<div class="text-left">
						<div class="controls">
																																																							<input type="text" name="hijos[]" id="url1" placeholder="Urls Hijos" value="mapa/insertar,mapa/crear,mapa/modificar"  class="autocomplete" data-child="1"/>
						</div>
					</div>
				</td>
			</tr>
						<tr class="">
				<td class="">
					<div class="text-left url" data-id="2" data-url="mapa/insertar">
						mapa/insertar
						<input name="id[]" type="hidden" value="2">
						<input name="url[]" type="hidden" value="mapa/insertar">
					</div>
				</td>
				<td class="">
					<div class="text-left"><input name="name[]" type="text" value="Mapa Insertar"></div>
				</td>
				<td class="">
					<div class="text-left">
						<div class="chosen-select-div">
							<select name="icono[]" data-placeholder="Elegir el icono..." class="chosen-select" tabindex="2">
								<option value=""></option>
															</select>
						</div>
						<span class="chosen-select-button">
													</span>
					</div>
				</td>
				<td class="">
					<div class="text-center">
													<input type="checkbox" name="check[]" id="mapa/insertar" value="2" data-father="2" data-url="mapa/insertar" >
											</div>
				</td>
				<td class="">
					<div class="text-left">
						<div class="controls">
																																																																			<input type="text" name="hijos[]" id="url2" placeholder="Urls Hijos" value=""  class="autocomplete" data-child="2"/>
						</div>
					</div>
				</td>
			</tr>
						<tr class="">
				<td class="">
					<div class="text-left url" data-id="3" data-url="mapa/modificar">
						mapa/modificar
						<input name="id[]" type="hidden" value="3">
						<input name="url[]" type="hidden" value="mapa/modificar">
					</div>
				</td>
				<td class="">
					<div class="text-left"><input name="name[]" type="text" value="Mapa Modificar"></div>
				</td>
				<td class="">
					<div class="text-left">
						<div class="chosen-select-div">
							<select name="icono[]" data-placeholder="Elegir el icono..." class="chosen-select" tabindex="2">
								<option value=""></option>
															</select>
						</div>
						<span class="chosen-select-button">
													</span>
					</div>
				</td>
				<td class="">
					<div class="text-center">
													<input type="checkbox" name="check[]" id="mapa/modificar" value="3" data-father="3" data-url="mapa/modificar" >
											</div>
				</td>
				<td class="">
					<div class="text-left">
						<div class="controls">
																																																																			<input type="text" name="hijos[]" id="url3" placeholder="Urls Hijos" value=""  class="autocomplete" data-child="3"/>
						</div>
					</div>
				</td>
			</tr>
						<tr class="">
				<td class="">
					<div class="text-left url" data-id="13" data-url="mapa/crear">
						mapa/crear
						<input name="id[]" type="hidden" value="13">
						<input name="url[]" type="hidden" value="mapa/crear">
					</div>
				</td>
				<td class="">
					<div class="text-left"><input name="name[]" type="text" value="Mapa Crear"></div>
				</td>
				<td class="">
					<div class="text-left">
						<div class="chosen-select-div">
							<select name="icono[]" data-placeholder="Elegir el icono..." class="chosen-select" tabindex="2">
								<option value=""></option>
															</select>
						</div>
						<span class="chosen-select-button">
													</span>
					</div>
				</td>
				<td class="">
					<div class="text-center">
													<input type="checkbox" name="check[]" id="mapa/crear" value="13" data-father="13" data-url="mapa/crear" >
											</div>
				</td>
				<td class="">
					<div class="text-left">
						<div class="controls">
																																																																			<input type="text" name="hijos[]" id="url13" placeholder="Urls Hijos" value=""  class="autocomplete" data-child="13"/>
						</div>
					</div>
				</td>
			</tr>
						<tr class="">
				<td class="">
					<div class="text-left url" data-id="14" data-url="cantv/">
						cantv/
						<input name="id[]" type="hidden" value="14">
						<input name="url[]" type="hidden" value="cantv/">
					</div>
				</td>
				<td class="">
					<div class="text-left"><input name="name[]" type="text" value="Cantv"></div>
				</td>
				<td class="">
					<div class="text-left">
						<div class="chosen-select-div">
							<select name="icono[]" data-placeholder="Elegir el icono..." class="chosen-select" tabindex="2">
								<option value=""></option>
																	<option selected>icon-phone</option>
															</select>
						</div>
						<span class="chosen-select-button">
															<button><i class="icon-phone"></i></button>
													</span>
					</div>
				</td>
				<td class="">
					<div class="text-center">
																					<input type="checkbox" name="check[]" id="cantv/" value="14" data-father="14" data-url="cantv/" checked>
																		</div>
				</td>
				<td class="">
					<div class="text-left">
						<div class="controls">
																																																																														<input type="text" name="hijos[]" id="url14" placeholder="Urls Hijos" value="cantv/consultar,cantv/reporte"  class="autocomplete" data-child="14"/>
						</div>
					</div>
				</td>
			</tr>
						<tr class="">
				<td class="">
					<div class="text-left url" data-id="15" data-url="cantv/consultar">
						cantv/consultar
						<input name="id[]" type="hidden" value="15">
						<input name="url[]" type="hidden" value="cantv/consultar">
					</div>
				</td>
				<td class="">
					<div class="text-left"><input name="name[]" type="text" value="Cantv Consultar"></div>
				</td>
				<td class="">
					<div class="text-left">
						<div class="chosen-select-div">
							<select name="icono[]" data-placeholder="Elegir el icono..." class="chosen-select" tabindex="2">
								<option value=""></option>
															</select>
						</div>
						<span class="chosen-select-button">
													</span>
					</div>
				</td>
				<td class="">
					<div class="text-center">
													<input type="checkbox" name="check[]" id="cantv/consultar" value="15" data-father="15" data-url="cantv/consultar" >
											</div>
				</td>
				<td class="">
					<div class="text-left">
						<div class="controls">
																																																																			<input type="text" name="hijos[]" id="url15" placeholder="Urls Hijos" value=""  class="autocomplete" data-child="15"/>
						</div>
					</div>
				</td>
			</tr>
						<tr class="">
				<td class="">
					<div class="text-left url" data-id="16" data-url="cantv/reporte">
						cantv/reporte
						<input name="id[]" type="hidden" value="16">
						<input name="url[]" type="hidden" value="cantv/reporte">
					</div>
				</td>
				<td class="">
					<div class="text-left"><input name="name[]" type="text" value="Cantv Reporte"></div>
				</td>
				<td class="">
					<div class="text-left">
						<div class="chosen-select-div">
							<select name="icono[]" data-placeholder="Elegir el icono..." class="chosen-select" tabindex="2">
								<option value=""></option>
															</select>
						</div>
						<span class="chosen-select-button">
													</span>
					</div>
				</td>
				<td class="">
					<div class="text-center">
													<input type="checkbox" name="check[]" id="cantv/reporte" value="16" data-father="16" data-url="cantv/reporte" >
											</div>
				</td>
				<td class="">
					<div class="text-left">
						<div class="controls">
																																																																			<input type="text" name="hijos[]" id="url16" placeholder="Urls Hijos" value=""  class="autocomplete" data-child="16"/>
						</div>
					</div>
				</td>
			</tr>
					</tbody>
	</table>
	<div class="loading hide" id="ajax-loading">Cargando, actualizando cambios...</div>
	<input type="button" value="Guardar" class="btn btn-large btn-primary submit-form">
	<input type="button" value="Guardar y volver a la lista" id="save-and-go-back-button" class="btn btn-large btn-primary">
	<input type="button" value="Cancelar" class="btn btn-large return-to-list">
</form>

<script>
	var list_sistema = "http://192.168.5.3/adsi_v1/sistema";
</script>


<link rel="stylesheet" href="http://192.168.5.3/adsi_v1/assets/css/chosen.css">
<link rel="stylesheet" href="http://192.168.5.3/adsi_v1/assets/grocery_crud/themes/twitter-bootstrap/css/style.css">

<style type="text/css">
	div.text-left > .chosen-select-div{
		display: inline-block;
	}
	span.chosen-select-button > button{
		font-size: 1em;
	}

	/*.tablesorter {
		max-width:100px;
	}*/
</style>





<?php }} ?>