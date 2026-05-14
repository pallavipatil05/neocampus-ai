<?php
session_start();
include "config.php";

if(isset($_POST['login'])){

    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql = "
    SELECT * FROM Admin
    WHERE username='$username'
    AND password='$password'
    ";

    $result = $conn->query($sql);

    if($result->num_rows > 0){

        $_SESSION['admin'] = $username;

        header("Location: admin_dashboard.php");

    }else{

        echo "
        <script>
        alert('Invalid Admin Login');
        </script>
        ";
    }
}
?>

<!DOCTYPE html>
<html>

<head>

<title>Admin Login</title>

<link rel="stylesheet" href="assets/css/style.css">

<style>

.login-box{

    width:400px;
    margin:auto;
    margin-top:80px;
    padding:40px;
    border-radius:20px;
    background:rgba(255,255,255,0.15);
    backdrop-filter:blur(10px);
    text-align:center;
}

.login-box h1{
    color:white;
}

input{

    width:100%;
    padding:12px;
    margin-top:15px;
    border:none;
    border-radius:10px;
}

</style>

</head>

<body>

<div class="login-box">

<h1>👨‍💼 Admin Login</h1>

<form method="POST">

<input type="text"
name="username"
placeholder="Enter Username"
required>

<input type="password"
name="password"
placeholder="Enter Password"
required>

<br><br>

<button class="btn"
name="login">

Login

</button>

</form>

</div>

</body>
</html>