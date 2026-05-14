<?php
include "config.php";

$result = $conn->query("

SELECT
Attendance.*,
Student.name,
Event.event_name

FROM Attendance

JOIN Student
ON Attendance.srn = Student.srn

JOIN Event
ON Attendance.event_id = Event.event_id

ORDER BY attendance_id DESC

");
?>

<!DOCTYPE html>
<html>

<head>

<title>Attendance Dashboard</title>

<link rel="stylesheet"
href="assets/css/style.css">

<style>

table{

width:100%;
border-collapse:collapse;

background:rgba(255,255,255,0.08);

backdrop-filter:blur(10px);

border-radius:15px;

overflow:hidden;

}

table th{

background:rgba(255,255,255,0.15);

color:white;

padding:15px;

border:1px solid rgba(255,255,255,0.1);

text-align:center;

}

table td{

color:white;

padding:15px;

border:1px solid rgba(255,255,255,0.1);

text-align:center;

}

</style>

</head>

<body>

<div class="main">

<h1 style="color:white;">
🧾 Attendance Dashboard
</h1>

<br>

<div class="card">

<table>

<tr>

<th>ID</th>
<th>Student</th>
<th>Event</th>
<th>Date</th>
<th>Status</th>

</tr>

<?php while($row = $result->fetch_assoc()){ ?>

<tr>

<td>
<?php echo $row['attendance_id']; ?>
</td>

<td>
<?php echo $row['name']; ?>
</td>

<td>
<?php echo $row['event_name']; ?>
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

</div>

</body>
</html>