<?php
ob_start();
header("Cache-control: private, no-cache");
header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");
header("Pragma: no-cache");
header("Cache: no-cahce");
ini_set('max_execution_time', 90000);
ini_set("memory_limit", -1);

require_once("../recursos/mandrill/src/Mandrill.php"); //--correos
require_once("../../CONFIG/constructor.php"); //--correos
include_once('html_fns_incidente.php');

$request = $_REQUEST["request"];
switch($request){
	/////////////// Codigo de muestra para ver funcionamiento //////////////
	case "ofrecimi_inciden":
		$ofrecimiento = $_REQUEST["ofrecimiento"];
		$incidente = $_REQUEST["incidente"];		
			incide_ofrecimiento($ofrecimiento,$incidente);
		break;
	default:
		$arr_respuesta = array(
			"status" => false,
			"data" => [],
			"message" => "Seleccione un metodo..."
		);
		echo json_encode($arr_respuesta);
}

////////////////// Codigo de muestra para ver funcionamiento /////////////////////////

function incide_ofrecimiento($ofrecimiento,$incidente){
	$ClsProb = new ClsOfrecimiento();
   $result = $ClsProb->get_ofrecimiento($ofrecimiento,$incidente,'',1);
   if(is_array($result)){
	   $arr_respuesta = array(
		   "status" => true,
		   "data" => detallofreci($ofrecimiento,$incidente),
		   "message" => ""
	   );
   }else{
	   $arr_respuesta = array(
		   "status" => false,
		   "data" => [],
		   "message" => "Aún no hay datos registrados..."
	   );
   }
   echo json_encode($arr_respuesta);
}

?>
