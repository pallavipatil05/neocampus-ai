<?php
session_start();

include "config.php";

$srn = $_SESSION['srn'];

$result = $conn->query("

SELECT Event.event_name,
Attendance.status

FROM Attendance

JOIN Event
ON Attendance.event_id = Event.event_id

WHERE Attendance.srn='$srn'

ORDER BY Attendance.attendance_id DESC

");
?>

<!DOCTYPE html>
<html>

<head>

<title>Activity Timeline</title>

<link rel="stylesheet"
href="assets/css/style.css">

</head>

<body>

<div class="main">

<h1>
📜 My Activity Timeline
</h1>

<div class="container">

<?php
while($row = $result->fetch_assoc()){
?>

<div class="card">

<h2>
🎉 <?php echo $row['event_name']; ?>
</h2>

<p>

Status:
<?php echo $row['status']; ?>

</p>

</div>

<?php } ?>

</div>

</div>

</body>
</html>