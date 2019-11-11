<?php 
require_once('initialize.php');
if
(isset($_SESSION['set'])){}
else{
	header("Location:hrlogin.php");
}?>

 <!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
	<!-- <meta charset="utf-8"> -->
	<title>HR home page</title>
	
	<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
<link rel="stylesheet" type="text/css" href="../css/hr_home.css">
</head>
<body>
	<div class="wrapper">

		<header>
			<div class="title">
				<br>
				<br>
				<h1>Home</h1>
				</div>
		<br>
		<br>
		<br>
		<br>
		<div class="box clearfix">
		<div class="rest">
			<div class="data clearfix">
				
					
					<div class="additem clearfix">
					<a href="addjob.php"><img src='../img/addjob.png'>
					<br>
					<br>Add New Job</a>
					</div>

					<div class="additem clearfix">
					<a href="addquestion.php"><img src='../img/naq.png'>
					<br>
					<br>Add New Question</a>
					</div>

					<div class="additem clearfix">
					<a href="addexam.php"><img src='../img/exam7.jpg'>
					<br>
					<br>Add New Exam</a>
					</div>

					<div class="additem clearfix">
					<a href="Alljobs.php"><img src='../img/job3.png'>
					<br>
					<br>View Job</a>
					</div>

					<div class="additem clearfix">
					<a href="questionbankview.php"><img src='../img/qna.png'>
					<br>
					<br>View Questions</a>
					</div>

					<div class="additem1 clearfix">
					<a href="candidate_by_job.php"><img src='../img/candidate.png'>
					<br>
					<br>Manage
					<br>Candidates</a>
					</div>

					<div class="additem clearfix">
					<a href="addjob.php"><img src='../img/message.png'>
					<br>
					<br>Messages</a>
					</div>

					<div class="additem clearfix">
					<a href="addjob.php"><img src='../img/notification.png'>
					<br>
					<br>Notification</a>
					</div>

						
					<div class="logout"><a href="logout.php"><img src='../img/logout-icon.png'><br><br>Logout</a></div>
				

				</div>
			</div>
		</div>
	
	</header>
	
</body>
</html>