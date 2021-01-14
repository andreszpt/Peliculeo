<?php 
session_start();

include("sqlFunctions.php");
include("phpFunctions.php");

$pdo = connect();

$id_user = $_SESSION['id'];
$id_movie = $_POST['id_movie'];
$comment = $_POST['comment'];

$query = "INSERT INTO moviecomments (movie_id, user_id, comment)
VALUES('$id_movie', '$id_user', '$comment')";

$result=$pdo->query($query);
if ($result) {
    header("Location: movie.php?id=".$id_movie."&success=Comment was sent");
    exit();
}else {
    if (session_unset())
    {
        header("Location: movie.php?id=".$id_movie."&error=Log in to post a comment");
        exit();
    }

    
}


?>