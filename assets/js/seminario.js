$(document).ready(function()
{

	$seminario  	  = $('select#seminario');
	$materia_pensum   = $('select#mat_has_pensum');
	$addSeminario	  = $('#addSeminario');
	$accordionSem     = $('div#accordion-semestre');
	$tableSeminario   = $('#tableSeminario');

	//+----------------------------------------------------------+
	//|   INICIALIZAR SELECT                                	 |
	//+----------------------------------------------------------+
	//|   se inicializan los select con los valores respectivos  |
	//+----------------------------------------------------------+
	$.getJSON(base_url+'pensum/json_seminario', function(data)
	{ buildSelect($seminario, data, 'add', 'Seleccionar Seminario'); });


	//+----------------------------------------------------------+
	//|   AÑADIR SEMINARIO                                  	 |
	//+----------------------------------------------------------+
	//|   Se agrega el seminario al pensum y la materia 	     |
	//+----------------------------------------------------------+
	$addSeminario.bind('click', function()
	{
		var MAT = $materia_pensum.val();
		var SEM = $seminario.val();
		var nameMAT = '';
		var nameSEM = '';
		var objectSEM = new Object();

		if(MAT == '' || SEM == '')
		{ bootbox.alert('Debe seleccionar un seminario y una materia'); }	
		else if(MAT != '' && SEM != '')
		{
			objectSEM.idMAT   = MAT;
			objectSEM.nameMAT = $materia_pensum.find('option[value="'+MAT+'"]').html();
			objectSEM.idSEM   = SEM;
			objectSEM.nameSEM = $seminario.find('option[value="'+SEM+'"]').html();
			$('select#mat_has_pensum option[value=""]').attr("selected",true);
			$('select#seminario option[value=""]').attr("selected",true);
			addSeminario($accordionSem, objectSEM);
		}
	});


	//+----------------------------------------------------------+
	//|   ELIMINAR SEMINARIO                                  	 |
	//+----------------------------------------------------------+
	//|   Se elimina el seminario del pensum y materia 		     |
	//+----------------------------------------------------------+
	$(document).on('click', 'button#eliSeminario', function()
	{
		var $tablaTr  	  = $(this).parent().parent();
		var seminarioId   = $(this).val();
		var materiaCodigo = $(this).attr('name');

		$.ajax(
		{
			url: base_url+'pensum/borrar_seminario',
			type: "POST",
			data: {seminario_id: seminarioId, pensum_id: $pensum.val(), materia_codigo: materiaCodigo},
			success: function()
			{ 
				$tablaTr.fadeOut(500, function()
				{
					$(this).remove();
				}); 
			},
			error: function(error)
			{ alert("Problema al intentar eliminar"); }
		});
	});


	//+-------------------------+
	//|			FUNCIONES		|
	//+-------------------------+
	function buildSelect(objectSelect, objectValue, opc, msj)
	{
		if(opc === null)
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


	function addSeminario(labelTreeDOM, object)
	{
		var search = false;
		var countLabel = 0;
		var panel =  '<div class="panel panel-default">';
		panel += '<div class="panel-heading">';
		panel += '<h3 class="panel-title">';
		panel += '<a class="accordion-toggle collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapse'+object.idMAT+'">';
		panel += '<i class="bigger-110 icon-angle-right" data-icon-hide="icon-angle-down" data-icon-show="icon-angle-right"></i>';
		panel += '&nbsp;'+object.nameMAT;
		panel += '</a>';
		panel += '</h3>';
		panel += '</div>';

		panel += '<div class="panel-collapse collapse" id="collapse'+object.idMAT+'" style="height: 0px;">';
		panel += '<div class="panel-body">';
        panel += '<div class="span12">';
        panel += '<table class="table" id="tableSeminario">';
        panel += '<tr>';
        panel += '<td><h5>Codigo</h5></td>';
        panel += '<td><h5>Seminario</h5></td>';
        panel += '<td></td>';
        panel += '</tr>';
        panel += '</table>';
        panel += '</div>';
		panel += '</div>';
		panel += '</div>';
		panel += '</div>';


		labelTreeDOM.find('div.panel-heading').each(function()
		{
			var idLabel = $(this).parent().find('div.panel-collapse').attr('id');
			++countLabel;

			if(idLabel == 'collapse'+object.idMAT)
			{	
				search = true;
				return false;
			}else
			{ 
				search = false; 
			}
		});

		if(countLabel == 0)
		{ 
			labelTreeDOM.html(panel).promise().done(function()
			{
				labelTreeDOM.find('a.accordion-toggle[href="#collapse'+object.idMAT+'"]').attr('class', 'accordion-toggle');
				labelTreeDOM.find('div.panel-collapse[id="collapse'+object.idMAT+'"]').attr('class', 'panel-collapse in collapse');
				labelTreeDOM.find('div.panel-collapse[id="collapse'+object.idMAT+'"]').css('height', 'auto');
				add_sem_has_mat(object.idSEM, object.nameSEM, object.idMAT, $('div#collapse'+object.idMAT+' div table#tableSeminario'));
			});
		}else
		{
			if(search == false)
			{ 
				labelTreeDOM.append(panel).promise().done(function()
				{
					labelTreeDOM.find('a.accordion-toggle[href="#collapse'+object.idMAT+'"]').attr('class', 'accordion-toggle');
					labelTreeDOM.find('div.panel-collapse[id="collapse'+object.idMAT+'"]').attr('class', 'panel-collapse in collapse');
					labelTreeDOM.find('div.panel-collapse[id="collapse'+object.idMAT+'"]').css('height', 'auto');
					add_sem_has_mat(object.idSEM, object.nameSEM, object.idMAT, $('div#collapse'+object.idMAT+' div table#tableSeminario'));
				})
			}else
			{
				labelTreeDOM.find('a.accordion-toggle[href="#collapse'+object.idMAT+'"]').attr('class', 'accordion-toggle');
				labelTreeDOM.find('div.panel-collapse[id="collapse'+object.idMAT+'"]').attr('class', 'panel-collapse in collapse');
				labelTreeDOM.find('div.panel-collapse[id="collapse'+object.idMAT+'"]').css('height', 'auto');
				add_sem_has_mat(object.idSEM, object.nameSEM, object.idMAT, $('div#collapse'+object.idMAT+' div table#tableSeminario'));
			}

		}	
	}


	function add_sem_has_mat(codigo, seminario, materia, labelTreeDOM)
	{
		$.ajax({
				cache: false,
				type: 'POST',
				data: {materia_codigo: materia, seminario_id: codigo, pensum_id: $pensum.val()},
				dataType: "json",
				url: base_url + 'pensum/json_insert_seminario',
				success: function(object)
				{
					if(object)
					{
						var labelTable  = '<tr>';
						labelTable += '<td>'+codigo+'</td>';
						labelTable += '<td>'+seminario+'</td>';
						labelTable += '<td><button class="btn btn-mini btn-danger" name="'+materia+'" id="eliSeminario" type="button" value="'+codigo+'"><i class="icon-remove-sign"></i></td>';
						labelTable += '</tr>';

						labelTreeDOM.append(labelTable);
					}else
					{
						var labelTable  = '<tr class="error">';
						labelTable += '<td style="text-align:center;" colspan="3"><h5>Problemas al registrar seminario en materia</h5></td>';
						labelTable += '</tr>';
						labelTreeDOM.append(labelTable);
						labelTreeDOM.find("tbody tr.error").fadeOut(2500, function()
						{
							$(this).remove();
						});
					}
				},
				error: function()
				{
					var labelTable  = '<tr class="error">';
					labelTable += '<td style="text-align:center;" colspan="3"><h5>Problemas al registrar seminario en materia</h5></td>';
					labelTable += '</tr>';
					labelTreeDOM.append(labelTable);
					labelTreeDOM.find("tbody tr.error").fadeOut(2500, function()
					{
						$(this).remove();
					});
				}
			});
	}

});