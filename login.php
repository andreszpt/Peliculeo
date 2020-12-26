<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Log in</title>
    <link rel="stylesheet" href="css/style-login.css">
</head>
<body>
    <div class="login-box">
        <h1>Login here</h1>
        <form action="login-handler.php" method="POST">
            <?php if (isset($_GET['error'])) { ?>
     		<p class="error"><?php echo $_GET['error']; ?></p>
     	    <?php } ?>
            <label for="username">Username</label>
            <input type="text" name="user" placeholder="">

            <label for="password">Password</label>
            <input type="password" name="pass" placeholder="">
            
            <input type="submit" value="Log In">

            <a href="#">Lost your password?</a><br>
            <a href="signup.php">Don't have an account yet?</a><br>
            <br>
            <a href="index.php">Back</a><br>
        </form>
    </div>
</body>
</html>