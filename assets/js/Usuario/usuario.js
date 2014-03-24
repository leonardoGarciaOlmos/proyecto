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
       html += '<option value="'+item[i].id+'">'+item[i].descripcion+'<option>';
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
  });
  $('.chosen-select').trigger("chosen:updated");
}

});