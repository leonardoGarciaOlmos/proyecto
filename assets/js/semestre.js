$(document).ready(function()
{

	//-- VARIBLES GLOBAL --
	var semestre = new Object();
	var semestreInfo = new Object();



	//-- CARGA DE ELEMENTOS Y INFORMACION --
	$('.datepicker[data-toggle="popover"]').popover({
		title: 'Campo Obligatorio',
		content: 'Seleccione la fecha',
		delay: {show: 500, hide: 100},
		placement: 'bottom'
	});

	var oldie = /msie\s*(8|7|6)/.test(navigator.userAgent.toLowerCase());
	$('.easy-pie-chart.percentage').each(function(){
		$(this).easyPieChart({
			barColor: $(this).data('color'),
			trackColor: '#EEEEEE',
			scaleColor: false,
			lineCap: 'butt',
			lineWidth: 20,
			animate: oldie ? false : 1000,
			size:90
		}).css('color', $(this).data('color'));
	});




	//-- ELEMNETOS INSERTAR SEMESTRES--
	//+-----------------------------------+
	//|	 Asigna el evento para desplegar  |	
	//|  el calendario de un input  	  |	
	//+-----------------------------------+
	$.datepicker.setDefaults($.datepicker.regional["es"]);
	$('.datepicker').datepicker();

	//+------------------------------+
	//|	 Solicita las carreras del   |
	//|  departamento seleccionado   |
	//+------------------------------+
	$('#select_departamento').on('change',function()
	{
		var value = $(this).val();

		semestre_empty_add();
		$("#semestres").attr("disabled", "disabled");
		$("#FechaIni").attr("disabled", "disabled");
		$("#FechaFin").attr("disabled", "disabled");
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

		if(value != "")
		{
			$.getJSON(base_url+'pensum/json_pensum_carrera_activate', { carrera: value }, function(data)
			{ 
				semestre.pensum = data[0].id;
				semestre.carrera = value;
				semestreInfo = semestre_information_add(semestre.pensum);
			});
		}
		else
		{ 
			semestre_empty_add();
			$("#semestres").attr("disabled", "disabled");
			$("#FechaIni").attr("disabled", "disabled");
			$("#FechaFin").attr("disabled", "disabled");

		}
	});


	//+------------------------------------+
	//|	 Envia la informacion recolectada  |
	//|  para iniciar los semstres 		   |
	//+------------------------------------+
	$("button#submit").on('click', function()
	{
		var returnFunction = field_required();

		if (returnFunction) 
		{
			if(typeof(semestreInfo.length) == "undefined" || semestreInfo.length == 0)
			{
				semestre.semestre = parseInt($("select#semestres").val());
				semestre.fecINI = $("input#FechaIni").datepicker( "option", "dateFormat", "yy-mm-dd" ).val();
				semestre.fecFIN = $("input#FechaFin").datepicker( "option", "dateFormat", "yy-mm-dd" ).val();

				$.ajax({
					url: base_url+'semestre/insert_periodo_semestre',
					data: {semestre: semestre},
					async: false,
					type: 'POST',
					success: function(data)
					{ 
						bootbox.alert("Se ha registrado correctamente la informacion"); 
						$("#semestres").attr("disabled", "disabled");
						$("#FechaIni").attr("disabled", "disabled");
						$("#FechaFin").attr("disabled", "disabled");
						semestreInfo = new Array(semestre.semestre);
					},
					error: function()
					{ bootbox.alert("Intentelo de nuevo"); }
				});
			}else
			{ bootbox.alert("Ya hay informacion cargada, cierre semestre"); }
		}else
		{
			bootbox.alert("Faltan campos por llenar");
		}
	});



	//-- ELEMNETOS CERRAR SEMESTRES--

	//+------------------------------+
	//|	 Solicita las carreras del   |
	//|  departamento seleccionado   |
	//+------------------------------+
	$('select#departamento').on('change',function()
	{
		var value = $(this).val();

		semestre_empty_close();

		if(value == '')
		{
			buildSelect($('select#carrera'), '', 'null', '');
		}
		else
		{
			$.getJSON(base_url+'carrera/json_carrera_depart', { id_dep: value }, function(data)
			{ buildSelect($('select#carrera'), data, 'add', 'Seleccionar Carrera'); });
		}
	});


	//+--------------------------------+
	//|	 Verifica el cambio de carrera |
	//|  de un pensum especifico 	   |
	//+--------------------------------+
	$('select#carrera').on('change',function()
	{
		var value = $(this).val();

		if(value != "")
		{
			$.getJSON(base_url+'pensum/json_pensum_carrera_activate', { carrera: value }, function(data)
			{ 
				semestre.pensum = data[0].id;
				semestre.carrera = value;
				semestreInfo = semestre_information_close(semestre.pensum);
			});
		}else
		{ semestre_empty_close(); }
	});


	//+---------------------------------+
	//|	 Realiza el cierre del semestre |
	//+---------------------------------+
	$('button#close').on('click', function()
	{
		if(typeof(semestreInfo.length) == "undefined" || semestreInfo.length == 0)
		{
			bootbox.alert("No hay informacion que procesar");
		}else
		{
			bootbox.confirm("¿Seguro que desea cerrar el semestre?", function(result)
			{
				if(result == true)
				{
					$.ajax({
					url: base_url+'semestre/delete_periodo_semestre',
					data: {carrera: semestre.carrera, pensum: semestre.pensum},
					async: false,
					type: 'POST',
					success: function(data)
					{
						bootbox.alert("El cierre de semestre se realizo de manera exitosa");
						semestreInfo = new Object();
						semestre_empty_close();
					}
				});
				}
			});
		}
	});

});


