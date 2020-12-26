<?php

session_start(); 

if (isset($_POST['user']) && isset($_POST['pass'])){
    function validate ($data){
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
    $user = validate($_POST['user']);
    $pass = validate($_POST['pass']);

    if (empty($user))
    {
        header("Location: login.php?error=Username is required");
        exit();
    }
    else if (empty($pass))
    {
        header("Location: login.php?error=Password is required");
        exit();
    }
    else
    {
        try{
            $pdo=new PDO('mysql:host=localhost;dbname=ai57', 'root', '1234');

        } catch (PDOException $e) {
            echo 'Connection failed: ' . $e->getMessage();
            die();
        };

        $query = "SELECT * FROM users WHERE users.name = '$user' AND users.passwd = '$pass'";
        $result=$pdo->query($query);
        $l=$result->fetch(PDO::FETCH_ASSOC);

        if ($l['name']===$user && $l['passwd']===$pass)
        {
            $_SESSION['name'] = $l['name'];
            $_SESSION['id'] = $l['id'];
            header("Location: index.php");
            exit();
        }
        
        else{
            header("Location: login.php?error=Incorrect username or password");
            exit();
        }
    }



}else{
    header("Location: login.php");
    exit();
}
?>