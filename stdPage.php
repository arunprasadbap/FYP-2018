<?php session_start(); ?>
<?php if(isset($_SESSION['role']) && $_SESSION['role'] ==2 ): ?>
    <?php require 'script/bal.php'; ?>
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
    
   <header>
      <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
          <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
          <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
          <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
        </ol>
        <div class="carousel-inner" role="listbox">
          <!-- Slide One - Set the background image for this slide in the line below -->
          <div class="carousel-item active" style="background-image: url('img/slideshow.jpg');background-repeat: no-repeat; background-size: cover;">
            <div class="carousel-caption d-none d-md-block">
              <h3>Food Example 1</h3>
              <p>Image Example 1</p>
            </div>
          </div>
          <!-- Slide Two - Set the background image for this slide in the line below -->
          <div class="carousel-item" style="background-image: url('img/slideshow2.jpg');background-repeat: no-repeat; background-size: cover;">
            <div class="carousel-caption d-none d-md-block">
              <h3>Food Example 2</h3>
              <p>Image Example 2</p>
            </div>
          </div>
          <!-- Slide Three - Set the background image for this slide in the line below -->
          <div class="carousel-item" style="background-image: url('img/slideshow3.jpg');background-repeat: no-repeat; background-size: cover;">
            <div class="carousel-caption d-none d-md-block">
              <h3>Food Example 3</h3>
              <p>Image Example 3</p>
            </div>
          </div>
        </div>
        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="sr-only">Next</span>
        </a>
      </div>
    </header>


    <!-- Page Content -->
    <div class="container">

      <h1 class="my-4">Welcome to Swinburne Cafeteria</h1>

      
      <div class="row">
        <div class="col-lg-6 mb-6">
          <div class="card h-100">
            <h4 class="card-header">Foods</h4>
            <div class="card-body">
              <a href="foodIndex.php"><img class="card-img-top" src="img/food1.jpg" alt=""></a>
            </div>
          </div>
        </div>
        <div class="col-lg-6 mb-6">
          <div class="card h-100">
            <h4 class="card-header">Drinks</h4>
            <div class="card-body">
              <a href="drinkProduct.php"><img class="card-img-top" src="img/drink1.jpg" alt=""></a>
            </div>
          </div>
        </div>
        </div>
      </div>
  <hr>
    <!-- /.container -->

    <!-- Footer -->
    <?php require 'footer.php'; ?>
    </footer>

    <!-- Bootstrap core JavaScript -->
   <!--  // <script src="jquery/jquery.min.js"></script>
    // <script src="js/bootstrap.bundle.min.js"></script> -->

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.bundle.min.js"></script>
    <script src="script/ajax-call.js"></script>

  </body>

</html>
<?php else:   
header("Location: index.php");
die();?>
<?php endif; ?> 