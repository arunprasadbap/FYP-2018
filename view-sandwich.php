<?php 
session_start(); 
require 'script/db.php'; ?>
<?php if(isset($_SESSION['role']) && $_SESSION['role'] ==5): ?>
 <html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <h1><title>Cashless Canteen</title></h1>
    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/layout.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="css/styleuserfood.css">
    <!-- Custom styles-->
  </head>

  <body>
    <!-- Navigation -->
    <?php require 'navSAN.php'; 
    $type = $_GET['type'];
    ?>
  
    <!-- Page Content -->
   <h1 style="text-align: center" class="my-4"><?php echo ($type=="veg") ? "View Vegetable Sandwich" : "View Non Vegetable Sandwich" ?></h1>
    <div class="container">
      <?php if(isset($_SESSION['message'])){
           echo $_SESSION['message']; unset($_SESSION['message']);
      } ?>
      <table class="table table-bordered">
          <thead>
            <tr>
              <th scope="col">#</th>
              
              <th scope="col">Item Image</th>
              <th scope="col">Item Name</th>
              <th scope="col">Item Amount</th>
              <th scope="col">Item Quantity</th>
            </tr>
          </thead>
       <?php $rows = mysqli_query($mysqli,"SELECT * FROM sandwich where type = '$type'"); ?>
          <tbody>
            <?php $sl = 1;
            while($result = mysqli_fetch_assoc($rows)){  ?>
            <tr>
              <th scope="row"><?php echo $sl ?></th>
              <td><img src="images/sandwich/<?php echo $result['img']; ?>" id="image" class="img-responsive" width="200" height="200"></td>
              <th><?php echo $result['name'] ?></th>
              <th><?php echo $result['amount'] ?></th>
              <th><?php echo $result['quantity'] ?></th>
            </tr>
          <?php } ?>
          </tbody>
        </table>
     
    <!-- Bootstrap core JavaScript -->
    <script src="jquery/jquery.min.js"></script>
    <script src="js/bootstrap.bundle.min.js"></script>

  </body>
</html>
<?php else:   
header("Location: index.php");
die();?>
<?php endif; ?> 
