```php
<?php
session_start();
include "config.php";

if(!isset($_SESSION['srn'])){
    header("Location: login.php");
    exit();
}

if(!isset($_GET['id'])){
    die("Invalid Event");
}

$event_id = $_GET['id'];

$event = $conn->query("
SELECT * FROM Event
WHERE event_id='$event_id'
")->fetch_assoc();

if(isset($_POST['register'])){

    $srn = $_POST['leader_srn'];

    $team_name = $_POST['team_name'];
    $leader_name = $_POST['leader_name'];

    $member2 = $_POST['member2'];
    $member2_srn = $_POST['member2_srn'];

    $member3 = $_POST['member3'];
    $member3_srn = $_POST['member3_srn'];

    $member4 = $_POST['member4'];
    $member4_srn = $_POST['member4_srn'];

   $sql = " INSERT INTO Registration(
    event_id, 
    srn,
    team_name,
    member2,
    member3,
    member4,

    member2_srn,
    member3_srn,
    member4_srn,
 leader_name
    ) 
    VALUES
    ( 
    '$event_id',
    '$srn',
    '$team_name',
    '$member2',
    '$member3', 
    '$member4', 

    '$member2_srn',
    '$member3_srn', 
   '$member4_srn', 

   '$leader_name' 
   ) 
   ";

    if($conn->query($sql)){

        echo "

        <script>

        alert('Team Registered Successfully');

        window.location='student_events.php';

        </script>

        ";

    }else{

        echo $conn->error;
    }
}
?>
```


<!DOCTYPE html>
<html>

<head>

<title>Register Event</title>

<link rel="stylesheet"
href="assets/css/style.css">

<meta name="viewport"
content="width=device-width, initial-scale=1.0">

</head>

<body>

<div class="main">

<div class="hero">

<h1 class="hero-title">

🚀 Register Team

</h1>

<p class="hero-subtitle">

<?php echo $event['event_name']; ?>

</p>

</div>

<div class="card">

<form method="POST">

<label>Team Name</label>

<input
type="text"
name="team_name"
placeholder="Enter Team Name"
required
>

<label>Team Leader Name</label>

<input
type="text"
name="leader_name"
placeholder="Enter Team Leader Name"
required
>

<label>Team Leader SRN</label>

<input
 type="text"
 name="leader_srn" 
 placeholder="Enter Team Leader SRN" 
 required 
 >

<label>Member 2 Name</label>

<input
type="text"
name="member2"
placeholder="Enter Member 2 Name"
>

<label>Member 2 SRN</label>

<input
type="text"
name="member2_srn"
placeholder="Enter Member 2 SRN"
>

<label>Member 3 Name</label>

<input
type="text"
name="member3"
placeholder="Enter Member 3 Name"
>

<label>Member 3 SRN</label>

<input
type="text"
name="member3_srn"
placeholder="Enter Member 3 SRN"
>

<label>Member 4 Name</label>

<input
type="text"
name="member4"
placeholder="Enter Member 4 Name"
>

<label>Member 4 SRN</label>

<input
type="text"
name="member4_srn"
placeholder="Enter Member 4 SRN"
>
<br><br>

<button
type="submit"
name="register"
class="btn"
>

🎉 Register Team

</button>

</button>

</form>

</div>

</div>

</body>
</html>