<?php require_once('initialize.php') ;
$db = Database::getInstance();
$connection = $db->getConnection();
$uid = $_SESSION['uid'];
$q = mysqli_query($connection,"SELECT * FROM (application join vacancy on application.VacancyID = jobvacancy.VacancyID) join job on jobvacancy.JobID = job.JobID) join  WHERE JobID = '$id'");
$query = $q->fetch_assoc();
?>
<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport"s content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Search-results</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Custom fonts for this template -->
  <link href="../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Lato:400,700,400italic,700italic" rel="stylesheet" type="text/css">

  <!-- Plugin CSS -->
  <link href="../vendor/magnific-popup/magnific-popup.css" rel="stylesheet" type="text/css">


  <!-- Custom styles for this template -->

     <link href="../css/job.css" rel="stylesheet" type="text/css">

</head>
<header>
  <div class="container-expand fixed-top">
<nav class="navbar navbar-expand-lg text-uppercase" id="mainNav" style="height: 8rem;background-color:transparent ">
  <div class="container">
<a class="navbar-brand js-scroll-trigger" href="sJSAcc.php" style="margin-left: 0%; color:black;font-size:80px;font-family:cursive">JOB HUNT</a>
    <button class="navbar-toggler navbar-toggler-right text-uppercase bg-primary text-white rounded" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
      Menu
      <i class="fas fa-bars"></i>
    </button>
  </div>
    <div class="box clearfix" style="margin-top:3%;margin-left:50%">
      <div class="rest">
        <div class="data clearfix">

          <div class="additem clearfix">
          <a href="sJSAcc.php"><img src="../img/home.png" style="width: 50%;height:50%">
          <br>
          <br>Home Page</a>
        </div>
    </div>
  </div>
</div>
</nav>
</div>


 <body id='page top'>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" />

<div class="container" style='margin-top:10%'>
    <div class="row">
       <?php
            while($data = $query->fetch_assoc())
                {
                    $id = $data['JobID'];
        ?>
        <div class="col-md-6 col-sm-6">
            <div class="product-grid6">
                <div class="product-content" style="margin-top:1%">
                    <h3 class="title" style="font-size:30px"><?php echo $data['Title'];?></h3>
                    <div class="price"><h5 style="color:black">Results</h5><?php echo $data['marks'];?>
                    </div>
                    <div class="price"><h5 style="color:black">Results</h5><?php echo $data['status'];?>
                    </div>

                </div>
                <ul class="social">
                    <?php
                        $output = '<li><a href="jobdetails.php?id='.$id.'" data-tip="View Job Description"><i class="fa fa-eye"></i></a></li>';
                        echo ("$output");
                    ?>
                </ul>
            </div>
            <hr>
        </div>
        <?php
            }
        ?>
    <?php
}
?>
    </div>

</div>

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

    </body>
</html>
