<div class="row-fluid">
	<h3 class="header smaller lighter green">Consulta de Auditorias Control de Estudios IUSPO</h3>
	<div class="table-header">
		Ultimos procesos ejecutados en el sistema.
	</div>
	<table id="table" class="table table-striped table-bordered table-hover">
		<thead>
			<tr>
				<th class="center">Id Usuario</th>
				<th class="center">Nombre</th>
				<th class="center">Apellido</th>
				<th class="center">Operacion</th>
				<th class="center">Fecha</th>
				<th class="center">Tipo de Operacion</th>
				<th class="center">IP</th>
			</tr>
		</thead>

		<tbody>

                
                 {foreach key=key from=$audit item=datos} 
                 <tr>
                    <td class="center">{$datos.id_user}</td>
                    <td class="center">{$datos.nombre}</td>
                    <td class="center">{$datos.apellido}</td>
                    <td class="center">{$datos.description}</td>
                    <td class="center">{$datos.date}</td>
                    {if $datos.operation == "Eliminar"}
						<td class="center"><span class="label label-important arrowed-in arrowed-in-right">{$datos.operation}</span></td>
                    {/if}
                    {if $datos.operation == "Agregar"}
						<td class="center"><span class="label label-success arrowed-in arrowed-in-right">{$datos.operation}</span></td>
                    {/if}
                    {if $datos.operation == "Consultar"}
						<td class="center"><span class="label label-info arrowed-in arrowed-in-right">{$datos.operation}</span></td>
                    {/if}
                    {if $datos.operation == "Editar"}
						<td class="center"><span class="label label-warning arrowed-in arrowed-in-right">{$datos.operation}</span></td>
                    {/if}
                    <td class="center">{$datos.client_ip}</td>
                </tr>   
                {/foreach}   
                
                
		
		</tbody>

		<tfoot>
			
		</tfoot>
		</table>
		
</div>

