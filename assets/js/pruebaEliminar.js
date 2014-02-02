$('body').on('click','.delete-row', function(e){
	//confirmationModalDialog('Confirmacion', 'Este es el texto');
	var url = 'http://192.168.5.10/adsi/role/delete/';
	var targetUrl = $(this).data('target-url');
	var arrayTargetUrl = targetUrl.split('/');
	var roleId = arrayTargetUrl[arrayTargetUrl.length - 1];
	url = url+roleId;
	$.getJSON(url, function( data ){
		if(data.success){
			confirmationModalDialog('Mensaje', 'Se ha eliminado el rol');
		}
		else if(data.error){
			confirmationModalDialog('Mensaje', 'El rol no puede ser eliminado, ya que tiene uno o mas usuarios asociados');
		}
	});
	e.stopImmediatePropagation();
});

function confirmationModalDialog(title_modal, message_text){

	if ($('#dialog_modal_message')[0]){
		$('#dialog_modal_message').remove();
	}

	var modal_content = '<div id="dialog_modal_message" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="dialog_modal_message_label" aria-hidden="true"><div class="modal-header">	<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>	<h3 id="dialog_modal_message_label">' + title_modal + '</h3></div><div class="modal-body">	<p>'+ message_text + '</p></div><div class="modal-footer">	<button class="btn cancel-confirmation" data-dismiss="modal" aria-hidden="true">Cancel</button>	<button class="btn btn-primary ok-confirmation">Ok</button></div></div>';
	$('#ajax_list').after(modal_content);

	$('#dialog_modal_message')
		.modal({ keyboard: false })
		.on('shown', function(){
			$(this).find('button.cancel-confirmation').hide()
			.end().find('button.ok-confirmation').click(function(){
				deteleGroceryCrudInformation($(this).data('target-url'));
				$('button.close').trigger('click');
			});
		});

}