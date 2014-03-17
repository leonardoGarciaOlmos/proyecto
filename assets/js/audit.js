var asInitVals = new Array();
 
$(document).ready(function() {

	console.log(base_url+"assets/js/dataTables.spanish.txt");

    var oTable1 = $('#table').dataTable({
				    "oLanguage": {
					      "sUrl": base_url+"assets/js/dataTables.spanish.txt"
					    }
			});



} );