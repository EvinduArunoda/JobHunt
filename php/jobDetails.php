<?php require_once('initialize.php') ;
$db = Database::getInstance();
$connection = $db->getConnection();
$uid = $_SESSION['uid'];
$id = $_GET['id'];
$q = mysqli_query($connection,"SELECT * FROM job WHERE JobID = '$id'");
$query = $q->fetch_assoc();
?>
<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Product-Details</title>
      <!-- Bootstrap core CSS -->
  <link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Custom fonts for this template -->
  <link href="../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Lato:400,700,400italic,700italic" rel="stylesheet" type="text/css">

  <!-- Plugin CSS -->
  <link href="../vendor/magnific-popup/magnific-popup.css" rel="stylesheet" type="text/css">


    <!-- <link href="../modal.css" rel="stylesheet"> -->
  <!-- Custom styles for this template -->
<!--  <link href="freelancer.min.css" rel="stylesheet">-->



  <link href="../css/jobdetail.css" rel="stylesheet" type="text/css">

</head>
<header>
  <div class="container-expand fixed-top" style="background-image:linear-gradient(rgba(0,0,0,0.7),rgba(0,0,0,0.7)), url(../img/office_31.jpeg">
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
<body id="page-top" style="background-image:linear-gradient(rgba(0,0,0,0.3),rgba(0,0,0,0.3)), url(../img/office_2.jpeg);" >

    <!-- Navigation -->

<section class="profil  py-5 " style="margin-top: 12%">
   <div class="container">
     <div class="row">
         <div class="col-md-8">
              <div class="slider">
                  <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">

                  </div>
              </div>
             <div class="olanaklar-kutu" style="background-color: darkslategrey;box-shadow:0 0 12px #2C3E50">
                 <div class="olanaklar">
                     <h1 class="pb-3" style="font-color: mediumaquamarine">Job Title </h1>
                     <h3 style= "font-family:sans-serif"><?php echo $query['Title']?></h3>
                     <h3 class="pb-3" style="color: mediumaquamarine;margin-top:4%" >Description</h3>
                     <p style="color: mediumaquamarine"><?php echo $query['Description']?></p>
                     <h4 class="pb-3" style="color: mediumaquamarine;margin-top: 3%" >Salary</h4>
                     <p style="color: mediumaquamarine"><?php echo $query['Salary']?></p>
                    <h4 class="pb-3" style="color: mediumaquamarine;margin-top: 3%" >No of Vacancies</h4>
                     <p style="color: mediumaquamarine"> <?php echo $query['VacancyCount']?></p>


              </div>
             </div>
         </div>
         <div class="col-md-4" style="height = 28rem; margin-top: 5%">
             <div class="card" style=" margin-left: 10%; box-shadow:0 0 4px #2C3E50">
                 <img class="card-img-top" src="../img/about.png" alt="Card image cap" style="height:12rem;width:19.6rem">
             </div>
             <br><br>
 <div class="card" style=" margin-left: 10%; box-shadow:0 0 15px black">
     <div class="card-body text-center " style="background-color: darkslategrey">
         <br>
        <div class = "text-center">
<!--            <a href="file:///C:/Users/krish/Documents/home_vendor.html" style="color:darkturquoise">-->

<!--                                    <h5>SEND REQUEST</h5>-->

<!--                 </a>-->
             </div>

             <div class = "text-center">
                         <a href="examenroll.php?id=<?php echo $id?>" style="color:mediumaquamarine; text-decoration:none">
                                  <span class="fas fa-newspaper fa-2x"> </span>
                                         <h5>Apply</h5>

                      </a>
                  </div>

<!-- The Modal -->


<!--             <br><br>-->

                                  </div>
             </div>
             </div>
         </div>
       </div>

</section>








</body>

</html>
