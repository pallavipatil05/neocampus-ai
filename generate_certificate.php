<?php
session_start();
include "config.php";

if(
!isset($_GET['srn']) ||
!isset($_GET['event_id'])
){
    die("Invalid Request");
}

$srn = $_GET['srn'];
$event_id = $_GET['event_id'];

/* FETCH STUDENT */

$student = $conn->query("
SELECT * FROM Student
WHERE srn='$srn'
");

$s = $student->fetch_assoc();

/* FETCH EVENT */

$event = $conn->query("
SELECT * FROM Event
WHERE event_id='$event_id'
");

$e = $event->fetch_assoc();

/* FETCH POSITION */

$registration = $conn->query("
SELECT * FROM Registration
WHERE srn='$srn'
AND event_id='$event_id'
");

$r = $registration->fetch_assoc();

/* POSITION */

$position =
$r['position'] ?? 'Participant';

/* CERTIFICATE TYPE */

if(
$position == 'Winner 1' ||
$position == 'Winner 2' ||
$position == 'Winner 3'
){

    $title =
    "🏆 Certificate of Achievement";

    $message =
    "For Winning";

}else{

    $title =
    "🎓 Certificate of Participation";

    $message =
    "For Participating In";
}

/* CERTIFICATE NUMBER */

$cert_no =
"CERT".rand(1000,9999);

/* SAVE CERTIFICATE */

$conn->query("
INSERT INTO Certificate
(
srn,
event_id,
position,
certificate_no,
issue_date
)

VALUES

(
'$srn',
'$event_id',
'$position',
'$cert_no',
CURDATE()
)
");

?>

<!DOCTYPE html>
<html>

<head>

<title>Certificate</title>

<link rel="stylesheet"
href="assets/css/style.css">

<style>

.certificate{

width:900px;

margin:auto;

margin-top:40px;

padding:50px;

border-radius:25px;

background:
rgba(255,255,255,0.1);

backdrop-filter:blur(15px);

color:white;

text-align:center;

box-shadow:
0 8px 32px rgba(0,0,0,0.4);

border:
2px solid rgba(255,255,255,0.1);

}

.certificate h1{

font-size:50px;

margin-bottom:20px;

color:#c77dff;

}

.certificate h2{

font-size:40px;

color:#00f2fe;

margin-top:15px;

}

.certificate p{

font-size:22px;

line-height:1.8;

}

.qr{

margin-top:25px;

}

</style>

</head>

<body>

<div class="main">

<div class="certificate">

<h1>
<?php echo $title; ?>
</h1>

<br>

<p>
This certifies that
</p>

<h2>
<?php echo $s['name']; ?>
</h2>

<br>

<p>
has successfully
<b>
<?php echo $message; ?>
</b>
</p>

<h2>
<?php echo $e['event_name']; ?>
</h2>

<br>

<p>

Position:
<b>
<?php echo $position; ?>
</b>

</p>

<p>

Certificate ID:
<b>
<?php echo $cert_no; ?>
</b>

</p>

<p>

Date:
<?php echo date("d-m-Y"); ?>

</p>

<!-- QR -->

<div class="qr">

<img

src="https://api.qrserver.com/v1/create-qr-code/?size=170x170&data=http://localhost/neocampus/verify_certificate.php?certificate_no=<?php echo $cert_no; ?>"

>

</div>

<br>

<button
class="btn"
onclick="window.print()"
>

🖨 Print Certificate

</button>

<br><br>

<a href="download_pdf.php?srn=<?php echo $srn; ?>&event_id=<?php echo $event_id; ?>">

<button class="btn">

📄 Download PDF

</button>

</a>

</div>

</div>

</body>
</html>