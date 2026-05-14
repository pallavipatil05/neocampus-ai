<?php

include "config.php";

$id = $_POST['event_id'];

$name = $_POST['event_name'];

$description = $_POST['description'];

$date = $_POST['event_date'];

$venue = $_POST['venue'];

$capacity = $_POST['capacity'];

$conn->query("
UPDATE Event

SET

event_name='$name',
description='$description',
event_date='$date',
venue='$venue',
capacity='$capacity'

WHERE event_id='$id'
");

echo "

<script>

alert('Event Updated Successfully');

window.location='events.php';

</script>

";
?>