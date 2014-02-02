$(document).ready(function(){
	$(':checkbox').click(function(){
		// Obtiene las variables generales
		var input = this;
		var tr = $(this).parent().parent();
		var trType = $(tr).attr('class');
		var inputType = $(this).attr('class');
		var status = $(this).prop('checked');
		var trName = $(tr).attr('data-controller');

		// Evalua que tipo de check pulso

		switch(trType){

			// Check global

			case 'global':
				if(inputType != 'all'){
					$("input."+inputType).prop('checked', status);
					if(!status){
						$("tr td input.all").prop('checked', false);
					}
					else{
						validate = true;
						if($(tr).find("td input:not(.all,:checked)").size() > 0)
							validate = false; 
						if(validate)
							$("tr td input.all").prop('checked', true);
					}
				}
				else
					$(":checkbox:not(.dis)").prop('checked', status);	
			break;

			// Check de controlador

			case 'controller':
				// casillas all
				if(inputType == 'all'){
					$("tr[data-controller='"+trName+"'] td input:not(.dis)").prop('checked', status);
					if(!status){
						$("tr.global td input").prop('checked', false);
					}
					else{
						$("tr.global td input").each(function(){
							auxInputType = $(this).attr('class');
							validate = true;
							$("tr.controller td input."+auxInputType).each(function(){
								if( !$(this).prop('checked') )
									validate = false;
							});
							if(validate){
								$("tr.global td input."+auxInputType).prop('checked', true);
								$("tr.global td input:not(.all)").each(function(){
									validate = false;
								});
								if(validate)
									$("tr.global td input.all").prop('checked', true);
							}
						});
					}

				}
				else{
					$("tr.url[data-controller='"+trName+"'] td input."+inputType).prop('checked', status);
					if(status){
						validate = true;
						$(tr).find("td input:not(.all)").each(function(){
							if( !$(this).prop('checked') )
								validate = false;
						});
						if(validate){
							$("tr[data-controller='"+trName+"'] td input.all").prop('checked', true);
						}
						validate = true;
						$("tr.controller td input."+inputType).each(function(){
							if( !$(this).prop('checked'))
								validate = false;
						});
						if(validate){
							$("tr.global td input."+inputType).prop('checked', true);
							$("tr.global td input:not(.all)").each(function(){
								if( !$(this).prop('checked') )
									validate = false;
							});
							if(validate)
								$("tr.global td input.all").prop('checked', true);
						}
					}
					else{
						$("tr.global").find("td input."+inputType).prop('checked', false);
						$("tr[data-controller='"+trName+"']").find("td input.all").prop('checked', false);
					}
				}
			break;

			// Check de URL

			case 'url':
				// Check comun
				if(inputType != 'all'){
					if(status){
						// Verificar fila del check para activar
						validate = true;
						if($(tr).find("td input:not(.all, :checked, .dis)").size() > 0)
							validate = false;
						if(validate){
							$(tr).find("td input.all").prop('checked', true);
						}
						validate = true;
						// Verificar columna del check para activar
						if($("tr.url[data-controller='"+trName+"'] td input."+inputType+":not(:checked, .dis)").size() > 0)
							validate = false;
						if(validate){
							$("tr.controller[data-controller='"+trName+"'] td input."+inputType).prop('checked', true);
							// Activacion de casilla global
							if($("tr.controller td input."+inputType+":not(:checked)").size() > 0)
								validate = false;
							if(validate){
								$("tr.global td input."+inputType).prop('checked', true);
							}
							// Activacion de casilla all
							validate = true;
								if($("tr.controller[data-controller='"+trName+"'] td input:not(.all, :checked)").size() > 0)
									validate = false;
							if(validate){
								$("tr.controller[data-controller='"+trName+"'] td input.all").prop('checked', true);
								if($("tr.controller td input.all:not(:checked)").size() > 0)
									validate = false;
								if(validate)
									$("tr.global td input").prop('checked', true);
							}
						}

					}	
					else{
						$(tr).find("td input.all").prop('checked', false);
						controllerTr = $("tr.controller[data-controller='"+trName+"']");
						$(controllerTr).find("td input."+inputType+",input.all").prop('checked', false);
						$("tr.global td").find("input.all,input."+inputType).prop('checked', false);
					}
				}
				// Check de activacion automatica de fila
				else{
					$(tr).find("td input:not(.dis)").prop('checked', status);
					if(status){
						validate = true;
						if($("tr.url[data-controller='"+trName+"'] td input.all:not(:checked)").size() > 0)
							validate = false;
						if(validate){
							$("tr.controller[data-controller='"+trName+"'] td input").prop('checked', true);
							if($("tr.controller td input.all:not(:checked)").size() > 0)
								validate = false;
							if(validate){
								$("tr.global td input").prop('checked', true);
							}
						}
					}
					else{
						$("tr.global td input").prop('checked', false);
						$("tr.controller[data-controller='"+trName+"'] td input").prop('checked', false);
						$("tr.global[data-controller='"+trName+"'] td input").prop('checked', false);
					}
				}
			break;
		}
	});

	$("tr.controller td:first-child").click(function(){
		$(this).find('i').toggleClass("icon-chevron-down");
		tr = $(this).parent();
		trName = $(tr).attr("data-controller");
		$("tr.url[data-controller='"+trName+"']").each(function(){
			$(this).toggle('fast');
		});
	});
});