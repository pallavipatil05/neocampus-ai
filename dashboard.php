<?php
session_start();

if(!isset($_SESSION['srn'])){
    header("Location: login.php");
    exit();
}
?>
<!DOCTYPE html>
<html>

<head>

<title>NeoCampus AI Dashboard</title>

<link rel="stylesheet"
href="assets/css/style.css">

<link rel="stylesheet"
href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

<meta name="viewport"
content="width=device-width, initial-scale=1.0">

</head>

<body>

<!-- PARTICLES -->

<div class="particles"></div>

<!-- CURSOR GLOW -->

<div class="cursor-glow"></div>

<!-- LOADER -->

<div id="loader">

<div class="spinner"></div>

<h1>NeoCampus AI</h1>

</div>

<!-- SIDEBAR -->

<div class="sidebar">

<h2>🎓 NeoCampus</h2>

<a href="dashboard.php">
<i class="fa-solid fa-house"></i>
Dashboard
</a>

<a href="profile.php">
👤 My Profile
</a>


<a href="student_events.php">
<i class="fa-solid fa-calendar-days"></i>
Events
</a>


<a href="activity.php">
<i class="fa-solid fa-clock-rotate-left"></i>
Activity Timeline
</a>


<a href="notifications.php">
<i class="fa-solid fa-bell"></i>
Notifications
</a>

<a href="student_analytics.php">
<i class="fa-solid fa-chart-line"></i>
Analytics
</a>

<a href="calendar.php">
<i class="fa-solid fa-calendar"></i>
Calendar
</a>

<a href="mark_attendance.php">
<i class="fa-solid fa-user-check"></i>
Mark Attendance
</a>

<a href="chatbot.php">
<i class="fa-solid fa-robot"></i>
AI Assistant
</a>

<a href="recommendations.php">
<i class="fa-solid fa-wand-magic-sparkles"></i>
AI Recommendations
</a>

<a href="logout.php">
<i class="fa-solid fa-right-from-bracket"></i>
Logout
</a>

</div>

<!-- MAIN -->

<div class="main">

<!-- HERO -->

<div class="hero">

<h1 class="hero-title" id="typing"></h1>

<p class="hero-subtitle">

Smart Campus Event Management Platform
with AI Automation, Certificates,
Analytics, Attendance & Notifications
</p>

<div class="live-clock" id="clock"></div>
<br>

<a href="events.php">

<button class="btn">

🚀 Explore Events

</button>

</a>

</div>

<!-- WELCOME -->

<h1>

Welcome,
<?php echo $_SESSION['srn']; ?> 👋

</h1>

<!-- DASHBOARD CARDS -->

<div class="container">

<?php include "reminder.php"; ?>

<!-- EVENTS -->

<div class="card">

<h2>🎉 Total Events</h2>

<h1 class="counter" data-target="25">
0
</h1>

<p>

Explore campus hackathons,
seminars and workshops.

</p>

<br>

<a href="events.php">

<button class="btn">

Open Events

</button>

</a>

</div>

<!-- CERTIFICATES -->

<div class="card">

<h2>🏆 Certificates</h2>

<h1 class="counter" data-target="150">
0
</h1>

<p>

Generate QR-based participation
certificates instantly.

</p>

<br>

<a href="events.php">

<button class="btn">

Generate

</button>

</a>

</div>

<!-- ANALYTICS -->

<div class="card">

<h2>📊 Analytics</h2>

<h1 class="counter" data-target="320">
0
</h1>

<p>

Track registrations
and student activity.

</p>

<br>

<a href="analytics.php">

<button class="btn">

View Analytics

</button>

</a>

</div>

<!-- NOTIFICATIONS -->

<div class="card">

<h2>🔔 Notifications</h2>

<h1 class="counter" data-target="12">
0
</h1>

<p>

Latest campus alerts
and announcements.

</p>

<br>

<a href="notifications.php">

<button class="btn">

Open Notifications

</button>

</a>

</div>

<!-- ATTENDANCE -->

<div class="card">

<h2>🧾 Attendance</h2>

<h1 class="counter" data-target="98">
0
</h1>

<p>

Manage and monitor
student attendance.

</p>

<br>

<a href="attendance_dashboard.php">

<button class="btn">

View Attendance

</button>

</a>

</div>

<!-- AI ASSISTANT -->

<div class="card">

<h2>🤖 AI Assistant</h2>

<h1 class="counter" data-target="24">
0
</h1>

<p>

Talk with NeoCampus AI
using text and voice.

</p>

<br>

<a href="chatbot.php">

<button class="btn">

Open Assistant

</button>

</a>

</div>

</div>

<br><br>

<!-- FEATURES -->

<div class="hero">

<h1 class="hero-title">

✨ Platform Features

</h1>

<div class="container">

<div class="card">

<h2>🎟 Smart Event Management</h2>

<p>

Create, manage and track
events with ease.

</p>

</div>

<div class="card">

<h2>📧 Email Certificates</h2>

<p>

Automatically send certificates
to students through email.

</p>

</div>

<div class="card">

<h2>🤖 AI Recommendations</h2>

<p>

Get intelligent event suggestions
based on student interests.

</p>

</div>

</div>

</div>

</div>

<!-- TYPING EFFECT -->

<script>

const text =
"🚀 NeoCampus AI Platform";

let i = 0;

function typing(){

if(i < text.length){

document.getElementById("typing").innerHTML
+= text.charAt(i);

i++;

setTimeout(typing,80);

}

}

typing();

</script>

<!-- COUNTER -->

<script>

const counters =
document.querySelectorAll('.counter');

counters.forEach(counter=>{

counter.innerText='0';

const updateCounter=()=>{

const target =
+counter.getAttribute('data-target');

const c =
+counter.innerText;

const increment =
target / 100;

if(c < target){

counter.innerText =
`${Math.ceil(c + increment)}`;

setTimeout(updateCounter,20);

}else{

counter.innerText = target;

}

};

updateCounter();

});

</script>

<!-- CURSOR GLOW -->

<script>

const glow =
document.querySelector(".cursor-glow");

document.addEventListener(
"mousemove",
(e)=>{

glow.style.left =
e.clientX + "px";

glow.style.top =
e.clientY + "px";

}
);

</script>

<!-- LOADER -->

<script>

window.addEventListener("load",()=>{

document.getElementById("loader")
.style.display="none";

});

</script>

<!-- PARTICLES -->

<script>

const particles =
document.querySelector('.particles');

for(let i=0;i<40;i++){

let span =
document.createElement('span');

let size =
Math.random()*12;

span.style.width =
10 + size + 'px';

span.style.height =
10 + size + 'px';

span.style.left =
Math.random()*100 + '%';

span.style.animationDuration =
5 + Math.random()*10 + 's';

span.style.animationDelay =
Math.random()*5 + 's';

particles.appendChild(span);

}

</script>
<script>

function updateClock(){

const now = new Date();

const time =
now.toLocaleTimeString();

document.getElementById("clock")
.innerHTML = "🕒 " + time;

}

setInterval(updateClock,1000);

updateClock();

</script>

<?php

$popup = $conn->query("

SELECT * FROM notifications

WHERE is_read = 0

ORDER BY id DESC

LIMIT 1

");

if($popup->num_rows > 0){

$data = $popup->fetch_assoc();

?>

<script>

alert("🔔 New Notification:\n\n<?php echo $data['message']; ?>");

</script>

<?php
}
?>


</body>
</html>