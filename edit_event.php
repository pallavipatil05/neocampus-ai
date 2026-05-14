<?php

include "config.php";

$id = $_GET['id'];

$sql = "
SELECT * FROM Event
WHERE event_id='$id'
";

$result = $conn->query($sql);

$row = $result->fetch_assoc();

?>

<!DOCTYPE html>
<html>

<head>

<title>Edit Event</title>

<link rel="stylesheet" href="assets/css/style.css">

<style>

input,
textarea{

width:100%;
padding:12px;
margin-top:10px;
border:none;
border-radius:10px;

}

</style>

</head>

<body>

<div class="main">

<div class="card" style="width:600px;">

<h1>Edit Event</h1>

<br>

<form action="update_event.php"
method="POST">

<input type="hidden"
name="event_id"
value="<?php echo $row['event_id']; ?>">

<label>Event Name</label>

<input type="text"
name="event_name"
value="<?php echo $row['event_name']; ?>"
required>

<br>

<label>Description</label>

<textarea
name="description"
required><?php echo $row['description']; ?></textarea>

<br>

<label>Event Date</label>

<input type="date"
name="event_date"
value="<?php echo $row['event_date']; ?>"
required>

<br>

<label>Venue</label>

<input type="text"
name="venue"
value="<?php echo $row['venue']; ?>"
required>

<br>

<label>Capacity</label>

<input type="number"
name="capacity"
value="<?php echo $row['capacity']; ?>"
required>

<br><br>

<button class="btn">

Update Event

</button>

</form>

</div>

</div>

</body>
</html>