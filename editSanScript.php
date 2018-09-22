<?php session_start();
require 'script/db.php'; 

if(isset($_POST['submit'])){
  $id = $_POST['id'];
  $quantity = $_POST['quantity'];
  $type = $_POST['type'];
  $_SESSION['message'] = "<div class='alert alert-success'>Data Updated Successfully</div>";
  
  mysqli_query($mysqli, "UPDATE sandwich SET quantity = '$quantity' WHERE id = '$id'");
  header("Location: editSan.php?type=$type");
  exit();
}

?>
<?php if(isset($_SESSION['role']) && $_SESSION['role'] == 5): ?>
<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Add Breakfast</title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/layout.css" rel="stylesheet">

  </head>

  <body>

   <!--Nav-->
   <?php 
   $type = $_GET['type'];
   $id   = $_GET['id'];

   $rows = mysqli_query($mysqli,"SELECT * FROM sandwich where type = '$type' AND id = '$id'"); 
   $result = mysqli_fetch_assoc($rows);
   require 'navSAN.php'; ?>

    <!-- Page Content -->
    <div class="container">
      <h3 style="text-align: center;margin-top: 40px">Edit <?php echo ($type=="veg") ? "Veggi Sandwich" : "Non Veggi Sandwich" ?></h3>
      <div class="col-md-4">
        <form action="" method="post">
          <div class="form-group">
            <label for="exampleInputEmail1">Name</label>
            <input type="text" class="form-control" value="<?php echo $result['name'] ?>" name="item_name"  readonly>
          </div>
          <div class="form-group">
            <label for="exampleInputEmail1">Quantity</label>
            <input type="text" class="form-control" name="quantity" value="<?php echo $result['quantity'] ?>" required>
            <input type="hidden" name="id" value="<?php echo $result['id'] ?>">
            <input type="hidden" name="type" value="<?php echo $result['type'] ?>">
          </div>

          <button type="submit" name="submit" class="btn btn-primary">Update</button>
        </form>
      </div>
    </div> 
 
    <!-- /.container -->

    <!-- Footer -->
    <!-- Bootstrap core JavaScript -->
    <script src="jquery/jquery.min.js"></script>
    <script src="js/bootstrap.bundle.min.js"></script>

  </body>

</html>
<?php else:   
header("Location: index.php");
die();?>
<?php endif; ?> 