jQuery(function($) {

	$('[data-rel=tooltip]').tooltip();

	var $validation = false;
	$('#fuelux-wizard').ace_wizard().on('change' , function(e, info){
		if(info.step == 1 && $validation) {
			if(!$('#validation-form').valid()) return false;
		}
	}).on('finished', function(e) {
		bootbox.dialog({
			message: "Gracias! su informacion se ha guardado con exito!", 
			buttons: {
				"success" : {
					"label" : "OK",
					"className" : "btn-sm btn-primary"
				}
			}
		});
	}).on('change', function(e, data){
		if($('#fuelux-wizard').wizard("selectedItem").step == 1){
			stepOne();
		}

		if($('#fuelux-wizard').wizard("selectedItem").step == 2){
			if($("#sem-mat > optgroup > option").length == 0){
				e.preventDefault();
				bootbox.alert("Debe tener al menos 1 semestre cargado para continuar.");
			}
			stepTwo();									
		}

		if($('#fuelux-wizard').wizard("selectedItem").step == 3){
			bootbox.confirm("¿Esta seguro que desea continuar? Recuerde que lo cambios que efectue no podran ser modificados.", function(result) {
				if(result == true){
					array = [];
					$.each($("#format td"),function(index, el) {
						
						if($(el).children("span").length > 0){
							array.push({
						        bloque: $(el).attr("id"),
						        mat: $(el).children("span").attr("mat")
						    });
						}

					});

					$.post(base_url+'inscripcionMateria/Call_inscribir', {"bloque":array, "pensum":$("#carrera").attr('pensum')}, function(data) {
						/*optional stuff to do after success */
					});

				}
			}); 
		}

	});


	$('#skip-validation').removeAttr('checked').on('click', function(){
		$validation = this.checked;
		if(this.checked) {
			$('#sample-form').hide();
			$('#validation-form').removeClass('hide');
		}
		else {
			$('#validation-form').addClass('hide');
			$('#sample-form').show();
		}
	});
	
	$('#modal-wizard .modal-header').ace_wizard();
	$('#modal-wizard .wizard-actions .btn[data-dismiss=modal]').removeAttr('disabled');

});


