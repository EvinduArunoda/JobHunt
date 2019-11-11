
<?php 
	require_once('initialize.php'); 
?>


<!DOCTYPE html>
<html>
<head>
	<title>View Question</title>
	<meta charset="utf-8">
	
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
	<style >
		body  {
  		background-image:linear-gradient(rgba(0,0,1,0.3),rgba(0,0,0,0.3)),url(../img/office_28.jpeg);
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
	<h1> All Questions </h1>
	<div class="bg"></div>
	
	<table>
		<tr style="text-align: center;">
			<th style="width: 80%">Question</th>
			<th style="width: 10%">Edit</th>
			<th style="width: 10%">Remove</th>
		</tr>

<?php 
	$AllQuestions=$_SESSION['AllQuestions'];
	foreach ($AllQuestions as $question){
		$questionID = $question['Q_id'];
		$content = $question['Q'];
		echo "<tr>
		<form class=\"box\" action=\"manager.php\" method=\"post\">
			<input type='hidden' name='Q_id' value=". $questionID . ">
			<td style='border: 1px solid #3d3d29; padding:0.5%;'>".$content."</td>
			<td style='text-align: center; border: 1px solid #3d3d29;'>"  . '<button name="Edit_Q" type="submit" value="" >Edit</button>'. "</td>
			<td style='text-align: center; border: 1px solid #3d3d29;'>"  . '<button name="Remove_Q" type="submit" value="" >Remove</button>'. "</td>
			</form>
		</tr>";
	}
	echo "</table>";
 ?>


 </table>
 </center>
</body>
</html>