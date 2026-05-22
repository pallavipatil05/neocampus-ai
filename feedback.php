<?php

session_start();

include "config.php";

if(!isset($_SESSION['srn'])){

    header("Location: student_login.php");

    exit();
}

$event_id = $_GET['id'];

$srn = $_SESSION['srn'];

if(isset($_POST['submit'])){

    $rating = $_POST['rating'];

    $feedback = $_POST['feedback'];

    $sql = "
    INSERT INTO feedback(

    event_id,
    srn,
    rating,
    feedback_text

    )

    VALUES(

    '$event_id',
    '$srn',
    '$rating',
    '$feedback'

    )
    ";

    if($conn->query($sql)){

        echo "
        <script>

        alert('Feedback Submitted');

        window.location='student_events.php';

        </script>
        ";
    }
}

?>

<!DOCTYPE html>
<html>

<head>

<title>Event Feedback</title>

<link rel="stylesheet"
href="assets/css/style.css">

</head>

<body>

<div class="main">

<div class="card">

<h1>
⭐ Event Feedback
</h1>

<br>

<form method="POST">

<label>Rating (1-5)</label>

<input
type="number"
name="rating"
min="1"
max="5"
required
>

<label>Feedback</label>

<textarea
name="feedback"
rows="5"
required
></textarea>

<br><br>

<button
class="btn"
name="submit"
>

Submit Feedback

</button>

</form>

</div>

</div>

</body>
</html>
