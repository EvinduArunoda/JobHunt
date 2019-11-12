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

$examID = '1';                 //get exam id here somehow


if((time()-$_SESSION['start_time'])<$_SESSION['duration']){
$manager=new manager();
$resultArr=$manager->load_exam_question($examID);
if (is_null($resultArr)){
  echo('no questions added yet.');
}else{
  foreach($resultArr as $result) {
    echo ('<div class="card border-success mb-3" >
    <div class="card-body">
      <h4 class="card-title">'.$result['Q'].'</h4>
      <p class="card-text">'.'1. '.$result['A1'].'</p>
      <p class="card-text">'.'2. '.$result['A2'].'</p>
      <p class="card-text">'.'3. '.$result['A3'].'</p>
      <p class="card-text">'.'4. '.$result['A4'].'</p>


      <input type="text" name="'.$result['Q_id'].'" placeholder="Your Answer"  id=""><br>


    <div class="container">

      </div>
    </div>
  </div>');
  }
  echo('<input type="hidden" id="examID" name="examID" value='.$examID.'>
    <button type="submit" name="submit_answer" value="best">Submit Answer</button>');
  echo ($_SESSION['duration']-(time()-$_SESSION['start_time']));
};
}else{
  echo "end exam";
  echo ($_SESSION['duration']);
  echo('<button type="submit" name="submit_answer" value="best">Submit Answer</button>');
}?>

</form>
</div>

</div>
