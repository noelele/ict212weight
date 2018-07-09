<head>
	<link href="css/dashboard.css" rel="stylesheet">
	<link href="vendor/bootstrap/css/bootstrap.css" rel="stylesheet">

<?php include 'functions.php' ?>
</head>
<!--add MODAL-->

<?php

      $dataOps = new dataOps();

      if (isset($_POST['updateSubmit'])){
      		
          $name = $_POST['name'];
          $desc = $_POST['desc'];
       		$id =$_GET['id'];

       		 if($dataOps->updateDiet( $name,$desc,$id)){
         	 
         	header('Location: admindiet.php');
         	echo "<script type='text/javascript'>alert('Data updated');</script>";
        }else{
          echo "Fail". mysqli_error();
        }

      }
      

    ?>
            <h1>Update the diet recommendation</h1>
            <a href="admindiet.php" type="button" class='btn btn-danger'><span aria-hidden="true">&larr; BACK</span></a>
          
            <form action="" method="POST" enctype="multipart/form-data">
            <div class="form-group">
              <label for="exampleInputPassword1">Food Name</label>
              <input type="text" class="form-control" id="exampleInputPassword1" name="name" placeholder="Name of Food" required>
            </div>
            <div class="form-group">
              <label for="exampleInputPassword1">Description</label>
              <input type="text" class="form-control" id="datePicker" name="desc" placeholder="Description of food"  required>
            </div>   
                                        
            <button type="submit" name="updateSubmit" class="btn btn-primary">Submit</button>
          </form>
        
    <!--MODAL END-->


