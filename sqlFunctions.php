<?php

session_start();

function connect(){
    try{
        $pdo=new PDO('mysql:host=localhost;dbname=ai57', 'root', '1234');

    } catch (PDOException $e) {
        echo 'Connection failed: ' . $e->getMessage();
        die();
    };
}

function getDatosPuntuaciones($id_movie){

    $pdo1=new PDO('mysql:host=localhost;dbname=ai57', 'root', '1234');
    
    echo "Test";

    //Número total de las películas
    $query="SELECT COUNT(*) as N FROM movie";
    $result=$pdo1->query($query);
    $data=array();
    while($l=$result->fetch_array()){
        $data["N"]=$l["N"];
    }
    
    // Puntuación media de todas las películas
    $query2="SELECT AVG(score) as R FROM user_score";
    $result2=$pdo1->query($query2);
    while($l=$result2->fetch_array()){
        $data["R"]=$l["R"];
    }
    
    
    //Número de puntuaciones de la pelicula
    $query3="SELECT COUNT(*) as ni FROM user_score WHERE id_movie='".$id_movie."'";
    $result3=$pdo1->query($query3);
    while($l=$result3->fetch_array()){
        $data["ni"]=$l["ni"];
    }
    
    // Puntuación media de la película
    $query4="SELECT AVG(score) as ri FROM user_score WHERE id_movie='".$id_movie."'";
    $result4=$pdo1->query($query4);
    while($l=$result4->fetch_array()){
        $data["ri"]=$l["ri"];
    }
    
    mysqli_close($pdo);

    return($data);  

}

?>