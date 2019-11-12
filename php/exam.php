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
  <link rel="stylesheet" href="../css/exam.css">
  <meta charset="utf-8">
  <title>Exam</title>
  <link rel="stylesheet" href="">
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">



  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>




</head>
<body>
<header>

    <div class="main">
       <center>
        <br>
      <h1>EXAM</h1>
       </center>
       <br>
    </div>

<div class="container">
<form action="manager.php" method="post">

<?php 
$examID  = $_SESSION['exam_id'] ;              //get exam id here somehow

if((time()-$_SESSION['start_time'])<$_SESSION['duration']){
$manager=new manager();
$resultArr=$manager->load_exam_question(1);
if (is_null($resultArr)){
  echo('no questions added yet.');
}else{
  foreach($resultArr as $result) {
    echo ('
      <center><div class="card " >
    <div class="card-body">
      <h4 class="card-title">'.$result['Q'].'</h4>
      <p class="card-text">'.'1. '.$result['A1'].'</p>
      <p class="card-text">'.'2. '.$result['A2'].'</p>
      <p class="card-text">'.'3. '.$result['A3'].'</p>
      <p class="card-text">'.'4. '.$result['A4'].'</p>
      

      <input type="text"  name="'.$result['Q_id'].'" placeholder="Your Answer"  id="">

     
    <div class="container">
      
      </div>
    </div>
  </div>
  </center>
  <br> <br>');
  }
  $_SESSION['timeout'] = 1;
  echo('<input type="hidden" id="examID" name="examID" value='.$examID.'>
    <center>
    <button type="submit" class="bttn" name="submit_answer" value="best">Submit Answers</button>
    </center>');
  echo ($_SESSION['duration']-(time()-$_SESSION['start_time']));
};
}else{
  $_SESSION['timeout'] = 0;
  echo ('<center><br> <br>
    <div class="card1 " >
    <div class="card1-body">
    <center>
    <br>
    <br> <br>
      <h3> Exam Ended </h3>
      <br> 
      <input type="hidden" id="examID" name="examID" value='.$examID.'>
        <button type="submit" class="bttn" name="submit_answer" value="best">Submit Answer</button>
     </center>
    <div class="container">
      
      </div>
    </div>
  </div>
  </center>');
  
}?>

</form>
</div>


</header>
</body>