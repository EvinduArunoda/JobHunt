<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
	<meta charset="utf-8">
	<title>signup</title>
	<link rel="stylesheet" href="../css/signup.css">
	<link rel="stylesheet" href="css/signup.css">
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
				<h2>SIGN UP</h2>
				<br>
				<h5>First Name</h5>
				<input type="text" name="first_name" placeholder="First Name" required="">
				<h5>Last Name</h5>
				<input type="text" name="last_name" placeholder="Last Name" required="">
				<h5>Date of Birth</h5>
				<input type="date" name="date_of_birth" placeholder="Date of Birth" required="">
				<h5>NIC</h5>
				<input type="number" name="nic" placeholder="NIC" min ="0" required="">
				<h5>Email Address</h5>
				<input type="email" name="SellerEmail" placeholder="Email Address" required="">
				<h5>Gender</h5>
      			<!-- <label for="">Gender</label> -->
     			<select class="main" name="gender" type="email" placeholder="Gender"  >
		        <option>Female</option>
		        <option>Male</option>
		        <option>Other</option>
		        </select>
			<!-- <input type="radio" name="gender" value="male"> Male<br>
				<input type="radio" name="gender" value="female"> Female<br>
				<input type="radio" name="gender" value="other"> Other -->
				<h5>Address</h5>
				<input type="text" name="address" placeholder="Address" required="">
				<h5>Contact Number</h5>
				<input type="tel" name="phone" placeholder="Contact Number" pattern="[0-9]{10}" required ="">
				<h5>Password</h5>
				<h6 class="pwd-rules">"Your password must contain at least 8 alphabetical[both (a-z)&(A-Z)] and numerical characters "</h6>
				<input type="password" name="password" placeholder="Password" id="" required="">
				<h5>Confirm Password</h5>
				<input type="password" name="confirmedPassword" placeholder="Confirm Password" required="">
				</br>
				<input type="submit" name="signup_seller"value="Sign up" >

				<P>Already have an account ? <a href="login.php"> Log In Here</a></P>
			</form>
		</div>
	</header>
</body>
</html>