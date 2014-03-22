$(function(){

	$("#docente").change(function(){
		$(".lead").hide();
		$("#par").empty();
		$("#impar").empty();

		$.post(base_url+'plan_evaluacion/call_get_mat_plan', {'ci': $(this).val()}, function(data, textStatus, xhr) {
			$("#materias").empty();
			$("#materias").append('<option value=""> </option> ');
			$.each(data, function (index, item) {
				$("#materias").append('<option value='+item.codigo+' nombre='+item.nombre+'> '+item.codigo+' - '+item.nombre+'</option>');
			});
			$("#materias").append('<option value="all"> Todas </option> ');
		});

		$.post(base_url+'plan_evaluacion/call_get_plan_evaluacion', {'ci': $(this).val()}, function(data, textStatus, xhr) {
			$.each(data, function(index, item) {

				if($("#par").children().length < $("#impar").children().length){
					var wid = $("#prueba").clone().appendTo("#par").attr("id",index).attr("mat", item.codigo).show();
					$(wid).find('.info-prof').html($("#docente option:selected").attr('nombre') + " (" + item.nombre + ")" );
					
					$.each(item.eval, function(i, val) {
						var html = "<tr><td class='center'>"+(i+1)+"</td>";
						html +=	"<td class='center'>"+val.descripcion+"</td>"				
						html +=  "<td class='center'>"+val.porcentaje+"</td></tr>";
						$(wid).find('.body').append(html);
					});

				}else{
					var wid = $("#prueba").clone().appendTo("#impar").attr("id",index).attr("mat", item.codigo).show();
					$(wid).find('.info-prof').html($("#docente option:selected").attr('nombre') + " (" + item.nombre + ")" );
					
					$.each(item.eval, function(i, val) {
						var html = "<tr><td class='center'>"+(i+1)+"</td>";
						html +=	"<td class='center'>"+val.descripcion+"</td>"				
						html +=  "<td class='center'>"+val.porcentaje+"</td></tr>";
						$(wid).find('.body').append(html);
					});

				}
				
			});
		});
	});

	$("#materias").change(function(event) {
		$.each($("#impar").children(), function(index, el) {
			if($(this).attr('mat') != $("#materias").val()){
				$(this).hide();
			}else{
				$(this).show();
			}
		});	

		$.each($("#par").children(), function(index, el) {
			if($(this).attr('mat') != $("#materias").val()){
				$(this).hide();
			}else{
				$(this).show();
			}
		});

		if($(this).val() == "all"){
			$("#par").children().show();
			$("#impar").children().show();
		} 		
	
	});

});