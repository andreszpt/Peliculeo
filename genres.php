<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Peliculeo</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="shortcut icon" href="images/popcorn.ico" type="image/x-icon">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/f07079c6e3.js" crossorigin="anonymous"></script>
    <?php include("sqlFunctions.php"); ?>
    <?php include("phpFunctions.php"); ?>
</head>
<body>
    <?php include("menu.php"); ?>
    <section id="main">
    <br>
        <h1 class="">Genres</h1>
        <div id="up">
            <a href="genres.php?id=0">Unknown </a>
            <a href="genres.php?id=1">Action </a>
            <a href="genres.php?id=2">Adventure </a>
            <a href="genres.php?id=3">Animation </a>
            <a href="genres.php?id=4">Children's  </a>
            <a href="genres.php?id=5">Comedy </a>
            <a href="genres.php?id=6">Crime </a>
            <a href="genres.php?id=7">Documentary </a>
            <a href="genres.php?id=8">Drama </a>
            <br>
            <a href="genres.php?id=9">Fantasy </a>
            <a href="genres.php?id=10">Film-noir </a>
            <a href="genres.php?id=11">Horror </a>
            <a href="genres.php?id=12">Musical </a>
            <a href="genres.php?id=13">Mystery </a>
            <a href="genres.php?id=14">Romance </a>
            <a href="genres.php?id=15">Sci-fi </a>
            <a href="genres.php?id=16">Thriller </a>
            <a href="genres.php?id=17">War </a>
            <a href="genres.php?id=18">Western </a>
            
        </div>
        <div class="main-div">
        <?php

        $pdo = connect();
        
        $query="SELECT * FROM movie, moviegenre WHERE moviegenre.genre=".
        $_GET['id']. " AND movie.id = moviegenre.movie_id ORDER BY movie.id";

        $result=$pdo->query($query);

        $infoPelis = getInfoPelis($pdo);
        $nFilms = $infoPelis["N"];
        $rFilms = $infoPelis["R"];

        echo "<table class='table table-hover'>";
        echo "<th scope='col'>Image</th>";
        echo "<th scope='col'>Title</th>";
        echo "<th scope='col'>Description</th>";
        echo "<th scope='col'>Date</th>";
        echo "<th scope='col'>Votes</th>";
        echo "<th scope='col'>Weighed score</th>";
        while ($l=$result->fetch(PDO::FETCH_ASSOC)) {
            $puntuaciones=calculaPuntuaciones($l["id"],$pdo, $nFilms, $rFilms);
            $ponderada=$puntuaciones["ponderada"];
		    $numero_votos=$puntuaciones['numero'];
            echo '<tr>';
            if(file_exists('images/'.$l["url_pic"]))
            {
                echo '<td><img src="images/'.$l['url_pic'].'"></td>';
            }
            else
            {
                echo '<td><img src="images/Image-Not-Available.png"></td>';
            }
            echo '<td><a href="movie.php?id='.$l['id'].'">'.$l['title'].'</a></td>';
            echo '<td>'.$l['desc'].'</td>';
            echo '<td>'.$l['date'].'</td>';
            echo '<td style="text-align: center;">'. $numero_votos .'</td>';
            echo '<td style="text-align: center;">'. $ponderada .'/5</td>';
            
            echo '</tr>';
        }

        echo "</table>";
        
        ?>
            
        </div>
    </section>

</body>
</html>