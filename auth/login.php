<?php
session_start();
require_once '../inc/function.php';
    $error = false;
    if(isset($_POST["login"])){
        $user = login($conn, $_POST);
        if($user){
            $_SESSION["login"] = true;
            $_SESSION["username"] = $user["username"];
            $_SESSION["id"] = $user["id"];
            header('location:../notes/index.php');
            exit();
        }else{
            $error = true;
        }
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="../assets/css/style.css">
</head>
<body>
    <form action="" method="post">
        <div class="container">
            <?php if($error): ?>
                <p style="color:red;">Username atau password salah!</p>
            <?php endif; ?> 
            <h1>Login</h1>
            <label for="username" name="username">Username :</label>
            <input type="text" name="username" placeholder="Username" required>
            <label for="password" name="password">Password :</label>
            <input type="password" name="password" placeholder="Password" required>
            <br>
            <button type="submit" name="login">Login</button>
            <br>
            <a href="register.php">Belum Punya Akun? Register</a>
        </div>
    </form>
</body>
</html>