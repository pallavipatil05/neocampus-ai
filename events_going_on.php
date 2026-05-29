<?php

session_start();

include "config.php";

/* NOTIFICATION COUNT */

$notify = $conn->query("

SELECT * FROM notifications

WHERE is_read = 0

");

$notifyCount = $notify->num_rows;

/* LOGIN CHECK */

if(!isset($_SESSION['srn'])){

    header("Location: student_login.php");

    exit();
}

/* LIVE EVENTS */

$result = $conn->query("

SELECT * FROM Event

WHERE event_date = CURDATE()

ORDER BY event_date ASC

");

?>


<!DOCTYPE html>
<html>

<head>

<title>Events Going On</title>

<link rel="stylesheet"
href="assets/css/style.css">

<style>

.container{

display:flex;

flex-wrap:wrap;

gap:25px;

}

.card{

width:350px;

}

.event-image{

width:100%;

height:220px;

object-fit:cover;

border-radius:15px;

margin-bottom:15px;

}

.live-badge{

background:#00ff99;

color:black;

padding:8px 15px;

border-radius:20px;

font-weight:bold;

display:inline-block;

margin-bottom:15px;

}

</style>

</head>

<body>

<!-- SIDEBAR -->

<div class="sidebar">

<h2>🎓 NeoCampus</h2>

<a href="student_dashboard.php">
🏠 Dashboard
</a>

<a href="events_going_on.php">
🟢 Events Going On
</a>

<a href="student_events.php">
📅 Upcoming Events
</a>

<a href="completed_events.php">
✅ Completed Events
</a>

<a href="notifications.php">

🔔 Notifications

<?php

if($notifyCount > 0){

echo "
<span class='badge'>
$notifyCount
</span>
";

}

?>

</a>


<a href="profile.php">
👤 My Profile
</a>

<a href="logout.php">
🚪 Logout
</a>

</div>

<!-- MAIN -->

<div class="main">

<h1 style="color:white;">
🟢 Events Going On
</h1>

<br>

<div class="container">

<?php

if($result->num_rows > 0){

while($row = $result->fetch_assoc()){

?>

<div class="card">

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

<div class="live-badge">
LIVE NOW
</div>

<h2>
<?php echo $row['event_name']; ?>
</h2>

<p>
<?php echo $row['description']; ?>
</p>

<p>
📅 <?php echo $row['event_date']; ?>
</p>

<p>
📍 <?php echo $row['venue']; ?>
</p>

<p>
👥 Team Size:
<?php echo $row['capacity']; ?>
</p>

<br>

<a href="register_event.php?id=<?php echo $row['event_id']; ?>">

<button class="btn">

🚀 Register

</button>

</a>

</div>

<?php

}

}else{

echo "

<h2 style='color:white;'>

No Live Events Today

</h2>

";
}
?>

</div>

</div>

</body>
</html>
