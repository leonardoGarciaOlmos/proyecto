$(document).on('ready',function(){

	$("#profileform").submit(function(e){
		e.preventDefault();
		var data = $(this).serialize();
		$.post('../auth/change_password',data,function(response){			
			bootbox.alert(data.auth_message);
		}, "json");

	});
});