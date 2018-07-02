<head>
<?php include 'functions.php' ?>
</head>

<?php

      $dataOps = new dataOps();
      $id =$_GET['id'];

      if($dataOps->deleteExercise($id)){
           
         	header('Location: adminpage.php');
          echo "<script type='text/javascript'>alert('Exercise deleted');</script>";
        }else{
          echo "Fail". mysqli_error();
        }

      
      

    ?>