<?php 
session_start(); 

try{
    $pdo=new PDO('mysql:host=localhost;dbname=ai57', 'root', '1234');

} catch (PDOException $e) {
    echo 'Connection failed: ' . $e->getMessage();
    die();
};

$id_user = $_SESSION['id'];
$id_movie = $_POST['id_movie'];
$score = $_POST['score'];
$time = date("Y-m-d H:i:s");

$query = "INSERT INTO user_score (id_user, id_movie, score, user_score.time)
VALUES('$id_user', '$id_movie', '$score','$time')";

$result=$pdo->query($query);
if ($result) {
    header("Location: movie.php?id=".$id_movie."&success=Rating was sent");
    exit();
}else {
    if (session_unset())
    {
        header("Location: movie.php?id=".$id_movie."&error=Log in to introduce your rating");
        exit();
    }
}


?>