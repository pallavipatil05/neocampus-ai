```php
<?php
session_start();

if(!isset($_SESSION['admin'])){

    header("Location: admin_login.php");
    exit();
}

include "config.php";

/* TOTAL STUDENTS */

$students = $conn->query("
SELECT * FROM Student
");

$totalStudents = $students->num_rows;

/* TOTAL EVENTS */

$events = $conn->query("
SELECT * FROM Event
");

$totalEvents = $events->num_rows;

/* TOTAL REGISTRATIONS */

$registrations = $conn->query("
SELECT * FROM Registration
");

$totalRegistrations = $registrations->num_rows;

?>

<!DOCTYPE html>
<html>

<head>

<title>Admin Dashboard</title>

<link rel="stylesheet" href="assets/css/style.css">

<link rel="stylesheet"
href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

<meta name="viewport"
content="width=device-width, initial-scale=1.0">

</head>

<body>

<!-- SIDEBAR -->

<div class="sidebar">

<h2>👨‍💼 Admin Panel</h2>

<br>

<a href="admin_dashboard.php">
🏠 Dashboard
</a>

<a href="admin_profile.php">
👨‍💼 Admin Profile
</a>

<a href="add_event.php">
➕ Add Event
</a>

<a href="admin_events.php">
🎉 Manage Events
</a>

<a href="attendance_dashboard.php">
🧾 Attendance
</a>

<a href="analytics.php">
📊 Analytics
</a>

<a href="calendar.php">
📅 Calendar
</a>

<a href="notifications.php">
🔔 Notifications
</a>

<a href="add_notification.php">
➕ Send Notification
</a>

<a href="admin_events.php">
📋 Event Registrations
</a>

<a href="logout.php">
🚪 Logout
</a>

</div>

<!-- MAIN -->

<div class="main">

<h1 style="color:white;">
Welcome Admin 👨‍💼
</h1>

<br>

<div class="container">

<!-- STUDENTS -->

<div class="card">

<h2>👨‍🎓 Students</h2>

<br>

<h1>
<?php echo $totalStudents; ?>
</h1>

<br>

<p>
Total Registered Students
</p>

</div>

<!-- EVENTS -->

<div class="card">

<h2>🎉 Events</h2>

<br>

<h1>
<?php echo $totalEvents; ?>
</h1>

<br>

<p>
Total Campus Events
</p>

</div>

<!-- REGISTRATIONS -->

<div class="card">

<h2>📝 Registrations</h2>

<br>

<h1>
<?php echo $totalRegistrations; ?>
</h1>

<br>

<p>
Total Event Registrations
</p>

</div>

<!-- QUICK ACTION -->

<div class="card">

<h2>➕ Quick Action</h2>

<br>

<p>
Create new campus event
</p>

<br>

<a href="add_event.php">

<button class="btn">
Add Event
</button>

</a>

</div>

<!-- ATTENDANCE -->

<div class="card">

<h2>🧾 Attendance</h2>

<br>

<p>
Manage student attendance
</p>

<br>

<a href="attendance_dashboard.php">

<button class="btn">
Open
</button>

</a>

</div>

<!-- ANALYTICS -->

<div class="card">

<h2>📊 Analytics</h2>

<br>

<p>
View event analytics
</p>

<br>

<a href="analytics.php">

<button class="btn">
View
</button>

</a>

</div>

<!-- EVENT REGISTRATIONS -->

<div class="card">

<h2>📋 Event Registrations</h2>

<br>

<p>
View registrations for all events
</p>

<br>

<a href="admin_events.php">

<button class="btn">
Open
</button>

</a>

</div>

</div>

</div>

</body>
</html>

