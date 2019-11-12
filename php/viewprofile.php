<?php require_once('initialize.php') ;
$db = Database::getInstance();
$connection = $db->getConnection();
$id = '1';
$q = mysqli_query($connection,"SELECT * FROM jobseeker WHERE JobseekerID = '$id'");
$query = $q->fetch_assoc();
?>


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
<link rel="stylesheet" type="text/css" href="../css/profile.css">
</head>
<body>

		<header>
			<div style="background-image:linear-gradient(rgba(0,0,0,0.3),rgba(0,0,0,0.3)), url(../img/office_31.jpeg)">
			<div class="title">
				<br>
				<br>
				<h1 style="font-family: sans serif;font-size: 60px;font-color:floral white;margin-left:10%">HI THERE <?php echo $query['FirstName']?>! </h1>
                      </div>



	      <div class="box clearfix" style="margin-top:-1%;margin-left:68%">
		<div class="rest">
			<div class="data clearfix">

					<div class="additem clearfix">
					<a href="sJSAcc.php"><img src="../img/home.png" style="width: 50%;height:50%">
					<br>
					<br>Home Page</a>
					</div>
					<div class="additem clearfix">
					<div class="logout"><a href="logout.php"><img src='../img/logout-icon.png'><br>Logout</a></div>
					</div>
            </div>
            </div>
					</div>
				</div>

	<div style="background-image:linear-gradient(rgba(0,0,0,0.2),rgba(0,0,0,0.2)), url(../img/office_22.jpeg)">
				<form name="my-form"  method="POST" action='updatedetails.php?>' enctype="multipart/form-data">

	 <div class="row" style="margin-top: 2%" >
		 <div style="margin-left: 70%;margin-top:5%">
			<button type="button" id='edit' class="btn btn-lg btn-primary csswitch" onclick="do_change();" value='' name='Edit' style="display: block;background-color:floralwhite;color:black;width:100px">
			Edit
			</button>
			<button type="submit" class="btn btn-lg btn-primary" value='' name='Update' id='Update'  style="display: none;margin-top: 3px !important;background-color:floralwhite;color:black;width:100px">
			Update
			</button>


</div>
	 <div class="col-xl-5 col-lg-5" style="margin-top:10%">
						 <div class="card shadow mb-4" style="margin-top:-23%;width:700px;margin-left:10%">
							 <!-- Card Body -->
							 <div class="card-body">
											 <div align="center">
													 <img id='img' class="thumbnail img-responsive" src='<?php echo $query['img_src'] ?>' width="300px" height="300px">

													 <input class="form-control pws" type="file"  id='fileToUpload' name='fileToUpload'  accept="image/x-png,image/jpeg" style="width:40% ; display:none" >
											 </div>
									 <hr>
															 <div class="form-group row">
											 <label for="phone_number" class="col-md-4 col-form-label text-md-right">First Name</label>
											 <div class="col-md-4">
													 <input type="text" value="<?php echo $query['FirstName']?>" name="fname" id="fname" class="form-control cswitch" readonly>
											 </div>
									 </div>

									 <hr>
									 <div class="form-group row">
											 <label for="phone_number" class="col-md-4 col-form-label text-md-right">Last Name</label>
											 <div class="col-md-4">
													 <input type="text" value="<?php echo $query['LastName']?>" name="fname" id="fname" class="form-control cswitch" readonly>
											 </div>
									 </div>
								 </div>


							 </div>

						 </div>
			 <div class="col-xl-7 col-lg-3" style="margin-top: 8%">
						 <div class="card shadow mb-4" style="margin-top:-12%;width:1000px">
							 <!-- Card Body -->
							 <div class="card-body">
<!--                    <form name="my-form"  method="post">-->
							 <div class="form-group row">
													 <label for="email_address" class="col-md-4 col-form-label text-md-right">Mail ID</label>
													 <div class="col-md-4">
															 <input type="email" placeholder="<?php echo $query['Email']?>" id="MID" class="form-control" name="MID" required readonly>
													 </div>
											 </div>
											 <div class="form-group row">
													 <label for="password" class="col-md-4 col-form-label text-md-right" id='pws'>Password</label>
													 <div class="col-md-4">
															 <input type="password" id='pwd' name='pwd' placeholder="**************"  class="form-control" readonly>
													 </div>
											 </div>
											 <div class="form-group row">
													 <label for="user_name" class="col-md-4 col-form-label text-md-right">NIC</label>
													 <div class="col-md-4">
															 <input type="text" placeholder="<?php echo  $query['NIC']?>" id="uname" class="form-control" name="uname" required readonly>
													 </div>
											 </div>
