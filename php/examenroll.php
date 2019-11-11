<?php require_once('initialize.php') ;
$db = Database::getInstance();
$connection = $db->getConnection();
$id = $_SESSION['uid'];
$q = mysqli_query($connection,"SELECT * FROM exam WHERE exam_id = '1'");
$query = $q->fetch_assoc();
$count = mysqli_num_rows($q);
?>
<!DOCTYPE html>
<html lang="en">
<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Account-details</title>

  <!-- Bootstrap core CSS -->
  <link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Custom fonts for this template -->
  <link href="../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Lato:400,700,400italic,700italic" rel="stylesheet" type="text/css">
  <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<link href="../css/style.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css">

  <!-- Plugin CSS -->
  <link href="../vendor/magnific-popup/magnific-popup.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
         <link href="../css/jobdetail.css" rel="stylesheet" type="text/css">



  </head>
  <header>
    <div class="container-expand fixed-top" style="background-image:linear-gradient(rgba(0,0,0,0.3),rgba(0,0,0,0.3)), url(../img/office_31.jpeg">
  <nav class="navbar navbar-expand-lg text-uppercase" id="mainNav" style="height: 12rem;background-color:transparent ">
    <div class="container">
<a class="navbar-brand js-scroll-trigger" href="sJSAcc.php" style="margin-left: 0%; color:white;font-size:80px;font-family:cursive">JOB HUNT</a>
      <button class="navbar-toggler navbar-toggler-right text-uppercase bg-primary text-white rounded" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        Menu
        <i class="fas fa-bars"></i>
      </button>
    </div>
    <div class="box clearfix" style="margin-top:-2%;margin-left:50%">
<div class="rest">
<div class="data clearfix">

<div class="additem clearfix">
<a href="sJSAcc.php"><img src="../img/home.png" style="width: 50%;height:50%">
<br>
<br>Home Page</a>
</div>
<div class="additem clearfix">
<div class="logout"><a href="logout.php"><img src='../img/logout-icon.png'>Logout</a></div>
</div>
</div>
</div>
    </div>
  </nav>
  </div>

<body id="page-top" style="background-image:linear-gradient(rgba(0,0,0,0.3),rgba(0,0,0,0.3)), url(../img/office_28.jpeg);">



    <div class="container-fluid" style="margin-top:5%;border-radius:30px">
         <form name="my-form"  method="POST" action='exam.php' enctype="multipart/form-data">

    <div class="row" style="margin-left:8%">
    <div class="col-xl-11 col-lg-8" style="margin-top:10%">
              <div class="card shadow mb-4">
                <!-- Card Body -->
                <div class="card-body">
                        <div align="center">
                            <h1> <?php echo $query['Title'] ?> </h1> <br> <hr> <br>
                            <h2> <?php echo $query['duration'] ?></h2> <br> <hr> <br>
                            <h3> <?php echo $query['D_L'] ?></h3><br> <hr> <br>
                            <div class="container">
                              <div class="intro-text">
                                <a class="btn btn-primary btn-xl text-uppercase js-scroll-trigger" style="margin-top: 1%;margin-bottom: 5%;
                                height:60px;background-color:mediumaquamarine" href="examination.php" ><h3><strong>Start Exam<strong></h3></a>
                              </div>
    </div>
                        </div>
                  </div>


                </div>

              </div>
    </div>
               </form>





    </div>





    </body>
</html>
