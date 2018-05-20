<?php session_start(); ?>
<?php if(isset($_SESSION['role']) && $_SESSION['role'] ==2 ): ?>
<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Cashless Canteen</title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles-->
    <link href="css/layout.css" rel="stylesheet">
  </head>

  <body>

    <!-- Navigation -->
    <?php require 'navUser.php'; ?>
    
   

    <!-- Page Content -->
     <div class="container">

      <h1 class="my-4">Select Your Preferred Vendor!</h1>

      <!-- Marketing Icons Section -->
      <div class="row">
        <div class="col-lg-4 mb-4">
          <div class="card h-100">
            <h4 class="card-header">Singapore Chicken Rice</h4>
            <div class="card-body">
               <a href="scrIndex.php"><img class="card-img-top" src="img/scr.jpg" alt=""></a>
            </div>
          </div>
        </div>
        <div class="col-lg-4 mb-4">
          <div class="card h-100">
            <h4 class="card-header">Laksa</h4>
            <div class="card-body">
              <a href="productLaksa.php"><img class="card-img-top" src="img/sarawakLaksa.png" alt=""></a>
            </div>
          </div>
        </div>
        <div class="col-lg-4 mb-4">
          <div class="card h-100">
            <h4 class="card-header">Pizza</h4>
            <div class="card-body">
              <a href="#"><img class="card-img-top" src="img/pizza.jpg" alt=""></a>
            </div>
          </div>
        </div>
        <div class="col-lg-4 mb-4">
          <div class="card h-100">
            <h4 class="card-header">Indian</h4>
            <div class="card-body">
               <a href="#"><img class="card-img-top" src="img/indianfood.jpg" alt=""></a>
            </div>
          </div>
        </div>
        <div class="col-lg-4 mb-4">
          <div class="card h-100">
            <h4 class="card-header">Chinese Fry mee</h4>
            <div class="card-body">
               <a href="#"><img class="card-img-top" src="img/chinesemee.jpg" alt=""></a>
            </div>
          </div>
        </div>
      </div>
  <hr>
    <!-- /.container -->

    <!-- Footer -->
    
    </footer>

    <!-- Bootstrap core JavaScript -->
    <script src="jquery/jquery.min.js"></script>
    <script src="js/bootstrap.bundle.min.js"></script>
    <script src="script/ajax-call.js"></script>

  </body>

</html>
<?php else:   
header("Location: index.php");
die();?>
<?php endif; ?> 