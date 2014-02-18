$(document).ready(function()
{
	var button = '<a class="btn" data-toggle="modal" href="'+base_url+'seminario/add_seminario_pensum">';
		button+= '<i class="icon-dashboard"></i>';
		button+= 'Registrar Seminario';
		button+= '</a>';

	$('#options-content').append(button);
	
});


/* FUNCIONES GENRALES */


/**
*	
* Construir un tag <select>	
*
* Según el pase de parametro y opción que haya seleccionado
* se construye el select con la información o queda
* sin niguna opción
*
* @param 	object objectSelect Objeto del arbol DOM eg.$('select#select')
* @param 	object objectValue  Objeto que contiene la data a insertar en el select
* @param 	string opc 			Cadena 'add' aderir la data. 'null' no adiere nada
* @param 	string msj 			Cadena indica el mensaje a mostrar en la primera opción
* @return 	none
*
*/
function buildSelect(objectSelect, objectValue, opc, msj)
{
	if(opc === 'null')
	{	
		objectSelect.html('<option value="">...</option>');
		objectSelect.attr('disabled', 'disabled');
	}else if(opc === 'add')
	{
		var length = objectValue.length;

		objectSelect.removeAttr('disabled');
		objectSelect.html('<option value="">' +msj+ '</option>');
		for(var i = 0; i < length; i++)
		{
			if(typeof(objectValue[i].id) == "undefined")
				objectSelect.append('<option value="'+objectValue[i].codigo+'">'+objectValue[i].nombre+'</option>');
			else
				objectSelect.append('<option value="'+objectValue[i].id+'">'+objectValue[i].nombre+'</option>');
		}
	}
}