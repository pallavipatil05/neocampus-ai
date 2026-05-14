<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';

include "config.php";

$srn = $_GET['srn'];

/* FETCH STUDENT */

$result = $conn->query("
SELECT * FROM Student
WHERE srn='$srn'
");

$row = $result->fetch_assoc();

$email = $row['email'];
$name = $row['name'];

/* MAILER */

$mail = new PHPMailer(true);

try{
$mail->isSMTP();

$mail->Host = 'smtp.gmail.com';

$mail->SMTPAuth = true;

$mail->Username = 'pallavipatil25005@gmail.com';

$mail->Password = 'htfxrkagdaipqhuc';

$mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;

$mail->Port = 587;

$mail->setFrom(
    'pallavipatil25005@gmail.com',
    'NeoCampus'
);
   
    $mail->addAddress($email);

    $mail->isHTML(true);

    $mail->Subject = 'NeoCampus Certificate';

    $mail->Body = "

    <h1>Congratulations 🎉</h1>

    <p>Hello $name,</p>

    <p>
    Your participation certificate
    has been successfully generated.
    </p>

    <p>
    Thank you for participating in the event.
    </p>

    <br>

    <h3>NeoCampus Team</h3>

    ";

   if($mail->send()){

    echo "Email Sent Successfully";

}else{

    echo "Mailer Error: " . $mail->ErrorInfo;

}

}catch(Exception $e){

    echo 'Mailer Error: ' . $mail->ErrorInfo;
}

?>