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
        
        <div id="up">
            <a href="azmovies.php?id=1"> Back </a>
        </div>
        <div class="main-div">
        <?php

        $pdo = connect();

        $id_movie = $_GET['id'];

        $query = "SELECT * FROM movie WHERE movie.id = '$id_movie' ";

        $result=$pdo->query($query);
        $l=$result->fetch(PDO::FETCH_ASSOC);

        echo "<h3>".$l['title']."</h3>";
        if(file_exists('images/'.$l["url_pic"]))
        {
            echo '<td><img src="images/'.$l['url_pic'].'"></td>';
        }
        else
        {
            echo '<td><img src="images/Image-Not-Available.png"></td>';
        }
        echo "<br><br>";
        echo "<p>Date: ".$l['date']."</p>";
        echo "<p>Synopsis: ".$l['desc']."</p>";
        


        $query = "SELECT * FROM moviegenre, genre WHERE moviegenre.movie_id = '$id_movie' AND moviegenre.genre=genre.id";

        $result=$pdo->query($query);
        echo "<p>Genres:</p>";
        while ($l=$result->fetch(PDO::FETCH_ASSOC)) {        
            echo "<td><a href='genres.php?id=".$l['id']."'>".$l['name']."\t</a></td>";
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


        ?>

        <form action="rating-handler.php" method="post">
            <br><br>
            <p>Introduce your rating: </p> 

            <?php
                if (isset($l['score'])){
                    echo "<p>Your rating: ".$l['score']."</p>";
                }
            ?>


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