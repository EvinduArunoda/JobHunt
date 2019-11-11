<?php
require_once('initialize.php');
if
(isset($_SESSION['set'])){}
else{
	header("Location:JSlogin.php");
}?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
	 <meta charset="utf-8"> 
	<title>HR home page</title>
	
	<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
<link rel="stylesheet" type="text/css" href="../css/js_home.css">
</head>
<body>
	<div class="wrapper">

		<header>
			<div class="title">
				<br>
				<br>
				<h1 style="font-family: sans serif;font-size: 80px;font-color:floral white">JOB HUNT</h1>
				</div>
		<br>
		<br>
		<br>
		<br>
        <div class="input-group" style="width:30%;height:50%;margin-left:50%">
        <input type="text" class="form-control" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2"style="width:10%;height: 10%" name="search">
        <div class="input-group-append" style="width:20%">
          <button class="btn btn-primary" type="submit" style="background-color:#2C3E50;color:floralwhite;height:10%;width:40%">
            <i class="fa fa-search"></i>
          </button>
        </div>
            </div>
		<div class="box clearfix">
		<div class="rest">
			<div class="data clearfix">

					<div class="additem clearfix">
					<a href="addjob.php"><img src='../img/message.png' style="width: 50%;height:50%">
					<br>
					<br>Messages</a>
					</div>

					<div class="additem clearfix">
					<a href="addjob.php"><img src='../img/profile.png' style="width: 80%;height:5=80%">
					<br>
					<br>View Profile</a>
					</div>

					<div class="additem clearfix">
					<a href="addjob.php"><img src='../img/application.png' style="width: 50%;height:50%">
					<br>
					<br>View 
					<br>Applications History</a>
					</div>
                
                    <div class="additem clearfix">
					<a href="addjob.php"><img src='../img/notification.png' style="width: 50%;height:5=50%">
					<br>
					<br>View 
					<br>Notifications</a>
					</div>
                    <div class="additem clearfix">
					<a href="addjob.php"><img src='../img/editprofile.png' style="width: 60%;height:60%">
					<br>
					<br>Edit Profile</a>
					</div>

					<center>	
					<div class="logout"><a href="logout.php"><img src='../img/logout-icon.png'><br><br>Logout</a></div>
				</center>

				</div>
			</div>
		</div>
	
	</header>
	
</body>
</html>