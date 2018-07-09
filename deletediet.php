<head>
<?php include 'functions.php' ?>
</head>

<?php

      $dataOps = new dataOps();
      $id =$_GET['id'];

      if($dataOps->deleteDiet($id)){
         	header('Location: admindiet.php');
          echo "<script type='text/javascript'>alert('Diet deleted');</script>";
        }else{
          echo "Fail". mysqli_error();
        }

      
      

    ?>