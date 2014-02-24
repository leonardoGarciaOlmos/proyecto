if ('function' !== typeof Array.prototype.reduce) {
  Array.prototype.reduce = function(callback, opt_initialValue){
    'use strict';
    if (null === this || 'undefined' === typeof this) {
      // At the moment all modern browsers, that support strict mode, have
      // native implementation of Array.prototype.reduce. For instance, IE8
      // does not support strict mode, so this check is actually useless.
      throw new TypeError(
          'Array.prototype.reduce called on null or undefined');
    }
    if ('function' !== typeof callback) {
      throw new TypeError(callback + ' is not a function');
    }
    var index, value,
        length = this.length >>> 0,
        isValueSet = false;
    if (1 < arguments.length) {
      value = opt_initialValue;
      isValueSet = true;
    }
    for (index = 0; length > index; ++index) {
      if (this.hasOwnProperty(index)) {
        if (isValueSet) {
          value = callback(value, this[index], index, this);
        }
        else {
          value = this[index];
          isValueSet = true;
        }
      }
    }
    if (!isValueSet) {
      throw new TypeError('Reduce of empty array with no initial value');
    }
    return value;
  };
}



var table = [];
var def = [];

$(document).on('ready',function(){

	$('#format tbody tr').each(function(){
		var infotd = [];
		$(this).find('.note').each(function(){
			infotd.push($(this).val());
		});
		table.push(infotd);
	});
	console.dir(table);
	$('.note').numeric();

});



$('.note').on('change',function(){
	var notas = [];
	$(this).parents('tr').find('.note').each(function(){
		notas.push($(this).val());
	}).end().find('.def').html( calcularDefinitiva(plan, notas) );
});


function calcularDefinitiva( planEval, notasEstudiante ) {
	var aux = [];
	for (var i=0; i<planEval.length; i++) {
	    aux.push((parseInt(planEval[i].porcentaje) * parseInt(notasEstudiante[i]))/20); 
	}
    porcentajeDef = aux.reduce(function(pv, cv) { return pv + cv; }, 0);
	return (porcentajeDef * 20/100);
}


$(".note").on("keyup", function() {
    var val = Math.abs(parseInt(this.value, 10) || 0);
    this.value = val > 20 ? 20 : val;
});