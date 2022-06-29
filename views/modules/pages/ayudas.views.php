<section class="container" id="caja-ayuda">
    <h1 class=" titulo-ayuda text-center mb-4">Ayuda</h1>
    <p class=" texto-ayuda text-center">Utilice nuestras funciones para obtener otro tipo de información.</p>
	<div class="row justify-content-center">
		
		<form class="col-md-6 col-sm-4 col-xs-6 recuadro2" method="post">
            <div class="container">
                <div class="row">
                    <div class="col-sm-12 demo-col">
                        <div class="icheck-primary">
                            <input type="radio" name="ayuda" value="1" id="primary" />
                            <label for="primary">¿No sabe su código de seguimiento?</label>
                        </div>
                        <div class="icheck-primary">
                            <input type="radio" name="ayuda" value="2" id="primary1" />
                            <label for="primary1">¿Cuánto tiempo tarda el paquete?</label>
                        </div>
                        <div class="icheck-primary">
                            <input type="radio" name="ayuda" value="3" id="primary2"/>
                            <label for="primary2">¿Cómo cancelar el pedido?</label>
                        </div>
                        <div class="icheck-primary">
                            <input type="radio" name="ayuda" value="4" id="primary2" />
                            <label for="primary2">Otras preguntas</label>
                        </div>
                        <div class="icheck-primary">
                            <input type="email" name="email" class="form-control form-control-lg shadow-none" id="email" placeholder="Ejemplo@outlook.com.ar">
                        </div>
                        <button type="submit" name="enviar" class="btn" id="btn-env-ayuda">Enviar</button>
                    </div>
                </div>
            </div>
			<?php 
                if (isset($_POST["enviar"])) {
                    $a = new AyudaController();
                    $a->ayuda();
                }
             ?>
        </form>

</section>