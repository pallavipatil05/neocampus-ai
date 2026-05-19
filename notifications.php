<?php
session_start();
include "config.php";

$result = $conn->query("
SELECT * FROM Notifications
ORDER BY id DESC
");
?>

<!DOCTYPE html>
<html>

<head>

<title>Notifications</title>

<link rel="stylesheet" href="assets/css/style.css">

</head>

<body>

<div class="sidebar">

<h2>🎓 NeoCampus</h2>

<a href="dashboard.php">🏠 Dashboard</a>

<a href="student_events.php">🎉 Events</a>

<a href="notifications.php">🔔 Notifications</a>

<a href="logout.php">🚪 Logout</a>

</div>

<div class="main">

<h1 style="color:white;">
🔔 Notifications
</h1>

<br>

<div class="container">

<?php

while($row = $result->fetch_assoc()){

?>

<div class="card">

<h2>
<?php echo $row['title']; ?>
</h2>

<br>

<p>
<?php echo $row['message']; ?>
</p>

<br>

<small>
<?php echo $row['created_at']; ?>
</small>

</div>

<?php
}
?>

</div>

</div>

</body>
</html>