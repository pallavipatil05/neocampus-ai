<?php
include "config.php";

$result = $conn->query("
SELECT * FROM Event
ORDER BY event_date ASC
LIMIT 1
");

$row = $result->fetch_assoc();
?>

<div class="card">

<h2>
⏰ Upcoming Event Reminder
</h2>

<br>

<h1>
<?php echo $row['event_name']; ?>
</h1>

<p>

📅 Date:
<?php echo $row['event_date']; ?>

</p>

<p>

📍 Venue:
<?php echo $row['venue']; ?>

</p>

<br>

<button class="btn">

Don't Miss It 🚀

</button>

</div>