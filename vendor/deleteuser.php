<head>
<?php include 'functions.php' ?>
</head>

<?php

      $dataOps = new dataOps();
      $id =$_GET['id'];

      if($dataOps->deleteAnnounce($id)){
         	header('Location: announcements.php');
          echo "<script type='text/javascript'>alert('Exercise deleted');</script>";
        }else{
          echo "Fail". mysqli_error();
        }

      
      

    ?>