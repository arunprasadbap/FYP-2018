<?php 
session_start(); 
require 'script/db.php';

$query = "SELECT * FROM scrbreakfast";
$result = $mysqli->query($query);

?>
<?php if(isset($_SESSION['role']) && $_SESSION['role'] ==4): ?>
 
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
    <?php require 'navSCR.php'; ?>
    
    
    <!-- Page Content -->
<h1 class="my-4">Breakfast Menu</h1>
   
      <?php while ($Food = mysqli_fetch_assoc($result)) {?>
    <div class="container">
       <div class="row">
            <div class="col-lg-4 mb-4">
                <div class="card h-80">
                    <h4 class="card-header"><?php echo $Food['breakfast']; ?></h4>
                        <div class="card-body">
                            <img class="card-img-top" src="images/breakfast/<?php echo $Food['img']; ?>" alt="">
                        </div>
                            <div class="card-footer">
                                <p>RM<?php echo $Food['breakfast_amount']; ?></p>
                            </div>
                            
                </div>
            </div>
        </div>
    </div>
       
        <?php } ?>
	
	
	
	
	
	
    <!-- /.container -->

    <!-- Footer -->
    <?php require 'footer.php'; ?>
    </footer>

    <!-- Bootstrap core JavaScript -->
    <script src="jquery/jquery.min.js"></script>
    <script src="js/bootstrap.bundle.min.js"></script>

  </body>
</html>
<?php else: 
header("Location: index.php");
die();?>
<?php endif; ?> 