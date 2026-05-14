<?php
require_once 'dompdf/vendor/autoload.php';
use Dompdf\Dompdf;

include "config.php";

$srn = $_GET['srn'];
$event_id = $_GET['event_id'];

// Fetch student
$student = $conn->query("SELECT * FROM Student WHERE srn='$srn'");
$s = $student->fetch_assoc();

// Fetch event
$event = $conn->query("SELECT * FROM Event WHERE event_id='$event_id'");
$e = $event->fetch_assoc();

// Generate certificate number
$cert_no = "CERT".rand(1000,9999);

$dompdf = new Dompdf();

$html = "
<h1 style='text-align:center;'>Certificate of Participation</h1>
<p>This is to certify that <b>{$s['name']}</b></p>
<p>has participated in</p>
<h2>{$e['event_name']}</h2>
<p>Certificate ID: {$cert_no}</p>
<p>Date: ".date("d-m-Y")."</p>
";

$dompdf->loadHtml($html);
$dompdf->setPaper('A4', 'landscape');
$dompdf->render();
$dompdf->stream("certificate.pdf");
?>