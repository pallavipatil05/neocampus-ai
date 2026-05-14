<?php
include "config.php";

$result = $conn->query("
SELECT * FROM Event
");

$events = [];

while($row = $result->fetch_assoc()){

    $events[] = [

        'title' => $row['event_name'],

        'start' => $row['event_date']
    ];
}
?>

<!DOCTYPE html>
<html>

<head>

<title>Event Calendar</title>

<link rel="stylesheet" href="assets/css/style.css">

<link href="https://cdn.jsdelivr.net/npm/fullcalendar@6.1.8/index.global.min.css"
rel="stylesheet">

<script src="https://cdn.jsdelivr.net/npm/fullcalendar@6.1.8/index.global.min.js"></script>

</head>

<body>

<div class="main">

<h1 style="color:white;">
📅 Event Calendar
</h1>

<br>

<div class="card">

<div id="calendar"></div>

</div>

</div>

<script>

document.addEventListener('DOMContentLoaded', function () {

    var calendarEl =
    document.getElementById('calendar');

    var calendar =
    new FullCalendar.Calendar(calendarEl, {

        initialView: 'dayGridMonth',

        events:
        <?php echo json_encode($events); ?>

    });

    calendar.render();
});

</script>

</body>
</html>