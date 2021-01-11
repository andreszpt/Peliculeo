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
    <?php include("menu.php"); ?>
    <section id="main">
        <h1 class="">A-Z Movies</h1>
        <div id="up">
            <a href="azmovies.php?id=a"> Back </a>
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
        echo "<p>Genres:</p>";
        while ($l=$result->fetch(PDO::FETCH_ASSOC)) {        
            echo "<td>".$l['name']."   <td>";
            echo "<td>".$l['id']."   <td>";
        }
        echo "<br><br>";
        


        $query = "SELECT * FROM moviecomments, users WHERE movie_id = '$id_movie' AND moviecomments.user_id=users.id";
        $result=$pdo->query($query);
        
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