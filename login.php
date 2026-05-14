<?php
session_start();

include "config.php";

if(isset($_POST['login'])){

    $srn = $_POST['srn'];

    $password = $_POST['password'];

    $sql = "

    SELECT * FROM Student

    WHERE srn='$srn'
    AND password='$password'

    ";

    $result = $conn->query($sql);

  if($result->num_rows > 0){

    $row = $result->fetch_assoc();

    $_SESSION['srn'] = $row['srn'];

    $_SESSION['role'] = $row['role'];

    header("Location: dashboard.php");

}

        exit();

    }else{

        echo "

        <script>

        alert('Invalid Student Login');

        </script>

        ";

    }


?>

<!DOCTYPE html>
<html>

<head>

<title>NeoCampus Student Login</title>

<link rel="stylesheet"
href="assets/css/style.css">

<style>

.login-box{

width:350px;

margin:100px auto;

padding:40px;

border-radius:20px;

background:rgba(255,255,255,0.15);

backdrop-filter:blur(10px);

color:white;

}

.login-box input{

width:100%;

padding:12px;

margin:10px 0;

border:none;

border-radius:10px;

}

</style>

</head>

<body>

<div class="login-box">

<h1>🎓 Student Login</h1>

<form method="POST">

<input type="text"
name="srn"
placeholder="Enter SRN"
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