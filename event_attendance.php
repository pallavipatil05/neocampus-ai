<?php
session_start();

include "config.php";

if(!isset($_SESSION['admin'])){

    header("Location: admin_login.php");
    exit();

}

/* GET EVENTS */

$events = $conn->query("
SELECT * FROM Event
ORDER BY event_date DESC
");
?>

<!DOCTYPE html>
<html>

<head>

<title>Event Attendance</title>

<link rel="stylesheet"
href="assets/css/style.css">

</head>

<body>

<div class="main">

<h1>
📋 Event Attendance
</h1>

<?php
while($event = $events->fetch_assoc()){
?>

<div class="card">

<h2>
🎉 <?php echo $event['event_name']; ?>
</h2>

<p>
📅 <?php echo $event['event_date']; ?>
</p>

<br>

<table>

<tr>

<th>ID</th>
<th>Student SRN</th>
<th>Date</th>
<th>Status</th>

</tr>

<?php

$event_id = $event['event_id'];

$attendance = $conn->query("

SELECT * FROM Attendance

WHERE event_id='$event_id'

ORDER BY attendance_id DESC

");

while($row = $attendance->fetch_assoc()){

?>

<tr>

<td>
<?php echo $row['attendance_id']; ?>
</td>

<td>
<?php echo $row['srn']; ?>
</td>

<td>
<?php echo $row['attendance_date']; ?>
</td>

<td>
<?php echo $row['status']; ?>
</td>

</tr>

<?php } ?>

</table>

</div>

<br><br>

<?php } ?>

</div>

</body>
</html>