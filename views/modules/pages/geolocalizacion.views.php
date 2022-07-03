<section class="container" id="caja-geo">	
	<div class="row justify-content-center">
		<h1 class=" titulo-geo text-center mb-4">Geolocalización</h1>
		<?php if(isset($_GET["id"]) AND $_GET["id"] > 0): ?>
			<div class="col-md-6 recuadro2-mapa px-0" method="post" >
			<h2 class="titulo2-geo2 pt-1 px-3">Seguimiento del envío</h2>
			<div class="wrapper-map">
				<iframe src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d13642005.09047396!2d-61.530553759974474!3d-38.008919819985124!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1ses!2sar!4v1656787587169!5m2!1ses!2sar" width="100%" height="450" style="border:0;" allowfullscreen="" class="mb-3" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
			</div>
			<a id="btn-env-geo" class="btn btn-primary" href="/geolocalizacion"/></i>Cerrar mapa</a> 
			</div>
			
		<?php else: ?>
		<form class="col-md-6 recuadro2" method="post" >
			<h2 class="titulo2-geo2">Seguimiento del envío</h2>
			<p class="texto-geo">	Con el código a su email, usted podrá ver el trayecto de su envío a través del sistema de geolocalización.</p>

			<div class="form-group input-geo">
				<input type="number" name="codigo" class="form-control input_user"  placeholder="Codigo de seguimiento">
			</div>
			
			<p class="texto2-geo2">Este sistema permite la búsqueda de su producto adquirido a través de la geolocalización.</p>

                
                <button id="btn-env-geo" type="submit" name="consultar" class="btn btn-primary"/></i>Consultar</button>                
            <?php 
            if (isset($_POST["consultar"])) {
            	header("location:/geolocalizacion/".$_POST["codigo"]);
            	//$a = new EnviosModel;
            	//$geo = $a->getGeo(array("codigo"=>$_POST["codigo"]));
            }
            ?>
		</form>
		
		<?php endif; ?>

		<?php if(isset($geo)): ?>
			<iframe src="https://www.google.com/maps/embed? 
pb=!1m18!1m12!1m3!1d128083.93009419793!2d10.645036343724943!3d59.89378054345609!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!4m3!3e6!4m0!4m0!5e0!3m2!1sen!2sus!4v1471120225355"
width="100%"
height="450"
frameborder="0"
style="border:0" allowfullscreen></iframe>
		<?php endif; ?>
	</div>
</section>