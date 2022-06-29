<div class="container mt-5" id="login">
	<h1 class="panel-title2 text-center mb-4">Cambiar Contraseña</h1>
	<p class="text-center">
		Ha recibido el email de recuperacion , porfavor ingrese la nueva contraseña
	</p>
	<form method="post" class="row justify-content-center">
		<input type="hidden" name="code" value="<?= $_GET['id'] ?>">
		<div class="form-group col-7 mb-5">
			<input type="text" class="form-control" name="email" placeholder="Ingrese su email">
		</div>
		<div class="form-group col-7 mb-5">
			<input type="text" class="form-control" name="password" placeholder="Ingrese contraseña">
		</div>
		<div class="form-group col-7 mb-5">
			<input type="text" class="form-control" name="password2" placeholder="Repita contraseña">
		</div>
		<div class="form-group col-7 mb-5">
			<button type="submit" name="submit" class="btn w-100" id="btn-env-contacto">Cambiar</button>
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
		$a->cambiar_password();
	}
 ?>