    <div class="container">
      <div class="container mt-2">
        <div class="row d-flex justify-content-center">
          <div class="col-md-9">
            <div>
              <div class="d-flex justify-content-center">
                <?php if (isset($_GET["id"]) AND strpos($_GET["id"], "exito") != false): ?>
                  <div>
                    <div class="alert alert-success" role="alert">
                      <div>
                          ¡Mensaje de contacto enviado exitosamente!
                      </div>                 
                    </div>
                  </div>
                <?php endif; ?>
                <?php if (isset($_GET["id"]) AND strpos($_GET["id"], "error_db") != false): ?>
                  <div>
                    <div class="alert alert-danger" role="alert">
                      <div>
                          Error inesperado, vuelva a intentarlo o espere y envie mas tarde.
                      </div>                 
                    </div>
                  </div>
                <?php endif; ?>
              </div>
              
              <div>
                <form method="POST" class="px-5">
                 <div class="form-group">
                    <label>Nombre y Apellido:</label>
                    <input type="text" name="nombre_completo" id="nombre_completo" class="form-control input_user" />
                  </div>

                  <?php if (isset($_GET["id"]) AND strpos($_GET["id"], "nombre") != false): ?>
                  <div>
                    <div class="alert alert-danger" role="alert">
                      <div>
                          El nombre debe tener al menos 7 caracteres o mas.
                      </div>                 
                    </div>
                  </div>
                <?php endif; ?>

                <div class="form-group">
                    <label>Teléfono:</label>
                    <input type="number" name="telefono" class="form-control input_user" />
                  </div>

                  <?php if (isset($_GET["id"]) AND strpos($_GET["id"], "telefono") != false): ?>
                  <div>
                    <div class="alert alert-danger" role="alert">
                      <div>
                          El numero de telefono debe tener al menos 6 caracteres o mas.
                      </div>                 
                    </div>
                  </div>
                <?php endif; ?>
                  
                  <div class="form-group">
                   <label>Email:</label>
                    <input type="email" name="email" id="email" class="form-control input_user" />
                  </div>

                  <?php if (isset($_GET["id"]) AND strpos($_GET["id"], "email") != false): ?>
                  <div>
                    <div class="alert alert-danger" role="alert">
                      <div>
                          El email debe tener mas de 6 caracteres.
                      </div>                 
                    </div>
                  </div>
                <?php endif; ?>

                <div class="form-group">
                   <label>Cliente:</label>
                    <input type="text" name="cliente" id="cliente" class="form-control input_user" placeholder="Si o No" />
                </div>

                  <?php if (isset($_GET["id"]) AND strpos($_GET["id"], "cliente") != false): ?>
                  <div>
                    <div class="alert alert-danger" role="alert">
                      <div>
                          El cliente debe tener 2 caracteres , que diga "si" o "no".
                      </div>                 
                    </div>
                  </div>
                <?php endif; ?>
                
                <div class="form-group">
                   <label>Mensaje:</label>                   
                    <textarea class="form-control input_user" id="mensaje" name="mensaje" required=""></textarea>
                </div>

                  <?php if (isset($_GET["id"]) AND strpos($_GET["id"], "mensaje") != false): ?>
                  <div>
                    <div class="alert alert-danger" role="alert">
                      <div>
                          El mensaje no debe estar vacio.
                      </div>                 
                    </div>
                  </div>
                <?php endif; ?>

                  <div class="form-group mt-4">
                    <input id="limpieza" value="Limpiar" type="reset" class="btn btn-primary btn-lg"/>
                    <button id="btn-env-contacto" type="submit" class="btn btn-primary btn-lg" name="enviar"></i>Enviar</button>                  
                  </div>
                </form>
                <?php 
                  if (isset($_POST['enviar'])) {
                    /*INSTANCIAMOS la clase Usuario , y la variable $a se convierte en un OBJETO. Osea en una copia de la clase.*/
                    $a = new ContactoController;
                    $a->enviarContacto();
                  }
                ?>
              </div>
            </div>
            </div>
          </div>
        </div>
      </div>

