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
    <script src="https://kit.fontawesome.com/f07079c6e3.js" crossorigin="anonymous"></script>
    <?php include("sqlFunctions.php"); ?>
    <?php include("phpFunctions.php"); ?>
</head>
<body>
    <?php include("menu.php"); ?>

    <section id="main">
        <h1 class="">A-Z Movies</h1>
        <div id="up">
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
        </div>
        <div class="main-div">
        <?php
        try{
            $pdo=new PDO('mysql:host=localhost;dbname=ai57', 'root', '1234');

        } catch (PDOException $e) {
            echo 'Connection failed: ' . $e->getMessage();
            die();
        };
        

        $query="SELECT * FROM movie, user_score WHERE title LIKE '".$_GET['id']."%' AND movie.id=user_score.id_movie";

        $result=$pdo->query($query);
        $l=$result->fetch(PDO::FETCH_ASSOC);
        
        


        echo "<table>";
        while ($l=$result->fetch(PDO::FETCH_ASSOC)) {
            //$puntuaciones=calculaPuntuaciones($l["id"]);
            //$ponderada=$puntuaciones["ponderada"];
		    //$numero_votos=$puntuaciones['numero'];
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
            echo '<td>'.$l['score'].'</td>';
            //echo '<td>'. $numero_votos .'</td>';
            //echo '<td>'. $ponderada .'</td>';
            
            echo '</tr>';
        }

        echo "</table>";
        ?>
            
        </div>
    </section>

</body>
</html>

