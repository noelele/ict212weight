<?php
 session_start();
  require_once('config.php');
  //phpinfo();
?>

<!DOCTYPE html>
<html lang="en">

  <head>
    <?php include 'functions.php' ?>
    <script src="js/loginsignup.js"></script>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Weight Tracking, BMI Calculator, and Exercise Recommendation Health Web App">
    <meta name="author" content="Noel Anthony Arandilla, Richellou Arbuiz">

    <title>Weight and Health App</title>

    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.css" rel="stylesheet">

    <!-- Custom fonts-->
    <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="vendor/simple-line-icons/css/simple-line-icons.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700,300italic,400italic,700italic" rel="stylesheet" type="text/css">

    <!--index page css -->
    <link href="css/index.css" rel="stylesheet">

  </head>

  <body>
  <?php

      $dataOps = new dataOps();

      if (isset($_POST['confirmsignup'])){

        $fname = $_POST['fname'];
        $lname = $_POST['lname'];
        $username = $_POST['username'];
        $password = $_POST['password'];
        $preferredprogram = $_POST['preferredprogram'];
        $usertype = '1';
        
  
        if($dataOps->registerUser($fname, $lname, $username, $password, $preferredprogram, $usertype)){
          echo "User Registered";
          $result = $con->query("SELECT * FROM users");
           while ($row = mysqli_fetch_array($result,MYSQLI_ASSOC)){
          $_SESSION['user_id'] = $row['user_id'];
          $_SESSION['preferredprogram'] = $row['preferredprogram'];
          }
          header("location:bmiCalc.php");
        }else{
          echo "Fail". mysqli_error();
        }

      }else if(isset($_POST['signin'])){
           $result = $con->query("SELECT * FROM users");
           while ($row = mysqli_fetch_array($result,MYSQLI_ASSOC)){
           $user_id = $row['user_id'];
           $username = $row['username'];
           $password = $row['password'];
           $usertype = $row['usertype'];
      //  $trainer_id = $row['trainer_id'];
      if(isset($_POST['password'])){
        if($_POST['username'] == $username && ($_POST['password'] == $password && $usertype == '1')){
/*          $_SESSION['username'] = $username;
          $_SESSION['password'] = $password;*/
          $_SESSION['user_id'] = $row['user_id'];
          $_SESSION['preferredprogram'] = $row['preferredprogram'];

          header('location: bmiCalc.php');
        }else if($_POST['username'] == $username && ($_POST['password'] == $password && $usertype == '2')){
  /*        $_SESSION['username'] = $username;
          $_SESSION['password'] = $password;*/
          header('location: adminpage.php');

        }else{
            echo '<script type="text/javascript">alert("Invalid Email or Password!")</script>';
      }
    }
}
      }

    ?>
    <!-- Navigation -->
    <nav class="navbar navbar-light bg-light static-top">
      <div class="container" >
        <div class="col-sm-8 col-lg-9 col-xs-9">
        <a class="navbar-brand" href="#">Health and Wellness</a>
        </div>
        <div class="col-sm-4 col-lg-3 col-xs-3">
        <a class="btn btn-primary" href="#signin"  data-toggle="modal" data-target=".log-sign" >Log in</a>
        <a class="btn btn-default" href="#signup"  data-toggle="modal" data-target=".log-sign" >Sign Up</a>
         </div>
      </div>
    </nav>
    
    <!-- MODAL -->
    <!-- Modal -->
<div class="modal fade bs-modal-sm log-sign" id="myModal" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-sm">
    <div class="modal-content">
        
        <div class="bs-example bs-example-tabs">
            <ul id="myTab" class="nav nav-tabs">
              <li id="tab1" class=" active tab-style login-shadow "><a href="#signin" data-toggle="tab">Log in</a></li>
              <li id="tab2" class=" tab-style "><a href="#signup" data-toggle="tab">Sign Up</a></li>
              
            </ul>
        </div>
      <div class="modal-body">
        <div id="myTabContent" class="tab-content">
       
        <div class="tab-pane fade active in" id="signin">
            <form class="form-horizontal" action="" method="POST" >
            <fieldset>
            <!-- Sign In Form -->
            <!-- Text input-->
               <div class="group">
                <p>Username</p></div>
                <input required="" class="input" type="text" name="username"><span class="highlight"></span><span class="bar"></span>
                <!-- Password input-->
             <div class="group">
               <p>Password</p>
                <input required="" class="input" type="password" name="password"><span class="highlight"></span><span class="bar"></span>
   
                 </div>
                <em>minimum 6 characters</em>

           
            

            <!-- Button -->
            <div class="control-group">
              <label class="control-label" for="signin"></label>
              <div class="controls">
                <button id="signin" name="signin" type="submit" class="btn btn-primary btn-block">Log In</button>
              </div>
            </div>
            </fieldset>
            </form>
        </div>
          
          
        <div class="tab-pane fade" id="signup">
            <form action="" method="POST" class="form-horizontal">
            <fieldset>
            <!-- Sign Up Form -->
            <!-- first name input-->
            <div class="group">
              <p>First Name</p>
            <input required="required" class="input" type="text" name="fname"  maxlength="30" pattern="[A-Za-z ]+" autofocus required ><span class="highlight"></span><span class="bar"></span>
            </div>
            
            <!-- last name input-->
            <div class="group">
              <p>Last Name</p>
              <input required="required" class="input" type="text" name="lname" maxlength="30" pattern="[A-Za-z ]+" autofocus required ><span class="highlight"></span><span class="bar"></span>
               </div>
            
            <!-- username input-->
            <div class="group">
              <p>Username</p>
            <input required="required" class="input" type="text" name="username"><span class="highlight"></span><span class="bar"></span>
            </div>
            <!-- password input-->
            <div class="group">
              <p>Password</p>
            <input required="required" class="input" type="password" name="password"><span class="highlight"></span><span class="bar"></span>
            </div>
             
              <em>1-8 Characters</em>
            
              <div class="group2">
                <p>Preferred Program</p>
            <select required="required" class="input" type="text" name="preferredprogram"><span class="highlight"></span><span class="bar"></span>
               <option disabled selected value> Preferred Program </option>
               <option value="Bodybuilding">Bodybuilding</option>
               <option value="Lean">Lean</option>
               <option value="Gain">Gain</option></div>
              </select>
            <!-- Button -->
            <div class="control-group">
              <label class="control-label" for="confirmsignup"></label>
              <div class="controls">
                <button id="confirmsignup" name="confirmsignup" class="btn btn-primary btn-block" type="submit">Sign Up</button>
              </div>
            </div>
            </fieldset>
            </form>
      </div>
    </div>
      </div>
      <!--<div class="modal-footer">
      <center>
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </center>
      </div>-->
    </div>
  </div>
