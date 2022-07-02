<?php 

class ContactoController
{
	
	public function enviarContacto()
	{
		$nombre_completo = htmlentities($_POST["nombre_completo"],ENT_COMPAT,"UTF-8");
		$email = htmlentities($_POST["email"],ENT_COMPAT,"UTF-8");
		$telefono = htmlentities($_POST["telefono"],ENT_COMPAT,"UTF-8");
		$cliente = htmlentities($_POST["cliente"],ENT_COMPAT,"UTF-8");
		$mensaje = htmlentities($_POST["mensaje"],ENT_COMPAT,"UTF-8");
		$error = "";
		if (strlen($nombre_completo) < 7) {
			$error .= "_nombre";
		}
		if (strlen($telefono) < 6) {
			$error .= "_telefono";
		}
		if (strlen($email) < 6) {
			$error .= "_email";
		}
		if (strtolower($cliente) != "si" AND strtolower($cliente) != "no") {
			$error .= "_cliente";
		}
		if (strlen($mensaje) < 1) {
			$error .= "_mensaje";
		}
		if ($error == "") {
			$array = ["email"=>$email,"nombre_completo"=>$nombre_completo,"telefono"=>$telefono,"cliente"=>$cliente,"mensaje"=>$mensaje];
			$message = "
				<i>Mensaje enviado desde el formulario de Contacto zulhow.herokuapp.com</i>
				<p>El usuario:<b>".$nombre_completo."</b> - <b>".$email."</b>,telefono: <b>".$telefono."</b></p>
				<p>Mensaje:<br>".$mensaje."</p>
			 ";
			if ($cliente == "si") {
				$subject = "CONTACTO de cliente | zulhow.herokuapp.com";
			}
			if ($cliente == "no") {
				$subject = "CONTACTO de no-cliente | zulhow.herokuapp.com";
			}

			$respuesta = MailerController::sendEmail("zulhowtest@gmail.com",$message,$subject);
			if ($respuesta) {
				header("location:/contacto/_exito"); 
			}
			else{
				header("location:/contacto/_error_db"); 

			}
		}
		//Problema en la validacion ,error NO es igual a ""
		else{
			header("location:/contacto/".$error); 
		}

	}
}

 ?>