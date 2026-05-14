<?php
session_start();
include "config.php";

$srn = $_POST['srn'];
$password = $_POST['password'];

$sql = "SELECT * FROM Student WHERE srn='$srn' AND password='$password'";
$result = $conn->query($sql);

if($result->num_rows > 0){
    $_SESSION['srn'] = $srn;   // 🔥 IMPORTANT LINE
    header("Location: dashboard.php");
} else {
    echo "Invalid Login";
}
?>