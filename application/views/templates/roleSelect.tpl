<link rel="stylesheet" href={$asset|cat:"/chosen/chosen.min.css"}>
<select id="roles">
	{foreach from=$roles item=role}
		<option value={$role.id}>{$role.name}</option>
	{/foreach}
</select>


