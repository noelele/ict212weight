<head>
	<link href="css/dashboard.css" rel="stylesheet">
	<link href="vendor/bootstrap/css/bootstrap.css" rel="stylesheet">

<?php include 'functions.php' ?>
</head>
<!--add MODAL-->

<?php

      $dataOps = new dataOps();

      if (isset($_POST['updateSubmit'])){
      		
          $title = $_POST['title'];
          $body = $_POST['body'];
       		$id =$_GET['id'];

       		 if($dataOps->updateAnnounce( $title,$body,$id)){
         	 
         	header('Location: announcements.php');
         	echo "<script type='text/javascript'>alert('Data updated');</script>";
        }else{
          echo "Fail". mysqli_error();
        }

      }
      

    ?>
            <h1>Update the announcement</h1>
            <a href="announcements.php" type="button" class='btn btn-danger'><span aria-hidden="true">&larr; BACK</span></a>
          
            <form action="" method="POST" enctype="multipart/form-data">
            <div class="form-group">
              <label for="exampleInputPassword1">Title</label>
              <input type="text" class="form-control" id="exampleInputPassword1" name="title" placeholder="Title of Announcement" required>
            </div>
            <div class="form-group">
              <label for="exampleInputPassword1">Body</label>
              <input type="text" class="form-control" id="datePicker" name="body" placeholder="content of announcement"  required>
            </div>   
                                        
            <button type="submit" name="updateSubmit" class="btn btn-primary">Submit</button>
          </form>
        
    <!--MODAL END-->


