// In your Javascript (external .js resource or <script> tag)
$(document).ready(function() {
    $('.js-select2-localidad-1').select2();
    $('.js-select2-localidad-2').select2();
    $('.js-select2-localidad-1').select2("enable",false);
    $('.js-select2-localidad-2').select2("enable",false);
});



function ajaxProvincias(element,tipo){
	let provinciaSelecion = element.options[element.selectedIndex].value;
	let select_localidad = document.getElementById(tipo+"_localidad");
	$.ajax({
		"type":"get",
		"dataType":"json",
		"data":{provincia:provinciaSelecion},
		"url":"controller/ajax.php",
		success:function(respuesta){
			//Limpiar el select
			select_localidad.innerHTML = "";

			let opciones = "<option value='-1'>Elija el destino</option>";
			for (var i = respuesta.length - 1; i >= 0; i--) {
				opciones += "<option value='"+respuesta[i].id+"'>"+respuesta[i].localidad+"</option>";
			}
			select_localidad.select2("enable");
			select_localidad.innerHTML = opciones;
		}
	});
}