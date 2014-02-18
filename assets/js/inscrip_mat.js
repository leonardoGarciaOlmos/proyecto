jQuery(function($) {

	$.post(base_url+'inscripcionMateria/Call_get_semestre', {pensum: '1'}, function(data, textStatus, xhr) {
		console.log(data);


	});
			
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
		//return false;//prevent clicking on steps
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