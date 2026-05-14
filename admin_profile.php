<?php
session_start();
include "config.php";

if(!isset($_SESSION['srn'])){
    header("Location: login.php");
    exit();
}

$srn = $_SESSION['srn'];

/* UPDATE PROFILE */

if(isset($_POST['update'])){

    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];

    if(!empty($_FILES['photo']['name'])){

        $photo =
        time().'_'.
        $_FILES['photo']['name'];

        move_uploaded_file(
            $_FILES['photo']['tmp_name'],
            "uploads/".$photo
        );

        $conn->query("
        UPDATE Student
        SET profile_photo='$photo'
        WHERE srn='$srn'
        ");
    }

    $conn->query("
    UPDATE Student
    SET
    name='$name',
    email='$email',
    phone='$phone'
    WHERE srn='$srn'
    ");

    echo "
    <script>
    alert('Profile Updated');
    window.location='admin_profile.php';
    </script>
    ";
}

/* FETCH ADMIN */

$result = $conn->query("
SELECT * FROM Student
WHERE srn='$srn'
");

$row = $result->fetch_assoc();

/* ANALYTICS */

$totalEvents =
$conn->query("
SELECT COUNT(*) as total
FROM Event
")->fetch_assoc()['total'];

$totalStudents =
$conn->query("
SELECT COUNT(*) as total
FROM Student
")->fetch_assoc()['total'];

$totalRegistrations =
$conn->query("
SELECT COUNT(*) as total
FROM Registration
")->fetch_assoc()['total'];

?>

<!DOCTYPE html>
<html>

<head>

<title>Admin Profile</title>

<link rel="stylesheet"
href="assets/css/style.css">

</head>

<body>

<div class="main">

<div class="hero">

<h1 class="hero-title">
👨‍💼 Admin Profile
</h1>

<p class="hero-subtitle">
NeoCampus Administration Panel
</p>

</div>

<div class="container">

<!-- PROFILE CARD -->

<div class="card">

<center>

<?php
if(!empty($row['profile_photo'])){
?>

<img
src="uploads/<?php echo $row['profile_photo']; ?>"
width="140"
height="140"
style="
border-radius:50%;
object-fit:cover;
border:4px solid #c77dff;
box-shadow:0 0 25px rgba(199,125,255,0.8);
"
>

<?php
}else{
?>

<img
src="https://cdn-icons-png.flaticon.com/512/3135/3135715.png"
width="140">

<?php
}
?>

</center>

<br>

<form
method="POST"
enctype="multipart/form-data"
>

<label>Name</label>

<input
type="text"
name="name"
value="<?php echo $row['name']; ?>"
required
>

<label>Email</label>

<input
type="email"
name="email"
value="<?php echo $row['email']; ?>"
required
>

<label>Phone</label>

<input
type="text"
name="phone"
value="<?php echo $row['phone']; ?>"
required
>

<label>Upload Profile Photo</label>

<input
type="file"
name="photo"
>

<br><br>

<button
class="btn"
name="update"
>

✨ Update Profile

</button>

</form>

</div>

<!-- ADMIN ANALYTICS -->

<div class="card">

<h2>📊 Admin Analytics</h2>

<br>

<h1>
🎉 <?php echo $totalEvents; ?>
</h1>

<p>Total Events</p>

<br>

<h1>
👨‍🎓 <?php echo $totalStudents; ?>
</h1>

<p>Total Students</p>

<br>

<h1>
📝 <?php echo $totalRegistrations; ?>
</h1>

<p>Total Registrations</p>

</div>

</div>

</div>

</body>
</html>