<?php

include "config.php";

$id = $_GET['id'];

$conn->query("
DELETE FROM Event
WHERE event_id='$id'
");

echo "

<script>

alert('Event Deleted');

window.location='events.php';

</script>

";
?>