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
       		$name = $_POST['name'];
        	$description = $_POST['description'];
       		$file = $_FILES['img'];
       		$id =$_GET['id'];

       		 if($dataOps->updateExercise($type, $name,$description,$file,$id)){
         	 
         	header('Location: adminpage.php');
         	echo "<script type='text/javascript'>alert('Data updated');</script>";
        }else{
          echo "Fail". mysqli_error();
        }

      }
      

    ?>
            <h1>Update an Exercise</h1>
            <a href="adminpage.php" type="button" class='btn btn-danger'><span aria-hidden="true">&larr; BACK</span></a>
          
            <form action="" method="POST" enctype="multipart/form-data">
            <div class="form-group">
              <label for="exampleInputEmail1">Exercise Type: </label><br>
              <select required="required" class="input" type="text" name="type"><br>
               <option value="Bodybuilding">Bodybuilding</option>
               <option value="Lean">Lean</option>
               <option value="Gain">Gain</option>
              </select>
             </div>
            <div class="form-group">
              <label for="exampleInputPassword1">Name</label>
              <input type="text" class="form-control" id="exampleInputPassword1" name="name" placeholder="Name of exercise" required>
            </div>
            <div class="form-group">
              <label for="exampleInputPassword1">Description</label>
              <input type="text" class="form-control" id="datePicker" name="description" placeholder="Description"  required>
            </div>   
            <div class="form-group">
              <label for="exampleInputPassword1">Image:</label>
              <input type="file" name="img" id="img" required>
            </div>                             
            <button type="submit" name="updateSubmit" class="btn btn-primary">Submit</button>
          </form>
        
    <!--MODAL END-->


