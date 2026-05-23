<?php
session_start();
include "config.php";

if(!isset($_SESSION['srn'])){
    header("Location: login.php");
    exit();
}

if($_SESSION['role'] != 'student'){
    header("Location: admin_events.php");
    exit();
}

$search = "";

if(isset($_GET['search'])){
    $search = $_GET['search'];
}

$result = $conn->query("
SELECT * FROM Event 
WHERE event_date >= CURDATE()
 ORDER BY event_date ASC
");
?>

<!DOCTYPE html>
<html>

<head>

<title>Student Events</title>

<link rel="stylesheet" href="assets/css/style.css">

<link rel="stylesheet"
href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

<meta name="viewport"
content="width=device-width, initial-scale=1.0">

<style>

.search-box{
    text-align:center;
    margin-bottom:40px;
}

.search-box form{
    display:flex;
    justify-content:center;
    gap:15px;
    flex-wrap:wrap;
}

.search-box input{
    width:320px;
}

.event-grid{

    display:grid;

    grid-template-columns:
    repeat(auto-fit,minmax(320px,1fr));

    gap:30px;
}

.event-card{

    overflow:hidden;

    border-radius:25px;

    background:
    rgba(255,255,255,0.06);

    backdrop-filter:blur(18px);

    border:
    1px solid rgba(255,255,255,0.08);

    transition:0.4s;

    box-shadow:
    0 10px 35px rgba(0,0,0,0.4);
}

.event-card:hover{

    transform:
    translateY(-10px)
    scale(1.02);

    box-shadow:
    0 0 30px rgba(168,85,247,0.4);
}

.event-image{

    width:100%;
    height:220px;

    object-fit:cover;
}

.event-content{
    padding:25px;
}

.badge{

    display:inline-block;

    padding:8px 16px;

    border-radius:30px;

    background:
    linear-gradient(
    135deg,
    #00f2fe,
    #4facfe
    );

    color:black;

    font-size:13px;

    font-weight:bold;

    margin-bottom:15px;
}

.event-title{

    font-size:32px;

    color:#f3e8ff;

    margin-bottom:15px;
}

.event-info{

    margin-top:10px;

    color:#ddd;

    font-size:16px;

    line-height:1.8;
}

.btn-group{

    margin-top:25px;

    display:flex;

    flex-wrap:wrap;

    gap:12px;
}

.team-box{

    margin-top:20px;

    padding:15px;

    border-radius:15px;

    background:
    rgba(255,255,255,0.05);

    border:
    1px solid rgba(255,255,255,0.08);
}

.team-box h3{

    color:#c77dff;

    margin-bottom:10px;
}

@media(max-width:768px){

    .main{
        margin-left:0;
        padding:20px;
    }

    .sidebar{
        position:relative;
        width:100%;
        height:auto;
    }
}

</style>

</head>

<body>

<!-- SIDEBAR -->

<div class="sidebar">

<h2>🎓 NeoCampus</h2>

<a href="dashboard.php">
<i class="fa-solid fa-house"></i>
Dashboard
</a>

<a href="student_events.php">
<i class="fa-solid fa-calendar-days"></i>
Events
</a>

<a href="notifications.php">
<i class="fa-solid fa-bell"></i>
Notifications
</a>

<a href="profile.php">
<i class="fa-solid fa-user"></i>
My Profile
</a>

<a href="logout.php">
<i class="fa-solid fa-right-from-bracket"></i>
Logout
</a>

</div>

<!-- MAIN -->

<div class="main">

<div class="hero">

<h1 class="hero-title">
🎉 Student Events
</h1>

<p class="hero-subtitle">

Register for events and download certificates

</p>

</div>

<!-- SEARCH -->

<div class="search-box">

<form method="GET">

<input
type="text"
name="search"
placeholder="Search Events..."
value="<?php echo $search; ?>"
>

<button class="btn">
<i class="fa-solid fa-magnifying-glass"></i>
Search
</button>

</form>

</div>

<!-- EVENTS -->

<div class="event-grid">

<?php

if($result->num_rows > 0){

while($row = $result->fetch_assoc()){

?>

<div class="event-card">

<?php
if(!empty($row['image'])){
?>

<img
src="uploads/<?php echo $row['image']; ?>"
class="event-image"
>

<?php
}
?>

<div class="event-content">

<div class="badge">
Upcoming Event
</div>

<h2 class="event-title">
<?php echo $row['event_name']; ?>
</h2>

<p class="event-info">
<?php echo $row['description']; ?>
</p>

<div class="event-info">
📅 <?php echo $row['event_date']; ?>
</div>

<div class="event-info">
📍 <?php echo $row['venue']; ?>
</div>

<div class="event-info">
👥 Team Size:
<?php echo $row['capacity']; ?>
</div>

<div class="team-box">

<h3>👨‍💻 Team Registration</h3>

<p>
One student can register
the complete team.
</p>

<p>
Add teammate names during registration.
</p>

</div>

<div class="btn-group">

<a href="register_event.php?id=<?php echo $row['event_id']; ?>">

<button class="btn">
🚀 Register
</button>

</a>

<a href="generate_certificate.php?srn=<?php echo $_SESSION['srn']; ?>&event_id=<?php echo $row['event_id']; ?>">

<button class="btn">
🏆 Certificate
</button>

</a>

<a href="feedback.php?id=<?php echo $row['event_id']; ?>">

<button class="btn">

⭐ Feedback

</button>

</a>


</div>

</div>

</div>

<?php
}

}else{

echo "

<h2 style='color:white;text-align:center;'>

No Events Found

</h2>

";
}
?>

</div>

</div>

<script src="assets/js/main.js"></script>

</body>
</html>

