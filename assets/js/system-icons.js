
$('.select-chosen').each(function(){
	for (x=0;x<iconArray.length;x++){
		if ($(this).val() != iconArray[x] ){
			$(this).append("<option value="+ iconArray[x] +"> <i class="+ iconArray[x] +">"+ iconArray[x] +"</i></option>");
		}
	}
});
/*$('.select-chosen').chosen();
$('.select-chosen').change(function(){
	$('#icon-system').attr('class', 'icon-white');
	$('#icon-system').addClass(this.value);
});*/

$('.select-chosen').chosen({
	no_results_text: "Vaya, no se ha encontrado!",
	enable_split_word_search: false,
	disable_search: false,
	search_contains: true,
	display_disabled_options: false
});