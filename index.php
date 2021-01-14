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
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://kit.fontawesome.com/f07079c6e3.js" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>

<body>

<?php include("menu.php"); ?>

    <section id="main">

    <div class="container" style="height: auto;">
  <h1>Critics' choice</h1>  
  <div id="myCarousel" class="carousel slide" data-ride="carousel">
    <!-- Indicators -->
    <ol class="carousel-indicators">
      <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
      <li data-target="#myCarousel" data-slide-to="1"></li>
      <li data-target="#myCarousel" data-slide-to="2"></li>
      <li data-target="#myCarousel" data-slide-to="3"></li>
    </ol>
    <br>
    <!-- Wrapper for slides -->
    <div class="carousel-inner">
      <div class="item active">
        <img src="images/pulp.jpeg" alt="Pulp Fiction" style="width:100%;">
        <div class="carousel-caption">
        <h3>Pulp Fiction</h3>
        <p>If my answers frighten you then you should cease asking scary questions.” -Jules Winnfield</p>
        </div>
      </div>

      <div class="item">
        <img src="images/cinema.jpeg" alt="Cinema Paradiso" style="width:100%;">
        <div class="carousel-caption">
        <h3>Cinema Paradiso</h3>
        <p>Living here day by day, you think it's the center of the world. You believe nothing will ever change. Then you leave: a year, two years. When you come back, everything's changed. ... </p>
        </div>
      </div>
    
      <div class="item">
        <img src="images/dumbo.jpeg" alt="Dumbo" style="width:100%;">
        <div class="carousel-caption">
        <h3>Dumbo</h3>
        <p>I think I will have seen everything when I see and elephant fly.</p>
        </div>
      </div>

      <div class="item">
        <img src="images/bigfish.jpeg" alt="Dumbo" style="width:100%;">
        <div class="carousel-caption">
        <h3>Big Fish</h3>
        <p>The biggest fish in the river gets that way by never bein' caught. </p>
        </div>
      </div>
    </div>

    <!-- Left and right controls -->
    <a class="left carousel-control" href="#myCarousel" data-slide="prev">
      <span class="glyphicon glyphicon-chevron-left"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="right carousel-control" href="#myCarousel" data-slide="next">
      <span class="glyphicon glyphicon-chevron-right"></span>
      <span class="sr-only">Next</span>
    </a>
  </div>
</div>

    
  
    </section>

</body>
</html>