<?php
session_start();
include "config.php";

$srn = $_SESSION['srn'];

$name = $_POST['name'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$department = $_POST['department'];

// IMAGE UPLOAD
$photo = $_FILES['photo']['name'];
$temp = $_FILES['photo']['tmp_name'];

if($photo != ""){
    move_uploaded_file($temp, __DIR__."/uploads/".$photo);

    $sql = "UPDATE Student SET 
            name='$name',
            email='$email',
            phone='$phone',
            department='$department',
            profile_photo='$photo'
            WHERE srn='$srn'";
} else {
    $sql = "UPDATE Student SET 
            name='$name',
            email='$email',
            phone='$phone',
            department='$department'
            WHERE srn='$srn'";
}

$conn->query($sql);

// 🔥 IMPORTANT REDIRECT
header("Location: profile.php");
exit();
?>