//-- FUNCIONES GENERALES --

function field_required()
{
	var semestre = $("#semestres").val();
	var fechaIni = $("input#FechaIni").val();
	var fechaFin = $("input#FechaFin").val();
	var array = new Array();
	var booleanReturn = false;


	if (semestre == "")
	{ 
		array[0] = false;
	}else
		array[0] = true;

	if (fechaIni == "")
	{ 
		array[1] = false; 
	}else
		array[1] = true;

	if (fechaFin == "")
	{ 
	 	array[2] = false;
	}else
		array[2] = true;


	for(i=0; i < array.length; i++)
	{
		if(array[i] == true)
			booleanReturn = true;
		else
		{
			booleanReturn = false;
			break;
		}
	}

	return booleanReturn;
}





function semestre_information_close(pensum)
{
	var objectReturn = new Object();

	$.ajax({
		url: base_url+'semestre/json_periodo_semestre',
		dataType: 'json',
		data: {pensum: pensum},
		async: false,
		type: 'POST',
		success: function(data)
		{
			objectReturn = data;

			if(data.length == 0)
			{ semestre_empty_close(); 
			}else
			{
				// Verificar Semestres
				if(parseInt(data[0].semestre) % 2 ) 
					$('select#semestres [value="2"]').attr("selected",true); // IMPAR
				else
					$('select#semestres [value="1"]').attr("selected",true); // PARES

				// Colocar Fecha inicio y fin de los semestre
				$("input#FechaIni").val(data[0].ini_semestre);
				$("input#FechaFin").val(data[0].fin_semestre);

				// Indicar el progreso del semestres
				var porcentaje = ((data[0].transcurrido*100)/data[0].total).toFixed(2);
				porcentaje = (porcentaje >= 100) ? 100 : porcentaje;
				$("#progressBar").attr('data-percent', porcentaje+'% de Avance');
				$("#progressBar").find('div.bar').css('width', porcentaje+'%');

				// Indicar los dias restantes del semestre
				var porcentaje2 = ((data[0].faltante*100)/data[0].total).toFixed(2);
				data[0].faltante = (data[0].faltante <= 0) ? 0 : data[0].faltante;
				porcentaje2 = (porcentaje2 <= 0) ? 0 : porcentaje2;
				$('#circle').data('easyPieChart').update(porcentaje2);
				$('#circle').find('span.percent').html(data[0].total);
				$('#day').html(data[0].faltante);
			}
		}
	});

	return objectReturn;
}


function semestre_information_add(pensum)
{
	var objectReturn = new Object();

	$.ajax({
		url: base_url+'semestre/json_periodo_semestre',
		dataType: 'json',
		data: {pensum: pensum},
		async: false,
		type: 'POST',
		success: function(data)
		{
			objectReturn = data;

			if(data.length == 0)
			{ 
				semestre_empty_add();
				$("#semestres").removeAttr("disabled");
				$("#FechaIni").removeAttr("disabled");
				$("#FechaFin").removeAttr("disabled"); 
			}else
			{
				// Verificar Semestres
				if(parseInt(data[0].semestre) % 2 ) 
					$('select#semestres [value="2"]').attr("selected",true); // IMPAR
				else
					$('select#semestres [value="1"]').attr("selected",true); // PARES

				// Colocar Fecha inicio y fin de los semestre
				$("input#FechaIni").val(data[0].ini_semestre);
				$("input#FechaFin").val(data[0].fin_semestre);
			}
		}
	});

	return objectReturn;
}

function semestre_empty_close()
{
	$('select#semestres [value=""]').attr("selected",true);
	$("input#FechaIni").val("");
	$("input#FechaFin").val("");
	$("#progressBar").attr('data-percent', '0% de Avance');
	$("#progressBar").find('div.bar').css('width', '0%');
	$('#circle').data('easyPieChart').update(0);
	$('#circle').find('span.percent').html("0");
	$('#day').html("0");
}


function semestre_empty_add()
{
	$('select#semestres [value=""]').attr("selected",true);
	$("input#FechaIni").val("");
	$("input#FechaFin").val("");
}