<?php require_once('manager.php');
require_once('utility.php'); ?>


<?php require_once('Connection.php'); 
      require_once('initialize.php');
 $db = Database::getInstance();
 $conn = $db->getConnection();?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
  <link rel="stylesheet" href="../css/bootstrap.min.css">
  <meta charset="utf-8">
  <title>Home</title>
  <link rel="stylesheet" href="">
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">



  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <!-- <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script> -->




</head>

<div class="container">
<form action="manager.php" method="post">

<?php 

$manager=new manager();
$manager->getAllQuestion();

  foreach($_SESSION['AllQuestions'] as $result) {
    echo ('<div class="card border-success mb-3" >
    <div class="card-body">
      <h4 class="card-title">'.$result['Q'].'</h4>
      <p class="card-text">'.'1. '.$result['A1'].'</p>
      <p class="card-text">'.'2. '.$result['A2'].'</p>
      <p class="card-text">'.'3. '.$result['A3'].'</p>
      <p class="card-text">'.'4. '.$result['A4'].'</p>
      <input type="hidden" name="'.$result['Q_id'].'" value="'.$result['Q_id'].'"   id=""><br>
    <button type="submit" name="Add_toExam" value="'.$result['Q_id'].'">Add to Exam</button>

     
    <div class="container">
      
      </div>
    </div>
  </div>');
  }


  echo '<li><a href="hr_home.php">Done</a></li>';
  ?>

</form>
</div>

</div>