$(document).on('ready',function(){

	setTimeout(function(){
	  today = new Date();
	  yearDatepicker = today.getFullYear()-18;
	  maxYear=today.getFullYear()-10;
	  minYear=today.getFullYear()-100;
	  $( ".hasDatepicker" ).datepicker( "option", {"defaultDate":"-28y", "yearRange": minYear+":"+maxYear } );
	},1000);

});