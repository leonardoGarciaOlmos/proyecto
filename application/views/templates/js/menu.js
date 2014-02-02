//var data_urls = ["mapa/", "mapa/url", "mapa/crear", "reporte/", "reporte/consultar", "reporte/eliminar", "carrito/", "carrito/ordenes", "carrito/pagos", "carrito/aviso", "carrito/banner"];
var data_urls = new Array();
var data_filter = new Array();

$(function(){
	// métodos de inicio
	data_urls = loadUrls();

	// Verifica si el campo esta checked y muentra el campo hijo o lo oculta según su estado altual
	$('input[data-father]').on('click', function(){
		var father = ($(this).data('father'));
		var name_url = ($(this).data('url'));
		if($(this).prop("checked")){
			$("input[data-child="+father+"]").parent().show();
			$("input[data-child="+father+"]").next().focus();
			data_filter.push(name_url);
		}else{
			index = data_filter.indexOf(name_url);
			data_filter.splice(index, 1);
			$("input[data-child="+father+"]").parent().find('button').trigger('click');
			$("input[data-child="+father+"]").parent().hide();
		}
	});

	var tag_input = $('.autocomplete');
	tag_input.tag({
		placeholder:tag_input.attr('placeholder'),
		source: data_urls
	}).on('added',function(e,s){
		data_filter.push(s);
		checkboxStatus(seachIdUrl(s), true);

	}).on('removed', function(e,s){
		checkboxStatus(seachIdUrl(s), false);
		index = data_filter.indexOf(s);
		data_filter.splice(index, 1);
		// console.dir(data_filter);
	});
	$('.tags').hide();

	function loadUrls(){
		var urls = new Array();
		// var key = 0;
		$('.url').each(function(){
			url = $(this).data('url');
			a = $(this).parent().parent();
			b = $(a).find('input[data-father]');
			if(!$(b).prop("checked")){
				urls[b.data('father')] = url;
				// key++;
			}
		});
		return urls;
	}
	function checkboxStatus( value, status ){
		$("input[data-father="+value+"]").prop("disabled", status);
	}


	function seachIdUrl( value ){
		return $.inArray( value.toString(), data_urls );
	}

	$.each(iconArray, function(i,v){
		$('.chosen-select').append("<option value="+ v +"> <i class="+ v +">"+ v +"</i></option>");
	});

    $('.chosen-select').chosen({
		no_results_text: "Vaya, no se ha encontrado!",
		enable_split_word_search: false,
		disable_search: false,
		search_contains: true,
		display_disabled_options: false
	});

    $('.chosen-select').on('change',function(e){
    	val = $(this).val();
    	$(this).parent().next('.chosen-select-button').html("<button><i class="+val+"></i></button>")
    })



});








