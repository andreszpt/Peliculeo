<?php

session_start();

function connect(){
    try{
        $pdo=new PDO('mysql:host=localhost;dbname=ai57', 'root', '1234');

    } catch (PDOException $e) {
        echo 'Connection failed: ' . $e->getMessage();
        die();
    };
    return $pdo;
}

function getInfoPelis($pdo){
    //Número total de las películas
    $query="SELECT COUNT(*) as N FROM movie";
    $result=$pdo->query($query);
    $data=array();
    while($l=$result->fetch(PDO::FETCH_ASSOC)){
        $data["N"]=$l["N"];
    }
    
    // Puntuación media de todas las películas
    $query2="SELECT AVG(score) as R FROM user_score";
    $result2=$pdo->query($query2);
    while($l=$result2->fetch(PDO::FETCH_ASSOC)){
        $data["R"]=$l["R"];
    }

    return($data);  
}

function getDatosPuntuaciones($id_movie, $pdo){

    //Número de puntuaciones de la pelicula
    $query3="SELECT COUNT(*) as ni FROM user_score WHERE id_movie='".$id_movie."'";
    $result3=$pdo->query($query3);
    $data=array();
    while($l=$result3->fetch(PDO::FETCH_ASSOC)){
        $data["ni"]=$l["ni"];
    }
    
    // Puntuación media de la película
    $query4="SELECT AVG(score) as ri FROM user_score WHERE id_movie='".$id_movie."'";
    $result4=$pdo->query($query4);
    while($l=$result4->fetch(PDO::FETCH_ASSOC)){
        $data["ri"]=$l["ri"];
    }

    return($data);  

}

?>