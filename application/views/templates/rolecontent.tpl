

		{foreach from=$styles item=stylePath}
			<link rel="stylesheet" href={$stylePath}>
		{/foreach}
			<div class="row-fluid">
				<div class="span6">
					<table class="table table-bordered table-hover">
				<thead>
					<th>
						
					</th>
					<th>
						Crear
					</th>
					<th>
						Leer
					</th>
					<th>
						Actualizar
					</th>
					<th>
						Borrar
					</th>
					<th>
					</th>
				</thead>

				<tbody>
					<tr class="global" data-type="controller">
						<td>

						</td>
						<td>
							<input type="checkbox" class="C">
						</td>
						<td>
							<input type="checkbox" class="R">
						</td>
						<td>
							<input type="checkbox" class="U">
						</td>
						<td>
							<input type="checkbox" class="D">
						</td>
						<td>
							<input type="checkbox" class="all">
						</td>
					</tr>
					{foreach from=$items item=item}
						<tr class="controller" data-controller={$item.name}>
							<td style="cursor:pointer">
								<i class="icon-chevron-right"></i>
								{$item.name}
							</td>
							<td>
								<input type="checkbox" class="C">
							</td>
							<td>
								<input type="checkbox" class="R">
							</td>
							<td>
								<input type="checkbox" class="U">
							</td>
							<td>
								<input type="checkbox" class="D">
							</td>
							<td>
								<input type="checkbox" class="all">
							</td>
						</tr>
						{assign var=subItems value=$item.subItems}
						{foreach from=$subItems item=subItem}
							<tr id={$subItem.id} class="url" data-controller={$item.name}>
								<td class="indentedUrl">
									{$subItem.name}
								</td>
								{assign "operationType" "C-"}
								<td>
									{if isset($subItem.operations.C)}
										<input type="checkbox" class="C" name="urls[]" value={$operationType|cat:$subItem.id}>
									{else}
										<input type="checkbox" class="dis" value={$operationType|cat:$subItem.id} disabled>
									{/if}
								</td>
								{assign "operationType" "R-"}
								<td>
									{if isset($subItem.operations.R)}
										<input type="checkbox" class="R" name="urls[]" value={$operationType|cat:$subItem.id}>
									{else}
										<input type="checkbox" class="dis" value={$operationType|cat:$subItem.id} disabled>
									{/if}
								</td>
								{assign "operationType" "U-"}
								<td>
									{if isset($subItem.operations.U)}
										<input type="checkbox" class="U" name="urls[]" value={$operationType|cat:$subItem.id}>
									{else}
										<input type="checkbox" class="dis" value={$operationType|cat:$subItem.id} disabled>
									{/if}
								</td>
								{assign "operationType" "D-"}
								<td>
									{if isset($subItem.operations.D)}
										<input type="checkbox" class="D" name="urls[]" value={$operationType|cat:$subItem.id}>
									{else}
										<input type="checkbox" class="dis" value={$operationType|cat:$subItem.id} disabled>
									{/if}
								</td>
								<td>
									<input type="checkbox" class="all">
								</td>
							</tr>
						{/foreach}
					{/foreach}
				</tbody>
			</table>
				</div>
			</div>
		
