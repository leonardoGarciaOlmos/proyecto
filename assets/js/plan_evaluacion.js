$(function () {

	$("#carrera").change(function(){
		$("#materia").empty();
		$("#materia").append("<option value=''>&nbsp;</option>");
		$.post(base_url+'plan_evaluacion/call_get_materias', {"carrera_id": $("option:selected",this).val()}, function(data){
			$.each(data, function(pos, item){
				$("#materia").append("<option value = "+item.codigo+" materia = "+item.nombre+">"+item.nombre+"("+item.codigo+")</option>");
			});
		});
	});

	$("#materia").change(function(){
		$.post(base_url+'plan_evaluacion/call_get_plan', {"materia": $("option:selected",this).val(), "carrera": $("option:selected", "#carrera").val(), "profesor":"20748439"}, function(data){
			$("#evaluaciones").empty();
			var total = 0;
			$("#evaluaciones").attr('total', total);

			if(data != null){
				$.each(data, function(pos, item) {
					$("#evaluaciones").append("<option nombre ="+item.descripcion+" value="+item.porcentaje+">"+item.descripcion+" ("+item.porcentaje+"%)</option>");
					total = total + parseInt(item.porcentaje);
				});

				$("#evaluaciones").attr('total', total);
			}
		});
	});

	$("#delete").click(function(){
		if ($("#evaluaciones > option").length > 0){
			$("#evaluaciones").attr("total", $("#evaluaciones").attr("total") - $("option:selected", "#evaluaciones").val());
			$("option:selected", "#evaluaciones").remove();
		}
	});

	$("#add").click(function(){
		var subtotal = parseInt($("#evaluaciones").attr("total"));
		var total = subtotal + parseInt($("#num_eval").val());

		if($("#nom_eval").val() != "" && $("#num_eval").val() != "" && $("#num_eval").val() <= 60 && total <= 100 && $("#evaluaciones > option").length < 8){
			$("#evaluaciones").append("<option nombre ="+$("#nom_eval").val()+" value="+$("#num_eval").val()+">"+$("#nom_eval").val()+" ("+$("#num_eval").val()+"%)</option>");
			$("#nom_eval").val("");
			$("#num_eval").val("");
			$("#evaluaciones").attr("total",total);
			
		}else{
			$(".well").addClass("alert-error");
			setTimeout(function() {
                $(".well").removeClass("alert-error");
            }, 5000);
		}
	});

	$("#guardar").click(function(event) {
		if($("#evaluaciones").attr('total') == 100){
			save_plan();
			$("#evaluaciones").empty();
			$("#materia").empty();
			$("#carrera").val("");
			$(".alert").show();
			setTimeout(function() {
                $(".alert").hide();
            }, 5000);
		}else{
			$(".well").addClass("alert-error");
			setTimeout(function() {
                $(".well").removeClass("alert-error");
            }, 5000);
		}
		
	});

	function save_plan(){
		var json = {};

		json.carrera_id = $("#carrera").val();
		json.materia = $("#materia").val();
		json.profesor = "20748439";
		json.evaluaciones = [];

		$.each($("#evaluaciones > option"), function(pos, item) {
			json.evaluaciones.push({
		        nom_eval: $(item).attr("nombre"),
		        num_eval: $(item).val()
		    });
		});

		$.post(base_url+"plan_evaluacion/call_save_plan", {"plan":json}, function(data, textStatus, xhr) {
			/*optional stuff to do after success */
		});
	}





});  