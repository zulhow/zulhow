<?php 
	require_once($_SERVER["DOCUMENT_ROOT"]."/conexion/conexion.php");
	class Loc_prov_Model
	{
		public static function getLocalidad($array = null){
			//Consulta que trae localidades por AJAX para una id_provincia
			if ($array != null) {
				$where = "WHERE id_provincia = ".$array["id_provincia"];
			}
			//Consulta que trae todas las localidades
			else{
				$where = "";
			}
			$sql = Conexion::conectar()->prepare("SELECT * FROM localidades $where ORDER BY id DESC");
			if ($sql->execute() == true) {
				$respuesta = $sql->fetchAll();
			}else{
				$respuesta = false;
			}
			return $respuesta;
		}
		public static function getProvincia(){
			$sql = Conexion::conectar()->prepare("SELECT * FROM provincias");
			if ($sql->execute() == true) {
				$respuesta = $sql->fetchAll();
			}else{
				$respuesta = false;
			}
			return $respuesta;
		}
	}
?>