</div>
<!--END MODAL-->
    <!-- Masthead -->
    <header class="masthead text-white text-center">
      <div class="overlay"></div>
      <div class="container">
        <div class="row">
          <div class="col-xl-9 mx-auto">
            <h1 class="mb-5">Keep track of your health and wellness and reach your goals! </h1>
          </div>
          <div class="col-md-10 col-lg-8 col-xl-7 mx-auto">
            <form>
              <div class="form-row">
                
               
                  <a href="#signup" data-toggle="modal" data-target=".log-sign" type="submit" class="btn btn-block btn-lg btn-primary" >Sign up!</a>
                
              </div>
            </form>
          </div>
        </div>
      </div>
    </header>

    <!-- Icons Grid -->
    <section class="features-icons bg-light text-center">
      <div class="container">
        <div class="row">
          <div class="col-lg-4">
            <div class="features-icons-item mx-auto mb-5 mb-lg-0 mb-lg-3">
              <div class="features-icons-icon d-flex">
                <i class="icon-heart m-auto text-primary"></i>
              </div>
              <h3>BMI Calculator</h3>
              <p class="lead mb-0">Calculate your Body Mass Index (BMI) to assess your weight</p>
            </div>
          </div>
          <div class="col-lg-4">
            <div class="features-icons-item mx-auto mb-5 mb-lg-0 mb-lg-3">
              <div class="features-icons-icon d-flex">
                <i class="icon-chart m-auto text-primary"></i>
              </div>
              <h3>Weight Progress Tracker</h3>
              <p class="lead mb-0">Input your weight and track your day-to-day progress</p>
            </div>
          </div>
          <div class="col-lg-4">
            <div class="features-icons-item mx-auto mb-0 mb-lg-3">
              <div class="features-icons-icon d-flex">
                <i class="icon-like m-auto text-primary"></i>
              </div>
              <h3>Exercise Recommendation</h3>
              <p class="lead mb-0">We recommend exercises based on your preference. Bodybuilding, weight loss, or weight gain </p>
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- Image Showcases -->
    <section class="showcase">
      <div class="container-fluid p-0">
        <div class="row no-gutters">

          <div class="col-lg-6 order-lg-2 text-white showcase-img" style="background-image: url('img/bg-showcase-1.jpg');"></div>
          <div class="col-lg-6 order-lg-1 my-auto showcase-text">
            <h2>BMI Calculator</h2>
            <p class="lead mb-0">BMI (Body Mass Index) is important as it is widely regarded that your chances of having a longer and healthier life are improved if you have a healthy BMI.</p>
          </div>
        </div>
        <div class="row no-gutters">
          <div class="col-lg-6 text-white showcase-img" style="background-image: url('img/bg-showcase-2.jpg');"></div>
          <div class="col-lg-6 my-auto showcase-text">
            <h2>Weight Progress Tracker</h2>
            <p class="lead mb-0">Track your weight to reach and surpass your goal and allow you to be more efficient in your time and workouts. Helps you committed to your plan</p>
          </div>
        </div>
        <div class="row no-gutters">
          <div class="col-lg-6 order-lg-2 text-white showcase-img" style="background-image: url('img/bg-showcase-3.jpg');"></div>
          <div class="col-lg-6 order-lg-1 my-auto showcase-text">
            <h2>Exercise Recommendation</h2>
            <p class="lead mb-0">We recommend exercise based on your workout preference of: bodybuilding, weight gain, or weight loss.</p>
          </div>
        </div>
      </div>
    </section>


    <!-- Call to Action -->
    <section class="call-to-action text-white text-center">
      <div class="overlay"></div>
      <div class="container">
        <div class="row">
          <div class="col-xl-9 mx-auto">
            <h2 class="mb-4">Ready to get started? Sign up now!</h2>
          </div>
          <div class="col-md-10 col-lg-8 col-xl-7 mx-auto">
            <form>
              <div class="form-row">
                
                  <a  href="#signup" data-toggle="modal" data-target=".log-sign" type="submit" class="btn btn-block btn-lg btn-primary">Sign up!</a>
                
              </div>
            </form>
          </div>
        </div>
      </div>
    </section>

    <!-- Footer -->
    <footer class="footer bg-light">
      <div class="container">
        <div class="row">
          <div class="col-lg-6 h-100 text-center text-lg-left my-auto">
            <ul class="list-inline mb-2">
              <li class="list-inline-item">
                <a href="#">About</a>
              </li>
              <li class="list-inline-item">&sdot;</li>
              <li class="list-inline-item">
                <a href="#">Contact</a>
              </li>
              
              
            </ul>
        
          </div>
          
        </div>
      </div>
    </footer>

    <!-- Bootstrap core JavaScript -->

    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  </body>

</html>
