<head>
<?php include 'functions.php' ?>
</head>

<?php

      $dataOps = new dataOps();
      $id =$_GET['id'];

      if($dataOps->deleteUser($id)){
         	header('Location: adminuserlist.php');
          echo "<script type='text/javascript'>alert('User deleted');</script>";
        }else{
          echo "Fail". mysqli_error();
        }

      
      

    ?>