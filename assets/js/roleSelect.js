$(document).ready(function(){

	//Declaracion de variables
	var domain = base_url;
	var roleId = $("input[name='role_id']").val();
	var systemId = $("input[name='system_id']").val();
	var url = '';
	var tr;
	var operations;
	
	// Verificar si recibio roleId por parametro para cargar los roles en los checkbox
	if(roleId){
		url = domain+'role/getUrlsByRole/'+roleId+'/'+systemId;
		$.getJSON(url, function(response){
			$.each(response, function(key, value){
				// Seleccionar tr que contiene url actual
				tr = $("#"+value.id);
				operations = value.operations.split(",");
				$.each(operations, function(operationkey, operationValue){
					$(tr).find("td input."+operationValue).prop('checked', true);
				});
			});
		});
	} 

	$("#roles").chosen();
	//Flujo cuando selecciona un rol
	$("#roles").change(function(){
		$(":checkbox").prop('checked', false);
		roleId = $(this).val();
		url = domain+'role/getUrlsByRole/'+roleId+'/'+systemId;
		$.getJSON(url, function(response){
			// Response contiene el arreglo de urls que sera procesado con los checkbox
			$.each(response, function(key, value){
				// Seleccionar tr que contiene url actual
				tr = $("#"+value.id);
				operations = value.operations.split(",");
				$.each(operations, function(operationkey, operationValue){
					$(tr).find("td input."+operationValue).prop('checked', true);
				});
			});
		});
	});
});