$(document).ready(function()
{
	//-- VARIBLES GLOBAL --
	var pensum = new Object();
	var materiaAutocomplete = new Object();

	//-- CARGA DE DATA PRELIMINAR --

	//+------------------------------------+
	//|	 Se obtienen todas las materias    |
	//|  existente para utilizar luego 	   |
	//|  en los semestres 				   |
	//+------------------------------------+
	$.getJSON(base_url+'materia/json_materia_autocomplete',function(data)
	{ materiaAutocomplete = data; });

	//+------------------------------------+
	//|	 Se pre carga el objeto pensum 	   |
	//|  con la informacion necesaria      |
	//|  para crear el pensum 			   |
	//+------------------------------------+
	pensum.pensum = parseInt($('#pensum').val());
	pensum.carrera = parseInt($('#carrera').val());
	pensum.semestre = parseInt($('#num_semestre').val());

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
					{ pensum.carrera = value; }
				}
			break;

			case 2:

				if(data.direction == "next")
				{
					if(typeof(pensum.pensum) == "undefined" || pensum.pensum == 0)
					{ 
						bootbox.alert("Debe añadir un semestre al pensum");
						e.preventDefault(); 
					}else
					{
						$.ajax({
							url: base_url+'pensum/json_row_semestre',
							dataType: 'json',
							data: {pensum: pensum.pensum},
							async: false,
							type: 'GET',
							success: function(data)
							{
								if(data == 0)
								{ 
									bootbox.alert("Debe añadir una matería al semestre");
									e.preventDefault(); 
								}else
									build_view_pensum(pensum.pensum);
							}
						});
					}					
				}
			break;

			case 3:

				if(data.direction == "next")
				{
					if(!$("input#VerificarPensum").is(':checked'))
					{
						e.preventDefault();
						bootbox.alert("Debe validar si la información del pensum es la correcta");
					}
				}
			break;

			case 4:
			break;
		}

	});

	//+----------------------------------+
	//|	 Finaliza los pasos del wisard 	 |
	//+----------------------------------+
	$('#MyWizard').on('finished', function(e, data)
	{
		var estatus = "ACTIVO";

		$.get(base_url+'pensum/update_estatus_pensum', {pensum: pensum.pensum, estatus: estatus, carrera: pensum.carrera}, function()
		{ window.location.href = base_url+'pensum'; });
	});




	//-- ELEMENTOS DEL DOCUMENTO --

	//+---------------------------------+
	//|	 Valida que la información del  |	
	//|  pensum sea la correcta 		|
	//+---------------------------------+
	$("input#VerificarPensum").on('change',function()
	{
		inputChecbox = $(this);

		if(inputChecbox.is(':checked'))
		{
			bootbox.confirm("¿Seguro que la información es la correcta?\nAl seguir no podra hacer cambios", function(result)
			{
				if(result == true)
				{
					$('button#prev').attr('disabled', 'disabled');
					$('button#next').html('Finz <i class="icon-arrow-right icon-on-right"></i>');
					$('#MyWizard').on('stepclick', function(e, data){ e.preventDefault(); });
					$('#MyWizard').wizard('next');
				}else
				{
					inputChecbox.attr('checked', false);
				}
			});
		}
	});


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


	//+--------------------------------+
	//|	 Verifica el cambio de carrera |
	//|  de un pensum especifico 	   |
	//+--------------------------------+
	$('select#select_carrera').on('change',function()
	{
		var value = $(this).val();

		if( (!typeof(pensum.pensum)) == "undefined" || (!pensum.pensum == 0) )
		{
			bootbox.confirm("Esta un pensum en proceso\n¿Desea iniciar otro pensum?", function(result)
			{
				if(result == true)
				{
					$.get(base_url+'pensum/update_carrera_pensum', {pensum: pensum.pensum, carrera: value}, function()
					{ 
						pensum.carrera = value;
						pensum.semestre = 0;
						$("#accordion").html('<h4>No existe semestre ni materia</h4>');
						$("#view_pensum").html('<h4>No existe semestre ni materia</h4>');
					});
				}
				else
					$("select#select_carrera [value='"+pensum.carrera+"']").attr("selected",true);
			});
		}
	});


	//+------------------------------+
	//|	 Inserta un nuevo semestre   |
	//|  y si no existe el pensum    |
	//|  lo crea 					 |
	//+------------------------------+
	$('#addSemes').on('click', function()
	{
		var returnFunction;

		// Evalua si hay semestre en el pensum y lo agrega según el orden
		if((typeof(pensum.semestre) == "undefined" || pensum.semestre == 0) && (typeof(pensum.pensum) == "undefined" || pensum.pensum == 0))
		{
			$.getJSON(base_url+'pensum/json_new_pensum', { id_carrera: pensum.carrera }, function(data)
			{
				pensum.semestre = 1;
				pensum.pensum = data[0].id;
				add_html_semestre($('#accordion'), pensum.semestre);
			});
		}else if (pensum.semestre >= 0) 
		{
			pensum.semestre = pensum.semestre + 1;
			add_html_semestre($('#accordion'), pensum.semestre);
		}
	});


	//+-----------------------------------------+
	//|	 Asigna el evento de autocompletar	    |
	//|  al textbox de materia de cada semestre |
	//+-----------------------------------------+
	$("div.step-content").on("click", "div.panel-heading" ,function()
	{
		var $parent       = $(this).parent(); 
		var $materia      = $(this).parent().find('input#materia');
		var $materiaId    = $(this).parent().find('input#materia_id');

		$materia.autocomplete(
		{
			source: materiaAutocomplete,
			minLength: 0,
			focus: function( event, ui ) {},
			select: function( event, ui ) 
			{
				$materiaId.val(ui.item.codigo);
				add_materia_semestre($parent, ui.item);
				return true;
			}
		});
	});


	//+-----------------------------------------+
	//|	 Elimina la materia del semestre 	    |
	//+-----------------------------------------+
	$("div.step-content").on('click', 'button#eliminarMat', function()
	{
		var $tablaTr  = $(this).parent().parent();
		var materiaId = $(this).val();

		$.get(base_url+'pensum/delete_materia_semestre', {pensum: pensum.pensum, materia: materiaId}, function()
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
	function add_html_semestre(tagAcordion, numSemestre)
	{

		// Tabla que contiene las materias
		var table = '<table class="table table-striped table-bordered table-hover" id="tableMateria">';
	    table += '<tr>';
	    table += '<th><h5>Codigo</h5></th>';
	    table += '<th><h5>Uni. Curricular</h5></th>';
	    table += '<th class="hidden-phone"><h5>H. Teoricas</h5></th>';
	    table += '<th class="hidden-phone"><h5>H. Practicas</h5></th>';
	    table += '<th class="hidden-phone"><h5>Total Horas</h5></th>';
	    table += '<th class="hidden-480"><h5>Uni. Credito</h5></th>';
	    table += '<th class="hidden-480"><h5>Cod. Prelacion</h5></th>';
	    table += '<th></th>';
	    table += '</tr>';
	    table += '</table>';

	    // Panel que indica el semestre y dentro van las materias
	    var panelAcordion = '<div class="panel panel-default">';
		panelAcordion += '<div class="panel-heading">';
		panelAcordion += '<h3 class="panel-title">';
		panelAcordion += '<a class="accordion-toggle collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapse'+numSemestre+'">';
		panelAcordion += '<i class="bigger-110 icon-angle-right" data-icon-hide="icon-angle-down" data-icon-show="icon-angle-right"></i>';
		panelAcordion += '&nbsp;Semestre #'+numSemestre+'';
		panelAcordion += '</a>';
		panelAcordion += '</h3>';
		panelAcordion += '</div>';

		panelAcordion += '<div class="panel-collapse collapse" id="collapse'+numSemestre+'" style="height: 0px;">';
		panelAcordion += '<div class="panel-body">';
		panelAcordion += '<input type="hidden" value="'+numSemestre+'", name="semestre" id="semestre">';
	    panelAcordion += '<input type="hidden" value="" name="materia_id" id="materia_id">';
	    panelAcordion += '<div class="span1"> <h4>Materia</h4> </div>'
	    panelAcordion += '<div class="span3"> <input type="text" value="" name="materia" id="materia"> </div>';
	    panelAcordion += '<div class="span12">';
	    panelAcordion += table
		panelAcordion += '</div>';
		panelAcordion += '</div>';
		panelAcordion += '</div>';

		// Se verifica el numero de semestre
		if(numSemestre == 1)
			tagAcordion.html(panelAcordion);
		else
			tagAcordion.append(panelAcordion);
	}


	/**
	*	
	* Añadir materia a un semestres
	*
	* Añade una materia a un semestre en especifico de un pensum 
	*
	* @param 	object objectTag Elemento del arbol DOM
	* @param 	object data información referente a la materia  
	* @return 	none
	*
	*/
	function add_materia_semestre(objectTag, data)
	{

		var $materiaId    = objectTag.find('input#materia_id');
		var $semestreAct  = objectTag.find('input#semestre');
		var $tableMateria = objectTag.find('table#tableMateria');
		var numSemesAnt   = parseInt($semestreAct.val());
		var ReturnVar;
		var stringReturn;

		if (--numSemesAnt != 0)
		{
		    var $accorSemes       = $("div#collapse"+numSemesAnt);
		    var $tagTableSemesAnt = $accorSemes.find('table#tableMateria tbody tr');


		    if ($tagTableSemesAnt.length == 1) 
		    {
		        bootbox.alert("Antes de seguir con el registro, el semestre anterior debe tener al menos una matería");
		    }else
		    { ajax_agreMatSem($tableMateria, pensum.pensum, $semestreAct.val(), data); }  
		}
		else
		{ ajax_agreMatSem($tableMateria, pensum.pensum, $semestreAct.val(), data); }

	}

	/**
	*	
	* Agrega en el DOM la materia
	*
	* Agrega los datos de la materia en una tabla, esto luego
	* de ser enviada la petición al servidor de la inserción
	* de la misma en el pensum, en caso de error o duplicidad
	* de la materia en el pensun esta no la coloca 
	*
	* @param 	object  objectTag Elemento del arbol DOM
	* @param 	integer id_pensum identificación del pensum
	* @param 	object  data_materia Objecto que contiene la info de la materia  
	* @return 	none
	*
	*/
	function ajax_agreMatSem(objectTag, id_pensum, semNum, data_materia)
	{

		$.ajax(
		{
			url: base_url+'pensum/add_materia_semestre',
			type: "GET",
			data: { pensum: id_pensum, semes: semNum, materia: data_materia},
			success: function()
			{ 
				var tagTableMat  = '<tr>';
				tagTableMat += '<th>'+data_materia.codigo+'</th>';
				tagTableMat += '<th>'+data_materia.nombre+'</th>';
				tagTableMat += '<th class="hidden-phone">'+data_materia.horas_teoricas+'</th>';
				tagTableMat += '<th class="hidden-phone">'+data_materia.horas_practicas+'</th>';
				tagTableMat += '<th class="hidden-phone">'+data_materia.total_horas+'</th>';
				tagTableMat += '<th class="hidden-480">'+data_materia.uni_credito+'</th>';
				tagTableMat += '<th class="hidden-480">'+data_materia.cod_prelacion+'</th>';
				tagTableMat += '<th><button class="btn btn-mini btn-danger" id="eliminarMat" type="button" value="'+data_materia.codigo+'"><i class="icon-remove-sign"></i></th>';
				tagTableMat += '</tr>'; 

				objectTag.append(tagTableMat);
			},
			error: function(error)
			{ 
				var tagTableMat  = '<tr class="error">';
				tagTableMat += '<th style="text-align:center;" colspan="8"><h5>Problemas al registrar la materia en el semestre</h5></th>';
				tagTableMat += '</tr>';
				objectTag.append(tagTableMat);
				objectTag.find("tbody tr.error").fadeOut(2500, function()
				{
					$(this).remove();
				});
			}
		});
	}






	function build_view_pensum(pensum_id)
	{
		var $tagViewPensum = $("div#view_pensum");
		var numSemestre = 0;
		var tagTableLeft = "";

		$.ajax({
			url: base_url+'pensum/json_materia_semestre',
			dataType: 'json',
			data: {pensum: pensum_id},
			async: false,
			type: 'GET',
			success: function(data)
			{
				numSemestre = 0;
				tagTableLeft = '<div class="tabbable tabs-left">';
				tagTableLeft += '<ul class="nav nav-tabs" id="myTab3">';

				for(i = 0; i < data.length; i++)
				{
					if(numSemestre != data[i].semestre)
					{
						numSemestre = data[i].semestre;
						if(numSemestre == 1)
							tagTableLeft += '<li class="active">';
						else
							tagTableLeft += '<li>';

						tagTableLeft += '<a data-toggle="tab" href="#semestre'+numSemestre+'">';
						tagTableLeft += '<i class="pink icon-dashboard bigger-110"></i>';
						tagTableLeft += 'Semestre '+numSemestre;
						tagTableLeft += '</a>';
						tagTableLeft += '</li>';
					}
				}
				
				tagTableLeft += '</ul>';
				tagTableLeft += '<div class="tab-content" style="border: 1px solid #c5d0dc">';

				for(i = 1; i <= numSemestre; i++)
				{
					if(i == 1)
						tagTableLeft += '<div id="semestre'+i+'" class="tab-pane in active">';
					else
						tagTableLeft += '<div id="semestre'+i+'" class="tab-pane">';

					tagTableLeft += '<table class="table table-striped table-bordered table-hover">';
					tagTableLeft += '<tr>';
					tagTableLeft += '<th class="hidden-480">Codigo</th>';
				    tagTableLeft += '<th>Uni. Curricular</th>';
				    tagTableLeft += '<th class="hidden-phone">H. Teoricas</th>';
				    tagTableLeft += '<th class="hidden-phone">H. Practicas</th>';
				    tagTableLeft += '<th class="hidden-phone">Total Horas</th>';
				    tagTableLeft += '<th class="hidden-480">Uni. Credito</th>';
				    tagTableLeft += '<th class="hidden-480">Cod. Prelacion</th>';
					tagTableLeft += '</tr>';

					for(j = 0; j < data.length; j++)
					{
						if(i == data[j].semestre)
						{
							tagTableLeft += '<tr>';
							tagTableLeft += '<th class="hidden-480">'+data[j].codigo+'</th>';
						    tagTableLeft += '<th>'+data[j].nombre+'</th>';
						    tagTableLeft += '<th class="hidden-phone">'+data[j].horas_teoricas+'</th>';
						    tagTableLeft += '<th class="hidden-phone">'+data[j].horas_practicas+'</th>';
						    tagTableLeft += '<th class="hidden-phone">'+data[j].total_horas+'</th>';
						    tagTableLeft += '<th class="hidden-480">'+data[j].uni_credito+'</th>';
						    tagTableLeft += '<th class="hidden-480">'+data[j].cod_prelacion+'</th>';
							tagTableLeft += '</tr>';
						}
					}

					tagTableLeft += '</table>';
					tagTableLeft += '</div>';
				}

				tagTableLeft += '</div>';
				tagTableLeft += '<div>';

				$tagViewPensum.html(tagTableLeft);	
			}
		});	
	}


});