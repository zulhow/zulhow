<?php 

	class AyudaController
	{
		public function ayuda(){
			$email = htmlentities($_POST["email"],ENT_COMPAT,"UTF-8");
			$ayuda = htmlentities($_POST["ayuda"],ENT_COMPAT,"UTF-8");

			if ($ayuda == 1) {
				$message = 
				"<p>El usuario:<b>".$_SESSION['nombre_completo']. "</b> con email :".$_SESSION['email']. ". <br>
				<h3>Requiere un codigo de seguimiento de sus envios.</h3> <br>
				Responder al correo: <b>".$email."</b> 
				</p>";
				$subject = "AYUDA: Codigo de seguimiento";
				$email = "zulhowtest@gmail.com";
			}
			elseif ($ayuda == 2) {
				$message = 
				"<p>El usuario:<b>".$_SESSION['nombre_completo']. "</b> con email :".$_SESSION['email']. ". <br>
				<h3>Consulta sobre el tiempo que tarda en enviarse un paquete.</h3> <br>
				Responder al correo: <b>".$email."</b> 
				</p>";
				$subject = "AYUDA: Tiempo de envio de paquete";
				$email = "zulhowtest@gmail.com";
			}
			elseif ($ayuda == 3) {
				$message = 
				"<p>El usuario:<b>".$_SESSION['nombre_completo']. "</b> con email :".$_SESSION['email']. ". <br>
				<h3>El cliente pregunta cuales son los pasos para cancelar un envio.</h3> <br>
				Responder al correo: <b>".$email."</b> 
				</p>";
				$subject = "AYUDA: Cancelar envio";
				$email = "zulhowtest@gmail.com";
			}
			elseif ($ayuda == 4) {
				$message = 
				"<p>El usuario:<b>".$_SESSION['nombre_completo']. "</b> con email :".$_SESSION['email']. ". <br>
				<h3>Ponerse en contacto con el cliente por otro tipo de preguntas.</h3> <br>
				Responder al correo: <b>".$email."</b> 
				</p>";
				$subject = "AYUDA: Otras preguntas";
				$email = "zulhowtest@gmail.com";
			}
			$respuesta = MailerController::sendEmail($email,$message,$subject);
		}
	}
?>