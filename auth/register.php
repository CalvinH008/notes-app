<?php 
require_once '../inc/function.php';
    if(isset($_POST["register"])){
        if(registrasi($conn, $_POST) > 0 ){
            echo "<script>
                    alert('User baru berhasil ditambahkan');        
            </script>";
            header('location:login.php');
        }else{
            echo mysqli_error($conn);
        }
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="stylesheet" href="../assets/css/style.css">
</head>
<body>
    <form action="" method="post">
        <div class="container">
            <h1>Register</h1>
            <label for="username" name="username"> Username :</label>
            <input type="text" name="username" placeholder="Username" required>
            <label for="password" name="password">Password :</label>
            <input type="password" name="password" placeholder="Password" required>
            <br>
            <button type="submit" name="register">Register</button>
            <br>
            <a href="login.php">Sudah Punya Akun? Login</a>
        </div>
    </form>
</body>
</html>