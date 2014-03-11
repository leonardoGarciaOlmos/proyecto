<div class="page-header position-relative">
	<h1>
		Plan de Evaluacion
		<small>
			<i class="icon-double-angle-right"></i>
			Docentes de IUSPO
		</small>
	</h1>
</div>
<form class="form-horizontal">
	<div class="control-group">
		<div class="controls">
			<span class="help-inline">Docente</span>
			<select id="docente" class="span5">
				<option value=""></option>
				{foreach key=key from=$prof item=pro}
					<option value="{$pro.ci}" nombre="{$pro.nombre} {$pro.apellido}">{$pro.ci} - {$pro.nombre} {$pro.apellido}</option>
				{/foreach}
			</select>
			<span class="help-inline">Materias</span>
			<select id="materias" class="span5">
				<!-- <option value=""> ANS0133 - Ansalisis Social</option> -->
			</select>
		</div>
	</div>
</form>
<div class="span12 well center">
	<p class="lead">
		Ingrese la informacion necesaria para mostrar resultados
	</p>
	<div class="row-fluid">
		<div id="par" class="span6 widget-container-span ui-sortable">
		</div>

		<div id="impar" class="span6 widget-container-span">
		</div>
	</div>
</div>

<div id="prueba" class="widget-box" style="display:none" >
	<div class="widget-header widget-hea1der-small header-color-dark">
		<h6 class="info-prof"></h6>

		<div class="widget-toolbar">
			<a href="#" data-action="collapse">
				<i class="icon-chevron-up"></i>
			</a>
		</div>
	</div>

	<div class="widget-body">
		<table class="table table-bordered table-striped">
			<thead>
				<tr>
					<th class="center">
						<i class="icon-caret-right blue"></i>
						Orden
					</th>

					<th class="center">
						<i class="icon-caret-right blue"></i>
						Nombre
					</th>

					<th class="hidden-phone center">
						<i class="icon-caret-right blue"></i>
						Valor
					</th>
				</tr>
			</thead>

			<tbody class="body">
				<!-- <tr>
					<td class="center">1</td>

					<td class="center">Taller Grupal</td>

					<td class="center"><span class="label label-warning arrowed arrowed-right">20%</span></td>
				</tr> -->
				
			</tbody>
		</table>
	</div>	
</div>	