function stepOne(){
 		$.post(base_url+'inscripcionMateria/Call_get_semestre', {"carrera_id": $("#carrera").attr('carrera')}, function(data){
			 	$("#semestres").empty();
			 	$.each(data, function(index, val) {
			 		 $("#semestres").append('<option value="'+val.semestre+'">Semestre '+val.semestre+'</option>');
			 	});
			 });
		

		$("#semestres").click(function() {
			$.post(base_url+'inscripcionMateria/Call_get_materias', {"semestre": $("#semestres").val(), "carrera_id": $("#carrera").attr('carrera')}, function(data){
				$("#materias").empty();
				$.each(data, function(index, item) {
					$("#materias").append('<option value="'+item.codigo+'" uc="'+item.uni_credito+'">'+item.nombre+'</option>')					
				});
			});
		});

		$("#asign").click(function(){
			var group = $("#sem-mat").children("optgroup[label='"+$("#semestres option:selected").text()+"']").attr("label");
			var sem = $("#semestres option:selected").text();

			if($("#materias").val() != null && sem != ""){
				
			
				if(!$("#sem-mat option[value='"+$("#materias").val()+"']").length > 0){
					var total_uc = $("#total_uc").html();
					var mat_uc = $("#materias option:selected").attr("uc");


					$.post(base_url+'inscripcionMateria/call_get_horario', {"semestre":$("#semestres option:selected").val(), "pensum":$("#carrera").attr('pensum'), "materia":$("#materias option:selected").val()} , function(data){
			            if(data.length == 0){
			            	bootbox.alert("No se han encontrado bloques en el horario con la materia seleccionada es imposible agregarla");
			            }
			            $.each(data, function(pos,item){
			            	if($("#"+item.bloque).children().length < 1){								
								if((parseInt(total_uc) + parseInt(mat_uc)) < 23){

									if (group != sem){
										$("#sem-mat").append("<optgroup label='"+$("#semestres option:selected").text()+"'> </optgroup>");
									}
									$("#"+item.bloque).append("<span class='data_h' mat = "+item.materia_codigo+" ci= "+item.ci+"><p class='text-error'>" + item.materia + "</p><p class='text-info'>" + item.nombre +" "+ item.apellido + "</p></span>");
									$("#sem-mat").children("optgroup[label='"+$("#semestres option:selected").text()+"']").append('<option value="'+$("#materias").val()+'" uc="'+$("#materias option:selected").attr("uc")+'">'+$("#materias option:selected").text()+'</option>');	
									$("#total_uc").html((parseInt(total_uc) + parseInt(mat_uc)));
									$("#total_mat").html($("#sem-mat > optgroup > option").length);
								}else{
									bootbox.alert("No se pueden añadir mas materias debido a que ha llegado al limite de unidades de credito");

								}
								
			            	}else{
			            		bootbox.alert("No se puede agregar la materia debido a que interfiere con un bloque de hora ya agregado. Verifique y vuelva a intetarlo.");		            	
			            	}
			            });
			        });

				}else{
					bootbox.alert("Ya se ha agregado esta materia, verigique y vuelv a intentarlo.");
				}
			}else{
				bootbox.alert("Debe seleccionar el semestre y la materia para continuar.");
			}
			
		});
		
		$("#delete").click(function(event) {
			var total_uc = $("#total_uc").html();
			var mat_uc = $("#sem-mat option:selected").attr("uc");

			if(total_uc > 0 && $("#sem-mat option:selected").val() != undefined){			
				$("#total_uc").html((parseInt(total_uc) - parseInt(mat_uc)));
			}

			$.each($("#format td"), function(index, item) {
				if($(item).children('span').attr('mat') == $("#sem-mat option:selected").val()){
					$(item).children('span').remove();
				}
			});

			if($("#sem-mat option:selected").parent().children().length <= 1){
				$("#sem-mat option:selected").parent("optgroup").remove();
			}

			$("#sem-mat option:selected").remove();
			$("#total_mat").html($("#sem-mat > optgroup > option").length);

		});

		$("#materias").click(function(event) {
			$.post(base_url+'inscripcionMateria/Call_get_horas',{"pensum":$("#carrera").attr('pensum'), "semestre":$("#semestres option:selected").val(), "materia":$("#materias option:selected").val()}, function(data) {
				$("#tbody").empty();
				$.each(data, function(index, el) {
					var html="<tr><td>"+el.dia+"</td>";
						html+="<td><b class='green'>"+el.hora_inicio+"</b></td>";
						html+="<td class='hidden-phone'><b class='red'>"+el.hora_final+"</b></td></tr>";		

					$("#tbody").append(html);					
				});
							
			});

			$("#materias").showBalloon({position: "bottom", contents: $('#hours')});
			$("#hours").show();

			$("#materias").focusout(function() {
				$("#materias").hideBalloon({position: "bottom", contents: $('#hours')});
	            $("#hours").hide();
			});
			// setTimeout(function() {
			// 	$("#materias").hideBalloon({position: "bottom", contents: $('#hours')});
   //              $("#hours").hide();
   //          }, 10000);
		});

}

function stepTwo(){
	$("#sem-container").empty();
	$.each($("#sem-mat > optgroup"), function(id, item) {

		var html = '<div class="span6"><div class="row-fluid"><div class="span12 label label-large label-info arrowed-in arrowed-right">';
			html += '<b>'+$(item).attr("label")+'</b></div></div><div class="row-fluid"><ul id="semestre_'+id+'" class="unstyled spaced">	</ul></div></div>';
		
		$("#sem-container").append(html);

		$.each($(item).children(), function(index, el) {
			$("#semestre_"+id).append('<li>'+$(el).val()+'<i class="icon-caret-right blue"></i>'+$(el).html()+'</li>');
		});
															
	});
}