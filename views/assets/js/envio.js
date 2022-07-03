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
let nombre_completo;
let email;

function form_envios(){
	nombre_completo = document.querySelector("#nombre_completo");
	email = document.querySelector("#email");
	event.preventDefault();//Detiene el envio del formulario

	//Limpiar todos active en todos los elementos error del formulario , para que cuando vuelva a enviar el formulario no queden activos errores ya reparados.
	let array_alertas = document.querySelectorAll(".error");//Coleccion de errores

	//Pasamos una vez por cada alerta 
	array_alertas.forEach((alerta)=>{
		alerta.classList.remove("active");
	});

	let error = false;//si conserva error = false
	if (nombre_completo.value.length < 3) {
		error = true;
		nombre_completo.parentNode.querySelector(".error").classList.add("active");
	}
	if (email.value.length < 5) {
		error = true;
		email.parentNode.querySelector(".error").classList.add("active");
	}
	
};