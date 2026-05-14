<?php
session_start();

include "config.php";

if(!isset($_SESSION['srn'])){

    header("Location: login.php");
    exit();

}

$srn = $_SESSION['srn'];

/* GET EVENTS */

$result = $conn->query("
SELECT * FROM Event
ORDER BY event_date DESC
");

if(isset($_POST['mark'])){

    $event_id = $_POST['event_id'];

    $date = date("Y-m-d");

    /* CHECK DUPLICATE */

    $check = $conn->query("
    SELECT * FROM Attendance
    WHERE srn='$srn'
    AND event_id='$event_id'
    ");

    if($check->num_rows == 0){

        $conn->query("
        INSERT INTO Attendance
        (srn,event_id,date,status)

        VALUES

        ('$srn','$event_id','$date','Present')
        ");

        echo "

        <script>

        alert('Attendance Marked Successfully');

        window.location='student_attendance.php';

        </script>

        ";

    }else{

        echo "

        <script>

        alert('Attendance Already Marked');

        </script>

        ";

    }

}
?>

<!DOCTYPE html>
<html>

<head>

<title>Student Attendance</title>

<link rel="stylesheet"
href="assets/css/style.css">

</head>

<body>

<div class="main">

<h1>
🧾 Mark Attendance
</h1>

<div class="container">

<?php
while($row = $result->fetch_assoc()){
?>

<div class="card">

<h2>
<?php echo $row['event_name']; ?>
</h2>

<p>
📅 Date:
<?php echo $row['event_date']; ?>
</p>

<p>
📍 Venue:
<?php echo $row['venue']; ?>
</p>

<form method="POST">

<input
type="hidden"
name="event_id"
value="<?php echo $row['event_id']; ?>">

<button
class="btn"
name="mark">

Mark Present

</button>

</form>

</div>

<?php } ?>

</div>

</div>

</body>
</html>