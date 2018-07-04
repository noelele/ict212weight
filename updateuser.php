<head>
	<link href="css/dashboard.css" rel="stylesheet">
	<link href="vendor/bootstrap/css/bootstrap.css" rel="stylesheet">

<?php include 'functions.php' ?>
</head>
<!--add MODAL-->

<?php

      $dataOps = new dataOps();

      if (isset($_POST['updateSubmit'])){
      		$type = $_POST['type'];
       		$id =$_GET['id'];

       		 if($dataOps->updateUser($type,$id)){
         	 
         	header('Location: profile.php');
         	echo "<script type='text/javascript'>alert('Data updated');</script>";
        }else{
          echo "Fail". mysqli_error();
        }

      }
      

    ?>
            <h1>Update your preferred program</h1>
            <a href="profile.php" type="button" class='btn btn-danger'><span aria-hidden="true">&larr; BACK</span></a>
          
            <form action="" method="POST" enctype="multipart/form-data">
            <div class="form-group">
              <label for="exampleInputEmail1">Preferred Program</label><br>
              <select required="required" class="input" type="text" name="type"><br>
               <option value="Bodybuilding">Bodybuilding</option>
               <option value="Lean">Lean</option>
               <option value="Gain">Gain</option>
              </select>
             </div>                        
            <button type="submit" name="updateSubmit" class="btn btn-primary">Submit</button>
          </form>
        
    <!--MODAL END-->


