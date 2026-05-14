<?php
include "config.php";

/* FETCH STUDENTS */

$students = $conn->query("
SELECT * FROM Student
");

/* FETCH EVENTS */

$events = $conn->query("
SELECT * FROM Event
");

if(isset($_POST['mark'])){

$srn = $_POST['srn'];

$event_id = $_POST['event_id'];

$conn->query("

INSERT INTO Attendance(

srn,
event_id,
attendance_date,
status

)

VALUES(

'$srn',
'$event_id',
CURDATE(),
'Present'

)

");

echo "

<script>

alert('Attendance Marked');

window.location='attendance_dashboard.php';

</script>

";
}
?>

<!DOCTYPE html>
<html>

<head>

<title>Mark Attendance</title>

<link rel="stylesheet"
href="assets/css/style.css">

<style>

table{

width:100%;
border-collapse:collapse;
background:white;
color:black;

}

table th{

background:#f1f1f1;
color:black;
padding:15px;
border:1px solid #ddd;
text-align:center;

}

table td{

background:white;
color:black;
padding:15px;
border:1px solid #ddd;
text-align:center;

}

</style>

</head>

<body>

<div class="main">

<div class="card" style="width:500px;">

<h1>🎟 Mark Attendance</h1>

<br>

<form method="POST">

<!-- STUDENT -->

<label style="color:white;">
Select Student
</label>

<select name="srn" required>

<option value="">
Choose Student
</option>

<?php while($s = $students->fetch_assoc()){ ?>

<option value="<?php echo $s['srn']; ?>">

<?php echo $s['name']; ?>

(<?php echo $s['srn']; ?>)

</option>

<?php } ?>

</select>

<br><br>

<!-- EVENT -->

<label style="color:white;">
Select Event
</label>

<select name="event_id" required>

<option value="">
Choose Event
</option>

<?php while($e = $events->fetch_assoc()){ ?>

<option value="<?php echo $e['event_id']; ?>">

<?php echo $e['event_name']; ?>

</option>

<?php } ?>

</select>

<br><br>

<button class="btn"
name="mark">

✅ Mark Attendance

</button>

</form>

</div>

</div>

</body>
</html>