<?php 
	/*CONTROLADORES*/
	require_once("controller/route.php");
	require_once("controller/usuarioController.php");
	require_once("controller/contactoController.php");
	require_once("controller/enviosController.php");
	require_once("controller/mailerController.php");
	require_once("controller/ayudaController.php");

	/*MODELO*/
	require_once("model/usuarioModel.php");
	require_once("model/loc_prov_Model.php");
	require_once("model/enviosModel.php");

	require_once("views/modules/template/template.views.php");
 ?>