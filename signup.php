<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Log in</title>
    <link rel="stylesheet" href="css/style-signup.css">
</head>
<body>
    <div class="login-box">
        <br><br>
        <h1>Sign up here</h1>

        <?php if (isset($_GET['error'])) { ?>
     		<p class="error"><?php echo $_GET['error']; ?></p>
     	<?php } ?>

          <?php if (isset($_GET['success'])) { ?>
               <p class="success"><?php echo $_GET['success']; ?></p>
          <?php } ?>

        <form action="signup-handler.php" method="POST">
            <label for="name">Full name</label>
            <input type="text" name="name" placeholder="">

            <label for="age">Age</label>
            <input type="text" name="age" placeholder="">

           
            <label for="sex">Sex</label><br>
            <div class="sex">
                <input type="radio" name="sex" value="M">
                <label for="male" id="male">Male</label>
                <input type="radio" name="sex" value="F">
                <label for="female">Female</label>
            </div>
            

            <label for="ocupacion">Occupation</label>
            <select name="ocupacion" id="ocupacion">
                <option value="administrator">Administrator</option>
                <option value="artist">Artist</option>
                <option value="doctor">Doctor</option>
                <option value="educator">Educator</option>
                <option value="engineer">engineer</option>
                <option value="entertainment">entertainment</option>
                <option value="executive">executive</option>
                <option value="healthcare">healthcare</option>
                <option value="homemaker">homemaker</option>
                <option value="lawyer">lawyer</option>
                <option value="librarian">librarian</option>
                <option value="marketing">marketing</option>
                <option value="none">none</option>
                <option value="other">other</option>
                <option value="programmer">programmer</option>
                <option value="retired">retired</option>
                <option value="salesman">salesman</option>
                <option value="scientist">scientist</option>
                <option value="student">student</option>
                <option value="technician">technician</option>
                <option value="writer">writer</option>
            </select>

            <label for="picture">Picture</label>
            <input type="file" name="picture">

            <label for="password">Password</label>
            <input type="password" name="pass" placeholder="">
            <br>
            <input type="submit" value="Sign up">
            <a href="index.php">Back</a>

        </form>
    </div>
</body>
</html>