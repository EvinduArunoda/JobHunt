<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
	<meta charset="utf-8">
	<title>addexam</title>
	<link rel="stylesheet" href="../css/addexam.css">
	<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</head>
<body>
	<header>
		<div class="main">
			<form class="box" action="success.php" method="post">
				<h2>Add an Exam</h2>
				</br>
				<h5>Job</h5>
				<input type="text" name="job" placeholder="Job Title" required="">
				
				<h5>Time duration</h5>
				<input type="number" name="hrs" placeholder="Hours" min ="0" max="23" required="">
				<input type="number" name="min" placeholder="Minutes" min ="0" max="59" required="">
				
				<h5>Exam Date</h5>
				<input type="date" name="exam_date" placeholder="Exam date" required="">
				
				</br>
				<input type="submit" name="signup_seller"value="Submit" >

	
			</form>
		</div>
	</header>
</body>
</html>