$(function () {


    $.getJSON(base_url+'horario/call_consulta_horario_user', function(data){
        $.each(data, function(pos,item){

            $("#"+item.bloque).append("<span class='data_h' mat = "+item.materia_codigo+" ci= "+item.ci+"><p class='text-error'>" + item.materia + "</p><p class='text-info'>" + item.nombre +" "+ item.apellido + "</p></span>");
            $("td").removeClass('');
        });
    });
  //  });

    if($('#tipo_consulta').attr('tipo') == "consulta"){
        $("#title").html("Consulta de Horarios");
        $("#consult").click();
        $("#consult").hide();
        $("#insert_data").hide();
    }else{
        $("#consult").hide();
        $("#insert_data").show();
    }
})