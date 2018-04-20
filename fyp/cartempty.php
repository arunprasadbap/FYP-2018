<?php 
session_start(); 
require 'script/db.php';

$query = "SELECT * FROM scrbreakfast";
$result = $mysqli->query($query);

?>
<?php if(isset($_SESSION['role']) && $_SESSION['role'] ==2): ?>

 
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <h1><title>Cashless Canteen</title></h1>

    <!-- Bootstrap core CSS -->
	 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link href="css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="styleuserfood.css">
    <!-- Custom styles-->
    <link href="css/layout.css" rel="stylesheet">
  </head>

  <body>

    <!-- Navigation -->
   <h2> <?php require 'navUser.php'; ?></h2>
    
    
    <!-- Page Content -->

   
      
    <div class="container">
 <div style="width:500px; margin:320px; padding:10px;"><h1 align="center"><mark>YOUR CART IS EMPTY</mark></h1><div>
	

</div>


	
	
	
	
	
	
	
	
	
	
       
       
        
  
  
    <!-- /.container -->

    <!-- Footer -->
   
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
