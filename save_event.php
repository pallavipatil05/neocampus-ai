<?php

include "config.php";

/* GET FORM DATA */

$name = $_POST['name'];
$date = $_POST['date'];
$time = $_POST['time'];
$venue = $_POST['venue'];
$description = $_POST['description'];
$capacity = $_POST['capacity'];
$last_date = $_POST['last_date'];

/* IMAGE */

$image = $_FILES['image']['name'];

$tmp = $_FILES['image']['tmp_name'];

/* MOVE IMAGE */

move_uploaded_file(
$tmp,
"uploads/".$image
);

/* INSERT QUERY */

$sql = "

INSERT INTO Event(

event_name,
event_date,
event_time,
venue,
description,
capacity,
last_date,
image

)

VALUES(

'$name',
'$date',
'$time',
'$venue',
'$description',
'$capacity',
'$last_date',
'$image'

)

";

/* EXECUTE */

if($conn->query($sql)==TRUE){

echo "

<script>

alert('Event Added Successfully');

window.location='events.php';

</script>

";

}else{

echo "Database Error: " . $conn->error;

}

?>