<?php
 session_start();
  require_once('config.php');
  //phpinfo();
?>


<!DOCTYPE html>
<html lang="en">

  <head>
    <?php include 'functions.php' ?>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Exercises</title>

    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/bmiCalc.css" rel="stylesheet">

  </head>

  <body>
    <?php

      $dataOps = new dataOps();
      $exercisesArray = $dataOps->retrieveExercise();

    ?>
    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
      <div class="container">
        <a class="navbar-brand" href="#">Health and Wellness</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav ml-auto">
            
            <li class="nav-item ">
              <a class="nav-link" href="bmiCalc.php">BMI Calculator</a>
            </li>
            
            <li class="nav-item active">
              <a class="nav-link" href="exerciseRecommend.php">Exercise Recommendation<span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="profile.php">Profile</a>
            </li>
            <li class="nav-item ">
              <a class="nav-link" href="userlogout.php">Logout</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>

    <!-- Header with Background Image 
    <header class="business-header">
      <div class="container">
        <div class="row">
          
        </div>
      </div>
    </header>
-->
     <!-- Page Content -->
    <div class="container">

      <!-- Page Heading -->
      <h1 class="my-4">Recommended Exercises
        <small><?php
                        $userId= $_SESSION['user_id'];
                        $result = $con->query("SELECT preferredprogram FROM users WHERE user_id='" . $userId. "'");
                        while($row = mysqli_fetch_array($result,MYSQLI_ASSOC))
                          $preferredprogram = $row['preferredprogram'];
                        echo $preferredprogram ;

                        ?></small>
      </h1>
      <div class="row">
     <?php
     $result = $con->query("SELECT * FROM exercises WHERE type='" . $preferredprogram. "'"); 

     while($row = mysqli_fetch_array($result,MYSQLI_ASSOC)){
     echo '<div class="col-lg-4 col-sm-6 portfolio-item">
          <div class="card h-100">
            <a href="'.$row['filepath'].'"><img class="card-img-top" src="'.$row['filepath'].'" alt=""></a>
            <div class="card-body">
              <h4 class="card-title">
                <a href="#">'.$row['name'].'</a>
              </h4>
              <p class="card-text">'.$row['description'].'</p>
            </div>
          </div>
        </div>';
      }
      ?>
      </div>
      <!-- /.row -->

      <!-- Pagination 
      <ul class="pagination justify-content-center">
        <li class="page-item">
          <a class="page-link" href="#" aria-label="Previous">
            <span aria-hidden="true">&laquo;</span>
            <span class="sr-only">Previous</span>
          </a>
        </li>
        <li class="page-item">
          <a class="page-link" href="#">1</a>
        </li>
        <li class="page-item">
          <a class="page-link" href="#">2</a>
        </li>
        <li class="page-item">
          <a class="page-link" href="#">3</a>
        </li>
        <li class="page-item">
          <a class="page-link" href="#" aria-label="Next">
            <span aria-hidden="true">&raquo;</span>
            <span class="sr-only">Next</span>
          </a>
        </li>
      </ul>
-->
    </div>
    <!-- /.container -->

    <!-- Footer -->
    <footer class="py-5 bg-dark">
      <div class="container">
        <p class="m-0 text-center text-white"></p>
      </div>
      <!-- /.container -->
    </footer>

    <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  </body>

</html>
