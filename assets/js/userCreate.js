$(function() {
	var fecha = new Date();
	$( "#inputDate" ).datepicker({
		changeMonth: true,
		changeYear: true,
		dateFormat: "mm/dd/yy",
		autoSize: true,
		duration: 'fast',
		maxDate: -1,
		yearRange: fecha.getFullYear()-100+":"+fecha.getFullYear(),
	});
});