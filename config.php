<?php
$conn = new mysqli("localhost","root","","CollegeEventDB");

if($conn->connect_error){
    die("Connection failed: " . $conn->connect_error);
}
?>