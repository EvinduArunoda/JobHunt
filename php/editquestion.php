<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
	<meta charset="utf-8">
	<title>editquestion</title>
	<link rel="stylesheet" href="../css/editquestion.css">
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
				<h2>Edit Question</h2>
				</br>
				<h5>Question</h5>
				<input type="text" name="question" placeholder="Question" required="">
				
				<h5>Answer 1</h5>
				<input type="text" name="answer1" placeholder="Answer 1" required="">

				<h5>Answer 2</h5>
				<input type="text" name="answer2" placeholder="Answer 2" required="">
				
				<h5>Answer 3</h5>
				<input type="text" name="answer3" placeholder="Answer 3" required="">
				
				<h5>Answer 4</h5>
				<input type="text" name="answer4" placeholder="Answer 4" required="">
				
				<h5>Correct Answer</h5>
				<select class="main" name="gender" type="email" placeholder="Gender"  >
		        <option>1.</option>
		        <option>2.</option>
		        <option>3.</option>
		        <option>4.</option>
		        </select>
				<!-- <input type="text" name="correct_answer" placeholder="Correct Answer" required=""> -->
				</br>
				<input type="submit" name="signup_seller"value="Submit" >

	
			</form>
		</div>
	</header>
</body>
</html>