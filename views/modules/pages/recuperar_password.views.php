<?php if (isset($_GET["id"]) AND strpos($_GET["id"], "error") != false): ?>
<div>
	<div class="alert alert-danger" role="alert">
	  <div class="text-center">
	      El email no coincide con ningun usuario, Ingrese su email correctamente.
	  </div>                 
	</div>
</div>
<?php endif; ?>
<?php if (isset($_GET["id"]) AND strpos($_GET["id"], "error-mail") != false): ?>
<div>
	<div class="alert alert-danger" role="alert">
	  <div class="text-center">
	      Error inesperado vuelva a intentarlo nuevamente.
	  </div>                 
	</div>
</div>
<?php endif; ?>
<?php if (isset($_GET["id"]) AND strpos($_GET["id"], "exito") != false): ?>
<div>
	<div class="alert alert-success" role="alert">
	  <div class="text-center">
	  	Email enviado correctamente! revise su correo para recibir el codigo de recuperacion.
	  </div>                 
	</div>
</div>
<?php endif; ?>
<div class="container mt-5" id="login">
	<h1 class="panel-title2 text-center mb-4">Recuperar contraseña</h1>
	<p class="text-center">
		Le enviaremos un correo de recuperacion de contraseña.
	</p>
	<form method="post" class="row justify-content-center">
		<div class="form-group col-7 mb-5">
			<input type="text" class="form-control" name="email" placeholder="Email">
		</div>
		<div class="form-group col-7 mb-5">
			<button type="submit" name="submit" class="btn w-100" id="btn-env-contacto">Recuperar</button>
		</div>
		<div class="form-group col-7 text-center">
			<a href="/login" class="link-dark">Ir al login</a>
		</div>
		<div class="form-group col-7 text-center">
			<a href="/registro" class="link-dark">Crear cuenta - Registro</a>
		</div>
	</form>
</div>
<?php 
	if (isset($_POST['submit'])) {
		/*INSTANCIAMOS la clase Usuario , y la variable $a se convierte en un OBJETO. Osea en una copia de la clase.*/
		$a = new UsuarioController;
		$a->recuperar_password();
	}
 ?>