<?php

function calculaPuntuaciones($id_movie){
	
	$puntuaciones=array();
	$datos=getDatosPuntuaciones($id_movie);
	//reset($datos);
	$puntuaciones["aritmetica"]=round($datos["ri"], 2, PHP_ROUND_HALF_UP);
	$puntuaciones["numero"]=$datos["ni"];
	$puntuaciones["ponderada"]=round(($datos["N"]*$datos["R"]+$datos["ni"]*$datos["ri"])/($datos["N"]+$datos["ni"]), 2, PHP_ROUND_HALF_UP);
	
    return $puntuaciones;
}


?>