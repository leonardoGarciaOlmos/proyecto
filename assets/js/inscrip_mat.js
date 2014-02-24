jQuery(function($) {

	$('[data-rel=tooltip]').tooltip();

	var $validation = false;
	$('#fuelux-wizard').ace_wizard().on('change' , function(e, info){
		if(info.step == 1 && $validation) {
			if(!$('#validation-form').valid()) return false;
		}
	}).on('finished', function(e) {
		bootbox.dialog({
			message: "Thank you! Your information was successfully saved!", 
			buttons: {
				"success" : {
					"label" : "OK",
					"className" : "btn-sm btn-primary"
				}
			}
		});
	}).on('changed', function(e){
		console.log($('#fuelux-wizard').wizard("selectedItem"));
		if($('#fuelux-wizard').wizard("selectedItem").step == 2){
			 $.post(base_url+'inscripcionMateria/Call_get_semestre', {"carrera_id": $("#carrera").attr('carrera')}, function(data){
			 	$("#semestres").empty();
			 	$.each(data, function(index, val) {
			 		 $("#semestres").append('<option value="'+val.semestre+'">Semestre '+val.semestre+'</option>');
			 	});
			 });
		}

		$("#semestres").click(function() {
			$.post(base_url+'inscripcionMateria/Call_get_materias', {"semestre": $("#semestres").val(), "carrera_id": $("#carrera").attr('carrera')}, function(data){
				$("#materias").empty();
				$.each(data, function(index, item) {
					$("#materias").append('<option value="'+item.codigo+'">'+item.nombre+' ('+item.codigo+')</option>')					
				});
			});
		});
		//return false;//prevent clickin on steps
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
})