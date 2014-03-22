var edit;
var ci;
var sem;
var mat;
$(function () {
	$('.notas').editable({
		name : 'notas',
		url: base_url+"notas/prueba",
		validate: function(value) {

	    	if(value != ""){
	    		if(value < 20){
		    		$.post(base_url+'notas/editar_nota', {"notas": value, "sem": sem, "mat": mat, "ci":ci}, function(data, textStatus, xhr) {
		    			
				    });
	    		}else{
	    			return "La nota no puede ser mayor a 20."
	    		}
	    	}else{
	    		return "El campo no puede estar vacio inserte una valor numerico ";
	    	}
		}
	}).on('shown', function(e, editable){
		edit = editable;
		$(".input-medium").numeric({ precision: 4, decimal : ".",  negative : false, scale: 2 });
	});

	var oTable = $('#table').dataTable({
	    "oLanguage": {
		      "sUrl": base_url+"assets/js/dataTables.spanish.txt"
		    }
		}).columnFilter();

	$("span.editable").click(function(event) {
		ci = $(this).attr('ci');
		sem = $(this).attr('sem');
		mat = $(this).attr("mat");
	});
	

	
})