<?php

function calculaPuntuaciones($id_movie, $pdo, $nFilms, $rFilms){
	
	$puntuaciones=array();
	$datos=getDatosPuntuaciones($id_movie, $pdo);
	$puntuaciones["numero"]=$datos["ni"];
	$puntuaciones["ponderada"]=round(($nFilms*$rFilms+$datos["ni"]*$datos["ri"])/($nFilms+$datos["ni"]), 2, PHP_ROUND_HALF_UP);
	
    return $puntuaciones;
}


?>