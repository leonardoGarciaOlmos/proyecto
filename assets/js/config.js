var mes = ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'];

$(function(){

	for (var i = 1, limit = 31; i <= limit; i++) {
		$(".date-d").append("<option>"+i+"</option>");
	}

	$.each(mes,function(pos,item){
		$(".date-m").append("<option>"+item+"</option>");
	});


	var json;
	$.ajaxSetup({async:false});
	$.post(base_url+"config/read", function(data){
		json = data;
	});


	$("#valor_uc").val(json.config.udc.valor_udc);

	$.getJSON(base_url+"config/load", function(data){
		$.each(data, function(pos, item){
			$("#carrera").append("<option cod='"+item.id+"'>"+item.nombre+"</option>");
		});
	});

	$("#carrera").change(function(){
		$.each(json.config.cupos, function(pos,item){
			if(item.nombre == $("#carrera").val()){
				$("#num_cupos").val(item.cantidad)
			}
		});
	});

	$("#save_cupos").click(function(){
		var obj = {};
		obj.id = $("option:selected","#carrera").attr("cod");
		obj.nombre = $("#carrera").val();
		obj.cantidad = $("#num_cupos").val();
		obj2= obj;
		$.post(base_url+"config/save", {"datos":obj, "header":"cupos"},function(){

	 	});
	});


	$("#save_udc").click(function(){
		var obj = {};
		obj.valor_udc = $("#valor_uc").val();

		$.post(base_url+"config/save", {"datos":obj, "header":"udc"},function(){

	 	});
	});



})