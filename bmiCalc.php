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

    <title>BMI Calculator</title>

    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/bmiCalc.css" rel="stylesheet">

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
            
            <li class="nav-item active">
              <a class="nav-link" href="bmiCalc.php">BMI Calculator<span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="announcementsuser.php">Announcements</a>
            </li>
            
            <li class="nav-item">
              <a class="nav-link" href="exerciseRecommend.php">Exercise Recommendation</a>
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

    <!-- Header with Background Image -->
    <header class="business-header">
      <div class="container">
        <div class="row">
          
        </div>
      </div>
    </header>

    <!-- Page Content -->
    <div class="container">

      <div class="row">
        <div class="col-sm-6">
          <h2 class="mt-4">BMI Calculator</h2>
          <p>BMI (Body Mass Index) is important as it is widely regarded that your chances of having a longer and healthier life are improved if you have a healthy BMI.</p>
          <p>If your BMI is high, you may also have an increased risk of developing <a href="https://www.diabetes.co.uk/type2-diabetes.html">type 2 diabetes</a>, as well as other metabolic diseases such as <a href="https://www.diabetes.co.uk/diabetes-complications/high-blood-pressure.html"> hypertension</a>, high cholesterol and heart disease.</p>
          <p>
            <a class="btn btn-primary btn-lg" href="#" id="focusinput">Calculate now! &raquo;</a>
          </p>
        </div>
        <div class="col-sm-6">
          <h2 class="mt-4">Calculate</h2>
          <form method="POST">
          	<p>Weight (kg)</p><input id="weight" type=number step=0.1 name="weight" min="0" value="<?php echo isset($_POST['weight']) ? $_POST['weight'] : '' ?>"/><br/>
          	<p>Height (m)</p><input type=number step=0.01 name="height" min="0"  value="<?php echo isset($_POST['height']) ? $_POST['height'] : '' ?>"/><br/><br/>
          	<button type="submit" value="calculate" name="calculateBtn" class="btn btn-info btn-block calculatebtn">Calculate</button>
            <?php
                if (isset($_POST['calculateBtn'])) {
                  if (count($_POST) > 0 && isset($_POST["weight"]) && isset($_POST["height"]))
                {
                // bmi formula
                $bmi = ( $_POST["weight"] / ($_POST["height"] * $_POST["height"]));
                if($bmi <= 18.5){
                            $category = "Underweight";
                        }else if ($bmi >= 18.5 and $bmi <= 24.9){
                            $category = "Healthy";
                        }else if($bmi >= 25){
                            $category = "Overweight";
                        }else if($bmi >= 30){
                            $category = "Obese";
                        };

                echo "<p>Your BMI is: ".number_format((float)$bmi, 2, '.', '')."<br> Category: ".$category."</p>";
                echo "<button type='submit' value='save' name='saveBmiBtn' id='saveBmi' class='btn btn-primary btn-block'>Save to BMI log</button><br>";
              }
            }else if (isset($_POST['saveBmiBtn'])) {

                //$inputEmail= $_SESSION['username'];
              //  $result = $con->query("SELECT * FROM member WHERE username='" . $inputEmail. "'");
                //while($row = mysqli_fetch_array($result,MYSQLI_ASSOC))
                $userId= $_SESSION['user_id'];
                $weight = $_POST['weight'];
                $height= $_POST['height'];
                $currentDate = date("Y/m/d");
                $bmi= ($weight / ($height * $height));

                if($bmi <= 18.5){
                            $category = "Underweight";
                        }else if ($bmi >= 18.5 and $bmi <= 24.9){
                            $category = "Healthy";
                        }else if($bmi >= 25){
                            $category = "Overweight";
                        }else if($bmi >= 30){
                            $category = "Obese";
                        };
                $con->query("INSERT INTO bmi_log(user_id,datesubmitted,weight,height,bmi,category)
                  VALUES ('$userId','$currentDate','$weight','$height','$bmi','$category')");
                $con->close();
                echo "<p>BMI Successfully logged!</p>";

              }
         ?>
          </form>

          
        </div>
      </div>
      
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
    <script>
      $('#focusinput').click(function() {
     $('#weight').focus();
});
    </script>
  </body>

</html>
