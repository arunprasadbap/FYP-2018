<?php session_start(); ?>
<?php if(isset($_SESSION['role']) && $_SESSION['role'] == 5): ?>
<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Add Sandwich</title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/layout.css" rel="stylesheet">

  </head>

  <body>

   <!--Nav-->
   <?php 
   $type = $_GET['type'];
   require 'navSAN.php'; ?>

    <!-- Page Content -->
    <div class="container">
      <h3 style="text-align: center;margin-top: 40px">ADD <?php echo ($type=="veg") ? "Veggi Sandwich" : "Non Veggi Sandwich" ?></h3>
      <?php if(isset($_SESSION['message'])){
           echo $_SESSION['message']; unset($_SESSION['message']);
      } ?>
      <div class="col-md-4">
        <form action="sanAddScript.php" method="post" enctype="multipart/form-data">
          <div class="form-group">
            <label for="exampleInputEmail1">Name</label>
            <input type="text" class="form-control" name="item_name" placeholder="Enter Item Name" required>
          </div>
          <div class="form-group">
            <label for="exampleInputEmail1">Price (MYR)</label>
            <input type="text" class="form-control" name="item_price" placeholder="Enter Item Price" required>
          </div>
          <div class="form-group">
            <label for="exampleInputEmail1">Insert Image</label>
            <input type="file" class="form-control" name="image" placeholder="Enter Item Price" required>
            <input type="hidden" name="type" value="<?php echo $type ?>">
          </div>
          <button type="submit" class="btn btn-primary">Submit</button>
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