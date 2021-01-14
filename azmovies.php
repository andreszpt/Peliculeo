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

    <div id="main">
    <br>
        <h1 class="">A-Z Movies</h1>
            <a href="azmovies.php?id='">' </a>
            <a href="azmovies.php?id=1">1 </a>
            <a href="azmovies.php?id=2">2 </a>
            <a href="azmovies.php?id=3">3 </a>
            <a href="azmovies.php?id=8">8 </a>
            <a href="azmovies.php?id=A">A </a>
            <a href="azmovies.php?id=B">B </a>
            <a href="azmovies.php?id=C">C </a>
            <a href="azmovies.php?id=D">D </a>
            <a href="azmovies.php?id=E">E </a>
            <a href="azmovies.php?id=F">F </a>
            <a href="azmovies.php?id=G">G </a>
            <a href="azmovies.php?id=H">H </a>
            <a href="azmovies.php?id=I">I </a>
            <a href="azmovies.php?id=J">J </a>
            <a href="azmovies.php?id=K">K </a>
            <a href="azmovies.php?id=L">L </a>
            <a href="azmovies.php?id=M">M </a>
            <a href="azmovies.php?id=N">N </a>
            <a href="azmovies.php?id=O">O </a>
            <a href="azmovies.php?id=P">P </a>
            <a href="azmovies.php?id=Q">Q </a>
            <a href="azmovies.php?id=R">R </a>
            <a href="azmovies.php?id=S">S </a>
            <a href="azmovies.php?id=T">T </a>
            <a href="azmovies.php?id=U">U </a>
            <a href="azmovies.php?id=V">V </a>
            <a href="azmovies.php?id=W">W </a>
            <a href="azmovies.php?id=X">X </a>
            <a href="azmovies.php?id=Y">Y </a>
            <a href="azmovies.php?id=Z">Z </a>
        <div class="main-div">
        <?php
        
        $pdo = connect();
        
        $query="SELECT * FROM movie WHERE title LIKE '".$_GET['id']."%'";
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
    

</body>
</html>
