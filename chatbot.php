<!DOCTYPE html>
<html>

<head>

<title>NeoCampus AI Assistant</title>

<link rel="stylesheet"
href="assets/css/style.css">

<style>

body{

font-family:Arial, sans-serif;

}

.chat-container{

width:700px;

margin:auto;

margin-top:40px;

}

.chat-box{

height:450px;

overflow-y:auto;

padding:20px;

border-radius:20px;

background:rgba(255,255,255,0.08);

backdrop-filter:blur(10px);

box-shadow:0 8px 20px rgba(0,0,0,0.3);

}

.message{

padding:12px;

margin-top:12px;

border-radius:12px;

max-width:80%;

word-wrap:break-word;

}

.user{

background:#4f46e5;

color:white;

margin-left:auto;

text-align:right;

}

.bot{

background:rgba(255,255,255,0.15);

color:white;

}

.input-area{

display:flex;

gap:10px;

margin-top:20px;

}

input{

flex:1;

padding:14px;

border:none;

border-radius:12px;

font-size:16px;

outline:none;

}

button{

padding:14px 20px;

border:none;

border-radius:12px;

cursor:pointer;

font-size:16px;

background:#4f46e5;

color:white;

transition:0.3s;

}

button:hover{

transform:scale(1.05);

}

h1{

text-align:center;

color:white;

}

</style>

</head>

<body>

<div class="chat-container">

<h1>
🤖 NeoCampus AI Assistant
</h1>

<div class="chat-box" id="chatBox">

<div class="message bot">

👋 Hello! I am NeoCampus AI Assistant.

You can ask me about:

<br><br>

🎉 Events  
🏆 Certificates  
🧾 Attendance  
🔔 Notifications  
📅 Calendar  

</div>

</div>

<div class="input-area">

<input type="text"
id="userInput"
placeholder="Ask something...">

<button onclick="sendMessage()">

Send

</button>

<button onclick="startVoice()">

🎤 Speak

</button>

</div>

</div>

<script>

function sendMessage(){

let input =
document.getElementById('userInput');

let message =
input.value.trim();

if(message === '') return;

let chatBox =
document.getElementById('chatBox');

/* USER MESSAGE */

chatBox.innerHTML += `

<div class="message user">

${message}

</div>

`;

/* BOT RESPONSE */

let response = '';

let msg = message.toLowerCase();

/* EVENTS */

if(
msg.includes('event') ||
msg.includes('hackathon') ||
msg.includes('tech')
){

response =
'🎉 You can view all events from the Events page in NeoCampus.';

}

/* CERTIFICATE */

else if(
msg.includes('certificate')
){

response =
'🏆 Certificates are generated automatically after event participation.';

}

/* ATTENDANCE */

else if(
msg.includes('attendance')
){

response =
'🧾 Attendance can be marked and viewed from the Attendance Dashboard.';

}

/* NOTIFICATION */

else if(
msg.includes('notification')
){

response =
'🔔 Notifications are available in the Notifications section.';

}

/* CALENDAR */

else if(
msg.includes('calendar')
){

response =
'📅 Event Calendar shows all upcoming campus events.';

}

/* ADMIN */

else if(
msg.includes('admin')
){

response =
'👨‍💼 Admin dashboard manages events, attendance, analytics and notifications.';

}

/* DARK MODE */

else if(
msg.includes('dark mode')
){

response =
'🌙 Dark mode can be toggled from the dashboard sidebar.';

}

/* HELP */

else if(
msg.includes('help')
){

response =
'🤖 Try asking about events, certificates, attendance, notifications or calendar.';

}

/* DEFAULT */

else{

response =
'🤖 Sorry, I am still learning. Please try another question.';

}

/* BOT MESSAGE */

setTimeout(()=>{

chatBox.innerHTML += `

<div class="message bot">

${response}

</div>

`;

chatBox.scrollTop =
chatBox.scrollHeight;

},500);

input.value='';

}

/* VOICE ASSISTANT */

function startVoice(){

const recognition =
new webkitSpeechRecognition();

recognition.lang = 'en-US';

recognition.start();

recognition.onresult = function(event){

let speech =
event.results[0][0].transcript;

document.getElementById('userInput').value =
speech;

sendMessage();

};

}

</script>

</body>
</html>