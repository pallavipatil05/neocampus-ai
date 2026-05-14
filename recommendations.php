<?php

include "config.php";

/* MOST REGISTERED EVENTS */

$sql = "

SELECT

Event.*,
COUNT(*) AS total
FROM Registration

JOIN Event

ON Registration.event_id = Event.event_id

GROUP BY Event.event_id

ORDER BY total DESC

LIMIT 5

";

$result = $conn->query($sql);

?>

<!DOCTYPE html>
<html>

<head>

<title>AI Recommendations</title>

<link rel="stylesheet"
href="assets/css/style.css">

<style>

.event-grid{

display:grid;

grid-template-columns:
repeat(auto-fit,minmax(300px,1fr));

gap:20px;

}

.event-card{

background:rgba(255,255,255,0.08);

backdrop-filter:blur(10px);

padding:20px;

border-radius:20px;

transition:0.3s;

}

.event-card:hover{

transform:translateY(-5px);

}

.event-card img{

width:100%;

height:200px;

object-fit:cover;

border-radius:15px;

}

.event-card h2{

color:white;

margin-top:15px;

}

.event-card p{

color:#ddd;

}

</style>

</head>

<body>

<div class="main">

<h1 style="color:white;">
🤖 AI Recommended Events
</h1>

<br>

<div class="event-grid">

<?php while($row = $result->fetch_assoc()){ ?>

<div class="event-card">

<img src="uploads/<?php echo $row['image']; ?>">

<h2>

<?php echo $row['event_name']; ?>

</h2>

<p>

<?php echo $row['description']; ?>

</p>

<br>

<p style="color:#00ff99;">

🔥 Popularity Score:
<?php echo $row['total']; ?>

registrations

</p>

<br>

<a href="register.php?event_id=<?php echo $row['event_id']; ?>">

<button class="btn">

Register

</button>

</a>

</div>

<?php } ?>

</div>

</div>

</body>
</html>