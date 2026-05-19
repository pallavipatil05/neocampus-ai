```php
<?php
session_start();
include "config.php";

if(!isset($_SESSION['srn'])){
    header("Location: login.php");
    exit();
}

$search = "";

if(isset($_GET['search'])){
    $search = $_GET['search'];
}

$result = $conn->query("
SELECT * FROM Event
WHERE event_name LIKE '%$search%'
ORDER BY event_date ASC
");
?>

<!DOCTYPE html>
<html>

<head>

<title>Admin Events</title>

<link rel="stylesheet" href="assets/css/style.css">

<style>

.event-grid{

    display:grid;

    grid-template-columns:
    repeat(3,1fr);

    gap:30px;

    align-items:start;

}

.btn-group{

    display:flex;

    flex-wrap:wrap;

    gap:10px;

    margin-top:20px;

}

.event-image{

    width:100%;

    height:220px;

    object-fit:cover;

    border-radius:15px;

}

/* TABLET */

@media(max-width:992px){

    .event-grid{

        grid-template-columns:
        repeat(2,1fr);

    }
}

/* MOBILE */

@media(max-width:768px){

    .event-grid{

        grid-template-columns:
        1fr;

    }
}

</style>

</head>

<body>

<div class="sidebar">

<h2>⚡ Admin Panel</h2>

<a href="dashboard.php">🏠 Dashboard</a>

<a href="admin_events.php">🎉 Events</a>

<a href="analytics.php">📊 Analytics</a>

<a href="profile.php">👤 Profile</a>

<a href="logout.php">🚪 Logout</a>

</div>

<div class="main">

<h1>⚡ Admin Events</h1>

<div class="search-box">

<form method="GET">

<input
type="text"
name="search"
placeholder="Search Events..."
value="<?php echo $search; ?>"
>

<button class="btn">
Search
</button>

</form>

</div>

<div class="event-grid">

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

<div class="btn-group">

<a href="edit_event.php?id=<?php echo $row['event_id']; ?>">

<button class="btn admin-btn">
✏ Edit
</button>

</a>

<a href="delete_event.php?id=<?php echo $row['event_id']; ?>">

<button class="btn admin-btn">
🗑 Delete
</button>

</a>

<a href="event_attendance.php?id=<?php echo $row['event_id']; ?>">

<button class="btn admin-btn">
📋 Attendances
</button>

</a>

<a href="view_registrations.php?id=<?php echo $row['event_id']; ?>">

<button class="btn admin-btn">
📋 Registrations
</button>

</a>

</div>

</div>

<?php
}

}else{

echo "

<h2 style='color:white;'>

No Events Found

</h2>

";
}
?>

</div>

</div>

</body>
</html>
