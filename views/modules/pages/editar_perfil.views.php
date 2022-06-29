<h1 class="panel-title2 text-center mb-4">Editar perfil</h1>
<div class="container mt-5" id="editar_perfil">
	<form method="post" class="" enctype="multipart/form-data">
        <div class="row justify-content-center">
            <div class="form-group col-4 mb-5">
                
            </div>
        </div>
        <div class="row justify-content-center"> 
            <div class="form-group col-9 mb-5">
                <input type="text" class="form-control" name="email" placeholder="Email"
                 value="<?= $_SESSION["email"] ?? "" ?>">
            <?php if (isset($_GET["id"]) AND strpos($_GET["id"], "email") != false): ?>
                  <div>
                    <div class="alert alert-danger mb-0" role="alert">
                      <div>
                          El email debe tener mas de 6 caracteres.
                      </div>                 
                    </div>
                  </div>
            <?php endif; ?>
            </div>
            <div class="form-group col-9 mb-5">
                <input type="text" class="form-control" name="nombre_completo" placeholder="Nombre completo" value="<?= $_SESSION["nombre_completo"] ?? "" ?>" >
            <?php if (isset($_GET["id"]) AND strpos($_GET["id"], "nombre") != false): ?>
                  <div>
                    <div class="alert alert-danger mb-0" role="alert">
                      <div>
                          El nombre debe tener al menos 7 caracteres o mas.
                      </div>                 
                    </div>
                  </div>
            <?php endif; ?>
            </div>
            <div class="form-group col-9 mb-5">
                <input type="text" class="form-control" name="telefono" placeholder="Telefono"  value="<?= $_SESSION["telefono"] ?? "" ?>">
            <?php if (isset($_GET["id"]) AND strpos($_GET["id"], "telefono") != false): ?>
                  <div>
                    <div class="alert alert-danger mb-0" role="alert">
                      <div>
                          El numero de telefono debe tener al menos 6 caracteres o mas.
                      </div>                 
                    </div>
                  </div>
            <?php endif; ?>
            </div>
            <input type="hidden" name="id" value="<?= $_SESSION["id"] ?>">
            <div class="form-group col-7 mb-5">
                <button type="submit" name="submit" class="btn w-100" id="btn-env-contacto">Guardar cambios</button>
            </div>
        </div>
	</form>
</div>
<?php 
    if(isset($_POST['submit'])){
        $a = new usuarioController;
        $a->editarPerfil();
    }
?>