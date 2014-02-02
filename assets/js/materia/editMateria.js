const semanasSemestre = 16;
const horasCredito = 48;
$(window).load(function(){

/*$.ajax({
  dataType: "json",
  url: 'urlConfig',
  data: data,
  success: success
});*/

	$('#field-horas_teoricas,#field-horas_practicas').on('keyup',function(){
		var horasTeoricas = parseInt($('#field-horas_teoricas').val());
		var horasPracticas = parseInt($('#field-horas_practicas').val());
		var horasTotales = horasTeoricas + horasPracticas;
		var unidadesCredito = (horasTotales*semanasSemestre)/horasCredito;
		$('#field-total_horas').prop('readonly',true);
		$('#field-uni_credito').prop('readonly',true);
		unidadesCredito = Math.ceil(unidadesCredito);
		$('#field-total_horas').val(horasTotales);
		$('#field-uni_credito').val(unidadesCredito);
	});

});