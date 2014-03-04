$(document).ready(function()
{

    $(".nota").on("change", function()
    {
        var objectInfo = new Object();
        objectInfo.nota = parseInt($(this).val());
        objectInfo.campo = $(this).attr("campo");
        objectInfo.estudiante = $(this).attr("estudiante");   
        objectInfo.plan = parseInt($(this).attr("plan"));

        $.ajax({
            url: base_url+'profesor/updateNotaEstudiante',
            data: {objectData: objectInfo},
            async: false,
            type: 'POST',
            success: function(data)
            {
            }
        });
    });

});