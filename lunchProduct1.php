<?php 
session_start(); 
require 'script/db.php';



?>
<?php if(isset($_SESSION['role']) && $_SESSION['role'] ==4): ?>
 
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
    <?php require 'navSCR.php'; ?>
    
    
    <!-- Page Content -->
   <h1 class="my-4">Lunch Menu</h1>
    <div class="container">
       <?php $fetch=mysqli_query($mysqli,"SELECT * FROM scrlunch");
        while($Food=mysqli_fetch_assoc($fetch)){  ?>
<div class="gallery">
  <a><img src="images/lunch/<?php echo $Food['img']; ?>" id="image" class="img-responsive" width="300" height="200">
        <div><h6><?php echo '<b>'.$Food['lunch'].'</b>'.'&nbsp;'.'&nbsp;'.'RM'.$Food['lunch_amount']; ?></h6>
 
	
</form>
        </div>
</div>


 <?php } ?>
	
	
    <!-- Bootstrap core JavaScript -->
    <script src="jquery/jquery.min.js"></script>
    <script src="js/bootstrap.bundle.min.js"></script>

  </body>
</html>
<?php else:   
header("Location: index.php");
die();?>
<?php endif; ?> 
