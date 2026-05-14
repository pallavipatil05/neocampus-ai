<?php
include "config.php";
?>

<!DOCTYPE html>
<html>

<head>

<title>Add Event</title>

<link rel="stylesheet" href="assets/css/style.css">

<style>

.form-box{

    width:600px;
    margin:auto;
    margin-top:40px;
}

input,
textarea{

    width:100%;
    padding:12px;
    margin-top:10px;
    border:none;
    border-radius:10px;
    font-size:16px;
}

textarea{

    height:120px;
}

label{

    color:white;
    font-weight:bold;
}

</style>

</head>

<body>

<div class="main">

<div class="card form-box">

<h1>➕ Add New Event</h1>

<br>

<form action="save_event.php"
method="POST"
enctype="multipart/form-data">

<label>Event Name</label>

<input type="text"
name="name"
required>

<br>

<label>Event Date</label>

<input type="date"
name="date"
required>

<br>

<label>Event Time</label>

<input type="time"
name="time"
required>

<br>

<label>Venue</label>

<input type="text"
name="venue"
required>

<br>

<label>Description</label>

<textarea
name="description"
required></textarea>

<br>

<label>Capacity</label>

<input type="number"
name="capacity"
required>

<br>

<label>Last Registration Date</label>

<input type="date"
name="last_date"
required>

<br>

<label>Event Poster</label>

<input type="file"
name="image"
required>

<br><br>

<button class="btn"
type="submit">

🚀 Add Event

</button>

</form>

</div>

</div>

</body>
</html>