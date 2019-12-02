<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
<style>


body {
  font-family: "Lato", sans-serif;
}

/* Side bar*/
.sidebar {
  height: 100%;
  width: 0;
  position: fixed;
  z-index: 1;
  top: 0;
  left: 0;
  background-color: #111;
  overflow-x: hidden;
  transition: 0.5s;
  padding-top: 60px;
}

.sidebar a {
  padding: 8px 8px 8px 32px;
  text-decoration: none;
  font-size: 25px;
  color: #818181;
  display: block;
  transition: 0.3s;
}

.sidebar a:hover {
  color: #f1f1f1;
}

.sidebar .closebtn {
  position: absolute;
  top: 0;
  right: 25px;
  font-size: 36px;
  margin-left: 50px;
}

.openbtn {
  font-size: 17px;
  cursor: pointer;
  background-color: #4CAF50;
  color: white;
  padding: 10px 15px;
  border: none;
}

.openbtn:hover {
  background-color: #444;
}

#main {
  transition: margin-left .5s;
  padding: 16px;
}

/* Navigation bar*/
.topnav {
  position: relative;
  overflow: hidden;
  background-color: #444;
}

.topnav a {
  color: #f2f2f2;
  text-align: center;
  padding: 14px 16px;
  text-decoration: none;
  font-size: 17px;
}

.topnav a:hover {
  background-color: #ddd;
  color: black;
}

.topnav-centered a {
  float: none;
  position: absolute;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
}

.topnav-right {
  float: right;
}

.topnav-right a {
  top: 40%;
}


/* Responsive navigation menu (for mobile devices) */
@media screen and (max-width: 600px) {
  .topnav a, .topnav-right {
    float: none;
    display: block;
  }
  
  .topnav-centered a {
    position: relative;
    top: 0;
    left: 0;
    transform: none;
  }
}

@media screen and (max-height: 450px) {
  .sidebar {padding-top: 15px;}
  .sidebar a {font-size: 18px;}
}

</style>
</head>
<body>

<div id="mySidebar" class="sidebar">
  <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">×</a>
  <a href="#">Inbox</a>
  <a href="#">Send</a>
  <a href="#">Spam</a>
  <a href="#">Archive</a>
</div>
<div class="main" id="main">
    <div class="topnav">
         <!-- Left-aligned links (default) -->
        <button class="openbtn" onclick="openNav()">☰ Menu</button>
        <a href="">Compose</a>
        <a><i style="font-size:17px" class="fa">&#xf021;</i></a>
        <!-- Centered link -->
        <!-- <div class="topnav-centered">
            <a href="#home" class="active">Home</a>
        </div> -->
    </div>
    <div class="maincontent">
        <form id="mainform" action="send.php" method="post">
            <div class="input-group">
            <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
            <input id="email" name="email" type="email" class="form-control" name="email" placeholder="Email">
            </div>
            <div class="input-group">
            <span class="input-group-addon"><i class="glyphicon glyphicon-plus"></i></span>
            <input id="cc" type="text" name="cc" class="form-control" name="CC" placeholder="CC">
            </div>
            <br>
            <div class="input-group">
            <span class="input-group-addon">Subject</span>
            <input id="subject" type="text" name="subject" class="form-control" name="subject" placeholder="Subject">
            </div>
            <div class="form-group">
            <textarea class="form-control" rows="15" id="content"></textarea>
            </div>
            <button type="button" name="sendEmail" class="btn btn-primary">Send</button>
        </form>
    </div>
</div>
<?php
mysqli_connect("192.168.0.11:8080","devtest","devtest","email");
if(isset($_POST["sendEmail"]))
{
	$email=$_REQUEST["email"];
	$cc=$_REQUEST["cc"];
	$subject = $_REQUEST["subject"];
	$query="insert into send (email,cc,subject) values ('$email','$cc', '$subject')";
	$row=mysqli_query($query);
	if($row==true)
	{
		header('location:mail.php');
	}
}
?>
<script>
function openNav() {
  document.getElementById("mySidebar").style.width = "250px";
  document.getElementById("main").style.marginLeft = "250px";
}

function closeNav() {
  document.getElementById("mySidebar").style.width = "0";
  document.getElementById("main").style.marginLeft= "0";
}

</script>

</body>
</html> 
