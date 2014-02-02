<div id="message-box" class="span12"></div>
<form id="form-consult" data-ajax="{$controller}/ajax" data-ajax-validate="{$controller}/ajaxValidate">
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
			{foreach from=$datos item=data}
			<tr class="">
				<td class="">
					<div class="text-left url" data-id="{$data.id}" data-url="{$data.url}">
						{$data.url}
						<input name="id[]" type="hidden" value="{$data.id}">
						<input name="url[]" type="hidden" value="{$data.url}">
					</div>
				</td>
				<td class="">
					<div class="text-left"><input name="name[]" type="text" value="{$data.name}"></div>
				</td>
				<td class="">
					<div class="text-left">
						<div class="chosen-select-div">
							<select name="icono[]" data-placeholder="Elegir el icono..." class="chosen-select" tabindex="2">
								<option value=""></option>
								{if $data.icon_class neq ""}
									<option value="{$data.icon_class}" selected>{$data.icon_class}</option>
								{/if}
							</select>
						</div>
						<span class="chosen-select-button">
							{if $data.icon_class neq ""}
								<button><i class="{$data.icon_class}"></i></button>
							{/if}
						</span>
					</div>
				</td>
				<td class="">
					<div class="text-center">
						{if $data.parent_id eq 0 }
							{if $data.parent_id neq null }
								<input type="checkbox" name="check[]" id="{$data.url}" value="{$data.id}" data-father="{$data.id}" data-url="{$data.url}" checked>
							{else}
								<input type="checkbox" name="check[]" id="{$data.url}" value="{$data.id}" data-father="{$data.id}" data-url="{$data.url}" >
							{/if}
						{else}
							<input type="checkbox" name="check[]" id="{$data.url}" value="{$data.id}" data-father="{$data.id}" data-url="{$data.url}" >
						{/if}
					</div>
				</td>
				<td class="">
					<div class="text-left">
						<div class="controls">
							{$value=''}
							{foreach from=$children item=child}
								{$value=''}
								{if $data.id eq $child.parent_id}
									{$value = $child.url}
									{break}
								{/if}
							{/foreach}
							<input type="text" name="hijos[]" id="url{$data.id}" placeholder="Urls Hijos" value="{$value}"  class="autocomplete" data-child="{$data.id}"/>
						</div>
					</div>
				</td>
			</tr>
			{/foreach}
		</tbody>
	</table>
	<div class="loading hide" id="ajax-loading">Cargando, actualizando cambios...</div>
	<input type="button" value="Guardar" class="btn btn-large btn-primary submit-form">
	<input type="button" value="Guardar y volver a la lista" id="save-and-go-back-button" class="btn btn-large btn-primary">
	<input type="button" value="Cancelar" class="btn btn-large return-to-list">
</form>

<script>
	var past_controller = "{$past_controller}";
	var controller = "{$controller}";

</script>


<link rel="stylesheet" href="{$ciPath}assets/css/chosen.css">
<link rel="stylesheet" href="{$ciPath}assets/grocery_crud/themes/twitter-bootstrap/css/style.css">

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





