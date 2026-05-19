```php
<?php
session_start();
include "config.php";

if(!isset($_SESSION['srn'])){
    header("Location: login.php");
    exit();
}

/* CHECK EVENT ID */

if(!isset($_GET['id'])){
    die("Invalid Event");
}

$event_id = $_GET['id'];

/* FETCH EVENT DETAILS */

$event = $conn->query("
SELECT * FROM Event
WHERE event_id='$event_id'
");

$e = $event->fetch_assoc();

/* FETCH REGISTRATIONS FOR THIS EVENT ONLY */


$result = $conn->query("

SELECT Registration.*,
Event.event_name

FROM Registration

INNER JOIN Event
ON Registration.event_id = Event.event_id

WHERE Registration.event_id = '$event_id'

");


if(!$result){
    die($conn->error);
}


?>

<!DOCTYPE html>
<html>

<head>

<title>View Registrations</title>

<link rel="stylesheet"
href="assets/css/style.css">

<meta name="viewport"
content="width=device-width, initial-scale=1.0">

<style>

.table-container{

    overflow-x:auto;

    margin-top:30px;
}

table{

    width:100%;

    border-collapse:collapse;

    background:
    rgba(255,255,255,0.05);

    backdrop-filter:blur(12px);

    border-radius:20px;

    overflow:hidden;
}

th{

    background:
    linear-gradient(
    135deg,
    #7b2cbf,
    #9d4edd
    );

    color:white;

    padding:16px;

    font-size:15px;
}

td{

    padding:14px;

    text-align:center;

    color:white;

    border-bottom:
    1px solid rgba(255,255,255,0.08);
}

tr:hover{

    background:
    rgba(255,255,255,0.05);
}

.page-title{

    font-size:40px;

    margin-bottom:10px;

    color:#f3e8ff;
}

.event-name{

    color:#c77dff;

    font-size:22px;

    margin-bottom:25px;
}

.no-data{

    text-align:center;

    color:white;

    font-size:22px;

    margin-top:40px;
}

</style>

</head>

<body>

<!-- SIDEBAR -->

<div class="sidebar">

<h2>⚡ Admin Panel</h2>

<a href="dashboard.php">
🏠 Dashboard
</a>

<a href="admin_events.php">
🎉 Events
</a>

<a href="analytics.php">
📊 Analytics
</a>

<a href="profile.php">
👤 Profile
</a>

<a href="logout.php">
🚪 Logout
</a>

</div>

<!-- MAIN -->

<div class="main">

<h1 class="page-title">
📋 Event Registrations
</h1>

<div class="event-name">

Event:
<b>
<?php echo $e['event_name']; ?>
</b>

</div>

<div class="table-container">

<?php

if($result->num_rows > 0){

?>

<table>

<tr>

<th>Team Name</th>

<th>Leader Name</th>

<th>Leader SRN</th>

<th>Member 2</th>

<th>Member 2 SRN</th>

<th>Member 3</th>

<th>Member 3 SRN</th>

<th>Member 4</th>

<th>Member 4 SRN</th>

</tr>

<?php

while($row = $result->fetch_assoc()){

?>

<tr>

<td>
<?php echo $row['team_name']; ?>
</td>

<td>
<?php echo $row['leader_name']; ?>
</td>

<td>
<?php echo $row['srn']; ?>
</td>

<td>
<?php echo $row['member2']; ?>
</td>

<td>
<?php echo $row['member2_srn']; ?>
</td>

<td>
<?php echo $row['member3']; ?>
</td>

<td>
<?php echo $row['member3_srn']; ?>
</td>

<td>
<?php echo $row['member4']; ?>
</td>

<td>
<?php echo $row['member4_srn']; ?>
</td>

</tr>

<?php
}
?>

</table>

<?php

}else{

echo "

<div class='no-data'>

No registrations found for this event

</div>

";
}
?>

</div>

</div>

</body>
</html>
```
