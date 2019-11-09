<?php require_once('initialize.php') ;
$db = Database::getInstance();
$connection = $db->getConnection(); ?>
 
<!DOCTYPE html>
<html>
<head>
	<title>NOVUS CREATIONS</title>
	
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
	<title>NOVUS CREATIONS</title>
	<link rel="stylesheet" type="text/css" href="../css/view_job.css"> 
</head>
<body>
	<div class="wrapper">
		<header>
			<div class="title">
				<h1><?php 
					$jobid = $_GET['var'];
					$query="SELECT * FROM job WHERE JobID='$jobid' ";
					$result=mysqli_query($connection,$query);

					
					if($result){
						$row1 = mysqli_fetch_assoc($result);
					}
						echo $row1['Title'];					 
					 ?></h1>
			</div>
		</header>
		<div class="rest">
			<div class="data">
				

				<div class="display-data clearfix">

					<?php 
					$jobid = $_GET['var'];
					$query="SELECT * FROM job WHERE JobID='$jobid' ";
					$result=mysqli_query($connection,$query);

					
					if($result){
						$row1 = mysqli_fetch_assoc($result);
					}
						echo "<table><tr><td>Job Title : </td><td>".$row1['Title']."<br></td></tr><tr><td>Description : </td><td>".$row1['Description']."</td></tr><tr><td>Salary : </td><td>".$row1['Salary']."<br></td></tr><tr><td>No of Vacancies : </td><td>".$row1['VacancyCount']."<br></td></tr><tr><td>No of Positions : </td><td>".$row1['PositionCount']."<br></td></tr></table>";					 
					 ?>
				</div>
			</div>
		</div>
	</div>
</body>
</html>