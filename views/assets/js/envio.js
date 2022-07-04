function franja_horaria(element){
	let seleccionado = element.options[element.selectedIndex].value;
	let select = document.getElementById("franja_fin").options;
	
	//console.log(select);
	let nuevas_opciones = "";
	seleccionado++;
	for (var i = seleccionado; i < 25; i++) {
		nuevas_opciones += "<option value=\""+i+"\" >"+i+":00</option>";
	}
	document.getElementById("franja_fin").innerHTML = nuevas_opciones;
}
let nombre_completo;let email;let domicilio;let telefono;let origen_provincia;let origen_localidad;

let nombre_completo2;let email2;let domicilio2;let telefono2;let destino_provincia;let destino_localidad;
let franja_inicio;let tamano_caja;

function form_envios(element){
	event.preventDefault();//Detiene el envio del formulario
	let errores = document.querySelectorAll(".error");
	Array.prototype.forEach.call(errores, (child) => {
	    child.classList.remove("active");
	});

	nombre_completo = document.querySelector("#nombre_completo");
	email = document.querySelector("#email");
	telefono = document.querySelector("#telefono");
	domicilio = document.querySelector("#domicilio");
	origen_provincia = document.querySelector("#origen_provincia");
	origen_localidad = document.querySelector("#origen_localidad");

	nombre_completo2 = document.querySelector("#nombre_completo2");
	email2 = document.querySelector("#email2");
	telefono2 = document.querySelector("#telefono2");
	domicilio2 = document.querySelector("#domicilio2");
	destino_provincia = document.querySelector("#destino_provincia");
	destino_localidad = document.querySelector("#destino_localidad");

	franja_inicio = document.querySelector("#franja_inicio");
	tamano_caja = document.querySelector("#tamano_caja");
	let franja_inicio_value = franja_inicio.options[franja_inicio.selectedIndex].value;
	let tamano_caja_value = tamano_caja.options[tamano_caja.selectedIndex].value;
	let origen_prov_value = origen_provincia.options[origen_provincia.selectedIndex].value;
	let origen_loc_value;
	if (typeof origen_localidad.options[origen_localidad.selectedIndex] != "undefined") {
		origen_loc_value = origen_localidad.options[origen_localidad.selectedIndex].value;
	}
	else{
		origen_loc_value = -1;
	}

	let destino_prov_value = destino_provincia.options[destino_provincia.selectedIndex].value;
	let destino_loc_value;
	if (typeof destino_localidad.options[destino_localidad.selectedIndex] != "undefined") {
		destino_loc_value = destino_localidad.options[destino_localidad.selectedIndex].value;
	}
	else{
		destino_loc_value = -1;
	}
	//Limpiar todos active en todos los elementos error del formulario , para que cuando vuelva a enviar el formulario no queden activos errores ya reparados.
	let array_alertas = document.querySelectorAll(".error");//Coleccion de errores

	//Pasamos una vez por cada alerta 
	array_alertas.forEach((alerta)=>{
		alerta.classList.remove("active");
	});

	let error = false;//si conserva error = false
	/*ORIGEN*/
	if (nombre_completo.value.length < 3) {
		error = true;
		nombre_completo.parentNode.querySelector(".error").classList.add("active");
	}
	if (email.value.length < 5) {
		error = true;
		email.parentNode.querySelector(".error").classList.add("active");
	}
	if (telefono.value.length < 4) {
		error = true;
		telefono.parentNode.querySelector(".error").classList.add("active");
	}
	if (domicilio.value.length < 3) {
		error = true;
		domicilio.parentNode.querySelector(".error").classList.add("active");
	}
	if (origen_prov_value == -1) {
		error = true;
		origen_provincia.parentNode.querySelector(".error").classList.add("active");
	}
	if (origen_loc_value == -1) {
		error = true;
		origen_localidad.parentNode.querySelector(".error").classList.add("active");
	}
	/*DESTINO*/
	if (nombre_completo2.value.length < 3) {
		error = true;
		nombre_completo2.parentNode.querySelector(".error").classList.add("active");
	}
	if (email2.value.length < 5) {
		error = true;
		email2.parentNode.querySelector(".error").classList.add("active");
	}
	if (telefono2.value.length < 4) {
		error = true;
		telefono2.parentNode.querySelector(".error").classList.add("active");
	}
	if (domicilio2.value.length < 3) {
		error = true;
		domicilio2.parentNode.querySelector(".error").classList.add("active");
	}
	if (destino_prov_value == -1) {
		error = true;
		destino_provincia.parentNode.querySelector(".error").classList.add("active");
	}
	if (destino_loc_value == -1) {
		error = true;
		destino_localidad.parentNode.querySelector(".error").classList.add("active");
	}
	if (franja_inicio_value == -1) {
		console.log(franja_inicio.parentNode.querySelector(".error"));
		error = true;
		franja_inicio.parentNode.querySelector(".error").classList.add("active");
	}
	if (tamano_caja_value == -1) {
		error = true;
		tamano_caja.parentNode.querySelector(".error").classList.add("active");
	}
	if (error == false) {
		element.submit();
	}
	
};