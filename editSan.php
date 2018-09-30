<?php session_start(); 
require 'script/db.php';?>
<?php if(isset($_SESSION['role']) && $_SESSION['role'] == 5 ): ?>

<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Edit Breakfast</title>

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">

    <!-- Custom styles for this template -->
    <link href="css/layout.css" rel="stylesheet">

  </head>
  <body>
    <!-- Navigation -->
    <?php 
    $type = $_GET['type'];
    require 'navSAN.php'; ?>
    
	<div class="container">
          <h1 style="text-align: center;margin-top: 20px" class="my-4"><?php echo ($type=="veg") ? "Vegetable Sandwich" : "View Non Vegetable Sandwich" ?></h1>
          <?php if(isset($_SESSION['message'])){
                echo $_SESSION['message']; unset($_SESSION['message']);
          } ?>
          <table class="table table-bordered" style="margin-top: 20px">
              <thead>
                <tr>
                  <th scope="col">#</th>
                  <th scope="col">Item Name</th>
                  <th scope="col">Item Quantity</th>
                  <th scope="col">Action</th>
                </tr>
              </thead>
              <?php $rows = mysqli_query($mysqli,"SELECT * FROM sandwich where type = '$type'"); ?>
              <tbody>
                <?php $sl = 1;
                while($result = mysqli_fetch_assoc($rows)){  ?>
                <tr>
                  <th scope="row"><?php echo $sl ?></th>
                  <th><?php echo $result['name'] ?></th>
                  <th><?php echo $result['quantity'] ?></th>
                  <th>
                    <a href="editSanScript.php?type=<?php echo $type ?>&id=<?php echo $result['id'] ?>" class="btn btn-info"">Edit</a>
                  </th>
                </tr>
              <?php } ?>
              </tbody>
            </table>
    </div>
  </div>
  	
  </div>
 

    <!-- /.container -->

    <!-- Footer -->
    

    <!-- Bootstrap core JavaScript -->
	<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js" integrity="sha384-h0AbiXch4ZDo7tp9hKZ4TsHbi047NrKGLO3SEJAg45jXxnGIfYzk4Si90RDIqNm1" crossorigin="anonymous"></script>

  </body>

</html>
	<?php else:   
header("Location: index.php");
die();?>
<?php endif; ?> 