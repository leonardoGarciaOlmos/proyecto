$(document).ready(function()
{

	//+---------------------------+
	//|	 Cambia la direccion del  | 
	//|  boton de añadir pensum   |
	//+---------------------------+
	$('a.add-anchor').attr('href', base_url + 'pensum/add');


	//+-------------------------------+
	//|	 Cambia la direccion del  	  | 
	//|  boton de añadir actualizar   |
	//+-------------------------------+
	$(document).on('click', '#update', function()
	{
		var value = $(this).attr('value');

		$.ajax({
			url: base_url+'pensum/json_pensum',
			dataType: 'json',
			data: {pensum: value},
			async: false,
			type: 'POST',
			success: function(data)
			{
				if(data[0].estatus != 'PENDIENTE')
					bootbox.alert("No se puede moficar el pensum ya que su informacion fue validada");
				else
					window.location.href = base_url+'pensum/update/'+value;
			}
		});
	});
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
			objectSelect.append('<option value="'+objectValue[i].id+'">'+objectValue[i].nombre+'</option>');
		}
	}
}


/**
*	
* Envio de data por ajax	
*
* Se envia información mediante ajax especificando
* varios parametros
*
* @param 	string type 'POST' o 'GET'
* @param 	object objectData  Objeto que contiene la data a enviar
* @param 	string url Ubicación a donde se envia la data
* @param 	string stringReturn Pasa el valor por referencia
* @return 	boolean "TRUE" si todo va bien, "FALSE" si hubo error
*
*/
function ajaxFull(type, objectData, url, stringReturn)
{
	stringReturn = '';

	$.ajax({
		cache: false,
		type: type,
		data: objectData,
		url: base_url + url,
		success: function(object)
		{ 
			stringReturn = object;
		},
		error: function(error)
		{ 
			stringReturn = error;
		}
	});

	return true;
}


/**
*	
* Envio de data por ajax	
*
* Se envia información mediante ajax especificando
* varios parametros y vuelve en formato JSON
*
* @param 	string type 'POST' o 'GET'
* @param 	object objectData  Objeto que contiene la data a enviar
* @param 	string url Ubicación a donde se envia la data
* @param 	Object objectReturn Pasa el valor por referencia
* @return 	boolean "TRUE" si todo va bien, "FALSE" si hubo error
*
*/
function ajaxJson(type, objectData, url, objectReturn)
{
	stringReturn = '';

	$.ajax({
		cache: false,
		type: type,
		data: objectData,
		dataType: 'json',
		url: base_url + url,
		success: function(object)
		{ 
			stringReturn = object;
			return true; 
		},
		error: function(error)
		{ 
			stringReturn = error;
			return false; 
		}
	});
}