<!--                </form>-->
								 </div>

							 </div>
					 <div class="card shadow mb-4" style="margin-top:2%;width:1000px">
							 <!-- Card Body -->
							 <div class="card-body">
<!--                    <form name="my-form"  method="post">-->
											<div class="form-group row">
													 <label for="first_name" class="col-md-4 col-form-label text-md-right">Address</label>
													 <div class="col-md-4">
															 <input type="text" value='<?php echo $query['Address']?>' id='address' class="form-control cswitch" name="address" autofocus required readonly>
													 </div>
							 </div>

												<div class="form-group row">
													 <label for="first_name" class="col-md-4 col-form-label text-md-right">Date of Birth</label>
													 <div class="col-md-4">
															 <input type="date" value='<?php echo $query['DOB']?>' id='DOB' class="form-control cswitch" name="DOB" autofocus required readonly>

													 </div>
											 </div>

															 <div class="form-group row">
																	 <label for="first_name" class="col-md-4 col-form-label text-md-right">Gender</label>
																	 <div class="col-md-4">
																			 <input type="text" value='<?php echo $query['Gender']?>' id='gender' class="form-control" name="gender" autofocus required readonly>
																	 </div>
											 </div>
											 <div class="form-group row">
											 <label for="phone_number" class="col-md-4 col-form-label text-md-right">Contact Number</label>
											 <div class="col-md-4">
													 <input type="text" value="<?php echo $query['ContactNumber']?>" name="fname" id="fname" class="form-control cswitch" readonly>
											 </div>
									 </div>


								 </div>

							 </div>


						 </div>
						 <div class="col-xl-8 col-lg-5" style="margin-top: 16%;margin-left:18%">
						 <div class="card shadow mb-4" style="margin-top:-20%">
							 <!-- Card Body -->
							 <div class="card-body">
							 <div align="center"> <h3>Curriculum Vitae</h3></div>
								 <hr>
											 <div align="center" style="height:500px">
													 <img id='img' class="thumbnail img-responsive" src='<?php echo $query['img_src'] ?>' width="800px" height="500px">

													 <input class="form-control pws" type="file"  id='fileToUpload' name='fileToUpload'  accept="image/x-png,image/jpeg" style="width:40% ; display:none" >
											 </div>
									 <hr>

								 </div>


							 </div></div>
	 </div>
							</form>
</div>
<!--
					<center>
					<div class="logout"><a href="logout.php"><img src='../img/logout-icon.png'><br><br>Logout</a></div>
				</center>
-->

<!--				</div>-->
<!--
			</div>
		</div>

-->
	</header>
	<script>
	          $(function(){
	            $("#menu-toggle").click(function(e) {
	                e.preventDefault();
	                $("#wrapper").toggleClass("toggled");
	            });

	            $(window).resize(function(e) {
	              if($(window).width()<=768){
	                $("#wrapper").removeClass("toggled");
	              }else{
	                $("#wrapper").addClass("toggled");
	              }
	            });
	          });

	        </script>
	        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
	        <script>

	                 $('input[type=file]').change(function () {
	                     var fileInput = document.getElementById('fileToUpload');
	                     var filename = fileInput.files[0].name;
	                     document.getElementById("img").src = filename;
	                     $('.hidden').show();
	                 });


	        </script>
	        <script type="text/javascript">
	            function do_change(){
	            document.getElementById("Update").style.display = "block";
	            document.getElementById("edit").style.display = "none";
	            $('.cswitch').removeAttr('readonly');
	            $('.pws').show();
	            $('#pwd').css('display','block');

	            // document.getElementById("pwd").show();

	            document.getElementById("pwd").placeholder='';
	            document.getElementById("pws").value='Old Password';
	            // document.getElementByClass("cswitch").removeAttr("readonly");
	            }
	        </script>
</body>
</html>
