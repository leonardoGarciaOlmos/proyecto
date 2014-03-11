var matter;
var teacher;
$(function () {

    $.ajax({
        url: base_url+"horario/Call_materias_profe",
        async: false,
        dataType: 'json',
        success: function(data) {
            matter = data.materias;
            teacher = data.profesores;
        }
    });
    
    $("tbody td:not(.horas)").addClass("ui-widget-content");
    $("#format").selectable({
            filter:"td:not(.horas)",
            autoRefresh: false,
            stop:function(){
                
            },
            selected: function( event, ui ) {
                 dialog();
            }
    });

    $.each(matter.data ,function (index, item) {
        carga_seminario(item.id, index);
    });

    $.each(matter.data, function (pos, item) {
        $("#matter").append("<option value=" + item.id + " nom='" + item.materia + "'>" + item.materia + "</option>");
    });

    $("#matter").change(function () {
        $("#occupied").empty();
        $("option:not(:first)", "#teacher").remove();
        verificar_seminario($("option:selected", "#matter").val());  
        var mat = $(this);
        $.each(teacher.data, function (pos, item) {
            $.each(item.materia, function (posm, itemm) {
                if ($("option:selected", mat).val() == itemm.id) {
                    $("#teacher").append("<option value=" + item.id + " nom='" + item.nombre + "'>" + item.nombre + "</option>");
                }
            });
        });
    });

    $("#teacher").change(function () {
        var teach = $(this);
        $("#occupied").empty();
        $.each(teacher.data, function (pos, item) {
            if (item.id == $("option:selected", teach).val()) {
                $.each(item.ocupado, function (poso, itemo) {
                    $("#occupied").append("<p style='color:red' data-dia='"+itemo.dia+"' data-hora='"+itemo.hora+"'>" + itemo.dia + " (" + itemo.hora + ")</p>")
                });
            }
        });
    });
    
    function clearString(str){
       str = str.split(" ").join("");
       str = str.split(":").join("");
       str = str.split("-").join("");
       return str;
    }
    
    function validaHoras(){
        var response = "valid";
        $("#occupied").children().each(function(){
        var thoras=$(this).attr("data-hora");
        var tdias=$(this).attr("data-dia").toUpperCase(); 
            
            $(".ui-selected").each(function(){
                var horas= $(this).parents("tr").attr("data-hora");
                var dias = $(this).attr("data-dia").toUpperCase();
                if((thoras == horas) && (tdias == dias)){
                    $("#alert").show();
                    $("#notification").html("Disculpe, el docente esta ocupado en una de las horas seleccionada. Por favor verifique y vuelva a intentarlo.");
                    response = "invalid";
                    return false;                    
                }
            });
        });
        return response;
    }

    function insertarMateria(matt, teacher, ci, cod_mat) {
      $(".ui-selected").each(function() {
            $(this).children().remove();
      });
        $(".ui-selected").each(function() {
            $(this).append("<span class='data_h' mat="+cod_mat+" ci="+ci+"><p class='text-error'>" + matt + "</p><p ci="+ci+" class='text-info'>" + teacher + "</p></span>");
        });
        
        $("#format td").removeClass("ui-selected");
    }
    
    function dialog(a) {
      $("#notification").html("");
        $("#modal").modal('show');
        $('#insert_info').click(function(){
            if (($("option:selected", "#matter").val() == "vacio") || ($("option:selected", "#teacher").val()=="vacio")) {
                $("#alert").show();
                $("#notification").html("Debe seleccionar materia y docente");
                return false;
                  
            }else{   
                           
                if(validaHoras()=="valid"){
                    $.each(teacher.data,function(index, el) {
                        $.each(teacher.data[index].materia, function (pos, item){
                            if(item.id == $("option:selected", "#matter").val()){
                               teacher.data[index].materia[pos].seminario = $("#seminario").val();
                            }
                        });
                    });

                    insertarMateria($("option:selected", "#matter").attr("nom"), $("option:selected", "#teacher").attr("nom"),$("#teacher").val(),$("#matter").val());
                    $('#modal').modal('hide');
                }else{
                    return false;
                }
           }
        });

        $('#borrar').click(function(){
            $(".ui-selected").each(function(){
                var ci = $(this).children().attr('ci');
                var mat = $(this).children().attr('mat');
                var selected = $(this);
                var datapos;
                var ocupadoposo;

                $.each(matter.data, function (pos, item){
                    if(item.id == mat){
                        matter.data[pos].seminario = 0;
                    }
                });

                $.each(teacher.data, function (pos, item) {
                    if (item.id == ci) {
                        $.each(item.ocupado, function (poso, itemo) {
                            if(itemo.bloque == $(selected).attr("id")){
                                datapos = pos;
                                ocupadoposo = poso;
                            }
                        });
                    }
                });
                $(this).children().remove();
                if(datapos != null){    
                    teacher.data[datapos].ocupado.splice(ocupadoposo,1);
                }
            });
        });

         $('#cerrar').click(function(){
            $('#modal').modal('hide');
        });
    }

    function insertar_data(){

        bootbox.confirm("¿Esta seguro que desea insertar esta informacion en el Horario?", function(result) {
            if(result) {
                $.each($('.data_h'), function(pos, item){
                    $.each(teacher.data, function(tpos, titem){
                        if(titem.id == $(item).attr("ci")){
                            $.each(titem.materia, function(mpos, mitem){
                                if(mitem.id == $(item).attr("mat")){
                                    if(teacher.data[tpos].materia[mpos].bloque){
                                        teacher.data[tpos].materia[mpos].bloque.push($(item).parents("td").attr("id"));                                
                                    }else{
                                        teacher.data[tpos].materia[mpos].bloque = [];
                                        teacher.data[tpos].materia[mpos].bloque.push($(item).parents("td").attr("id"));   
                                    }
                                }
                            });
                        }            
                    });
                });

                $.post(base_url+'horario/insert_data', teacher, function(data){
                    //$("#format").selectable("destroy");
                    $(".alert-success").show();
                    $("#insert_data").hide();
                });

                setTimeout(function() {
                    $(".alert-success").hide();
                }, 15000);
            }
        });
    }

    function verificar_seminario (materia) {
        $.post(base_url+'horario/call_verify_seminario', {"materia": materia}, function(data, textStatus, xhr) {
            if(data!=""){
                $.each(data, function(index, item) {
                    $("#seminario").append('<option value='+item.id+'>'+item.nombre+'</option>')
                });
                $("#modal_sem").modal("show");
                $("#save_sem").click(function(event) {
                    if($("#seminario").val()== "vacio"){
                        $("#alert_sem").show();
                        $("#notification").html("Disculpe, debe seleccionar un seminario");
                    }else{
                        $("#modal_sem").modal("hide");
                    }

                });
            }
        });
    }

    function carga_seminario (materia, id) {
        $.post(base_url+'horario/call_horario_seminario', {"materia": materia}, function(data, textStatus, xhr) {
            matter.data[id].seminario = data[0].seminario_id;
        });
    }

    $("#insert_data").click(function(){
        insertar_data();
    });

   // $("#consult").click(function(){
        $.getJSON(base_url+'horario/call_consulta_horario', function(data){
            $.each(data, function(pos,item){

                $("#"+item.bloque).append("<span class='data_h' mat = "+item.materia_codigo+" ci= "+item.ci+"><p class='text-error'>" + item.materia + "</p><p class='text-info'>" + item.nombre +" "+ item.apellido + "</p></span>");
                $("td").removeClass('');
            });
        });
  //  });

    if($('#tipo_consulta').attr('tipo') == "consulta"){
        $("#title").html("Consulta de Horarios");
        $("#format").selectable("destroy");
        $("#consult").click();
        $("#consult").hide();
        $("#insert_data").hide();
    }else{
        $("#consult").hide();
        $("#insert_data").show();
    }

});