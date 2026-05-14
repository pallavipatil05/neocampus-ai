<?php
include "config.php";

$certificate_no = $_GET['certificate_no'];

$result = $conn->query("
SELECT * FROM Certificate
WHERE certificate_no='$certificate_no'
");

?>

<!DOCTYPE html>
<html>

<head>

<title>Verify Certificate</title>

<link rel="stylesheet" href="assets/css/style.css">

</head>

<body>

<div class="main">

<?php

if($result->num_rows > 0){

$row = $result->fetch_assoc();

?>

<div class="card">

<h1>✅ Certificate Verified</h1>

<br>

<p>
Certificate No:
<b><?php echo $row['certificate_no']; ?></b>
</p>

<p>
SRN:
<b><?php echo $row['srn']; ?></b>
</p>

<p>
Event ID:
<b><?php echo $row['event_id']; ?></b>
</p>

<p>
Issued On:
<b><?php echo $row['issue_date']; ?></b>
</p>

</div>

<?php

}else{

?>

<div class="card">

<h1>❌ Invalid Certificate</h1>

</div>

<?php
}
?>

</div>

</body>
</html>