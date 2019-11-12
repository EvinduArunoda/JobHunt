
<?php 
	require_once('initialize.php'); 
?>


<!DOCTYPE html>
<html>
<head>
	<title>View all Jobs</title>
	<meta charset="utf-8">
	
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
	<style >
		body  {
  		background-image:linear-gradient(rgba(0,0,1,0.3),rgba(0,0,0,0.3)),url(../img/office_33.jpeg);
  		/*opacity: 0.7;*/
  		height: 100%; 
  		/*background-position: center;*/
  		background-repeat: no-repeat;
  		/*background-size: cover;*/
  		background-color: #cccccc;
		}
		h1{
			color:white;
		}
		table{
			border-collapse: collapse;
			position: center;
			width: 75%;
			color: #588c7e;
			font-family: monospace;
			font-size: 15px;
			text-align: left;
			margin: 2.5% 0 0 2.5%;
		}
		th{
			background-color: #3d3d29;
			color: white;
			padding: 1%;
		}tr{
			background-color: #f2f2f2;
		}
		td{
			height: 40px;
		}
	</style>
</head>
<body>
	<center>
	<h1> All Available Jobs </h1>
	
	
	<table>
		<tr style="text-align: center;">
			<th style="width: 55%">Job title</th>
			
			<th style="width: 15%">View Candidates</th>
			
		</tr>

<
<?php 
	require_once('initialize.php'); 
?>


<!DOCTYPE html>
<html>
<head>
	<title>View all Jobs</title>
	<meta charset="utf-8">
	
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
	<style >
		body  {
  		background-image:linear-gradient(rgba(0,0,1,0.3),rgba(0,0,0,0.3)),url(../img/office_33.jpeg);
  		/*opacity: 0.7;*/
  		height: 100%; 
  		/*background-position: center;*/
  		background-repeat: no-repeat;
  		/*background-size: cover;*/
  		background-color: #cccccc;
		}
		h1{
			color:white;
		}
		table{
			border-collapse: collapse;
			position: center;
			width: 75%;
			color: #588c7e;
			font-family: monospace;
			font-size: 15px;
			text-align: left;
			margin: 2.5% 0 0 2.5%;
		}
		th{
			background-color: #3d3d29;
			color: white;
			padding: 1%;
		}tr{
			background-color: #f2f2f2;
		}
		td{
			height: 40px;
		}
	</style>
</head>
<body>
	<center>
	<h1> All Available Jobs </h1>
	
	
	<table>
		<tr style="text-align: center;">
			<th style="width: 55%">Job title</th>
			
			<th style="width: 15%">View</th>
			<th style="width: 15%">Edit</th>
			<th style="width: 15%">Remove</th>
		</tr>

<?php 
	$AllJobs=$_SESSION['AllJobs'];
	foreach ($AllJobs as $Job){
		
		$title=$Job['Title'];
		$JobID=$Job['JobID'];
		echo "<tr>
		<form class=\"box\" action=\"manager.php\" method=\"post\">
			<input type='hidden' name='JobID' value=". $JobID . ">
			<td style='border: 1px solid #3d3d29; padding:0.5%;'>".$title."</td>
			<td>" . '<a href="HR_View_Job.php?var='.$JobID.'">'. "View" .'</a>' .  "</td>
			<td style='text-align: center; border: 1px solid #3d3d29;'>"  . '<button name="Edit_Job" type="submit" value="'.$JobID .'" >Edit</button>'. "</td>
			<td style='text-align: center; border: 1px solid #3d3d29;'>"  . '<button name="remove_Job" type="submit" value="'.$JobID .'" >Remove</button>'. "</td>
			</form>
		</tr>";
	}
	echo "</table>";
 ?>


 </table>
 </center>
</body>
</html>
<?php 
	require_once('initialize.php'); 
?>


<!DOCTYPE html>
<html>
<head>
	<title>View all Jobs</title>
	<meta charset="utf-8">
	
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
	<style >
		body  {
  		background-image:linear-gradient(rgba(0,0,1,0.3),rgba(0,0,0,0.3)),url(../img/office_33.jpeg);
  		/*opacity: 0.7;*/
  		height: 100%; 
  		/*background-position: center;*/
  		background-repeat: no-repeat;
  		/*background-size: cover;*/
  		background-color: #cccccc;
		}
		h1{
			color:white;
		}
		table{
			border-collapse: collapse;
			position: center;
			width: 75%;
			color: #588c7e;
			font-family: monospace;
			font-size: 15px;
			text-align: left;
			margin: 2.5% 0 0 2.5%;
		}
		th{
			background-color: #3d3d29;
			color: white;
			padding: 1%;
		}tr{
			background-color: #f2f2f2;
		}
		td{
			height: 40px;
		}
	</style>
</head>
<body>
	<center>
	<h1> All Available Jobs </h1>
	
	
	<table>
		<tr style="text-align: center;">
			<th style="width: 55%">Job title</th>
			
			<th style="width: 15%">View</th>
			<th style="width: 15%">Edit</th>
			<th style="width: 15%">Remove</th>
		</tr>

<?php 
	$AllJobs=$_SESSION['AllJobs'];
	foreach ($AllJobs as $Job){
		
		$title=$Job['Title'];
		$JobID=$Job['JobID'];
		echo "<tr>
		<form class=\"box\" action=\"manager.php\" method=\"post\">
			<input type='hidden' name='JobID' value=". $JobID . ">
			<td style='border: 1px solid #3d3d29; padding:0.5%;'>".$title."</td>
			<td>" . '<a href="HR_View_Job.php?var='.$JobID.'">'. "View" .'</a>' .  "</td>
			<td style='text-align: center; border: 1px solid #3d3d29;'>"  . '<button name="Edit_Job" type="submit" value="'.$JobID .'" >Edit</button>'. "</td>
			<td style='text-align: center; border: 1px solid #3d3d29;'>"  . '<button name="remove_Job" type="submit" value="'.$JobID .'" >Remove</button>'. "</td>
			</form>
		</tr>";
	}
	echo "</table>";
 ?>


 </table>
 </center>
</body>
</html>


 </table>
 </center>
</body>
</html>