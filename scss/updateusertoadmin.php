<head>
	<link href="css/dashboard.css" rel="stylesheet">
	<link href="vendor/bootstrap/css/bootstrap.css" rel="stylesheet">

<?php include 'functions.php' ?>
</head>
<!--add MODAL-->

<?php

      $dataOps = new dataOps();
      $id =$_GET['id'];
      if($dataOps->updateAdmin($id)){ 
         	header('Location: adminuserlist.php');
         	echo "<script type='text/javascript'>alert('Admin updated');</script>";
        }else{
          echo "Fail". mysqli_error();
        }

      
      

    ?>
 
        
    <!--MODAL END-->


