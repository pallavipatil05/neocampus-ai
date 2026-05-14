<?php
include "config.php";

if(isset($_POST['send'])){

$title = $_POST['title'];

$message = $_POST['message'];

$conn->query("

INSERT INTO Notification(

title,
message

)

VALUES(

'$title',
'$message'

)

");

echo "

<script>

alert('Notification Sent');

window.location='notifications.php';

</script>

";
}
?>

<!DOCTYPE html>
<html>

<head>

<title>Add Notification</title>

<link rel="stylesheet"
href="assets/css/style.css">

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

<h1>🔔 Send Notification</h1>

<br>

<form method="POST">

<input type="text"
name="title"
placeholder="Notification Title"
required>

<br>

<textarea
name="message"
placeholder="Write message..."
required></textarea>

<br><br>

<button class="btn"
name="send">

Send Notification

</button>

</form>

</div>

</div>

</body>
</html>