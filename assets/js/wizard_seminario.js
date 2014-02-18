$(document).ready(function()
{

	//-- VARIBLES GLOBAL --
	var seminario = new Object();
	var selectSeminario;
	var seminario_pensum;


	//-- WIZARD --

	//+------------------------------------+
	//|	 Asignar evento a los botones  	   |
	//|  del wizard del control de pasos   |
	//+------------------------------------+
	$('button#prev').on('click', function()
	{
		$('#MyWizard').wizard('previous');
	});

	$('button#next').on('click', function()
	{
		$('#MyWizard').wizard('next');
	});


	//+------------------------------------+
	//|	 Manejo de cada paso en el wizard  |
	//+------------------------------------+
	$('#MyWizard').on('change', function(e, data)
	{
		var cod_materia = "";
		var length = 0;

		switch(data.step)
		{
			case 1:

				if(data.direction == "next")
				{
					var value = $('select#select_carrera').val();

					if(value == '')
					{
						bootbox.alert('Debe seleccionar la carrera para seguir con los siguientes pasos');
						e.preventDefault();
					}else
					{
						if(typeof(seminario.pensum) == "undefined" || seminario.pensum == 0)
						{
							$.getJSON(base_url+'pensum/json_pensum_carrera_activate', {carrera: value}, function(data)
							{ 
								seminario.pensum = data[0].id;

								$.getJSON(base_url+'pensum/json_materia_semestre', { pensum: seminario.pensum }, function(data)
								{ 
									selectSeminario = data;
									buildSelect($('select#select_materia'), selectSeminario, 'add', '...'); 
								});

								$.getJSON(base_url+'seminario/json_seminario_pensum', {pensum: seminario.pensum}, function(data)
								{
									length = data.length;
									seminario_pensum = data;

									if (length == 0) 
									{ $("#accordion").html('<h3>No hay seminarios registrados</h3>'); }
									else
									{
										$("#accordion").html();
										for(var i = 0; i < length; i++)
										{
											if(cod_materia != seminario_pensum[i].materia_codigo)
											{
												var tagHTML = add_html_seminario(seminario_pensum[i].materia_codigo, seminario_pensum[i].materia_nombre, seminario_pensum);
												cod_materia = seminario_pensum[i].materia_codigo;
												$("#accordion").append(tagHTML);
											}
										}
									}								
								});
							});
							
							$('#select_departamento').attr('disabled', 'disabled');
							$('#select_carrera').attr('disabled', 'disabled');
							$('#MyWizard').on('stepclick', function(e, data){ e.preventDefault(); });
						}
					}
				}
			break;

			case 2:
				if(data.direction == "next")
				{ $('button#next').html('Finz <i class="icon-arrow-right icon-on-right"></i>'); }
			break;

			case 3:
				if(data.direction == "previous")
				{ $('button#next').html('Sign <i class="icon-arrow-right icon-on-right"></i>'); }
			break;
		}

	});


	//+----------------------------------+
	//|	 Finaliza los pasos del wisard 	 |
	//+----------------------------------+
	$('#MyWizard').on('finished', function(e, data)
	{ window.location.href = base_url+'seminario'; });



	//-- ELEMENTOS DEL DOCUMENTO --

	//+------------------------------+
	//|	 Solicita las carreras del   |
	//|  departamento seleccionado   |
	//+------------------------------+
	$('#select_departamento').on('change',function()
	{
		var value = $(this).val();

		if(value == '')
			buildSelect($('select#select_carrera'), '', 'null', '');
		else
		{
			$.getJSON(base_url+'carrera/json_carrera_depart', { id_dep: value }, function(data)
			{ buildSelect($('select#select_carrera'), data, 'add', 'Seleccionar Carrera'); });
		}
	});


	//+---------------------------------+
	//|	 Agrega el seminario al pensum  |
	//+---------------------------------+
	$('#step2').on('click', '#add_materia_has_pensum', function()
	{
		var valSeminario = $('#select_seminario').val();
		var nombreSeminario = $('#select_seminario option:selected').html();
		var valMateria = $('#select_materia').val();
		var nombreMateria = $('#select_materia option:selected').html();

		if(valSeminario == "" || valMateria == "")
			bootbox.alert('Debe seleccionar tanto la materia como el seminario para poder agregarla');
		else
		{
			var accorHTML = $("#accordion").html();

			if(accorHTML == '<h3>No hay seminarios registrados</h3>')
				$("#accordion").html('');


			if ($('div#collapse'+valMateria).length)
			{
				var table_seminario = $('div#collapse'+valMateria).find('#tableSeminario');
				var dataSeminario = "";

				$.ajax(
				{
					url: base_url+'seminario/insert_seminario_pensum',
					type: "POST",
					data: { materia: valMateria, seminario: valSeminario, pensum: seminario.pensum},
					success: function(data)
					{
						$('div#collapse'+valMateria).attr('class', 'panel-collapse in collapse');
						$('div#collapse'+valMateria).css("height", "auto");

						dataSeminario  = '<tr>';
					    dataSeminario += '<th>'+valSeminario+'</th>';
					    dataSeminario += '<th>'+nombreSeminario+'</th>';
					    dataSeminario += '<th><button class="btn btn-mini btn-danger" id="eliminarSem" type="button" value="'+valSeminario+'" materia="'+valMateria+'"><i class="icon-remove-sign"></i></th>';
					    dataSeminario += '</tr>';

					    table_seminario.append(dataSeminario);
					},
					error: function(error)
					{
						$('div#collapse'+valMateria).attr('class', 'panel-collapse in collapse');
						$('div#collapse'+valMateria).css("height", "auto");

						dataSeminario  = '<tr class="error">';
						dataSeminario += '<td style="text-align:center;" colspan="3"><h5>Problemas al registrar el seminario</h5></td>';
						dataSeminario += '</tr>';
						table_seminario.append(dataSeminario);
						table_seminario.find("tbody tr.error").fadeOut(2500, function()
						{
							$(this).remove();
						});
					}
				});

			}else
			{
				var table_seminario;
				var dataSeminario = "";

				$.ajax(
				{
					url: base_url+'seminario/insert_seminario_pensum',
					type: "POST",
					data: { materia: valMateria, seminario: valSeminario, pensum: seminario.pensum},
					success: function(data)
					{
						dataSeminario = add_html_seminario(valMateria, nombreMateria, new Array());
						$('#accordion').append(dataSeminario);

						dataSeminario  = '<tr>';
					    dataSeminario += '<th>'+valSeminario+'</th>';
					    dataSeminario += '<th>'+nombreSeminario+'</th>';
					    dataSeminario += '<th><button class="btn btn-mini btn-danger" id="eliminarSem" type="button" value="'+valSeminario+'" materia="'+valMateria+'"><i class="icon-remove-sign"></i></th>';
					    dataSeminario += '</tr>';

					    table_seminario = $('div#collapse'+valMateria).find('#tableSeminario');
					 	$('div#collapse'+valMateria).attr('class', 'panel-collapse in collapse');
						$('div#collapse'+valMateria).css("height", "auto");
					    table_seminario.append(dataSeminario);
					},
					error: function(error)
					{
						bootbox.alert('Ocurrio un error');
					}
				});
			}
		}

	});


	//+---------------------------------+
	//|	 Eliminar seminario del pensum  |
	//+---------------------------------+
	$('#step2').on('click', '#eliminarSem', function()
	{
		var $tablaTr  = $(this).parent().parent();
		var materiaId = $(this).attr('materia');
		var seminarioId = $(this).val();

		$.get(base_url+'seminario/delete_seminario_pensum', { materia: materiaId, seminario: seminarioId, pensum: seminario.pensum}, function()
		{
			$tablaTr.fadeOut(500, function()
			{ $(this).remove(); });

		}).fail(function() 
		{
			bootbox.alert("Problema al intentar eliminar");
		});
	});


	// -- FUNCIONES --

	/**
	*	
	* Añadir nueva pestaña de acordion
	*
	* Añade una pestaña en el acordion de semestres indicando el
	* número del mismo
	*
	* @param 	object tagAcordion Objeto del arbol DOM eg.$('select#select')
	* @param 	integer numSemestre Numero del semestrer a mostrar  
	* @return 	none
	*
	*/
	function add_html_seminario(codigoMateria, nomreMateria, dataSeminario)
	{

	    // Panel que indica las materia y dentro van los seminario
	    var panelAcordion = '<div class="panel panel-default">';
		panelAcordion += '<div class="panel-heading">';
		panelAcordion += '<h3 class="panel-title">';
		panelAcordion += '<a class="accordion-toggle collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapse'+codigoMateria+'">';
		panelAcordion += '<i class="bigger-110 icon-angle-right" data-icon-hide="icon-angle-down" data-icon-show="icon-angle-right"></i>';
		panelAcordion += '&nbsp;'+nomreMateria;
		panelAcordion += '</a>';
		panelAcordion += '</h3>';
		panelAcordion += '</div>';

		panelAcordion += '<div class="panel-collapse collapse" id="collapse'+codigoMateria+'" style="height: 0px;">';
		panelAcordion += '<div class="panel-body">';
	    panelAcordion += '<div class="span12">';

	    panelAcordion += '<table class="table" id="tableSeminario">';
	    panelAcordion += '<tr>';
	    panelAcordion += '<th><h5>Codigo</h5></th>';
	    panelAcordion += '<th><h5>Seminario</h5></th>';
	    panelAcordion += '<th></th>';
	    panelAcordion += '</tr>';
	    

	    for(var i = 0; i < dataSeminario.length; i++)
	    {
	    	if(dataSeminario[i].materia_codigo == codigoMateria)
	    	{
	    		panelAcordion += '<tr>';
			    panelAcordion += '<th>'+dataSeminario[i].seminario_id+'</th>';
			    panelAcordion += '<th>'+dataSeminario[i].seminario_nombre+'</th>';
			    panelAcordion += '<th><button class="btn btn-mini btn-danger" id="eliminarSem" type="button" value="'+dataSeminario[i].seminario_id+'" materia="'+codigoMateria+'"><i class="icon-remove-sign"></i></th>';
			    panelAcordion += '</tr>'; 
	    	}
	    }

	    panelAcordion += '</table>';
		panelAcordion += '</div>';
		panelAcordion += '</div>';
		panelAcordion += '</div>';

		return panelAcordion;
	}

});