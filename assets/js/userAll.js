
$(document).ready(function() {
	/* Initialise the DataTable */
	var oTable = $('#table_id').dataTable( {
		"oLanguage": {
			"sSearch": "Search all columns:"
		}
	} );


});

$(function(){
	$('.table').on('click','.tooltip-error', function(){
		/* Eliminar  */
		confirmationModalDialog( $(this).data('original-title'), $(this).data('message'));
		$('.ok-confirmation').data('target-url', $(this).data('target-url'));
	});

	$('.table').on('click','.tooltip-success', function(){

	});

	$('.table').on('click','.tooltip-info', function(){
		/* Vista  */

	});

});



