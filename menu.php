<?php
    session_start();
?>
<nav>
        <a href="#" class="logo">
            <img src="images/Peliculeo.png">
        </a>
        <ul class="menu">
            <li><a href="index.php">Home</a></li>
            <li><a href="azmovies.php?id=1">A-Z movies</a></li>
            <li><a href="genres.php?id=1">Genres</a></li>
            <!-- <li><a href="ranking.php">Ranking</a></li> -->
            <li>
                <div class="search">
                <input type="text" placeholder="Search...">
                <i class="fas fa-search"></i>
                </div>
            </li>
            <?php
            if(isset($_SESSION['name']))
            {
                echo "<li><p style='display:inline;'> Bienvenido/a, <a href='profile.php' style='display:inline;'>".$_SESSION['name']."</a></p></li>";
                echo "<a href='logout.php' class='logout'>Log out</a>";
            }
            else
            {
                echo '<div style="display:flex;">';
                echo '<li>';
                echo '<a href="login.php" class="login">Log in</a>';
                echo '</li>';
                echo '<li>';
                echo '<a href="signup.php" class="signup">Sign up</a>';
                echo '</li>';
                echo '</div>';
            }?>
        </ul>
        
        
            
        </div>          

    </nav>