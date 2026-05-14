<?php
session_start();

include "config.php";

if(!isset($_SESSION['srn'])){

    header("Location: login.php");
    exit();

}

$srn = $_SESSION['srn'];

/* REGISTERED */

$registered = $conn->query("
SELECT COUNT(*) as total
FROM Registration
WHERE srn='$srn'
")->fetch_assoc()['total'];

/* ATTENDED */

$attended = $conn->query("
SELECT COUNT(*) as total
FROM Attendance
WHERE srn='$srn'
AND status='Present'
")->fetch_assoc()['total'];

/* PENDING */

$pending = $registered - $attended;

/* CERTIFICATES */

$certificates = $attended;

if($registered > 0){

    $percentage =
    ($attended / $registered) * 100;

}else{

    $percentage = 0;

}
?>

<!DOCTYPE html>
<html>

<head>

<title>Student Analytics</title>

<link rel="stylesheet"
href="assets/css/style.css">

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

</head>

<body>

<div class="main">

<h1>
📊 My Analytics
</h1>

<div class="container">

<div class="card">

<h2>
🎉 Registered Events
</h2>

<h1>
<?php echo $registered; ?>
</h1>

</div>

<div class="card">

<h2>
✅ Attended Events
</h2>

<h1>
<?php echo $attended; ?>
</h1>

</div>

<div class="card">

<h2>
⏳ Pending Events
</h2>

<h1>
<?php echo $pending; ?>
</h1>

</div>

<div class="card">

<h2>
🏆 Certificates
</h2>

<h1>
<?php echo $certificates; ?>
</h1>

</div>

</div>

<br><br>

<div class="card">

<canvas id="myChart"
height="120"></canvas>

</div>

</div>

<script>

const ctx =
document.getElementById('myChart');

new Chart(ctx, {

type: 'doughnut',

data: {

labels: [

'Registered',
'Attended',
'Pending'

],

datasets: [{

data: [

<?php echo $registered; ?>,
<?php echo $attended; ?>,
<?php echo $pending; ?>

],

backgroundColor:[

'#c77dff',
'#9d4edd',
'#7b2cbf'

]

}]

},

options:{

plugins:{

legend:{

labels:{

color:'white'

}

}

}

}

});

</script>

</body>
</html>