
var timeout = null;
var message_alert_add_form = "Los datos que intentas añadir no se han guardado. Estas seguro que quieres volver a la lista?";
var save_and_close = false;
function showError(data){
	var first = false;
	$boton = $('[name="submit"]');
	$.each(data, function(key,value) {
		var inputTarget = ' [name="'+key+'"]';
		var target = $(inputTarget);
		if(!first){
			$(inputTarget).focus();
			first = true;
		}
		var labelError = $('<span display="none" class="label label-important">'+value+'</span>')
		.fadeIn("slow",function(){
			$boton.prop('disabled',true);
		})
		.delay(5000)
		.fadeOut("slow",function(){
			$boton.prop('disabled',false);
		});
		target.after(labelError);
	});
}


$(function(){

    $('#save-and-go-back-button').click(function(){
        save_and_close = true;
        var form = $('#form-consult');
        submitForm($(form), $(form).data('ajax-validate'), $(form).data('ajax'));
    });

    $('.submit-form').on('click', function(){
    	save_and_close = false;
    	var form = $('#form-consult');
        submitForm($(form), $(form).data('ajax-validate'), $(form).data('ajax'));
    });

    $('.return-to-list').on('click', function() {
		goToList('Confirmación', message_alert_add_form);
		$('.ok-confirmation').data('target-url', $(this).data('target-url'));
		return false;
	});

});


function submitForm( form, targetValidate, tarjetAjax){
	event.preventDefault();
	var menu = form.serialize();
	var message = new Array();
	$.ajax({
		url: targetValidate,
		data: menu,
		type: "POST",
		dataType: "JSON",
		beforeSend: function(){
			$('#ajax-loading').removeClass('hide');
		},
		complete: function(){
			$('#ajax-loading').addClass('hide');
		},
		success: function(data){
			if(data.success){
				$.ajax({
					url: tarjetAjax,
					data: menu,
					type: "POST",
					dataType: "JSON",
					beforeSend: function(){
						$('#ajax-loading').removeClass('hide');
					},
					complete: function( result ){
						$('#ajax-loading').addClass('hide');
						if(save_and_close && result.success){
							 window.location = past_controller;
						}
					},
					success: function( result ){
						if (result.success){
							alert_message( 'alert-success' , result.response_message);
						}else{
							alert_message('alert-error',result.response_message);
						}
					},
					error: function( e ){
						alert_message( 'alert-error' , message['error'] = e );
					}
				});
			}else{
				showError(data.success_error_message);
			}
		},
		statusCode: {
			404: function() {
				alert_message( 'alert-error' , message['error'] = 'No se encuentra ' );
			}
		},
		error: function( e ){
			alert_message( 'alert-error' , message['error'] = e );
		}
	});
}


var alert_message = function(type_message, text_message){
	$('.modal-message.'+type_message).remove();
	var message = '<div class="alert '+type_message+' modal-message"><span class="icon"></span><span class="close">x</span>';
	$.each(text_message, function(key,value){
		message = message+'<p>'+value+'</p>';
	});
	if(!save_and_close && type_message != 'alert-error' ){
		message = message+' <a href="'+past_controller+'">Volver al inicio</a>';
	}
	message = message+'</div>';
	$('#message-box').prepend(message);
	$('html, body').animate({
		scrollTop:0
	}, 600);
	$("#ajax-loading").fadeOut('fast');
	window.setTimeout( function(){
		$('.modal-message.'+type_message).slideUp();
	}, 7000);
	return false;
};

function goToList(title_modal, message_text){
    if ($('#dialog_modal_message')[0]){
        $('#dialog_modal_message').remove();
    }
    var modal_content = '<div id="dialog_modal_message" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="dialog_modal_message_label" aria-hidden="true"><div class="modal-header">  <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>  <h3 id="dialog_modal_message_label">' + title_modal + '</h3></div><div class="modal-body">  <p>'+ message_text + '</p></div><div class="modal-footer">  <button class="btn cancel-confirmation" data-dismiss="modal" aria-hidden="true">Cancel</button> <button class="btn btn-primary ok-confirmation">Ok</button></div></div>';
    $('#message-box').after(modal_content);

    $('#dialog_modal_message')
        .modal({ keyboard: false })
        .on('shown', function(){
            $(this).find('button.cancel-confirmation').click(function(){
                $('button.close').trigger('click');
            }).end().find('button.ok-confirmation').click(function(){
                window.location = past_controller;
                $('button.close').trigger('click');
            });
        });
}

function deleteItem(delete_url){
	$('#ajax-loading').removeClass('hide');
	$.post(delete_url, function(data){
		if(data.success) {
			alert_message('alert-success', data.success_message);
			if(data.success_url != ''){
				setTimeout(function(){
					window.location = controller;
					}, 700);
			}
		} else {
			alert_message('alert-error', data.error_message);
		}
	}, 'json');
	$('#ajax-loading').addClass('hide');
	return true;
}

function confirmationModalDialog(title_modal, message_text){
	if ($('#dialog_modal_message')[0]){
		$('#dialog_modal_message').remove();
	}
	var modal_content = '<div id="dialog_modal_message" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="dialog_modal_message_label" aria-hidden="true"><div class="modal-header">	<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>	<h3 id="dialog_modal_message_label">' + title_modal + '</h3></div><div class="modal-body">	<p>'+ message_text + '</p></div><div class="modal-footer">	<button class="btn cancel-confirmation" data-dismiss="modal" aria-hidden="true">Cancel</button>	<button class="btn btn-primary ok-confirmation">Ok</button></div></div>';
	$('#ajax_list').after(modal_content);

	$('#dialog_modal_message')
		.modal({ keyboard: false })
		.on('shown', function(){
			$(this).find('button.cancel-confirmation').click(function(){
				$('button.close').trigger('click');
			}).end().find('button.ok-confirmation').click(function(){
				deleteItem($(this).data('target-url'));
				$('button.close').trigger('click');
			});
		});
}

function showError(data){
	var first = false;
	$boton = $('[name="submit"]');
	$.each(data, function(key,value) {
		var inputTarget = ' [name="'+key+'"]';
		var target = $(inputTarget);
		if(!first){
			if(key == 'titulo'){
				$('[name=titulo]').trigger('dblclick');
			}
			target.focus();
			first = true;
		}
		clearTimeout(timeout);
		$("span.label-important."+key).remove();
		$('[name='+key+']').addClass('error');
		var labelError = $('<span display="none" class="label '+key+' '+value+' label-important ">'+value+'</span>')
		.fadeIn("slow",function(){
			$boton.prop('disabled',true);
		})
		.delay(5000)
		.fadeOut("slow",function(){
			$boton.prop('disabled',false);
		});
		target.after(labelError);
	});
}

