<!DOCTYPE html>
<html>

<head>

<title>NeoCampus AI</title>

<meta name="viewport"
content="width=device-width, initial-scale=1.0">

<link rel="stylesheet"
href="assets/css/style.css">

<style>

*{
    margin:0;
    padding:0;
    box-sizing:border-box;
}

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

    overflow:hidden;
}

/* BACKGROUND GLOW */

body::before{

    content:"";

    position:absolute;

    width:450px;
    height:450px;

    background:#a855f7;

    border-radius:50%;

    top:-120px;
    left:-120px;

    filter:blur(120px);

    opacity:0.4;
}

body::after{

    content:"";

    position:absolute;

    width:450px;
    height:450px;

    background:#06b6d4;

    border-radius:50%;

    bottom:-120px;
    right:-120px;

    filter:blur(120px);

    opacity:0.4;
}

/* MAIN */

.portal{

    position:relative;

    z-index:10;

    display:flex;

    justify-content:center;

    align-items:center;

    gap:50px;

    flex-wrap:wrap;

    width:90%;
}

/* CARD */

.portal-card{

    width:380px;

    padding:45px;

    text-align:center;

    background:
    rgba(255,255,255,0.08);

    backdrop-filter:blur(20px);

    border:
    1px solid rgba(255,255,255,0.1);

    border-radius:30px;

    transition:0.4s;

    box-shadow:
    0 8px 35px rgba(0,0,0,0.35);

}

.portal-card:hover{

    transform:
    translateY(-10px)
    scale(1.02);

    box-shadow:
    0 0 30px rgba(168,85,247,0.5);
}

/* ICON */

.portal-icon{

    font-size:80px;

    margin-bottom:20px;
}

/* TITLE */

.portal-card h1{

    color:white;

    margin-bottom:20px;

    font-size:38px;
}

.portal-card p{

    color:#ddd;

    line-height:1.8;

    margin-bottom:30px;

    font-size:17px;
}

/* BUTTONS */

.btn{

    display:block;

    width:100%;

    margin-bottom:18px;

    padding:15px;

    border:none;

    border-radius:15px;

    text-decoration:none;

    color:white;

    font-size:17px;

    font-weight:bold;

    transition:0.3s;

}

/* STUDENT */

.student-login{

    background:
    linear-gradient(
    135deg,
    #7c3aed,
    #a855f7
    );
}

.student-signup{

    background:
    linear-gradient(
    135deg,
    #06b6d4,
    #3b82f6
    );
}

/* ADMIN */

.admin-login{

    background:
    linear-gradient(
    135deg,
    #f43f5e,
    #ec4899
    );
}

.admin-signup{

    background:
    linear-gradient(
    135deg,
    #f59e0b,
    #ef4444
    );
}

.btn:hover{

    transform:translateY(-3px);

    box-shadow:
    0 0 25px rgba(255,255,255,0.3);
}

/* MOBILE */

@media(max-width:768px){

    .portal{
        padding:30px 0;
    }

    .portal-card{
        width:100%;
    }

    .portal-card h1{
        font-size:30px;
    }
}

</style>

</head>

<body>

<div class="portal">

<!-- STUDENT -->

<div class="portal-card">

<div class="portal-icon">
🎓
</div>

<h1>Student Portal</h1>

<p>

Login to explore events,
AI assistant, certificates
and campus activities.

</p>

<a href="student_login.php"
class="btn student-login">

Student Login

</a>

<a href="student_signup.php"
class="btn student-signup">

Student Signup

</a>

</div>

<!-- ADMIN -->

<div class="portal-card">

<div class="portal-icon">
👨‍💼
</div>

<h1>Admin Portal</h1>

<p>

Manage events, analytics,
attendance and notifications.

</p>

<a href="admin_login.php"
class="btn admin-login">

Admin Login

</a>

<a href="admin_signup.php"
class="btn admin-signup">

Admin Signup

</a>

</div>

</div>

</body>
</html>