var button = '<br><button onclick="return false;" id="buscar" class="btn btn-purple btn-small" >'+
              'Buscar<i class="icon-search icon-on-right bigger-110"></i>'+
              '</button>';
$(document).on('ready',function(){      

  $('#field-Dpto').on('change',function( ){
    var Dpto_id = $(this).val();
    $.ajax({
      dataType: "json",
      type: "GET",
      url: base_url+'carrera/carreraByDPTO/'+Dpto_id,
      success: function( data ) {
        generateSelect( data, '#field-carrera');
        $('.chosen-select').trigger("chosen:updated");
      }
    });
  });

  function generateSelect ( item , target ) {
    var html = '';
    for (var i = 0 ; i < item.length; i++) {
       html += '<option value="'+item[i].departamento_id+'">'+item[i].descripcion+'<option>';
    }
    $(target).html( html );
  }

  $('#crudForm').on('click','#buscar',function( ){
    var ci = $('#field-ci').val();
    $.ajax({
      dataType: "json",
      type: "POST",
      data:{ci:ci},
      url: base_url+'usuario/findByCI/',
      success: function( data ) {
        if (data.success) {
          renderData( data.user );
        }else{
          alert('No se ha encontrado ningún estudiante');
        }
      }
    });
  });

function renderData ( data ) {
  $.each(data, function(index, val) {
     $('#field-'+index).val(val);
     if(index=="Dpto"){
        $('#field-Dpto').trigger('change');
     }
  });
  $('.chosen-select').trigger("chosen:updated");

  $.each(data.requisitos, function(index, val) {
     $('#field-requisitos-'+val).prop('checked','checked');
  });
}

/*var button = '<button onclick="return false;" id="buscar" class="btn btn-purple btn-small" >'+
              'Buscar<i class="icon-search icon-on-right bigger-110"></i>'+
              '</button>';*/

$('#field-ci').parent().append(button);


$('#crudForm').attr('action','http://192.168.0.103/proyecto/usuario/preInscripcionadmin/insert');


validation_url  = "http://192.168.0.103/proyecto/usuario/preInscripcionadmin/update_validation";
});