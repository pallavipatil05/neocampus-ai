<?php
session_start();
include "config.php";

if(!isset($_SESSION['srn'])){
    header("Location: login.php");
    exit();
}

if($_SESSION['role'] != "admin"){
    header("Location: dashboard.php");
    exit();
}

$result = $conn->query("

SELECT
Registration.*,
Event.event_name

FROM Registration

JOIN Event
ON Registration.event_id = Event.event_id

ORDER BY Registration.id DESC

");
?>

<!DOCTYPE html>
<html>

<head>

<title>Team Registrations</title>

<link rel="stylesheet"
href="assets/css/style.css">

<link rel="stylesheet"
href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

<meta name="viewport"
content="width=device-width, initial-scale=1.0">

</head>

<body>

<!-- SIDEBAR -->

<div class="sidebar">

<h2>🎓 NeoCampus</h2>

<a href="dashboard.php">
<i class="fa-solid fa-house"></i>
Dashboard
</a>

<a href="events.php">
<i class="fa-solid fa-calendar-days"></i>
Events
</a>

<a href="add_event.php">
<i class="fa-solid fa-plus"></i>
Add Event
</a>

<a href="team_registrations.php">
<i class="fa-solid fa-users"></i>
Team Registrations
</a>

<a href="analytics.php">
<i class="fa-solid fa-chart-line"></i>
Analytics
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

👨‍💻 Team Registrations

</h1>

<p class="hero-subtitle">

View all team registrations
for campus events

</p>

</div>

<div class="card">

<table>

<tr>

<th>Event</th>
<th>Leader SRN</th>
<th>Team Name</th>
<th>Member 2</th>
<th>Member 2 SRN</th>

<th>Member 3</th>
<th>Member 3 SRN</th>

<th>Member 4</th>
<th>Member 4 SRN</th>

</tr>

<?php

while($row = $result->fetch_assoc()){

?>

<tr>

<td>
<?php echo $row['event_name']; ?>
</td>

<td>
<?php echo $row['srn']; ?>
</td>

<td>
<?php echo $row['team_name']; ?>
</td>

<td><?php echo $row['member2']; ?></td>
<td><?php echo $row['member2_srn']; ?></td>

<td><?php echo $row['member3']; ?></td>
<td><?php echo $row['member3_srn']; ?></td>

<td><?php echo $row['member4']; ?></td>
<td><?php echo $row['member4_srn']; ?></td>

</tr>

<?php
}
?>

</table>

</div>

</div>

</body>
</html>