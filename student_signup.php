<?php

include "config.php";

if(isset($_POST['signup'])){

    $name = $_POST['name'];

    $srn = $_POST['srn'];

    $email = $_POST['email'];

    $password = $_POST['password'];

    $role = "student";

    /* IMAGE */

    $photo = $_FILES['profile_photo']['name'];

    $tmp = $_FILES['profile_photo']['tmp_name'];

    move_uploaded_file(
        $tmp,
        "uploads/".$photo
    );

    /* CHECK SRN */

    $check = $conn->query("
    SELECT * FROM student
    WHERE srn='$srn'
    ");

    if($check->num_rows > 0){

        echo "
        <script>

        alert('SRN already exists');

        </script>
        ";

    }else{

        $sql = "
        INSERT INTO student(

        srn,
        name,
        email,
        password,
        profile_photo,
        role

        )

        VALUES(

        '$srn',
        '$name',
        '$email',
        '$password',
        '$photo',
        '$role'

        )
        ";

        if($conn->query($sql)){

            echo "
            <script>

            alert('Student Signup Successful');

            window.location='student_login.php';

            </script>
            ";

        }else{

            echo "
            <script>

            alert('Signup Failed');

            </script>
            ";
        }
    }
}

?>

<!DOCTYPE html>
<html>

<head>

<title>Student Signup</title>

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

.signup-card{

    width:450px;

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

.signup-card h1{

    color:white;

    text-align:center;

    margin-bottom:30px;
}

label{

    color:white;

    display:block;

    margin-bottom:8px;

    margin-top:15px;
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

.login-link{

    text-align:center;

    margin-top:20px;

    color:white;
}

.login-link a{

    color:#a855f7;

    text-decoration:none;
}

</style>

</head>

<body>

<div class="signup-card">

<h1>
🎓 Student Signup
</h1>

<form method="POST"
enctype="multipart/form-data">

<label>Full Name</label>

<input
type="text"
name="name"
required
>

<label>SRN</label>

<input
type="text"
name="srn"
required
>

<label>Email</label>

<input
type="email"
name="email"
required
>

<label>Password</label>

<input
type="password"
name="password"
required
>

<label>Profile Picture</label>

<input
type="file"
name="profile_photo"
required
>

<button
type="submit"
name="signup"
class="btn">

Create Account

</button>

</form>

<div class="login-link">

Already have an account?

<a href="student_login.php">

Login

</a>

</div>

</div>

</body>
</html>
