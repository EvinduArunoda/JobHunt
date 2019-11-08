<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
	<meta charset="utf-8">
	<title>editjob</title>
	<link rel="stylesheet" href="../css/editjob.css">
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
				<h2>Edit Job</h2>
				<h5>Job Title</h5>
				<input type="text" name="title" placeholder="Job Title" required="">
				<h5>Job Description</h5>
				<input type="text" name="description" placeholder="Description" required="">
				<h5>Salary</h5>
				<input type="number" min="0.01" step="0.01" max="99999999" placeholder="Salary in XXXX.XX form" />
				<h5>Vacancy Count</h5>
				<input type="number" name="vacancy_count" placeholder="Vacancy Count" required="">
				<h5>Position Count</h5>
				<input type="number" name="position_count" placeholder="Position Count" required="">
				</br>
				<input type="submit" name="signup_seller"value="Submit" >

	
			</form>
		</div>
	</header>
</body>
</html>