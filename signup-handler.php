<?php 
session_start(); 

if (isset($_POST['name']) && isset($_POST['age'])
    && isset($_POST['sex']) && isset($_POST['ocupacion'])
    && isset($_POST['picture']) && isset($_POST['pass'])) {

	function validate($data){
       $data = trim($data);
	   $data = stripslashes($data);
	   $data = htmlspecialchars($data);
	   return $data;
	}

    $name = validate($_POST['name']);
    $age = validate($_POST['age']);
    $sex = validate($_POST['sex']);
    $ocupacion = validate($_POST['ocupacion']);
    $picture = validate($_POST['picture']);
	$pass = validate($_POST['pass']);


	if (empty($name)) {
		header("Location: signup.php?error=Name is required");
	    exit();
	}else if(empty($age)){
        header("Location: signup.php?error=Age is required");
	    exit();
	}
    else if(empty($sex)){
        header("Location: signup.php?error=Sex is required");
        exit();
    }
    else if(empty($ocupacion)){
        header("Location: signup.php?error=Ocupation is required");
        exit();
    }
    else if(empty($picture)){
        header("Location: signup.php?error=Picture is required");
        exit();
    }
    else if(empty($pass)){
        header("Location: signup.php?error=Password is required");
        exit();
    }
	else{
        try{
            $pdo=new PDO('mysql:host=localhost;dbname=ai57', 'root', '1234');

        } catch (PDOException $e) {
            echo 'Connection failed: ' . $e->getMessage();
            die();
        };

	    $query = "SELECT * FROM users WHERE users.name='$name' ";
        $result=$pdo->query($query);

		if (mysqli_num_rows($result) > 0) {
			header("Location: signup.php?error=The username is taken. Try another");
	        exit();
		}else {
           $query = "INSERT INTO users (users.name, edad, sex, ocupacion,pic,passwd)
           VALUES('$name', '$age', '$sex', '$ocupacion', '$picture', '$pass')";
           $result2=$pdo->query($query);
           if ($result2) {
           	 header("Location: signup.php?success=Your account has been created successfully");
	         exit();
           }else {
	           	header("Location: signup.php?error=unknown error occurred");
		        exit();
           }
		}
	}
	
}else{
	//header("Location: signup.php");
    //exit();
    echo "Error";
}