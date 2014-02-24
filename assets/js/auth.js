
var timeout = null;
$(document).on('ready',function(){			

$('#form-signin').on('submit',function( event ){
	event.preventDefault();
	var formData = $(this).serialize();
	$.ajax({
		dataType: "json",
		type: "POST",
		url: base_url+'auth/login',
		data: formData,
		success: function( data ) {
      if(data.redirect){
        window.location.href = base_url+data.redirect;
      }
      if(data.show_captcha){
				showRecaptcha();
			}
			if(data.error_msg){
				showError(data.error_msg);
			}			
		}
	});

});

function showErrorForgot ( targetSelector , msg ) {

	var target = $(targetSelector);
	clearTimeout(timeout);
	var targetClass = "error"+targetSelector.replace('.','');
	$('.'+targetClass).remove();
	$(target).addClass('error');
	var labelError = $('<span display="none" class="'+targetClass+'">'+msg+'</span>')
	.fadeIn("slow").delay(5000).fadeOut("slow");
	target.append(labelError);
}


$('#olvidoClave').on('submit',function( event ){
	event.preventDefault();
	var formData = $(this).serialize();
	$.ajax({
	dataType: "json",
	type: "POST",
	url: base_url+'auth/forgot_password',
	data: formData,
	success: function( data ) {
 		showErrorForgot('.msjForgot',data.message);
	}
});

});




if(show_captcha){
	showRecaptcha();
}

});

function showRecaptcha() {
Recaptcha.create("6LeV5-oSAAAAAMcsFNA9ofW2uXdXcm2ruwRdvrx_", 'captchadiv', {
    tabindex: 1,
    theme: "white",
    lang : "es",
    callback: Recaptcha.focus_response_field
});
}


function show_box(id) {
 jQuery('.widget-box.visible').removeClass('visible');
 jQuery('#'+id).addClass('visible');
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
