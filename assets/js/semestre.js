$(document).ready(function()
{
	$accordion = $('div#accordion');
	$semestre = $('input#num_semestre');
	$pensum = $('input#id_pensum');

	// Agregar semestre
	$('#addSemes').bind("click",function()
	{
		addPensum();
	});

	//+--------------------------------------------------------+
	//|   AUTOCOMPLETAR MATERIA                                |
	//+--------------------------------------------------------+
	//|   busca en BD las conincidencias que este en el texto  |
	//+--------------------------------------------------------+

	$(document).on("click", "div.panel-heading" ,function()
	{
		var $parent       = $(this).parent(); 
		var $materia      = $(this).parent().find('input#materia');
		var $materiaId    = $(this).parent().find('input#materia_id');
		var $tableMateria = $(this).parent().find('table#tableMateria');

		$materia.val('');
		$materiaId.val('');
		$.getJSON(base_url+'pensum/json_get_materia',function(data)
		{dataMateria = data;}).success(function() 
		{ //alert("second success");
			$materia.autocomplete(
			{
			  source: dataMateria,
			  minLength: 0,
			  focus: function( event, ui ) {},
			  select: function( event, ui ) 
			  {
			      $materiaId.val(ui.item.codigo);
			      agregarMateriaSemest($parent, ui.item);
			      return true;
			  }
			});
		});
	});


	//+---------------------------------------------------------------+
	//|   ELIMINARMATERIA                                             |
	//+---------------------------------------------------------------+
	//|   Elimina la materia a un pensum especifico junto el semestre |
	//+---------------------------------------------------------------+
	$(document).on('click', 'button#eliminarMat', function()
	{
		var $tablaTr  = $(this).parent().parent();
		var materiaId = $(this).val();

		$.ajax(
		{
			url: base_url+'pensum/borrar_semestre',
			type: "POST",
			data: { pensum: $pensum.val(), materia: materiaId },
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


	// ++++++++++ Funciones ++++++++++
	function addPensum()
	{
		var id_pensum = $pensum.val();
		var id_carrera = $carrera.val();

		if(id_pensum == '')
		{
			$.ajax({
				cache: false,
				type: 'POST',
				data: 'id_carrera=' + id_carrera,
				dataType: "json",
				url: base_url + 'pensum/json_insert_pensum',
				success: function(object)
				{
					if(object != '')
					{
						$pensum.val(object[0].id);
						addSemestre();
					}
					else if(object == '')
						bootbox.alert('Problemas para crear el Pensum');
				},
				error: function()
				{ alert('Error'); }
			});
		}
		else
			addSemestre();
	}

	function addSemestre()
	{
		var numSemes = parseInt($semestre.val());

		var panel =  '<div class="panel panel-default">';
		panel += '<div class="panel-heading">';
		panel += '<h3 class="panel-title">';
		panel += '<a class="accordion-toggle collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapse'+numSemes+'">';
		panel += '<i class="bigger-110 icon-angle-right" data-icon-hide="icon-angle-down" data-icon-show="icon-angle-right"></i>';
		panel += '&nbsp;Semestre #'+numSemes+'';
		panel += '</a>';
		panel += '</h3>';
		panel += '</div>';

		panel += '<div class="panel-collapse collapse" id="collapse'+numSemes+'" style="height: 0px;">';
		panel += '<div class="panel-body">';
		panel += '<input type="hidden" value="'+numSemes+'", name="semestre" id="semestre">';
        panel += '<input type="hidden" value="" name="materia_id" id="materia_id">';
        panel += '<div class="span1"> <h4>Materia</h4> </div>'
        panel += '<div class="span3"> <input type="text" value="" name="materia" id="materia"> </div>';
        panel += '<div class="span12">';
        panel += '<table class="table" id="tableMateria">';
        panel += '<tr>';
        panel += '<td><h5>Codigo</h5></td>';
        panel += '<td><h5>Uni. Curricular</h5></td>';
        panel += '<td><h5>H. Teoricas</h5></td>';
        panel += '<td><h5>H. Practicas</h5></td>';
        panel += '<td><h5>Total Horas</h5></td>';
        panel += '<td><h5>Uni. Credito</h5></td>';
        panel += '<td><h5>Cod. Prelacion</h5></td>';
        panel += '<td></td>';
        panel += '</tr>';
        panel += '</table>';
		panel += '</div>';
		panel += '</div>';
		panel += '</div>';

		if(numSemes == 1)
			$accordion.html(panel);
		else
			$accordion.append(panel);

		$semestre.val(++numSemes);
	}


	//+---------------------------------------------------------------+
	//|   AGREGAR MATERIA                                             |
	//+---------------------------------------------------------------+
	//|   Agrega la materia a un pensum especifico junto el semestre  |
	//+---------------------------------------------------------------+
	function agregarMateriaSemest($objectTag, data)
	{

		var $materiaId    = $objectTag.find('input#materia_id');
		var $semestreAct  = $objectTag.find('input#semestre');
		var $tableMateria = $objectTag.find('table#tableMateria');
		var numSemesAnt   = parseInt($semestreAct.val());

		if (--numSemesAnt != 0)
		{
		    var $accorSemes       = $("div#collapse"+numSemesAnt);
		    var $tagTableSemesAnt = $accorSemes.find('table#tableMateria tbody tr');


		    if ($tagTableSemesAnt.length == 1) 
		    {
		        bootbox.alert("Antes de seguir con el registro de la materia, el semestre anterior debe tener una materia registrada");
		    }else
		    { ajax_agreMatSem($tableMateria, $pensum.val(), $materiaId.val(), $semestreAct.val(), data); }  
		}
		else
		{ ajax_agreMatSem($tableMateria, $pensum.val(), $materiaId.val(), $semestreAct.val(), data); }

	}


	function ajax_agreMatSem($objectTag, penid, matCod, semNum, data)
	{

		$.ajax(
		{
			url: base_url+'pensum/agregar_semestre',
			type: "POST",
			data: { pensum: penid, materia: matCod, semes: semNum },
			success: function()
			{ 
				var tagTableMat  = '<tr>';
				tagTableMat += '<td>'+data.codigo+'</td>';
				tagTableMat += '<td>'+data.nombre+'</td>';
				tagTableMat += '<td>'+data.horas_teoricas+'</td>';
				tagTableMat += '<td>'+data.horas_practicas+'</td>';
				tagTableMat += '<td>'+data.total_horas+'</td>';
				tagTableMat += '<td>'+data.uni_credito+'</td>';
				tagTableMat += '<td>'+data.cod_prelacion+'</td>';
				tagTableMat += '<td><button class="btn btn-mini btn-danger" id="eliminarMat" type="button" value="'+data.codigo+'"><i class="icon-remove-sign"></i></td>';
				tagTableMat += '</tr>'; 

				$objectTag.append(tagTableMat); 
			},
			error: function(error)
			{ 
				var tagTableMat  = '<tr class="error">';
				tagTableMat += '<td style="text-align:center;" colspan="8"><h5>Problemas al registrar la materia en el semestre</h5></td>';
				tagTableMat += '</tr>';
				$objectTag.append(tagTableMat);
				$objectTag.find("tbody tr.error").fadeOut(2500, function()
				{
					$(this).remove();
				});
			}
		});
	}

})