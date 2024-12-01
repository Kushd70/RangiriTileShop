<?php

session_start();
if(isset($_SESSION['user']))header('location:dashboard.php');

$error_message ='';
if($_POST){
    include('database/connection.php');

    $username =$_POST['username'];
    $password =$_POST['password'];
    
    $query ='SELECT * FROM users WHERE users. email = "'. $username .'" AND users.password ="'.$password.'"LIMIT 1';
    $stmt = $conn->prepare($query);
    $stmt->execute();

    if($stmt->rowcount() > 0) {

    $stmt->setFetchMode(PDO::FETCH_ASSOC);
    $user = $stmt->fetchAll()[0];
    $_SESSION['user'] = $user;
    
    header('Location: dashboard.php');
    exit();
    
    }else $error_message ='Please make sure that username and password are correct.';
    
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Login - RANGIRI GRANITE & CERAMIC (Pvt) Ltd</title>
    <link rel="stylesheet" type="text/css" href="css/login.css">
</head>
<body id="loginBodey">
    <?php if(!empty($error_message)) { ?>
        
    <div id="errorMessage">
        <strong>ERROR:</strong> </p><?= $error_message ?> </p>
    </div>
    <?php } ?>
    <div class="container">
        <div class="loginHeader">
            <h1><u>RANGIRI GRANITE & CERAMIC (Pvt) Ltd</u></h1>
            <h3>...ADMIN...</h3>
        </div>
        <div class="loginBodey">
            <form action="login.php" method="POST">
                <div class="loginInputsContainer">
                    <label for="username">Username</label><br>
                    <input placeholder="username" name="username" type="text" required />
                </div>
                <div class="loginInputsContainer">
                    <label for="password">Password</label><br>
                    <input placeholder="password" name="password" type="password" required />
                </div>
                <div class="loginbuttoncontainer">
                    <button type="submit">Login</button>
                </div>
            </form>
        </div>
    </div>
</body>
</html>
