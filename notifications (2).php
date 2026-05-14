<?php
include "config.php";

$result = $conn->query("
SELECT * FROM Notification
ORDER BY id DESC
");
?>

<!DOCTYPE html>
<html>

<head>

<title>Notifications</title>

<link rel="stylesheet"
href="assets/css/style.css">

<style>

.notification{

padding:20px;
margin-top:20px;
border-radius:15px;
background:rgba(255,255,255,0.1);

}

.notification h2{

color:white;
}

.notification p{

color:#ddd;
}

</style>

</head>

<body>

<div class="main">

<h1 style="color:white;">
🔔 Notifications
</h1>

<br>

<?php while($row = $result->fetch_assoc()){ ?>

<div class="notification">

<h2>
<?php echo $row['title']; ?>
</h2>

<p>
<?php echo $row['message']; ?>
</p>

<small style="color:gray;">

<?php echo $row['created_at']; ?>

</small>

</div>

<?php } ?>

</div>

</body>
</html>