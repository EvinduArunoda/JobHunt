<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
	<meta charset="utf-8">
	<title>signup</title>
	<link rel="stylesheet" href="../css/signup.css">
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
			<form class="box" action="manager.php" method="post">
				<h2>SIGN UP</h2>
				<input type="text" name="first_name" placeholder="First Name" required="">
				<input type="text" name="last_name" placeholder="Last Name" required="">

				<input type="date" name="date_of_birth" placeholder="Date of Birth" required="">

				<input type="number" name="nic" placeholder="NIC" min ="0" required="">

				<input type="email" name="Email" placeholder="Email Address" required="">
				
      			<!-- <label for="">Gender</label> -->
     			<select class="main" name="gender" type="email" placeholder="Gender"  >
		        <option>Female</option>
		        <option>Male</option>
		        <option>Other</option>
		        </select>
			<!-- <input type="radio" name="gender" value="male"> Male<br>
				<input type="radio" name="gender" value="female"> Female<br>
				<input type="radio" name="gender" value="other"> Other -->

				<input type="text" name="address" placeholder="Address" required="">

				<input type="tel" name="phone" placeholder="Contact Number" pattern="[0-9]{10}" required ="">

				<h6 class="pwd-rules">"Your password must contain at least 8 alphabetical[both (a-z)&(A-Z)] and numerical characters "</h6>
				<input type="password" name="password" placeholder="Password" id="" required="">
				<input type="password" name="reconfirmedPassword" placeholder="Re-Confirm Password" required="">
				</br>
				<input type="submit" name="signup_JS"value="Sign up" >

				<P>Already have an account ? <a href="JSlogin.php"> Log In Here</a></P>
			</form>
		</div>
	</header>
</body>
</html>