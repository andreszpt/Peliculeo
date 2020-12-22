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
            <li><a href="azmovies.html">A-Z movies</a></li>
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
        <div>
            <?php

                try
                {
                    $pdo = new PDO('mysql:host=labit601.upct.es;
                    dbname=ai57', 'ai57', 'ai2020');
                    
                    $query = 'SELECT * FROM movie'; 

                    $result = $pdo->query($query);

                    echo '<table border="1" cellpadding ="10">';
                    echo "<th>Id</th>";
                    echo "<th>Title</th>";
                    echo "<th>Date</th>";
                    while ($line = $result->fetch(PDO::FETCH_ASSOC))
                    {
                        echo "<tr>";
                            echo "<td>".$line["id"]."</td>";
                            echo "<td>".$line["title"]."</td>";
                            echo "<td>".$line["date"]."</td>"; 
                        echo "<br>";
                        echo "\t</tr>\n";
                        
                    }
                    echo "</table>";
                } 
                catch (PDOException $e)
                { 
                    echo 'Connection failed: ' . $e->getMessage();
                };

            ?>
        </div>
    </section>

</body>
</html>