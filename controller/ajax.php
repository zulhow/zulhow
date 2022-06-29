<?php 
	require_once("../model/loc_prov_Model.php");
	class Ajax
	{
		public function ajaxProvincia($provincia)
		{
			$array = ["id_provincia"=> $provincia];
			$respuesta = Loc_prov_Model::getLocalidad($array);
			echo json_encode($respuesta);
		}
	}
	if (isset($_GET["provincia"])) {
		$a = new Ajax;
		$a->ajaxProvincia($_GET["provincia"]);
	}
 ?>