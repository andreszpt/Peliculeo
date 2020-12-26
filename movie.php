<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Peliculeo</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="shortcut icon" href="images/popcorn.ico" type="image/x-icon">
    <script src="https://kit.fontawesome.com/f07079c6e3.js" crossorigin="anonymous"></script>

</head>
<body>
    <nav>
        <a href="#" class="logo">
            <img src="images/Peliculeo.png">
        </a>
        <ul class="menu">
            <li><a href="index.html">Home</a></li>
            <li><a href="azmovies.php?id=a">A-Z movies</a></li>
            <li><a href="genres.html">Genres</a></li>
            <li><a href="ranking.html">Ranking</a></li>
        </ul>
        <div class="search">
            <input type="text" placeholder="Search...">
            <i class="fas fa-search"></i>
        </div>
        <div class="session">
            <a href="login.html" class="login">Log in</a>
            <a href="signup.html" class="signup">Sign up</a>
        </div>        
    </nav>
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

        $id = $_GET['id'];

        $query = "SELECT * FROM movie WHERE movie.id = '$id' ";

        $result=$pdo->query($query);
        $l=$result->fetch(PDO::FETCH_ASSOC);

        echo "<h1>".$l['title']."</h1>";
        echo "<h4>Date: ".$l['date']."</h4>";
        echo "<p>Synopsis: ".$l['desc']."</p>";
        echo '<img src="images/'.$l['url_pic'].'">';







        $query = "SELECT * FROM moviegenre, genre WHERE moviegenre.movie_id = '$id' AND moviegenre.genre=genre.id";

        $result=$pdo->query($query);
        $l=$result->fetch(PDO::FETCH_ASSOC);

        echo "<p>Genres:</p>";
        while ($l=$result->fetch(PDO::FETCH_ASSOC)) {        
            echo "<td>".$l['name']."   <td>";
        }
        echo "<br><br>";
        


        $query = "SELECT * FROM moviecomments, users WHERE movie_id = '$id' AND moviecomments.user_id=users.id";

        $result=$pdo->query($query);
        $l=$result->fetch(PDO::FETCH_ASSOC);

        echo "<p>Comments: </p>";
        while ($l=$result->fetch(PDO::FETCH_ASSOC)) {        
            echo "<p>".$l['name']." wrote: ".$l['comment']."</p>";
        }

        ?>
        
            
        </div>
    </section>

</body>
</html>