$(window).load(function()
{

	$messageBox = $('#message-box');
	$updateAdmitido = $('#update-admitido');
	$optionsContent = $('#options-content');



	$optionsContent.css('margin-bottom', '0');

	$messageBox.html('<div class="loading hide" id="ajax-loading">Cargando, actualizando cambios...</div>');

	$updateAdmitido.on('click', function()
	{
		$ajaxLoading = $('#ajax-loading');
		var objectAdmision = new Object();
		var arrayAdmision = new Array();

		$('input[type="checkbox"].ace-switch').each(function()
		{
			if($(this).is(':checked')){
				objectAdmision = {ci:$(this).val(), estatus:"ACTIVO"};
				arrayAdmision.push(objectAdmision);
			}
			else{
				objectAdmision = {ci:$(this).val(), estatus:"PENDIENTE"};
				arrayAdmision.push(objectAdmision);
			}
		});


		$.ajax({
			type: 'POST',
			url: 'admisionUpdate',
			data: {arrayAdmitidos: arrayAdmision},
			cache: false,
			timeout: 6000,
			dataType: 'json',
			beforeSend: function(){
				$ajaxLoading.css('display', 'block');
				$ajaxLoading.delay(500000);
			},
			success: function(data){
				if(data = true)
					$(location).attr('href', 'all_admision');
				else
					$(location).attr('href', 'all_admision');
				
			},
			error: function(){
				//$('div#ajax-loading').css('display', 'none');
				alert('error');
			}
		})


	})

});