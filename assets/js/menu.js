var data_urls = new Array();
var data_filter = new Array();
var id_urls = new Array();

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
			var index = data_filter.indexOf(name_url);
			data_filter.splice(index, 1);
			// $("input[data-child="+father+"]").parent().find('button').trigger('click');
			$("input[data-child="+father+"]").parent().find('button').each(function(){
				$(this).trigger('click');
			});
			$("input[data-child="+father+"]").parent().hide();
		}
	});

	var tag_input = $('.autocomplete');
	tag_input.tag({
		placeholder:tag_input.attr('placeholder'),
		source: data_urls
	}).on('added',function(e,s){
		data_filter.push(s.toString());
		checkboxStatus(seachIdUrl(s), true);
	}).on('removed', function(e,s){
		checkboxStatus(seachIdUrl(s), false);
		var index = data_filter.indexOf(s.toString());
		data_filter.splice(index, 1);
	});
	$('.tags').hide();

	function loadUrls(){
		var urls = new Array();
		cont = 0;
		$('.url').each(function(){
			url = $(this).data('url');
			id = $(this).data('id');
			urls[cont++] = url;
			id_urls[id] = url;
		});
		return urls;
	}

	function checkboxStatus( value, status ){
		$("input[data-father="+value+"]").prop("disabled", status);
	}


	function seachIdUrl( value ){
		return $.inArray( value.toString(), id_urls );
	}

	$('.chosen-select').each(function(){
		for (x=0;x<iconArray.length;x++){
			if ($(this).val() != iconArray[x] ){
				$(this).append("<option value="+ iconArray[x] +"> <i class="+ iconArray[x] +">"+ iconArray[x] +"</i></option>");
			}
		}
	});

	$('input[data-father]').each(function(k,v){
		if($(this).prop("checked")){
			$(this).prop("checked", false);
			$(this).trigger('click');
		}
	});

	$('.tags').each(function(){
		$(this).find('.autocomplete').each(function(){
			content = $(this).val();
			array = content.split(",");
			$.each(array, function(k,v){
				data_filter.push(v.toString());
				checkboxStatus(seachIdUrl(v), true);
			});

		});
	});

    $('.chosen-select').chosen({
		no_results_text: "Vaya, no se ha encontrado!",
		enable_split_word_search: false,
		disable_search: false,
		search_contains: true,
		display_disabled_options: false
	});

    $('.chosen-select').on('change',function(e){
    	var val = $(this).val();
    	$(this).parent().next('.chosen-select-button').html("<button><i class="+val+"></i></button>")
    })

});








