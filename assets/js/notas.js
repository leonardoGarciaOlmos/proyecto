$(function () {
	
	$('.notas').editable({
        type: 'spinner',
		name : 'notas',
		url: base_url+"notas/prueba",
		spinner : {
			min : 0, max:20, step:0.1,
		},
		validate: function(value) {
		    bootbox.confirm("¿Esta seguro que desea continuar con este cambio?.", function(result, value) {
		    	if(result == true && value != ""){
		    		$.post(base_url+'notas/prueba', {"notas": value}, function(data, textStatus, xhr) {
		    			/*optional stuff to do after success */
		    		});
		    	}

			});
		}
	});
})