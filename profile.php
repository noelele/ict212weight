<?php
 session_start();
  require_once('config.php');
  //phpinfo();
?>

<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Profile</title>

    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    
    <link href="css/profile.css" rel="stylesheet">

  </head>

  <body>

    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top" id="mainNav">
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
            <li class="nav-item">
              <a class="nav-link" href="announcementsuser.php">Announcements</a>
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
    <!-- Header with Background Image 
    <header class="business-header">
      <div class="container">
        <div class="row">
          
        </div>
      </div>
    </header>
-->
     <!-- Page Content -->
    <div class="container-fluid">
    <div class="row">
      <div class="userpic col-md-3 col-xs-3 col-sm-3" >
      <center>  <img src="img/defaultimageuser.png" ></img></center>
      <center>  <?php
              $userId= $_SESSION['user_id'];
              $result = $con->query("SELECT * FROM users WHERE user_id='" . $userId. "'");
              while($row = mysqli_fetch_array($result,MYSQLI_ASSOC))
              echo "<h3>" .$row['fname'] ." ". $row['lname'] . "</h3>";


          ?></h4></center>
      </div>
      <div class="userdetails col-md-3 col-xs-3 col-sm-3">
        <center><h2>Member Information</h2></center>
        <ul class="list-group">
              <!--First Name-->
              <li class="list-group-item">First Name: <?php
                                                      $userId= $_SESSION['user_id'];
                                                      $result = $con->query("SELECT fname FROM users WHERE user_id='" . $userId. "'");
                                                      while($row = mysqli_fetch_array($result,MYSQLI_ASSOC))
                                                      echo $row['fname'] ;
                                                      ?></li>
              <!--Last Name-->
              <li class="list-group-item">Last Name: <?php
                                                      $userId= $_SESSION['user_id'];
                                                      $result = $con->query("SELECT lname FROM  users WHERE user_id='" . $userId. "'");
                                                      while($row = mysqli_fetch_array($result,MYSQLI_ASSOC))
                                                      echo $row['lname'] ;
                                                      ?>
              </li>

              <!--Preferred Program-->
              <li class="list-group-item">Preferred Program: <?php
                                                      $userId= $_SESSION['user_id'];
                                                      $result = $con->query("SELECT preferredprogram FROM  users WHERE user_id='" . $userId. "'");
                                                      while($row = mysqli_fetch_array($result,MYSQLI_ASSOC))
                                                      echo $row['preferredprogram'] ;
                                                      ?>&emsp;<a type="button" class="btn btn-warning pull-right" name="updateBtn" href="updateuser.php?id=<?php echo $userId ?>" >Update</a> </li>
                                                      <br>
                                                 
              
      
        </ul>
      </div>

      <div class="bmiCalc col-md-6 col-xs-6 col-sm-6">
        <center><h2>Weight Track</h2></center>
        <?php $result = $con->query("SELECT * FROM bmi_log WHERE user_id='" . $_SESSION['user_id']. "'"); ?>
        <table class='tableHead'>
                        <tr class='tableHead'>
                            <th class='tableHead'>Date</th>
                            <th class='tableHead'>Weight</th>
                            <th class='tableHead'>Height</th>
                            <th class='tableHead'>BMI</th>
                            <th class='tableHead'>Category</th>
                        </tr>
        </table>
        <?php 
        while($row = mysqli_fetch_array($result,MYSQLI_ASSOC))
                echo "<table class='tableStyle'>
                        <tr class='tableStyle'>
                              <td class='tableStyle'>".$row['datesubmitted']."</td>
                              <td class='tableStyle'>".$row['weight']."</td>
                              <td class='tableStyle'>".$row['height']."</td>
                              <td class='tableStyle'>".number_format((float)$row['bmi'], 2, '.', '')."</td>
                              <td class='tableStyle'>".$row['category']."</td>
                        </tr>
                </table>";
        ?>

    </div>
  </div>

    <!-- Footer -->
    <footer class="footer bg-light py-5 bg-dark">
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
