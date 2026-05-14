<?php
session_start();

include "config.php";

if(!isset($_SESSION['srn'])){

    header("Location: login.php");
    exit();

}

$srn = $_SESSION['srn'];

$result = $conn->query("
SELECT * FROM Student
WHERE srn='$srn'
");

$row = $result->fetch_assoc();

/* ATTENDED EVENTS */

$attended = $conn->query("
SELECT COUNT(*) as total
FROM Attendance
WHERE srn='$srn'
AND status='Present'
")->fetch_assoc()['total'];

/* REGISTERED EVENTS */

$registered = $conn->query("
SELECT COUNT(*) as total
FROM Registration
WHERE srn='$srn'
")->fetch_assoc()['total'];

$pending = $registered - $attended;
?>

<!DOCTYPE html>
<html>

<head>

<title>My Profile</title>

<link rel="stylesheet"
href="assets/css/style.css">

<link rel="stylesheet"
href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

</head>

<body>

<div class="main">

<h1>
👤 My Profile
</h1>

<div class="container">

<!-- PROFILE CARD -->

<div class="card">

<center>

<?php
if($row['profile_photo']){
?>

<img
src="uploads/<?php echo $row['profile_photo']; ?>"
width="150"
height="150"
style="border-radius:50%;
object-fit:cover;
border:4px solid #c77dff;">

<?php
}else{
?>

<img
src="https://cdn-icons-png.flaticon.com/512/3135/3135715.png"
width="150">

<?php } ?>

</center>

<br>

<h2>
<?php echo $row['name']; ?>
</h2>

<p>
🎓 SRN:
<?php echo $row['srn']; ?>
</p>

<p>
📧 Email:
<?php echo $row['email']; ?>
</p>

<p>
📱 Phone:
<?php echo $row['phone']; ?>
</p>

<p>
🏫 Department:
<?php echo $row['department']; ?>
</p>

</div>

<!-- ATTENDED -->

<div class="card">

<h2>
✅ Events Attended
</h2>

<h1>
<?php echo $attended; ?>
</h1>

</div>

<!-- PENDING -->

<div class="card">

<h2>
⏳ Yet To Attend
</h2>

<h1>
<?php echo $pending; ?>
</h1>

</div>

</div>

<br><br>

<!-- UPDATE PROFILE -->

<div class="card">

<h2>
✏️ Update Profile
</h2>

<br>

<form
action="update_profile.php"
method="POST"
enctype="multipart/form-data">

<input
type="text"
name="name"
value="<?php echo $row['name']; ?>"
placeholder="Name">

<input
type="email"
name="email"
value="<?php echo $row['email']; ?>"
placeholder="Email">

<input
type="text"
name="phone"
value="<?php echo $row['phone']; ?>"
placeholder="Phone">

<input
type="text"
name="department"
value="<?php echo $row['department']; ?>"
placeholder="Department">

<br><br>

<label>
📸 Upload Profile Photo
</label>

<br><br>

<input
type="file"
name="photo">

<br><br>

<button class="btn"
type="submit">

Update Profile

</button>

</form>

</div>

<br>

<a href="dashboard.php">

<button class="btn">

⬅ Back to Dashboard

</button>

</a>

</div>

</body>
</html>