$(document).ready(function() {

    var oTable1 = $('#table').dataTable({
	    "oLanguage": {
		      "sUrl": base_url+"assets/js/dataTables.spanish.txt"
		    }
	}).columnFilter();

} );