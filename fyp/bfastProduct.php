<?php 
session_start(); 
require 'script/db.php';



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
	
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script><!-- Bootstrap core CSS -->
   
	 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link href="css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="css/styleuserfood.css">
    <!-- Custom styles-->
    
  </head>

  <body>

    <!-- Navigation -->
    <?php require 'navUser.php'; ?>


    <!-- Page Content -->
   <h1 class="my-4"></h1>
   
    <div class="container">
       
    <div class="modal fade" id="myModal" role="dialog">
  <div class="modal-dialog modal-dialog-centered">
    
      <!-- Modal content-->
      <div class="modal-content">
  <div class="modal-header">
  <h2 class="modal-title"><strong>Out Of Stock</strong></h2>
  </div>
 
  <div class="modal-body">
  <div class="alert alert-danger">
  <h4><p align="center"><strong>Sorry you cant add this item to your cart at the moment</strong></p></h4>
</div>
    
  </div>
  <div class="modal-footer">
    <a href="bfastProduct.php" class="btn btn-danger">Close</a>
    
  </div>
  </div>
</div>
</div>

	

	<?php $fetch=mysqli_query($mysqli,"SELECT * FROM scrbreakfast");
while($row=mysqli_fetch_assoc($fetch)){  

$id=$row['id'];
$userid=$_SESSION['idnum'];

?>

<div class="gallery">
  <a>
    <img src="images/breakfast/<?php echo $row['img']; ?>" id="image" class="img-responsive" alt="breakfast" width="300" height="200">
  </a><form action="addtocart.php" method="post">
  <div class="desc"><h3><?php echo '<b>'.$row['breakfast'].'</b>'.'&nbsp;'.'&nbsp;'.'RM'.$row['breakfast_amount']; ?></h3>
<input type="hidden" value="<?php  echo $id;  ?>" name="cartid" ><button type="submit" name="addcart" id="button" class="btn btn-primary">
         <span class="glyphicon glyphicon-shopping-cart"></span>  <span class="text">ADD TO CART</span>
        </button>
		<script>
 
 </script>
		
</form>
  </div>

</div>

<?php
} ?>
	
	
	
	
	
	
	
	
	
	
       
       
        
  
  
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
<?php if(isset($_GET['ofs'])){        ?>
<script type="text/javascript">
    $(window).on('load',function(){
        $('#myModal').modal('show');
    });
</script>
<?php } 




?>