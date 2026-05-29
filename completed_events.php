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

/* COMPLETED EVENTS */

$result = $conn->query("

SELECT * FROM Event

WHERE event_date < CURDATE()

ORDER BY event_date DESC

");

?>


<!DOCTYPE html>
<html>

<head>

<title>Completed Events</title>

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

</style>

</head>

<body>

<!-- SIDEBAR -->

<div class="sidebar">

<h2>🎓 Student Panel</h2>

<a href="student_dashboard.php">
🏠 Dashboard
</a>

<a href="student_events.php">
🎉 Upcoming Events
</a>

<a href="completed_events.php">
✅ Completed Events
</a>

<a href="profile.php">
👤 Profile
</a>

<a href="logout.php">
🚪 Logout
</a>

</div>

<!-- MAIN -->

<div class="main">

<h1 style="color:white;">
✅ Completed Events
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

<!-- FEEDBACK -->

<a href="feedback.php?id=<?php echo $row['event_id']; ?>">

<button class="btn">

⭐ Give Feedback

</button>

</a>

<br><br>

<!-- CERTIFICATE -->

<a href="generate_certificate.php?event_id=<?php echo $row['event_id']; ?>">

<button class="btn">

🏆 Download Certificate

</button>

</a>

</div>

<?php

}

}else{

echo "

<h2 style='color:white;'>

No Completed Events

</h2>

";
}
?>

</div>

</div>

</body>
</html>
