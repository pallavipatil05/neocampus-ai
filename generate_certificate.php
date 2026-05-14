<?php
session_start();
include "config.php";

$srn = $_GET['srn'];
$event_id = $_GET['event_id'];

$student = $conn->query("SELECT * FROM Student WHERE srn='$srn'");
$s = $student->fetch_assoc();

$event = $conn->query("SELECT * FROM Event WHERE event_id='$event_id'");
$e = $event->fetch_assoc();

$cert_no = "CERT".rand(1000,9999);

$conn->query("INSERT INTO Certificate (srn,event_id,position,certificate_no,issue_date)
VALUES ('$srn','$event_id','Participation','$cert_no',CURDATE())");
?>

<!DOCTYPE html>
<html>

<head>
    <title>Certificate</title>

    <link rel="stylesheet" href="assets/css/style.css">
</head>

<body>

<div class="container">

<div class="card" style="width:800px;text-align:center;">

<h1>🏆 Certificate of Participation</h1>

<p>This certifies that</p>

<h2><?php echo $s['name']; ?></h2>

<p>has participated in</p>

<h2><?php echo $e['event_name']; ?></h2>

<p>Certificate ID: <?php echo $cert_no; ?></p>

<p>Date: <?php echo date("d-m-Y"); ?></p>

<br>

<img src="https://api.qrserver.com/v1/create-qr-code/?size=120x120&data=<?php echo $cert_no; ?>">

<br><br>

<button class="btn" onclick="window.print()">
Print Certificate
</button>

<br><br>

<a href="download_pdf.php?srn=<?php echo $srn; ?>&event_id=<?php echo $event_id; ?>">
    <button class="btn">Download PDF</button>
</a>

</div>

</div>

</body>
</html>