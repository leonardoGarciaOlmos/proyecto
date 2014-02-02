$(function () {


	$('#carrera').change(function(){
		$.post(base_url+"horario/call_get_semestre", {'pensum':$('option:selected',this).attr('pensum')}, function(data){
			$.each(data, function(pos, item){
				$('#semestre').append('<option value="'+item.semestre+'">'+item.semestre+'</option>');
			});
		});
	});


	$('#g_horario').click(function(){
		if($('option:selected','#carrera').val() == "" || $('option:selected','#semestre').val() == ""){
			$("#error").show();
		}else{
			$("#principal").attr("action",base_url+"horario/all");
			$("#principal").submit();
		}
	});

	$('#c_horario').click(function(){
		if($('option:selected','#carrera').val() == "" || $('option:selected','#semestre').val() == ""){
			$("#error").show();
		}else{
			$("#principal").attr("action",base_url+"horario/consulta");
			$("#principal").submit();
		}
	});


	function verifica_campos(){
	if($('option:selected','#carrera').val() == "" || $('option:selected','#semestre').val() == ""){
		$('#g_horario').attr('href','');
		$('#c_horario').attr('href','');
		$("#error").show();
	}else{
		$('#g_horario').attr('href',base_url+'horario/all');
		$('#c_horario').attr('href',base_url+'horario/consulta');
	}
	}

});  