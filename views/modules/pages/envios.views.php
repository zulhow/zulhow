<?php if (isset($_GET["id"]) AND strpos($_GET["id"], "error") != false): ?>
      <div>
        <div class="alert alert-danger mb-0 text-center" role="alert">
          <div>
              Error de envio, revise los datos y vuelva a enviar.
          </div>                 
        </div>
      </div>
<?php endif; ?>
<?php 
	$localidades = Loc_prov_Model::getLocalidad();
	$provincias = Loc_prov_Model::getProvincia();
?>
<section id="envios" class="container">
	<form method="post" class="row" id="form-envio" onSubmit="form_envios(this)">
		<h3 class="text-secondary">Origen</h3>
		<div class="form-group col-md-6">
			<label for="">Nombre completo</label>
			<input type="text" name="nombre_completo" class="form-control" id="nombre_completo">
			<div class="alert alert-danger mb-0 text-center error" role="alert">
        <div>
            Nombre: Debe tener al menos 3 caracteres.
        </div>                 
      </div>
			
		</div>
		<div class="form-group col-md-6">
			<label for="">Correo electronico</label>
			<input type="email" name="email" class="form-control" id="email" value="<?= $_SESSION['email'] ?>">
			<div class="alert alert-danger mb-0 text-center error" role="alert">
        <div>
            Correo: Debe tener al menos 5 caracteres.
        </div>                 
      </div>
		</div>
		<div class="form-group col-md-6">
			<label for="">Teléfono</label>
			<input type="number" name="telefono" class="form-control" id="telefono" value="<?= $_SESSION['telefono'] ?>">
			<div class="alert alert-danger mb-0 text-center error" role="alert">
        <div>
            Telefono: Debe tener al menos 4 numeros.
        </div>                 
      </div>
		</div>
		<div class="form-group col-md-6">
			<label for="">Domicilio</label>
			<input type="text" name="domicilio" class="form-control" id="domicilio" value="<?= $_SESSION['domicilio'] ?>">
			<div class="alert alert-danger mb-0 text-center error" role="alert">
        <div>
            Domicilio: Debe tener al menos 3 caracteres.
        </div>                 
      </div>
		</div>
		<div class="form-group col-md-6">
			<label for="">Provincia</label>
			<select name="origen_provincia" class="form-control" id="origen_provincia" onchange="ajaxProvincias(this,'origen')">
				<option value="-1">Elija el origen</option>
				<?php foreach ($provincias as $key => $value): ?>
					<option value="<?= $value["id"] ?>"><?= $value["provincia"] ?></option>
				<?php endforeach ?>
			</select>
			<div class="alert alert-danger mb-0 text-center error" role="alert">
        <div>
            Provincia: Debe seleccionar una provincia.
        </div>                 
      </div>
		</div>
		<div class="form-group col-md-6">
			<label for="">Localidad</label>
			<select name="origen_localidad" id="origen_localidad" class="form-control js-select2-localidad-1">
			</select>
			<div class="alert alert-danger mb-0 text-center error" role="alert">
        <div>
            Localidad: Debe seleccionar una localidad.
        </div>                 
      </div>
		</div>
		<h3 class="text-secondary">Destino</h3>
		<div class="form-group col-md-6">
			<label for="">Nombre completo</label>
			<input type="text" name="nombre_completo2" id="nombre_completo2" class="form-control">
			<div class="alert alert-danger mb-0 text-center error" role="alert">
        <div>
            Nombre: Debe tener al menos 3 caracteres.
        </div>                 
      </div>
		</div>
		<div class="form-group col-md-6">
			<label for="">Correo electronico</label>
			<input type="email" name="email2" id="email2" class="form-control" value="<?= $_SESSION['email'] ?>">
			<div class="alert alert-danger mb-0 text-center error" role="alert">
        <div>
            Correo: Debe tener al menos 5 caracteres.
        </div>                 
      </div>
		</div>
		<div class="form-group col-md-6">
			<label for="">Teléfono</label>
			<input type="number" name="telefono2"  id="telefono2" class="form-control" value="<?= $_SESSION['telefono'] ?>">
			<div class="alert alert-danger mb-0 text-center error" role="alert">
        <div>
            Telefono: Debe tener al menos 4 numeros.
        </div>                 
      </div>
		</div>
		<div class="form-group col-md-6">
			<label for="">Domicilio</label>
			<input type="text" name="domicilio2" id="domicilio2" class="form-control" value="<?= $_SESSION['domicilio'] ?>">
			<div class="alert alert-danger mb-0 text-center error" role="alert">
        <div>
            Domicilio:Debe tener al menos 3 caracteres.
        </div>                 
      </div>
		</div>
		<div class="form-group col-md-6">
			<label for="">Provincia</label>
			<select name="destino_provincia" id="destino_provincia" class="form-control" onchange="ajaxProvincias(this,'destino')">
				<option value="-1">Elija el destino</option>
				<?php foreach ($provincias as $key => $value): ?>
					<option value="<?= $value["id"] ?>"><?= $value["provincia"] ?></option>
				<?php endforeach ?>
			</select>
			<div class="alert alert-danger mb-0 text-center error" role="alert">
        <div>
            Provincia: Debe seleccionar una provincia.
        </div>                 
      </div>
		</div>
		<div class="form-group col-md-6">
			<label for="">Localidad</label>
			<select name="destino_localidad"  id="destino_localidad" id="destino_localidad" class="form-control js-select2-localidad-2">
			</select>
			<div class="alert alert-danger mb-0 text-center error" role="alert">
        <div>
            Localidad: Debe seleccionar una localidad.
        </div>                 
      </div>
		</div>
		<hr>
		<h3 class="text-secondary">Datos del paquete</h3>
		<div class="form-group col-md-5 text-center">
			<label for="">Franja Horaria del Remitente  (8-00)</label>
			<div class="row">
					<div class="col-md-6">
						<select name="franja_inicio" class="form-control" id="franja_inicio" onchange="franja_horaria(this)">
							<option value="-1"></option>
							<option value="8">08:00</option>
							<option value="9">09:00</option>
							<option value="10">10:00</option>
							<option value="11">11:00</option>
							<option value="12">12:00</option>
							<option value="13">13:00</option>
							<option value="14">14:00</option>
							<option value="15">15:00</option>
							<option value="16">16:00</option>
							<option value="17">17:00</option>
							<option value="18">18:00</option>
							<option value="19">19:00</option>
							<option value="20">20:00</option>
							<option value="21">21:00</option>
							<option value="22">22:00</option>
							<option value="23">23:00</option>
							<option value="24">24:00</option>
						</select>
					</div>
					<div class="col-md-6">
						<select name="franja_fin" class="form-control" id="franja_fin">
					</select>
					</div>
					<div class="alert alert-danger mb-0 text-center error col-md-12" role="alert">
		        <div>
		          Debe seleccionar una hora inicial.
		        </div>                 
		      </div>
			</div>
		</div>
		<div class="form-group col-md-3">
			<label for="">Tamaño de la caja</label>
			<select name="tamano_caja" class="form-control" id="tamano_caja" onchange="precio_caja(this)">
				<option value="-1">Elija el tamaño</option>
				<option value="grande">Grande (3000kg - 10000kg)</option>
				<option value="media">Mediano (200kg - 2999kg)</option>
				<option value="chico">Chico (20kg - 199kg)</option>
			</select>
			<div class="alert alert-danger mb-0 text-center error" role="alert">
        <div>
          Debe seleccionar una opcion.
        </div>                 
      </div>
		</div>

		<div class="form-group col-md-3" id="envios-precio">
			<label for="">Precio</label>
			<span class="text-danger"> </span>
			<input type="hidden" name="precio" value="-1">
		</div>
		<button type="submit" class="btn mb-3" name="envio" id="btn-env-contacto">Siguiente</button>
	</form>
</section>
<?php 
	if (isset($_POST["envio"])) {
		$a = new EnviosController;
		$a->setEnvio();
	}
 ?>