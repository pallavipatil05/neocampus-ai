<?php
include "config.php";

$totalStudents = $conn->query("
SELECT COUNT(*) as total FROM Student
")->fetch_assoc()['total'];

$totalEvents = $conn->query("
SELECT COUNT(*) as total FROM Event
")->fetch_assoc()['total'];

$totalRegistrations = $conn->query("
SELECT COUNT(*) as total FROM Registration
")->fetch_assoc()['total'];
?>

<!DOCTYPE html>
<html>

<head>

<title>Analytics</title>

<link rel="stylesheet" href="assets/css/style.css">

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

</head>

<body>

<div class="main">

<h1 style="color:white;">
📊 NeoCampus Analytics
</h1>

<br>

<div class="container">

<!-- STUDENTS -->

<div class="card">

<h2>Total Students</h2>

<h1>
<?php echo $totalStudents; ?>
</h1>

</div>

<!-- EVENTS -->

<div class="card">

<h2>Total Events</h2>

<h1>
<?php echo $totalEvents; ?>
</h1>

</div>

<!-- REGISTRATIONS -->

<div class="card">

<h2>Total Registrations</h2>

<h1>
<?php echo $totalRegistrations; ?>
</h1>

</div>

</div>

<br><br>

<!-- CHART -->

<div class="card">

<canvas id="myChart" height="120"></canvas>

</div>

</div>

<script>

const ctx = document.getElementById('myChart');

new Chart(ctx, {

type: 'bar',

data: {

labels: [
'Students',
'Events',
'Registrations'
],

datasets: [{

label: 'NeoCampus Analytics',

data: [

<?php echo $totalStudents; ?>,
<?php echo $totalEvents; ?>,
<?php echo $totalRegistrations; ?>

],

backgroundColor: [

'#c77dff',
'#9d4edd',
'#7b2cbf'

],

borderRadius: 10,
borderWidth: 1

}]

},

options: {

responsive:true,

plugins: {

legend: {

labels: {

color:'white',
font:{
size:16
}

}

}

},

scales: {

x: {

ticks: {

color:'white',
font:{
size:14
}

},

grid: {

color:'rgba(255,255,255,0.1)'

}

},

y: {

beginAtZero:true,

ticks: {

color:'white',
font:{
size:14
}

},

grid: {

color:'rgba(255,255,255,0.1)'

}

}

}

}

});

</script>

</body>
</html>