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

    <title>Announcements</title>

    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom fonts for this template -->
    <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href='https://fonts.googleapis.com/css?family=Lora:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>

    <!-- Custom styles for this template -->
    <link href="css/announcement.css" rel="stylesheet">

  </head>

  <body>
    <?php

      $dataOps = new dataOps();
      $announcementArray = $dataOps->retrieveAnnounce();

    ?>
    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-light fixed-top" id="mainNav">
      <div class="container">
        <a class="navbar-brand" href="index.html">Health and Wellness</a>
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          Menu
          <i class="fa fa-bars"></i>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav ml-auto">
          
            <li class="nav-item ">
              <a class="nav-link" href="bmiCalc.php">BMI Calculator</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="announcementsuser.php">Announcements</a>
            </li>
            <li class="nav-item ">
              <a class="nav-link" href="userdiet.php">Diet</a>
            </li>
            
            <li class="nav-item ">
              <a class="nav-link" href="exerciseRecommend.php">Exercise Recommendation</a>
            </li>
            <li class="nav-item active">
              <a class="nav-link" href="profile.php">Profile<span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item ">
              <a class="nav-link" href="userlogout.php">Logout</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>

    <!-- Page Header -->
    <header class="masthead" style="background-image: url('img/home-bg.jpg')">
      <div class="overlay"></div>
      <div class="container">
        <div class="row">
          <div class="col-lg-8 col-md-10 mx-auto">
            <div class="site-heading">
              <h1>Announcements</h1>
             
            </div>
          </div>
        </div>
      </div>
    </header>

    <!-- Main Content -->
    <div class="container">
      <div class="row">
        <div class="col-lg-8 col-md-10 mx-auto contents">
          <?php
              $result = $con->query("SELECT * FROM announcements WHERE activate='1'"); 

              while($row = mysqli_fetch_array($result,MYSQLI_ASSOC)){
              echo 
              '<div class="post-preview">
                  <a href="#">
                    <h2 class="post-title">
                       '.$row['title'].'
                    </h2>
                    <h3 class="post-subtitle">
                      '.$row['body'].'
                    </h3>
                  </a>
                  <p class="post-meta">Posted on '.$row['timesubmitted'].'</p>
                  </div><hr>';
      }
      ?>
          
          <hr>
        </div>
      </div>
    </div>

    <hr>

    <!-- Footer -->
    <footer>
      <div class="container">
        <div class="row">
          <div class="col-lg-8 col-md-10 mx-auto">
            <ul class="list-inline text-center">
              <li class="list-inline-item">
                <a href="#">
 
              </li>
              <li class="list-inline-item">
          
              </li>
              <li class="list-inline-item">
           
              </li>
            </ul>
            <p class="copyright text-muted">Back to top</p>
          </div>
        </div>
      </div>
    </footer>

    <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Custom scripts for this template -->
    <script src="js/clean-blog.min.js"></script>

  </body>

</html>
