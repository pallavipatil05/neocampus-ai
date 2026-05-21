<?php

session_start();

include "config.php";

if(isset($_POST['login'])){

    $srn = $_POST['srn'];

    $password = $_POST['password'];

    $sql = "
    SELECT * FROM student
    WHERE srn='$srn'
    AND password='$password'
    ";

    $result = $conn->query($sql);

    if($result->num_rows > 0){

        $row = $result->fetch_assoc();

        $_SESSION['srn'] = $row['srn'];

        $_SESSION['name'] = $row['name'];

        $_SESSION['role'] = "student";

        echo "
        <script>

        alert('Login Successful');

        window.location='dashboard.php';

        </script>
        ";

    }else{

        echo "
        <script>

        alert('Invalid SRN or Password');

        </script>
        ";
    }
}

?>

<!DOCTYPE html>
<html>

<head>

<title>Student Login</title>

<meta name="viewport"
content="width=device-width, initial-scale=1.0">

<link rel="stylesheet"
href="assets/css/style.css">

<style>

body{

    min-height:100vh;

    display:flex;

    justify-content:center;

    align-items:center;

    background:
    linear-gradient(
    135deg,
    #0f172a,
    #1e1b4b,
    #111827
    );
}

/* CARD */

.login-card{

    width:430px;

    padding:40px;

    background:
    rgba(255,255,255,0.08);

    backdrop-filter:blur(18px);

    border:
    1px solid rgba(255,255,255,0.1);

    border-radius:30px;

    box-shadow:
    0 8px 35px rgba(0,0,0,0.35);
}

.login-card h1{

    color:white;

    text-align:center;

    margin-bottom:30px;
}

label{

    color:white;

    display:block;

    margin-bottom:8px;

    margin-top:18px;
}

input{

    width:100%;

    padding:14px;

    border:none;

    border-radius:14px;

    background:
    rgba(255,255,255,0.08);

    color:white;

    outline:none;
}

.btn{

    width:100%;

    margin-top:30px;

    padding:15px;

    border:none;

    border-radius:14px;

    background:
    linear-gradient(
    135deg,
    #7c3aed,
    #a855f7
    );

    color:white;

    font-size:17px;

    font-weight:bold;

    cursor:pointer;

    transition:0.3s;
}

.btn:hover{

    transform:translateY(-3px);

    box-shadow:
    0 0 25px rgba(168,85,247,0.5);
}

.signup-link{

    text-align:center;

    margin-top:20px;

    color:white;
}

.signup-link a{

    color:#a855f7;

    text-decoration:none;
}

</style>

</head>

<body>

<div class="login-card">

<h1>
🎓 Student Login
</h1>

<form method="POST">

<label>SRN</label>

<input
type="text"
name="srn"
required
>

<label>Password</label>

<input
type="password"
name="password"
required
>

<button
type="submit"
name="login"
class="btn">

Login

</button>

</form>

<div class="signup-link">

Don't have an account?

<a href="student_signup.php">

Signup

</a>

</div>

</div>

</body>
</html>
