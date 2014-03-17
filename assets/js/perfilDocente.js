$(document).ready(function(){
	$(".chosen-select").chosen({no_results_text: "Oops, Nada Encontrado!", width: "95%"}); 

	

	$("#carrera").change(function(event) {
		materias();
		carga_materias();
	});

	$("#guardar").click(function(){
		$.post(base_url+'perfil/Call_insert_materias', {"materias": $(".chosen-select").val(), "carrera_id":$("#carrera").val(), "ci":$("#ci").attr("ci")}, function(data){
			carga_materias();
			$("#alert1").show();
			setTimeout(function() {
                $("#alert1").hide();
            }, 5000);
            materias();
		});
	});

	$("#eliminar").click(function(){
		$.post(base_url+'perfil/Call_delete_materias', {"materias": $("#c_materias").val(), "ci":$("#ci").attr("ci")}, function(data){
			materias();
			$("#alert2").show();
			setTimeout(function() {
                $("#alert2").hide();
            }, 5000);

            $("#materias").trigger("chosen:updated");
		});
	});


	function carga_materias(){
		$.post(base_url+'perfil/Call_get_materias', {"carrera_id":$("#carrera").val(), "ci":$("#ci").attr("ci")}, function(data){
			$("#materias").empty();

			$.each(data, function(pos, item){
				$("#materias").append("<option value="+item.codigo+">"+item.nombre+" ("+item.codigo+")</option>");
			});

			$("#materias").trigger("chosen:updated");
		});
	}

	function materias(){
		$.post(base_url+'perfil/Call_get_materias_doc', {"carrera_id":$("#carrera").val(), "ci":$("#ci").attr("ci")}, function(data){
			$("#c_materias").empty();

			$.each(data, function(pos, item){
				$("#c_materias").append("<option value="+item.codigo+">"+item.nombre+" ("+item.codigo+")</option>");
			});

		});
	}



});