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
        <h1 class="">Ranking</h1>
        <div>
            
        </div>
    </section>

</body>
</html>