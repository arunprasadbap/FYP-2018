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
    <link href="css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="styleuserfood.css">
    <!-- Custom styles-->
   
  </head>

  <body>

    <!-- Navigation -->
  <?php require 'navUser.php'; ?>
    
    
    <!-- Page Content -->
   <h1 class="my-4"></h1>
   
      
    <div class="container">
       
    
	

	<?php $fetch=mysqli_query($mysqli,"SELECT * FROM scrlunch");
while($row=mysqli_fetch_assoc($fetch)){  

$id=$row['id'];
$userid=$_SESSION['idnum'];

?>

<div class="gallery">
  <a>
    <img src="images/lunch/<?php echo $row['img']; ?>" id="image" class="img-responsive" alt="lunch" width="300" height="200">
  </a><form action="addtocart.php" method="post">
  <div class="desc"><h3><?php echo '<b>'.$row['lunch'].'</b>'.'&nbsp;'.'&nbsp;'.'RM'.$row['lunch_amount']; ?></h3>
 <h2><input type="number"  name="quantity" min="1" max="5"  oninvalid="this.setCustomValidity('Select Quatity')" oninput="setCustomValidity('')" required></h2><input type="hidden" value="<?php  echo $id;  ?>" name="cartid" ><button type="submit" name="addcartlunch" id="button" class="btn btn-primary showArchived">
         <span class="glyphicon glyphicon-shopping-cart"></span>  <span class="text">ADD TO CART</span>
        </button>
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
<script>
 $('#button').on('click', function(e) {
    var btn = $(this),
        icon = btn.find('.glyphicon'),
        text = btn.find('.text'),
        toggleClass = 'showArchived';

    if (btn.hasClass(toggleClass)) {
        icon.removeClass('glyphicon-shopping-cart').addClass('glyphicon-ok');
        text.text('SUCCESSFULLY ADDED');
    } else {
        icon.removeClass('glyphicon-ok').addClass('glyphicon-shopping-cart');
        text.text('ADD TO CART');
    }
    btn.toggleClass(toggleClass);
});
 </script>