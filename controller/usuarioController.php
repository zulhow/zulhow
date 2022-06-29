<?php 

	class UsuarioController
	{
		public $pages = "";
		public function login()
		{
			//LIMPIAR datos.
			$email = htmlentities($_POST["email"],ENT_COMPAT,"UTF-8");
			$password = htmlentities($_POST["password"],ENT_COMPAT,"UTF-8");
			$array = ["email"=>$email];
			$respuesta = UsuarioModel::login($array);
			if (password_verify($password, $respuesta['password'])) {
			    $login = true;
			} else {
			    $login = false;
			}
			//Respuesta es true , osea trajo una fila
			if ($login) {
				$_SESSION['id'] = $respuesta["id"];
				$_SESSION['email'] = $respuesta["email"];
				$_SESSION['es_admin'] = $respuesta["es_admin"];
				$_SESSION['domicilio'] = $respuesta["domicilio"];
				$_SESSION['imagen'] = $respuesta["imagen"];
				$_SESSION['telefono'] = $respuesta["telefono"];
				$_SESSION['nombre_completo'] = $respuesta["nombre_completo"];
				header("location:/perfil/_exito-login");
			}
			//ERROR de SQL, ver el prepare()
			else{
				header("location:/login/_error");
			}
		}
		public function recuperar_password(){
			$email = htmlentities($_POST["email"],ENT_COMPAT,"UTF-8");
			$respuesta = UsuarioModel::login(array("email"=>$email));
			if ($respuesta != 0) {
				$code = rand(10000, 999999);
				$message = "<h2>Proceso de recuperacion de contraseña</h2> 
				<p>Usted a solicitado un correo de recuperacion, el codigo de recuperacion es: <b>".$code."</b><p> <br><a href='zulhow.com/cambiar_password/".$code."'>LINK DE RECUPERACION</a><p>Muchas gracias!</p>";
				$subject = "Email de recuperacion : ZULHOW";
				$respuesta_email = MailerController::sendEmail($email,$message,$subject);
				if ($respuesta_email) {
					usuarioModel::recuperar_password(array("code"=>$code,"email"=>$email));
					header("location:/recuperar_password/_exito");

				}
				else{
					header("location:/recuperar_password/_error-mail");

				}
			}
			else{
				header("location:/recuperar_password/_error");
			}
		}
		public function cambiar_password(){
			$email = htmlentities($_POST["email"],ENT_COMPAT,"UTF-8");
			$code = htmlentities($_POST["code"],ENT_COMPAT,"UTF-8");
			$password = htmlentities($_POST["password"],ENT_COMPAT,"UTF-8");
			$password2 = htmlentities($_POST["password2"],ENT_COMPAT,"UTF-8");
			if ($password == $password2) {
				$ok = true;
			}
			else{
				$ok = false;
			}
			if ($ok == true) {
				$password = password_hash($password, PASSWORD_DEFAULT);
				$array = ["code"=>$code,"email"=>$email,"password"=>$password,"password2"=>$password2];
				$check = usuarioModel::verificarCodigo($array);
				if (count($check) > 0) {
					$cambiado = usuarioModel::cambiar_password($array);
					if ($cambiado) {
						header("location:/login/cambio");
					}
				}
			}
		}
		public function cambiarImagen()
		{
			$allowedType = ["jpg","png","jpeg"];
			$target_file = basename($_FILES['imagen']["name"]);
			$maxSize = 1000000;
			$uploadOk = 1;
			$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
			// Check if image file is a actual image or fake image
			
			$check = getimagesize($_FILES["imagen"]["tmp_name"]);
			if($check !== false) {
				$uploadOk = 1;
			} else {
				$uploadOk = 0;
			}
			// Check file size
			if ($_FILES["imagen"]["size"] > $maxSize) {
				$uploadOk = 0;
			}
			// Allow certain file formats
			if(!in_array($imageFileType, $allowedType)) {
				$uploadOk = 0;
			}
			if ($uploadOk == 1) {
				$imagen = base64_encode(file_get_contents($_FILES["imagen"]["tmp_name"])); 
				$array = ["id"=>$_SESSION['id'],"imagen"=>$imagen];
				$respuesta = usuarioModel::cambiarImagen($array);
				if ($respuesta == true) {
					$_SESSION['imagen'] = $imagen;
					header("location:/perfil/img-exito");
				}
				else{
					header("location:/perfil/img-error");
				}
			}
		}
		public function editarPerfil()
		{
			$id = htmlentities($_POST["id"],ENT_COMPAT,"UTF-8");
			$email = htmlentities($_POST["email"],ENT_COMPAT,"UTF-8");
			$nombre_completo = htmlentities($_POST["nombre_completo"],ENT_COMPAT,"UTF-8");
			$telefono = htmlentities($_POST["telefono"],ENT_COMPAT,"UTF-8");
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
			if ($error == "") {
				$array = ["id"=>$id,"email"=>$email,"nombre_completo"=>$nombre_completo,"telefono"=>$telefono];
				$respuesta = usuarioModel::editarPerfil($array);
				if ($respuesta) {
					$_SESSION['email'] = $array["email"];
					$_SESSION['telefono'] = $array["telefono"];
					$_SESSION['nombre_completo'] = $array["nombre_completo"];
					header("location:/perfil/_editar-exito");
				}else{
					header("location:/editar_editar/_error");
				}
			}
			else{
				header("location:/editar_perfil/".$error);
			}
		}
		public function registro()
		{
			$email = htmlentities($_POST["email"],ENT_COMPAT,"UTF-8");
			$password = htmlentities($_POST["password"],ENT_COMPAT,"UTF-8");
			$password2 = htmlentities($_POST["password2"],ENT_COMPAT,"UTF-8");
			$nombre_completo = htmlentities($_POST["nombre_completo"],ENT_COMPAT,"UTF-8");

			$error = "";// _pass_nombre

			if ($password != $password2) {
				$error .= "_pass";
			}
			if (strlen($nombre_completo) < 7) {
				$error .= "_nombre";
			}
			if (strlen($email) < 6) {
				$error .= "_email";
			}
			//Ningun error de validacion
			if ($error == "") {

    			$password = password_hash($password, PASSWORD_DEFAULT);
				$array = ["email"=>$email,"password"=>$password,"nombre_completo"=>$nombre_completo];
				$respuesta = UsuarioModel::registro($array);
				//Se registro el usuario
				if ($respuesta == true) {
					header("location:/login/_registro-exito"); 
				}
				//Sucedio un error de sintaxis en el modelo o la base de dato es diferente a la sentencia.
				else{
					header("location:/registro/error_db"); 
				}
			}
			//Problema en la validacion ,error NO es igual a ""
			else{
				header("location:/registro/".$error); 
			}
		}
	}
	
 ?>

 