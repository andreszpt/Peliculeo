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
    <br>
        <h1 class="">Hi, this is your profile</h1>
            

        <?php

            $pdo = connect();


            $query="SELECT * FROM users WHERE id=".$_SESSION['id'];

            $result=$pdo->query($query);
            $l=$result->fetch(PDO::FETCH_ASSOC);
        ?>

        <ul>
            <li>ID: <?php echo $l['id'] ?></li>
            <li>Name: <?php echo $l['name'] ?></li>
            <li>Age: <?php echo $l['edad'] ?></li>
            <li>Sex: <?php echo $l['sex'] ?></li>
            <li>Role: <?php echo $l['ocupacion'] ?></li>
        </ul>

    </section>

</body>
</html>