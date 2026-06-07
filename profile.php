<?php

session_start();
include "config.php";

if(!isset($_SESSION['srn'])){
    header("Location: login.php");
    exit();
}

$srn = $_SESSION['srn'];

/* STUDENT DETAILS */

$result = $conn->query("
SELECT *
FROM Student
WHERE srn='$srn'
");

$row = $result->fetch_assoc();

/* ATTENDED EVENTS */

$attendedQuery = $conn->query("
SELECT COUNT(*) AS total
FROM Attendance
WHERE srn='$srn'
AND status='Present'
");

$attended = $attendedQuery->fetch_assoc()['total'];

/* REGISTERED EVENTS */

$registeredQuery = $conn->query("
SELECT COUNT(*) AS total
FROM Registration
WHERE srn='$srn'
");

$registered = $registeredQuery->fetch_assoc()['total'];

$pending = $registered - $attended;

?>

<!DOCTYPE html>
<html>

<head>

<title>My Profile</title>

<link rel="stylesheet" href="assets/css/style.css">

<style>

.profile-grid{

    display:grid;
    grid-template-columns:
    repeat(auto-fit,minmax(320px,1fr));

    gap:25px;
}

.profile-pic{

    width:180px;
    height:180px;

    border-radius:50%;

    object-fit:cover;

    border:4px solid #9b59ff;

    margin:auto;
    display:block;
}

.stat{

    font-size:50px;
    font-weight:bold;
    text-align:center;

    color:white;
}

.info{

    font-size:18px;
    line-height:35px;
}

</style>

</head>

<body>

<div class="sidebar">

<h2>🎓 NeoCampus</h2>

<a href="dashboard.php">🏠 Dashboard</a>

<a href="student_events.php">📅 Events</a>

<a href="notifications.php">🔔 Notifications</a>

<a href="profile.php">👤 My Profile</a>

<a href="logout.php">🚪 Logout</a>

</div>

<div class="main">

<h1>👤 My Profile</h1>

<div class="profile-grid">

<!-- PROFILE CARD -->

<div class="card">

<?php

if(!empty($row['profile_photo'])){

echo "
<img
src='uploads/".$row['profile_photo']."'
class='profile-pic'>
";

}else{

echo "
<img
src='assets/images/default-user.png'
class='profile-pic'>
";
}

?>

<br>

<div class="info">

<b>Name:</b>
<?php echo $row['name']; ?>

<br>

<b>SRN:</b>
<?php echo $row['srn']; ?>

<br>

<b>Email:</b>
<?php echo $row['email']; ?>

<br>

<b>Phone:</b>
<?php echo $row['phone']; ?>

<br>

<b>Department:</b>
<?php echo $row['department']; ?>

</div>

</div>

<!-- ATTENDED -->

<div class="card">

<h2>✅ Events Attended</h2>

<div class="stat">

<?php echo $attended; ?>

</div>

</div>

<!-- PENDING -->

<div class="card">

<h2>⌛ Yet To Attend</h2>

<div class="stat">

<?php echo $pending; ?>

</div>

</div>

</div>

<br><br>

<div class="card">

<h2>📊 Registration Summary</h2>

<p>

Total Registered Events:
<b><?php echo $registered; ?></b>

</p>

<p>

Events Attended:
<b><?php echo $attended; ?></b>

</p>

<p>

Pending Events:
<b><?php echo $pending; ?></b>

</p>

</div>

</div>

</body>
</html>