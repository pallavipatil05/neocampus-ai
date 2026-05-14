<!DOCTYPE html>
<html>

<head>

<title>NeoCampus Portal</title>

<link rel="stylesheet"
href="assets/css/style.css">

<style>

.portal{

display:flex;
justify-content:center;
align-items:center;

height:100vh;
gap:50px;

}

.portal-card{

width:350px;

padding:40px;

text-align:center;

background:rgba(255,255,255,0.08);

backdrop-filter:blur(20px);

border-radius:25px;

transition:0.3s;

}

.portal-card:hover{

transform:translateY(-10px);

}

.portal-card h1{

margin-bottom:20px;

}

</style>

</head>

<body>

<div class="portal">

<!-- STUDENT -->

<div class="portal-card">

<h1>🎓 Student Portal</h1>

<p>

Login to explore events,
AI assistant and certificates.

</p>

<br>

<a href="login.php">

<button class="btn">

Student Login

</button>

</a>

</div>

<!-- ADMIN -->

<div class="portal-card">

<h1>👨‍💼 Admin Portal</h1>

<p>

Manage events, analytics,
attendance and notifications.

</p>

<br>

<a href="admin_login.php">

<button class="btn">

Admin Login

</button>

</a>

</div>

</div>

</body>
</html>