<?php
 session_start();
  require_once('config.php');
  //phpinfo();
?>


<!doctype html>
<html lang="en">
  <head>
    <?php include 'functions.php' ?>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../../../favicon.ico">

    <title>Exercises</title>

    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/dashboard.css" rel="stylesheet">
  </head>

  <body>
    <?php
      $dataOps = new dataOps();
      if (isset($_POST['addSubmit'])){
        $type = $_POST['type'];
        $name = $_POST['name'];
        $description = $_POST['description'];
        $file = $_FILES['img'];

        if($dataOps->insertExercise($type, $name,$description,$file)){
          echo "Data updated";

        }else{
          echo "Fail". mysqli_error();
        }

      }else if (isset($_POST['updateSubmit'])){
          $type = $_POST['type'];
          $name = $_POST['name'];
          $description = $_POST['description'];
          $file = $_FILES['img'];
          $id =$_GET['id'];
           if($dataOps->updateExercise($type, $name,$description,$file,$id)){
           echo "Data updated";
          header('Location: adminpage.php');
        }else{
          echo "Fail". mysqli_error();
        }

      }
      $exerciseArray = $dataOps->retrieveExercise();
    ?>
    <!--add MODAL-->
    <div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">

            <h4 class="modal-title" id="myModalLabel">Add an exercise</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          </div>
          <div class="modal-body">
            <form action="" method="POST" enctype="multipart/form-data">
            <div class="form-group">
              <label for="exampleInputEmail1">Exercise Type: </label><br>
              <select required="required" class="input" type="text" name="type">
               <option disabled selected value> Exercise Type </option>
               <option value="Bodybuilding">Bodybuilding</option>
               <option value="Lean">Lean</option>
               <option value="Gain">Gain</option></div>
              </select>
            </div>
            <div class="form-group">
              <label for="exampleInputPassword1">Name</label>
              <input type="text" class="form-control" id="exampleInputPassword1" name="name" placeholder="Name of exercise" required>
            </div>
            <div class="form-group">
              <label for="exampleInputPassword1">Description</label>
              <input type="text" class="form-control" id="datePicker" name="description" placeholder="Description" required>
            </div>
            <div class="form-group">
              <label for="exampleInputPassword1">Image:</label>
              <input type="file" name="img" id="img" required>
            </div>


          </div>
          <div class="modal-footer">

            <button type="submit" name="addSubmit" class="btn btn-primary">Submit</button>

          </div>
          </form>
        </div>
      </div>
    </div>
    <!--MODAL END-->
    <nav class="navbar navbar-dark fixed-top bg-dark flex-md-nowrap p-0 shadow">
      <a class="navbar-brand col-sm-3 col-md-2 mr-0" href="#">Admin</a>
      <input onkeyup="searchFunction()" id="searchInput" class="form-control form-control-dark w-100" type="text" placeholder="Search by exercise type" aria-label="Search">
      <ul class="navbar-nav px-3">
        <li class="nav-item text-nowrap">
          <a class="nav-link" href="userlogout.php">Sign out</a>
        </li>
      </ul>
    </nav>

    <div class="container-fluid">
      <div class="row">
        <nav class="col-md-2 d-none d-md-block bg-light sidebar">
          <div class="sidebar-sticky">
            <ul class="nav flex-column">
              <li class="nav-item">
                <a class="nav-link active" href="adminpage.php">
                  <span data-feather="home"></span>
                  Exercises <span class="sr-only">(current)</span>
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="announcements.php">
                  <span data-feather="bell"></span>
                  Announcements
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="adminuserlist.php">
                  <span data-feather="users"></span>
                  Users
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="admindiet.php">
                  <span data-feather="heart"></span>
                  Diet
                </a>
              </li>

            </ul>


          </div>
        </nav>

        <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
          <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <div class="row">
              <div class="col-xs-6 col-md-6 col-lg-6">
            <h1 class="h2">Exercises</h1>
              </div>
              <div class="col-xs-2 col-md-2 col-lg-2">
            <button type="button" class="btn btn-primary pull-left" data-toggle="modal" data-target="#addModal">
            Add new exercise</button>
          </div>

            </div>
          </div>
           <table class="table table-hover usersTable" id="exerciseTable">
                      <thead>
                       <tr>
                       <th>Type</th>
                       <th>Name</th>
                       <th>Description</th>
                      <th>Image</th>
                                           <tr>
                     </thead>
                      <?php foreach($exerciseArray as $row){ ?>
                      <tr>
                        <td><?php echo $row['type']; ?></td>
                        <td><?php echo $row['name']; ?></td>
                        <td><?php echo $row['description']; ?></td>
                        <td><?php echo '<a href="'.$row['filepath'].'"><img class="card-img-top" src="'.$row['filepath'].'" alt=""></a>'; ?></td>
                        <td><a type="button" class="btn btn-warning" name="updateBtn" href="update.php?id=<?php echo $row['exercise_id']?>" >Update</a></td>
                        <td><a type="button" onclick="return confirm('Are you sure?')" class="btn btn-danger" name="deleteBtn" href="deleteexercise.php?id=<?php echo $row['exercise_id']?>">Delete</a></td>
                      </tr>

                      <?php } ?>

           </table>
        </main>
      </div>
    </div>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script>window.jQuery || document.write('<script src="vendor/jquery/jquery-slim.min.js"><\/script>')</script>
    <script src="vendor/jquery/popper.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.min.js"></script>

    <!-- Icons -->
    <script src="https://unpkg.com/feather-icons/dist/feather.min.js"></script>
    <script>
      feather.replace()
    </script>
    <script>
function searchFunction() {
  // Declare variables
  var input, filter, table, tr, td, i;
  input = document.getElementById("searchInput");
  filter = input.value.toUpperCase();
  table = document.getElementById("exerciseTable");
  tr = table.getElementsByTagName("tr");

  // Loop through all table rows, and hide those who don't match the search query
  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[0];
    if (td) {
      if (td.innerHTML.toUpperCase().indexOf(filter) > -1) {
        tr[i].style.display = "";
      } else {
        tr[i].style.display = "none";
      }
    }
  }
  /*for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[1];
    if (td) {
      if (td.innerHTML.toUpperCase().indexOf(filter) > -1) {
        tr[i].style.display = "";
      } else {
        tr[i].style.display = "none";
      }
    }
  }*/
}
</script>

    <!-- Graphs -->
  </body>
</html>
