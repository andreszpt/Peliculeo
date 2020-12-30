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

</head>
<body>
    <nav>
        <a href="#" class="logo">
            <img src="images/Peliculeo.png">
        </a>
        <ul class="menu">
            <li><a href="index.php">Home</a></li>
            <li><a href="azmovies.php?id=a">A-Z movies</a></li>
            <li><a href="genres.php">Genres</a></li>
            <li><a href="ranking.php">Ranking</a></li>
        </ul>
        <div class="search">
            <input type="text" placeholder="Search...">
            <i class="fas fa-search"></i>
        </div>
        <div class="session">
            <?php
            if(isset($_SESSION['name']))
            {
                echo "<p> Bienvenido/a, ".$_SESSION['name']."</p>";
                echo "<a href='logout.php' class='logout'>Log out</a>";
            }
            else
            {
                echo '<a href="login.php" class="login">Log in</a>';
                echo '<a href="signup.php" class="signup">Sign up</a>';
            }?>
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

        $id_movie = $_GET['id'];

        $query = "SELECT * FROM movie WHERE movie.id = '$id_movie' ";

        $result=$pdo->query($query);
        $l=$result->fetch(PDO::FETCH_ASSOC);

        echo "<h1>".$l['title']."</h1>";
        echo "<h4>Date: ".$l['date']."</h4>";
        echo "<p>Synopsis: ".$l['desc']."</p>";
        echo '<img src="images/'.$l['url_pic'].'">';


        $query = "SELECT * FROM moviegenre, genre WHERE moviegenre.movie_id = '$id_movie' AND moviegenre.genre=genre.id";

        $result=$pdo->query($query);
        $l=$result->fetch(PDO::FETCH_ASSOC);

        echo "<p>Genres:</p>";
        while ($l=$result->fetch(PDO::FETCH_ASSOC)) {        
            echo "<td>".$l['name']."   <td>";
        }
        echo "<br><br>";
        


        $query = "SELECT * FROM moviecomments, users WHERE movie_id = '$id_movie' AND moviecomments.user_id=users.id";
        $result=$pdo->query($query);
        $l=$result->fetch(PDO::FETCH_ASSOC);
        echo "<p>Comments: </p>";
        while ($l=$result->fetch(PDO::FETCH_ASSOC)) {        
            echo "<p>".$l['name']." wrote: ".$l['comment']."</p>";
        }
        echo "<br><br>";

        ?>

        <form action="comment-handler.php" method="post">
            <p>Introduce your comment: </p> 

            <?php if (isset($_GET['error'])) { ?>
     		<p class="error"><?php echo $_GET['error']; ?></p>
     	    <?php } ?>

             <?php if (isset($_GET['success'])) { ?>
               <p class="success"><?php echo $_GET['success']; ?></p>
            <?php } ?>

            <input type="text" name="comment">

            <?php
            echo '<input type="hidden" name="id_movie" value='.$_GET['id'].'>';
            ?>

            <input type="submit" value="Send">
        </form>

        <?php
        $id_user = $_SESSION['id'];
        $query = "SELECT * FROM user_score WHERE id_movie = '$id_movie' AND id_user = '$id_user'";

        $result=$pdo->query($query);
        $l=$result->fetch(PDO::FETCH_ASSOC);

        if (isset($l['score'])){
            echo "Your rating: ".$l['score'];
        }
        echo "<br><br>";
        ?>

        <form action="rating-handler.php" method="post">
            <p>Introduce your rating: </p> 

            <?php if (isset($_GET['error'])) { ?>
     		<p class="error"><?php echo $_GET['error']; ?></p>
     	    <?php } ?>

             <?php if (isset($_GET['success'])) { ?>
               <p class="success"><?php echo $_GET['success']; ?></p>
            <?php } ?>

            <input type="radio" name="score" id="0" value="0">
            <label for="0">0</label>
            <input type="radio" name="score" id="1" value="1">
            <label for="1">1</label>
            <input type="radio" name="score" id="2" value="2">
            <label for="2">2</label>
            <input type="radio" name="score" id="3" value="3">
            <label for="3">3</label>
            <input type="radio" name="score" id="4" value="4">
            <label for="4">4</label>
            <input type="radio" name="score" id="5" value="5">
            <label for="5">5</label>

            <?php
            echo '<input type="hidden" name="id_movie" value='.$_GET['id'].'>';
            ?>

            <input type="submit" value="Send">
        </form>
        
            
        </div>
    </section>

</body>
</html>